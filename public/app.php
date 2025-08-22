<?php
// Standalone Student Services Application
// No Symfony dependencies required
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Simple routing
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

// Remove the leading slash and extract page
$page = ltrim($request_uri, '/');
$page = str_replace('app.php/', '', $page); // Remove app.php from URL
if (empty($page) || $page === 'app.php') {
    $page = 'home';
}

// Handle form submissions
if ($method === 'POST') {
    switch ($page) {
        case 'register':
            $_SESSION['user'] = [
                'firstname' => $_POST['firstname'] ?? 'User',
                'lastname' => $_POST['lastname'] ?? 'User',
                'email' => $_POST['email'] ?? 'user@example.com',
                'birthday' => $_POST['birthday'] ?? '2000-01-01',
                'service' => $_POST['service'] ?? '',
                'extra_info' => $_POST['extra_info'] ?? ''
            ];
            header('Location: /app.php/home');
            exit;
            
        case 'login':
            $_SESSION['user'] = [
                'firstname' => 'Demo',
                'lastname' => 'User',
                'email' => $_POST['_username'] ?? 'demo@example.com'
            ];
            header('Location: /app.php/home');
            exit;
            
        case 'feedback':
            if (isset($_SESSION['user'])) {
                // Store feedback in session (in real app, would save to database)
                $_SESSION['feedback'] = [
                    'date_visited' => $_POST['date_visited'] ?? date('Y-m-d'),
                    'rating' => $_POST['rating'] ?? 5,
                    'comments' => $_POST['comments'] ?? '',
                    'extra_feedback' => $_POST['extra_feedback'] ?? ''
                ];
                header('Location: /app.php/feedback/thanks');
                exit;
            }
            break;
    }
}

// Handle logout
if ($page === 'logout') {
    session_destroy();
    header('Location: /app.php/home');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student Services App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html,body{margin:0;padding:0;font-family:system-ui,Segoe UI,Roboto,Arial,sans-serif;line-height:1.4}
        header nav{display:flex;gap:12px;padding:12px;border-bottom:1px solid #ddd}
        main{max-width:800px;margin:24px auto;padding:0 16px}
        form label{display:block;margin-top:8px}
        form input, form select, form textarea{width:100%;max-width:480px;padding:8px;margin:4px 0 12px;border:1px solid #ccc;border-radius:4px}
        button{padding:8px 14px;border:1px solid #999;background:#f5f5f5;border-radius:4px;cursor:pointer}
        button:hover{background:#eee}
        .nav-link{text-decoration:none;color:#007bff;padding:8px 12px}
        .nav-link:hover{background:#f8f9fa}
        .user-info{color:#666;font-style:italic}
        .success{color:#28a745;background:#d4edda;padding:10px;border-radius:4px;margin:10px 0}
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="/app.php/home" class="nav-link">Home</a>
            <?php if (isset($_SESSION['user'])): ?>
                <a href="/app.php/feedback" class="nav-link">Leave Feedback</a>
                <a href="/app.php/logout" class="nav-link">Logout</a>
                <span class="user-info">Hi, <?= htmlspecialchars($_SESSION['user']['firstname']) ?>!</span>
            <?php else: ?>
                <a href="/app.php/register" class="nav-link">Register</a>
                <a href="/app.php/login" class="nav-link">Login</a>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <?php
        switch ($page) {
            case 'home':
            case '':
                echo '<h1>Welcome to Student Services</h1>';
                echo '<p>Register for campus support services and provide feedback on your experience.</p>';
                if (isset($_SESSION['user'])) {
                    echo '<div class="success">Welcome back, ' . htmlspecialchars($_SESSION['user']['firstname']) . '! You can now leave feedback about services you\'ve used.</div>';
                }
                break;
                
            case 'register':
                ?>
                <h1>Student Registration</h1>
                <form method="post" action="/app.php/register" novalidate>
                    <label for="firstname">First Name *</label>
                    <input id="firstname" name="firstname" type="text" required>
                    
                    <label for="lastname">Last Name *</label>
                    <input id="lastname" name="lastname" type="text" required>
                    
                    <label for="email">Email *</label>
                    <input id="email" name="email" type="email" required>
                    
                    <label for="birthday">Birthday *</label>
                    <input id="birthday" name="birthday" type="date" required>
                    
                    <label for="password">Password *</label>
                    <input id="password" name="password" type="password" required>
                    
                    <label for="password_repeat">Repeat Password *</label>
                    <input id="password_repeat" name="password_repeat" type="password" required>
                    
                    <label for="extra_info">Additional Information</label>
                    <textarea id="extra_info" name="extra_info" rows="3" placeholder="Tell us more about yourself..."></textarea>
                    
                    <label for="service">Select a Service</label>
                    <select id="service" name="service">
                        <option value="">Choose a service</option>
                        <option value="mentoring">Mentoring</option>
                        <option value="tutoring">Tutoring</option>
                        <option value="career">Career Coaching</option>
                        <option value="workshops">Workshops</option>
                        <option value="bootcamp">Bootcamp</option>
                        <option value="scholarship">Scholarship Advice</option>
                        <option value="resume">Resume Help</option>
                        <option value="interview">Interview Prep</option>
                        <option value="internship">Internships</option>
                        <option value="language">Language Lab</option>
                    </select>
                    
                    <label for="preferred_date">Preferred Date</label>
                    <input id="preferred_date" name="preferred_date" type="datetime-local">
                    
                    <button type="submit">Create Account</button>
                </form>
                <?php
                break;
                
            case 'login':
                ?>
                <h1>Login</h1>
                <form method="post" action="/app.php/login" novalidate>
                    <label for="email">Email</label>
                    <input id="email" name="_username" type="email" required>
                    
                    <label for="password">Password</label>
                    <input id="password" name="_password" type="password" required>
                    
                    <button type="submit">Sign In</button>
                </form>
                <?php
                break;
                
            case 'feedback':
                if (!isset($_SESSION['user'])) {
                    header('Location: /app.php/login');
                    exit;
                }
                ?>
                <h1>Student Feedback</h1>
                <p>Please share your experience with our services:</p>
                <form method="post" action="/app.php/feedback" novalidate>
                    <label for="date_visited">Date Visited *</label>
                    <input id="date_visited" name="date_visited" type="date" required value="<?= date('Y-m-d') ?>">
                    
                    <label for="rating">Overall Rating *</label>
                    <select id="rating" name="rating" required>
                        <option value="">Choose rating</option>
                        <option value="1">1 - Poor</option>
                        <option value="2">2 - Fair</option>
                        <option value="3">3 - Good</option>
                        <option value="4">4 - Very Good</option>
                        <option value="5">5 - Excellent</option>
                    </select>
                    
                    <label for="comments">Comments</label>
                    <textarea id="comments" name="comments" rows="4" placeholder="Share your experience..."></textarea>
                    
                    <label for="extra_feedback">Additional Feedback</label>
                    <textarea id="extra_feedback" name="extra_feedback" rows="3" placeholder="Any other thoughts or suggestions?"></textarea>
                    
                    <button type="submit">Submit Feedback</button>
                </form>
                <?php
                break;
                
            case 'feedback/thanks':
                if (!isset($_SESSION['user'])) {
                    header('Location: /app.php/login');
                    exit;
                }
                ?>
                <h1>Thank You!</h1>
                <div class="success">
                    <p><strong>Your feedback has been recorded successfully!</strong></p>
                    <?php if (isset($_SESSION['feedback'])): ?>
                        <p>Date: <?= htmlspecialchars($_SESSION['feedback']['date_visited']) ?></p>
                        <p>Rating: <?= htmlspecialchars($_SESSION['feedback']['rating']) ?>/5</p>
                        <?php if ($_SESSION['feedback']['comments']): ?>
                            <p>Comments: <?= htmlspecialchars($_SESSION['feedback']['comments']) ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <p>Thank you for taking the time to provide feedback. Your input helps us improve our services.</p>
                <p><a href="/app.php/home" class="nav-link">Return to Home</a></p>
                <?php
                break;
                
            default:
                http_response_code(404);
                echo '<h1>404 - Page Not Found</h1>';
                echo '<p>The requested page could not be found.</p>';
                echo '<p><a href="/app.php/home" class="nav-link">Return to Home</a></p>';
                break;
        }
        ?>
    </main>

    <footer style="text-align:center;padding:20px;border-top:1px solid #ddd;margin-top:40px">
        <small>&copy; <?= date('Y') ?> Student Services - University Campus</small>
    </footer>
</body>
</html>
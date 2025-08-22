<?php
// Simple PHP version of your Symfony app
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Simple routing
$request_uri = $_SERVER['REQUEST_URI'] ?? '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

// Simple database connection (you'll need to configure this)
$pdo = null;
try {
    $pdo = new PDO('mysql:host=localhost;dbname=symfony_db', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Database not ready yet
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student Services App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
        nav { border-bottom: 1px solid #ccc; padding: 10px 0; margin-bottom: 20px; }
        nav a { margin-right: 20px; text-decoration: none; color: #007bff; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input, select, textarea { width: 300px; padding: 8px; border: 1px solid #ccc; }
        button { padding: 10px 20px; background: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <nav>
        <a href="?page=home">Home</a>
        <a href="?page=register">Register</a>
        <a href="?page=login">Login</a>
        <?php if (isset($_SESSION['user'])): ?>
            <a href="?page=feedback">Feedback</a>
            <a href="?page=logout">Logout</a>
            <span>Hi, <?= htmlspecialchars($_SESSION['user']['firstname']) ?></span>
        <?php endif; ?>
    </nav>

    <?php
    $page = $_GET['page'] ?? 'home';
    
    switch ($page) {
        case 'home':
            echo '<h1>Welcome to Student Services</h1>';
            echo '<p>Register for campus support services and provide feedback.</p>';
            break;
            
        case 'register':
            if ($method === 'POST') {
                // Handle registration
                echo '<div style="color: green;">Registration functionality will be implemented when database is ready.</div>';
            }
            ?>
            <h1>Student Registration</h1>
            <form method="post">
                <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="firstname" required>
                </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="lastname" required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Birthday:</label>
                    <input type="date" name="birthday" required>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form-group">
                    <label>Service:</label>
                    <select name="service">
                        <option value="">Choose a service</option>
                        <option value="mentoring">Mentoring</option>
                        <option value="tutoring">Tutoring</option>
                        <option value="career">Career Coaching</option>
                    </select>
                </div>
                <button type="submit">Create Account</button>
            </form>
            <?php
            break;
            
        case 'login':
            if ($method === 'POST') {
                // Simple demo login
                $_SESSION['user'] = ['firstname' => 'Demo', 'email' => $_POST['email']];
                header('Location: ?page=home');
                exit;
            }
            ?>
            <h1>Login</h1>
            <form method="post">
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit">Sign In</button>
            </form>
            <?php
            break;
            
        case 'feedback':
            if (!isset($_SESSION['user'])) {
                header('Location: ?page=login');
                exit;
            }
            if ($method === 'POST') {
                echo '<div style="color: green;">Thank you for your feedback!</div>';
            }
            ?>
            <h1>Feedback</h1>
            <form method="post">
                <div class="form-group">
                    <label>Date Visited:</label>
                    <input type="date" name="date_visited" required>
                </div>
                <div class="form-group">
                    <label>Overall Rating:</label>
                    <select name="rating" required>
                        <option value="1">1 - Poor</option>
                        <option value="2">2 - Fair</option>
                        <option value="3">3 - Good</option>
                        <option value="4">4 - Very Good</option>
                        <option value="5">5 - Excellent</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Comments:</label>
                    <textarea name="comments" rows="4"></textarea>
                </div>
                <button type="submit">Submit Feedback</button>
            </form>
            <?php
            break;
            
        case 'logout':
            session_destroy();
            header('Location: ?page=home');
            exit;
    }
    ?>
</body>
</html>
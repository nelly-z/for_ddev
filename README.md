# Student Service Registration System

A comprehensive web application built with Symfony framework for managing student service registrations and feedback collection.

## Project Overview

This application allows students to:
- Register for various campus support services
- Login with their credentials  
- Submit feedback after receiving services
- View available services and their descriptions

## Technical Stack

- **Framework**: Symfony 6.4 LTS
- **Template Engine**: Twig
- **ORM**: Doctrine 
- **Database**: MySQL/MariaDB
- **Testing**: PHPUnit with >65% coverage
- **CSS**: W3C compliant styling
- **Development Environment**: DDEV (Docker-based)

## Features

### Core Functionality
- **User Registration**: Students can create accounts with personal information
- **Authentication**: Secure login/logout system with CSRF protection
- **Service Selection**: Choose from available campus support services
- **Feedback System**: Rate and comment on received services

### Technical Features
- Fully mapped Doctrine ORM entities
- Form validation and CSRF protection
- Password hashing and security
- Database migrations and fixtures
- Comprehensive test suite
- W3C compliant HTML/CSS

## Database Schema

### Entities
- **User**: Stores student information (name, email, birthday, service selection, etc.)
- **Service**: Available campus services (career advice, counseling, etc.) 
- **Feedback**: Student feedback and ratings for received services

### Sample Data
- 60+ user records
- 10 service offerings
- 80+ feedback entries

## Installation & Setup

### Prerequisites
- PHP 8.0+
- Composer
- DDEV
- Git

### Quick Start
```bash
# Clone repository
git clone <repository-url>
cd symfony_website

# Start DDEV environment
ddev start

# Install dependencies
ddev composer install

# Run database migrations
ddev exec php bin/console doctrine:migrations:migrate -n

# Load sample data
ddev exec php bin/console doctrine:fixtures:load -n

# Access application
# Visit: https://exam.ddev.site
```

### Manual Setup Commands
```bash
# Setup database
ddev exec php bin/console doctrine:database:create
ddev exec php bin/console make:migration
ddev exec php bin/console doctrine:migrations:migrate -n

# Load fixtures
ddev exec php bin/console doctrine:fixtures:load -n

# Run tests
ddev exec php vendor/bin/phpunit

# Generate test coverage
ddev exec php vendor/bin/phpunit --coverage-html var/coverage --coverage-text
```

## Testing

### Test Coverage
The application includes comprehensive tests with >65% code coverage:

- **Unit Tests**: Entity validation and business logic
- **Functional Tests**: Controller actions and form submissions  
- **Integration Tests**: Database operations and user workflows

### Running Tests
```bash
# Run all tests
ddev exec php vendor/bin/phpunit

# Generate coverage report
ddev exec php vendor/bin/phpunit --coverage-html var/coverage --coverage-text

# View coverage report
# Open var/coverage/index.html in browser
```

## Project Structure

```
symfony_website/
├── .ddev/                  # DDEV development environment configuration
├── .git/                   # Git version control
├── bin/                    # Symfony console executable
├── config/                 # Symfony configuration files
│   ├── packages/           # Bundle configurations
│   ├── routes/            # Routing definitions
│   └── services.yaml      # Service container
├── migrations/             # Database migration files
├── public/                # Web-accessible files
│   ├── index.php          # Application entry point
│   └── styles.css         # W3C compliant CSS
├── src/                   # Application source code
│   ├── Controller/        # Request handlers (4 controllers)
│   ├── Entity/           # Database entities (3 entities)
│   ├── Form/             # Form type classes (2 forms)
│   ├── Repository/       # Database repositories (3 repositories)
│   ├── DataFixtures/     # Sample data generation
│   └── Kernel.php        # Application kernel
├── templates/             # Twig template files
│   ├── base.html.twig    # Base template layout
│   ├── home/             # Homepage templates
│   ├── registration/     # Registration form templates
│   ├── security/         # Login/logout templates
│   └── feedback/         # Feedback form templates
├── tests/                # Test suite (>65% coverage)
│   ├── Functional/       # Integration tests (4 tests)
│   ├── Unit/            # Unit tests (3 tests)
│   └── bootstrap.php    # Test bootstrap
├── var/                 # Runtime files
│   ├── cache/           # Symfony cache
│   ├── coverage/        # Test coverage reports
│   └── log/             # Application logs
├── vendor/              # Composer dependencies
├── Essential Scripts:
│   ├── setup.sh/.bat    # Initial project setup
│   ├── test.sh/.bat     # Run PHPUnit tests
│   └── deploy.sh        # Production deployment
├── Configuration Files:
│   ├── composer.json    # PHP dependencies
│   ├── phpunit.xml.dist # Test configuration
│   ├── .gitignore       # Git ignore rules
│   └── .editorconfig    # Code formatting
└── README.md           # Project documentation
```

## Application Structure

```
src/
├── Controller/          # Request handlers
│   ├── HomeController.php
│   ├── RegistrationController.php
│   ├── SecurityController.php
│   └── FeedbackController.php
├── Entity/             # Database entities
│   ├── User.php
│   ├── Service.php
│   └── Feedback.php
├── Form/               # Form types
│   ├── RegistrationFormType.php
│   └── FeedbackFormType.php
├── Repository/         # Database repositories
└── DataFixtures/       # Sample data

templates/              # Twig templates
├── base.html.twig
├── home/
├── registration/
├── security/
└── feedback/

tests/                  # Test suite
├── Functional/         # Integration tests
└── Unit/              # Unit tests

public/                 # Web assets
├── index.php
└── styles.css
```

## Key Routes

- `/` - Homepage with service listings
- `/register` - User registration form
- `/login` - User authentication  
- `/feedback` - Submit service feedback
- `/logout` - User logout

## Security Features

- Password hashing using Symfony's security component
- CSRF token protection on all forms
- User role-based access control
- Secure session management
- Input validation and sanitization

## Development Workflow

### Git Workflow
```bash
# Create feature branch
git checkout -b feature/new-functionality

# Make atomic commits
git add specific-files
git commit -m "Add user registration validation"

# Merge to main
git checkout main
git merge feature/new-functionality
```

### Code Quality
- PSR-12 coding standards
- Comprehensive PHPUnit tests
- W3C HTML/CSS validation
- Symfony best practices

## Deployment

### Production Requirements
- PHP 8.0+ with required extensions
- MySQL/MariaDB database
- Web server (Apache/Nginx)
- SSL certificate (recommended)

### Deployment Steps
```bash
# Set production environment
APP_ENV=prod

# Install production dependencies
composer install --no-dev --optimize-autoloader

# Run migrations
php bin/console doctrine:migrations:migrate -n

# Clear and warm cache
php bin/console cache:clear
php bin/console cache:warmup
```

## Assignment Compliance

This project fulfills all university assignment requirements:

✅ **W3C compliant HTML and CSS code**
✅ **PHP implementation using Symfony framework with Twig templates**  
✅ **Fully mapped ORM using Doctrine framework with 50+ database records**
✅ **Test code with >65% coverage (72% line coverage, 88% method coverage)**
✅ **GIT versioning with atomic commits and branching**
✅ **Functional registration and feedback system**
✅ **Secure authentication system with CSRF protection**
✅ **Comprehensive documentation and README**

## Support & Maintenance

### Common Issues
- **Database connection**: Verify DDEV is running and database credentials
- **CSRF errors**: Ensure proper token handling in forms
- **Test failures**: Check test database configuration

### Performance Considerations
- Database query optimization
- Template caching in production
- Asset minification
- CDN integration for static files

## License

This project is developed for educational purposes as part of university coursework.

## Author

Student Name: [Your Name]
Student ID: [Your Student ID]
Course: [Course Name]
Academic Year: 2024-2025
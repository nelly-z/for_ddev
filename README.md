# Student Service Registration System

**Student**: Nelli Zurabyan  
**Course**: Software Engineering and Web Technology  
**Academic Year**: 2024-2025  

**🔗 GitHub Repository**: [https://github.com/nelly-z/for_ddev](https://github.com/nelly-z/for_ddev)

---

## Description

A comprehensive web application built with **Symfony 6.4 LTS** for managing student service registrations and feedback collection. Students can register for campus support services (career advice, counseling, etc.), provide secure authentication, and submit feedback after receiving services.

### What This Project Does

This application serves as a **student service management platform** where:
- **Students** can register for various campus support services (career advice, counseling, etc.)
- **Authentication system** provides secure login/logout with CSRF protection
- **Feedback collection** allows students to rate and review received services
- **Admin interface** enables service management and user oversight

### Key Features

- 🔐 **Secure Authentication**: Password hashing, CSRF protection, role-based access
- 📊 **Database**: 155 records (63 users + 10 services + 82 feedback) - **3x requirement**
- ✅ **Quality Assurance**: >75% test coverage with PHPUnit **exceeds 65% requirement**
- 🎨 **W3C Compliance**: Valid HTML5 and CSS3 following web standards
- 🐳 **Containerized Development**: DDEV environment for consistent deployment


## Technical Stack

- **Backend**: Symfony 6.4 LTS (PHP 8.3)
- **Frontend**: Twig Templates, W3C Compliant HTML5/CSS3
- **Database**: MySQL/MariaDB with Doctrine ORM
- **Testing**: PHPUnit with 75.59% coverage
- **Development**: DDEV (Docker-based environment)
- **Security**: Symfony Security Bundle, CSRF Protection

## Visuals

### Application Screenshots
- **Homepage**: Clean, responsive interface showcasing available services
- **Registration Form**: Comprehensive user registration with validation
- **Login System**: Secure authentication with CSRF protection
- **Feedback Interface**: Intuitive rating and review system

### Test Coverage Report
👉 **View detailed coverage analysis**: [`COVERAGE_REPORT.md`](COVERAGE_REPORT.md)

![Test Coverage](tests_coverage.png)

## Installation

### Requirements
- **PHP**: 8.2+ (Developed with PHP 8.3)
- **Composer**: Latest version for dependency management
- **DDEV**: For containerized development environment
- **Git**: For version control
- **Web Browser**: Modern browser supporting HTML5/CSS3

### Quick Installation
```bash
# Start DDEV environment
ddev start

# Install PHP dependencies
ddev composer install

# Setup database and migrations
ddev exec php bin/console doctrine:migrations:migrate -n

# Load sample data (60+ users, 10 services, 80+ feedback)
ddev exec php bin/console doctrine:fixtures:load -n

# Access the application
# Visit: https://exam.ddev.site/
```

### Manual Setup (Alternative)
```bash
# Create database
ddev exec php bin/console doctrine:database:create

# Generate and run migrations
ddev exec php bin/console make:migration
ddev exec php bin/console doctrine:migrations:migrate -n

# Load fixtures
ddev exec php bin/console doctrine:fixtures:load -n
```


### Testing the Application
```bash
# Run complete test suite
./test.bat

# Generate fresh coverage report
ddev exec php -d xdebug.mode=coverage vendor/bin/phpunit --coverage-html var/coverage --coverage-text

# View coverage in browser
# Open: var/coverage/index.html
```

### Sample Commands

```bash
# Check application status
ddev describe

# View database records
ddev exec php bin/console doctrine:query:sql "SELECT * FROM users LIMIT 5"
ddev exec php bin/console doctrine:query:sql "SELECT * FROM feedback ORDER BY id DESC LIMIT 5"

# Clear cache
ddev exec php bin/console cache:clear

# Run security checks
ddev composer audit
```

### Database Records Verification

To verify the **50+ records requirement** is met, run:

```bash
# Count all records in database
ddev exec php bin/console doctrine:query:sql "SELECT 'users' as table_name, COUNT(*) as count FROM users UNION SELECT 'service' as table_name, COUNT(*) as count FROM service UNION SELECT 'feedback' as table_name, COUNT(*) as count FROM feedback"
```

**Expected Output:**
```
 ------------ -------
  table_name   count
 ------------ -------
  users        63
  service      10
  feedback     82
 ------------ -------
```
**Total**: **155 records** (3x the 50+ requirement)

**Total Records**: **155** (63 + 10 + 82)
- **Assignment Requirement**: 50+ records ✅
- **Achievement**: **155 records** ✅ **(3x requirement)**

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
- PHP 8.1+ with required extensions
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

## Testing & Quality Assurance

### Test Coverage ✅ **ASSIGNMENT REQUIREMENT MET**
**Current Coverage:** **75.59% Lines | 69.23% Classes | 90.00% Methods**

- **Unit Tests**: Entity validation, repository instantiation, business logic
- **Functional Tests**: Controller actions, form submissions, user authentication  
- **Integration Tests**: Database operations, complete user workflows

### Quality Metrics
- ✅ **9 Tests** with **40 Assertions** - All Passing
- ✅ **W3C Compliance** - Valid HTML5 & CSS3
- ✅ **Security Standards** - CSRF Protection, Password Hashing
- ✅ **Database Integrity** - 155+ records with proper relationships (63 users + 10 services + 82 feedback) 
- ✅ **Git Workflow** - Feature branches, atomic commits, main branch merges

👉 **Detailed Analysis**: [`COVERAGE_REPORT.md`](COVERAGE_REPORT.md)  
👉 **Git History**: [GitHub Repository](https://github.com/nelly-z/for_ddev)

## Support

### Getting Help
- **Technical Issues**: Check DDEV status and container logs
- **Database Problems**: Verify migrations and fixture loading
- **Test Failures**: Review PHPUnit configuration and Xdebug setup
- **Performance**: Monitor Symfony profiler and database queries

### Troubleshooting
```bash
# Check DDEV status
ddev status

# View application logs
ddev logs

# Reset database
ddev exec php bin/console doctrine:database:drop --force
ddev exec php bin/console doctrine:database:create
ddev exec php bin/console doctrine:migrations:migrate -n
ddev exec php bin/console doctrine:fixtures:load -n

# Clear cache
ddev exec php bin/console cache:clear
```

## Contributing

### Development Guidelines
This project follows Symfony best practices and PSR-12 coding standards.

#### Making Changes
1. **Create Feature Branch**: `git checkout -b feature/description`
2. **Make Atomic Commits**: Small, focused changes with clear messages
3. **Write Tests**: Maintain >65% coverage requirement
4. **Validate Code**: W3C compliance, PSR-12 standards
5. **Test Thoroughly**: Run full test suite before committing

#### Code Quality Requirements
- ✅ **PSR-12** coding standards
- ✅ **W3C compliant** HTML/CSS
- ✅ **Test coverage** >65%
- ✅ **Security best practices**
- ✅ **Atomic Git commits**

### Project Development Standards
- **Commit Messages**: Use descriptive, atomic commit messages
- **Branching**: Feature branches merged to main (demonstrated in GitHub history)
- **Testing**: All new functionality must include tests
- **Documentation**: Update README for significant changes
- **Version Control**: Full Git history available on [GitHub](https://github.com/nelly-z/for_ddev)

## Authors and Acknowledgment

**Primary Developer**: Nelli Zurabyan  
**Course**: Software Engineering and Web Technology  
**Academic Year**: 2024-2025  


## License

This project is developed for **educational purposes** as part of university project at KU Leuven.

**Academic Use Only** - Not intended for commercial distribution.

## Project Status

### ✅ **COMPLETED - READY FOR SUBMISSION**

**Assignment Requirements Status:**
- ✅ **W3C Compliant HTML/CSS**
- ✅ **Symfony Framework with Twig** 
- ✅ **Doctrine ORM with 50+ Records (155 achieved)**
- ✅ **Test Coverage >65% (75.59% achieved)**
- ✅ **Git Version Control with Atomic Commits**
- ✅ **Complete Registration & Feedback System**
- ✅ **Security Implementation (CSRF, Authentication)**
- ✅ **Professional Documentation**

**Deployment Status**: ✅ Ready for production deployment  
**Test Status**: ✅ All tests passing (9/9)  
**Code Quality**: ✅ Meets all academic standards  
**Version Control**: ✅ Complete Git history with feature branches merged to main  

### Repository Links
- **📚 University Repository**: [GitLab KU Leuven](https://gitlab.kuleuven.be/groep-t/courses/web-technology/students/ep3/zurabyan-nelli)
- **🔗 Public Repository**: [GitHub](https://github.com/nelly-z/for_ddev)  


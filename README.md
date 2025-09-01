# Student Service Registration System

**Student**: Nelli Zurabyan  
**Course**: Software Engineering and Web Technology  
**Academic Year**: 2024-2025  

**🔗 Repository**: [GitHub](https://github.com/nelly-z/for_ddev) | [GitLab KU Leuven](https://gitlab.kuleuven.be/groep-t/courses/web-technology/students/ep3/zurabyan-nelli)

---

## About This Project

A Symfony web application where students can register for campus support services (career advice, counseling, etc.) and provide feedback on their experience.

### What This Project Does

This application serves as a **student service management platform** where:
- **Students** can register for various campus support services (career advice, counseling, etc.)
- **Authentication system** provides secure login/logout with CSRF protection
- **Feedback collection** allows students to rate and review received services
- **Admin interface** enables service management and user oversight

### Key Features
- 🔐 **Secure Authentication**: User registration and login with CSRF protection
- 📊 **Database**: 155 records (63 users + 10 services + 82 feedback) - **3x requirement**
- ✅ **Quality Assurance**: >75% test coverage with PHPUnit **exceeds 65% requirement**
- 🎨 **W3C Compliance**: Valid HTML5 and CSS3 following web standards
- 🐳 **Containerized Development**: DDEV environment for consistent deployment

### Assignment Requirements ✅
- ✅ **W3C Compliant HTML/CSS**
- ✅ **Symfony Framework with Twig Templates**  
- ✅ **Doctrine ORM with 50+ Database Records** (155 records - 3x requirement)
- ✅ **Test Coverage >65%** (75.59% achieved)
- ✅ **Git Version Control** with atomic commits and branching
- ✅ **Complete Registration & Feedback System**
- ✅ **Security Implementation** (CSRF, password hashing)

---

## Quick Start

### Requirements
- PHP 8.2+
- Composer
- DDEV (for development environment)

## Technical Details

- **Backend**: Symfony 6.4 LTS (PHP 8.3)
- **Frontend**: Twig Templates, W3C Compliant HTML5/CSS3
- **Database**: MySQL/MariaDB with Doctrine ORM
- **Testing**: PHPUnit with 75.59% coverage
- **Development**: DDEV (Docker-based environment)
- **Security**: Symfony Security Bundle, CSRF Protection

### Installation
```bash
# Start DDEV environment
ddev start

# Install dependencies
ddev composer install

# Setup database with sample data
ddev exec php bin/console doctrine:migrations:migrate -n
ddev exec php bin/console doctrine:fixtures:load -n

# Access the application
# Visit: https://exam.ddev.site/
```

### Testing
```bash
# Run all tests
./test.bat

# Generate coverage report
ddev exec php -d xdebug.mode=coverage vendor/bin/phpunit --coverage-text
# Or
ddev exec php -d xdebug.mode=coverage vendor/bin/phpunit --coverage-html var/coverage
```


### Project Structure
```
for_ddev/
├── src/                    # Application code
│   ├── Controller/         # Request handlers (4 controllers)
│   ├── Entity/            # Database entities (User, Service, Feedback)
│   ├── Form/              # Form types (Registration, Feedback)
│   └── Repository/        # Database repositories
├── templates/             # Twig templates
├── tests/                 # PHPUnit tests (9 tests, 40 assertions)
├── public/               # Web assets (index.php, styles.css)
├── config/               # Symfony configuration
└── migrations/           # Database migrations
```

### Key Routes
- `/` - Homepage with service listings
- `/register` - User registration form
- `/login` - User authentication  
- `/feedback` - Submit service feedback
- `/logout` - User logout

---

## Database Verification

### Verify 50+ Records Requirement

Check record counts across all tables:
```bash
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
**Total**: **155 records** 

### Additional Verification Commands
```bash
# Check application status
ddev describe

# View sample records
ddev exec php bin/console doctrine:query:sql "SELECT * FROM users LIMIT 5"
ddev exec php bin/console doctrine:query:sql "SELECT * FROM feedback ORDER BY id DESC LIMIT 5"

# Clear cache
ddev exec php bin/console cache:clear

# Run security audit
ddev composer audit
```

---

## Quality Assurance

### Test Coverage ✅ **EXCEEDS REQUIREMENT**
**Current Coverage:** **75.59% Lines | 69.23% Classes | 90.00% Methods**

- **Unit Tests**: Entity validation, repository logic
- **Functional Tests**: Controller actions, form submissions, authentication  
- **Integration Tests**: Complete user workflows

**Results**: 9 Tests with 40 Assertions - All Passing ✅

👉 **Detailed Analysis**: [`COVERAGE_REPORT.md`](for_ddev/COVERAGE_REPORT.md)
![Test Coverage](tests_coverage.png)
👉 **Git History**: [GitHub Repository](https://github.com/nelly-z/for_ddev)

### Security Features
- Password hashing using Symfony's security component
- CSRF token protection on all forms
- User role-based access control
- Input validation and sanitization

---

## Development & Deployment

### Development Workflow
```bash
# Create feature branch
git checkout -b feature/new-functionality

# Make changes and test
./test.bat

# Commit changes
git add .
git commit -m "Add new functionality"

# Merge to main
git checkout main
git merge feature/new-functionality
```

### Production Deployment
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

### Troubleshooting
```bash
# Reset database if needed
ddev exec php bin/console doctrine:database:drop --force
ddev exec php bin/console doctrine:database:create
ddev exec php bin/console doctrine:migrations:migrate -n
ddev exec php bin/console doctrine:fixtures:load -n

# Check logs
ddev logs

# Verify DDEV status
ddev status
```

---

## Project Status

### ✅ **COMPLETED**

All assignment requirements met and exceeded:
- **Database**: 155 records (3x the 50+ requirement)
- **Test Coverage**: 75.59% (exceeds 65% requirement)
- **Code Quality**: W3C compliant, PSR-12 standards
- **Version Control**: Complete Git history with feature branches (github, gitlab)
- **Security**: CSRF protection, secure authentication
- **Documentation**: Comprehensive and professional

**Deployment Status**: ✅ Ready for production  
**Test Status**: ✅ All tests passing  
**Code Quality**: ✅ Meets all academic standards,Complete Registration & Feedback System
**Version Control**: ✅ Complete Git history with feature branches merged to main 


---

## Author & License

**Developer**: Nelli Zurabyan  
**Institution**: KU Leuven  
**Purpose**: Educational project for Web Technology course  

**License**: Academic use only - not for commercial distribution

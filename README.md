# Student Services Registration Website

## Project Description
A Symfony-based web application where students can register for various support services available on campus. Students can select services, register with their details, and later provide feedback about their experience.

## Features
- User registration with email/password authentication
- Service selection during registration
- User login/logout functionality
- Feedback form for registered users
- W3C compliant HTML/CSS
- Comprehensive test coverage (>65%)

## Technical Stack
- **Framework**: Symfony 7.3
- **Database**: MySQL 8.0
- **ORM**: Doctrine
- **Templating**: Twig
- **Testing**: PHPUnit
- **CSS**: Custom responsive design

## Installation

### Prerequisites
- PHP 8.2+
- Composer
- MySQL 8.0+
- DDEV (recommended for local development)

### Setup Instructions

1. **Install dependencies**:
   ```bash
   composer install
   ```

2. **Configure environment**:
   Copy `.env` to `.env.local` and update database credentials:
   ```env
   DATABASE_URL="mysql://db:db@db:3306/db?serverVersion=8.0"
   ```

3. **Setup database**:
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   php bin/console doctrine:fixtures:load
   ```

4. **Run development server**:
   ```bash
   symfony server:start
   ```

## Database Schema

### Entities
- **User**: Stores student registration information
- **Service**: Available campus services
- **Feedback**: Student feedback after receiving services

### Sample Data
The application includes fixtures that generate:
- 10 different services
- 60+ user records
- 80+ feedback entries

## Testing

Run the complete test suite:
```bash
php bin/phpunit
```

Generate coverage report:
```bash
php -d xdebug.mode=coverage vendor/bin/phpunit --coverage-html var/coverage
```

## Usage

1. **Registration**: Students can register at `/register`
2. **Login**: Access login form at `/login`
3. **Feedback**: Authenticated users can submit feedback at `/feedback`
4. **Home**: Landing page with navigation at `/`

## Project Structure
```
src/
├── Controller/     # Request handlers
├── Entity/         # Database entities
├── Form/          # Form types
├── Repository/    # Database repositories
└── DataFixtures/  # Sample data generation

templates/         # Twig templates
tests/            # PHPUnit tests
public/           # Web assets
config/           # Configuration files
```

## Author
Student Assignment Project

## License
MIT License
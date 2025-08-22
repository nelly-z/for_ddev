@echo off
REM Symfony Student Services Setup Script for Windows
echo Setting up Symfony Student Services Application...

REM Install PHP dependencies
echo Installing Composer dependencies...
composer install

REM Install required Symfony packages
echo Installing required Symfony packages...
composer require symfony/orm-pack symfony/security-bundle symfony/twig-bundle
composer require --dev symfony/maker-bundle symfony/test-pack dama/doctrine-test-bundle
composer require doctrine/doctrine-fixtures-bundle fakerphp/faker

REM Create database
echo Setting up database...
php bin/console doctrine:database:create --if-not-exists

REM Run migrations
echo Running database migrations...
php bin/console doctrine:migrations:migrate --no-interaction

REM Load fixtures
echo Loading sample data...
php bin/console doctrine:fixtures:load --no-interaction

REM Clear cache
echo Clearing cache...
php bin/console cache:clear

echo Setup complete! You can now run the application with:
echo php -S localhost:8000 -t public/
echo or
echo symfony server:start
pause
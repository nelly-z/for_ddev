@echo off
REM Test Script for Symfony Student Services Application
echo Running test suite for Symfony Student Services...

REM Run PHPUnit tests with DDEV
echo Running PHPUnit tests...
ddev exec php vendor/bin/phpunit --testdox

REM Generate coverage report with DDEV
echo Generating coverage report...
ddev exec php -d xdebug.mode=coverage vendor/bin/phpunit --coverage-html var/coverage --coverage-text

echo Tests completed! Coverage report available in var/coverage/
pause
#!/bin/bash

# Test Script for Symfony Student Services Application
echo "Running test suite for Symfony Student Services..."

# Run PHPUnit tests
echo "Running PHPUnit tests..."
php bin/phpunit

# Generate coverage report
echo "Generating coverage report..."
php -d xdebug.mode=coverage vendor/bin/phpunit --coverage-html var/coverage --coverage-text

echo "Tests completed! Coverage report available in var/coverage/"
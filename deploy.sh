#!/bin/bash

# Deployment Script for Symfony Student Services Application
echo "Deploying Symfony Student Services Application..."

# Set production environment
echo "Setting production environment..."
export APP_ENV=prod

# Install dependencies (production only)
echo "Installing production dependencies..."
composer install --no-dev --optimize-autoloader

# Clear and warm up cache
echo "Clearing and warming up cache..."
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

# Run migrations
echo "Running database migrations..."
php bin/console doctrine:migrations:migrate --no-interaction --env=prod

# Load fixtures if needed (uncomment for fresh deployment)
# echo "Loading sample data..."
# php bin/console doctrine:fixtures:load --no-interaction --env=prod

# Set proper permissions
echo "Setting file permissions..."
chmod -R 755 var/
chmod -R 755 public/

echo "Deployment complete!"
echo "Make sure to configure your web server to point to the public/ directory"
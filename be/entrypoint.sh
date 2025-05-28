#!/bin/bash

# Install Composer dependencies if not already installed
if [ ! -d "vendor" ]; then
  echo "Installing Composer dependencies..."
  composer install --no-interaction --prefer-dist --optimize-autoloader
fi

# Run the passed CMD (php artisan serve ...)
exec "$@"
#!/bin/sh
set -e # Exit immediately if a command exits with a non-zero status.

echo "Running entrypoint script..."

echo "Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "Running database migrations..."
php artisan migrate --force

echo "Seeding the database..."
php artisan db:seed --force

echo "Caching configuration for performance..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Starting Supervisor..."
# Start Supervisor, which manages the Nginx and PHP-FPM processes
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf

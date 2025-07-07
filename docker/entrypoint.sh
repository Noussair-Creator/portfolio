#!/bin/sh

# This script is the entrypoint for the Docker container.

# Clear any previous cached configuration
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Run Database Migrations
php artisan migrate --force

# Cache the configuration for performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start Supervisor, which manages the Nginx and PHP-FPM processes
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf

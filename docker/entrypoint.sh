#!/bin/sh

# Clear any previous cached configuration
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Cache the configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run Database Migrations
php artisan migrate --force

# Start Supervisor to run Nginx and PHP-FPM
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf

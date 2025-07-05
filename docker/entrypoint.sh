#!/bin/sh

# Run Database Migrations
php artisan migrate --force

# Start Supervisor to run Nginx and PHP-FPM
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf

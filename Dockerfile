# Stage 1: Install PHP dependencies
FROM composer:2.5 as vendor
WORKDIR /app
COPY . .
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Stage 2: Build frontend assets
FROM node:18 as node_assets
WORKDIR /app
COPY . .
RUN npm install && npm run build

# Stage 3: Final production image
FROM php:8.2-fpm

# Set working directory
WORKDIR /app

# Install system dependencies, including Nginx and Supervisor
RUN apt-get update && apt-get install -y \
    nginx \
    supervisor \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Copy application files from the current context
COPY . .

# Copy installed dependencies and built assets from previous stages
COPY --from=vendor /app/vendor/ ./vendor/
COPY --from=node_assets /app/public/build ./public/build

# Copy Nginx and Supervisor configuration files
COPY docker/nginx/default.conf /etc/nginx/sites-available/default
COPY docker/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Set correct file permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache
RUN chmod -R 775 /app/storage /app/bootstrap/cache

# Expose port 80 for Nginx
EXPOSE 80

# Start Supervisor to manage Nginx and PHP-FPM
CMD ["/usr/bin/supervisord"]

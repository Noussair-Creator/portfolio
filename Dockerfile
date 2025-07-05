# Use an official PHP image with FPM and Composer
FROM php:8.2-fpm as vendor

# Install system dependencies needed for Laravel
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libzip-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# --- THIS IS THE FIX ---
# 1. Copy ALL application files first
COPY . .

# 2. NOW run composer install, since the 'artisan' file is present
RUN composer install --no-interaction --optimize-autoloader --no-dev
# --- END OF FIX ---


# --- Build Node Assets ---
FROM node:18 as node_assets

WORKDIR /app

COPY --from=vendor /app .

RUN npm install && npm run build

# --- Final Production Image ---
FROM php:8.2-fpm

WORKDIR /app

# Copy vendor files from the first stage
COPY --from=vendor /app/vendor/ ./vendor/
# Copy node assets from the second stage
COPY --from=node_assets /app/public/build ./public/build
# Copy the rest of the application
COPY . .

# Set correct permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache
RUN chmod -R 775 /app/storage /app/bootstrap/cache

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]

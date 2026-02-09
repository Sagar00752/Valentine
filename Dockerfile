FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    curl

# Install PHP extensions
RUN docker-php-ext-install zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Laravel permissions (VERY IMPORTANT)
RUN chmod -R 777 storage bootstrap/cache

# Laravel optimizations (Recommended)
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

# Expose port for Render
EXPOSE 10000

# Start Laravel server
CMD php -S 0.0.0.0:10000 -t public

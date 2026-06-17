FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip \
    nginx

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions required for Laravel & Postgres
RUN docker-php-ext-install pdo pdo_pgsql mbstring EXIF pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Install dependencies
RUN composer install --no-dev --no-interaction --optimize-autoloader

# Setup Nginx configuration
COPY ./nginx.conf /etc/nginx/sites-available/default

# Set permissions for Laravel storage
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expose port 80
EXPOSE 80

# Run build optimization scripts and start Nginx & PHP-FPM
CMD php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    service nginx start && \
    php-fpm

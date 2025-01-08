# Use the official PHP image with Apache
FROM php:8.1-apache

# Install necessary PHP extensions
RUN apt-get update && apt-get install -y \
    zip unzip git curl libzip-dev libpng-dev libonig-dev \
    && docker-php-ext-install pdo_mysql mbstring zip gd

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy application code to the container
COPY . /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]

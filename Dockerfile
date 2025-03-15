FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    # git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Clear cache

# Install PHP extensions required for Laravel with PostgreSQL
RUN docker-php-ext-install pdo_pgsql pgsql mbstring exif pcntl bcmath gd

# Enable Apache modules
RUN a2enmod rewrite

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy composer files first to leverage Docker cache
COPY src/composer.json ./

# Install composer dependencies
RUN composer install --no-scripts --no-autoloader

# Copy existing application directory
COPY src/ .

# Generate optimized autoload files
# RUN composer dump-autoload --optimize

# Set permissions
# RUN chown -R www-data:www-data /var/www/html \
#     && chmod -R 755 /var/www/html/storage \
#     && chmod -R 755 /var/www/html/bootstrap/cache

# Configure Apache
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["apache2-foreground"] 
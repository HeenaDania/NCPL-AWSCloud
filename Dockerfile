FROM php:8.2-apache

# Update package list and install necessary dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    zlib1g-dev \
    libzip-dev \
    unzip \
    --no-install-recommends

# Install necessary extensions with error handling
RUN docker-php-ext-configure gd --with-jpeg=/usr/include/ \
  && docker-php-ext-install -j$(nproc) gd mysqli pdo pdo_mysql zip \
  || { echo "Failed to install PHP extensions."; exit 1; }

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application code
COPY . /var/www/html/

# Copy Apache configuration file
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Disable default site and enable new site
RUN a2dissite 000-default.conf && \
    ln -s /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-enabled/000-default.conf

# Enable rewrite module
RUN a2enmod rewrite

# Install dependencies
WORKDIR /var/www/html

# Create the images directory
RUN mkdir -p images

# Set file permissions - crucial for image uploads
RUN chown -R www-data:www-data images/
RUN chmod -R 755 images/

RUN composer install --no-dev --optimize-autoloader

# Create storage and cache directories
RUN mkdir -p /var/www/html/storage
RUN mkdir -p /var/www/html/bootstrap/cache

# Set file permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Switch to the www-data user - MUST BE AFTER CHOWN
USER www-data

EXPOSE 80

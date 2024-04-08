FROM php:8.2.17-apache

# Set working directory
WORKDIR /var/www/html

# Install necessary packages
RUN apt-get update && apt-get install -y \
    libpng-dev \
    zlib1g-dev \
    libxml2-dev \
    libzip-dev \
    libonig-dev \
    zip \
    curl \
    unzip \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    && docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-ext-install exif \
    && docker-php-source delete

# Copy configuration files and application code
COPY ./backend/.docker/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY ./backend/ /var/www/html/
COPY ./backend/.env.example /var/www/html/.env

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN php artisan key:generate --ansi

# Ensure storage directory exists and is writable
RUN php -r "file_exists('storage') || mkdir('storage', 0777, true);"
RUN php -r "file_exists('bootstrap/cache') || mkdir('bootstrap/cache', 0777, true);"
RUN php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite', 0777, true);"
RUN php artisan migrate --graceful --ansi

# Set permissions for Apache and enable mod_rewrite
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

# Use the official PHP image as a parent image
FROM php:8.1-fpm

# Set working directory
WORKDIR /hr_manage

# Install system dependencies
RUN sudo apt-get update && sudo apt-get install -y \
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
    libxml2-dev \
    libzip-dev \
    libmcrypt-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo mbstring zip exif pcntl gd

# Clear cache
RUN sudo apt-get clean

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . /hr_manage

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /hr_manage

# Expose port 9000 and start php-fpm server
EXPOSE 8080
CMD ["sudo php artisan serve --host=0.0.0.0 --port=8080"]

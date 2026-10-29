FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    curl \
    zip \
    supervisor \
    unzip \
    nodejs \
    npm \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    unixodbc \
    unixodbc-dev \
    g++ \
    gnupg \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    pdo_pgsql \
    pgsql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    xml \
    zip \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/* /var/cache/apt/archives/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Working directory
WORKDIR /var/www

# Optional permissions (Laravel storage/cache)
RUN mkdir -p storage bootstrap/cache && \
    chown -R www-data:www-data /var/www

# Install Microsoft ODBC Driver
RUN apt-get update && apt-get install -y \
    gnupg2 \
    unixodbc-dev \
    curl
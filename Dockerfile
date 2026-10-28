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

# Add Microsoft repository and install ODBC Driver 18
RUN curl -fsSL https://packages.microsoft.com/keys/microsoft.asc -o /tmp/microsoft.asc && \
    gpg --dearmor /tmp/microsoft.asc && \
    mv /tmp/microsoft.asc.gpg /usr/share/keyrings/microsoft-prod.gpg && \
    echo "deb [arch=amd64 signed-by=/usr/share/keyrings/microsoft-prod.gpg] https://packages.microsoft.com/debian/12/prod bookworm main" > /etc/apt/sources.list.d/mssql-release.list && \
    apt-get update && \
    ACCEPT_EULA=Y apt-get install -y msodbcsql18

# Install PHP SQL Server extensions
RUN pecl install sqlsrv pdo_sqlsrv && \
    docker-php-ext-enable sqlsrv pdo_sqlsrv
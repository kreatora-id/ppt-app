FROM dunglas/frankenphp:php8.3

ENV SERVER_NAME=":80"

WORKDIR /app

COPY . /app

# Install dependencies dan ekstensi PHP yang dibutuhkan Laravel
RUN apt update && apt install -y \
    zip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    mariadb-client \
    && docker-php-ext-install zip pdo pdo_mysql \
    && docker-php-ext-enable zip pdo pdo_mysql

# Tambahkan composer
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

RUN composer install --no-interaction --optimize-autoloader

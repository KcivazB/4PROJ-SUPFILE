# Base PHP 8.2 FPM
FROM php:8.2-fpm

# Install system dependencies useful for Symfony
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install intl mbstring pdo_mysql zip \
    && docker-php-ext-enable intl mbstring pdo_mysql zip

# Symfony required extensions that are already installed by default
# Ctype, iconv, PCRE, Session, SimpleXML, Tokenizer

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

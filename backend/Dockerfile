# Base PHP 8.2 FPM
FROM php:8.2-fpm

# Installer dépendances système utiles pour Symfony
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install intl mbstring pdo_mysql zip \
    && docker-php-ext-enable intl mbstring pdo_mysql zip

# Extensions requises par Symfony qui sont déjà installées par défaut
# Ctype, iconv, PCRE, Session, SimpleXML, Tokenizer

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

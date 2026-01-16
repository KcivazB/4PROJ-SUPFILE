# =====================
# Base PHP
# =====================
FROM php:8.4-fpm

# Installer les dépendances système nécessaires à Symfony
RUN apt-get update && apt-get install -y \
    git unzip libicu-dev libonig-dev libzip-dev \
    && docker-php-ext-install intl mbstring pdo_mysql zip \
    && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# =====================
# Commande de démarrage
# =====================
CMD [ "sh", "-c", "\
  echo 'Démarrage du serveur PHP…' && \
  php -S 0.0.0.0:8000 -t public \
"]

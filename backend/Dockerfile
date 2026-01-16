# =====================
# Base PHP
# =====================
FROM php:8.4-fpm

# Installer les dépendances système nécessaires à Symfony
RUN apt-get update && apt-get install -y \
    git unzip libicu-dev libonig-dev libzip-dev libpq-dev \
    && docker-php-ext-install intl mbstring pdo_pgsql zip \
    && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --prefer-dist --no-scripts

# =====================
# Commande de démarrage
# =====================
CMD [ "sh", "-c", "\
  echo 'Démarrage du serveur PHP…' && \
  php bin/console doctrine:migrations:migrate --no-interaction --allow-no-migration && \
  php -S 0.0.0.0:8000 -t public \
"]

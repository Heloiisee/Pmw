# 📦 Base PHP CLI
FROM php:8.2-cli

# 🧰 Dépendances système
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    libpq-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    ghostscript \
    poppler-utils \
    wkhtmltopdf \
    gnupg \
    && docker-php-ext-install \
        pdo \
        pdo_pgsql \
        zip \
        mbstring \
        exif \
        pcntl \
        intl

# 📦 Installer Node.js 20
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# 🧰 Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 📁 Répertoire de travail
WORKDIR /var/www

# 📁 Copier les fichiers
COPY . .

# 🧶 Installer les dépendances PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# 🧶 Installer les dépendances JS et compiler Vite
RUN npm install
RUN npm run build

# 🔐 Cacher les configurations Laravel (clé + cache)
RUN php artisan key:generate && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# 🔓 Permissions
RUN chown -R www-data:www-data /var/www && \
    chmod -R 755 /var/www/storage

# 🚀 Lancer Laravel
CMD sh -c "php artisan migrate --force || echo 'Migration failed' && php artisan serve --host=0.0.0.0 --port=8000"

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
    nodejs \
    npm \
    && docker-php-ext-install \
        pdo \
        pdo_pgsql \
        zip \
        mbstring \
        exif \
        pcntl \
        intl

# 🧰 Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 📁 Répertoire de travail
WORKDIR /var/www

# 📁 Copier le reste du projet
COPY . .

# 🔁 Pré-copie pour cache Composer
COPY composer.json composer.lock ./
RUN composer install --no-interaction --prefer-dist --optimize-autoloader



# 🧶 Installer les dépendances front + compiler Vite
RUN npm install
RUN npm run build

# 🔐 Laravel configuration
RUN php artisan key:generate && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# 🗂️ Donner les droits nécessaires
RUN chown -R www-data:www-data /var/www && \
    chmod -R 755 /var/www/storage

# 🚀 Commande de démarrage
CMD sh -c "php artisan migrate --force || echo 'Migration failed' && php artisan serve --host=0.0.0.0 --port=8000"

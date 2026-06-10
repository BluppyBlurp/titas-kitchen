FROM php:8.4-fpm-alpine

# System deps in one layer
RUN apk add --no-cache \
    nginx \
    nodejs \
    npm \
    postgresql-dev \
    zip \
    unzip \
    curl \
    dos2unix \
    oniguruma-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql mbstring xml bcmath fileinfo

# Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy composer files first (layer cache)
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

# Copy package files and install JS deps
COPY package.json package-lock.json ./
RUN npm ci

# Copy rest of source
COPY . .

# Run composer scripts now that full source is available
RUN composer run-script post-autoload-dump || true

# Build Vite assets
RUN npm run build

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Fix line endings and set up scripts
COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/start.sh /start.sh
RUN dos2unix /start.sh && chmod +x /start.sh

EXPOSE 8080
CMD ["/start.sh"]
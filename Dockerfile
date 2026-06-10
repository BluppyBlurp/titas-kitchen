FROM php:8.4-fpm-alpine

# System deps
RUN apk add --no-cache \
    nginx \
    nodejs \
    npm \
    postgresql-dev \
    zip \
    unzip \
    curl \
    oniguruma-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql mbstring xml bcmath fileinfo

# Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Layer cache for deps
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

COPY package.json package-lock.json ./
RUN npm ci

COPY . .

RUN composer run-script post-autoload-dump || true
RUN npm run build

RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

COPY docker/nginx.conf /etc/nginx/http.d/default.conf

EXPOSE 8080

CMD sh -c "php artisan migrate --force && php artisan config:cache && php artisan route:cache && php artisan view:cache && php-fpm -D && nginx -g 'daemon off;'"
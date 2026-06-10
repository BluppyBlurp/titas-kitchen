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
    bash \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev

# PHP extensions
RUN docker-php-ext-install \
    pdo \
    pdo_pgsql \
    pgsql \
    mbstring \
    xml \
    bcmath \
    fileinfo

# Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy source
COPY . .

# Install PHP deps
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Install JS deps + build assets
RUN npm ci && npm run build

# Storage permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# NGINX config
COPY docker/nginx.conf /etc/nginx/http.d/default.conf

EXPOSE 8080

COPY docker/start.sh /start.sh
RUN chmod +x /start.sh

CMD ["/start.sh"]
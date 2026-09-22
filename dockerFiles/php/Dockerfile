FROM php:8.3.21-fpm-alpine3.20

WORKDIR /var/www/html

RUN apk add --no-cache \
    bash \
    curl \
    git \
    zip \
    unzip \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    libxpm-dev \
    freetype-dev \
    libzip-dev \
    oniguruma-dev \
    openssl-dev \
    postgresql-dev

# PHP extensionlar (Laravel uchun zarur)
RUN docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
        --with-webp \
    && docker-php-ext-install \
        pdo \
        pdo_pgsql \
        gd \
        zip \
        mbstring \
        exif \
        pcntl \
        bcmath

# Composer (Laravel o'rnatish uchun)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html

USER www-data

EXPOSE 9000

CMD ["php-fpm"]

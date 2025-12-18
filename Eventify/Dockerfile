FROM php:8.4-fpm-alpine AS builder

RUN apk add --no-cache \
    git \
    unzip \
    libzip-dev \
    icu-dev

RUN docker-php-ext-install zip intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.json composer.lock symfony.lock ./

RUN composer install --no-scripts --no-progress --prefer-dist

COPY . .

RUN composer dump-autoload --optimize

FROM php:8.4-fpm-alpine

RUN apk add --no-cache \
    icu-libs \
    libzip

RUN apk add --no-cache --virtual .build-deps \
    libzip-dev \
    icu-dev \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    zip \
    intl \
    opcache \
    && apk del .build-deps

WORKDIR /var/www/html

COPY --from=builder /var/www/html/vendor ./vendor
COPY . .

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN sed -i 's/\r$//' /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

ENTRYPOINT ["docker-entrypoint"]
CMD ["php-fpm"]
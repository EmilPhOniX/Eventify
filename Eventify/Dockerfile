FROM php:8.4-fpm AS builder

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libicu-dev

RUN docker-php-ext-install zip intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.json composer.lock symfony.lock ./

RUN composer install --no-scripts --no-progress --no-autoloader

COPY . .

RUN composer dump-autoload --optimize

FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    libzip-dev \
    libicu-dev \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    zip \
    intl \
    opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY --from=builder /var/www/html/vendor ./vendor
COPY . .

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

ENTRYPOINT ["docker-entrypoint"]
CMD ["php-fpm"]
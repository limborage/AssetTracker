FROM composer:latest AS build

WORKDIR /var/www/html

COPY composer.* ./

RUN composer install --no-dev --no-scripts --ignore-platform-reqs

COPY . .

RUN composer dump-autoload --no-dev --optimize

FROM php:8.1-fpm-alpine AS application

RUN apk update & apk add \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    icu-dev \
    oniguruma-dev \
    $PHPIZE_DEPS

RUN docker-php-ext-install pdo_mysql zip bcmath

WORKDIR /var/www/html

COPY --from=build /var/www/html/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host", "0.0.0.0"]

FROM php:7.4-fpm-alpine

WORKDIR /var/www/html

RUN apk add --no-cache git freetype-dev libjpeg-turbo-dev libpng-dev \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install gd exif pdo pdo_mysql

CMD php artisan serve --host=0.0.0.0 --port=9000

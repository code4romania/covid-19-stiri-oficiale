FROM php:7.4-fpm-alpine

WORKDIR /var/www/html

RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
  docker-php-ext-configure gd
RUN apk add libpng
RUN docker-php-ext-install pdo pdo_mysql

CMD php artisan serve --host=0.0.0.0 --port=9000

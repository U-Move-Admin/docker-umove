FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql
RUN apk upgrade --update && apk add --no-cache libgd freetype-dev jpeg-dev libjpeg-turbo-dev libwebp-dev libpng-dev 
RUN docker-php-ext-install -j$(nproc) gd

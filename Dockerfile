FROM php:8.0-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql
RUN apk upgrade --update && apk add --no-cache libgd freetype-dev jpeg-dev libjpeg-turbo-dev libwebp-dev libpng-dev 
RUN docker-php-ext-install -j$(nproc) gd

# Install Composer
RUN apk --no-cache add curl \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Optional: Install bash
RUN apk add --no-cache bash
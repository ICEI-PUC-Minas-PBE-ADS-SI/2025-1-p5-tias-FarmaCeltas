FROM php:8.4-fpm-alpine

WORKDIR /var/www/html

RUN apk add --no-cache postgresql-dev && \
    docker-php-ext-install pdo pdo_pgsql

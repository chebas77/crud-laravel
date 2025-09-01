FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
 && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
 && a2enmod rewrite

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ARG APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri "s|/var/www/html|${APACHE_DOCUMENT_ROOT}|g" /etc/apache2/sites-available/000-default.conf \
 && sed -ri "s|/var/www/|${APACHE_DOCUMENT_ROOT}/../|g" /etc/apache2/apache2.conf

WORKDIR /var/www/html

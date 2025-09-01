# Imagen base con PHP y Apache
FROM php:8.2-apache

# Instalar dependencias necesarias para Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo_mysql mbstring zip

# Configurar Apache DocumentRoot para Laravel
ARG APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri "s|/var/www/html|${APACHE_DOCUMENT_ROOT}|g" /etc/apache2/sites-available/000-default.conf \
    && sed -ri "s|/var/www/|${APACHE_DOCUMENT_ROOT}/../|g" /etc/apache2/apache2.conf

# Habilitar mod_rewrite y configuración para Laravel
RUN a2enmod rewrite
RUN echo '<Directory /var/www/html/public>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/laravel.conf \
    && a2enconf laravel

# Copiar composer desde imagen oficial
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Dar permisos a Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

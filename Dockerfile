# Establece DocumentRoot en /var/www/html/public
ARG APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri "s|/var/www/html|${APACHE_DOCUMENT_ROOT}|g" /etc/apache2/sites-available/000-default.conf \
    && sed -ri "s|/var/www/|${APACHE_DOCUMENT_ROOT}/../|g" /etc/apache2/apache2.conf

# Habilitar mod_rewrite y dar permisos a public/
RUN a2enmod rewrite
RUN echo '<Directory /var/www/html/public>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/laravel.conf \
    && a2enconf laravel

FROM php:7.4-apache

WORKDIR /var/www/html

RUN docker-php-ext-install pdo_mysql mysqli \
    && a2enmod rewrite

COPY . /var/www/html/

# Ensure Apache can read app files.
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

FROM php:7.2-apache

WORKDIR /app
RUN docker-php-ext-install mysqli
HEALTHCHECK CMD curl -f http://localhost/healthy

COPY . /var/www/html/
FROM php:7.2-apache

WORKDIR /app
RUN docker-php-ext-install mysqli
HEALTHCHECK --interval=1m --timeout=3s CMD curl -f http://localhost/healthy

COPY . /var/www/html/
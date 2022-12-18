#FROM php:8.0-apache
FROM php:8.1-fpm

RUN docker-php-ext-install pdo pdo_mysql
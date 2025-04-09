# Use PHP with Apache
FROM php:8.2-apache

# Copy current directory to Apache web root
COPY . /var/www/html/

# Enable mod_rewrite (optional)
RUN a2enmod rewrite

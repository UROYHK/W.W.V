FROM php:8.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy project files to Apache web root
COPY . /var/www/html/

# Enable mod_rewrite (optional)
RUN a2enmod rewrite

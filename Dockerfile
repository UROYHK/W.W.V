FROM php:8.2-apache

# Install PostgreSQL PDO extension
RUN docker-php-ext-install pdo pdo_pgsql


# Copy project files to Apache web root
COPY . /var/www/html/

# Enable mod_rewrite (optional)
RUN a2enmod rewrite

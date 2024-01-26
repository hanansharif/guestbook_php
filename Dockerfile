# Use the official PHP Apache image
FROM php:8.0-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the contents of the local directory to the working directory in the container
COPY . /var/www/html/

# Install mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Expose port 80 to the outside world
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
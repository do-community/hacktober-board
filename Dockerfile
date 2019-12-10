FROM php:7.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    # Needed for composer install
    zip \
    unzip\
    # Needed for testing DB readiness
    default-mysql-client

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add UID '1000' to www-data
RUN usermod -u 1000 www-data

# Create system user to run Composer
RUN useradd -ms /bin/bash composer

# Directory is initially owned by root:root. Change it so composer will be able to write
RUN chown www-data:composer /var/www

# Make the directory's group permissions match the owner permissions
RUN chmod g=u /var/www

# Set working directory
WORKDIR /var/www

# Copy files needed by composer
COPY ./composer.json /var/www/composer.json
COPY ./composer.lock /var/www/composer.lock

# Copy only files required by composer post-autoload-dump script (artisan package:discover --ansi)
COPY ./app/Console/Kernel.php /var/www/app/Console/Kernel.php
COPY ./app/Exceptions/Handler.php /var/www/app/Exceptions/Handler.php
COPY ./app/Providers /var/www/app/Providers
COPY ./bootstrap /var/www/bootstrap
COPY ./config /var/www/config
COPY ./database /var/www/database
COPY ./routes /var/www/routes
COPY ./storage /var/www/storage
COPY ./artisan /var/www/artisan

# Update permissions of copied files
RUN chown -R composer:www-data /var/www
RUN chmod -R g=u /var/www

# Run Composer Install as user composer
USER composer
RUN /usr/local/bin/composer install

# As long as you haven't changed any of the above files since last build, image should be cached beyond this point
# Yay, no more unnecessary composer installs!!!

# Change current user to www-data
USER www-data

# artisan key:generate requires .env, but it's in .dockerignore so get it from here
COPY --chown=www-data:www-data ./.env.example /var/www/.env

# Generate App Key
RUN php artisan key:generate

# Expose port 8000 to the host OS
EXPOSE 8000

# Set the default command to start the php-fpm server - can be overridden by docker-compose
CMD ["php-fpm"]

FROM composer:2 AS composer


#FROM php:8.2 AS build-stage
#COPY --from=composer /usr/bin/composer /usr/bin/composer
#
#WORKDIR /app
#COPY . /app
##COPY ./bin /app/bin
##COPY ./config /app/config
##COPY ./src /app/src
##COPY ./templates /app/templates
##COPY ./composer.json ./composer.lock /app/
#RUN composer install --no-dev --no-scripts --no-interaction
#RUN mkdir -p /app/webroot/cache/{css,fonts,js,img}


# Use an Nginx base image
FROM nginx

ARG PHP_VERSION=8.2

# Install PHP and PHP-FPM
RUN export DEBIAN_FRONTEND=noninteractive && \
    apt-get update -y && \
    apt-get install -y \
    curl unzip git \
    php${PHP_VERSION}-fpm \
    php${PHP_VERSION}-common \
    php${PHP_VERSION}-cli \
    php${PHP_VERSION}-curl \
    php${PHP_VERSION}-intl \
    php${PHP_VERSION}-mysql \
    php${PHP_VERSION}-pdo \
    php${PHP_VERSION}-sqlite3 \
    php${PHP_VERSION}-xml \
    php${PHP_VERSION}-xsl \
    php${PHP_VERSION}-simplexml \
    php${PHP_VERSION}-dom \
    php${PHP_VERSION}-mbstring \
    php${PHP_VERSION}-soap

# Remove the default Nginx configuration file
RUN rm /etc/nginx/conf.d/default.conf

# Copy your Nginx configuration file
COPY ./docker/etc/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/etc/nginx/cakesite.conf /etc/nginx/conf.d/default.conf

# Copy your PHP-FPM configuration file
COPY ./docker/etc/php/php-fpm-pool-www.conf /etc/php/${PHP_VERSION}/fpm/pool.d/www.conf
RUN service php${PHP_VERSION}-fpm restart

# Copy your application code into the container
WORKDIR /app
COPY . /app

# Install application dependencies via composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --no-scripts --no-interaction

# Setup directories
RUN mkdir -p /app/webroot/cache/{css,fonts,js,img}


# Expose port 80
EXPOSE 80

CMD service php8.2-fpm start && nginx -g "daemon off;"
#CMD ["service", "php${PHP_VERSION}-fpm", "start", "&&", "nginx", "-g", "daemon off;"]
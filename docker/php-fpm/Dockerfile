FROM php:8.1.1-fpm-alpine

# Install system dependencies
RUN apk update && apk add --no-cache $PHPIZE_DEPS \
        git \
        zip \
        unzip \
        curl-dev \
        acl \
        gettext \
        icu-dev \
    && pecl install xdebug apcu

## Install php extensions
RUN docker-php-ext-install pdo_mysql \
    && docker-php-ext-install curl \
    && docker-php-ext-install opcache \
    && docker-php-ext-install bcmath \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

### Copy php default configuration
#COPY config/default.ini /usr/local/etc/php/conf.d/default.ini
#
### Copy php opcache JIT configuration
#COPY config/opcache.ini /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

WORKDIR /app

## Install composer
RUN curl -sS -k https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer



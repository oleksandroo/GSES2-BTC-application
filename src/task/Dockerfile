FROM php:8.1-fpm-alpine

RUN docker-php-ext-install pdo_mysql bcmath opcache
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY .docker/php.ini $PHP_INI_DIR/conf.d/opcache.ini
RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini
RUN adduser --disabled-password --gecos "" --uid 1000 task
USER task
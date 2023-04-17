FROM php:8.1-fpm

ARG PHP_MODE

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY supervisor.conf /etc/supervisor/conf.d/supervisor.conf

RUN mv "$PHP_INI_DIR/php.ini-$PHP_MODE" "$PHP_INI_DIR/php.ini" && \
    sed -ri -e 's!((post_max_size|upload_max_filesize) = ).M!\130M!g' $PHP_INI_DIR/php.ini && \
    apt-get update && \
    apt-get install -y supervisor unzip &&\
    docker-php-ext-install bcmath pdo_mysql

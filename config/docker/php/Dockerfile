FROM php:7.2-fpm-alpine

RUN apk add --no-cache --update icu-dev libpng libpng-dev libjpeg-turbo \
    libjpeg-turbo-dev imagemagick imagemagick-dev postgresql-dev

RUN NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
    NJOBS=$((NPROC*4)) && \
    docker-php-ext-configure gd \
            --with-gd \
            --with-png-dir=/usr/include/ \
            --with-jpeg-dir=/usr/include/ && \
    docker-php-ext-install -j${NJOBS} pgsql pdo pdo_mysql pdo_pgsql mbstring intl pcntl gd exif bcmath opcache zip

RUN docker-php-source extract && \
    apk add --no-cache --virtual .phpize-deps-configure $PHPIZE_DEPS autoconf g++ libtool make && \
    pecl install apcu imagick && \
    docker-php-ext-enable apcu imagick && \
    apk del .phpize-deps-configure && \
    docker-php-source delete

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    mv composer.phar /usr/local/bin/composer && \
    php -r "unlink('composer-setup.php');"

RUN mkdir -p /scripts/vendor && \
    chown -R www-data: /scripts/vendor

USER www-data

RUN composer global require hirak/prestissimo

ADD conf.d/ /usr/local/etc/php/conf.d/

WORKDIR /scripts

EXPOSE 9000

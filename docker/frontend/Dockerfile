FROM yiisoftware/yii2-php:8.1-fpm-min

RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN apt-get update && apt-get install -y libpq-dev
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pdo_pgsql

COPY ./php/conf.d /usr/local/etc/php/conf.d
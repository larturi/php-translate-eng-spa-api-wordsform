ARG php_version

FROM php:${php_version}

RUN docker-php-ext-install apt install curl php-cli php-mbstring git unzip

RUN a2enmod rewrite

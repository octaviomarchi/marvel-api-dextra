FROM php:7.4-cli

RUN mkdir -p /usr/src/app
WORKDIR /usr/src/app
COPY . .

RUN apt-get update
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql
RUN apt update && apt install -y zip git
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
  && php composer-setup.php && rm composer-setup.php \
  && mv composer.phar /usr/local/bin/composer \
  && chmod a+x /usr/local/bin/composer
RUN composer install --no-scripts --no-autoloader
COPY . ./
RUN composer dump-autoload --optimize

CMD php -S 0.0.0.0:8000 -t public
EXPOSE 8000

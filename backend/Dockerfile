FROM composer:latest as composer_build

RUN composer global require hirak/prestissimo

COPY composer.lock composer.json /tmp/composer/
COPY app/AppCache.php app/AppKernel.php /tmp/composer/app/

RUN composer install --prefer-dist --no-scripts --no-interaction --working-dir=/tmp/composer

FROM php:apache

COPY . /var/www/project/
COPY --from=composer_build /tmp/composer/ /var/www/project/
COPY website.conf /etc/apache2/sites-enabled/website.conf

RUN a2enmod rewrite
RUN mkdir /var/www/project/var/cache /var/www/project/var/logs /var/www/project/var/sessions
RUN chown -R www-data:www-data /var/www/project/var/cache /var/www/project/var/logs /var/www/project/var/sessions
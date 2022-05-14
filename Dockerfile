FROM php:8.1.4-apache

ARG DB_HOST
ARG DB_DATABASE
ARG DB_USERNAME
ARG DB_PASSWORD


RUN apt-get update -y && apt-get install -y openssl zip unzip git 
RUN docker-php-ext-install pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY . /var/www/html
COPY ./public/.htaccess /var/www/html/.htaccess
WORKDIR /var/www/html
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

RUN cp .env.example .env
RUN sed -i "/DB_HOST=/c\DB_HOST=\"$DB_HOST\"" .env
RUN sed -i "/DB_DATABASE=/c\DB_DATABASE=\"$DB_DATABASE\"" .env
RUN sed -i "/DB_USERNAME=/c\DB_USERNAME=\"$DB_USERNAME\"" .env
RUN sed -i "/DB_PASSWORD=/c\DB_PASSWORD=\"$DB_PASSWORD\"" .env

RUN cat .env

RUN php artisan key:generate
RUN php artisan migrate
RUN chmod -R 777 storage
RUN php artisan db:seed
RUN a2enmod rewrite
RUN service apache2 restart
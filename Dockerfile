FROM yiisoftware/yii2-php:8.4-apache

WORKDIR /app

COPY . ./

RUN composer install --optimize-autoloader --no-interaction
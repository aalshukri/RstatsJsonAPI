FROM php:7-apache

#
#RUN apt-get update && apt-get install -y mysql-client libmysqlclient-dev && docker-php-ext-install mysqli
#RUN apt-get update && apt-get install -y mysql-client && docker-php-ext-install mysqli

RUN apt-get update -y && apt-get install -y libpng-dev curl libcurl4-openssl-dev

RUN docker-php-ext-install mysqli

RUN docker-php-ext-install pdo pdo_mysql gd curl




RUN a2enmod rewrite
RUN service apache2 restart

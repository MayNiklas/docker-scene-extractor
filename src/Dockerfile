ARG ARCH=
FROM ${ARCH}php:7.2-apache

RUN apt-get update && \
    apt-get -y upgrade

RUN apt-get install -y \
    handbrake-cli \
    libimage-exiftool-perl

COPY html/ /var/www/html/

CMD chown -R www-data:www-data /var/www/html/dl/ && \
    apachectl -D FOREGROUND

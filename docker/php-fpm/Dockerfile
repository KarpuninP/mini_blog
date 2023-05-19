FROM php:7.4-fpm-alpine

RUN apk update \
    && apk upgrade \
    && apk add unzip autoconf g++ make mysql-dev libzip-dev libxml2-dev libjpeg-turbo-dev libpng-dev libwebp-dev  imap-dev unixodbc unixodbc-dev ldb-dev libldap openldap-dev gettext-dev oniguruma-dev freetype-dev krb5-pkinit krb5-dev krb5 \
    && rm -rf /var/lib/apt/lists/*
    
RUN docker-php-ext-install mysqli pdo_mysql zip xmlrpc dba gd imap  sockets soap  ldap gettext exif  mbstring \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-configure mysqli --with-mysqli=mysqlnd 

   
RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY www.conf /usr/local/etc/php-fpm.d/

USER 1000:1000

WORKDIR /var/www/wp

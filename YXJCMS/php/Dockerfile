FROM hub.c.163.com/library/php:7.1-fpm-alpine

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories
# packages
RUN apk --update add \
    autoconf \
    build-base \
    linux-headers \
    libaio-dev \
    zlib-dev \
    curl \
    subversion \
    freetype-dev \
    libjpeg-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    libtool \
    libbz2 \
    bzip2 \
    bzip2-dev \
    libstdc++ \
    libxslt-dev \
    openldap-dev \
    make \
    unzip \
    wget

RUN docker-php-ext-install bcmath mcrypt zip bz2 pdo_mysql mysqli simplexml opcache sockets mbstring pcntl xsl
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install gd

RUN apk del build-base \
linux-headers \
libaio-dev \
&& rm -rf /var/cache/apk/*




#ENV COMPOSER_ALLOW_SUPERUSER 1
#ENV COMPOSER_HOME /tmp
#ENV COMPOSER_VERSION 1.5.1


#RUN curl -s -f -L https://raw.githubusercontent.com/composer/getcomposer.org/da290238de6d63faace0343efbdd5aa9354332c5/web/installer -o /tmp/installer.php

#RUN php -r " \
#    $signature = '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410'; \
#    $hash = hash('SHA384', file_get_contents('/tmp/installer.php')); \
#    if (!hash_equals(\$signature, \$hash)) { \
#        unlink('/tmp/installer.php'); \
#        echo 'Integrity check failed, installer is either corrupt or worse.' . PHP_EOL; \
#        exit(1); \
#    }" 

#RUN php /tmp/installer.php --no-ansi --install-dir=/usr/bin --filename=composer --version=${COMPOSER_VERSION}
#RUN rm /tmp/installer.php
#RUN composer --ansi --version --no-interaction

VOLUME /var/www
WORKDIR /var/www

CMD php-fpm

FROM quay.io/alexcheng1982/apache2-php7:7.0.32

RUN requirements="libpng12-dev libmcrypt-dev libmcrypt4 libcurl3-dev libfreetype6 libjpeg-turbo8 libjpeg-turbo8-dev libpng12-dev libfreetype6-dev libicu-dev libxslt1-dev unzip" \
    && apt-get update \
    && apt-get install -y $requirements \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && docker-php-ext-install mcrypt \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install zip \
    && docker-php-ext-install intl \
    && docker-php-ext-install xsl \
    && docker-php-ext-install soap \
    && requirementsToRemove="libpng12-dev libmcrypt-dev libcurl3-dev libpng12-dev libfreetype6-dev libjpeg-turbo8-dev" \
    && apt-get purge --auto-remove -y $requirementsToRemove

RUN chsh -s /bin/bash www-data
RUN chown -R www-data:www-data /var/www/html

COPY ./upgrade-magento /usr/local/bin/upgrade-magento
RUN chmod +x /usr/local/bin/upgrade-magento

COPY ./permission -changer /usr/local/bin/permission -changer
RUN chmod +x /usr/local/bin/permission -changer

COPY ./static-content /usr/local/bin/static-content
RUN chmod +x /usr/local/bin/static-content

COPY ./reindex /usr/local/bin/reindex
RUN chmod +x /usr/local/bin/reindex
	
COPY ./cache-clear /usr/local/bin/cache-clear
RUN chmod +x /usr/local/bin/cache-clear






RUN a2enmod rewrite
RUN echo "memory_limit=2048M" > /usr/local/etc/php/conf.d/memory-limit.ini

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

WORKDIR /var/www/html/






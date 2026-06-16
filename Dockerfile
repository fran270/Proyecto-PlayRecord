FROM php:7.6-apache

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
  zlib1g-dev \
  libzip-dev \
  && docker-php-ext-install zip mysqli pdo_mysql

RUN apt-get update && \
apt-get install -y sendmail

# Habilita el módulo de reescritura de Apache
RUN a2enmod rewrite

RUN echo "sendmail_path=/usr/sbin/sendmail -t -i" >> /usr/local/etc/php/conf.d/sendmail.ini 

# Copiar configuración personalizada de PHP
COPY php.ini /usr/local/etc/php/

# Copiar archivos de la aplicación
COPY . /var/www/html/

# Directorio tmp
RUN mkdir -p /tmp && chmod 777 /tmp

# Dar permisos necesarios
RUN chown -R www-data:www-data /var/www/html/

# Reinicia el servicio de Apache
RUN service apache2 restart




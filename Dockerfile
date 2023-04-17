FROM php:7.4-fpm-alpine

RUN docker-php-ext-install mysqli pdo pdo_mysql sockets && docker-php-ext-enable mysqli pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer​ | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establece el directorio de trabajo para Laravel
WORKDIR /var/www

# Copia los archivos de tu proyecto a la imagen
COPY . /var/www

# Instala las dependencias de Composer
RUN composer install

# Copia el archivo .env
COPY .env .env

# Expone el puerto 8000 para acceder a la aplicación desde fuera del contenedor
EXPOSE 8000
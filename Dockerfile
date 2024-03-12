# Use a imagem oficial do PHP com Apache
FROM php:8.2-fpm

# Instala as dependências do sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip

# Instala o Xdebug
RUN pecl install xdebug-3.2.1 \
	&& docker-php-ext-enable xdebug

# Configura a extensão GD para PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Instala o Composer globalmente
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho
WORKDIR /var/www

# Copia os arquivos do projeto para o container
COPY . /var/www

# Instala as dependências do projeto
RUN composer install

# Expõe a porta 9000
EXPOSE 9000

# Inicia o PHP-FPM
CMD ["php-fpm"]

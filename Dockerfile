# Use a imagem oficial do PHP com Apache
FROM php:8.0.25-apache

# Habilita módulos necessários do Apache
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip \
    && docker-php-ext-install pdo pdo_mysql \
    && a2enmod rewrite

# Cria o diretório de sessões e define as permissões
RUN mkdir -p /var/lib/php/sessions && \
    chown -R www-data:www-data /var/lib/php/sessions

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia o projeto PHP para o diretório do servidor
COPY . .

# Copia o arquivo php.ini para o diretório de configuração do PHP
COPY php.ini /usr/local/etc/php/

# Define as permissões adequadas (opcional)
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta padrão do Apache
EXPOSE 80

# Inicia o Apache em primeiro plano
CMD ["apache2-foreground"]

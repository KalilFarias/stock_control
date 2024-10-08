# Use a imagem oficial do PHP com Apache
FROM php:8.1-apache

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

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia o projeto PHP para o diretório do servidor
COPY . .

# Define as permissões adequadas (opcional)
RUN chown -R www-data:www-data /var/www/html

# Expõe a porta padrão do Apache
EXPOSE 80

# Inicia o Apache em primeiro plano
CMD ["apache2-foreground"]

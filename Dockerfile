FROM php:latest

# Instalação do driver PDO PostgreSQL
RUN apt-get update \
    && docker-php-ext-install pdo pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*




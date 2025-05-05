# Оптимизированный Dockerfile для Laravel на PHP 8.2 с PostgreSQL и исправленной установкой GD

FROM php:8.2-fpm

# Установим переменные окружения
ENV DEBIAN_FRONTEND=noninteractive

# Установим необходимые пакеты и расширения PHP
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libfreetype6-dev \
    libzip-dev \
    libpq-dev \
    libicu-dev \
    libonig-dev \
    libgmp-dev \
    libxml2-dev \
    wget \
    curl \
    gnupg2 \
    libcurl4-openssl-dev \
    && rm -rf /var/lib/apt/lists/*

# Установим расширение GD без параллельной сборки, чтобы избежать ошибки mkdir
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install gd

# Установим остальные PHP расширения параллельно
RUN docker-php-ext-install -j$(nproc) \
    intl \
    zip \
    pdo \
    pdo_mysql \
    mbstring \
    bcmath \
    exif \
    sockets \
    soap \
    fileinfo \
    gmp \
    pcntl

# Установим Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Установим рабочую директорию
WORKDIR /var/www

# Открытый порт для PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
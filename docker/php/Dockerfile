# Используем официальный PHP-FPM образ с версией 8.2
FROM php:8.2-fpm

# Устанавливаем необходимые пакеты и зависимости
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libonig-dev \
    libzip-dev \
    zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mbstring zip pdo pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Установка Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Открываем порты для доступа
EXPOSE 9000

# Запуск PHP-FPM
CMD ["php-fpm"]

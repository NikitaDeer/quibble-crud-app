# Используем официальный образ PHP с поддержкой FPM
FROM php:8.2-fpm

# Устанавливаем системные зависимости
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Устанавливаем зависимости приложения
WORKDIR /var/www
COPY . /var/www
RUN composer install

# Настройка прав доступа
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Экспонируем порт для PHP-FPM
EXPOSE 9000

# Запускаем PHP-FPM
CMD ["php-fpm"]

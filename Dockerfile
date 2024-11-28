# Используем официальный образ PHP с поддержкой FPM
FROM php:8.2-fpm

# Устанавливаем системные зависимости
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    curl \
    nodejs \
    npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd

# Устанавливаем Node.js и npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Устанавливаем рабочую директорию
WORKDIR /var/www

# Копируем файлы композера и package.json
COPY composer.json composer.lock package.json package-lock.json ./

# Устанавливаем зависимости PHP и Node.js
RUN composer install --no-scripts --no-autoloader \
    && npm install

# Копируем остальные файлы проекта
COPY . .

# Компилируем ассеты
RUN npm run build

# Генерируем автозагрузчик
RUN composer dump-autoload --optimize

# Настройка прав доступа
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Экспонируем порт для PHP-FPM
EXPOSE 9000

# Запускаем PHP-FPM
CMD ["php-fpm"]

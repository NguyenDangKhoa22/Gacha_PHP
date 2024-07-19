FROM php:8.2-fpm

# Cài đặt các tiện ích cần thiết
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libzip-dev \
    libmcrypt-dev \
    libicu-dev \
    libxslt1-dev

# Cài đặt các extension PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl xsl

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tạo thư mục làm việc
WORKDIR /var/www

# Copy toàn bộ mã nguồn vào container
COPY . .

# Chạy lệnh cài đặt các package PHP (nếu cần)
RUN composer install

# Phân quyền thư mục storage và bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expose cổng mặc định của PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]

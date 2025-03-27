# Sử dụng PHP 8.3 CLI với Alpine Linux
FROM php:8.3-cli-alpine

# Cài đặt Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Cài đặt các extension PHP cần thiết
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Tạo thư mục ứng dụng
WORKDIR /app

# Copy toàn bộ mã nguồn Laravel trước khi cài đặt thư viện
COPY . .

# Cấp quyền thực thi cho storage và bootstrap/cache (tránh lỗi quyền)
RUN chmod -R 777 storage bootstrap/cache

# Cài đặt thư viện PHP theo composer.lock
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --no-dev --optimize-autoloader

# Expose cổng 1000 để truy cập
EXPOSE 1000

# Chạy ứng dụng Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=1000"]
#!/bin/bash

echo "=== Creating required directories ==="
mkdir -p storage/app/public/dokumentasi
mkdir -p storage/app/livewire-tmp
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
chmod -R 777 storage
chmod -R 777 bootstrap/cache

echo "=== Copying php.ini ==="
cp .user.ini /tmp/php-custom.ini 2>/dev/null || true

echo "=== Running migrations ==="
php artisan migrate --force || true

echo "=== Publishing Filament assets ==="
php artisan filament:assets || true

echo "=== Storage link ==="
php artisan storage:link || true

echo "=== Starting server on port ${PORT:-8080} ==="
php -d upload_max_filesize=10M -d post_max_size=12M -d memory_limit=256M -S 0.0.0.0:${PORT:-8080} server.php

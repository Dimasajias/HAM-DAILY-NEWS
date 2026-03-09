#!/bin/bash

echo "=== Creating required directories ==="
mkdir -p storage/app/public/dokumentasi
mkdir -p storage/app/livewire-tmp
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
chmod -R 775 storage
chmod -R 775 bootstrap/cache

echo "=== Running migrations ==="
php artisan migrate --force || true

echo "=== Publishing Filament assets ==="
php artisan filament:assets || true

echo "=== Storage link ==="
php artisan storage:link || true

echo "=== Starting server on port ${PORT:-8080} ==="
php artisan serve --host=0.0.0.0 --port=${PORT:-8080} --no-reload

#!/bin/bash

echo "=== Clearing old cache ==="
php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true

echo "=== Running migrations ==="
php artisan migrate --force || true

echo "=== Storage link ==="
php artisan storage:link || true

echo "=== Starting PHP server on port ${PORT:-8080} ==="
php -S 0.0.0.0:${PORT:-8080} -t public

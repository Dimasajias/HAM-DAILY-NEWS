#!/bin/bash

echo "=== Starting PHP server on port ${PORT:-8080} ==="
php -S 0.0.0.0:${PORT:-8080} -t public &
SERVER_PID=$!

echo "=== Waiting for server to boot... ==="
sleep 3

echo "=== Running migrations in background ==="
php artisan config:clear || true
php artisan migrate --force || true
php artisan storage:link || true
php artisan config:cache || true
php artisan route:cache || true

echo "=== Setup complete, server running ==="
wait $SERVER_PID

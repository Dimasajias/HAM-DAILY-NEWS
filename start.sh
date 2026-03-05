#!/bin/bash

echo "=== Starting PHP server on port ${PORT:-8080} ==="
php -S 0.0.0.0:${PORT:-8080} -t public &
SERVER_PID=$!

echo "=== Waiting for server to boot... ==="
sleep 3

echo "=== FRESH migration + seed (one-time reset) ==="
php artisan migrate:fresh --seed --force || true

echo "=== Storage link ==="
php artisan storage:link || true

echo "=== Caching ==="
php artisan config:cache || true
php artisan route:cache || true

echo "=== Setup complete, server running ==="
wait $SERVER_PID

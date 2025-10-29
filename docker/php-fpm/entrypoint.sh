#!/bin/sh
set -e

# Ensure writable directories exist
mkdir -p /var/www/html/tmp /var/www/html/logs

# Fix permissions on bind-mounted dirs
chmod -R 0777 /var/www/html/tmp || true
chmod -R 0777 /var/www/html/logs || true

# Start php-fpm (master runs as root, workers drop to www-data)
exec "$@"

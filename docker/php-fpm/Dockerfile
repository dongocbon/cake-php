FROM php:8.2-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    bash \
    git \
    curl \
    libzip-dev \
    oniguruma-dev \
    icu-dev \
    zlib-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    postgresql-dev \
    mysql-client \
    $PHPIZE_DEPS

# Install PHP extensions needed for CakePHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
       pdo \
       pdo_mysql \
       intl \
       mbstring \
       zip \
       gd \
       opcache

# Opcache recommended defaults for dev
RUN { \
  echo 'opcache.enable=1'; \
  echo 'opcache.enable_cli=1'; \
  echo 'opcache.validate_timestamps=1'; \
  echo 'opcache.revalidate_freq=0'; \
} > /usr/local/etc/php/conf.d/opcache-recommended.ini

# Configure PHP error reporting for dev
RUN { \
  echo 'display_errors=On'; \
  echo 'display_startup_errors=On'; \
  echo 'error_reporting=E_ALL'; \
} > /usr/local/etc/php/conf.d/dev-error.ini

# Install Composer
ENV COMPOSER_HOME=/composer
ENV PATH="/composer/vendor/bin:${PATH}"
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create app dir
WORKDIR /var/www/html

# Copy Composer files if present to leverage caching
COPY composer.json composer.lock* ./
RUN if [ -f composer.json ]; then composer install --no-scripts --no-autoloader --prefer-dist --no-interaction || true; fi

# Copy source
COPY . /var/www/html

# Final install (dev friendly)
RUN if [ -f composer.json ]; then composer install --prefer-dist --no-interaction; fi

# Ensure correct permissions for writable dirs
RUN mkdir -p tmp cache logs \
    && chown -R www-data:www-data /var/www/html

# Copy entrypoint which fixes permissions on mounted volumes at runtime
COPY docker/php-fpm/entrypoint.sh /usr/local/bin/app-entrypoint.sh
RUN chmod +x /usr/local/bin/app-entrypoint.sh

EXPOSE 9000

ENTRYPOINT ["/usr/local/bin/app-entrypoint.sh"]
CMD ["php-fpm"]

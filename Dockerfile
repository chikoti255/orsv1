#using official php image
FROM php:8.2.12

#installing necessary system dependancy and php extensions
RUN apt-get update -y && apt-get install -y \
        git \
        curl \
        openssl \
        libpng-dev \
        libmariadb-dev \
        libonig-dev \
        libxml2-dev \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        zip \
        unzip \
        && docker-php-ext-configure gd --with-freetype --with-jpeg \
        && docker-php-ext-install gd pdo_mysql mbstring

#Installing composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer --version


#Setting working directory
WORKDIR /app
COPY composer.json composer.lock .

#Copying the entire application code
COPY . /app

#install dependancies
RUN composer install --no-dev --optimize-autoloader

EXPOSE 8081

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8081"]

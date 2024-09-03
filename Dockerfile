#using official php image
FROM php:8.2.12

#installing necessary system dependancy and php extensions
RUN apt-get update -y && apt-get install -y \
        git \
        curl \
        openssl \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        zip \
        unzip \
        && docker-php-ext-configure gd --with-freetype --with-jpeg

#Installing composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install gd pdo_mysql mbstring


#Setting working directory
WORKDIR /app
COPY composer.json composer.lock .

#install dependancies
RUN composer install --no-scripts
COPY . .

CMD php artisan serve --host=0.0.0.0 --port=8081
EXPOSE 8081

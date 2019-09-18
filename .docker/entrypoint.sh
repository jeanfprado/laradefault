#!/bin/bash
composer install
php artisan key:generate
php artisan migrate --seed
chmod -R 777 storage
php-fpm

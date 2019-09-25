#!/bin/sh
cp .env.example .env
php artisan cache:clear
php artisan config:clear
php artisan key:generate
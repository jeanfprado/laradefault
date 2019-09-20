#!/bin/bash
cp .env.exemple .env
php artisan config:clear
php artisan cache:clear
php artisan key:genarate
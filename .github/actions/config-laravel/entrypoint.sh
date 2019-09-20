#!/bin/bash
cp .env.example .env
php artisan config:clear
php artisan cache:clear
php artisan key:generate
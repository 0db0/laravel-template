Framework: Laravel 8.4
Docker: Nginx 1.21, Php 8.0 + Xdebug 3.0.2, MySQL 8.0

Installation:

1. Replace DB_VARIABLES from .env.develop to .env

2. Build develop stack via docker:
    - Building project:
        docker-compose build --build-arg uid=$(id -u)
    
    - Run containers:
        docker-compose up - d
    
    - Install dependencies:
        docker-compose exec fpm composer install
    
    - Generate key:
        docker-compose exec fpm php artisan key:generate
    
    - Apply migrations:
        docker-compose exec fpm php artisan migrate

3. Commands:
    - List running containers:
        docker-compose ps
    
    - Stop containers:
        docker-compose down --remove-orphans

    - Create Model, Controller, migration, seeder and factory:
        docker-compose exec fpm php artisan make:model ModelName --all

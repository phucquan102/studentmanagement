- Create Project
```
composer create-project laravel/laravel Book
```
- Create Model
```
php artisan make:model Book -m
```
- Create Controller
```
php artisan make:controller BookController
```
- Run migration to create database tables (after code the migration)
```
php artisan migrate
```
- Run server
```
php artisan serve
```
-------------------------------------------------
-- To run code from Github
- Update Vendor libraries
```
composer update
```
- Copy .env.example to .env
- Config DB_DATABASE,DB_USERNAME,DB_PASSWORD to your localhost
- Run migration
```
php artisan migrate
```
- Generate App Key
```
php artisan key:generate
```
- Your app can run now

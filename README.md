<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About LaraStarter
Its a Laravel 8 based starter project to quick start development. Build With
1. BootStrap 
2. Jquery
3. DataTables
4. SweetAlert2
5. Select2
6. Dropify
7. laravel/ui: "^3.3",
8. spatie/laravel-backup: "^7.6",
9. spatie/laravel-medialibrary: "^9.0.0"

For Debuging. I use
1. barryvdh/laravel-debugbar: "^3.6"

## Features List
1. Role Management
2. Permission Management
3. User Management
4. Profile Management
5. Backend DB and Project File from Admin Dashboard
6. Setting Management (General/Global, Apperance, Mail & Socialite)
7. Dynamic Menu Builder (Drag and Drop Menu Builder)
8. Page Management (frontend page builder)


## Getting Started Step by Step
1. In your root folder, clone the project file using git clone https://github.com/rafi021/LaravelStarter.git
2. Open terminal(bash/cmd), Then cd LaravelStarter folder. (go to project folder)
3. then install required files and libaries using "composer install"
4. the cp .env.example .env [create a .env file for project]
5. then run command "php artisan key:generate" 
5. Create a database in MYSQL and connect it with your project via updating .env file.
6. After connecting the db with project, then run command "php artisan migrate::fresh --seed"

After completing the migration and seeding of db, you will have 2 users ready for login in this project.

A. Admin User
    email: admin@gmail.com
    pass: 12345678
B. Normal User
    email: user@gmail.com
    pass: 12345678

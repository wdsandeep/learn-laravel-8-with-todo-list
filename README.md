<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


# Laravel 8 TODO APP

## About TODO App
```
This app is useful to create todo list and tasks. You can also complete todos with check icon.
```
## What is this TODO App? How it created and what code/ technology/ command etc used in this todo list.

```
1) I have used database migration to create schema, tables and dependency (foreign keys) etc.

2) Used command to create controller, component, models etc, few commands which are used are below
- php artisan make:component alert
- php artisan make:model
- php artisan make:resource
- php artisan migrate
- php artisan migrate:refresh
- php artisan migrate:fresh
- php artisan route:list
- php artisan ui:auth

3) Used LiveWire to Add and remove todo's step instead of using js/jquery.

4) Created basic CRUD operations for todos.

5) Used laravel relationship hasMany for User to Todo and Todo to Steps implementation.

6) Added Laravel form field authentication via Requests with custom messages for diffrent errors. like no text, text limit etc.

7) Added user auth via laravel ui

8) Used and learned Laravel blade template system. Used layout, conditions, loops etc.

9) Used tailwind css for styling todo app.

10) Custom routing added and also applied auth middleware / group middleware on route.

12) Learn the use of Resource route.

```


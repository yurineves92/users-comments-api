# User Comments using Laravel 10

Repository of use for developing and studying web systems using Laravel Framework 10.

# How to run this project

You can basically clone the project or download it so it can be used and run the following command.

```
composer install
```
After that.

```
copy .env.example for .env and configuration database(MySQL, Postgres or Sqlite)
```
Run.
```
"php artisan migrate"
```
To create the system database, with the .env file pre-configured with the database already installed

## Application features

- Authentication and authorization (Users) 
- List, create, update e delete commments for your user. (Comments)

## Running tests

```
vendor/bin/phpunit --testdox
```

## Technologies used in the project

 - [Laravel](https://laravel.com/)
 - [PHP 8](https://www.php.net/)
 - [Composer](https://getcomposer.org/)

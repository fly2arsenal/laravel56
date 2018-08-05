# Project Title

**Laravel 5.6**

### Prerequisites
- Laravel 5.6
- PHP7.1

### Installing
##1. Get source code
```
git clone git@github.com:fly2arsenal/laravel56.git
```
##2. Install all packages

```
composer install
```
##3. Configure app:
- Clone `.env.example` to `.env` and config DB_DATABASE, DB_USERNAME as well DB_PASSWORD
- Generate database:
```
php artisan migrate
php artisan db:seed
```
- Generate app key: 
`php artisan key:generate`

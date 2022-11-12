## jump2digital

Jump2Digital 2022 | Backend

[![CodeFactor](https://www.codefactor.io/repository/github/dm161272/jump2digital/badge)](https://www.codefactor.io/repository/github/dm161272/jump2digital)

This package contains API for database queries from Jump2Digital hackathone task.

Require PHP, Laravel framework, Laravel Composer and Git to be installed.

MongoDB used for storing data.

You can use local MongoDB database or connect to Atlas cluster.

https://github.com/jenssegers/laravel-mongodb package implemented for Eloquent MongoDB support

https://github.com/mostafamaklad/laravel-permission-mongodb package implemented for users roles and permission support with MongoDB



## Installation

1. Clone repository in your local htdocs directory
```
git clone https://github.com/dm161272/jump2digital.git
```
it will be cloned into jump2digital directory

2. Change directory to  jump2digital and 
run 
```
composer update
```
3. Make nesessary changes in your Laravel database connection settings,
rename .env.example to .env for use with local MongoDB database 
(default database name for a project is "jump2digital")
or if you want to connect to remote Atlas cluster make the following changes 
to your configuration files:

#### in the .env file
```
DB_CONNECTION=mongodb
DB_HOST=clusterX.XXXXXXX.mongodb.net (replace with your cluster URL)
DB_PORT=27017
DB_DATABASE=jump2digital
DB_USERNAME=YOUR_USERNAME_ON_ATLAS
DB_PASSWORD=YOUR_PASSWORD_ON_ATLAS
```
#### in the config/database.php
replace this section
```
 'mongodb' => [
            'driver' => 'mongodb',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', 27017),
            'database' => env('DB_DATABASE', 'homestead'),
            'username' => env('DB_USERNAME', 'homestead'),
            'password' => env('DB_PASSWORD', 'secret'),
            'options' => [
                // here you can pass more settings to the Mongo Driver Manager
                // see https://www.php.net/manual/en/mongodb-driver-manager.construct.php under "Uri Options" for a list of complete parameters that you can use
        
                
                'database' => env('DB_AUTHENTICATION_DATABASE', 'admin'), // required with Mongo 3+
            ],
```
with these settings
```
'mongodb' => [
'driver' => 'mongodb',
'dsn' => 'mongodb+srv://YOUR_USERNAME_ON_ATLAS:YOUR_PASSWORD_ON_ATLAS@clusterX.XXXXXXX.mongodb.net/?retryWrites=true&w=majority',
'database' => 'jump2digital',
],

```
##### Don't forget to replace clusterX.XXXXXXX.mongodb.net with yours actual cluster URL!!!

##### Make sure you have .env file with proper database connection configuration before proceed!!!

4. Make database migration
```
php artisan migrate
```
if you running it for a very first time,
if you want to delete all previous data and refresh database to it initial state use
```
php artisan migrate:fresh
```
WARNING: AFTER EXECUTION OF THIS COMMAND ALL PREVIOUS RECORDS IN THE DATABASE WILL BE ERASED!!!

5. Generate passport client keys
```
php artisan passport:client --personal --no-interaction
```
6. Run seeder for add data to database
```
php artisan db:seed
```
7. Start server
```
php artisan serve
```
## Working with API

##### You need API Platform like "Postman" for testing API requests

For testing purposes two users generated during seeding:

Admin with full access and User with restricted permissions.

Email addresses used as login, admin@admin.net and user@admin.net respectively.

Default password for both is 123456.

Only one user with administrator rights is permitted in the system,
so only users with role - "user" can be created.

Below is an example of the HTTP request for register a new users:
```
POST /api/users HTTP/1.1
Host: localhost:8000
Accept: application/json
Content-Type: application/x-www-form-urlencoded
Content-Length: 87

name=User&email=user%40admin.net&password=123456&password_confirmation=123456&role=user
```
Laravel Passport token authentication is implemented.
All actions but new user registration and login requires authentication.

#### Getting list of users and delete users requests requires admin rights.

User login request example:
```
POST /api/login HTTP/1.1
Host: localhost:8000
Accept: application/json
Content-Type: application/x-www-form-urlencoded
Content-Length: 38

email=admin%40admin.net&password=123456
```
Delete user request example:
```
POST /api/users/delete/ HTTP/1.1
Host: localhost:8000
Accept: application/json
Authorization: Bearer 
***HERE WILL BE YOUR TOKEN***
Content-Type: application/x-www-form-urlencoded
Content-Length: 23

email=admin%40admin.net
```
Logout user request example:
```
POST /api/logout HTTP/1.1
Host: localhost:8000
Accept: application/json
Authorization: Bearer 
***HERE WILL BE YOUR TOKEN***
```
Get all users list request example:
```GET /api/users/list HTTP/1.1
Host: localhost:8000
Accept: application/json
Authorization: Bearer 
***HERE WILL BE YOUR TOKEN***
```
### Requests for get data from database 

##### All these request use GET method and requires logged in user token for authorization

##### Analytics request require admin privileges (Administrator must be logged in)

1.Get companies list by size (ascending or descending):
```
http://localhost:8000/api/index/size/asc
```
```
http://localhost:8000/api/index/size/desc
```

2.Get companies list by foundation year (ascending or descending):
```
http://localhost:8000/api/index/founded/asc
```
```
http://localhost:8000/api/index/founded/desc
```
3. Anaytics - get (all data lists in ascending order):

Number of companies in each industry, 

Number of companies in each size range, 

Number of companies in each year of creation
```
http://localhost:8000/api/index/analytics
```
## PHPUnit tests

For testing API run
```
./vendor/bin/phpunit
```
from the project root directory


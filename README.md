# Asset Tracker

## Tech
* PHP 8.1
* Laravel 10
* MySQL 8
* Docker (optional)

## How to run the system
### Docker Install: 

#### Environment variables
Copy the .env.example file to a .env file in the project. you can then editthe file with the appropriate variables

#### Starting the containers

* If you have docker installed already, you can run `docker compose up -d` in the root of this project and then visiting `localhost:8000` on your browser to test if the system is running
* Then you can enter the container either by: 
1. using `Docker Desktop GUI` 
2. by opening your terminal, and running `docker compose exec -it app sh` to access the application terminal in the container

#### Migrations
* Once in the container you can run `php artisan migrate` to automatically run migrations and create the tables for you

#### Seeding
* Once in the container you can run `php artisan db:seed` to seed the Asset and inspections table with some data

[Note. This will automatically install run a composer install for you and run the laravel server for you and setup the entire database and connection which can be found under `.env.example` or `docker-compose.yaml`]

### Manual Install

If you have php 8.1 setup locally with composer installed and a MySQL database server already created, then you can install it by going to the project root directory and running these commands in order:

#### Environment variables
Copy the .env.example file to a .env file in the project. you can then editthe file with the appropriate variables

#### Database
In your database server, create a database (by default - the project looks for a database named `assettracker` with a user naemd `user` and password `pass`), if you have a user with different credentials you can update the variables in the `.env` file of the project

#### Composer install
* Once in the terminal you must run `composer install` to install the neccessary composer packages

#### Migrations
* Once in the terminal you can run `php artisan migrate` to automatically run migrations and create the tables for you

#### Seeding
* Once in the terminal you can run `php artisan db:seed` to automatically seed the Asset and Inspections table with some data

### Running the project
* To actually run the projec you can run `php artisan serve` to easily create a server that already runs this project at localhost:8000 

# Getting started

## Installation

Clone the repository

    git clone https://github.com/himanshutmu/distance.git

Switch to the repo folder

    cd distance

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Change database connection as **sqlite**

    DB_CONNECTION=sqlite

Add below variable in .env file

    GOOGLE_MAP_API_KEY="Your Google Map API key"

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the database seeder

    php artisan db:seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000 and you can click on download csv button 

You can now access the download csv at http://localhost:8000/download-csv

**TL;DR command list**

    git clone https://github.com/himanshutmu/distance.git
    cd distance
    composer install
    cp .env.example .env
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh

The api can be accessed at [http://127.0.0.1:8000](http://127.0.0.1:8000) and csv can be directly downloaded on [http://127.0.0.1:8000/download-csv](http://127.0.0.1:8000/download-csv)

# Todo App

## Commands List

-   Copy the Env file

        cp .env.example .env


-   Bring up the project

        docker-compose --env-file ./.env up -d


-   Install necessary packages

        docker-compose exec app composer install


-   Generate Laravel app key

        docker-compose exec app /var/www/html/artisan key:generate

-   Run migrations

        docker-compose exec app php artisan migrate --seed


-   Fetch the to-do list

        docker-compose exec app php artisan fetch:tasks


## Usage

-   Assign and view work plans

    http://localhost:4444

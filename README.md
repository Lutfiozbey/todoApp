# Todo App

## Commands List

-   Copy the Env file

        cp .env.example .env


-   Bring up the project

        docker-compose --env-file ./.env up -d


-   Install necessary packages

        docker-compose exec -it todoapp_app_1 composer install


-   Generate Laravel app key

        docker-compose exec -it todoapp_app_1 /var/www/html/artisan key:generate

-   Run migrations

        docker-compose exec -it todoapp_app_1 php artisan migrate --seed


-   Fetch the to-do list

        docker-compose exec -it todoapp_app_1 php artisan fetch:tasks


## Usage

-   Assign and view work plans

    http://localhost:4444

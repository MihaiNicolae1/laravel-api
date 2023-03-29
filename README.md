## About
An API for managing EV charging companies and charging stations.

All the API endpoints and their usage can be consulted under 

[http://localhost/docs](https://pages.github.com/).

## Getting started

### Prerequisites
- Docker

### Steps
- clone the 'main' branch using the following command
    ```
    git clone https://github.com/MihaiNicolae1/laravel-api.git
    ```
- in the newly created directory, run from the terminal
    ```
    docker-compose up -d
    ```
- after the containers are created, run from the terminal to enter app's terminal
    ```
    docker exec -ti app bash
    ```
- in app's terminal, you can run the migrations and test commands:  
    ```
    php artisan migrate
    php artisan test
    ```
## Scalability

The following architecture should be implemented in cloud to ensure scalability of the app

![plot](storage/app/public/schema.png)

# Card game

This repository contains the front and back end for the test the Card game

## Overview

This project runs a web application using Docker with `docker-compose`. The setup includes:

- **MySQL** as the database service
- **phpMyAdmin** for database management
- **Apache/PHP** for the backend (Symfony or other PHP frameworks)
- **Angular** for the frontend

## Prerequisites

Ensure you have the following installed:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Services

The `docker-compose.yml` file includes the following services:

- `db`: MySQL database
- `phpmyadmin`: Web-based MySQL administration tool
- `www`: PHP/Apache server
- `angular`: Angular frontend server

## Running the Project

### 1. Clone the Repository

```sh
git clone git@github.com:OussamaBenAli123/TestInterview.git
cd TestInterview
````
### 2. Start the Containers
Run the following command in the project root:
```sh
docker-compose up -d --build
````
This will:
- Pull necessary Docker images
- Build and start all services in the background

### 3. Access the Services
- Backend (PHP/Apache): http://localhost:8741
- Frontend (Angular): http://localhost:4200
- phpMyAdmin: http://localhost:8080 (Host: db, User: root, Password: '')

### 4. Install Symfony Dependencies & Setup Database
Once the containers are up, execute the following steps to install Symfony dependencies and set up the database:
```sh
docker exec -it TestInterview-www-1
cd project
compose install
````

Then configure and initialize the database:
```sh
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
````
### 5. Install Angular Dependencies & Run the Application
Once the containers are running, start the Angular project:
```sh
docker exec -it TestInterview-angular-1
cd my-angular-app
npm install
ng serve --host 0.0.0.0
````
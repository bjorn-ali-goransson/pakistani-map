# Laravel Docker Project

This is a Laravel project configured with Docker for easy development and deployment.

## Prerequisites

- Docker
- Docker Compose

## Setup Instructions

1. Clone this repository
2. Build the Docker containers:
   ```bash
   docker-compose build
   ```
3. Start the containers:
   ```bash
   docker-compose up -d
   ```
4. Install Laravel dependencies:
   ```bash
   docker-compose exec app composer install
   ```
5. Generate application key:
   ```bash
   docker-compose exec app php artisan key:generate
   ```
6. Set proper permissions:
   ```bash
   docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
   ```

The application should now be running at `http://localhost:80`

## Directory Structure

- `src/` - Contains the Laravel application
- `docker/` - Contains Docker-related configuration files
- `Dockerfile` - Main Docker configuration for PHP/Apache

## Development

- To run artisan commands:
  ```bash
  docker-compose exec app php artisan [command]
  ```
- To access the container shell:
  ```bash
  docker-compose exec app bash
  ``` 
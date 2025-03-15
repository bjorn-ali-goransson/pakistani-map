# PHP Development Environment

This is a PHP development environment set up using VS Code Dev Containers.

## Prerequisites

- Docker Desktop
- Visual Studio Code
- Remote - Containers extension for VS Code

## Getting Started

You can start the environment in two ways:

### Using VS Code Dev Containers (Recommended for Development)
1. Open this project in VS Code
2. When prompted, click "Reopen in Container"
3. Wait for the container to build and start
4. The PHP development environment will be ready to use

### Using Docker Compose
1. Open a terminal in the project directory
2. Run `docker-compose up -d`
3. The application will be available at http://localhost:8080
4. To stop the container, run `docker-compose down`

## Project Structure

- `public/` - Contains the web-accessible files
  - `index.php` - Main entry point
- `src/` - Contains PHP source code
- `.devcontainer/` - Contains Dev Container configuration
- `docker-compose.yml` - Docker Compose configuration

## Accessing the Application

Once the container is running, you can access the application at:
http://localhost:8080

## Development

The container includes:
- PHP 8.2 with Apache
- Composer for dependency management
- Common PHP extensions
- VS Code extensions for PHP development 
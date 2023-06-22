# SWStarter

SWStarter is a dynamic web application leveraging the power of modern web development tools. Built with Laravel 10.10, Vue.js 3.2, Inertia.js 1.0, and Vite 4.0.

SWStarter showcases the [Star Wars API](https://swapi.dev/) where you can query for people or films inside the universe.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- You have installed the latest version of [Docker](https://www.docker.com/products/docker-desktop) and [Docker Compose](https://docs.docker.com/compose/install/).
- Ensure that port 8000 is available as the Docker setup will use this port.

## Setting Up SWStarter

To set up SWStarter, follow these steps:

1. Clone the repository:
   ```bash
   git clone https://github.com/iRynoh/swstarter
   ```
   
2. Go to the project directory:
   ```bash
   cd swstarter
   ```

3. Build and run the Docker containers:
   ```bash
   docker-compose up --build
   ```
   
4. Install the composer dependencies
   ```bash
   docker-compose exec app composer install
   ```
   
5. Create the .env file
   ```bash
   docker-compose exec app cp .env.example .env
   ```
   
6. Create the app key
   ```bash
   docker-compose exec app php artisan key:generate
   ```
7. Install the node dependencies
   ```bash
   docker-compose exec app npm i
   ```
8. Build the frontend assets
   ```bash
   docker-compose exec app npm run build
   ```

Now you should be able to access the application at http://localhost:8000.

9. (Optional) Run the tests
   ```bash
   docker-compose exec app php artisan test --parallel
   ```



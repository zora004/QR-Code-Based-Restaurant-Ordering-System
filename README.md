# QR Restaurant Laravel App

Simple instructions to get the project running locally.

## Prerequisites

- PHP (version compatible with your Laravel version, e.g., PHP 8.1+)
- Composer
- Node.js & npm
- MySQL / MariaDB (or another supported database)
- Git

## Setup / Deployment (local)

1. **Clone the repository**
   ```bash
   git clone <repo-url>
   cd <repo-directory>
2. **Copy environment file**
    ```bash
   cp .env.example .env
3. **Install PHP dependencies**
   ```bash
   composer install
4. **Generate application key**
   ```bash
   php artisan key:generate
5. **Create the database**
   ```env
   DB_DATABASE=qrrestaurant
   DB_USERNAME=your_user
   DB_PASSWORD=your_password
6. **Run migrations and seed data**
    ```bash
    php artisan migrate:fresh --seed
7. **Install frontend dependencies**
   ```bash
   npm install
8. **Build assets**
   ```bash
   npm run build
9. **Run the application
    ```bash
    php artisan serve

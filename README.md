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


Default seeded user credentials:
<ul>
    <li>Email: test@example.com</li>
    <li>Password: password</li>
</ul>

7. **Install frontend dependencies**
   ```bash
   npm install
8. **Build assets**
   ```bash
   npm run build
9. **Run the application
    ```bash
    php artisan serve

## Troubleshooting

Imagick Extension Error

#If you encounter an Imagick extension error when running the project locally:

1. Download Imagick from:
    <a href="https://imagemagick.org/archive/binaries/ImageMagick-7.1.2-0-Q16-HDRI-x64-dll.exe">ImageMagick Windows Binary</a>
    and install it.
2. Locate the ext directory in your PHP installation folder.
3. Extract the Imagick ZIP file into the ext folder and follow the instructions in its README file.
4. Extract the php_imagick ZIP file into the ext folder and follow the instructions in its README file.
5. Enable Imagick in your php.ini file by adding:
    ```ini
    extension=php_imagick
6. Restart your local server.

Mars Rover Mission

Laravel 12 + Vue 3 app


Requirements

- PHP >= 8.1
- Composer
- Node.js & npm
- MySQL or compatible database

1. Clone the repository 
git clone https://github.com/your-username/mars-rover-mission.git

2. And move to the folder that has just created
cd mars-rover-mission

3. Install PHP dependencies
composer install

4. Copy and configure environment file
cp .env.example .env

5. Adapt .env file content to your database credentials

DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

6. Generate application key

php artisan key:generate

7. Run migrations

php artisan migrate

9. run vue:

npm run dev

10. Start the development server

php artisan serve

11. Visit the app Open http://localhost:8000 in your browser.






## Setup Repository

01. Clone the project. Navigate to the root directory of the cloned project.
```bash
git clone git@github.com:adkriPrasanna/client-hub.app.git
```
02. Navigate to the backend directory of cloned repository.
```bash
cd backend
```
03. Make a copy of **.env.example** file and rename it to **.env**
```bash
cp .env.example .env
```
04. Install Composer
```bash
composer install
```
05. Generate Application Key
```bash
php artisan key:generate --ansi
```
06. Run Migrations (Laravel 11 Specific)
```bash
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"

php artisan migrate --graceful --ansi
```
07. Run the application
```bash
php artisan serve
```

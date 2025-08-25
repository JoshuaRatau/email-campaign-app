# Email Campaign Manager – Laravel 12.25.0 + Blade Views + MySQL

A tiny Laravel 11 application that lets you manage email campaigns and contact lists.

## Key Features
  

Public dashboard 
Campaign CRUD (Blade)
Contact-list CRUD (Blade) 
Add contacts to lists (Blade) 
Responsive Bootstrap UI 

## Tech Stack
- Laravel Framework 12.25.0
- DBMySQL 8.x  
- Blade + Bootstrap 5  
- PHP ≥ 8.2  

## Local Installation
```bash
git clone https://github.com/your-username/email-campaign-app.git
cd email-campaign-app
composer install
cp .env.example .env
# edit .env: DB_CONNECTION=mysql, DB_DATABASE=email_campaign and the credentials.
php artisan key:generate
php artisan migrate --seed
php artisan serve

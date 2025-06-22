# Online Visitor Logbook App

A simple yet functional Laravel-based visitor logbook system built entirely from scratch for educational purposes.


## 🚀 Project Prerequisites

Ensure the following are installed on your system before proceeding:

- PHP (or XAMPP for bundled development tools)
- Composer
- MySQL
- Node.js & NPM (for compiling frontend assets)


## ⚙️ Getting Started

Follow these steps to set up and run the project locally:

### 1. Clone the Repository
bash
git clone https://github.com/devv-is-coding/OnlineVisitorLogbook.git

cd OnlineVisitorLogbook

### 2. Install Backend & Frontend Dependencies
bash
composer install
npm install && npm run build

### 3. Configure the Environment

Copy the example environment file and generate the application key:
bash
cp .env.example .env
php artisan key:generate

### 4. Set Up Database

Edit your `.env` file with the correct database credentials:
env

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=your_database

DB_USERNAME=your_username

DB_PASSWORD=your_password


Then run the migrations:
bash
php artisan migrate

### 5. Seed the Database

Populate your database with initial data:
bash
php artisan db:seed

### 6. Start the Development Server
bash
composer run dev

Then visit:

http://127.0.0.1:8000/


## 🛡 License

This project uses the [MIT License](https://opensource.org/licenses/MIT). The Laravel framework is open-source software released under the MIT license.



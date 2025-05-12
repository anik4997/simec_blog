#  Mini Blog Project

This is a simple blog platform where users can create, view, and read blog posts. It uses Laravel Blade templates with a clean Bootstrap 5 UI. The app supports post pagination, "read more" toggle, and detailed post view with timestamps.

---

##  Features

- Create new blog posts
- Show list of all posts with pagination
- "Read More" toggle for long posts
- View full details of a single post
- Responsive design with Bootstrap 5

---

##  Requirements

- PHP 8.2.12
- Composer
- XAMPP v3.3.0 (includes Apache, PHP, and MySQL)
- MySQL (XAMPP default – typically MySQL 8.0+)
- Laravel 10+ (recommended)

---

##  Database Setup

**Database name:** `mini_blog_project`

**Steps to create the database:**

1. Open [phpMyAdmin](http://localhost/phpmyadmin).
2. Click on **"New"**.
3. Enter the database name: `mini_blog_project` and click **"Create"**.
4. Import the provided `mini_blog_project.sql` file (if available) or run migrations.

---

## Installation Guide

Follow these steps to run the project locally:

### 1. Clone the Repository

```bash
git clone https://github.com/anik4997/mini-blog-project.git
cd mini-blog-project
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Create `.env` File

```bash
cp .env.example .env
```

Update the `.env` file with your database settings:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mini_blog_project
DB_USERNAME=root
DB_PASSWORD=
```

> Leave `DB_PASSWORD` blank if you're using XAMPP default settings.

---

### 4. Generate Application Key

```bash
php artisan key:generate
```

---

### 5. Run Migrations

```bash
php artisan migrate
```

### 6. Serve the Application

```bash
php artisan serve
```

Visit the app at: [http://localhost:8000](http://localhost:8000)

---

##  Project Structure (Simplified)

```
mini-blog-project/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── PostController.php
│   └── Models/
│       └── Post.php
├── bootstrap/
├── database/
│   └── migrations/
├── public/
│   └── index.php
├── resources/
│   └── views/
│       └── posts/
│           ├── create.blade.php
│           ├── index.blade.php
│           └── show.blade.php
├── routes/
│   └── web.php
├── .env
└── README.md

```

---

## Author

Developed by Oli Ahammed Sarker
Feel free to use or extend this project for learning purposes.

---
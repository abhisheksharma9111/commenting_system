Sure! Here's your complete, clean, and ready-to-use `README.md` in **one go**:

---

````markdown
# 🧵 Multi-Level Commenting System

A Laravel-based commenting system with support for nested replies (up to 3 levels deep). Ideal for blogs, forums, or any content-based app.

---

## 🚀 Features

- Posts with user comments
- Nested replies up to 3 levels
- Clean and simple UI with Bootstrap
- Laravel Scheduled Command to clean empty comments
- AJAX-based comment submission with page reload

---

## ⚙️ Installation

### 1. Clone the Repository

```bash
git clone https://github.com/abhisheksharma9111/commenting_system.git
cd commenting-system
````

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Create Environment File

```bash
cp .env.example .env
```

Update `.env` with your DB credentials.

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Run Migrations & Seeder

```bash
php artisan migrate
php artisan db:seed --class=PostsTableSeeder
```

### 6. Start the Laravel Development Server

```bash
php artisan serve
```

---

## 🌐 Usage

* Visit: [http://localhost:8000/posts](http://localhost:8000/posts)
* Create a post
* Add comments
* Reply to comments (nested up to 3 levels)
* Each comment can be replied to if within depth limit

---

## 🧹 Scheduled Command

To clean up empty comments, use Laravel’s scheduler.

Run manually:

```bash
php artisan schedule:run
```

Add this to your server cron for automation:

```cron
* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
```

---

## 🧰 Tech Stack

* Laravel
* Blade Templates
* Bootstrap (UI)
* MySQL (or any Laravel-supported DB)

---

## 📸 Optional

> Add screenshots or demo GIFs here to showcase the UI and features.

---

## 📄 License

This project is open-sourced under the [MIT license](LICENSE).

```

---

Let me know if you want to:
- Add database schema diagram
- Add screenshots
- Convert it to a public GitHub project with link formatting
```

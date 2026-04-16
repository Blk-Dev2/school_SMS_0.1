# 🚀 Run the Project Locally | تشغيل المشروع محلياً

---

## 📋 Requirements | المتطلبات

- PHP >= 8.1
- Composer
- MySQL

---

## ⚙️ Steps | خطوات التشغيل

### 1. Install Dependencies | تثبيت الاعتماديات

```bash
composer install
```

### 2. Generate Application Key | توليد مفتاح التطبيق

```bash
php artisan key:generate
```

### 3. Run Migrations | تشغيل الـ Migrations

```bash
php artisan migrate
```

### 4. Start the Server | تشغيل المشروع

```bash
php artisan serve
```

Open your browser at | افتح المتصفح على: **http://127.0.0.1:8000**

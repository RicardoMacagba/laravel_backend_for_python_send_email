# Project Setup Guide

This document explains how to set up the project after cloning the repository.

---

## 0. Tools you need and set up
```bash
Python 3.13+ → email sending
Laravel 10+ → backend logging
PostgreSQL or any database you want → storing click logs
Ngrok → expose local Laravel server to internet for email link (you can get this ngrok in app store)
Gmail with 2FA & App Password → secure SMTP login (you can see this in google.account)
```

---

## 1. Clone the Repository
```bash
git clone <repo-url>
cd <project-folder>
````

---

## 2. Install Dependencies

```bash
composer install
```

---

## 3. Environment Setup

* Copy `.env.example` to `.env`

```bash
cp .env.example .env
```

* Update database credentials in `.env`
* Generate app key:

```bash
php artisan key:generate
```

---

## 4. Run Migrations

```bash
php artisan migrate
```

## 5. Serve the Application

Run the local development server:

```bash
php artisan serve
```

The app will be available at:

```
http://127.0.0.1:8000
```

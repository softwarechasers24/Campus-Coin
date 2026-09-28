# Campus Coin – Smart Spending Student Style

## 📌 Project Overview

**Campus Coin** is a student-focused web-based budgeting and expense management application developed using **Laravel**. The system helps students manage their income, expenses, monthly budgets, savings goals, and financial activities in one place.

The application provides a simple and organized way for students to understand their spending habits and manage their monthly finances.

---

## 🎯 Project Objectives

The main objectives of Campus Coin are:

* Help students track their income and expenses.
* Provide a clear financial dashboard.
* Allow students to create and manage budgets.
* Categorize financial transactions.
* Monitor monthly spending.
* Display financial reports and summaries.
* Support savings goals.
* Provide useful spending tips and insights.
* Provide an administrator panel for system management.

---

## ✨ Main Features

### 👤 Student Features

* Student Registration
* Student Login and Logout
* Secure Authentication
* Profile Information
* Academic Year
* Monthly Allowance
* Savings Goal
* Add Income
* Add Expense
* Edit Transactions
* Delete Transactions
* Transaction History
* Transaction Categories
* Income and Expense Filtering
* Recurring Transactions
* Monthly Budget Management
* Budget Progress Tracking
* Financial Dashboard
* Monthly Income and Expense Summary
* Balance Calculation
* Reports
* Financial Insights
* Saving Tips
* Notifications

### 🛡️ Admin Features

* Admin Authentication
* Admin Dashboard
* User Management
* Category Management
* Transaction Management
* Budget Management
* Reports
* Insights Management
* Announcements
* System Settings

---

## 🛠️ Technologies Used

### Frontend

* HTML5
* CSS3
* JavaScript
* Blade Templates
* Tailwind CSS

### Backend

* PHP
* Laravel

### Database

* MySQL

### Development Tools

* Composer
* Node.js / NPM
* Vite
* WAMP Server
* phpMyAdmin
* Git
* GitHub
* Visual Studio Code

---

## 📋 System Requirements

Before running the project, make sure the following are installed:

* PHP 8.2 or higher
* Composer
* MySQL
* WAMP Server
* Node.js and NPM
* Git
* Web Browser

---

## 🚀 Installation & Setup

### 1. Clone the Repository

```bash
git clone <repository-url>
```

Then move into the project directory:

```bash
cd campus-coin
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Frontend Dependencies

```bash
npm install
```

### 4. Create Environment File

Copy the example environment file:

```bash
cp .env.example .env
```

On Windows, you can also create a copy of `.env.example` and rename it to:

```text
.env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Create the Database

Create a MySQL database using phpMyAdmin.

Recommended database name:

```text
campus-coin
```

### 7. Configure Database

Open `.env` and configure the database settings according to your local MySQL/WAMP setup.

Example:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=campus-coin
DB_USERNAME=root
DB_PASSWORD=
```

> Change the username and password if your MySQL configuration is different.

### 8. Run Migrations

```bash
php artisan migrate
```

If the project contains seeders:

```bash
php artisan db:seed
```

Or:

```bash
php artisan migrate --seed
```

### 9. Build Frontend Assets

For development:

```bash
npm run dev
```

For production:

```bash
npm run build
```

### 10. Start Laravel Server

Open another terminal and run:

```bash
php artisan serve
```

The application will normally be available at:

```text
http://127.0.0.1:8000
```

---

## 🗄️ Database Structure

The main database tables include:

* `users`
* `categories`
* `transactions`
* `budgets`
* `insights`
* `notifications`
* `announcements`

Laravel's default supporting tables such as cache/jobs may also be present depending on the project configuration.

---

## 🔐 Authentication

Campus Coin provides authentication for system users.

### Student

Students can:

* Register an account.
* Login securely.
* Manage their financial information.
* Access their personal dashboard.
* Manage transactions and budgets.

### Administrator

Administrators have access to the administrative dashboard and management functions.

---

## 📊 Dashboard

The Campus Coin dashboard provides financial information such as:

* Current Balance
* Total Income
* Total Expenses
* Monthly Income
* Monthly Expenses
* Recent Transactions
* Category-based spending
* Budget progress
* Financial insights

---

## 💰 Budget Management

Students can create monthly budgets for different expense categories.

The system can calculate:

* Budget limit
* Amount spent
* Remaining budget
* Spending percentage
* Budget progress

This helps students monitor their spending against their planned monthly limits.

---

## 📈 Reports

The reporting section is designed to provide financial summaries based on transaction data.

Reports may include:

* Daily spending
* Weekly spending
* Monthly spending
* Category-wise expenses
* Income and expense summaries
* Financial trends

---

## 📁 Project Structure

```text
campus-coin/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Requests/
│   └── Models/
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── resources/
│   └── views/
│
├── routes/
│   ├── web.php
│   └── auth.php
│
├── public/
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
├── package.json
└── README.md
```

---

## 👥 Project Team

**Project:** Campus Coin – Smart Spending Student Style

**Team Members:** 4

**Institute:** Aptech / Garden Campus

**Project Type:** Web Application

**Framework:** Laravel

**Database:** MySQL

---

## 👩‍🏫 Project Supervision

**Teacher:** Miss Yusra

---

## 🔒 Security Notes

* Passwords are securely hashed.
* Authentication middleware is used to protect restricted pages.
* Admin functionality is restricted to authorized administrators.
* Database credentials are stored in the `.env` file.
* The `.env` file should not be uploaded to GitHub.

---

## 📌 Important GitHub Note

Do **not** upload the actual `.env` file because it can contain database credentials and other private configuration.

The project should include:

```text
.env.example
```

instead of:

```text
.env
```

---

## 📄 Project Status

Campus Coin is developed as a student budgeting and financial management web application with student authentication, transaction management, budgeting, dashboard functionality, reports, insights, notifications, and an administrative panel.

---

## © Copyright

Campus Coin – Smart Spending Student Style

Developed as an academic project.

# 🏢 Multi-Tenant Flat & Bill Management System

A **multi-tenant Laravel 12 application** for managing buildings, flats, tenants, and bills.  
Supports **Super Admins**, **House Owners** with role-based access control using [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission).

---

## 🚀 Features

### 👨‍💼 Super Admin
- Manage **House Owners**.
- Create and assign **Tenants** to buildings.
- View or remove tenants.

### 🏠 House Owner
- Manage **Flats** in their buildings.
- Define **Bill Categories** (Electricity, Gas, Water, Utility).
- Create **Bills** for flats and manage dues.
- Receive **email notifications** when bills are created or paid.

### 👤 Tenant
- Receive notifications about **new bills** and **successful payments**.

---

## ⚙️ Tech Stack
- **Backend**: Laravel 12 (PHP 8.3)
- **Frontend**: Blade + Bootstrap
- **Database**: MySQL
- **Auth & Roles**: [Spatie Roles & Permissions](https://github.com/spatie/laravel-permission)
- **Notifications**: Laravel Mailable + Queue
- **Multi-Tenancy**: Column-based (`owner_id`) with global scopes & middleware

---

## 📂 Project Structure
app/
├── Mail/ # Email notifications (BillCreated, BillPaid)
├── Models/ # Eloquent models (User, Owner, Building, Flat, Bill, Payment)
├── Http/
│ ├── Controllers/ # Controllers (Admin, Owner, BillController, etc.)
│ └── Middleware/ # TenantMiddleware for isolation
└── Scopes/TenantScope.php # Global tenant query scope
database/
├── migrations/ # Schema definition
├── seeders/ # Seed sample data
└── dumps/multitenant.sql # Full DB schema + sample data

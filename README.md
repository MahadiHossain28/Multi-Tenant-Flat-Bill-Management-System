# Multi-Tenant Flat & Bill Management System

A **multi-tenant Laravel 12 application** for managing buildings, flats, tenants, and bills.  
Supports **Super Admins**, **House Owners** with role-based access control using [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission).

---

## Features

### Super Admin
- Manage **House Owners**.
- Create and assign **Tenants** to buildings.
- View or remove tenants.

### House Owner
- Manage **Flats** in their buildings.
- Define **Bill Categories** (Electricity, Gas, Water, Utility).
- Create **Bills** for flats and manage dues.
- Receive **email notifications** when bills are created or paid.

### Tenant
- Receive notifications about **new bills** and **successful payments**.

---

## Tech Stack
- **Backend**: Laravel 12 (PHP 8.3)
- **Frontend**: Blade + Bootstrap
- **Database**: MySQL
- **Auth & Roles**: [Spatie Roles & Permissions](https://github.com/spatie/laravel-permission)
- **Notifications**: Laravel Mailable + Queue
- **Multi-Tenancy**: Column-based (`owner_id`) with global scopes & middleware

---

## Project Structure
```plaintext
app/
├── Enums/
├── Http/
│   ├── Controllers/
│   ├── Requests/
├── Models/
│   ├── Admin.php
│   ├── HouseOwner.php
│   ├── Tenant.php
│   ├── Flat.php
│   ├── BillCategory.php
│   └── Bill.php
├── Mails/
├── Observers/
routes/
├── web.php
database/
├── migrations/
├── seeders/
```
---
## Setup Instructions
```bash
git clone https://github.com/MahadiHossain28/Multi-Tenant-Flat-Bill-Management-System.git

cd building-management-system

composer install

cp .env.example .env

php artisan key:generate

```

```env
APP_NAME="MultiTenant"
APP_ENV=local
APP_KEY=
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=multitenant
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=admin@example.com
MAIL_FROM_NAME="${APP_NAME}"
```
```bash
npm install && npm run dev

php artisan migrate --seed

php artisan serve

php artisan queue:work
```

---
### Email Notifications 
- **Bill Created** → Notifies House Owner

- **Bill Paid** → Notifies House Owner + Admin

- Ensure MAIL settings are configured in (`.env`).

### Multi-Tenant Implementation 
- **Strategy**: Column-Based Tenant Isolation
- Each `Building`, `Flat`, `Bill`, and `BillCategory` has a `house_owner_id` directly or By `Building`.
- Each relevant table includes a (`house_owner_id`)
- All queries scoped to the logged-in user's ownership

---

### Optimization & Clean Code Practices

- Eloquent Global Scopes for tenant filtering

- Indexes on foreign keys (`house_owner_id, flat_id`)

- Selective `with()` to avoid N+1 queries

- PSR-12 coding standard

--- 

### Sample Data

Included in:

- database/seeders/DataSeeder.php

- database.sql file

Sample includes:

- 1 Admin

- 2 House Owners

- Multiple Flats

- Predefined Bill Categories

- Assigned Tenants & Bills

--- 
### Live Link
- Click Here: [Multi-Tenant Flat & Bill Management System](https://flat.unanimousit.com/)
- Copy This Link: `https://flat.unanimousit.com/`

### User Credentials
| Role        | Login Email  | Password   | Abilities    |
|-------------|--------------| ---------- | ------------ |
| Admin       | `admin@example.com` | `password` | Manage everything |
| House Owner | `test@test.com` | `password` | Manage flats, bills, categories |


---

### Author

Developed by: MD Mahadi Hossain

GitHub: github.com/MahadiHossain28

--- 

### License

This project is open-sourced under the MIT License.

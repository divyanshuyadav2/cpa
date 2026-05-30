# Chitranshu Pharmaceuticals Agency (CPA)

A complete, premium Laravel web application for **Chitranshu Pharmaceuticals Agency** (CPA). Features a public product catalog, a WhatsApp-based shopping cart and checkout, and a protected Admin Dashboard for managing companies, divisions, chemical salts, products, orders, and site configurations.

---

## Technical Stack

- **Framework**: Laravel 12 (using new bootstrap structures)
- **Database**: MySQL
- **CSS Utility**: Tailwind CSS (custom `pharma` palette)
- **Javascript**: Alpine.js & Vanilla JavaScript
- **Asset Bundling**: Vite

---

## Administrative Credentials

Access the admin panel at: `/admin/login`

- **Email**: `admin@chitranshu.com`
- **Password**: `admin123`

---

## Installation & Setup

Follow these steps to set up the project locally on your system:

### 1. Configure the Environment
Copy the environment variables template and generate the application key:
```bash
copy .env.example .env
php artisan key:generate
```
Open the `.env` file and verify your database details (`DB_DATABASE=cpa`, `DB_USERNAME=root`, `DB_PASSWORD=`).

### 2. Install PHP Dependencies
Download and configure the Composer packages:
```bash
composer install
```

### 3. Setup the Database
Ensure your MySQL server (e.g. XAMPP MySQL) is running. Create a database named `cpa`. Then run the migrations and seed the initial data (brands, divisions, salts, products, admin logins, and settings):
```bash
php artisan migrate:fresh --seed
```

### 4. Symlink Public Storage
Enable public access to uploaded logos and product images:
```bash
php artisan storage:link
```

### 5. Install & Compile Assets
Install node modules and compile the Tailwind CSS & Alpine.js styles:
```bash
npm install
npm run build
```

### 6. Run the Servers
In separate terminal sessions (or using the concurrent runner), run the PHP dev server and Vite asset compiler:

**PHP Serve:**
```bash
php artisan serve
```

**Vite Watch (for CSS edits):**
```bash
npm run dev
```

---

## Features Implemented

1. **Public Catalog**: Filter products dynamically by Manufacturer or Division; search by name, active composition, or chemical salt.
2. **WhatsApp Shopping Cart**: Add formulations to a session cart, update quantities (with stock limits), and checkout. Checkout stores the order in the database and opens a pre-composed, URL-encoded order invoice directly on WhatsApp with the configured receiver.
3. **Admin Panel**:
   - **Dashboard**: Track analytics (Totals, Daily Orders) and monitor Low Stock Alerts (Qty < 10).
   - **Company CRUD**: Upload logos, toggle status.
   - **Division CRUD**: Dropdown company links, status toggles.
   - **Salt CRUD**: Chemical compounds CRUD.
   - **Product CRUD**: Dropdowns, AJAX company division lists (via Alpine.js & fetch), image uploads, stock parameters.
   - **CSV Product Import**: Form stub to prototype spreadsheet loading.
   - **Orders Management**: Status transitions (Pending &rarr; Confirmed &rarr; Dispatched) with WhatsApp message status updates.
   - **Global Settings**: Configure addresses, email, phone, and receiver WhatsApp numbers. Stored in a cached key-value structure with events to clear cache on updates.

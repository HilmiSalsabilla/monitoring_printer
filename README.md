Berikut versi bahasa Inggris dari `README.md` untuk proyek **Monitoring Printer**:

---

```markdown
# Monitoring Printer

A web-based application built with **CodeIgniter 3** to monitor printer usage and activity within an organization.

## 🖥️ Main Features

- **Login & Session Management**
  - User roles: `Admin` and `User`
  - Login using `NIK` and hashed password (`password_hash`)
- **Dashboard**
  - Dynamic dashboard views based on user role
  - Displays dummy data: total admins, news, reports, and online users
- **User Management**
  - Handled via the `tb_user` table
- **Modern UI Template**
  - Built using Bootstrap and AdminLTE-style components

## 🗂️ Project Structure Overview

```

monitoring\_printer/
├── application/
│   ├── controllers/
│   ├── models/
│   ├── views/
│   ├── config/
│   └── cache/     ← required for session storage
├── assets/
│   └── img/       ← background images for dashboard
├── system/
├── index.php

````

## ⚙️ How to Run the Project

1. Clone or download this repository.
2. Ensure you have:
   - PHP 7.x or 8.x
   - MySQL (via XAMPP, WAMP, LAMP, etc.)
3. Create a database and import the `tb_user` table manually.
4. Configure the base URL and session path in `application/config/config.php`:
   ```php
   $config['base_url'] = 'http://localhost/monitoring_printer/';
   $config['sess_save_path'] = APPPATH . 'cache/';
````

5. Access the app via your browser:

   ```
   http://localhost/monitoring_printer/
   ```

## 🧪 Sample Accounts

| Role  | NIK | Password |
| ----- | --- | -------- |
| Admin | 123 | admin123 |
| User  | 456 | user456  |

> Passwords must be hashed using `password_hash()` before storing in the database.

## 🛡️ Security Features

* Secure login using `password_hash()` and `password_verify()`
* Session-based access control
* Session path correctly set to avoid auto-logout issues

## 📁 Autoload Settings (`application/config/autoload.php`)

```php
$autoload['libraries'] = array('database', 'session', 'form_validation');
$autoload['helper'] = array('url', 'form');
```

## 🙋‍♂️ Author

This project was developed by **Hilmi Salsabilla** as a part of internship, coursework, and portfolio development.

# Monitoring Printer

A web-based printer inventory and monitoring admin panel built with **CodeIgniter 3** and the **Stisla** admin dashboard template. It lets an organization keep track of its printers (serial number, IP address, hostname, location) and manage the users who can access the system, with a soft-delete trash bin for both.

Originally built for PT. Semen Padang.

## Features

- **Dashboard** — quick counts of total printers and total (non-admin) users.
- **Printer management** — add, edit, and soft-delete printers; each printer records its device model, serial number, IP address, hostname, and location.
- **User management** (Admin only) — add, edit, and soft-delete user accounts.
- **Trash bin** — soft-deleted printers and users are moved to a trash bin and can be restored, instead of being permanently deleted immediately.
- **Role-based access** — two account levels, `Admin` and `User`. Both can view the printer list; only `Admin` accounts can add/edit/delete printers or manage users at all.
- **Session-based authentication** with server-side route guards (no page is reachable without logging in).
- **CSRF protection** on all forms.
- **Server-side validation**, including duplicate checks (a printer's serial number/IP and a user's NIK/email must be unique) and email format validation.

## Tech stack

- PHP (CodeIgniter 3, MVC)
- MySQL / MariaDB
- Stisla admin template (Bootstrap 4, iziToast for notifications)
- No build step / no npm required — it's a classic server-rendered PHP app

## Requirements

- PHP 7.4+ (uses `password_hash`/`password_verify`; avoid PHP < 7)
- MySQL or MariaDB
- Apache or nginx with `mod_rewrite` (or equivalent) if you want clean URLs
- A local PHP dev stack works fine (XAMPP, Laragon, MAMP, `php -S`, etc.)

## Getting started

1. **Clone the repo** into your web server's document root (e.g. `htdocs/monitoring_printer` for XAMPP):
   ```bash
   git clone https://github.com/HilmiSalsabilla/monitoring_printer.git
   ```

2. **Create the database** and import the schema:
   ```bash
   mysql -u root -p -e "CREATE DATABASE monitoring_printer"
   mysql -u root -p monitoring_printer < monitoring_printer.sql
   ```
   This creates `tb_printer`, `tb_printer_deleted`, `tb_user`, `tb_user_deleted` (plus `tb_status_printer`, reserved for future use — see [Known limitations](#known-limitations)), and seeds one default Admin account (NIK `123456789`). The seeded password is stored hashed in the SQL dump; reset it via the database or your team's records before relying on it.

3. **Configure the database connection** in `application/config/database.php`:
   ```php
   'hostname' => 'localhost',
   'username' => 'root',
   'password' => '',
   'database' => 'monitoring_printer',
   ```

4. **Set your base URL** in `application/config/config.php`:
   ```php
   $config['base_url'] = 'http://localhost/monitoring_printer/';
   ```

5. Visit the app in your browser and log in with the seeded Admin account (or a user you insert directly into `tb_user`, with `password` set via PHP's `password_hash()`).

## Project structure

```
application/
  controllers/     			Login, Dashboard, Printer, User, Welcome
  core/            			Auth_Controller (session + role guard base class)
  models/          			Printer_model, User_model — all DB access lives here
  views/           			Stisla-based views, split by module (printer/, user/, template/)
  config/          			routes, database, autoload, CSRF/session config
assets/            			Stisla template assets (CSS/JS/fonts, vendored)
monitoring_printer.sql   	Schema + seed data
```

**Routing convention:** printer/user CRUD actions use hyphenated route names (`printer-tambah`, `printer-store`, `printer-edit/(:num)`, `printer-hapus/(:num)`, `printer-restore/(:num)`, `printer-trash-bin`, and the equivalent `user-*` routes). See `application/config/routes.php` for the full map.

## Access control model

| Action | Admin | User |
|---|---|---|
| View printer list | ✅ | ✅ |
| Add / edit / delete / restore printers | ✅ | ❌ |
| View / manage users | ✅ | ❌ |
| View dashboard | ✅ | ✅ |

Every controller other than `Login` extends `Auth_Controller`, which redirects to the login page if there's no active session. Admin-only actions additionally call `require_admin()`, which redirects to the dashboard with an error message if the logged-in account isn't level `Admin`.

## Known limitations

- `tb_status_printer` and the `status` / `last_login` columns exist in the schema but aren't wired into any controller yet — there's no live printer status polling or last-login tracking implemented. This is a natural next feature to build.
- No automated test suite yet.
- Printer/user "delete" is a soft delete (moves the row to a `*_deleted` table); there's currently no UI action to permanently purge trashed records.

## License

The underlying CodeIgniter 3 framework is MIT licensed (see `license.txt`). Application code is provided as-is for internal use at PT. Semen Padang.

# Monitoring Printer

Monitoring Printer is a web-based application used to monitor printer status within an office or organization. This system is built using **PHP CodeIgniter 3** and **MySQL** as the database backend.

## 🚀 Key Features

- Manage printer data (name, IP, location, etc.)
- Record printer status (active, error, offline, etc.)
- Login system with role-based access control (Admin & User)
- Dashboard with statistics and usage charts
- User activity logs

## 🛠️ Built With

- PHP 7.x / 8.x
- CodeIgniter 3.x
- MySQL
- Bootstrap
- Chart.js
- jQuery

## 📁 Project Structure

application/
├── controllers/
├── models/
├── views/
├── config/
├── logs/
├── cache/
assets/
├── css/
├── js/
├── images/

bash
Copy
Edit

## ⚙️ How to Run (Localhost)

1. Clone this repository into your `htdocs` folder:

```bash
git clone https://github.com/your-username/monitoring_printer.git
Import the database.sql file into your local MySQL via phpMyAdmin

Configure your database connection in:

arduino
Copy
Edit
application/config/database.php
Run in your browser:

arduino
Copy
Edit
http://localhost/monitoring_printer
🔐 Default Login Credentials
Role	Username	Password
Admin	admin	admin123
User	user	user123

You should change your password immediately after logging in.

👨‍💻 Developer
Hilmi Salsabilla – Backend Developer

📄 License
This project is for private/internal use. For further usage, please contact the repository owner.
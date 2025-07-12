# Monitoring Printer

Monitoring Printer adalah aplikasi berbasis web yang digunakan untuk memantau status printer di lingkungan kantor atau instansi. Aplikasi ini dikembangkan menggunakan **PHP CodeIgniter 3** dan **MySQL** sebagai database.

## 🚀 Fitur Utama

- Manajemen data printer (nama, IP, lokasi, dsb)
- Pencatatan status printer (aktif, error, offline, dsb)
- Login dan role-based access control (Admin & User)
- Dashboard dengan statistik dan grafik penggunaan
- Riwayat aktivitas pengguna

## 🛠️ Teknologi yang Digunakan

- PHP 7.x / 8.x
- CodeIgniter 3.x
- MySQL
- Bootstrap
- Chart.js
- jQuery

## 📦 Struktur Folder Penting

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

## ⚙️ Cara Menjalankan Aplikasi (Localhost)

1. Clone repo ini ke folder `htdocs` kamu:

```bash
git clone https://github.com/username/monitoring_printer.git
Import file database.sql ke phpMyAdmin

Edit konfigurasi database di:

arduino
Copy
Edit
application/config/database.php
Jalankan melalui browser:

arduino
Copy
Edit
http://localhost/monitoring_printer
🔐 Default Login
Role	Username	Password
Admin	admin	admin123
User	user	user123

Ubah password segera setelah login untuk alasan keamanan.

👨‍💻 Kontributor
Hilmi Salsabilla – Backend Developer

📃 Lisensi
Proyek ini bersifat pribadi/internal. Untuk penggunaan lebih lanjut, harap hubungi pemilik repo.
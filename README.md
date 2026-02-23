# 🧮 BMI Health App  

![Laravel](https://img.shields.io/badge/Laravel-12-red)
![PHP](https://img.shields.io/badge/PHP-8.2-blue)
![License](https://img.shields.io/badge/License-MIT-green)
![Status](https://img.shields.io/badge/Status-Active-success)
![Repo Size](https://img.shields.io/github/repo-size/USERNAME/REPO)
![Last Commit](https://img.shields.io/github/last-commit/USERNAME/REPO)
![Stars](https://img.shields.io/github/stars/USERNAME/REPO?style=social)

Aplikasi kalkulator **Body Mass Index (BMI)** berbasis Laravel dengan dashboard kesehatan modern.

🧮 BMI Health App

Aplikasi kalkulator Body Mass Index (BMI) berbasis Laravel dengan tampilan modern seperti aplikasi kesehatan digital.
Pengguna dapat login sederhana, menghitung BMI, melihat kategori kesehatan otomatis berwarna, serta memantau riwayat BMI melalui dashboard.

✨ Fitur Utama

🔐 Login sederhana (Nama, Umur, Gender)

⚖️ Perhitungan BMI otomatis

🎨 Kategori BMI berwarna (Kurus / Normal / Gemuk / Obesitas)

📊 Dashboard kesehatan modern

📈 Riwayat BMI per pengguna

🗂️ Penyimpanan database MySQL

📱 UI responsif & clean

🖥️ Tampilan Aplikasi
Login

Input identitas pengguna sebelum menghitung BMI.

Kalkulator BMI

Masukkan tinggi & berat badan → hasil BMI muncul otomatis dengan kategori warna.

Dashboard BMI

Ringkasan kesehatan pengguna:

BMI terakhir

Status kesehatan

Riwayat BMI

🏗️ Teknologi

Laravel 12

PHP 8.2+

MySQL / MariaDB

Blade Template

CSS Modern UI

Bootstrap / Custom CSS

⚙️ Instalasi

Clone repository:

git clone https://github.com/USERNAME/bmi-health-app.git
cd bmi-health-app

Install dependency:

composer install

Copy file environment:

cp .env.example .env

Generate app key:

php artisan key:generate
🗄️ Setup Database

Edit .env:

DB_DATABASE=bmi_app
DB_USERNAME=root
DB_PASSWORD=

Migrasi database:

php artisan migrate
▶️ Menjalankan Aplikasi
php artisan serve

Buka di browser:

http://127.0.0.1:8000
👤 Alur Penggunaan

Login dengan Nama, Umur, Gender

Masukkan Tinggi & Berat

Klik Hitung BMI

Lihat hasil & kategori kesehatan

Pantau riwayat di dashboard

📊 Kategori BMI
BMI	Kategori
< 18.5	Kurus
18.5 – 24.9	Normal
25 – 29.9	Gemuk
≥ 30	Obesitas
📁 Struktur Project
app/
 ├── Http/Controllers/BMIController.php
 ├── Models/BMIRecord.php
resources/views/
 ├── login.blade.php
 ├── bmi.blade.php
 ├── dashboard.blade.php
routes/
 ├── web.php
database/migrations/
🚀 Roadmap

Grafik BMI

Target berat badan

Dark mode

Mobile UI

Export PDF laporan BMI

Multi-user auth lengkap

👨‍💻 Author

BMI Health App
Laravel Health Dashboard Project

📄 Lisensi

MIT License — bebas digunakan untuk pembelajaran & pengembangan.

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# About LaporPak
LaporPak adalah sebuah 

## Requirements
<a href="https://laravel.com/docs/11.x/releases"><img src="https://img.shields.io/badge/laravel-v11-blue" alt="version laravel"></a>
<a href="https://www.php.net/releases/8.2/en.php"><img src="https://img.shields.io/badge/PHP-v8.2.4-blue" alt="version php"></a>
<a href="https://nodejs.org/en/blog/release/v8.18.0"><img src="https://img.shields.io/badge/NPM-v8.18.0-green" alt="version php"></a>
<a href="https://getcomposer.org/download/2.6.5/composer.phar"><img src="https://img.shields.io/badge/COMPOSER-v2.6.5-brown" alt="version php"></a>

## Instalasi
- download zip <a href="https://github.com/michailtjhang/LaporPak/archive/refs/heads/master.zip">Klik disini</a> 
- atau clone di terminal :
    ```bash
    git clone https://github.com/michailtjhang/LaporPak.git
    ```

## Setup
- buka direktori project di terminal anda.
- ketikan command di terminal :
  ```bash
  copy .env.example .env
  ```
  untuk Linuk, ketikan command :
  ```bash
  cp .env.example .env
  ```
- instal package-package di laravel, ketikan command :
  ```bash
  composer install
  ```
- menginstal npm UI di website, ketikan command :
  ```bash
  npm install
  ```
- Generate app key, ketikan command :
  ```bash
  php artisan key:generate
  ```
### Command Run Website
- menjalanlan Laravel di website, ketikan command :
  ```bash
  php artisan serve
  ```
- menjalanlan UI Laravel di website, ketikan command :
  ```bash
  npm run dev
  ```
### Command Database
- buatlah nama database baru. Lalu sesuaikan nama database, username, dan password database di file `.env`, ketikan command :
  ```bash
  php artisan migrate
  ```
- memasukkan data table ke database, ketikan command :
  ```bash
  php artisan db:seed
  ```
- menjalankan laravel di website, ketikan command :
  ```bash
  php artisan serve
  ```

## Akun Login
akun verifikasi : email = verif01@gmail.com, pw = 12345678

## Fitur
### Penglapor/Penguna
- Login & Register
- Pengajukkan Laporan Aduan
- Halaman About
- Halaman Contact
- Halaman FAQ
- Halaman Privacy Policy

### Verifikasi
- Login & Register
- Halaman Dashboard
- Konfirmasi Laporan Aduan
- Halaman About
- Halaman Contact
- Halaman FAQ
- Halaman Privacy Policy

### Manager
- Login & Register
- Halaman Dashboard
- Halaman Control Role
- Halaman Control Akun Verifikasi
- Halaman About
- Halaman Contact
- Halaman FAQ
- Halaman Privacy Policy

## Author
Projek Hackathon 2 MSIB7 - Group 4 (Kelompok 4)

- **[Backend - Michail](https://github.com/michailtjhang)**
- **[Frontend - Arshada Riza Putri](https://github.com/arshandariza)**
- **[UI/UX - Iksan Setiawan]()**
- **[UI/UX - Angelw Prana Karlau]()**
- **[UI/UX - Muhammad Mukhti Wibowo]()**
- **[UI/UX - Nicholas Chandra]()**
- **[Digital Marketing - Resa Landang]()**
- **[Digital Marketing - Muhammad Rizqi Hazami]()**
- **[Digital Marketing - Repelina Sihombing]()**

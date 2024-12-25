# About LaporPak

LaporPak adalah platform digital inovatif yang bertujuan memberdayakan masyarakat Indonesia untuk secara aktif berpartisipasi dalam pembangunan daerah mereka. Melalui platform ini, pengguna dapat melaporkan berbagai masalah lingkungan seperti jalan rusak, sampah menumpuk, atau fasilitas publik yang bermasalah, serta melampirkan foto, video, dan deskripsi rinci.

Platform ini menggunakan sistem verifikasi dan analisis data yang canggih, termasuk visualisasi interaktif seperti peta dan dashboard, untuk memastikan laporan akurat dan relevan. Laporan yang terverifikasi akan diteruskan kepada pihak terkait, seperti pemerintah daerah atau penyedia layanan, untuk tindak lanjut. LaporPak juga memungkinkan pengguna memantau progres laporan mereka.

## Requirements

<a href="https://laravel.com/docs/11.x/releases"><img src="https://img.shields.io/badge/laravel-v11-blue" alt="version laravel"></a>
<a href="https://www.php.net/releases/8.2/en.php"><img src="https://img.shields.io/badge/PHP-v8.2.4-blue" alt="version php"></a>
<a href="https://getcomposer.org/download/2.6.5/composer.phar"><img src="https://img.shields.io/badge/COMPOSER-v2.6.5-brown" alt="version php"></a>
<a href="https://cloudinary.com"><img src="https://img.shields.io/badge/Cloudinary-API%20Key-green" alt="Cloudinary"></a>
<a href="https://developers.google.com/identity"><img src="https://img.shields.io/badge/Google%20Login-API%20Key-red" alt="Google API"></a>
<a href="https://www.mysql.com/"><img src="https://img.shields.io/badge/MySQL-v8.0-orange" alt="MySQL"></a>

## Instalasi

-   download zip <a href="https://github.com/michailtjhang/LaporPak/archive/refs/heads/master.zip">Klik disini</a>
-   atau clone di terminal :
    ```bash
    git clone https://github.com/michailtjhang/LaporPak.git
    ```

## Setup

-   buka direktori project di terminal anda.
-   ketikan command di terminal :
    ```bash
    copy .env.example .env
    ```
    untuk Linuk, ketikan command :
    ```bash
    cp .env.example .env
    ```
-   instal package-package di laravel, ketikan command :
    ```bash
    composer install
    ```
-   menginstal npm UI di website, ketikan command :
    ```bash
    npm install
    ```
-   Generate app key, ketikan command :
    ```bash
    php artisan key:generate
    ```

### Command Run Website

-   menjalanlan Laravel di website, ketikan command :
    ```bash
    php artisan serve
    ```
-   menjalanlan UI Laravel di website, ketikan command :
    ```bash
    npm run dev
    ```

### Command Database

-   buatlah nama database baru. Lalu sesuaikan nama database, username, dan password database di file `.env`, ketikan command :
    ```bash
    php artisan migrate
    ```
-   memasukkan data table ke database, ketikan command :
    ```bash
    php artisan db:seed
    ```
-   menjalankan laravel di website, ketikan command :
    ```bash
    php artisan serve
    ```

## Akun Login

akun verifikasi 1 : email = verif01@gmail.com, pw = 12345678
akun verifikasi 2 : email = verif02@gmail.com, pw = 12345678
akun verifikasi 3 : email = verif03@gmail.com, pw = 12345678

## Fitur

### Penglapor/Penguna

-   **Login & Register:** Akses ke platform dengan akun pribadi.
-   **Pengajuan Laporan Aduan:** Formulir pelaporan yang mudah digunakan, termasuk lampiran multimedia (foto/video).
-   **Halaman About, Contact, FAQ, dan Privacy Policy:** Informasi tambahan tentang platform, cara menggunakan, dan kebijakan privasi.

### Verifikasi

-   **Login & Register:** Akses khusus untuk tim yang memverifikasi laporan.
-   **Halaman Dashboard:** Menampilkan ringkasan laporan yang perlu diverifikasi.
-   **Konfirmasi Laporan Aduan:** Proses validasi dan konfirmasi laporan yang diterima.
-   **Halaman Informasi Umum:** Termasuk About, Contact, FAQ, dan Privacy Policy untuk panduan lebih lanjut.

### Manager

-   **Login & Register:** Akses untuk pengguna dengan peran manajerial.
-   **Halaman Dashboard:** Menyediakan kontrol menyeluruh atas aktivitas laporan dan pengelolaan tim.
-   **Halaman Control Role:** Mengatur peran pengguna dan hak akses.
-   **Halaman Control Akun Verifikasi:** Memantau dan mengelola akun tim verifikasi.
-   **Halaman Informasi Umum:** Sama seperti di atas (About, Contact, FAQ, Privacy Policy).

## Author

Dibangun oleh tim kolaboratif dalam program Hackathon MSIB x MBKM, LaporPak adalah langkah maju dalam memanfaatkan teknologi untuk solusi sosial yang membawa dampak nyata. Slogannya: "Bersama Membangun Indonesia yang Lebih Baik."

-   **[Backend - Michail](https://github.com/michailtjhang)**
-   **[Frontend - Arshada Riza Putri](https://github.com/arshandariza)**
-   **[UI/UX - Iksan Setiawan]()**
-   **[UI/UX - Angelw Prana Karlau]()**
-   **[UI/UX - Muhammad Mukhti Wibowo]()**
-   **[UI/UX - Nicholas Chandra]()**
-   **[Digital Marketing - Resa Landang]()**
-   **[Digital Marketing - Muhammad Rizqi Hazami]()**
-   **[Digital Marketing - Repelina Sihombing]()**

<p align="center">
  <a href="" rel="noopener">
 <img width=200px height=200px src="public/asset/logo.png" alt="Project logo"></a>
</p>

<h3 align="center">RuangKominfo</h3>

<div align="center">

[![Status](https://img.shields.io/badge/status-active-success.svg)]()
[![GitHub Issues](https://img.shields.io/github/issues/kylelobo/The-Documentation-Compendium.svg)](https://github.com/kylelobo/The-Documentation-Compendium/issues)
[![GitHub Pull Requests](https://img.shields.io/github/issues-pr/kylelobo/The-Documentation-Compendium.svg)](https://github.com/kylelobo/The-Documentation-Compendium/pulls)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](/LICENSE)

</div>

---

<p align="center"> Media Penjadwalan dan Manajemen Ruangan Dinas Komunikasi dan Informatika (DINKOMINFO) Kabupaten Banyumas.
    <br> 
</p>

## 📝 Table of Contents

- [About](#about)
- [Getting Started](#getting_started)
- [Deployment](#deployment)
- [Built Using](#built_using)
- [Authors](#authors)

## 🧐 About <a name = "about"></a>

"RuangKominfo" adalah sebuah aplikasi yang dirancang untuk mempermudah dan mengoptimalkan penjadwalan serta manajemen ruang rapat bagi Dinas Komunikasi dan Informatika (DINKOMINFO) Kabupaten Banyumas. Dibangun menggunakan kerangka kerja Laravel, aplikasi ini menyediakan solusi praktis untuk menangani kompleksitas yang terkait dengan pemesanan dan pengorganisasian rapat, memastikan penggunaan ruang yang efisien, serta meminimalkan konflik penjadwalan.

Laravel, yang dikenal dengan sintaksis elegan dan alat-alat canggihnya, memungkinkan pengembangan yang cepat dan fungsionalitas yang kuat. Dengan memanfaatkan kerangka kerja ini, DINKOMINFO bertujuan untuk meningkatkan efisiensi operasional dan produktivitas di dalam departemen. Pengguna dapat dengan mudah memesan ruangan, melihat ketersediaan secara real-time, dan mengelola pengaturan serta sumber daya ruangan. Pendekatan digital ini tidak hanya menyederhanakan tugas administratif tetapi juga mempromosikan koordinasi dan komunikasi yang lebih baik di antara staf, yang pada akhirnya berkontribusi pada lingkungan kerja yang lebih terorganisir dan efektif.

## 🏁 Getting Started <a name = "getting_started"></a>

Instruksi ini akan membantu Anda mendapatkan salinan proyek "RuangKominfo" dan menjalankannya di mesin lokal Anda untuk tujuan pengembangan dan pengujian.

### Prerequisites

**PHP 8.2**:

```
   1. Unduh installer windows (https://windows.php.net/download/).
   2. Jalankan installer dan ikuti petunjuk untuk menginstal PHP.
   3. Pastikan PHP tersedia di PATH sistem Anda.
```

**Composer**:

```
   1. Unduh Composer.exe dari (https://getcomposer.org/Composer-Setup.exe).
   2. Jalankan installer dan ikuti petunjuk untuk menginstal Composer.
```

**Node.js dan NPM**:

```
   1. Unduh installer dari [Node.js](https://nodejs.org/).
   2. Jalankan installer dan ikuti petunjuk untuk menginstal Node.js dan npm.
```

**Laravel**:

```
   1. composer global require laravel/installer
```

### Installing

Setelah prasyarat diinstal, Anda dapat melanjutkan dengan instalasi:

**Kloning Repositor**i:

```
git clone https://github.com/AimLesson/RuangKominfo.git
cd RuangKominfo
```

Instal Dependensi:

```
composer install
npm install
```

Konfigurasi Lingkungan:

```
copy .env.example .env
php artisan key:generate
```
Perbarui file .env dengan konfigurasi database dan lainnya yang relevan.

Jalankan Migrasi:

```
php artisan migrate
```

Jalankan Aplikasi:

```
php artisan serve 
```

## 🚀 Deployment <a name = "deployment"></a>

- [Deployment](https://laravel.com/docs/11.x/deployment) - Check these Laravel Documentation

## ⛏️ Built Using <a name = "built_using"></a>

- [MySQL](https://www.mysql.com/) - Database
- [Apache ](https://httpd.apache.org/) - Server Framework
- [Laravel](https://laravel.com/) - Web Framework
- [NodeJs](https://nodejs.org/en/) - Server Environment

## ✍️ Authors <a name = "authors"></a>

- [@Kusmala](https://github.com/Kusmala) - Idea,Concept & Initial work
- [@AimLesson](https://github.com/Aimlesson) - Helper:v

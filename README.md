# Quiz Project - Naufal Nur Hafizh

## Informasi Mahasiswa

- **Nama:** Naufal Nur Hafizh  
- **NPM:** 223111015

## Deskripsi

Ini adalah project sederhana berbasis PHP Native dengan pendekatan OOP (Object-Oriented Programming). Project ini merupakan aplikasi kuis yang memiliki fitur login dengan session tanpa menggunakan database.

## Fitur

- Autentikasi login
- Struktur OOP yang rapi menggunakan autoload dari Composer
- Penyimpanan data berbasis file (tanpa MySQL)
- Routing dasar menggunakan PHP Native

## Struktur Direktori

```
.
├── app/                    # Folder utama untuk semua class dan logic
├── Middleware/             # Middleware seperti Authentication.php
├── pages/                  # Halaman-halaman seperti Login.php, Register.php
│   ├── Dashboard.php
│   ├── Login.php
│   └── Register.php
├── public/                 # Folder publik berisi assets (JS, CSS, gambar, dll.)
│   └── images/
├── uploads/                # Folder untuk penyimpanan file yang diunggah
├── index.php               # Entry point aplikasi
├── composer.json           # Konfigurasi autoload Composer
```

## Persyaratan Sistem

- PHP 7.4 atau lebih baru
- Composer (untuk autoloading class)
- Web server (Apache/Nginx atau PHP built-in server)

> **Catatan:** Project ini **tidak memerlukan MySQL** atau sistem database lainnya.

## Instalasi

1. **Clone repository ini:**

   ```bash
   git clone https://github.com/username/quiz-project.git
   cd quiz-project
   ```

2. **Install dependency dengan Composer:**

   ```bash
   composer install
   ```

3. **Jalankan aplikasi dengan PHP built-in server (opsional):**

   ```bash
   php -S localhost:8000
   ```

   Pastikan untuk menjalankan dari direktori root (`index.php` ada di root project).

## Autoloading

Project ini menggunakan **PSR-4 autoloading**. Pastikan semua class diletakkan dalam folder `app/` dan namespace-nya dimulai dengan `App\`.

Jika menambahkan class baru, jalankan:

```bash
composer dump-autoload
```

## Lisensi

Proyek ini menggunakan lisensi MIT.

---

```bash
Hak Cipta © 2025 Naufal Nur Hafizh
```

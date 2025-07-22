# WorkWize - Platform Freelancer Indonesia

WorkWize adalah platform web yang menghubungkan freelancer dengan klien untuk berbagai kategori pekerjaan. Platform ini memungkinkan pengguna untuk mencari pekerjaan freelance, melamar pekerjaan, dan mengelola profil mereka.

## Fitur Utama

### Untuk Pengguna (Freelancer)
- **Registrasi & Login** - Sistem autentikasi pengguna yang aman
- **Pencarian Pekerjaan** - Cari pekerjaan berdasarkan kategori dan lokasi
- **Lamar Pekerjaan** - Kirim lamaran dengan CV dan cover letter
- **Bookmark Pekerjaan** - Simpan pekerjaan favorit untuk nanti
- **Profil Pengguna** - Kelola informasi pribadi dan foto profil
- **Posting Pekerjaan** - Buat lowongan pekerjaan baru
- **Reset Password** - Fitur lupa password dengan pertanyaan keamanan

### Untuk Admin
- **Dashboard Admin** - Panel kontrol untuk mengelola platform
- **Manajemen Pengguna** - Lihat dan kelola daftar pengguna
- **Persetujuan Pekerjaan** - Approve/reject pekerjaan yang diposting
- **Daftar Aplikasi** - Kelola lamaran pekerjaan
- **Kategori Pekerjaan** - Manajemen kategori pekerjaan

## Teknologi yang Digunakan

- **Backend**: PHP 8.0+
- **Database**: MySQL/MariaDB
- **Frontend**: HTML5, CSS3, JavaScript
- **Server**: Apache (XAMPP)
- **Icons**: Font Awesome 4.7.0

## Struktur Proyek

```
WorkWize/
├── admin/                  # Panel admin
│   ├── admin_dashbord.php
│   ├── add_job.php
│   ├── user_list.php
│   └── ...
├── user/                   # Panel pengguna
│   ├── home.php
│   ├── profile.php
│   ├── add_job.php
│   └── ...
├── CSS/                    # File styling
│   ├── index.css
│   ├── login.css
│   └── ...
├── Image/                  # Asset gambar
│   ├── Home/
│   ├── FT/                # Kategori pekerjaan
│   ├── User/
│   └── logo/
├── database/
│   └── workwise.sql       # Database schema
├── uploads/               # File upload
├── conn.php              # Koneksi database
├── index.php             # Halaman utama
└── README.md
```

## 🗄️ Database Schema

Database `workwise` terdiri dari 5 tabel utama:

- **`users`** - Data pengguna dan admin
- **`jobtable`** - Pekerjaan yang sudah disetujui
- **`unapproved_job`** - Pekerjaan menunggu persetujuan
- **`apply_job`** - Data lamaran pekerjaan
- **`bmjob`** - Bookmark pekerjaan pengguna

## 🚀 Instalasi & Setup

### Prasyarat
- XAMPP/WAMP/LAMP dengan PHP 8.0+
- MySQL/MariaDB
- Web browser modern

### Langkah Instalasi

1. **Clone atau download proyek**
   ```bash
   git clone [repository-url]
   # atau download dan extract ke folder htdocs
   ```

2. **Pindahkan ke direktori XAMPP**
   ```
   Pindahkan folder WorkWize ke:
   C:\xampp\htdocs\WorkWize (Windows)
   /opt/lampp/htdocs/WorkWize (Linux)
   ```

3. **Start XAMPP Services**
   - Jalankan Apache
   - Jalankan MySQL

4. **Import Database**
   - Buka phpMyAdmin (http://localhost/phpmyadmin)
   - Buat database baru bernama `workwise`
   - Import file `database/workwise.sql`

5. **Konfigurasi Database**
   - Edit file [`conn.php`](conn.php:2) jika diperlukan:
   ```php
   $conn = mysqli_connect("localhost","root","","workwise");
   ```

6. **Akses Aplikasi**
   - Buka browser dan kunjungi: `http://localhost/WorkWize`

## 👤 Akun Default

### Admin
- **Email**: wijayanto@gmail.com
- **Password**: [sesuai hash di database]

### User Test
- **Email**: user1@gmail.com
- **Password**: [sesuai hash di database]

## 🎯 Kategori Pekerjaan

Platform mendukung 8 kategori pekerjaan utama:

1. **Graphics** - Desain Grafis
2. **Programming** - Pemrograman & Teknologi
3. **Digital** - Digital Marketing
4. **Video** - Video & Animasi
5. **Writing** - Writing & Translation
6. **Music** - Music & Audio
7. **Business** - Business
8. **AI** - AI Services

## 📱 Fitur Halaman

### Halaman Publik
- [`index.php`](index.php:1) - Halaman utama dengan kategori populer
- [`find_job.php`](find_job.php:1) - Pencarian pekerjaan
- [`job_category.php`](job_category.php:1) - Pekerjaan per kategori
- [`login.php`](login.php:1) - Login pengguna
- [`signup.php`](signup.php:1) - Registrasi pengguna
- [`about.php`](about.php:1) - Tentang platform
- [`contact_us.php`](contact_us.php:1) - Kontak

### Panel Pengguna
- [`user/home.php`](user/home.php:1) - Dashboard pengguna
- [`user/profile.php`](user/profile.php:1) - Profil pengguna
- [`user/add_job.php`](user/add_job.php:1) - Posting pekerjaan
- [`user/save_job.php`](user/save_job.php:1) - Pekerjaan tersimpan

### Panel Admin
- [`admin/admin_dashbord.php`](admin/admin_dashbord.php:1) - Dashboard admin
- [`admin/user_list.php`](admin/user_list.php:1) - Manajemen pengguna
- [`admin/approved_job.php`](admin/approved_job.php:1) - Pekerjaan disetujui
- [`admin/unapproved_job.php`](admin/unapproved_job.php:1) - Pekerjaan pending

## 🔧 Konfigurasi

### Upload File
- Direktori upload: [`uploads/`](uploads/) dan [`user/UploadImage/`](user/UploadImage/)
- Format yang didukung: JPG, PNG, GIF, PDF
- Ukuran maksimal: Sesuai konfigurasi PHP

### Session Management
- Session otomatis dimulai di setiap halaman
- Timeout session mengikuti konfigurasi PHP
- Logout otomatis menghapus semua session

## 🐛 Troubleshooting

### Masalah Umum

1. **Database Connection Error**
   - Pastikan MySQL berjalan
   - Periksa kredensial di [`conn.php`](conn.php:2)
   - Pastikan database `workwise` sudah dibuat

2. **File Upload Error**
   - Periksa permission folder `uploads/`
   - Cek konfigurasi `upload_max_filesize` di php.ini

3. **Session Issues**
   - Pastikan session.save_path dapat ditulis
   - Periksa konfigurasi session di php.ini

## 🤝 Kontribusi

1. Fork repository
2. Buat branch fitur (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📝 Lisensi

Proyek ini dibuat untuk tujuan edukasi dan pengembangan portfolio.

## 📞 Kontak

- **Developer**: Wijayanto A. Wibowo
- **Email**: wijayanto@gmail.com

## 🔄 Update Log

- **v1.0** - Rilis awal dengan fitur dasar
- Sistem login/register
- Manajemen pekerjaan
- Panel admin
- Bookmark pekerjaan

---

**WorkWize** - Connecting Freelancers with Opportunities 🚀
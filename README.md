# FRONTEND
# SISTEM JADWAL BIMBINGAN TUGAS AKHIR
Sistem yang dibuat menampilkan data mahasiswa, dosen pembimbing, jadwal bimbingan dan mencatat riwayat bimbingan untuk melihat progres tugas akhir

## 📌 Pendahuluan
Project ini menggunakan **Laravel** sebagai framework utama dengan integrasi frontend menggunakan **Blade Templating Engine** dan **Bootstrap** untuk tampilan yang responsif.  

## 🚀 Teknologi yang Digunakan
- **Laravel 12.1.1** – Framework utama untuk pengembangan aplikasi
- **PHP 8.2** - Bahasa server-side untuk mengelola logika dan proses aplikasi
- **Blade** – View engine untuk Laravel
- **Bootstrap** – Framework CSS untuk UI yang responsif
- **REST API** – Komunikasi antara frontend dan backend

## 📆 Fitur
- Registrasi/pembuatan role mahasiswa dan dosen pembimbing hnya bisa dilakukan oleh admin
- User bisa login apabila memiliki username dan password
- Pengelolaan data mahasiswa dan dosen oleh admin
- Buat jadwal bimbingan
- Dokumentasi bimbingan tugas akhir

## 🔐 Role
### Admin 
- Melakukan registrasi User
- Mengelola keseluruhan fitur sistem bimbingan tugas akhir 
### Dosen Pembimbing
- Melihat data tugas akhir mahasiswa
- Melakukan persetujuan penjadwalan bimbingan
- Unduh dokumentasi bimbingan
### Mahasiswa
- Mengelola Data Tugas Akhir
- Melakukan penjadwalan bimbingan dengan dosen pembimbing
- Unduh dokumentasi bimbingan

## 📁 Struktur Direktori
<pre> PBF-frontend-main/
├── app/
│   └── Http/
│       └── Controllers/
├── public/
├── resources/
│   ├── views/
│   ├── css/
│   └── js/
├── routes/
│   └── web.php
├── .env
├── composer.json
└── ...</pre>

## Cara Install dan Jalankan
1. Clone repository frontend ini
   <pre>git clone https://github.com/Fahranni/PBF-BIMTA.git </pre>
   
3. install backend pada https://github.com/AnayAilirpa/PBF_BackendSBTA.git

4. Masuk ke Folder
   
6. Install dependencies Laravel di terminal
   <pre>composer install</pre>
   
7. Konvigurasi .env sesuai kebutuhan
   
9. Jalankan server Laravel
    <pre>php artisan serve</pre>

# Tampilan Sistem
### Halaman Registrasi
![Registrasi](image/registrasi.png)

### Halaman Login User
![Login](image/login.png)


### Halaman Dashboard Admin
![Admin](image/admin.png)

### Halaman Dashboard Mahasiswa
![Mahasiswa](image/mahasiswa.png)

### Tabel Data Dosen Pembimbing
![Tabel](image/tabledosen.png)

### Tabel Data Mahasiswa
![Admin](image/tablemahasiswa.png)

### Halaman Jadwal Bimbingan dan Progess Bimbingan
![Bimbingan](image/bimbingan1.png)

### Halaman Form Penjadwalan
![Bimbingan](image/bimbingan2.png)

### Halaman Jadwal Bimbingan
![Bimbingan](image/bimbingan3.png)


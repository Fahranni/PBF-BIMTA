# FRONTEND
# SISTEM JADWAL BIMBINGAN TUGAS AKHIR
Sistem yang dibuat menampilkan data mahasiswa, dosen pembimbing, dan jadwal bimbingan

## 📌 Pendahuluan
Project ini menggunakan **Laravel** sebagai framework utama dengan integrasi frontend menggunakan **Blade Templating Engine** dan **Bootstrap** untuk tampilan yang responsif.  

## 🚀 Teknologi yang Digunakan
- **Laravel** – Framework utama untuk pengembangan aplikasi
- **Blade** – View engine untuk Laravel
- **Bootstrap** – Framework CSS untuk UI yang responsif
- **REST API** – Komunikasi antara frontend dan backend

## Fitur
### Data Mahasiswa
- Menampilkan data mahasiswa dengan Nama Lengkap, NPM, Angkatan, Email dan No Telepon
- Apabila login sebagai admin dan mahasiswa dapat mengelola data mahasiswa seperti menambah, mengedit, dan menghapus data mahasiswa
- Login sebagai dosen hanya dapat melihat data mahasiswa

### Data Dosen Pembimbing
- Menampilkan data dosen dengan Nama Lengkap, NIDN, Email dan No Telepon
- Apabila login sebagai admin dan dosen dapat mengelola data dosen seperti menambah, mengedit, dan menghapus data dosen pembimbing
- Login sebagai mahasiswa hanya dapat melihat data dosen
  
### Jadwal Bimbingan
- Menampilkan jadwal bimbingan antara mahasiswa dan dosen.
- Fitur tambah, edit, hapus jadwal bimbingan.

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



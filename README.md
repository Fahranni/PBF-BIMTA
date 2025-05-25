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
- 
### Jadwal Bimbingan
- Menampilkan jadwal bimbingan antara mahasiswa dan dosen.
- Fitur tambah, edit, hapus jadwal bimbingan.

## Cara Install dan Jalankan
1. Clone repository frontend ini
2. install backend pada https://github.com/AnayAilirpa/PBF_BackendSBTA.git 
3. Install dependencies Laravel (composer install)
4. Konvigurasi .env sesuai kebutuhan
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bimbingan
DB_USERNAME=root
DB_PASSWORD=
6. Jalankan server Laravel (php artisan serve)



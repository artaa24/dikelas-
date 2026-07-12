# Panduan Deployment & Hosting Aplikasi DIKELAS LMS

Dokumen ini berisi langkah-langkah detail untuk meng-hosting (deployment) proyek Laravel DIKELAS dari environment *localhost* ke server *Production* (cPanel/Hostinger atau VPS).

## 1. Persiapan Lokal (Di Komputer Anda)

Sebelum mengunggah file ke server, Anda wajib menyiapkan *build* versi produksi. 
Buka terminal di folder proyek (`c:\xampp\htdocs\dikelas`), lalu jalankan:

```bash
# 1. Pastikan seluruh dependensi frontend di-compile ke versi produksi
npm run build
```

Setelah `npm run build` selesai dijalankan, sebuah folder baru bernama `public/build` akan tercipta. Ini berisi *file* CSS dan JavaScript yang sudah di- *minify* (diringkas).

### Proses Kompresi (Zipping)
1. Buka folder `c:\xampp\htdocs\dikelas` di File Explorer.
2. Blok semua file, **KECUALI** folder `node_modules` (folder ini sangat besar dan tidak dibutuhkan di server).
3. Klik kanan, lalu kompres menjadi `dikelas_production.zip`.

---

## 2. Proses Upload ke Shared Hosting (cPanel / hPanel)

Jika Anda menggunakan layanan seperti **Hostinger** atau **Niagahoster**:

1. Login ke panel Hosting Anda, lalu buka **File Manager**.
2. Masuk ke dalam direktori `public_html` (atau folder domain Anda).
3. Unggah file `dikelas_production.zip` yang telah disiapkan tadi.
4. Lakukan **Extract** pada file ZIP tersebut di dalam *File Manager*.
5. Pindahkan isi file ekstrak langsung ke root (atau arahkan pengaturan Document Root domain Anda ke sub-folder `/public`). *Catatan: Laravel harus diakses melalui folder `public`.*

---

## 3. Konfigurasi Environment (File `.env`)

Setelah file berhasil diunggah, cari file bernama `.env` di File Manager (pastikan opsi "Show Hidden Files" menyala). Edit file tersebut menjadi seperti ini:

```env
APP_NAME="DIKELAS LMS"
# UBAH INI: Ganti menjadi production
APP_ENV=production

# UBAH INI: Pastikan false agar pesan error sistem tidak bocor ke user
APP_DEBUG=false

# UBAH INI: Ganti dengan URL asli website Anda
APP_URL=https://www.domainanda.com

# DATABASE (TIDAK PERLU DIUBAH)
# Karena aplikasi ini menggunakan PostgreSQL (Neon) yang berada di cloud,
# biarkan koneksi database ini tetap sama.
DB_CONNECTION=pgsql
DB_HOST=ep-namadatabase.ap-southeast-1.aws.neon.tech
DB_PORT=5432
DB_DATABASE=neondb
DB_USERNAME=neondb_owner
DB_PASSWORD=passwordanda
```

---

## 4. Konfigurasi Storage & Optimasi Server

Ini adalah langkah paling krusial untuk fitur LMS di mana guru/murid akan sering melakukan unggah/unduh file.

1. Buka menu **SSH Terminal** (atau Menu *Terminal* di cPanel/Hostinger).
2. Arahkan direktori terminal ke folder aplikasi Laravel Anda (contoh: `cd public_html`).
3. Jalankan perintah pembuatan Symlink (agar file unggahan bisa diakses lewat link publik):
   ```bash
   php artisan storage:link
   ```
4. Bersihkan cache instalasi lama dan optimasi performa Laravel dengan menjalankan:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

---

## 5. Uji Coba Produksi Terakhir (Checklist)

Setelah website *live* di domain Anda, pastikan untuk masuk sebagai Admin, Guru, dan Murid, lalu uji coba:
- [ ] Mendaftar akun baru dan mencoba login.
- [ ] (Guru) Mengunggah materi PDF (Pastikan materi bisa diunduh kembali).
- [ ] (Murid) Mengerjakan kuis dan mengecek apakan nilai langsung keluar.
- [ ] Mengecek apakah profil avatar pengguna muncul dengan benar.

## Penting: Kenapa Harus VPS / Cloud Hosting, bukan Vercel/Railway?
Karena fitur utama DIKELAS ini bergantung pada file yang diunggah pengguna (Materi & Pengumpulan Tugas ke `storage/app/public/submissions`), aplikasi ini membutuhkan *persistent storage* (penyimpanan permanen). 
Platform Serverless/PaaS seperti Vercel tidak menyimpan unggahan file secara permanen (file akan terhapus setelah *reload* server). Maka dari itu, **cPanel Shared/Cloud Hosting** atau **VPS** adalah jalan yang paling tepat.

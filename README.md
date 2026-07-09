# DIKELAS

> **Belajar Lebih Mudah, Mengajar Lebih Bermakna.**

---

## Tentang

**DIKELAS** adalah Learning Management System (LMS) berbasis web yang dirancang khusus untuk sekolah di Indonesia. Platform ini menghubungkan **Murid**, **Guru**, dan **Super Admin** dalam satu ekosistem pembelajaran digital yang modern, intuitif, dan aman.

DIKELAS lebih lengkap dari Google Classroom dalam manajemen akademik, namun tetap sederhana digunakan.

---

## Fitur Utama

| Modul | Deskripsi |
|---|---|
| 🔐 **Autentikasi** | Login, Register, Reset Password, Role-based redirect |
| 📊 **Dashboard** | Dashboard khusus per role (Murid, Guru, Admin) |
| 📚 **Manajemen Kelas** | Buat kelas, join dengan kode unik, kelola anggota |
| 📖 **Materi** | Upload PDF, Video, Dokumen; download dan streaming |
| 📝 **Tugas** | Buat tugas, submit jawaban, penilaian dan feedback |
| 📋 **Quiz** | Pilihan ganda, benar/salah, essay; auto-grading |
| 📊 **Penilaian** | Input nilai, rekap per kelas, export ke Excel |
| 📅 **Kalender** | Deadline tugas, jadwal quiz, event akademik |
| 💬 **Diskusi** | Forum diskusi per kelas |
| 📢 **Pengumuman** | Pengumuman kelas dan global |
| 👥 **Admin** | Kelola guru, murid, mapel, semester, tahun ajaran |
| 💾 **Backup** | Backup & restore database |
| 📥 **Import/Export** | Import/export data via Excel |
| 📋 **Activity Log** | Audit trail aktivitas pengguna |

---

## Tech Stack

| Layer | Teknologi |
|---|---|
| **Backend** | PHP 8.4, Laravel 12 |
| **Frontend** | Blade, TailwindCSS 4, Livewire 3, AlpineJS 3 |
| **Database** | MySQL 8.0 |
| **Auth** | Laravel Breeze + Sanctum |
| **Build** | Vite |

---

## Requirements

| Requirement | Minimum |
|---|---|
| PHP | 8.4 |
| MySQL | 8.0 |
| Composer | 2.x |
| Node.js | 18.x |
| NPM | 9.x |

---

## Instalasi

```bash
# 1. Clone repository
git clone <repository-url>
cd DIKELAS

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies
npm install

# 4. Setup environment
cp .env.example .env
php artisan key:generate

# 5. Konfigurasi database di .env
# DB_DATABASE=dikelas
# DB_USERNAME=root
# DB_PASSWORD=

# 6. Jalankan migration dan seeder
php artisan migrate
php artisan db:seed

# 7. Build assets
npm run dev

# 8. Jalankan server
php artisan serve
```

Buka `http://localhost:8000` di browser.

---

## Role Pengguna

| Role | Slug | Registrasi |
|---|---|---|
| **Super Admin** | `super_admin` | Seeder (default) |
| **Guru** | `teacher` | Dibuat oleh Admin |
| **Murid** | `student` | Self-register |

---

## Struktur Dokumentasi

Seluruh dokumentasi proyek tersedia di folder [`docs/`](./docs/):

| No | Dokumen | Deskripsi |
|---|---|---|
| 00 | [Project Overview](./docs/00_PROJECT_OVERVIEW.md) | Ringkasan keseluruhan proyek |
| 01 | [PRD](./docs/01_PRODUCT_REQUIREMENTS_DOCUMENT.md) | Product Requirements Document |
| 02 | [Business Requirements](./docs/02_BUSINESS_REQUIREMENTS.md) | Kebutuhan bisnis |
| 03 | [Product Vision](./docs/03_PRODUCT_VISION.md) | Visi dan nilai produk |
| 04 | [Product Scope](./docs/04_PRODUCT_SCOPE.md) | Cakupan produk |
| 05 | [User Persona](./docs/05_USER_PERSONA.md) | Profil pengguna |
| 06 | [User Roles](./docs/06_USER_ROLES.md) | Definisi role |
| 07 | [Feature List](./docs/07_FEATURE_LIST.md) | Daftar fitur lengkap |
| 08 | [Functional Requirements](./docs/08_FUNCTIONAL_REQUIREMENTS.md) | Kebutuhan fungsional |
| 09 | [Non-Functional Requirements](./docs/09_NON_FUNCTIONAL_REQUIREMENTS.md) | Kebutuhan non-fungsional |
| 10 | [Information Architecture](./docs/10_INFORMATION_ARCHITECTURE.md) | Arsitektur informasi |
| 11 | [User Flow](./docs/11_USER_FLOW.md) | Alur pengguna |
| 12 | [Sitemap](./docs/12_SITEMAP.md) | Peta situs |
| 13 | [Database Requirements](./docs/13_DATABASE_REQUIREMENTS.md) | Kebutuhan database |
| 14 | [Security Requirements](./docs/14_SECURITY_REQUIREMENTS.md) | Kebutuhan keamanan |
| 15 | [Notification System](./docs/15_NOTIFICATION_SYSTEM.md) | Sistem notifikasi |
| 16 | [Assignment System](./docs/16_ASSIGNMENT_SYSTEM.md) | Sistem tugas |
| 17 | [Grade System](./docs/17_GRADE_SYSTEM.md) | Sistem penilaian |
| 18 | [Quiz System](./docs/18_QUIZ_SYSTEM.md) | Sistem quiz |
| 19 | [Permission Matrix](./docs/19_PERMISSION_MATRIX.md) | Matriks izin akses |
| 20 | [Tech Stack](./docs/20_TECH_STACK.md) | Teknologi yang digunakan |
| 21 | [Laravel Architecture](./docs/21_LARAVEL_ARCHITECTURE.md) | Arsitektur Laravel |
| 22 | [Folder Structure](./docs/22_FOLDER_STRUCTURE.md) | Struktur folder |
| 23 | [Development Guidelines](./docs/23_DEVELOPMENT_GUIDELINES.md) | Panduan pengembangan |
| 24 | [Coding Standard](./docs/24_CODING_STANDARD.md) | Standar penulisan kode |
| 25 | [UI Guidelines](./docs/25_UI_GUIDELINES.md) | Panduan desain UI |
| 26 | [Deployment Plan](./docs/26_DEPLOYMENT_PLAN.md) | Rencana deployment |
| 27 | [Testing Plan](./docs/27_TESTING_PLAN.md) | Rencana pengujian |
| 28 | [Roadmap](./docs/28_ROADMAP.md) | Peta jalan pengembangan |
| 29 | [Acceptance Criteria](./docs/29_ACCEPTANCE_CRITERIA.md) | Kriteria penerimaan |
| 30 | [Release Plan](./docs/30_RELEASE_PLAN.md) | Rencana rilis |

---

## Lisensi

Proyek ini bersifat **private** dan digunakan untuk keperluan pendidikan.

---

*Dikembangkan dengan ❤️ untuk pendidikan Indonesia.*

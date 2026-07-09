# 00 — Project Overview

> **Dokumen Referensi:** [01_PRODUCT_REQUIREMENTS_DOCUMENT.md](./01_PRODUCT_REQUIREMENTS_DOCUMENT.md) · [03_PRODUCT_VISION.md](./03_PRODUCT_VISION.md) · [20_TECH_STACK.md](./20_TECH_STACK.md)

---

## 1. Ringkasan Eksekutif

**DIKELAS** adalah Learning Management System (LMS) berbasis web yang dirancang khusus untuk kebutuhan sekolah di Indonesia. Platform ini menghubungkan tiga aktor utama — **Murid**, **Guru**, dan **Super Admin** — dalam satu ekosistem pembelajaran digital yang modern, intuitif, dan aman.

| Atribut | Detail |
|---|---|
| **Nama Project** | DIKELAS |
| **Tagline** | *Belajar Lebih Mudah, Mengajar Lebih Bermakna.* |
| **Jenis Aplikasi** | Learning Management System (LMS) |
| **Target Market** | Sekolah Indonesia (SD, SMP, SMA, SMK) |
| **Platform** | Web Application (Responsive) |
| **Versi Awal** | 1.0.0 (MVP) |
| **Status** | Pre-Development (Fase Dokumentasi) |

---

## 2. Latar Belakang

Transformasi digital dalam dunia pendidikan Indonesia membutuhkan platform LMS yang:

1. **Mudah digunakan** oleh guru dan murid dengan berbagai tingkat literasi digital
2. **Terjangkau** untuk sekolah dengan berbagai skala anggaran
3. **Sesuai dengan kurikulum** dan sistem pendidikan Indonesia (semester, tahun ajaran, mata pelajaran)
4. **Mendukung pembelajaran hybrid** — tatap muka dan daring
5. **Memiliki UI/UX modern** yang setara dengan platform global

Saat ini, banyak sekolah di Indonesia masih menggunakan metode konvensional (WhatsApp Group, Google Drive manual, dan formulir fisik) untuk mengelola pembelajaran. DIKELAS hadir sebagai solusi terintegrasi yang menggabungkan semua kebutuhan tersebut dalam satu platform.

---

## 3. Visi & Misi

### Visi
Menjadi platform LMS terdepan di Indonesia yang memberdayakan setiap sekolah untuk menjalankan pembelajaran digital berkualitas tinggi.

### Misi
- Menyediakan platform LMS yang intuitif dan mudah digunakan
- Mendukung ekosistem pendidikan Indonesia dengan fitur yang relevan
- Memastikan keamanan data siswa dan guru
- Memberikan pengalaman pengguna setara platform internasional
- Menyediakan tools administrasi yang komprehensif untuk pengelola sekolah

---

## 4. Stakeholder

| Stakeholder | Peran | Kepentingan |
|---|---|---|
| **Product Owner** | Pemilik visi produk | Menentukan prioritas fitur dan roadmap |
| **Product Manager** | Pengelola produk | Menerjemahkan visi menjadi requirement |
| **UI/UX Designer** | Perancang antarmuka | Merancang pengalaman pengguna yang optimal |
| **Backend Developer** | Pengembang server | Membangun logika bisnis dan API |
| **Frontend Developer** | Pengembang UI | Mengimplementasikan desain ke kode |
| **QA Engineer** | Penjamin kualitas | Memastikan kualitas dan bebas bug |
| **Database Engineer** | Arsitek data | Merancang dan mengoptimalkan database |
| **DevOps** | Infrastruktur | Deployment, monitoring, dan maintenance |

---

## 5. Target Pengguna

### 5.1 Murid (Student)
- Usia: 6–18 tahun (SD–SMA/SMK)
- Mengakses materi, mengerjakan tugas, melihat nilai
- Berinteraksi dalam forum diskusi kelas
- Membutuhkan antarmuka yang sederhana dan menarik

### 5.2 Guru (Teacher)
- Usia: 25–60 tahun
- Membuat dan mengelola kelas, materi, tugas, dan quiz
- Memberikan penilaian dan feedback
- Membutuhkan dashboard yang efisien dan informatif

### 5.3 Super Admin (Administrator)
- Pengelola sistem sekolah
- Mengatur pengguna, kelas, mata pelajaran, semester, tahun ajaran
- Melakukan backup, restore, import/export data
- Memantau aktivitas sistem melalui activity log

---

## 6. Arsitektur Tingkat Tinggi

```
┌─────────────────────────────────────────────────────┐
│                    CLIENT LAYER                      │
│  ┌──────────┐  ┌──────────┐  ┌────────────────────┐ │
│  │  Browser  │  │  Mobile  │  │   Responsive Web   │ │
│  │ (Desktop) │  │ (Tablet) │  │    (Smartphone)    │ │
│  └──────────┘  └──────────┘  └────────────────────┘ │
└────────────────────────┬────────────────────────────┘
                         │ HTTPS
┌────────────────────────▼────────────────────────────┐
│                 APPLICATION LAYER                    │
│  ┌─────────────────────────────────────────────────┐ │
│  │              Laravel 12 (PHP 8.4)               │ │
│  │  ┌──────────┐ ┌──────────┐ ┌────────────────┐  │ │
│  │  │  Blade   │ │ Livewire │ │   AlpineJS     │  │ │
│  │  │ Template │ │Component │ │  Interactivity │  │ │
│  │  └──────────┘ └──────────┘ └────────────────┘  │ │
│  │  ┌──────────┐ ┌──────────┐ ┌────────────────┐  │ │
│  │  │Controller│ │ Service  │ │  Repository    │  │ │
│  │  │  Layer   │ │  Layer   │ │    Layer       │  │ │
│  │  └──────────┘ └──────────┘ └────────────────┘  │ │
│  └─────────────────────────────────────────────────┘ │
└────────────────────────┬────────────────────────────┘
                         │
┌────────────────────────▼────────────────────────────┐
│                   DATA LAYER                         │
│  ┌──────────────┐  ┌───────────────────────────┐    │
│  │  MySQL 8.0   │  │   Laravel Storage (Local)  │   │
│  │  (Database)  │  │   (Files, Media, Backup)   │   │
│  └──────────────┘  └───────────────────────────┘    │
└─────────────────────────────────────────────────────┘
```

---

## 7. Tech Stack Overview

| Kategori | Teknologi | Versi |
|---|---|---|
| **Runtime** | PHP | 8.4 |
| **Framework** | Laravel | 12 |
| **Template Engine** | Blade | Latest |
| **CSS Framework** | TailwindCSS | 4.x |
| **Reactive Components** | Livewire | 3.x |
| **JS Framework** | AlpineJS | 3.x |
| **Database** | MySQL | 8.0 |
| **Authentication** | Laravel Breeze + Sanctum | Latest |
| **File Storage** | Laravel Storage (Local) | Latest |
| **Build Tool** | Vite | Latest |

> Detail lengkap: [20_TECH_STACK.md](./20_TECH_STACK.md)

---

## 8. Fitur Utama

### 8.1 Manajemen Kelas
- Pembuatan dan pengelolaan kelas oleh guru
- Murid bergabung ke kelas menggunakan kode unik
- Dashboard kelas dengan ringkasan aktivitas

### 8.2 Manajemen Materi
- Upload materi dalam berbagai format (PDF, Video, Dokumen)
- Organisasi materi berdasarkan topik/bab
- Download materi oleh murid

### 8.3 Sistem Tugas
- Pembuatan tugas dengan deadline
- Upload jawaban oleh murid
- Penilaian dan feedback oleh guru

### 8.4 Sistem Quiz
- Pembuatan quiz dengan berbagai tipe soal
- Auto-grading untuk soal pilihan ganda
- Laporan hasil quiz

### 8.5 Sistem Penilaian
- Input nilai manual dan otomatis
- Rekap nilai per siswa, per kelas, per semester
- Export laporan nilai

### 8.6 Kalender Akademik
- Jadwal tugas dan ujian
- Pengumuman dan event sekolah
- Sinkronisasi deadline

### 8.7 Forum Diskusi
- Diskusi per kelas
- Komentar dan reply
- Notifikasi aktivitas

### 8.8 Administrasi Sekolah
- Manajemen pengguna (guru dan murid)
- Manajemen mata pelajaran, semester, tahun ajaran
- Backup dan restore database
- Import/export data via Excel
- Activity log dan audit trail
- Pengaturan role dan permission

> Detail lengkap: [07_FEATURE_LIST.md](./07_FEATURE_LIST.md)

---

## 9. Referensi Desain

UI/UX DIKELAS terinspirasi dari platform-platform berikut, namun memiliki **identitas visual sendiri**:

| Platform | Inspirasi yang Diambil |
|---|---|
| **Google Classroom** | Simplicity, card-based layout, class management flow |
| **Notion** | Clean typography, block-based content, sidebar navigation |
| **Microsoft Teams Education** | Dashboard layout, assignment flow, team management |
| **Apple Human Interface** | Spacing, typography hierarchy, attention to detail |
| **Linear** | Minimalist UI, keyboard shortcuts, fast interactions |

---

## 10. Metrik Keberhasilan

| Metrik | Target | Pengukuran |
|---|---|---|
| **Page Load Time** | < 2 detik | Lighthouse Performance Score |
| **User Onboarding** | < 5 menit | Waktu dari register hingga first action |
| **Uptime** | 99.5% | Monitoring tools |
| **Bug Rate** | < 5 bug/sprint | QA Report |
| **User Satisfaction** | > 4.0/5.0 | Survei pengguna |

---

## 11. Peta Dokumen

Berikut adalah daftar seluruh dokumen dalam folder `docs/` beserta keterkaitannya:

| No | Dokumen | Deskripsi | Terhubung Dengan |
|---|---|---|---|
| 00 | Project Overview | Ringkasan keseluruhan project | Semua dokumen |
| 01 | PRD | Requirement produk lengkap | 02, 03, 07, 08 |
| 02 | Business Requirements | Kebutuhan bisnis | 01, 03, 04 |
| 03 | Product Vision | Visi produk | 01, 02, 04 |
| 04 | Product Scope | Cakupan produk | 01, 03, 07 |
| 05 | User Persona | Profil pengguna | 06, 11 |
| 06 | User Roles | Definisi role | 05, 19 |
| 07 | Feature List | Daftar fitur | 01, 08, 11 |
| 08 | Functional Requirements | Kebutuhan fungsional | 07, 09, 13 |
| 09 | Non-Functional Requirements | Kebutuhan non-fungsional | 08, 14 |
| 10 | Information Architecture | Arsitektur informasi | 11, 12 |
| 11 | User Flow | Alur pengguna | 05, 07, 10 |
| 12 | Sitemap | Peta situs | 10, 11 |
| 13 | Database Requirements | Kebutuhan database | 08, 21 |
| 14 | Security Requirements | Kebutuhan keamanan | 09, 19 |
| 15 | Notification System | Sistem notifikasi | 07, 16 |
| 16 | Assignment System | Sistem tugas | 07, 17 |
| 17 | Grade System | Sistem penilaian | 16, 18 |
| 18 | Quiz System | Sistem quiz | 17, 07 |
| 19 | Permission Matrix | Matriks izin akses | 06, 14 |
| 20 | Tech Stack | Teknologi yang digunakan | 21, 22 |
| 21 | Laravel Architecture | Arsitektur Laravel | 20, 22, 24 |
| 22 | Folder Structure | Struktur folder | 21, 23 |
| 23 | Development Guidelines | Panduan pengembangan | 22, 24 |
| 24 | Coding Standard | Standar penulisan kode | 23, 25 |
| 25 | UI Guidelines | Panduan desain UI | 24, 11 |
| 26 | Deployment Plan | Rencana deployment | 27, 30 |
| 27 | Testing Plan | Rencana pengujian | 26, 29 |
| 28 | Roadmap | Peta jalan pengembangan | 30, 04 |
| 29 | Acceptance Criteria | Kriteria penerimaan | 27, 29 |
| 30 | Release Plan | Rencana rilis | 28, 26 |

---

## 12. Konvensi Dokumen

### Format Penulisan
- Semua dokumen menggunakan format **Markdown** (.md)
- Bahasa yang digunakan: **Bahasa Indonesia** (profesional)
- Heading menggunakan hierarki `#`, `##`, `###`
- Data tabular menggunakan tabel Markdown
- Diagram menggunakan Mermaid atau ASCII art
- Code block menggunakan syntax highlighting

### Versi Dokumen
- Setiap perubahan signifikan harus di-commit dengan pesan yang jelas
- Gunakan semantic versioning untuk dokumen mayor

### Status Dokumen

| Status | Deskripsi |
|---|---|
| 📝 Draft | Dokumen masih dalam proses penulisan |
| 🔍 Review | Dokumen siap untuk direview |
| ✅ Approved | Dokumen telah disetujui |
| 🔄 Updated | Dokumen telah diperbarui setelah approval |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*



<!-- ============================================== -->
# SOURCE FILE: 00_PROJECT_OVERVIEW.md
<!-- ============================================== -->


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


<!-- ============================================== -->
# SOURCE FILE: 01_PRODUCT_REQUIREMENTS_DOCUMENT.md
<!-- ============================================== -->


# 01 — Product Requirements Document (PRD)

> **Dokumen Terkait:** [00_PROJECT_OVERVIEW.md](./00_PROJECT_OVERVIEW.md) · [02_BUSINESS_REQUIREMENTS.md](./02_BUSINESS_REQUIREMENTS.md) · [07_FEATURE_LIST.md](./07_FEATURE_LIST.md) · [08_FUNCTIONAL_REQUIREMENTS.md](./08_FUNCTIONAL_REQUIREMENTS.md)

---

## 1. Informasi Dokumen

| Atribut | Detail |
|---|---|
| **Nama Produk** | DIKELAS |
| **Versi Dokumen** | 1.0.0 |
| **Tanggal** | Juli 2026 |
| **Penulis** | Product Team |
| **Status** | ✅ Approved |
| **Reviewer** | Technical Lead, Product Owner |

---

## 2. Tujuan Dokumen

Dokumen ini mendefinisikan seluruh requirement produk DIKELAS secara komprehensif. Dokumen ini menjadi **single source of truth** bagi seluruh tim — mulai dari Product Manager, Designer, Developer, QA, hingga DevOps — untuk memahami apa yang akan dibangun, mengapa dibangun, dan bagaimana kriteria keberhasilannya.

---

## 3. Problem Statement

### 3.1 Masalah yang Dihadapi

Sekolah-sekolah di Indonesia menghadapi beberapa tantangan dalam mengelola pembelajaran digital:

| No | Masalah | Dampak |
|---|---|---|
| 1 | Tidak ada platform terpusat untuk mengelola pembelajaran | Informasi tersebar di WhatsApp, email, dan Google Drive |
| 2 | Kesulitan mendistribusikan materi pembelajaran | Guru harus mengirim file satu per satu |
| 3 | Proses pengumpulan tugas tidak terstruktur | Tugas hilang, terlambat, atau tidak terlacak |
| 4 | Penilaian masih manual | Guru membutuhkan waktu lama untuk merekap nilai |
| 5 | Tidak ada visibility untuk orang tua/admin | Sulit memantau progress pembelajaran |
| 6 | Platform LMS yang ada terlalu kompleks atau mahal | Guru dan murid kesulitan menggunakan |

### 3.2 Solusi yang Ditawarkan

DIKELAS menyediakan platform LMS terintegrasi yang:

- **Sederhana** — UI yang clean dan intuitif, terinspirasi dari Google Classroom dan Notion
- **Lengkap** — Mencakup materi, tugas, quiz, penilaian, dan administrasi
- **Terjangkau** — Self-hosted, tidak memerlukan biaya langganan cloud mahal
- **Sesuai konteks Indonesia** — Mendukung struktur semester, tahun ajaran, dan mata pelajaran sekolah Indonesia

---

## 4. Target Pengguna

### 4.1 Primary Users

| Role | Deskripsi | Jumlah Estimasi per Sekolah |
|---|---|---|
| **Murid** | Siswa aktif yang mengikuti pembelajaran | 200 – 1.500 siswa |
| **Guru** | Pengajar yang mengelola kelas dan materi | 20 – 100 guru |
| **Super Admin** | Administrator sistem sekolah | 1 – 3 orang |

### 4.2 User Demographics

```
Murid:
├── Usia: 6–18 tahun
├── Device: Smartphone (70%), Laptop (25%), Tablet (5%)
├── Literasi Digital: Menengah
└── Kebutuhan Utama: Akses materi, submit tugas, lihat nilai

Guru:
├── Usia: 25–60 tahun
├── Device: Laptop (60%), Smartphone (35%), Tablet (5%)
├── Literasi Digital: Menengah-Rendah
└── Kebutuhan Utama: Upload materi, buat tugas, input nilai

Super Admin:
├── Usia: 30–50 tahun
├── Device: Laptop/Desktop (90%), Smartphone (10%)
├── Literasi Digital: Menengah-Tinggi
└── Kebutuhan Utama: Kelola pengguna, monitoring, reporting
```

> Detail persona: [05_USER_PERSONA.md](./05_USER_PERSONA.md)

---

## 5. Product Requirements

### 5.1 Modul Autentikasi (AUTH)

| ID | Requirement | Prioritas | Role |
|---|---|---|---|
| AUTH-001 | Murid dapat mendaftar akun baru | P0 (Must) | Murid |
| AUTH-002 | Pengguna dapat login dengan email dan password | P0 (Must) | Semua |
| AUTH-003 | Pengguna dapat logout | P0 (Must) | Semua |
| AUTH-004 | Pengguna dapat reset password via email | P1 (Should) | Semua |
| AUTH-005 | Sistem mengarahkan pengguna ke dashboard sesuai role | P0 (Must) | Semua |
| AUTH-006 | Super Admin dapat membuat akun guru | P0 (Must) | Super Admin |
| AUTH-007 | Session management dengan timeout otomatis | P1 (Should) | Semua |
| AUTH-008 | Rate limiting untuk login attempts | P0 (Must) | Semua |

### 5.2 Modul Dashboard (DASH)

| ID | Requirement | Prioritas | Role |
|---|---|---|---|
| DASH-001 | Murid melihat daftar kelas yang diikuti | P0 (Must) | Murid |
| DASH-002 | Murid melihat tugas terbaru yang belum dikerjakan | P0 (Must) | Murid |
| DASH-003 | Guru melihat daftar kelas yang diajar | P0 (Must) | Guru |
| DASH-004 | Guru melihat ringkasan tugas yang perlu dinilai | P0 (Must) | Guru |
| DASH-005 | Super Admin melihat statistik keseluruhan sistem | P0 (Must) | Super Admin |
| DASH-006 | Widget kalender di dashboard | P1 (Should) | Murid, Guru |
| DASH-007 | Pengumuman terbaru di dashboard | P1 (Should) | Semua |
| DASH-008 | Quick action buttons sesuai role | P2 (Nice) | Semua |

### 5.3 Modul Kelas (CLASS)

| ID | Requirement | Prioritas | Role |
|---|---|---|---|
| CLASS-001 | Guru dapat membuat kelas baru | P0 (Must) | Guru |
| CLASS-002 | Guru dapat mengedit informasi kelas | P0 (Must) | Guru |
| CLASS-003 | Guru dapat mengarsipkan/menonaktifkan kelas | P1 (Should) | Guru |
| CLASS-004 | Sistem generate kode unik untuk setiap kelas | P0 (Must) | Sistem |
| CLASS-005 | Murid dapat bergabung ke kelas menggunakan kode | P0 (Must) | Murid |
| CLASS-006 | Murid dapat keluar dari kelas | P1 (Should) | Murid |
| CLASS-007 | Guru melihat daftar anggota kelas | P0 (Must) | Guru |
| CLASS-008 | Guru dapat mengeluarkan murid dari kelas | P1 (Should) | Guru |
| CLASS-009 | Kelas terkait dengan mata pelajaran dan semester | P0 (Must) | Sistem |
| CLASS-010 | Super Admin dapat mengelola semua kelas | P0 (Must) | Super Admin |

### 5.4 Modul Materi (MATERIAL)

| ID | Requirement | Prioritas | Role |
|---|---|---|---|
| MAT-001 | Guru dapat upload materi (PDF, dokumen) | P0 (Must) | Guru |
| MAT-002 | Guru dapat upload video pembelajaran | P0 (Must) | Guru |
| MAT-003 | Guru dapat membuat materi teks (rich text) | P1 (Should) | Guru |
| MAT-004 | Materi diorganisasi berdasarkan topik/bab | P0 (Must) | Guru |
| MAT-005 | Murid dapat melihat daftar materi per kelas | P0 (Must) | Murid |
| MAT-006 | Murid dapat download materi | P0 (Must) | Murid |
| MAT-007 | Murid dapat streaming video | P1 (Should) | Murid |
| MAT-008 | Guru dapat mengatur urutan materi | P1 (Should) | Guru |
| MAT-009 | Tracking murid yang telah melihat materi | P2 (Nice) | Guru |

### 5.5 Modul Tugas (ASSIGNMENT)

| ID | Requirement | Prioritas | Role |
|---|---|---|---|
| ASG-001 | Guru dapat membuat tugas dengan deskripsi | P0 (Must) | Guru |
| ASG-002 | Guru dapat mengatur deadline tugas | P0 (Must) | Guru |
| ASG-003 | Guru dapat melampirkan file pada tugas | P0 (Must) | Guru |
| ASG-004 | Murid dapat melihat daftar tugas per kelas | P0 (Must) | Murid |
| ASG-005 | Murid dapat upload jawaban tugas | P0 (Must) | Murid |
| ASG-006 | Murid dapat re-submit jawaban sebelum deadline | P1 (Should) | Murid |
| ASG-007 | Guru dapat melihat daftar submission | P0 (Must) | Guru |
| ASG-008 | Sistem menampilkan status tugas (belum/sudah dikerjakan/terlambat) | P0 (Must) | Sistem |
| ASG-009 | Guru dapat memberikan feedback teks pada submission | P1 (Should) | Guru |
| ASG-010 | Notifikasi tugas baru dan deadline mendekati | P1 (Should) | Murid |

> Detail lengkap: [16_ASSIGNMENT_SYSTEM.md](./16_ASSIGNMENT_SYSTEM.md)

### 5.6 Modul Quiz (QUIZ)

| ID | Requirement | Prioritas | Role |
|---|---|---|---|
| QUIZ-001 | Guru dapat membuat quiz | P0 (Must) | Guru |
| QUIZ-002 | Support tipe soal: pilihan ganda | P0 (Must) | Guru |
| QUIZ-003 | Support tipe soal: essay | P1 (Should) | Guru |
| QUIZ-004 | Support tipe soal: benar/salah | P1 (Should) | Guru |
| QUIZ-005 | Guru dapat mengatur durasi quiz | P0 (Must) | Guru |
| QUIZ-006 | Guru dapat mengatur tanggal mulai dan selesai | P0 (Must) | Guru |
| QUIZ-007 | Auto-grading untuk pilihan ganda dan benar/salah | P0 (Must) | Sistem |
| QUIZ-008 | Murid melihat hasil quiz setelah selesai | P0 (Must) | Murid |
| QUIZ-009 | Guru dapat melihat analisis hasil quiz | P1 (Should) | Guru |
| QUIZ-010 | Randomisasi urutan soal | P2 (Nice) | Sistem |

> Detail lengkap: [18_QUIZ_SYSTEM.md](./18_QUIZ_SYSTEM.md)

### 5.7 Modul Penilaian (GRADE)

| ID | Requirement | Prioritas | Role |
|---|---|---|---|
| GRD-001 | Guru dapat memberikan nilai pada tugas | P0 (Must) | Guru |
| GRD-002 | Guru dapat memberikan nilai pada quiz | P0 (Must) | Guru |
| GRD-003 | Murid dapat melihat nilai per tugas/quiz | P0 (Must) | Murid |
| GRD-004 | Rekap nilai per kelas per semester | P0 (Must) | Guru |
| GRD-005 | Murid melihat ringkasan nilai keseluruhan | P1 (Should) | Murid |
| GRD-006 | Export nilai ke Excel | P1 (Should) | Guru |
| GRD-007 | Sistem penilaian menggunakan skala yang configurable | P2 (Nice) | Super Admin |

> Detail lengkap: [17_GRADE_SYSTEM.md](./17_GRADE_SYSTEM.md)

### 5.8 Modul Kalender (CAL)

| ID | Requirement | Prioritas | Role |
|---|---|---|---|
| CAL-001 | Kalender menampilkan deadline tugas | P0 (Must) | Murid, Guru |
| CAL-002 | Kalender menampilkan jadwal quiz | P0 (Must) | Murid, Guru |
| CAL-003 | Kalender menampilkan pengumuman/event | P1 (Should) | Semua |
| CAL-004 | Filter kalender berdasarkan kelas | P1 (Should) | Murid, Guru |
| CAL-005 | Tampilan kalender bulanan dan mingguan | P1 (Should) | Semua |

### 5.9 Modul Diskusi (DISC)

| ID | Requirement | Prioritas | Role |
|---|---|---|---|
| DISC-001 | Forum diskusi per kelas | P0 (Must) | Murid, Guru |
| DISC-002 | Murid dan guru dapat membuat post | P0 (Must) | Murid, Guru |
| DISC-003 | Murid dan guru dapat membalas post (reply) | P0 (Must) | Murid, Guru |
| DISC-004 | Guru dapat menghapus post yang tidak pantas | P1 (Should) | Guru |
| DISC-005 | Notifikasi reply baru | P1 (Should) | Murid, Guru |

### 5.10 Modul Pengumuman (ANN)

| ID | Requirement | Prioritas | Role |
|---|---|---|---|
| ANN-001 | Guru dapat membuat pengumuman per kelas | P0 (Must) | Guru |
| ANN-002 | Super Admin dapat membuat pengumuman global | P0 (Must) | Super Admin |
| ANN-003 | Pengumuman ditampilkan di dashboard | P0 (Must) | Semua |
| ANN-004 | Pengumuman dapat di-pin | P1 (Should) | Guru, Super Admin |
| ANN-005 | Notifikasi pengumuman baru | P1 (Should) | Semua |

### 5.11 Modul Profil (PROF)

| ID | Requirement | Prioritas | Role |
|---|---|---|---|
| PROF-001 | Pengguna dapat melihat profil sendiri | P0 (Must) | Semua |
| PROF-002 | Pengguna dapat mengedit profil (nama, foto, bio) | P0 (Must) | Semua |
| PROF-003 | Pengguna dapat mengubah password | P0 (Must) | Semua |
| PROF-004 | Upload foto profil | P1 (Should) | Semua |
| PROF-005 | Murid melihat ringkasan akademik di profil | P2 (Nice) | Murid |

### 5.12 Modul Administrasi (ADM)

| ID | Requirement | Prioritas | Role |
|---|---|---|---|
| ADM-001 | Super Admin mengelola data guru (CRUD) | P0 (Must) | Super Admin |
| ADM-002 | Super Admin mengelola data murid (CRUD) | P0 (Must) | Super Admin |
| ADM-003 | Super Admin mengelola kelas | P0 (Must) | Super Admin |
| ADM-004 | Super Admin mengelola mata pelajaran | P0 (Must) | Super Admin |
| ADM-005 | Super Admin mengelola semester | P0 (Must) | Super Admin |
| ADM-006 | Super Admin mengelola tahun ajaran | P0 (Must) | Super Admin |
| ADM-007 | Backup database | P0 (Must) | Super Admin |
| ADM-008 | Restore database | P0 (Must) | Super Admin |
| ADM-009 | Import data dari Excel | P1 (Should) | Super Admin |
| ADM-010 | Export data ke Excel | P1 (Should) | Super Admin |
| ADM-011 | Activity log untuk audit trail | P0 (Must) | Super Admin |
| ADM-012 | Manajemen role dan permission | P0 (Must) | Super Admin |
| ADM-013 | System settings (nama sekolah, logo, dll) | P1 (Should) | Super Admin |

---

## 6. Prioritas Requirement

### Definisi Prioritas

| Label | Definisi | Timeline |
|---|---|---|
| **P0 (Must Have)** | Fitur wajib untuk MVP, produk tidak bisa rilis tanpa ini | Sprint 1–4 |
| **P1 (Should Have)** | Fitur penting yang sangat diharapkan pengguna | Sprint 5–8 |
| **P2 (Nice to Have)** | Fitur tambahan yang meningkatkan pengalaman | Sprint 9–12 |
| **P3 (Future)** | Fitur untuk versi mendatang | Post-release |

### Ringkasan Prioritas

| Prioritas | Jumlah Requirement | Persentase |
|---|---|---|
| P0 (Must Have) | 48 | 55% |
| P1 (Should Have) | 30 | 34% |
| P2 (Nice to Have) | 7 | 8% |
| P3 (Future) | 3 | 3% |

---

## 7. Constraints & Assumptions

### 7.1 Constraints (Batasan)

| No | Constraint | Deskripsi |
|---|---|---|
| 1 | **Self-hosted** | Aplikasi di-deploy di server sekolah atau hosting terjangkau |
| 2 | **Bandwidth terbatas** | Harus optimal di koneksi internet Indonesia |
| 3 | **Single database** | Satu instance MySQL per sekolah |
| 4 | **Browser support** | Chrome, Firefox, Safari, Edge (2 versi terakhir) |
| 5 | **File size limit** | Upload file maksimal 50MB per file |
| 6 | **No real-time** | Tidak menggunakan WebSocket untuk MVP |

### 7.2 Assumptions (Asumsi)

| No | Asumsi |
|---|---|
| 1 | Setiap pengguna memiliki email yang valid |
| 2 | Sekolah memiliki koneksi internet yang stabil (minimal 5 Mbps) |
| 3 | Guru memiliki literasi digital dasar (mampu mengetik, upload file) |
| 4 | Server memenuhi minimum requirements PHP 8.4 dan MySQL 8 |
| 5 | Data sekolah sudah memiliki struktur semester dan tahun ajaran |

---

## 8. Out of Scope (Tidak Termasuk di MVP)

| Fitur | Alasan |
|---|---|
| Mobile native app (iOS/Android) | Akan dikembangkan di fase berikutnya |
| Video conference terintegrasi | Kompleksitas tinggi, gunakan Zoom/Google Meet |
| Payment gateway | Tidak relevan untuk MVP sekolah |
| Multi-tenant (banyak sekolah dalam 1 instance) | Fokus 1 sekolah per instance dulu |
| AI-powered grading | Membutuhkan riset lebih lanjut |
| Parent portal | Akan dikembangkan di fase berikutnya |
| Offline mode | Membutuhkan teknologi PWA yang kompleks |

---

## 9. Success Metrics

| Metrik | Definisi | Target |
|---|---|---|
| **DAU (Daily Active Users)** | Pengguna unik yang login per hari | > 60% dari total user |
| **Assignment Completion Rate** | Persentase tugas yang dikumpulkan tepat waktu | > 80% |
| **Teacher Adoption Rate** | Guru yang aktif upload materi dan buat tugas | > 90% |
| **System Response Time** | Waktu rata-rata respons halaman | < 2 detik |
| **Error Rate** | Persentase request yang gagal | < 1% |
| **User Satisfaction Score** | Skor kepuasan dari survei | > 4.0/5.0 |

---

## 10. Timeline & Milestones

| Fase | Durasi | Milestone | Deliverable |
|---|---|---|---|
| **Fase 0** | 2 minggu | Dokumentasi & Planning | Seluruh dokumen di folder `docs/` |
| **Fase 1** | 3 minggu | Foundation | Auth, Dashboard, Database, Roles |
| **Fase 2** | 4 minggu | Core Features | Kelas, Materi, Tugas, Penilaian |
| **Fase 3** | 3 minggu | Advanced Features | Quiz, Diskusi, Kalender, Notifikasi |
| **Fase 4** | 3 minggu | Admin & Polish | Admin panel, Import/Export, Settings |
| **Fase 5** | 2 minggu | Testing & QA | Integration testing, UAT |
| **Fase 6** | 1 minggu | Deployment | Production deployment, monitoring |

> Detail lengkap: [28_ROADMAP.md](./28_ROADMAP.md)

---

## 11. Dependencies

| Dependency | Tipe | Deskripsi |
|---|---|---|
| PHP 8.4 | Runtime | Server harus mendukung PHP 8.4 |
| MySQL 8 | Database | Database server MySQL 8.x |
| Composer | Package Manager | Dependency management PHP |
| Node.js | Build Tool | Untuk compile assets (Vite, TailwindCSS) |
| SMTP Server | Email | Untuk notifikasi email dan reset password |

---

## 12. Risiko

| Risiko | Probabilitas | Dampak | Mitigasi |
|---|---|---|---|
| Guru tidak mau menggunakan | Sedang | Tinggi | Training, UI yang sangat sederhana |
| Server sekolah tidak memadai | Rendah | Tinggi | Dokumentasi minimum requirements yang jelas |
| Upload file gagal karena timeout | Sedang | Sedang | Chunked upload, progress bar, retry mechanism |
| Data loss | Rendah | Kritis | Auto backup, restore mechanism |
| Security breach | Rendah | Kritis | Security audit, encryption, CSRF protection |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [02_BUSINESS_REQUIREMENTS.md](./02_BUSINESS_REQUIREMENTS.md)*


<!-- ============================================== -->
# SOURCE FILE: 02_BUSINESS_REQUIREMENTS.md
<!-- ============================================== -->


# 02 — Business Requirements Document (BRD)

> **Dokumen Terkait:** [01_PRODUCT_REQUIREMENTS_DOCUMENT.md](./01_PRODUCT_REQUIREMENTS_DOCUMENT.md) · [03_PRODUCT_VISION.md](./03_PRODUCT_VISION.md) · [04_PRODUCT_SCOPE.md](./04_PRODUCT_SCOPE.md)

---

## 1. Informasi Dokumen

| Atribut | Detail |
|---|---|
| **Nama Produk** | DIKELAS |
| **Versi Dokumen** | 1.0.0 |
| **Tanggal** | Juli 2026 |
| **Penulis** | Product Manager |
| **Status** | ✅ Approved |

---

## 2. Latar Belakang Bisnis

### 2.1 Kondisi Pasar

Sektor pendidikan di Indonesia sedang mengalami transformasi digital yang signifikan. Berdasarkan data Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi:

| Metrik | Data |
|---|---|
| Jumlah sekolah di Indonesia | ± 400.000 sekolah |
| Jumlah guru | ± 3.000.000 guru |
| Jumlah siswa | ± 50.000.000 siswa |
| Penetrasi internet di sekolah | ± 70% |
| Sekolah yang menggunakan LMS | < 15% |

### 2.2 Peluang Bisnis

Terdapat kesenjangan besar antara kebutuhan digitalisasi pendidikan dan ketersediaan solusi yang sesuai:

1. **Platform global** (Google Classroom, Microsoft Teams) — Fitur lengkap tetapi tidak sesuai dengan struktur pendidikan Indonesia
2. **Platform lokal** — Fitur terbatas, UI kurang modern, sulit digunakan
3. **Solusi manual** — WhatsApp Group, Google Drive, formulir fisik

DIKELAS hadir untuk mengisi kesenjangan ini dengan menyediakan LMS yang **modern, mudah digunakan, dan sesuai konteks Indonesia**.

---

## 3. Business Objectives

### 3.1 Objektif Utama

| No | Objektif | KPI | Target |
|---|---|---|---|
| BO-01 | Menyediakan platform LMS yang intuitif | User onboarding time | < 5 menit |
| BO-02 | Meningkatkan efisiensi administrasi guru | Waktu administrasi per minggu | Berkurang 50% |
| BO-03 | Meningkatkan engagement murid | Daily active users | > 60% |
| BO-04 | Memastikan keamanan data pendidikan | Security incidents | 0 per kuartal |
| BO-05 | Menyediakan tools reporting yang komprehensif | Report generation time | < 30 detik |

### 3.2 Objektif Jangka Panjang

| Timeline | Objektif |
|---|---|
| **6 bulan** | MVP diluncurkan dan digunakan oleh 1 sekolah pilot |
| **1 tahun** | Digunakan oleh 10+ sekolah dengan feedback positif |
| **2 tahun** | Fitur lanjutan (mobile app, parent portal, analytics) |
| **3 tahun** | Multi-tenant SaaS untuk skala nasional |

---

## 4. Business Rules

### 4.1 Aturan Umum

| ID | Rule | Deskripsi |
|---|---|---|
| BR-001 | Satu tahun ajaran aktif | Sistem hanya memiliki satu tahun ajaran aktif pada satu waktu |
| BR-002 | Semester dalam tahun ajaran | Setiap tahun ajaran memiliki 2 semester (Ganjil & Genap) |
| BR-003 | Kelas terikat semester | Setiap kelas terkait dengan mata pelajaran dan semester tertentu |
| BR-004 | Guru sebagai pemilik kelas | Setiap kelas memiliki tepat satu guru sebagai pemilik |
| BR-005 | Kode kelas unik | Setiap kelas memiliki kode unik 6 karakter alfanumerik |

### 4.2 Aturan Tugas

| ID | Rule | Deskripsi |
|---|---|---|
| BR-006 | Deadline wajib | Setiap tugas harus memiliki deadline |
| BR-007 | Satu submission per murid | Murid hanya bisa memiliki satu submission aktif per tugas |
| BR-008 | Re-submit sebelum deadline | Murid dapat re-submit hanya sebelum deadline |
| BR-009 | Penilaian oleh guru kelas | Hanya guru pemilik kelas yang dapat menilai tugas |
| BR-010 | Status submission | Status: belum dikerjakan, dikerjakan, terlambat, dinilai |

### 4.3 Aturan Penilaian

| ID | Rule | Deskripsi |
|---|---|---|
| BR-011 | Skala nilai | Nilai menggunakan skala 0–100 |
| BR-012 | Nilai quiz otomatis | Nilai pilihan ganda dihitung otomatis oleh sistem |
| BR-013 | Nilai essay manual | Nilai essay diinput manual oleh guru |
| BR-014 | Rekap per semester | Rekap nilai dihitung per semester |
| BR-015 | Bobot nilai configurable | Bobot tugas dan quiz dapat diatur per kelas |

### 4.4 Aturan Administrasi

| ID | Rule | Deskripsi |
|---|---|---|
| BR-016 | Role tidak dapat diubah sendiri | User tidak dapat mengubah role sendiri |
| BR-017 | Super Admin minimal 1 | Minimal ada 1 Super Admin yang tidak bisa dihapus |
| BR-018 | Backup otomatis | Sistem melakukan backup harian otomatis |
| BR-019 | Activity log immutable | Log aktivitas tidak dapat dihapus atau dimodifikasi |
| BR-020 | Data deletion soft delete | Penghapusan data menggunakan soft delete |

---

## 5. Business Process

### 5.1 Proses Onboarding Sekolah

```
┌──────────────┐     ┌───────────────┐     ┌──────────────────┐
│  1. Install  │────▶│  2. Setup     │────▶│  3. Import Data  │
│  DIKELAS     │     │  Admin Account│     │  Guru & Murid    │
└──────────────┘     └───────────────┘     └──────────────────┘
                                                    │
                                                    ▼
┌──────────────┐     ┌───────────────┐     ┌──────────────────┐
│  6. Murid    │◀────│  5. Guru Buat │◀────│  4. Setup Mapel  │
│  Masuk Kelas │     │  Kelas        │     │  & Semester      │
└──────────────┘     └───────────────┘     └──────────────────┘
                                                    
```

### 5.2 Proses Pembelajaran Harian

```
Guru:
1. Login ke DIKELAS
2. Masuk ke kelas
3. Upload materi / Buat tugas / Buat quiz
4. Pantau submission murid
5. Berikan nilai dan feedback
6. Buat pengumuman jika perlu

Murid:
1. Login ke DIKELAS
2. Cek dashboard (tugas baru, pengumuman)
3. Masuk ke kelas
4. Pelajari materi
5. Kerjakan tugas / quiz
6. Cek nilai
7. Diskusi dengan guru/teman
```

### 5.3 Proses Administrasi

```
Super Admin:
1. Login ke DIKELAS
2. Cek dashboard (statistik, activity log)
3. Kelola data master (guru, murid, mapel, semester)
4. Monitor aktivitas sistem
5. Lakukan backup berkala
6. Generate laporan
```

---

## 6. Stakeholder Analysis

| Stakeholder | Interest | Influence | Strategi |
|---|---|---|---|
| **Kepala Sekolah** | Monitoring pembelajaran, reporting | Tinggi | Demo, dashboard reporting |
| **Guru** | Kemudahan mengajar, efisiensi administrasi | Tinggi | UI sederhana, training |
| **Murid** | Akses materi, kemudahan submit tugas | Sedang | UI menarik, mobile-friendly |
| **Operator Sekolah** | Kemudahan administrasi sistem | Sedang | Admin panel yang komprehensif |
| **Orang Tua** | Monitoring progress anak | Rendah (MVP) | Future: Parent Portal |

---

## 7. Competitive Analysis

| Fitur | DIKELAS | Google Classroom | Moodle | Edmodo |
|---|---|---|---|---|
| **Gratis / Self-hosted** | ✅ | ✅ (Cloud) | ✅ | ❌ |
| **Bahasa Indonesia** | ✅ Native | ⚠️ Terjemahan | ⚠️ Terjemahan | ❌ |
| **Struktur Semester** | ✅ | ❌ | ⚠️ Plugin | ❌ |
| **Tahun Ajaran** | ✅ | ❌ | ⚠️ Plugin | ❌ |
| **Mata Pelajaran** | ✅ | ❌ | ⚠️ | ❌ |
| **Quiz Built-in** | ✅ | ✅ (Google Forms) | ✅ | ✅ |
| **Admin Panel** | ✅ Lengkap | ❌ | ✅ | ⚠️ |
| **Import/Export Excel** | ✅ | ❌ | ⚠️ | ❌ |
| **Backup/Restore** | ✅ | ❌ | ✅ | ❌ |
| **UI Modern** | ✅ | ✅ | ❌ | ⚠️ |
| **Ease of Use** | ✅ | ✅ | ❌ | ✅ |
| **Activity Log** | ✅ | ❌ | ✅ | ❌ |

### Keunggulan Kompetitif DIKELAS

1. **Konteks Indonesia** — Struktur semester, tahun ajaran, dan mata pelajaran yang sesuai dengan sistem pendidikan Indonesia
2. **Self-hosted** — Data tetap di server sekolah, tidak bergantung pada cloud provider
3. **UI Modern** — Desain terinspirasi Google Classroom + Notion + Linear
4. **Admin Lengkap** — Panel administrasi yang komprehensif
5. **Import/Export** — Integrasi dengan Excel yang familiar bagi guru Indonesia

---

## 8. Revenue Model (Future)

| Model | Deskripsi | Timeline |
|---|---|---|
| **Open Source (Free)** | Core LMS gratis dan open source | MVP |
| **Support & Training** | Layanan implementasi dan pelatihan | Post-MVP |
| **SaaS (Cloud-hosted)** | Hosting terkelola untuk sekolah | Tahun 2 |
| **Enterprise License** | Fitur premium untuk jaringan sekolah | Tahun 3 |
| **Custom Development** | Kustomisasi fitur sesuai kebutuhan sekolah | Ongoing |

---

## 9. Regulatory & Compliance

| Regulasi | Relevansi | Implementasi |
|---|---|---|
| **UU Perlindungan Data Pribadi (PDP)** | Data siswa dan guru | Enkripsi data, consent management |
| **Peraturan Menteri Pendidikan** | Standar pendidikan nasional | Struktur kurikulum yang fleksibel |
| **Hak Cipta Materi** | Materi pembelajaran yang diupload | Disclaimer, terms of use |

---

## 10. Budget Estimation

### 10.1 Development Cost (One-time)

| Item | Estimasi |
|---|---|
| Planning & Documentation | 2 minggu |
| Backend Development | 8 minggu |
| Frontend Development | 6 minggu |
| Testing & QA | 3 minggu |
| Deployment & Setup | 1 minggu |
| **Total** | **20 minggu** |

### 10.2 Operational Cost (Per Bulan)

| Item | Estimasi |
|---|---|
| Hosting (VPS) | Rp 200.000 – 500.000 |
| Domain | Rp 15.000/bulan |
| SSL Certificate | Gratis (Let's Encrypt) |
| Email Service (SMTP) | Rp 0 – 100.000 |
| **Total** | **Rp 215.000 – 615.000/bulan** |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [03_PRODUCT_VISION.md](./03_PRODUCT_VISION.md)*


<!-- ============================================== -->
# SOURCE FILE: 03_PRODUCT_VISION.md
<!-- ============================================== -->


# 03 — Product Vision

> **Dokumen Terkait:** [01_PRODUCT_REQUIREMENTS_DOCUMENT.md](./01_PRODUCT_REQUIREMENTS_DOCUMENT.md) · [02_BUSINESS_REQUIREMENTS.md](./02_BUSINESS_REQUIREMENTS.md) · [04_PRODUCT_SCOPE.md](./04_PRODUCT_SCOPE.md)

---

## 1. Vision Statement

> **"Memberdayakan setiap sekolah di Indonesia dengan platform pembelajaran digital yang modern, intuitif, dan terjangkau — sehingga belajar menjadi lebih mudah dan mengajar menjadi lebih bermakna."**

---

## 2. Product Vision Board

| Dimensi | Deskripsi |
|---|---|
| **TARGET GROUP** | Sekolah di Indonesia (SD, SMP, SMA, SMK) — Guru, Murid, Administrator |
| **NEEDS** | Platform terpusat untuk mengelola pembelajaran: distribusi materi, pengumpulan tugas, penilaian, dan administrasi sekolah |
| **PRODUCT** | DIKELAS — Learning Management System berbasis web dengan UI modern yang terinspirasi Google Classroom dan Notion |
| **VALUE** | Meningkatkan efisiensi pengajaran, engagement murid, dan transparansi administrasi pendidikan |
| **BUSINESS GOALS** | Menjadi LMS pilihan utama sekolah Indonesia dengan adopsi yang tinggi dan user satisfaction > 4.0/5.0 |

---

## 3. Core Values

### 3.1 Simplicity First (Kesederhanaan)
Setiap fitur dirancang dengan prinsip *"jika guru berusia 50 tahun yang tidak familiar teknologi bisa menggunakannya tanpa training, maka desainnya sudah benar."*

- UI bersih tanpa elemen yang tidak perlu
- Navigasi intuitif dengan maksimal 3 klik untuk setiap aksi utama
- Terminologi yang mudah dipahami dalam Bahasa Indonesia
- Onboarding yang guided dan ramah

### 3.2 Indonesian Context (Konteks Indonesia)
DIKELAS bukan sekadar terjemahan dari platform LMS global. Platform ini dirancang dari dasar untuk memenuhi kebutuhan spesifik pendidikan Indonesia:

- Struktur **tahun ajaran** (misal: 2026/2027)
- Pembagian **semester** (Ganjil/Genap)
- Daftar **mata pelajaran** yang sesuai kurikulum nasional
- **Bahasa Indonesia** sebagai bahasa utama interface
- Kompatibel dengan bandwidth internet Indonesia

### 3.3 Modern & Beautiful (Modern & Indah)
Pengalaman visual yang setara dengan platform global, namun dengan identitas sendiri:

- Desain terinspirasi dari Google Classroom (simplicity), Notion (clean typography), dan Linear (minimalist interactions)
- Animasi halus dan transisi yang smooth
- Konsistensi visual di seluruh halaman
- Dark mode support (future)

### 3.4 Secure & Reliable (Aman & Andal)
Data pendidikan adalah data sensitif yang harus dilindungi:

- Enkripsi password dengan bcrypt
- CSRF protection di setiap form
- Role-based access control yang ketat
- Audit trail untuk setiap aksi penting
- Backup otomatis untuk mencegah data loss

### 3.5 Self-Hosted & Affordable (Mandiri & Terjangkau)
Sekolah memiliki kontrol penuh atas data mereka:

- Dapat di-deploy di server sekolah sendiri
- Tidak memerlukan biaya langganan cloud yang mahal
- Minimum server requirements yang terjangkau
- Dokumentasi deployment yang lengkap

---

## 4. Product Principles

| No | Prinsip | Penjelasan |
|---|---|---|
| 1 | **Convention over Configuration** | Konfigurasi default yang sudah optimal, kustomisasi opsional |
| 2 | **Progressive Disclosure** | Tampilkan yang esensial dulu, fitur advanced tersembunyi sampai dibutuhkan |
| 3 | **Fail Gracefully** | Error yang jelas dan actionable, bukan pesan teknis |
| 4 | **Data Integrity First** | Soft delete, backup otomatis, validasi ketat |
| 5 | **Mobile-First Responsive** | Desain untuk mobile dulu, scale up untuk desktop |
| 6 | **Accessibility** | Dapat digunakan oleh pengguna dengan berbagai kemampuan |

---

## 5. Future Vision (3 Tahun)

### Tahun 1: Foundation
```
✅ MVP Release
✅ Core LMS Features (Kelas, Materi, Tugas, Quiz, Nilai)
✅ Admin Panel
✅ 1 sekolah pilot
```

### Tahun 2: Growth
```
🔲 Mobile App (iOS & Android)
🔲 Parent Portal
🔲 Advanced Analytics & Reporting
🔲 Multi-language support
🔲 10+ sekolah pengguna
```

### Tahun 3: Scale
```
🔲 Multi-tenant SaaS
🔲 AI-powered features (auto-grading essay, personalized learning)
🔲 Integration dengan DAPODIK (Data Pokok Pendidikan)
🔲 API marketplace
🔲 100+ sekolah pengguna
```

---

## 6. User Experience Vision

### 6.1 Murid Experience

> *"Saya buka DIKELAS, langsung tahu tugas apa yang harus dikerjakan hari ini. Saya klik kelas Matematika, download materi, kerjakan tugas, dan submit — semua dalam hitungan menit. Nilai saya juga langsung muncul begitu guru selesai mengoreksi."*

**Key Moments:**
1. 🏠 **Dashboard** — Langsung lihat tugas yang pending dan pengumuman
2. 📚 **Kelas** — Semua materi terorganisir rapi per topik
3. 📝 **Tugas** — Submit tugas dengan mudah, lihat status real-time
4. 📊 **Nilai** — Transparansi nilai per mata pelajaran

### 6.2 Guru Experience

> *"Saya perlu 5 menit untuk upload materi minggu ini, 3 menit untuk membuat tugas, dan sistem otomatis mengingatkan murid tentang deadline. Saya bisa fokus mengajar, bukan mengurus administrasi."*

**Key Moments:**
1. 📋 **Dashboard** — Ringkasan kelas dan tugas yang perlu dinilai
2. ➕ **Buat Kelas** — Kelas siap dalam 30 detik
3. 📤 **Upload Materi** — Drag & drop, selesai
4. ✅ **Nilai Tugas** — Satu halaman untuk semua submission

### 6.3 Super Admin Experience

> *"Saya bisa melihat seluruh aktivitas sekolah dari satu dashboard. Import data guru dan murid dari Excel, setup semester baru, dan semua kelas siap digunakan. Backup otomatis membuat saya tenang."*

**Key Moments:**
1. 📊 **Dashboard** — Statistik keseluruhan sekolah
2. 👥 **Kelola User** — Import massal dari Excel
3. ⚙️ **Settings** — Konfigurasi sekolah yang mudah
4. 💾 **Backup** — Satu klik untuk keamanan data

---

## 7. Design Philosophy

### 7.1 Visual Identity

DIKELAS memiliki identitas visual yang unik, meskipun terinspirasi dari platform-platform berikut:

```
Google Classroom  ──▶  Simplicity & Card Layout
         +
Notion            ──▶  Clean Typography & Sidebar Navigation
         +
Microsoft Teams   ──▶  Dashboard & Team Management
         +
Apple HIG         ──▶  Spacing & Typography Hierarchy
         +
Linear            ──▶  Minimalist UI & Speed
         ═
DIKELAS           ──▶  Identitas Visual Sendiri
```

### 7.2 Emotional Design Goals

| Emosi | Bagaimana Dicapai |
|---|---|
| **Percaya Diri** | UI yang jelas, tidak membingungkan |
| **Efisien** | Aksi utama hanya butuh sedikit klik |
| **Modern** | Desain yang clean dan up-to-date |
| **Aman** | Feedback yang jelas untuk setiap aksi |
| **Senang** | Micro-interactions yang menyenangkan |

---

## 8. Technical Vision

### 8.1 Architecture Principles

| Prinsip | Implementasi |
|---|---|
| **Separation of Concerns** | Controller → Service → Repository → Model |
| **DRY (Don't Repeat Yourself)** | Reusable components, shared services |
| **SOLID Principles** | Single responsibility, dependency injection |
| **Security by Default** | Auth middleware, CSRF, validation |
| **Performance First** | Eager loading, caching, pagination |

### 8.2 Code Quality Vision

- Setiap fitur harus memiliki unit test
- Code coverage minimal 80%
- PSR-12 coding standard
- Automated code review (future: CI/CD)
- Dokumentasi inline yang lengkap

---

## 9. Alignment dengan PRD

| PRD Section | Vision Alignment |
|---|---|
| Auth Module | Simplicity — Onboarding < 5 menit |
| Class Module | Indonesian Context — Semester, Tahun Ajaran, Mapel |
| Material Module | Modern — Drag & drop upload, streaming video |
| Assignment Module | Efficient — Satu halaman untuk buat dan kelola tugas |
| Quiz Module | Automated — Auto-grading pilihan ganda |
| Grade Module | Transparent — Murid langsung lihat nilai |
| Admin Module | Comprehensive — Satu dashboard untuk semua |

> PRD lengkap: [01_PRODUCT_REQUIREMENTS_DOCUMENT.md](./01_PRODUCT_REQUIREMENTS_DOCUMENT.md)

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [04_PRODUCT_SCOPE.md](./04_PRODUCT_SCOPE.md)*


<!-- ============================================== -->
# SOURCE FILE: 04_PRODUCT_SCOPE.md
<!-- ============================================== -->


# 04 — Product Scope

> **Dokumen Terkait:** [01_PRODUCT_REQUIREMENTS_DOCUMENT.md](./01_PRODUCT_REQUIREMENTS_DOCUMENT.md) · [03_PRODUCT_VISION.md](./03_PRODUCT_VISION.md) · [07_FEATURE_LIST.md](./07_FEATURE_LIST.md)

---

## 1. Informasi Dokumen

| Atribut | Detail |
|---|---|
| **Nama Produk** | DIKELAS |
| **Versi Dokumen** | 1.0.0 |
| **Tanggal** | Juli 2026 |
| **Status** | ✅ Approved |

---

## 2. Definisi Scope

Product Scope mendefinisikan **batas-batas** dari apa yang akan dibangun dalam DIKELAS. Dokumen ini menjadi acuan untuk memastikan tim tidak mengerjakan fitur yang di luar cakupan (scope creep) dan fokus pada deliverable yang telah disepakati.

---

## 3. In Scope (Termasuk)

### 3.1 Modul & Fitur yang Dibangun

| No | Modul | Fitur Utama | Fase |
|---|---|---|---|
| 1 | **Autentikasi** | Login, Register, Logout, Reset Password, Role-based redirect | Fase 1 |
| 2 | **Dashboard** | Dashboard per role (Murid, Guru, Super Admin) | Fase 1 |
| 3 | **Manajemen Kelas** | CRUD Kelas, Join/Leave Kelas, Kode Kelas | Fase 2 |
| 4 | **Manajemen Materi** | Upload/Download materi (PDF, Video, Dokumen) | Fase 2 |
| 5 | **Sistem Tugas** | CRUD Tugas, Submission, Penilaian, Feedback | Fase 2 |
| 6 | **Sistem Quiz** | CRUD Quiz, Tipe Soal (PG, Essay, B/S), Auto-grading | Fase 3 |
| 7 | **Sistem Penilaian** | Input Nilai, Rekap Nilai, Export | Fase 2 |
| 8 | **Kalender** | Deadline tugas, Jadwal quiz, Event | Fase 3 |
| 9 | **Diskusi** | Forum per kelas, Post & Reply | Fase 3 |
| 10 | **Pengumuman** | Pengumuman kelas & global | Fase 3 |
| 11 | **Profil** | View/Edit profil, Ubah password, Foto profil | Fase 2 |
| 12 | **Admin: Kelola User** | CRUD Guru, CRUD Murid | Fase 4 |
| 13 | **Admin: Data Master** | Mata pelajaran, Semester, Tahun Ajaran | Fase 4 |
| 14 | **Admin: Backup** | Backup & Restore database | Fase 4 |
| 15 | **Admin: Import/Export** | Import/Export Excel (Guru, Murid, Nilai) | Fase 4 |
| 16 | **Admin: Activity Log** | Audit trail aktivitas pengguna | Fase 4 |
| 17 | **Admin: Permissions** | Role & Permission management | Fase 4 |
| 18 | **Admin: Settings** | Pengaturan sekolah (nama, logo, dll) | Fase 4 |

### 3.2 Platform & Teknologi

| Aspek | Scope |
|---|---|
| **Platform** | Web application (responsive) |
| **Browser Support** | Chrome, Firefox, Safari, Edge (2 versi terakhir) |
| **Device** | Desktop, Tablet, Smartphone |
| **Backend** | PHP 8.4, Laravel 12 |
| **Frontend** | Blade, TailwindCSS, Livewire, AlpineJS |
| **Database** | MySQL 8 |
| **Storage** | Laravel Storage (Local filesystem) |
| **Auth** | Laravel Breeze + Sanctum |

### 3.3 Non-Functional Scope

| Aspek | Scope |
|---|---|
| **Performance** | Page load < 2 detik, API response < 500ms |
| **Security** | CSRF, XSS prevention, SQL injection prevention, encryption |
| **Scalability** | Mendukung hingga 2.000 concurrent users per instance |
| **Availability** | Target uptime 99.5% |
| **Responsive** | Mobile-first responsive design |
| **Accessibility** | WCAG 2.1 Level A compliance |
| **Localization** | Bahasa Indonesia (primary) |

---

## 4. Out of Scope (Tidak Termasuk)

### 4.1 Fitur yang TIDAK Dibangun di MVP

| No | Fitur | Alasan | Rencana |
|---|---|---|---|
| 1 | **Mobile Native App** | Butuh resource tambahan (iOS/Android developer) | Tahun 2 |
| 2 | **Video Conference** | Kompleksitas tinggi, gunakan Zoom/Meet | Evaluate Tahun 2 |
| 3 | **Parent Portal** | Fokus pada guru dan murid dulu | Tahun 2 |
| 4 | **Payment Gateway** | Tidak relevan untuk MVP | Jika dibutuhkan |
| 5 | **Multi-tenant** | Fokus single-tenant per sekolah | Tahun 3 |
| 6 | **AI Grading** | Butuh riset dan training model | Tahun 3 |
| 7 | **Offline Mode / PWA** | Kompleksitas tinggi | Evaluate Tahun 2 |
| 8 | **Gamification** | Fitur engagement lanjutan | Tahun 2 |
| 9 | **DAPODIK Integration** | Butuh API access dari Kemendikbud | Tahun 3 |
| 10 | **Multi-language** | Fokus Bahasa Indonesia dulu | Tahun 2 |
| 11 | **WebSocket / Real-time** | Polling cukup untuk MVP | Evaluate Post-MVP |
| 12 | **Chat / Messaging** | Fokus forum diskusi dulu | Tahun 2 |
| 13 | **Certificate Generation** | Fitur tambahan | Post-MVP |
| 14 | **Attendance System** | Fitur terpisah | Evaluate |
| 15 | **Library Management** | Di luar scope LMS | Tidak direncanakan |

### 4.2 Teknologi yang TIDAK Digunakan

| Teknologi | Alasan |
|---|---|
| **React / Vue.js** | Menggunakan Blade + Livewire + AlpineJS (server-side rendering) |
| **PostgreSQL** | Menggunakan MySQL 8 untuk kompatibilitas hosting Indonesia |
| **Redis** | Tidak diperlukan untuk MVP (file/database cache cukup) |
| **Docker** | Deployment manual via XAMPP/hosting tradisional |
| **AWS / GCP** | Self-hosted di server sekolah/VPS terjangkau |

---

## 5. Scope Boundaries

### 5.1 Data Boundaries

| Data | In Scope | Out of Scope |
|---|---|---|
| **User Data** | Nama, email, password, foto profil | NIK, alamat lengkap, data keluarga |
| **Academic Data** | Kelas, materi, tugas, quiz, nilai | Rapor resmi, ijazah |
| **File Storage** | PDF, dokumen, video (< 50MB) | File > 50MB, streaming platform |
| **Admin Data** | Mapel, semester, tahun ajaran, settings | Data keuangan, inventaris |

### 5.2 User Boundaries

| User | In Scope | Out of Scope |
|---|---|---|
| **Murid** | Mengakses kelas, materi, tugas, quiz, nilai | Mengatur jadwal pelajaran |
| **Guru** | Mengelola kelas sendiri, materi, tugas, penilaian | Mengakses kelas guru lain |
| **Super Admin** | Mengelola seluruh sistem | Mengajar di kelas |

### 5.3 Integration Boundaries

| Integrasi | In Scope | Out of Scope |
|---|---|---|
| **Excel** | Import/Export data pengguna dan nilai | Import format lain (CSV khusus) |
| **Email** | Notifikasi via SMTP | SMS, WhatsApp notification |
| **Storage** | Local filesystem (Laravel Storage) | Cloud storage (S3, GCS) |

---

## 6. Scope Change Management

### 6.1 Proses Perubahan Scope

```
┌──────────────┐     ┌─────────────┐     ┌──────────────┐     ┌────────────┐
│  1. Request  │────▶│  2. Review  │────▶│  3. Approve  │────▶│  4. Update │
│  Perubahan   │     │  Impact     │     │  / Reject    │     │  Dokumen   │
└──────────────┘     └─────────────┘     └──────────────┘     └────────────┘
```

### 6.2 Kriteria Evaluasi Perubahan

| Kriteria | Pertanyaan |
|---|---|
| **Business Value** | Apakah perubahan ini memberikan value signifikan? |
| **Effort** | Berapa lama waktu pengembangan yang dibutuhkan? |
| **Risk** | Apakah perubahan ini menambah risiko teknis? |
| **Dependencies** | Apakah ada dependensi yang terpengaruh? |
| **Timeline Impact** | Apakah perubahan ini menggeser timeline? |

### 6.3 Approval Authority

| Tipe Perubahan | Approver |
|---|---|
| Minor (< 1 hari kerja) | Tech Lead |
| Medium (1–5 hari kerja) | Product Manager + Tech Lead |
| Major (> 5 hari kerja) | Product Owner + Product Manager + Tech Lead |

---

## 7. Scope per Fase

### Fase 1: Foundation (3 minggu)

- [x] Setup project Laravel 12
- [ ] Database design & migration
- [ ] Authentication (Login, Register, Logout)
- [ ] Role-based middleware
- [ ] Dashboard per role (shell/layout)
- [ ] Sidebar navigation
- [ ] Base UI components

### Fase 2: Core Features (4 minggu)

- [ ] Manajemen Kelas (CRUD, Join, Leave)
- [ ] Manajemen Materi (Upload, Download, Organize)
- [ ] Sistem Tugas (CRUD, Submission, Grading)
- [ ] Sistem Penilaian (Input, Rekap)
- [ ] Profil Pengguna (View, Edit)

### Fase 3: Advanced Features (3 minggu)

- [ ] Sistem Quiz (CRUD, Auto-grading)
- [ ] Forum Diskusi (Post, Reply)
- [ ] Kalender (Deadline, Event)
- [ ] Pengumuman (Kelas, Global)
- [ ] Notifikasi (In-app, Email)

### Fase 4: Administration (3 minggu)

- [ ] Admin: Kelola Guru & Murid
- [ ] Admin: Data Master (Mapel, Semester, Tahun Ajaran)
- [ ] Admin: Backup & Restore
- [ ] Admin: Import/Export Excel
- [ ] Admin: Activity Log
- [ ] Admin: Role & Permission
- [ ] Admin: Settings

### Fase 5: Testing & QA (2 minggu)

- [ ] Unit Testing
- [ ] Integration Testing
- [ ] User Acceptance Testing (UAT)
- [ ] Performance Testing
- [ ] Security Testing

### Fase 6: Deployment (1 minggu)

- [ ] Production deployment
- [ ] Monitoring setup
- [ ] User documentation
- [ ] Training materials

---

## 8. Acceptance Criteria Summary

Setiap modul harus memenuhi kriteria berikut sebelum dianggap selesai:

| Kriteria | Deskripsi |
|---|---|
| **Functional** | Semua requirement P0 berfungsi sesuai spesifikasi |
| **UI/UX** | Sesuai dengan UI Guidelines dan responsive di semua device |
| **Performance** | Page load < 2 detik, tidak ada query N+1 |
| **Security** | Lolos security checklist (CSRF, XSS, auth) |
| **Testing** | Unit test coverage > 80% |
| **Documentation** | Kode terdokumentasi, inline comments |

> Detail lengkap: [29_ACCEPTANCE_CRITERIA.md](./29_ACCEPTANCE_CRITERIA.md)

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [05_USER_PERSONA.md](./05_USER_PERSONA.md)*


<!-- ============================================== -->
# SOURCE FILE: 05_USER_PERSONA.md
<!-- ============================================== -->


# 05 — User Persona

> **Dokumen Terkait:** [04_PRODUCT_SCOPE.md](./04_PRODUCT_SCOPE.md) · [06_USER_ROLES.md](./06_USER_ROLES.md) · [11_USER_FLOW.md](./11_USER_FLOW.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **persona pengguna** DIKELAS — representasi fiktif namun realistis dari pengguna utama platform. Persona digunakan sebagai acuan oleh seluruh tim (Product, Design, Engineering, QA) untuk memastikan setiap keputusan desain dan teknis berpusat pada kebutuhan pengguna nyata.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Empati** | Memahami kebutuhan, motivasi, dan frustrasi pengguna |
| **Prioritas Fitur** | Menentukan fitur mana yang paling berdampak bagi persona utama |
| **Desain UI/UX** | Merancang antarmuka yang sesuai dengan kemampuan dan preferensi pengguna |
| **Testing** | Membuat skenario pengujian yang realistis |
| **Komunikasi Tim** | Menciptakan bahasa bersama saat membahas kebutuhan pengguna |

---

## 3. Ruang Lingkup

Dokumen ini mencakup **3 persona utama** yang merepresentasikan 3 role dalam DIKELAS:

| No | Persona | Role | Segmen |
|---|---|---|---|
| 1 | Rina Permata Sari | Murid (Student) | SMA/SMK Kelas XI |
| 2 | Budi Santoso, S.Pd. | Guru (Teacher) | Guru Matematika SMA |
| 3 | Dewi Anggraini, M.Pd. | Super Admin (Administrator) | Wakil Kepala Sekolah Bidang Kurikulum |

---

## 4. Persona 1: Rina Permata Sari — Murid

### 4.1 Profil

```
┌──────────────────────────────────────────────────────────┐
│  👩‍🎓  RINA PERMATA SARI                                  │
│  ─────────────────────────────────                       │
│  Role     : Murid (Student)                              │
│  Usia     : 16 tahun                                     │
│  Sekolah  : SMA Negeri 1 Bandung                         │
│  Kelas    : XI IPA 2                                     │
│  Device   : Smartphone Android (primary), Laptop (tugas) │
│  Internet : WiFi rumah + paket data 15GB/bulan           │
└──────────────────────────────────────────────────────────┘
```

### 4.2 Latar Belakang

Rina adalah siswi SMA kelas XI jurusan IPA yang aktif dan berprestasi. Dia terbiasa menggunakan smartphone untuk keperluan sehari-hari termasuk belajar. Rina mengikuti 8 mata pelajaran dan sering merasa kewalahan mengingat semua deadline tugas dari berbagai guru yang dikirim lewat WhatsApp Group yang berbeda-beda.

### 4.3 Motivasi & Tujuan

| No | Tujuan |
|---|---|
| 1 | Mengetahui semua tugas yang harus dikerjakan dalam satu tempat |
| 2 | Mengakses materi pelajaran kapan saja dan di mana saja |
| 3 | Submit tugas dengan mudah tanpa harus kirim via WhatsApp |
| 4 | Melihat nilai secara transparan dan real-time |
| 5 | Berdiskusi dengan guru dan teman sekelas |

### 4.4 Frustrasi (Pain Points)

| No | Pain Point | Tingkat |
|---|---|---|
| 1 | Tugas tersebar di banyak WhatsApp Group, sering terlewat | 🔴 Tinggi |
| 2 | Tidak tahu kapan deadline tugas karena pesan chat tertimbun | 🔴 Tinggi |
| 3 | Harus kirim tugas satu-satu ke guru via WA, sering double kirim | 🟡 Sedang |
| 4 | Tidak bisa cek nilai secara langsung, harus tanya guru | 🟡 Sedang |
| 5 | Materi pelajaran tersebar di Google Drive yang berbeda-beda | 🟡 Sedang |
| 6 | Aplikasi LMS yang pernah dipakai terlalu rumit dan lambat | 🟢 Rendah |

### 4.5 Skenario Penggunaan Harian

```
Pagi (06:30):
├── Buka DIKELAS di HP
├── Cek Dashboard → ada 2 tugas pending
└── Lihat pengumuman dari guru Fisika

Siang (12:00 — Istirahat):
├── Download materi Matematika bab baru
└── Baca diskusi tentang PR Kimia

Sore (16:00):
├── Kerjakan tugas Bahasa Indonesia di laptop
├── Upload file jawaban (.docx)
└── Cek kalender → quiz Fisika besok jam 10

Malam (20:00):
├── Belajar materi untuk quiz besok
├── Cek nilai tugas Matematika yang sudah dinilai → 85/100
└── Tanya di forum diskusi tentang soal yang tidak dipahami
```

### 4.6 Kebutuhan Teknis

| Aspek | Kebutuhan |
|---|---|
| **Device** | Mobile-first (responsive di smartphone Android) |
| **Bandwidth** | Optimal di koneksi 3G/4G (halaman ringan) |
| **UI** | Sederhana, warna menarik, font mudah dibaca di HP |
| **Notifikasi** | Alert untuk tugas baru dan deadline mendekati |
| **Navigasi** | Maksimal 3 tap untuk aksi utama |

### 4.7 Quote

> *"Aku cuma mau tahu tugas apa yang harus dikerjakan hari ini, dan bisa kirim jawabannya dari HP tanpa ribet."*

---

## 5. Persona 2: Budi Santoso, S.Pd. — Guru

### 5.1 Profil

```
┌──────────────────────────────────────────────────────────┐
│  👨‍🏫  BUDI SANTOSO, S.Pd.                                │
│  ─────────────────────────────────                       │
│  Role     : Guru (Teacher)                               │
│  Usia     : 45 tahun                                     │
│  Sekolah  : SMA Negeri 1 Bandung                         │
│  Mapel    : Matematika                                   │
│  Mengajar : 6 kelas (± 180 murid total)                  │
│  Device   : Laptop Windows (primary), Smartphone Android │
│  Internet : WiFi sekolah + WiFi rumah                    │
└──────────────────────────────────────────────────────────┘
```

### 5.2 Latar Belakang

Pak Budi adalah guru Matematika senior yang sudah mengajar selama 20 tahun. Beliau terbiasa dengan metode mengajar tradisional namun dipaksa beradaptasi dengan teknologi sejak pandemi. Literasi digitalnya menengah — bisa mengoperasikan Word, Excel, dan email, namun tidak nyaman dengan aplikasi yang terlalu kompleks. Beliau mengajar di 6 kelas dan sering kewalahan mengoreksi tugas dari 180 murid.

### 5.3 Motivasi & Tujuan

| No | Tujuan |
|---|---|
| 1 | Mendistribusikan materi ke semua kelas dengan mudah |
| 2 | Membuat dan mengelola tugas tanpa harus print kertas |
| 3 | Menilai tugas murid secara efisien |
| 4 | Membuat quiz yang bisa dinilai otomatis (hemat waktu) |
| 5 | Memantau progress belajar murid per kelas |
| 6 | Mengurangi waktu administrasi agar bisa fokus mengajar |

### 5.4 Frustrasi (Pain Points)

| No | Pain Point | Tingkat |
|---|---|---|
| 1 | Harus mengoreksi 180 tugas secara manual setiap minggu | 🔴 Tinggi |
| 2 | Tugas murid masuk via WA campur dengan chat lain | 🔴 Tinggi |
| 3 | Sulit melacak siapa yang sudah dan belum mengumpulkan | 🔴 Tinggi |
| 4 | Harus membuat rekap nilai manual di Excel per kelas | 🟡 Sedang |
| 5 | Platform LMS yang pernah dicoba terlalu rumit, banyak menu | 🟡 Sedang |
| 6 | Murid sering tidak membaca materi yang dishare di Google Drive | 🟢 Rendah |

### 5.5 Skenario Penggunaan Harian

```
Pagi (07:00 — Persiapan Mengajar):
├── Buka DIKELAS di laptop
├── Upload materi PDF untuk kelas hari ini
└── Cek: 45 submission tugas perlu dinilai

Siang (10:00 — Jam Kosong):
├── Buat tugas baru untuk kelas XI IPA 3
├── Set deadline: Jumat, 11 Jul 2026, 23:59
└── Lampirkan soal dalam format PDF

Sore (15:00 — Setelah Pulang):
├── Nilai 20 submission tugas
├── Beri feedback pada 5 jawaban yang perlu perbaikan
└── Export rekap nilai kelas XI IPA 1 ke Excel

Malam (20:00):
├── Buat quiz pilihan ganda (20 soal) untuk ulangan harian
├── Set jadwal quiz: Senin, 14 Jul 2026, 08:00-09:30
└── Cek diskusi kelas → jawab pertanyaan murid
```

### 5.6 Kebutuhan Teknis

| Aspek | Kebutuhan |
|---|---|
| **Device** | Laptop-first (form input lebih nyaman di desktop) |
| **Upload** | Drag & drop file, progress bar, support file besar |
| **Penilaian** | Satu halaman untuk menilai semua submission |
| **UI** | Tombol dan teks cukup besar, menu sederhana |
| **Export** | Export nilai ke Excel (format familiar) |
| **Quiz** | Auto-grading untuk PG agar hemat waktu |

### 5.7 Quote

> *"Saya tidak mau aplikasi yang ribet. Yang penting bisa upload materi, kasih tugas, dan nilai murid — itu saja sudah cukup."*

---

## 6. Persona 3: Dewi Anggraini, M.Pd. — Super Admin

### 6.1 Profil

```
┌──────────────────────────────────────────────────────────┐
│  👩‍💼  DEWI ANGGRAINI, M.Pd.                              │
│  ─────────────────────────────────                       │
│  Role     : Super Admin (Administrator)                  │
│  Usia     : 38 tahun                                     │
│  Jabatan  : Wakil Kepala Sekolah Bidang Kurikulum        │
│  Sekolah  : SMA Negeri 1 Bandung                         │
│  Kelola   : 80 guru, 1.200 murid                         │
│  Device   : Laptop Windows (primary)                     │
│  Internet : WiFi sekolah                                 │
└──────────────────────────────────────────────────────────┘
```

### 6.2 Latar Belakang

Bu Dewi adalah Wakil Kepala Sekolah Bidang Kurikulum yang bertanggung jawab atas pengelolaan akademik sekolah. Beliau lulusan S2 Pendidikan dan memiliki literasi digital yang cukup baik — terbiasa menggunakan Excel, Google Workspace, dan berbagai aplikasi administrasi sekolah. Tantangan utamanya adalah mengelola data akademik 1.200 murid dan 80 guru secara efisien, terutama saat awal tahun ajaran baru.

### 6.3 Motivasi & Tujuan

| No | Tujuan |
|---|---|
| 1 | Mengelola data guru dan murid secara terpusat |
| 2 | Setup semester dan tahun ajaran dengan cepat |
| 3 | Import data dari Excel yang sudah ada di sekolah |
| 4 | Memantau aktivitas penggunaan platform oleh guru dan murid |
| 5 | Memastikan keamanan data sekolah (backup rutin) |
| 6 | Mendapatkan laporan statistik penggunaan platform |

### 6.4 Frustrasi (Pain Points)

| No | Pain Point | Tingkat |
|---|---|---|
| 1 | Input data 1.200 murid satu-per-satu di awal tahun ajaran | 🔴 Tinggi |
| 2 | Tidak ada dashboard terpusat untuk memonitor aktivitas guru | 🔴 Tinggi |
| 3 | Backup data sekolah masih manual dan tidak rutin | 🟡 Sedang |
| 4 | Sulit mengetahui guru mana yang aktif dan tidak aktif di platform | 🟡 Sedang |
| 5 | Harus mengatur ulang kelas setiap pergantian semester | 🟡 Sedang |
| 6 | Tidak ada audit trail untuk melacak perubahan data | 🟢 Rendah |

### 6.5 Skenario Penggunaan

```
Awal Tahun Ajaran (Juli):
├── Login sebagai Super Admin
├── Buat tahun ajaran baru: 2026/2027
├── Buat semester: Ganjil
├── Import data 1.200 murid dari file Excel
├── Import data 20 guru baru dari file Excel
├── Setup mata pelajaran
└── Monitoring: guru mulai membuat kelas

Mingguan:
├── Cek dashboard: statistik penggunaan
├── Lihat activity log: siapa saja yang aktif
├── Verifikasi backup otomatis berjalan
└── Respons permintaan guru (reset password, dll)

Akhir Semester:
├── Export data nilai seluruh kelas
├── Arsipkan kelas semester berjalan
├── Backup database lengkap
├── Buat semester baru (Genap)
└── Generate laporan untuk Kepala Sekolah
```

### 6.6 Kebutuhan Teknis

| Aspek | Kebutuhan |
|---|---|
| **Device** | Desktop/Laptop (admin tasks memerlukan layar besar) |
| **Import** | Bulk import dari Excel dengan validasi dan error report |
| **Dashboard** | Statistik real-time: jumlah user, kelas, aktivitas |
| **Backup** | One-click backup dengan histori dan restore |
| **Monitoring** | Activity log yang bisa difilter dan di-search |
| **Export** | Export data ke Excel untuk pelaporan |

### 6.7 Quote

> *"Saya butuh satu dashboard yang menunjukkan semuanya — berapa guru aktif, berapa kelas berjalan, dan apakah backup sudah dilakukan. Jangan sampai data hilang."*

---

## 7. Empathy Map

### 7.1 Murid (Rina)

| Dimensi | Detail |
|---|---|
| **Thinks** | "Tugas apa yang harus dikerjakan hari ini?" |
| **Sees** | WhatsApp Group penuh pesan, materi tersebar |
| **Feels** | Kewalahan, takut ketinggalan deadline |
| **Does** | Scroll WA mencari info tugas, tanya teman |
| **Says** | "Kapan sih deadline-nya? Di group mana ya?" |
| **Pain** | Informasi tidak terpusat, sulit dilacak |
| **Gain** | Dashboard yang menampilkan semua tugas pending |

### 7.2 Guru (Budi)

| Dimensi | Detail |
|---|---|
| **Thinks** | "Bagaimana caranya menilai 180 tugas dengan cepat?" |
| **Sees** | Tumpukan file WA, Excel rekap nilai manual |
| **Feels** | Lelah, ingin fokus mengajar bukan administrasi |
| **Does** | Download tugas satu-satu dari WA, buka file, nilai di Excel |
| **Says** | "Kalau ada yang otomatis, saya mau pakai" |
| **Pain** | Proses penilaian manual yang memakan waktu |
| **Gain** | Auto-grading quiz, satu halaman untuk semua submission |

### 7.3 Super Admin (Dewi)

| Dimensi | Detail |
|---|---|
| **Thinks** | "Apakah semua data aman? Guru-guru sudah pakai platform?" |
| **Sees** | Data tersebar di banyak file Excel, tidak ada monitoring |
| **Feels** | Khawatir data hilang, sulit mengontrol penggunaan |
| **Does** | Rekap manual, backup manual, tanya guru satu-satu |
| **Says** | "Saya perlu satu sistem yang bisa saya kontrol" |
| **Pain** | Tidak ada visibilitas terhadap aktivitas akademik |
| **Gain** | Dashboard admin dengan statistik dan activity log |

---

## 8. Persona Comparison Matrix

| Aspek | Murid (Rina) | Guru (Budi) | Admin (Dewi) |
|---|---|---|---|
| **Usia** | 16 tahun | 45 tahun | 38 tahun |
| **Literasi Digital** | Tinggi | Menengah | Menengah-Tinggi |
| **Device Utama** | Smartphone | Laptop | Laptop |
| **Frekuensi Akses** | 3-5x/hari | 2-3x/hari | 1-2x/hari |
| **Durasi Sesi** | 5-15 menit | 15-45 menit | 30-60 menit |
| **Kebutuhan Utama** | Lihat tugas, submit | Upload, nilai | Kelola, monitor |
| **Toleransi Kompleksitas** | Rendah | Rendah | Menengah |
| **Motivasi Utama** | Akademik | Efisiensi | Kontrol & keamanan |

---

## 9. Implikasi Desain

Berdasarkan analisis persona, berikut implikasi untuk desain dan pengembangan DIKELAS:

### 9.1 UI/UX Design

| Persona | Implikasi |
|---|---|
| **Rina (Murid)** | Mobile-first responsive design, navigasi sederhana, warna menarik |
| **Budi (Guru)** | Tombol dan font besar, form yang straightforward, minimal jargon teknis |
| **Dewi (Admin)** | Dashboard informatif, bulk operations, data visualization |

### 9.2 Feature Priority

| Insight dari Persona | Fitur yang Diprioritaskan |
|---|---|
| Rina sering lupa deadline | Dashboard tugas pending + Kalender + Notifikasi |
| Budi kewalahan menilai | Satu halaman submission + Auto-grading quiz |
| Dewi perlu import massal | Excel import dengan validasi dan error report |
| Budi tidak suka kompleksitas | UI minimalis, maksimal 3 klik untuk aksi utama |
| Dewi khawatir data hilang | Auto backup + Restore + Activity log |

### 9.3 Performance

| Insight | Implikasi Teknis |
|---|---|
| Rina akses via 3G/4G | Halaman ringan, lazy loading, compressed assets |
| Budi upload file besar | Progress bar, chunked upload, retry mechanism |
| Dewi import data massal | Background job, progress indicator, async processing |

---

## 10. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-PER-001 | Setiap persona memiliki profil lengkap (background, motivasi, pain points) | ✅ |
| AC-PER-002 | Skenario penggunaan harian terdefinisi untuk setiap persona | ✅ |
| AC-PER-003 | Empathy map tersedia untuk setiap persona | ✅ |
| AC-PER-004 | Implikasi desain teridentifikasi berdasarkan analisis persona | ✅ |
| AC-PER-005 | Persona comparison matrix tersedia | ✅ |
| AC-PER-006 | Kebutuhan teknis per persona terdokumentasi | ✅ |
| AC-PER-007 | Dokumen terhubung dengan User Roles dan User Flow | ✅ |

---

## 11. Checklist

- [x] Persona Murid (Rina) — profil, motivasi, pain points, skenario
- [x] Persona Guru (Budi) — profil, motivasi, pain points, skenario
- [x] Persona Super Admin (Dewi) — profil, motivasi, pain points, skenario
- [x] Empathy Map untuk setiap persona
- [x] Comparison Matrix antar persona
- [x] Implikasi Desain (UI/UX, Fitur, Performa)
- [x] Acceptance Criteria
- [x] Cross-reference ke dokumen terkait

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [06_USER_ROLES.md](./06_USER_ROLES.md)*


<!-- ============================================== -->
# SOURCE FILE: 06_USER_ROLES.md
<!-- ============================================== -->


# 06 — User Roles

> **Dokumen Terkait:** [05_USER_PERSONA.md](./05_USER_PERSONA.md) · [19_PERMISSION_MATRIX.md](./19_PERMISSION_MATRIX.md) · [14_SECURITY_REQUIREMENTS.md](./14_SECURITY_REQUIREMENTS.md)

---

## 1. Definisi Role

DIKELAS memiliki **3 role utama** dengan hierarki dan hak akses yang berbeda:

```
Super Admin (Level 3 — Tertinggi)
    │
    ├── Guru (Level 2)
    │
    └── Murid (Level 1 — Terendah)
```

---

## 2. Detail Role

### 2.1 Murid (Student)

| Atribut | Detail |
|---|---|
| **Slug** | `student` |
| **Level** | 1 |
| **Registrasi** | Self-register atau dibuat oleh Super Admin |
| **Jumlah per Sekolah** | 200 – 1.500 |

**Kemampuan:**

| Modul | Aksi |
|---|---|
| Auth | Login, Register, Logout, Reset Password |
| Dashboard | Lihat dashboard murid |
| Kelas | Gabung kelas (kode), keluar kelas, lihat daftar kelas |
| Materi | Lihat materi, download materi |
| Tugas | Lihat tugas, upload jawaban, lihat status submission |
| Quiz | Mengerjakan quiz, lihat hasil |
| Nilai | Lihat nilai per tugas/quiz, lihat rekap |
| Kalender | Lihat kalender (deadline, event) |
| Diskusi | Buat post, reply, lihat diskusi |
| Pengumuman | Lihat pengumuman |
| Profil | Lihat dan edit profil sendiri |

### 2.2 Guru (Teacher)

| Atribut | Detail |
|---|---|
| **Slug** | `teacher` |
| **Level** | 2 |
| **Registrasi** | Dibuat oleh Super Admin |
| **Jumlah per Sekolah** | 20 – 100 |

**Kemampuan:**

| Modul | Aksi |
|---|---|
| Auth | Login, Logout, Reset Password |
| Dashboard | Lihat dashboard guru |
| Kelas | Buat kelas, edit kelas, arsipkan kelas, lihat anggota, keluarkan murid |
| Materi | Upload materi (PDF, video, dokumen), edit, hapus, atur urutan |
| Tugas | Buat tugas, edit, hapus, lihat submission, beri feedback |
| Quiz | Buat quiz, edit, hapus, lihat hasil, analisis |
| Nilai | Beri nilai tugas/quiz, rekap per kelas, export |
| Kalender | Lihat kalender kelas sendiri |
| Diskusi | Buat post, reply, hapus post tidak pantas |
| Pengumuman | Buat pengumuman kelas |
| Profil | Lihat dan edit profil sendiri |

### 2.3 Super Admin (Administrator)

| Atribut | Detail |
|---|---|
| **Slug** | `super_admin` |
| **Level** | 3 |
| **Registrasi** | Seeder/manual (tidak bisa self-register) |
| **Jumlah per Sekolah** | 1 – 3 |

**Kemampuan:**

| Modul | Aksi |
|---|---|
| Auth | Login, Logout |
| Dashboard | Lihat dashboard admin (statistik global) |
| Kelola Guru | CRUD guru, reset password guru |
| Kelola Murid | CRUD murid, reset password murid |
| Kelola Kelas | Lihat semua kelas, assign guru, arsipkan |
| Kelola Mapel | CRUD mata pelajaran |
| Semester | CRUD semester, set semester aktif |
| Tahun Ajaran | CRUD tahun ajaran, set tahun aktif |
| Backup | Backup database manual, lihat histori backup |
| Restore | Restore dari file backup |
| Import | Import guru/murid dari Excel |
| Export | Export data ke Excel |
| Activity Log | Lihat log aktivitas seluruh pengguna |
| Role & Permission | Kelola role, assign permission |
| Settings | Pengaturan sistem (nama sekolah, logo, dll) |

---

## 3. Comparison Matrix

| Fitur | Murid | Guru | Super Admin |
|---|---|---|---|
| Self-register | ✅ | ❌ | ❌ |
| Dashboard | Own | Own Classes | Global |
| Buat kelas | ❌ | ✅ | ✅ |
| Join kelas | ✅ | ❌ | ❌ |
| Upload materi | ❌ | ✅ | ❌ |
| Download materi | ✅ | ✅ | ❌ |
| Buat tugas | ❌ | ✅ | ❌ |
| Submit tugas | ✅ | ❌ | ❌ |
| Buat quiz | ❌ | ✅ | ❌ |
| Kerjakan quiz | ✅ | ❌ | ❌ |
| Beri nilai | ❌ | ✅ | ❌ |
| Lihat nilai | Own | Class | All |
| Kelola user | ❌ | ❌ | ✅ |
| Kelola mapel | ❌ | ❌ | ✅ |
| Backup/Restore | ❌ | ❌ | ✅ |
| Import/Export | ❌ | Export nilai | ✅ |
| Activity Log | ❌ | ❌ | ✅ |
| Settings | ❌ | ❌ | ✅ |

---

## 4. Role Assignment Rules

| Rule | Deskripsi |
|---|---|
| Satu user, satu role | User hanya memiliki satu role pada satu waktu |
| Role tidak bisa diubah sendiri | Hanya Super Admin yang dapat mengubah role user |
| Super Admin minimal 1 | Sistem harus memiliki minimal 1 Super Admin yang tidak bisa dihapus |
| Guru dibuat oleh admin | Akun guru hanya bisa dibuat oleh Super Admin |
| Murid bisa self-register | Murid dapat mendaftar sendiri |
| Default role | User baru yang self-register mendapat role `student` |

---

## 5. Implementasi Teknis

### 5.1 Database

```sql
-- Tabel roles
CREATE TABLE roles (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,  -- 'student', 'teacher', 'super_admin'
    display_name VARCHAR(100) NOT NULL,
    description TEXT NULL,
    level TINYINT UNSIGNED DEFAULT 1,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Kolom role di tabel users
ALTER TABLE users ADD COLUMN role_id BIGINT UNSIGNED NOT NULL;
```

### 5.2 Middleware

```
Route::middleware(['auth', 'role:super_admin'])->group(function () {
    // Routes khusus Super Admin
});

Route::middleware(['auth', 'role:teacher'])->group(function () {
    // Routes khusus Guru
});

Route::middleware(['auth', 'role:student'])->group(function () {
    // Routes khusus Murid
});
```

### 5.3 Blade Directive

```blade
@role('super_admin')
    {{-- Konten khusus Super Admin --}}
@endrole

@role('teacher')
    {{-- Konten khusus Guru --}}
@endrole

@role('student')
    {{-- Konten khusus Murid --}}
@endrole
```

> Detail permission: [19_PERMISSION_MATRIX.md](./19_PERMISSION_MATRIX.md)

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [07_FEATURE_LIST.md](./07_FEATURE_LIST.md)*


<!-- ============================================== -->
# SOURCE FILE: 07_FEATURE_LIST.md
<!-- ============================================== -->


# 07 — Feature List

> **Dokumen Terkait:** [01_PRODUCT_REQUIREMENTS_DOCUMENT.md](./01_PRODUCT_REQUIREMENTS_DOCUMENT.md) · [08_FUNCTIONAL_REQUIREMENTS.md](./08_FUNCTIONAL_REQUIREMENTS.md) · [11_USER_FLOW.md](./11_USER_FLOW.md)

---

## 1. Overview

Daftar fitur lengkap DIKELAS diorganisasi berdasarkan modul dan prioritas. Setiap fitur memiliki ID unik untuk referensi silang dengan dokumen lain.

### Legenda Prioritas

| Label | Arti | Fase |
|---|---|---|
| 🔴 P0 | Must Have — Wajib untuk MVP | Fase 1–2 |
| 🟡 P1 | Should Have — Sangat diharapkan | Fase 3 |
| 🟢 P2 | Nice to Have — Nilai tambah | Fase 4 |
| ⚪ P3 | Future — Versi mendatang | Post-release |

---

## 2. Modul Autentikasi (AUTH)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-AUTH-001 | Login | Login dengan email dan password | Semua | 🔴 P0 |
| F-AUTH-002 | Register Murid | Murid mendaftar akun baru | Murid | 🔴 P0 |
| F-AUTH-003 | Logout | Keluar dari sistem | Semua | 🔴 P0 |
| F-AUTH-004 | Reset Password | Kirim link reset password via email | Semua | 🟡 P1 |
| F-AUTH-005 | Role-based Redirect | Redirect ke dashboard sesuai role setelah login | Semua | 🔴 P0 |
| F-AUTH-006 | Remember Me | Opsi "Ingat Saya" saat login | Semua | 🟢 P2 |
| F-AUTH-007 | Email Verification | Verifikasi email saat registrasi | Murid | 🟡 P1 |

---

## 3. Modul Dashboard (DASH)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-DASH-001 | Dashboard Murid | Daftar kelas, tugas pending, pengumuman | Murid | 🔴 P0 |
| F-DASH-002 | Dashboard Guru | Daftar kelas, submission pending, quick actions | Guru | 🔴 P0 |
| F-DASH-003 | Dashboard Admin | Statistik global, user count, activity summary | Admin | 🔴 P0 |
| F-DASH-004 | Widget Kalender | Mini kalender dengan deadline dan event | Murid, Guru | 🟡 P1 |
| F-DASH-005 | Widget Pengumuman | Pengumuman terbaru | Semua | 🟡 P1 |
| F-DASH-006 | Quick Actions | Tombol aksi cepat sesuai role | Semua | 🟢 P2 |

---

## 4. Modul Kelas (CLASS)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-CLASS-001 | Buat Kelas | Guru membuat kelas baru | Guru | 🔴 P0 |
| F-CLASS-002 | Edit Kelas | Guru mengedit informasi kelas | Guru | 🔴 P0 |
| F-CLASS-003 | Hapus/Arsipkan Kelas | Guru mengarsipkan kelas yang tidak aktif | Guru | 🟡 P1 |
| F-CLASS-004 | Generate Kode Kelas | Sistem generate kode unik 6 karakter | Sistem | 🔴 P0 |
| F-CLASS-005 | Join Kelas | Murid bergabung ke kelas dengan kode | Murid | 🔴 P0 |
| F-CLASS-006 | Leave Kelas | Murid keluar dari kelas | Murid | 🟡 P1 |
| F-CLASS-007 | Daftar Anggota | Guru melihat daftar murid di kelas | Guru | 🔴 P0 |
| F-CLASS-008 | Kick Murid | Guru mengeluarkan murid dari kelas | Guru | 🟡 P1 |
| F-CLASS-009 | Kelas Stream | Timeline aktivitas kelas (materi, tugas, pengumuman) | Semua | 🔴 P0 |
| F-CLASS-010 | Detail Kelas | Halaman detail kelas dengan tab navigasi | Semua | 🔴 P0 |

---

## 5. Modul Materi (MAT)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-MAT-001 | Upload PDF | Guru upload materi format PDF | Guru | 🔴 P0 |
| F-MAT-002 | Upload Video | Guru upload video pembelajaran | Guru | 🔴 P0 |
| F-MAT-003 | Upload Dokumen | Guru upload dokumen (Word, PPT) | Guru | 🔴 P0 |
| F-MAT-004 | Buat Materi Teks | Guru membuat materi berupa teks rich content | Guru | 🟡 P1 |
| F-MAT-005 | Organisasi Topik | Materi dikelompokkan berdasarkan topik/bab | Guru | 🔴 P0 |
| F-MAT-006 | Lihat Materi | Murid melihat daftar dan detail materi | Murid | 🔴 P0 |
| F-MAT-007 | Download Materi | Murid mendownload file materi | Murid | 🔴 P0 |
| F-MAT-008 | Streaming Video | Murid menonton video langsung di browser | Murid | 🟡 P1 |
| F-MAT-009 | Atur Urutan | Guru mengatur urutan tampil materi | Guru | 🟡 P1 |
| F-MAT-010 | Hapus Materi | Guru menghapus materi | Guru | 🔴 P0 |

---

## 6. Modul Tugas (ASG)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-ASG-001 | Buat Tugas | Guru membuat tugas dengan deskripsi dan deadline | Guru | 🔴 P0 |
| F-ASG-002 | Edit Tugas | Guru mengedit tugas yang sudah dibuat | Guru | 🔴 P0 |
| F-ASG-003 | Hapus Tugas | Guru menghapus tugas | Guru | 🔴 P0 |
| F-ASG-004 | Lampiran Tugas | Guru melampirkan file pada tugas | Guru | 🔴 P0 |
| F-ASG-005 | Lihat Tugas | Murid melihat daftar dan detail tugas | Murid | 🔴 P0 |
| F-ASG-006 | Submit Tugas | Murid mengupload jawaban tugas | Murid | 🔴 P0 |
| F-ASG-007 | Re-submit | Murid mengirim ulang jawaban sebelum deadline | Murid | 🟡 P1 |
| F-ASG-008 | Status Tugas | Tampilkan status: pending, submitted, late, graded | Sistem | 🔴 P0 |
| F-ASG-009 | Daftar Submission | Guru melihat semua submission per tugas | Guru | 🔴 P0 |
| F-ASG-010 | Feedback | Guru memberikan komentar pada submission | Guru | 🟡 P1 |

> Detail sistem: [16_ASSIGNMENT_SYSTEM.md](./16_ASSIGNMENT_SYSTEM.md)

---

## 7. Modul Quiz (QUIZ)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-QUIZ-001 | Buat Quiz | Guru membuat quiz baru | Guru | 🔴 P0 |
| F-QUIZ-002 | Soal Pilihan Ganda | Tipe soal multiple choice (A/B/C/D/E) | Guru | 🔴 P0 |
| F-QUIZ-003 | Soal Essay | Tipe soal jawaban panjang | Guru | 🟡 P1 |
| F-QUIZ-004 | Soal Benar/Salah | Tipe soal true/false | Guru | 🟡 P1 |
| F-QUIZ-005 | Set Durasi | Guru mengatur batas waktu pengerjaan | Guru | 🔴 P0 |
| F-QUIZ-006 | Set Jadwal | Guru mengatur tanggal mulai dan selesai | Guru | 🔴 P0 |
| F-QUIZ-007 | Kerjakan Quiz | Murid mengerjakan quiz dalam batas waktu | Murid | 🔴 P0 |
| F-QUIZ-008 | Auto-grading | Sistem menilai soal PG dan B/S secara otomatis | Sistem | 🔴 P0 |
| F-QUIZ-009 | Hasil Quiz | Murid melihat hasil setelah quiz selesai | Murid | 🔴 P0 |
| F-QUIZ-010 | Analisis Quiz | Guru melihat statistik jawaban per soal | Guru | 🟡 P1 |
| F-QUIZ-011 | Acak Soal | Randomisasi urutan soal per murid | Sistem | 🟢 P2 |

> Detail sistem: [18_QUIZ_SYSTEM.md](./18_QUIZ_SYSTEM.md)

---

## 8. Modul Penilaian (GRD)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-GRD-001 | Nilai Tugas | Guru menginput nilai untuk submission tugas | Guru | 🔴 P0 |
| F-GRD-002 | Nilai Quiz | Nilai quiz (otomatis PG, manual essay) | Guru | 🔴 P0 |
| F-GRD-003 | Lihat Nilai | Murid melihat nilai per tugas dan quiz | Murid | 🔴 P0 |
| F-GRD-004 | Rekap Nilai | Rekap nilai per kelas per semester | Guru | 🔴 P0 |
| F-GRD-005 | Export Nilai | Export rekap nilai ke Excel | Guru | 🟡 P1 |
| F-GRD-006 | Ringkasan Akademik | Murid melihat ringkasan nilai keseluruhan | Murid | 🟡 P1 |
| F-GRD-007 | Bobot Nilai | Konfigurasi bobot tugas vs quiz per kelas | Guru | 🟢 P2 |

> Detail sistem: [17_GRADE_SYSTEM.md](./17_GRADE_SYSTEM.md)

---

## 9. Modul Kalender (CAL)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-CAL-001 | Kalender Bulanan | Tampilan kalender per bulan | Semua | 🔴 P0 |
| F-CAL-002 | Deadline Tugas | Tampilkan deadline tugas di kalender | Murid, Guru | 🔴 P0 |
| F-CAL-003 | Jadwal Quiz | Tampilkan jadwal quiz di kalender | Murid, Guru | 🔴 P0 |
| F-CAL-004 | Filter Kelas | Filter event berdasarkan kelas | Murid, Guru | 🟡 P1 |
| F-CAL-005 | Tampilan Mingguan | Opsi tampilan mingguan | Semua | 🟡 P1 |

---

## 10. Modul Diskusi (DISC)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-DISC-001 | Forum Kelas | Forum diskusi per kelas | Murid, Guru | 🔴 P0 |
| F-DISC-002 | Buat Post | Membuat post diskusi baru | Murid, Guru | 🔴 P0 |
| F-DISC-003 | Reply | Membalas post diskusi | Murid, Guru | 🔴 P0 |
| F-DISC-004 | Hapus Post | Guru dapat menghapus post tidak pantas | Guru | 🟡 P1 |
| F-DISC-005 | Notifikasi Reply | Notifikasi saat ada reply baru | Murid, Guru | 🟡 P1 |

---

## 11. Modul Pengumuman (ANN)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-ANN-001 | Pengumuman Kelas | Guru membuat pengumuman untuk kelas | Guru | 🔴 P0 |
| F-ANN-002 | Pengumuman Global | Admin membuat pengumuman untuk semua user | Admin | 🔴 P0 |
| F-ANN-003 | Pin Pengumuman | Pin pengumuman penting di atas | Guru, Admin | 🟡 P1 |
| F-ANN-004 | Notifikasi | Notifikasi pengumuman baru | Semua | 🟡 P1 |

---

## 12. Modul Profil (PROF)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-PROF-001 | Lihat Profil | Melihat profil sendiri | Semua | 🔴 P0 |
| F-PROF-002 | Edit Profil | Mengedit nama, bio | Semua | 🔴 P0 |
| F-PROF-003 | Ubah Password | Mengubah password | Semua | 🔴 P0 |
| F-PROF-004 | Foto Profil | Upload foto profil | Semua | 🟡 P1 |

---

## 13. Modul Administrasi (ADM)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-ADM-001 | CRUD Guru | Tambah, lihat, edit, hapus data guru | Admin | 🔴 P0 |
| F-ADM-002 | CRUD Murid | Tambah, lihat, edit, hapus data murid | Admin | 🔴 P0 |
| F-ADM-003 | Kelola Kelas | Lihat semua kelas, assign guru | Admin | 🔴 P0 |
| F-ADM-004 | CRUD Mapel | Kelola mata pelajaran | Admin | 🔴 P0 |
| F-ADM-005 | CRUD Semester | Kelola semester, set aktif | Admin | 🔴 P0 |
| F-ADM-006 | CRUD Tahun Ajaran | Kelola tahun ajaran, set aktif | Admin | 🔴 P0 |
| F-ADM-007 | Backup DB | Backup database manual | Admin | 🔴 P0 |
| F-ADM-008 | Restore DB | Restore dari file backup | Admin | 🔴 P0 |
| F-ADM-009 | Import Excel | Import data guru/murid dari Excel | Admin | 🟡 P1 |
| F-ADM-010 | Export Excel | Export data ke Excel | Admin | 🟡 P1 |
| F-ADM-011 | Activity Log | Log aktivitas seluruh pengguna | Admin | 🔴 P0 |
| F-ADM-012 | Role & Permission | Kelola role dan permission | Admin | 🔴 P0 |
| F-ADM-013 | System Settings | Pengaturan sekolah (nama, logo, dll) | Admin | 🟡 P1 |

---

## 14. Ringkasan Statistik

| Prioritas | Jumlah Fitur |
|---|---|
| 🔴 P0 (Must Have) | 58 |
| 🟡 P1 (Should Have) | 27 |
| 🟢 P2 (Nice to Have) | 4 |
| **Total** | **89** |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [08_FUNCTIONAL_REQUIREMENTS.md](./08_FUNCTIONAL_REQUIREMENTS.md)*


<!-- ============================================== -->
# SOURCE FILE: 08_FUNCTIONAL_REQUIREMENTS.md
<!-- ============================================== -->


# 08 — Functional Requirements

> **Dokumen Terkait:** [07_FEATURE_LIST.md](./07_FEATURE_LIST.md) · [09_NON_FUNCTIONAL_REQUIREMENTS.md](./09_NON_FUNCTIONAL_REQUIREMENTS.md) · [13_DATABASE_REQUIREMENTS.md](./13_DATABASE_REQUIREMENTS.md)

---

## 1. Informasi Dokumen

| Atribut | Detail |
|---|---|
| **Nama Produk** | DIKELAS |
| **Versi** | 1.0.0 |
| **Tanggal** | Juli 2026 |
| **Status** | ✅ Approved |

---

## 2. Tujuan

Dokumen ini mendeskripsikan **perilaku fungsional** dari setiap modul DIKELAS secara detail. Setiap requirement menjelaskan **apa yang dilakukan sistem** dalam merespon input pengguna.

---

## 3. FR-AUTH: Autentikasi

### FR-AUTH-001: Login

| Atribut | Detail |
|---|---|
| **Input** | Email, Password |
| **Proses** | Validasi kredensial, cek role, buat session |
| **Output** | Redirect ke dashboard sesuai role |
| **Validasi** | Email: required, valid format; Password: required, min 8 karakter |
| **Error** | "Email atau password salah" (generic untuk keamanan) |
| **Rate Limit** | Maksimal 5 percobaan per menit per IP |

**Pre-condition:** User memiliki akun terdaftar dan aktif.
**Post-condition:** Session aktif, user diarahkan ke dashboard sesuai role.

### FR-AUTH-002: Register Murid

| Atribut | Detail |
|---|---|
| **Input** | Nama lengkap, Email, Password, Konfirmasi Password |
| **Proses** | Validasi input, cek email unik, hash password, buat user dengan role student |
| **Output** | Akun terbuat, redirect ke dashboard murid |
| **Validasi** | Nama: required, max 255; Email: required, unique, valid; Password: min 8, confirmed |
| **Error** | "Email sudah terdaftar" |

**Pre-condition:** Email belum terdaftar di sistem.
**Post-condition:** User baru dengan role `student` terbuat di database.

### FR-AUTH-003: Logout

| Atribut | Detail |
|---|---|
| **Input** | Klik tombol Logout |
| **Proses** | Hapus session, invalidate token |
| **Output** | Redirect ke halaman login |

### FR-AUTH-004: Reset Password

| Atribut | Detail |
|---|---|
| **Input** | Email |
| **Proses** | Generate token, kirim email dengan link reset |
| **Output** | Pesan "Link reset password telah dikirim ke email Anda" |
| **Token** | Valid selama 60 menit, single use |

---

## 4. FR-CLASS: Manajemen Kelas

### FR-CLASS-001: Buat Kelas

| Atribut | Detail |
|---|---|
| **Input** | Nama kelas, Deskripsi, Mata pelajaran, Semester |
| **Proses** | Validasi input, generate kode unik 6 karakter, simpan ke database |
| **Output** | Kelas terbuat, redirect ke halaman kelas |
| **Validasi** | Nama: required, max 100; Mapel: required, exists; Semester: required, exists |
| **Kode Kelas** | 6 karakter alfanumerik (uppercase), unik di seluruh sistem |

**Pre-condition:** User memiliki role `teacher`.
**Post-condition:** Kelas terbuat dengan guru sebagai pemilik.

### FR-CLASS-002: Join Kelas

| Atribut | Detail |
|---|---|
| **Input** | Kode kelas (6 karakter) |
| **Proses** | Validasi kode, cek belum terdaftar di kelas, tambahkan ke kelas |
| **Output** | Murid berhasil bergabung, redirect ke halaman kelas |
| **Error** | "Kode kelas tidak ditemukan" / "Anda sudah terdaftar di kelas ini" |

**Pre-condition:** User memiliki role `student`, kode kelas valid.
**Post-condition:** Relasi student-class terbuat di pivot table.

### FR-CLASS-003: Daftar Anggota Kelas

| Atribut | Detail |
|---|---|
| **Input** | ID Kelas |
| **Proses** | Query murid yang terdaftar di kelas |
| **Output** | Daftar murid dengan nama, email, tanggal bergabung |
| **Pagination** | 20 item per halaman |

---

## 5. FR-MAT: Manajemen Materi

### FR-MAT-001: Upload Materi

| Atribut | Detail |
|---|---|
| **Input** | Judul, Deskripsi, File (PDF/Video/Dokumen), Topik |
| **Proses** | Validasi file, simpan ke Laravel Storage, buat record di database |
| **Output** | Materi berhasil diupload, tampil di daftar materi kelas |
| **Validasi File** | PDF: max 25MB; Video: max 50MB; Dokumen: max 10MB |
| **Format** | PDF, MP4, MOV, AVI, DOC, DOCX, PPT, PPTX |

**Pre-condition:** User adalah guru pemilik kelas.
**Post-condition:** File tersimpan di storage, record di database.

### FR-MAT-002: Download Materi

| Atribut | Detail |
|---|---|
| **Input** | Klik tombol download pada materi |
| **Proses** | Cek akses (murid terdaftar di kelas), serve file dari storage |
| **Output** | File terdownload ke device pengguna |
| **Header** | Content-Disposition: attachment, Content-Type sesuai file |

---

## 6. FR-ASG: Sistem Tugas

### FR-ASG-001: Buat Tugas

| Atribut | Detail |
|---|---|
| **Input** | Judul, Instruksi, Deadline, Lampiran (opsional), Nilai maksimal |
| **Proses** | Validasi input, simpan tugas, lampirkan file jika ada |
| **Output** | Tugas terbuat, tampil di kelas stream |
| **Validasi** | Judul: required, max 200; Deadline: required, after now; Nilai max: required, integer, 1-100 |

### FR-ASG-002: Submit Tugas

| Atribut | Detail |
|---|---|
| **Input** | File jawaban, Catatan (opsional) |
| **Proses** | Validasi file, cek deadline, simpan submission |
| **Output** | Status berubah menjadi "submitted" atau "late" |
| **Logic** | Jika submit setelah deadline → status "late" (tetap diterima) |
| **Re-submit** | Bisa re-submit sebelum deadline, file lama diganti |

### FR-ASG-003: Nilai Tugas

| Atribut | Detail |
|---|---|
| **Input** | Nilai (0-100), Feedback (opsional) |
| **Proses** | Validasi nilai, simpan ke submission, update status |
| **Output** | Submission status berubah menjadi "graded" |

---

## 7. FR-QUIZ: Sistem Quiz

### FR-QUIZ-001: Buat Quiz

| Atribut | Detail |
|---|---|
| **Input** | Judul, Deskripsi, Durasi (menit), Tanggal mulai, Tanggal selesai, Daftar soal |
| **Proses** | Validasi input, simpan quiz dan soal-soalnya |
| **Output** | Quiz terbuat dengan semua soal |
| **Tipe Soal** | multiple_choice, true_false, essay |

### FR-QUIZ-002: Kerjakan Quiz

| Atribut | Detail |
|---|---|
| **Input** | Jawaban untuk setiap soal |
| **Proses** | Timer berjalan, simpan jawaban, auto-submit jika waktu habis |
| **Output** | Quiz selesai, nilai otomatis untuk PG dan B/S |
| **Logic** | PG: cocokkan dengan answer_key; Essay: guru input manual |
| **Constraint** | Hanya bisa dikerjakan sekali, dalam periode start-end |

### FR-QUIZ-003: Hasil Quiz

| Atribut | Detail |
|---|---|
| **Input** | ID Quiz attempt |
| **Proses** | Hitung skor, tampilkan jawaban benar/salah |
| **Output** | Skor total, detail per soal |

---

## 8. FR-GRD: Sistem Penilaian

### FR-GRD-001: Rekap Nilai

| Atribut | Detail |
|---|---|
| **Input** | ID Kelas, filter semester |
| **Proses** | Agregasi nilai tugas dan quiz per murid |
| **Output** | Tabel rekap: Nama Murid × Tugas/Quiz = Nilai |
| **Kalkulasi** | Rata-rata berbobot (jika bobot dikonfigurasi) atau rata-rata biasa |

### FR-GRD-002: Export Nilai

| Atribut | Detail |
|---|---|
| **Input** | ID Kelas, format (Excel) |
| **Proses** | Generate file Excel dengan rekap nilai |
| **Output** | File .xlsx terdownload |
| **Kolom** | No, NIS, Nama, Tugas 1..N, Quiz 1..N, Rata-rata |

---

## 9. FR-CAL: Kalender

### FR-CAL-001: Tampilkan Kalender

| Atribut | Detail |
|---|---|
| **Input** | Bulan, Tahun, Filter kelas (opsional) |
| **Proses** | Query deadline tugas dan jadwal quiz dari kelas yang diikuti/diajar |
| **Output** | Tampilan kalender dengan event markers |
| **Event Types** | assignment_deadline, quiz_schedule, announcement |

---

## 10. FR-DISC: Diskusi

### FR-DISC-001: Buat Post Diskusi

| Atribut | Detail |
|---|---|
| **Input** | Judul, Konten |
| **Proses** | Validasi input, simpan post, notifikasi ke anggota kelas |
| **Output** | Post tampil di forum kelas |
| **Validasi** | Judul: required, max 200; Konten: required |

### FR-DISC-002: Reply Post

| Atribut | Detail |
|---|---|
| **Input** | Konten reply |
| **Proses** | Validasi, simpan reply, notifikasi ke author post |
| **Output** | Reply tampil di bawah post |

---

## 11. FR-ADM: Administrasi

### FR-ADM-001: Import Excel

| Atribut | Detail |
|---|---|
| **Input** | File Excel (.xlsx) |
| **Proses** | Parse Excel, validasi setiap row, bulk insert |
| **Output** | Laporan import: X berhasil, Y gagal, detail error |
| **Template** | Admin dapat download template Excel |
| **Kolom Guru** | Nama, Email, NIP |
| **Kolom Murid** | Nama, Email, NIS, Kelas |

### FR-ADM-002: Backup Database

| Atribut | Detail |
|---|---|
| **Input** | Klik tombol "Backup Sekarang" |
| **Proses** | mysqldump, compress (gzip), simpan ke storage |
| **Output** | File backup tersimpan, entry di histori backup |
| **Naming** | `dikelas_backup_YYYYMMDD_HHmmss.sql.gz` |
| **Auto** | Backup otomatis harian via Laravel Scheduler |

### FR-ADM-003: Activity Log

| Atribut | Detail |
|---|---|
| **Tracked Actions** | Login, Logout, CRUD operations, File upload/download, Grade input |
| **Data** | User, Action, Target, IP Address, Timestamp, User Agent |
| **Retention** | 90 hari (configurable) |
| **Filter** | Filter by user, action type, date range |

---

## 12. Traceability Matrix

| Feature ID | Functional Req | Database Table | Controller | View |
|---|---|---|---|---|
| F-AUTH-001 | FR-AUTH-001 | users | AuthController | auth/login |
| F-AUTH-002 | FR-AUTH-002 | users | AuthController | auth/register |
| F-CLASS-001 | FR-CLASS-001 | classrooms | ClassroomController | classrooms/create |
| F-CLASS-005 | FR-CLASS-002 | classroom_student | ClassroomController | classrooms/join |
| F-MAT-001 | FR-MAT-001 | materials | MaterialController | materials/create |
| F-ASG-001 | FR-ASG-001 | assignments | AssignmentController | assignments/create |
| F-ASG-006 | FR-ASG-002 | submissions | SubmissionController | assignments/submit |
| F-QUIZ-001 | FR-QUIZ-001 | quizzes, questions | QuizController | quizzes/create |
| F-GRD-001 | FR-GRD-001 | grades | GradeController | grades/input |
| F-ADM-009 | FR-ADM-001 | users | ImportController | admin/import |
| F-ADM-007 | FR-ADM-002 | backups | BackupController | admin/backup |
| F-ADM-011 | FR-ADM-003 | activity_logs | ActivityLogController | admin/logs |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [09_NON_FUNCTIONAL_REQUIREMENTS.md](./09_NON_FUNCTIONAL_REQUIREMENTS.md)*


<!-- ============================================== -->
# SOURCE FILE: 09_NON_FUNCTIONAL_REQUIREMENTS.md
<!-- ============================================== -->


# 09 — Non-Functional Requirements

> **Dokumen Terkait:** [08_FUNCTIONAL_REQUIREMENTS.md](./08_FUNCTIONAL_REQUIREMENTS.md) · [14_SECURITY_REQUIREMENTS.md](./14_SECURITY_REQUIREMENTS.md) · [26_DEPLOYMENT_PLAN.md](./26_DEPLOYMENT_PLAN.md)

---

## 1. Performance Requirements

### 1.1 Response Time

| Metrik | Target | Metode Pengukuran |
|---|---|---|
| Page load time (initial) | < 2 detik | Lighthouse, Chrome DevTools |
| Page load time (subsequent) | < 1 detik | Browser cache + Livewire |
| API response time | < 500ms | Laravel Debugbar |
| Database query time | < 100ms | Query log |
| File upload (10MB) | < 10 detik | Manual timing |
| File download start | < 2 detik | Manual timing |

### 1.2 Throughput

| Metrik | Target |
|---|---|
| Concurrent users | Hingga 500 per instance |
| Requests per second | > 100 RPS |
| File uploads simultan | Hingga 20 concurrent uploads |
| Database connections | Max 100 pool connections |

### 1.3 Resource Usage

| Resource | Limit |
|---|---|
| Memory per request | < 128MB |
| CPU per request | < 2 detik processing |
| Storage per file | Max 50MB |
| Total storage per sekolah | Configurable (default 50GB) |
| Database size | Optimal hingga 10GB |

---

## 2. Scalability Requirements

| Aspek | Requirement |
|---|---|
| **Horizontal** | Stateless application, session di database |
| **Vertical** | Optimal di server 2 CPU, 4GB RAM |
| **Data Growth** | Query tetap optimal hingga 100.000 records per tabel |
| **User Growth** | Mendukung hingga 2.000 total user per instance |
| **File Growth** | Pagination dan lazy loading untuk file listing |

---

## 3. Reliability & Availability

| Metrik | Target |
|---|---|
| **Uptime** | 99.5% (sekitar 1.8 hari downtime/tahun) |
| **MTTR** | < 4 jam (Mean Time To Recovery) |
| **MTBF** | > 30 hari (Mean Time Between Failures) |
| **Backup Frequency** | Harian (otomatis), on-demand (manual) |
| **Backup Retention** | 30 hari |
| **Recovery Point Objective** | < 24 jam |
| **Recovery Time Objective** | < 4 jam |

---

## 4. Security Requirements (Summary)

| Aspek | Requirement |
|---|---|
| **Authentication** | Laravel Breeze + Sanctum, bcrypt hashing |
| **Authorization** | Role-based access control (RBAC), middleware |
| **Data Protection** | HTTPS, CSRF protection, XSS prevention |
| **Input Validation** | Server-side validation wajib, client-side opsional |
| **SQL Injection** | Eloquent ORM (parameterized queries) |
| **Session** | Secure session config, timeout 2 jam |
| **File Upload** | MIME type validation, virus scan (future) |
| **Audit Trail** | Activity log untuk aksi sensitif |

> Detail: [14_SECURITY_REQUIREMENTS.md](./14_SECURITY_REQUIREMENTS.md)

---

## 5. Usability Requirements

| Aspek | Requirement |
|---|---|
| **Learnability** | User baru dapat menggunakan fitur utama dalam < 5 menit |
| **Efficiency** | Aksi utama membutuhkan maksimal 3 klik |
| **Error Prevention** | Konfirmasi untuk aksi destruktif (hapus, arsipkan) |
| **Error Recovery** | Pesan error yang jelas dan actionable |
| **Consistency** | UI konsisten di seluruh halaman |
| **Accessibility** | WCAG 2.1 Level A compliance |
| **Feedback** | Visual feedback untuk setiap aksi (toast, loading state) |
| **Language** | Bahasa Indonesia sebagai bahasa utama |

---

## 6. Compatibility Requirements

### 6.1 Browser Support

| Browser | Versi Minimum | Status |
|---|---|---|
| Google Chrome | 2 versi terakhir | ✅ Fully Supported |
| Mozilla Firefox | 2 versi terakhir | ✅ Fully Supported |
| Microsoft Edge | 2 versi terakhir | ✅ Fully Supported |
| Safari | 2 versi terakhir | ✅ Fully Supported |
| Internet Explorer | Semua versi | ❌ Not Supported |
| Opera | 2 versi terakhir | ⚠️ Best Effort |

### 6.2 Device Support

| Device | Screen Size | Status |
|---|---|---|
| Desktop | ≥ 1024px | ✅ Full Experience |
| Tablet | 768px – 1023px | ✅ Adapted Layout |
| Smartphone | 320px – 767px | ✅ Mobile-First |

### 6.3 Server Requirements

| Requirement | Minimum | Recommended |
|---|---|---|
| **PHP** | 8.4 | 8.4+ |
| **MySQL** | 8.0 | 8.0+ |
| **Web Server** | Apache 2.4 / Nginx 1.18 | Nginx 1.24+ |
| **RAM** | 2 GB | 4 GB |
| **CPU** | 1 Core | 2 Core |
| **Storage** | 20 GB | 100 GB (SSD) |
| **OS** | Ubuntu 22.04 / Windows Server 2019 | Ubuntu 24.04 |

---

## 7. Maintainability Requirements

| Aspek | Requirement |
|---|---|
| **Code Standard** | PSR-12, Laravel conventions |
| **Documentation** | Inline PHPDoc untuk semua class dan method public |
| **Testing** | Unit test coverage > 80% |
| **Logging** | Laravel Log (daily rotation, 14 hari) |
| **Monitoring** | Health check endpoint `/health` |
| **Dependency Updates** | Composer audit bulanan |
| **Database Migration** | Semua perubahan via migration, tidak ada raw SQL |

---

## 8. Data Requirements

| Aspek | Requirement |
|---|---|
| **Encoding** | UTF-8 (utf8mb4) untuk support emoji |
| **Timezone** | Asia/Jakarta (WIB) sebagai default |
| **Date Format** | `d M Y` (contoh: 09 Jul 2026) |
| **Time Format** | `H:i` (contoh: 14:30) |
| **Currency** | IDR (Rupiah) — jika dibutuhkan |
| **File Naming** | Sanitize filename, replace spasi dengan underscore |
| **Soft Delete** | Semua model utama menggunakan SoftDeletes |
| **Timestamps** | created_at, updated_at di setiap tabel |

---

## 9. Internationalization (i18n)

| Aspek | Requirement |
|---|---|
| **Bahasa Default** | Bahasa Indonesia |
| **Multi-language** | Tidak untuk MVP (future feature) |
| **String Management** | Laravel lang files untuk semua string UI |
| **Date Localization** | Format tanggal Indonesia |
| **Number Format** | Separator ribuan: titik (1.000), desimal: koma (3,5) |

---

## 10. Compliance Checklist

- [x] CSRF protection di semua form
- [x] XSS prevention (Blade auto-escaping)
- [x] SQL Injection prevention (Eloquent ORM)
- [x] Password hashing (bcrypt)
- [x] HTTPS enforcement
- [x] Rate limiting
- [x] Input validation (server-side)
- [x] File upload validation (MIME type, size)
- [x] Session security (httpOnly, secure cookies)
- [x] Soft delete untuk data integrity
- [x] Activity log untuk audit trail
- [ ] GDPR / UU PDP compliance (future)

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [10_INFORMATION_ARCHITECTURE.md](./10_INFORMATION_ARCHITECTURE.md)*


<!-- ============================================== -->
# SOURCE FILE: 10_INFORMATION_ARCHITECTURE.md
<!-- ============================================== -->


# 10 — Information Architecture

> **Dokumen Terkait:** [11_USER_FLOW.md](./11_USER_FLOW.md) · [12_SITEMAP.md](./12_SITEMAP.md) · [07_FEATURE_LIST.md](./07_FEATURE_LIST.md)

---

## 1. Tujuan

Dokumen ini mendefinisikan **arsitektur informasi** DIKELAS — bagaimana konten dan fitur diorganisasi, diberi label, dan dinavigasikan oleh setiap role pengguna.

---

## 2. Prinsip Organisasi

| Prinsip | Penjelasan |
|---|---|
| **Role-based Navigation** | Setiap role melihat navigasi yang berbeda |
| **Task-oriented** | Struktur mengikuti alur tugas pengguna |
| **Flat Hierarchy** | Maksimal 3 level kedalaman navigasi |
| **Progressive Disclosure** | Fitur lanjutan tersembunyi hingga dibutuhkan |
| **Consistency** | Label dan posisi elemen konsisten di semua halaman |

---

## 3. Navigasi Utama per Role

### 3.1 Murid (Student)

```
Sidebar Navigation:
├── 🏠 Dashboard
├── 📚 Kelas Saya
│   ├── [Nama Kelas 1]
│   ├── [Nama Kelas 2]
│   └── + Gabung Kelas
├── 📝 Tugas
│   ├── Belum Dikerjakan
│   ├── Sudah Dikerjakan
│   └── Dinilai
├── 📊 Nilai
├── 📅 Kalender
├── 💬 Diskusi
├── 📢 Pengumuman
└── 👤 Profil
```

### 3.2 Guru (Teacher)

```
Sidebar Navigation:
├── 🏠 Dashboard
├── 📚 Kelas Saya
│   ├── [Nama Kelas 1]
│   ├── [Nama Kelas 2]
│   └── + Buat Kelas
├── 📝 Tugas
│   ├── Aktif
│   ├── Perlu Dinilai
│   └── Selesai
├── 📖 Materi
├── 📋 Quiz
├── 📊 Nilai
│   ├── Input Nilai
│   └── Rekap
├── 📅 Kalender
├── 💬 Diskusi
├── 📢 Pengumuman
└── 👤 Profil
```

### 3.3 Super Admin

```
Sidebar Navigation:
├── 🏠 Dashboard
├── 👥 Manajemen User
│   ├── Guru
│   └── Murid
├── 📚 Kelas
├── 📖 Mata Pelajaran
├── 📅 Akademik
│   ├── Tahun Ajaran
│   └── Semester
├── 📊 Laporan
│   ├── Activity Log
│   └── Statistik
├── 💾 Data
│   ├── Backup & Restore
│   ├── Import Excel
│   └── Export Excel
├── 🔐 Akses
│   ├── Role
│   └── Permission
├── ⚙️ Pengaturan
└── 👤 Profil
```

---

## 4. Content Model

### 4.1 Hierarki Konten

```
Tahun Ajaran (2026/2027)
└── Semester (Ganjil)
    └── Mata Pelajaran (Matematika)
        └── Kelas (XI IPA 1 - Matematika)
            ├── Materi
            │   ├── Topik 1: Integral
            │   │   ├── Materi 1.1 (PDF)
            │   │   └── Materi 1.2 (Video)
            │   └── Topik 2: Diferensial
            ├── Tugas
            │   ├── Tugas 1: Latihan Integral
            │   │   └── Submissions
            │   └── Tugas 2: PR Bab 5
            ├── Quiz
            │   ├── Quiz 1: Ulangan Harian
            │   │   └── Attempts
            │   └── Quiz 2: Latihan
            ├── Diskusi
            │   └── Posts & Replies
            ├── Pengumuman
            └── Anggota (Daftar Murid)
```

### 4.2 Entity Relationships (Simplified)

| Entity | Belongs To | Has Many |
|---|---|---|
| Tahun Ajaran | — | Semester |
| Semester | Tahun Ajaran | Kelas |
| Mata Pelajaran | — | Kelas |
| Kelas | Guru, Mapel, Semester | Materi, Tugas, Quiz, Diskusi, Murid |
| Materi | Kelas, Topik | — |
| Tugas | Kelas | Submissions |
| Quiz | Kelas | Questions, Attempts |
| Submission | Tugas, Murid | Grade |
| Grade | Submission/Attempt | — |

---

## 5. Labeling System

### 5.1 Navigasi Labels

| Internal | Label Tampil (ID) | Icon |
|---|---|---|
| dashboard | Dashboard | 🏠 |
| classrooms | Kelas Saya | 📚 |
| assignments | Tugas | 📝 |
| materials | Materi | 📖 |
| quizzes | Quiz | 📋 |
| grades | Nilai | 📊 |
| calendar | Kalender | 📅 |
| discussions | Diskusi | 💬 |
| announcements | Pengumuman | 📢 |
| profile | Profil | 👤 |
| users | Manajemen User | 👥 |
| subjects | Mata Pelajaran | 📖 |
| academic | Akademik | 📅 |
| backup | Backup & Restore | 💾 |
| settings | Pengaturan | ⚙️ |

### 5.2 Status Labels

| Status | Label | Warna | Konteks |
|---|---|---|---|
| pending | Belum Dikerjakan | 🟡 Kuning | Tugas |
| submitted | Sudah Dikerjakan | 🔵 Biru | Tugas |
| late | Terlambat | 🔴 Merah | Tugas |
| graded | Dinilai | 🟢 Hijau | Tugas |
| active | Aktif | 🟢 Hijau | Kelas, Quiz |
| archived | Diarsipkan | ⚫ Abu-abu | Kelas |
| upcoming | Akan Datang | 🔵 Biru | Quiz |
| in_progress | Sedang Berlangsung | 🟡 Kuning | Quiz |
| ended | Selesai | ⚫ Abu-abu | Quiz |

---

## 6. Page Templates

### 6.1 Template Types

| Template | Digunakan Di | Deskripsi |
|---|---|---|
| **Dashboard** | Dashboard per role | Cards, statistik, quick actions |
| **List** | Daftar kelas, tugas, materi | Tabel/grid dengan filter dan search |
| **Detail** | Detail kelas, tugas, materi | Header + content + sidebar info |
| **Form** | Create/Edit kelas, tugas, quiz | Form input dengan validasi |
| **Profile** | Profil pengguna | Avatar + info + activity |
| **Settings** | Admin settings | Form group dengan tabs |

### 6.2 Layout Structure

```
┌─────────────────────────────────────────────┐
│ Topbar (Logo, Search, Notifications, Avatar)│
├────────┬────────────────────────────────────┤
│        │                                    │
│ Side   │         Main Content               │
│ bar    │                                    │
│        │  ┌──────────────────────────────┐  │
│ Nav    │  │  Page Header (Title, Actions)│  │
│ Items  │  ├──────────────────────────────┤  │
│        │  │                              │  │
│        │  │  Page Content                │  │
│        │  │  (Cards, Tables, Forms)      │  │
│        │  │                              │  │
│        │  └──────────────────────────────┘  │
│        │                                    │
├────────┴────────────────────────────────────┤
│ Footer (optional)                           │
└─────────────────────────────────────────────┘
```

---

## 7. Search & Filter Strategy

| Context | Search By | Filter By | Sort By |
|---|---|---|---|
| **Kelas** | Nama kelas, Mapel | Semester, Status | Terbaru, Nama |
| **Materi** | Judul, Topik | Kelas, Tipe file | Terbaru, Topik |
| **Tugas** | Judul | Kelas, Status, Deadline | Deadline, Terbaru |
| **Quiz** | Judul | Kelas, Status | Tanggal, Terbaru |
| **User** | Nama, Email | Role, Status | Nama, Terbaru |
| **Activity Log** | User, Action | Tipe aksi, Tanggal | Terbaru |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [11_USER_FLOW.md](./11_USER_FLOW.md)*


<!-- ============================================== -->
# SOURCE FILE: 11_USER_FLOW.md
<!-- ============================================== -->


# 11 — User Flow

> **Dokumen Terkait:** [05_USER_PERSONA.md](./05_USER_PERSONA.md) · [07_FEATURE_LIST.md](./07_FEATURE_LIST.md) · [10_INFORMATION_ARCHITECTURE.md](./10_INFORMATION_ARCHITECTURE.md)

---

## 1. Tujuan

Dokumen ini mendefinisikan **alur perjalanan pengguna** (user flow) untuk setiap skenario utama di DIKELAS. Setiap flow menggambarkan langkah-langkah dari titik masuk hingga penyelesaian tugas.

---

## 2. Flow: Registrasi Murid

```
[Halaman Landing]
       │
       ▼
[Klik "Daftar"]
       │
       ▼
[Form Registrasi]
├── Input: Nama Lengkap
├── Input: Email
├── Input: Password
└── Input: Konfirmasi Password
       │
       ▼
[Klik "Daftar"] ──── Validasi Gagal? ──▶ [Tampilkan Error] ──▶ [Kembali ke Form]
       │
       │ Validasi Berhasil
       ▼
[Akun Terbuat (role: student)]
       │
       ▼
[Redirect ke Dashboard Murid]
       │
       ▼
[Dashboard Murid - Empty State]
├── "Belum ada kelas"
└── Tombol "Gabung Kelas"
```

---

## 3. Flow: Login

```
[Halaman Login]
       │
       ▼
[Input Email & Password]
       │
       ▼
[Klik "Masuk"] ──── Gagal? ──▶ [Error: "Email atau password salah"]
       │                              │
       │ Berhasil                      ▼
       │                        [Rate limit check]
       ▼                        (max 5x/menit)
[Cek Role User]
       │
       ├── role = student ──▶ [Dashboard Murid]
       ├── role = teacher ──▶ [Dashboard Guru]
       └── role = super_admin ──▶ [Dashboard Admin]
```

---

## 4. Flow: Murid Bergabung ke Kelas

```
[Dashboard Murid]
       │
       ▼
[Klik "Gabung Kelas"]
       │
       ▼
[Modal: Input Kode Kelas]
├── Input: Kode (6 karakter)
       │
       ▼
[Klik "Gabung"] ──── Kode Invalid? ──▶ [Error: "Kode tidak ditemukan"]
       │                │
       │                └── Sudah Terdaftar? ──▶ [Error: "Sudah di kelas ini"]
       │
       │ Berhasil
       ▼
[Murid ditambahkan ke kelas]
       │
       ▼
[Redirect ke Halaman Kelas]
       │
       ▼
[Kelas Stream: Materi, Tugas, Pengumuman]
```

---

## 5. Flow: Guru Membuat Kelas

```
[Dashboard Guru]
       │
       ▼
[Klik "Buat Kelas"]
       │
       ▼
[Form Buat Kelas]
├── Input: Nama Kelas (misal: "XI IPA 1 - Matematika")
├── Input: Deskripsi
├── Select: Mata Pelajaran
└── Select: Semester
       │
       ▼
[Klik "Buat"] ──── Validasi Gagal? ──▶ [Tampilkan Error]
       │
       │ Berhasil
       ▼
[Kelas Terbuat]
├── Kode kelas di-generate: "A7X2K9"
└── Guru otomatis jadi pemilik
       │
       ▼
[Redirect ke Halaman Kelas]
├── Tab: Stream (kosong)
├── Tab: Materi
├── Tab: Tugas
├── Tab: Anggota
└── Info: Kode kelas untuk dibagikan ke murid
```

---

## 6. Flow: Guru Upload Materi

```
[Halaman Kelas → Tab Materi]
       │
       ▼
[Klik "Tambah Materi"]
       │
       ▼
[Form Upload Materi]
├── Input: Judul
├── Input: Deskripsi (opsional)
├── Select: Topik/Bab
├── Upload: File (PDF/Video/Dokumen)
│   ├── Drag & Drop area
│   └── Atau klik "Pilih File"
       │
       ▼
[Upload Progress Bar: 0%...50%...100%]
       │
       ▼
[Klik "Simpan"] ──── Validasi Gagal? ──▶ [Error: File terlalu besar / format tidak didukung]
       │
       │ Berhasil
       ▼
[Materi Tersimpan]
       │
       ▼
[Tampil di daftar materi kelas]
[Murid dapat melihat dan download]
```

---

## 7. Flow: Guru Membuat Tugas

```
[Halaman Kelas → Tab Tugas]
       │
       ▼
[Klik "Buat Tugas"]
       │
       ▼
[Form Buat Tugas]
├── Input: Judul Tugas
├── Input: Instruksi / Deskripsi (rich text)
├── Input: Nilai Maksimal (0-100)
├── Input: Deadline (date & time picker)
└── Upload: Lampiran (opsional)
       │
       ▼
[Klik "Publish"] ──── Validasi Gagal? ──▶ [Error]
       │
       │ Berhasil
       ▼
[Tugas Terbuat & Dipublish]
       │
       ▼
[Tampil di kelas stream]
[Tampil di kalender murid]
[Notifikasi ke murid di kelas]
```

---

## 8. Flow: Murid Mengerjakan Tugas

```
[Dashboard → Tugas Pending]
       │
       ▼
[Klik tugas yang ingin dikerjakan]
       │
       ▼
[Halaman Detail Tugas]
├── Judul, Instruksi, Deadline
├── Lampiran guru (download)
├── Status: "Belum Dikerjakan"
└── Form Submit
       │
       ▼
[Upload File Jawaban]
├── Pilih file dari device
├── Catatan (opsional)
       │
       ▼
[Klik "Kirim"] ──── Setelah deadline? ──▶ [Submit dengan status "Terlambat"]
       │
       │ Sebelum deadline
       ▼
[Submission Terkirim]
├── Status: "Sudah Dikerjakan" ✅
├── Waktu submit tercatat
└── Opsi: "Kirim Ulang" (sebelum deadline)
       │
       ▼
[Menunggu Penilaian Guru]
       │
       ▼
[Guru Menilai] ──▶ [Status: "Dinilai" - Nilai: 85/100]
       │
       ▼
[Murid melihat nilai dan feedback]
```

---

## 9. Flow: Guru Menilai Tugas

```
[Dashboard → "45 submission perlu dinilai"]
       │
       ▼
[Klik tugas yang ingin dinilai]
       │
       ▼
[Halaman Daftar Submission]
├── Filter: Semua / Belum Dinilai / Sudah Dinilai
├── Tabel: Nama Murid | Waktu Submit | Status | Aksi
       │
       ▼
[Klik "Nilai" pada submission]
       │
       ▼
[Halaman Detail Submission]
├── Info murid
├── File jawaban (preview/download)
├── Form Penilaian:
│   ├── Input: Nilai (0-100)
│   └── Input: Feedback (opsional)
       │
       ▼
[Klik "Simpan Nilai"]
       │
       ▼
[Nilai tersimpan]
├── Status submission: "Dinilai"
├── Murid melihat nilai di halaman tugas
└── Lanjut ke submission berikutnya
```

---

## 10. Flow: Quiz (Murid)

```
[Dashboard / Kelas → Quiz Tersedia]
       │
       ▼
[Klik quiz yang akan dikerjakan]
       │
       ▼
[Halaman Info Quiz]
├── Judul, Deskripsi
├── Jumlah Soal, Durasi
├── Periode: 09 Jul 2026, 08:00 - 10:00
└── Tombol "Mulai Quiz"
       │
       ▼
[Klik "Mulai Quiz"] ──── Belum waktunya? ──▶ [Tombol disabled]
       │                    Sudah lewat? ──▶ ["Quiz sudah berakhir"]
       │
       │ Dalam periode
       ▼
[Quiz Dimulai - Timer Berjalan]
├── Soal 1/10: [Pilihan Ganda]
│   ├── A. ...
│   ├── B. ...
│   ├── C. ...
│   └── D. ...
├── Navigation: ◀ Prev | Next ▶
└── Progress: ████████░░ 8/10
       │
       ▼
[Klik "Selesai"] ──── Konfirmasi? ──▶ [Modal: "Yakin selesai? X soal belum dijawab"]
       │                                      │
       │                                      ├── Klik "Kembali" ──▶ [Lanjut mengerjakan]
       │                                      └── Klik "Ya, Selesai" ──▼
       │ Timer habis (auto-submit)                                     │
       ▼◀──────────────────────────────────────────────────────────────┘
[Quiz Selesai]
       │
       ▼
[Halaman Hasil]
├── Skor: 85/100
├── Detail per soal (benar/salah)
└── Soal essay: "Menunggu penilaian guru"
```

---

## 11. Flow: Super Admin - Import Data

```
[Dashboard Admin]
       │
       ▼
[Sidebar → Data → Import Excel]
       │
       ▼
[Halaman Import]
├── Select: Tipe Data (Guru / Murid)
├── Link: "Download Template Excel"
├── Upload: File Excel (.xlsx)
       │
       ▼
[Upload file Excel]
       │
       ▼
[Klik "Import"] 
       │
       ▼
[Proses Import - Loading]
├── Validasi setiap baris
├── Progress indicator
       │
       ▼
[Hasil Import]
├── ✅ Berhasil: 45 data
├── ❌ Gagal: 3 data
│   ├── Baris 12: Email sudah terdaftar
│   ├── Baris 25: Format email invalid
│   └── Baris 38: Nama kosong
└── Tombol: "Download Error Report"
```

---

## 12. Flow: Super Admin - Backup & Restore

```
[Sidebar → Data → Backup & Restore]
       │
       ▼
[Halaman Backup]
├── Tombol: "Backup Sekarang"
├── Tabel Histori Backup:
│   ├── Tanggal | Ukuran | Status | Aksi
│   ├── 09 Jul 2026 00:00 | 15 MB | ✅ Berhasil | Download / Restore / Hapus
│   └── 08 Jul 2026 00:00 | 14 MB | ✅ Berhasil | Download / Restore / Hapus
       │
       ├── [Klik "Backup Sekarang"]
       │   ▼
       │   [Proses backup...] ──▶ [Berhasil! File tersimpan]
       │
       └── [Klik "Restore"]
           ▼
           [Konfirmasi: "Restore akan menimpa data saat ini. Lanjutkan?"]
           ├── Batal ──▶ [Kembali]
           └── Ya ──▶ [Proses restore...] ──▶ [Berhasil! Data telah dipulihkan]
```

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [12_SITEMAP.md](./12_SITEMAP.md)*


<!-- ============================================== -->
# SOURCE FILE: 12_SITEMAP.md
<!-- ============================================== -->


# 12 — Sitemap

> **Dokumen Terkait:** [10_INFORMATION_ARCHITECTURE.md](./10_INFORMATION_ARCHITECTURE.md) · [11_USER_FLOW.md](./11_USER_FLOW.md) · [07_FEATURE_LIST.md](./07_FEATURE_LIST.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **peta situs (sitemap)** DIKELAS — daftar lengkap semua halaman, URL route, dan hierarki navigasi. Sitemap menjadi acuan untuk Frontend Developer dan QA Engineer dalam membangun dan menguji seluruh halaman aplikasi.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Navigasi** | Mendefinisikan struktur navigasi dan hierarki halaman |
| **Routing** | Menjadi acuan untuk mendefinisikan Laravel routes |
| **QA** | Checklist halaman yang harus diuji |
| **SEO** | Memastikan struktur URL yang konsisten dan bermakna |

---

## 3. Ruang Lingkup

Sitemap mencakup seluruh halaman yang tersedia di DIKELAS untuk setiap role pengguna: **Murid**, **Guru**, dan **Super Admin**, beserta halaman publik (guest).

---

## 4. Halaman Publik (Guest)

```
/
├── / ................................. Landing Page
├── /login ........................... Halaman Login
├── /register ........................ Halaman Registrasi Murid
├── /forgot-password ................. Lupa Password
└── /reset-password/{token} .......... Reset Password
```

| Route | Method | Halaman | Middleware |
|---|---|---|---|
| `/` | GET | Landing Page | `guest` |
| `/login` | GET, POST | Login | `guest` |
| `/register` | GET, POST | Register Murid | `guest` |
| `/forgot-password` | GET, POST | Lupa Password | `guest` |
| `/reset-password/{token}` | GET, POST | Reset Password | `guest` |
| `/logout` | POST | Logout | `auth` |

---

## 5. Halaman Murid (Student)

```
/student
├── /student/dashboard ........................ Dashboard Murid
├── /student/classrooms ....................... Daftar Kelas
│   ├── /student/classrooms/join .............. Gabung Kelas
│   └── /student/classrooms/{id} .............. Detail Kelas
│       ├── /student/classrooms/{id}/stream ... Stream Kelas
│       ├── /student/classrooms/{id}/materials  Materi Kelas
│       ├── /student/classrooms/{id}/members .. Anggota Kelas
│       └── /student/classrooms/{id}/discussions Forum Diskusi
├── /student/assignments ...................... Daftar Tugas
│   └── /student/assignments/{id} ............. Detail & Submit Tugas
├── /student/quizzes .......................... Daftar Quiz
│   ├── /student/quizzes/{id} ................. Info Quiz
│   ├── /student/quizzes/{id}/attempt ......... Kerjakan Quiz
│   └── /student/quizzes/{id}/result .......... Hasil Quiz
├── /student/grades ........................... Rekap Nilai
├── /student/calendar ......................... Kalender
├── /student/announcements .................... Pengumuman
├── /student/discussions ...................... Diskusi (Semua Kelas)
└── /student/profile .......................... Profil
    └── /student/profile/edit ................. Edit Profil
```

| Route | Method | Halaman | Controller |
|---|---|---|---|
| `/student/dashboard` | GET | Dashboard | `StudentDashboardController` |
| `/student/classrooms` | GET | Daftar Kelas | `StudentClassroomController` |
| `/student/classrooms/join` | GET, POST | Gabung Kelas | `StudentClassroomController` |
| `/student/classrooms/{id}` | GET | Detail Kelas | `StudentClassroomController` |
| `/student/assignments` | GET | Daftar Tugas | `StudentAssignmentController` |
| `/student/assignments/{id}` | GET | Detail Tugas | `StudentAssignmentController` |
| `/student/assignments/{id}/submit` | POST | Submit Tugas | `StudentSubmissionController` |
| `/student/quizzes` | GET | Daftar Quiz | `StudentQuizController` |
| `/student/quizzes/{id}` | GET | Info Quiz | `StudentQuizController` |
| `/student/quizzes/{id}/attempt` | GET, POST | Kerjakan Quiz | `StudentQuizAttemptController` |
| `/student/quizzes/{id}/result` | GET | Hasil Quiz | `StudentQuizController` |
| `/student/grades` | GET | Rekap Nilai | `StudentGradeController` |
| `/student/calendar` | GET | Kalender | `StudentCalendarController` |
| `/student/announcements` | GET | Pengumuman | `StudentAnnouncementController` |
| `/student/profile` | GET | Profil | `ProfileController` |
| `/student/profile/edit` | GET, PUT | Edit Profil | `ProfileController` |

---

## 6. Halaman Guru (Teacher)

```
/teacher
├── /teacher/dashboard ........................ Dashboard Guru
├── /teacher/classrooms ....................... Daftar Kelas
│   ├── /teacher/classrooms/create ............ Buat Kelas
│   └── /teacher/classrooms/{id} .............. Detail Kelas
│       ├── /teacher/classrooms/{id}/edit ..... Edit Kelas
│       ├── /teacher/classrooms/{id}/stream ... Stream
│       ├── /teacher/classrooms/{id}/members .. Anggota
│       ├── /teacher/classrooms/{id}/materials  Materi
│       │   ├── .../materials/create .......... Tambah Materi
│       │   └── .../materials/{mid}/edit ...... Edit Materi
│       ├── /teacher/classrooms/{id}/assignments Tugas
│       │   ├── .../assignments/create ........ Buat Tugas
│       │   ├── .../assignments/{aid}/edit .... Edit Tugas
│       │   └── .../assignments/{aid}/submissions Daftar Submission
│       │       └── .../submissions/{sid}/grade Nilai Submission
│       ├── /teacher/classrooms/{id}/quizzes .. Quiz
│       │   ├── .../quizzes/create ............ Buat Quiz
│       │   ├── .../quizzes/{qid}/edit ........ Edit Quiz
│       │   └── .../quizzes/{qid}/results ..... Hasil Quiz
│       ├── /teacher/classrooms/{id}/grades ... Rekap Nilai
│       ├── /teacher/classrooms/{id}/announcements Pengumuman
│       └── /teacher/classrooms/{id}/discussions  Diskusi
├── /teacher/calendar ......................... Kalender
├── /teacher/announcements .................... Pengumuman (Semua)
└── /teacher/profile .......................... Profil
    └── /teacher/profile/edit ................. Edit Profil
```

---

## 7. Halaman Super Admin

```
/admin
├── /admin/dashboard .......................... Dashboard Admin
├── /admin/users .............................. Manajemen User
│   ├── /admin/users/teachers ................. Daftar Guru
│   │   ├── /admin/users/teachers/create ...... Tambah Guru
│   │   └── /admin/users/teachers/{id}/edit ... Edit Guru
│   └── /admin/users/students ................. Daftar Murid
│       ├── /admin/users/students/create ...... Tambah Murid
│       └── /admin/users/students/{id}/edit ... Edit Murid
├── /admin/classrooms ......................... Semua Kelas
├── /admin/subjects ........................... Mata Pelajaran
│   ├── /admin/subjects/create ................ Tambah Mapel
│   └── /admin/subjects/{id}/edit ............. Edit Mapel
├── /admin/academic ........................... Akademik
│   ├── /admin/academic/years ................. Tahun Ajaran
│   │   ├── /admin/academic/years/create ...... Tambah Tahun Ajaran
│   │   └── /admin/academic/years/{id}/edit ... Edit Tahun Ajaran
│   └── /admin/academic/semesters ............. Semester
│       ├── /admin/academic/semesters/create .. Tambah Semester
│       └── /admin/academic/semesters/{id}/edit Edit Semester
├── /admin/reports ............................ Laporan
│   ├── /admin/reports/activity-log ........... Activity Log
│   └── /admin/reports/statistics ............. Statistik
├── /admin/data ............................... Data
│   ├── /admin/data/backup .................... Backup & Restore
│   ├── /admin/data/import .................... Import Excel
│   └── /admin/data/export .................... Export Excel
├── /admin/access ............................. Akses
│   ├── /admin/access/roles ................... Role
│   └── /admin/access/permissions ............. Permission
├── /admin/settings ........................... Pengaturan
└── /admin/profile ............................ Profil
    └── /admin/profile/edit ................... Edit Profil
```

---

## 8. Breadcrumb Structure

| Halaman | Breadcrumb |
|---|---|
| Dashboard | Home |
| Daftar Kelas | Home > Kelas Saya |
| Detail Kelas | Home > Kelas Saya > XI IPA 1 - Matematika |
| Materi Kelas | Home > Kelas Saya > XI IPA 1 > Materi |
| Detail Tugas | Home > Kelas Saya > XI IPA 1 > Tugas > Latihan Integral |
| Kerjakan Quiz | Home > Kelas Saya > XI IPA 1 > Quiz > Ulangan Harian |
| Rekap Nilai | Home > Nilai |
| Admin: Guru | Home > Manajemen User > Guru |
| Admin: Backup | Home > Data > Backup & Restore |

---

## 9. Halaman Error

| Route | Status | Halaman |
|---|---|---|
| `*` (not found) | 404 | Halaman Tidak Ditemukan |
| — (server error) | 500 | Terjadi Kesalahan |
| — (unauthorized) | 403 | Akses Ditolak |
| — (maintenance) | 503 | Sedang Pemeliharaan |

---

## 10. Statistik Sitemap

| Role | Jumlah Halaman |
|---|---|
| Guest (Public) | 5 |
| Murid | 16 |
| Guru | 25+ |
| Super Admin | 22+ |
| Error Pages | 4 |
| **Total Unik** | **~70** |

---

## 11. Checklist

- [x] Halaman publik (guest) terdefinisi
- [x] Halaman murid terdefinisi dengan route
- [x] Halaman guru terdefinisi dengan route
- [x] Halaman super admin terdefinisi dengan route
- [x] Breadcrumb structure terdefinisi
- [x] Error pages terdefinisi
- [x] Controller mapping tersedia
- [x] Statistik halaman tersedia

---

## 12. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-SM-001 | Setiap halaman memiliki URL route yang unik dan bermakna | ✅ |
| AC-SM-002 | Route dikelompokkan berdasarkan role dengan prefix | ✅ |
| AC-SM-003 | Breadcrumb terdefinisi untuk setiap halaman | ✅ |
| AC-SM-004 | Error pages tersedia untuk 403, 404, 500, 503 | ✅ |
| AC-SM-005 | Sitemap konsisten dengan Information Architecture | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [13_DATABASE_REQUIREMENTS.md](./13_DATABASE_REQUIREMENTS.md)*


<!-- ============================================== -->
# SOURCE FILE: 13_DATABASE_REQUIREMENTS.md
<!-- ============================================== -->


# 13 — Database Requirements

> **Dokumen Terkait:** [08_FUNCTIONAL_REQUIREMENTS.md](./08_FUNCTIONAL_REQUIREMENTS.md) · [09_ERD.md](./09_ERD.md) · [21_LARAVEL_ARCHITECTURE.md](./21_LARAVEL_ARCHITECTURE.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **kebutuhan database** DIKELAS secara menyeluruh — mulai dari skema tabel, relasi, indeks, hingga konvensi penamaan. Database menggunakan **MySQL 8.0** dengan encoding **utf8mb4** untuk mendukung karakter Unicode termasuk emoji.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Referensi** | Panduan utama untuk Database Architect dan Backend Engineer |
| **Konsistensi** | Memastikan konvensi penamaan dan struktur yang seragam |
| **Migration** | Acuan untuk membuat Laravel migration files |
| **Optimasi** | Mendefinisikan indeks dan constraint untuk performa optimal |

---

## 3. Ruang Lingkup

Dokumen ini mencakup seluruh tabel yang dibutuhkan untuk MVP DIKELAS beserta kolom, tipe data, relasi, dan indeks.

---

## 4. Konvensi Database

### 4.1 Penamaan

| Aspek | Konvensi | Contoh |
|---|---|---|
| **Nama Tabel** | snake_case, plural | `users`, `classrooms`, `assignments` |
| **Nama Kolom** | snake_case, singular | `first_name`, `created_at` |
| **Primary Key** | `id` (BIGINT UNSIGNED AUTO_INCREMENT) | `id` |
| **Foreign Key** | `{table_singular}_id` | `user_id`, `classroom_id` |
| **Pivot Table** | alphabetical order, singular | `classroom_student` |
| **Timestamps** | `created_at`, `updated_at` | — |
| **Soft Delete** | `deleted_at` | — |
| **Boolean** | `is_` prefix | `is_active`, `is_published` |
| **Date** | `_at` suffix atau `_date` | `deadline_at`, `start_date` |

### 4.2 Tipe Data Standar

| Jenis Data | MySQL Type | Laravel Migration |
|---|---|---|
| ID | BIGINT UNSIGNED | `$table->id()` |
| Foreign Key | BIGINT UNSIGNED | `$table->foreignId('x_id')` |
| Nama / Judul | VARCHAR(255) | `$table->string('name')` |
| Deskripsi Pendek | VARCHAR(500) | `$table->string('desc', 500)` |
| Konten Panjang | TEXT | `$table->text('content')` |
| Rich Content | LONGTEXT | `$table->longText('body')` |
| Email | VARCHAR(255) | `$table->string('email')` |
| Password | VARCHAR(255) | `$table->string('password')` |
| Integer | INT | `$table->integer('score')` |
| Decimal | DECIMAL(8,2) | `$table->decimal('grade', 8, 2)` |
| Boolean | TINYINT(1) | `$table->boolean('is_active')` |
| Enum | ENUM | `$table->enum('status', [...])` |
| Date | DATE | `$table->date('start_date')` |
| Datetime | TIMESTAMP | `$table->timestamp('deadline_at')` |
| File Path | VARCHAR(500) | `$table->string('file_path', 500)` |
| JSON | JSON | `$table->json('metadata')` |

---

## 5. Daftar Tabel

### 5.1 Ringkasan Tabel

| No | Tabel | Deskripsi | Relasi Utama |
|---|---|---|---|
| 1 | `users` | Data pengguna (murid, guru, admin) | roles |
| 2 | `roles` | Definisi role | users |
| 3 | `permissions` | Definisi permission | roles (pivot) |
| 4 | `role_permission` | Pivot role-permission | roles, permissions |
| 5 | `academic_years` | Tahun ajaran | semesters |
| 6 | `semesters` | Semester | academic_years, classrooms |
| 7 | `subjects` | Mata pelajaran | classrooms |
| 8 | `classrooms` | Kelas | users, subjects, semesters |
| 9 | `classroom_student` | Pivot kelas-murid | classrooms, users |
| 10 | `topics` | Topik/Bab materi | classrooms |
| 11 | `materials` | Materi pembelajaran | classrooms, topics |
| 12 | `assignments` | Tugas | classrooms |
| 13 | `assignment_attachments` | Lampiran tugas | assignments |
| 14 | `submissions` | Jawaban tugas murid | assignments, users |
| 15 | `quizzes` | Quiz | classrooms |
| 16 | `questions` | Soal quiz | quizzes |
| 17 | `question_options` | Opsi jawaban PG | questions |
| 18 | `quiz_attempts` | Percobaan quiz murid | quizzes, users |
| 19 | `quiz_answers` | Jawaban per soal | quiz_attempts, questions |
| 20 | `grades` | Nilai | users, classrooms |
| 21 | `announcements` | Pengumuman | classrooms, users |
| 22 | `discussions` | Post diskusi | classrooms, users |
| 23 | `discussion_replies` | Balasan diskusi | discussions, users |
| 24 | `notifications` | Notifikasi | users |
| 25 | `activity_logs` | Log aktivitas | users |
| 26 | `backups` | Histori backup | — |
| 27 | `settings` | Pengaturan sistem | — |

---

## 6. Detail Skema Tabel

### 6.1 `users`

```sql
CREATE TABLE users (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    role_id         BIGINT UNSIGNED NOT NULL,
    name            VARCHAR(255) NOT NULL,
    email           VARCHAR(255) NOT NULL UNIQUE,
    email_verified_at TIMESTAMP NULL,
    password        VARCHAR(255) NOT NULL,
    avatar          VARCHAR(500) NULL,
    bio             TEXT NULL,
    nis             VARCHAR(50) NULL,              -- Nomor Induk Siswa
    nip             VARCHAR(50) NULL,              -- Nomor Induk Pegawai
    phone           VARCHAR(20) NULL,
    is_active       TINYINT(1) DEFAULT 1,
    last_login_at   TIMESTAMP NULL,
    remember_token  VARCHAR(100) NULL,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (role_id) REFERENCES roles(id),
    INDEX idx_users_role (role_id),
    INDEX idx_users_email (email),
    INDEX idx_users_nis (nis),
    INDEX idx_users_nip (nip)
);
```

### 6.2 `roles`

```sql
CREATE TABLE roles (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name            VARCHAR(50) NOT NULL UNIQUE,
    display_name    VARCHAR(100) NOT NULL,
    description     TEXT NULL,
    level           TINYINT UNSIGNED DEFAULT 1,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL
);
```

### 6.3 `permissions` & `role_permission`

```sql
CREATE TABLE permissions (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name            VARCHAR(100) NOT NULL UNIQUE,
    display_name    VARCHAR(200) NOT NULL,
    module          VARCHAR(50) NOT NULL,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    INDEX idx_permissions_module (module)
);

CREATE TABLE role_permission (
    role_id         BIGINT UNSIGNED NOT NULL,
    permission_id   BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (role_id, permission_id),
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE,
    FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE
);
```

### 6.4 `academic_years`

```sql
CREATE TABLE academic_years (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name            VARCHAR(20) NOT NULL,          -- '2026/2027'
    start_date      DATE NOT NULL,
    end_date        DATE NOT NULL,
    is_active       TINYINT(1) DEFAULT 0,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL
);
```

### 6.5 `semesters`

```sql
CREATE TABLE semesters (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    academic_year_id BIGINT UNSIGNED NOT NULL,
    name            VARCHAR(50) NOT NULL,          -- 'Ganjil', 'Genap'
    type            ENUM('odd', 'even') NOT NULL,
    start_date      DATE NOT NULL,
    end_date        DATE NOT NULL,
    is_active       TINYINT(1) DEFAULT 0,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (academic_year_id) REFERENCES academic_years(id),
    INDEX idx_semesters_active (is_active)
);
```

### 6.6 `subjects`

```sql
CREATE TABLE subjects (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name            VARCHAR(100) NOT NULL,
    code            VARCHAR(20) NULL UNIQUE,
    description     TEXT NULL,
    is_active       TINYINT(1) DEFAULT 1,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL
);
```

### 6.7 `classrooms` & `classroom_student`

```sql
CREATE TABLE classrooms (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    teacher_id      BIGINT UNSIGNED NOT NULL,
    subject_id      BIGINT UNSIGNED NOT NULL,
    semester_id     BIGINT UNSIGNED NOT NULL,
    name            VARCHAR(100) NOT NULL,
    description     TEXT NULL,
    code            VARCHAR(6) NOT NULL UNIQUE,
    cover_image     VARCHAR(500) NULL,
    is_active       TINYINT(1) DEFAULT 1,
    is_archived     TINYINT(1) DEFAULT 0,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (teacher_id) REFERENCES users(id),
    FOREIGN KEY (subject_id) REFERENCES subjects(id),
    FOREIGN KEY (semester_id) REFERENCES semesters(id),
    INDEX idx_classrooms_code (code),
    INDEX idx_classrooms_teacher (teacher_id),
    INDEX idx_classrooms_semester (semester_id)
);

CREATE TABLE classroom_student (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    classroom_id    BIGINT UNSIGNED NOT NULL,
    student_id      BIGINT UNSIGNED NOT NULL,
    joined_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (classroom_id) REFERENCES classrooms(id) ON DELETE CASCADE,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE KEY unique_classroom_student (classroom_id, student_id)
);
```

### 6.8 `topics` & `materials`

```sql
CREATE TABLE topics (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    classroom_id    BIGINT UNSIGNED NOT NULL,
    name            VARCHAR(200) NOT NULL,
    description     TEXT NULL,
    sort_order      INT UNSIGNED DEFAULT 0,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (classroom_id) REFERENCES classrooms(id) ON DELETE CASCADE
);

CREATE TABLE materials (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    classroom_id    BIGINT UNSIGNED NOT NULL,
    topic_id        BIGINT UNSIGNED NULL,
    title           VARCHAR(255) NOT NULL,
    description     TEXT NULL,
    file_path       VARCHAR(500) NOT NULL,
    file_name       VARCHAR(255) NOT NULL,
    file_type       VARCHAR(20) NOT NULL,          -- 'pdf', 'video', 'document', 'presentation'
    file_size       BIGINT UNSIGNED DEFAULT 0,     -- bytes
    mime_type       VARCHAR(100) NULL,
    sort_order      INT UNSIGNED DEFAULT 0,
    download_count  INT UNSIGNED DEFAULT 0,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (classroom_id) REFERENCES classrooms(id) ON DELETE CASCADE,
    FOREIGN KEY (topic_id) REFERENCES topics(id) ON DELETE SET NULL,
    INDEX idx_materials_classroom (classroom_id)
);
```

### 6.9 `assignments`, `assignment_attachments`, `submissions`

```sql
CREATE TABLE assignments (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    classroom_id    BIGINT UNSIGNED NOT NULL,
    title           VARCHAR(255) NOT NULL,
    description     LONGTEXT NULL,
    max_score       INT UNSIGNED DEFAULT 100,
    deadline_at     TIMESTAMP NOT NULL,
    is_published    TINYINT(1) DEFAULT 1,
    allow_late      TINYINT(1) DEFAULT 1,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (classroom_id) REFERENCES classrooms(id) ON DELETE CASCADE,
    INDEX idx_assignments_classroom (classroom_id),
    INDEX idx_assignments_deadline (deadline_at)
);

CREATE TABLE assignment_attachments (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    assignment_id   BIGINT UNSIGNED NOT NULL,
    file_path       VARCHAR(500) NOT NULL,
    file_name       VARCHAR(255) NOT NULL,
    file_size       BIGINT UNSIGNED DEFAULT 0,
    mime_type       VARCHAR(100) NULL,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (assignment_id) REFERENCES assignments(id) ON DELETE CASCADE
);

CREATE TABLE submissions (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    assignment_id   BIGINT UNSIGNED NOT NULL,
    student_id      BIGINT UNSIGNED NOT NULL,
    file_path       VARCHAR(500) NOT NULL,
    file_name       VARCHAR(255) NOT NULL,
    file_size       BIGINT UNSIGNED DEFAULT 0,
    note            TEXT NULL,
    status          ENUM('submitted', 'late', 'graded') DEFAULT 'submitted',
    score           DECIMAL(5,2) NULL,
    feedback        TEXT NULL,
    graded_at       TIMESTAMP NULL,
    submitted_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (assignment_id) REFERENCES assignments(id) ON DELETE CASCADE,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE KEY unique_submission (assignment_id, student_id),
    INDEX idx_submissions_status (status)
);
```

### 6.10 `quizzes`, `questions`, `question_options`

```sql
CREATE TABLE quizzes (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    classroom_id    BIGINT UNSIGNED NOT NULL,
    title           VARCHAR(255) NOT NULL,
    description     TEXT NULL,
    duration_minutes INT UNSIGNED NOT NULL,
    start_at        TIMESTAMP NOT NULL,
    end_at          TIMESTAMP NOT NULL,
    is_published    TINYINT(1) DEFAULT 0,
    is_randomized   TINYINT(1) DEFAULT 0,
    show_result     TINYINT(1) DEFAULT 1,
    max_score       INT UNSIGNED DEFAULT 100,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (classroom_id) REFERENCES classrooms(id) ON DELETE CASCADE,
    INDEX idx_quizzes_classroom (classroom_id),
    INDEX idx_quizzes_schedule (start_at, end_at)
);

CREATE TABLE questions (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quiz_id         BIGINT UNSIGNED NOT NULL,
    type            ENUM('multiple_choice', 'true_false', 'essay') NOT NULL,
    content         LONGTEXT NOT NULL,
    answer_key      TEXT NULL,                      -- Kunci jawaban (PG: 'A', B/S: 'true')
    points          INT UNSIGNED DEFAULT 1,
    sort_order      INT UNSIGNED DEFAULT 0,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (quiz_id) REFERENCES quizzes(id) ON DELETE CASCADE,
    INDEX idx_questions_quiz (quiz_id)
);

CREATE TABLE question_options (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    question_id     BIGINT UNSIGNED NOT NULL,
    label           CHAR(1) NOT NULL,              -- 'A', 'B', 'C', 'D', 'E'
    content         TEXT NOT NULL,
    is_correct      TINYINT(1) DEFAULT 0,
    sort_order      INT UNSIGNED DEFAULT 0,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE
);
```

### 6.11 `quiz_attempts` & `quiz_answers`

```sql
CREATE TABLE quiz_attempts (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quiz_id         BIGINT UNSIGNED NOT NULL,
    student_id      BIGINT UNSIGNED NOT NULL,
    started_at      TIMESTAMP NOT NULL,
    finished_at     TIMESTAMP NULL,
    total_score     DECIMAL(5,2) NULL,
    status          ENUM('in_progress', 'completed', 'timed_out') DEFAULT 'in_progress',
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (quiz_id) REFERENCES quizzes(id) ON DELETE CASCADE,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE KEY unique_quiz_attempt (quiz_id, student_id)
);

CREATE TABLE quiz_answers (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    attempt_id      BIGINT UNSIGNED NOT NULL,
    question_id     BIGINT UNSIGNED NOT NULL,
    answer          TEXT NULL,
    is_correct      TINYINT(1) NULL,
    score           DECIMAL(5,2) NULL,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (attempt_id) REFERENCES quiz_attempts(id) ON DELETE CASCADE,
    FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE,
    UNIQUE KEY unique_quiz_answer (attempt_id, question_id)
);
```

### 6.12 `grades`

```sql
CREATE TABLE grades (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    student_id      BIGINT UNSIGNED NOT NULL,
    classroom_id    BIGINT UNSIGNED NOT NULL,
    gradable_type   VARCHAR(100) NOT NULL,         -- 'App\Models\Assignment', 'App\Models\Quiz'
    gradable_id     BIGINT UNSIGNED NOT NULL,
    score           DECIMAL(5,2) NOT NULL,
    max_score       DECIMAL(5,2) NOT NULL DEFAULT 100,
    notes           TEXT NULL,
    graded_by       BIGINT UNSIGNED NULL,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (student_id) REFERENCES users(id),
    FOREIGN KEY (classroom_id) REFERENCES classrooms(id),
    FOREIGN KEY (graded_by) REFERENCES users(id),
    INDEX idx_grades_student_class (student_id, classroom_id),
    INDEX idx_grades_gradable (gradable_type, gradable_id)
);
```

### 6.13 `announcements`

```sql
CREATE TABLE announcements (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id         BIGINT UNSIGNED NOT NULL,
    classroom_id    BIGINT UNSIGNED NULL,           -- NULL = global
    title           VARCHAR(255) NOT NULL,
    content         LONGTEXT NOT NULL,
    is_pinned       TINYINT(1) DEFAULT 0,
    published_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (classroom_id) REFERENCES classrooms(id) ON DELETE CASCADE,
    INDEX idx_announcements_classroom (classroom_id),
    INDEX idx_announcements_pinned (is_pinned)
);
```

### 6.14 `discussions` & `discussion_replies`

```sql
CREATE TABLE discussions (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    classroom_id    BIGINT UNSIGNED NOT NULL,
    user_id         BIGINT UNSIGNED NOT NULL,
    title           VARCHAR(255) NOT NULL,
    content         LONGTEXT NOT NULL,
    is_pinned       TINYINT(1) DEFAULT 0,
    replies_count   INT UNSIGNED DEFAULT 0,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (classroom_id) REFERENCES classrooms(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id),
    INDEX idx_discussions_classroom (classroom_id)
);

CREATE TABLE discussion_replies (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    discussion_id   BIGINT UNSIGNED NOT NULL,
    user_id         BIGINT UNSIGNED NOT NULL,
    content         TEXT NOT NULL,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (discussion_id) REFERENCES discussions(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
```

### 6.15 `notifications`

```sql
CREATE TABLE notifications (
    id              CHAR(36) PRIMARY KEY,           -- UUID
    type            VARCHAR(255) NOT NULL,
    notifiable_type VARCHAR(255) NOT NULL,
    notifiable_id   BIGINT UNSIGNED NOT NULL,
    data            JSON NOT NULL,
    read_at         TIMESTAMP NULL,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    INDEX idx_notifications_notifiable (notifiable_type, notifiable_id),
    INDEX idx_notifications_read (read_at)
);
```

### 6.16 `activity_logs`

```sql
CREATE TABLE activity_logs (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id         BIGINT UNSIGNED NULL,
    action          VARCHAR(100) NOT NULL,
    description     TEXT NULL,
    subject_type    VARCHAR(255) NULL,
    subject_id      BIGINT UNSIGNED NULL,
    properties      JSON NULL,
    ip_address      VARCHAR(45) NULL,
    user_agent      TEXT NULL,
    created_at      TIMESTAMP NULL,

    INDEX idx_activity_user (user_id),
    INDEX idx_activity_action (action),
    INDEX idx_activity_created (created_at),
    INDEX idx_activity_subject (subject_type, subject_id)
);
```

### 6.17 `backups`

```sql
CREATE TABLE backups (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name       VARCHAR(255) NOT NULL,
    file_path       VARCHAR(500) NOT NULL,
    file_size       BIGINT UNSIGNED DEFAULT 0,
    status          ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
    type            ENUM('manual', 'scheduled') DEFAULT 'manual',
    created_by      BIGINT UNSIGNED NULL,
    completed_at    TIMESTAMP NULL,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (created_by) REFERENCES users(id)
);
```

### 6.18 `settings`

```sql
CREATE TABLE settings (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `key`           VARCHAR(100) NOT NULL UNIQUE,
    value           LONGTEXT NULL,
    type            VARCHAR(20) DEFAULT 'string',  -- 'string', 'boolean', 'integer', 'json'
    group           VARCHAR(50) DEFAULT 'general',
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    INDEX idx_settings_group (`group`)
);
```

---

## 7. Strategi Indexing

| Tabel | Kolom Index | Tipe | Alasan |
|---|---|---|---|
| `users` | `email` | UNIQUE | Login lookup |
| `users` | `role_id` | INDEX | Filter by role |
| `classrooms` | `code` | UNIQUE | Join kelas lookup |
| `classrooms` | `teacher_id` | INDEX | Filter kelas per guru |
| `classrooms` | `semester_id` | INDEX | Filter per semester |
| `submissions` | `(assignment_id, student_id)` | UNIQUE | Satu submission per murid |
| `quiz_attempts` | `(quiz_id, student_id)` | UNIQUE | Satu attempt per murid |
| `grades` | `(student_id, classroom_id)` | INDEX | Rekap nilai per murid |
| `activity_logs` | `created_at` | INDEX | Query log by time |
| `announcements` | `is_pinned` | INDEX | Filter pinned first |

---

## 8. Seeder Data

| Tabel | Seeder | Data |
|---|---|---|
| `roles` | `RoleSeeder` | student, teacher, super_admin |
| `users` | `UserSeeder` | 1 super admin default |
| `subjects` | `SubjectSeeder` | Mata pelajaran SMA (Matematika, Fisika, dll) |
| `settings` | `SettingSeeder` | Pengaturan default (nama sekolah, dll) |
| `permissions` | `PermissionSeeder` | Semua permission per modul |
| `role_permission` | `RolePermissionSeeder` | Default permission per role |

---

## 9. Checklist

- [x] Konvensi penamaan terdefinisi
- [x] Semua tabel MVP terdefinisi (27 tabel)
- [x] Kolom dengan tipe data terspesifikasi
- [x] Foreign key constraint terdefinisi
- [x] Index strategy terdefinisi
- [x] Seeder data terdefinisi
- [x] Soft delete diterapkan pada tabel utama
- [x] Timestamps pada semua tabel

---

## 10. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-DB-001 | Semua tabel memiliki primary key `id` BIGINT UNSIGNED | ✅ |
| AC-DB-002 | Foreign key constraint terdefinisi untuk setiap relasi | ✅ |
| AC-DB-003 | Index terdefinisi untuk kolom yang sering di-query | ✅ |
| AC-DB-004 | Tabel utama menggunakan SoftDeletes | ✅ |
| AC-DB-005 | Semua tabel memiliki timestamps | ✅ |
| AC-DB-006 | Konvensi penamaan konsisten (snake_case) | ✅ |
| AC-DB-007 | Encoding menggunakan utf8mb4 | ✅ |
| AC-DB-008 | Seeder data untuk role dan settings terdefinisi | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [14_SECURITY_REQUIREMENTS.md](./14_SECURITY_REQUIREMENTS.md)*


<!-- ============================================== -->
# SOURCE FILE: 14_SECURITY_REQUIREMENTS.md
<!-- ============================================== -->


# 14 — Security Requirements

> **Dokumen Terkait:** [09_NON_FUNCTIONAL_REQUIREMENTS.md](./09_NON_FUNCTIONAL_REQUIREMENTS.md) · [19_PERMISSION_MATRIX.md](./19_PERMISSION_MATRIX.md) · [06_USER_ROLES.md](./06_USER_ROLES.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **kebutuhan keamanan** DIKELAS secara komprehensif. Keamanan data pendidikan merupakan prioritas utama karena menyangkut data pribadi guru dan murid. Dokumen mencakup autentikasi, otorisasi, perlindungan data, validasi input, dan audit trail.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Proteksi Data** | Melindungi data pribadi guru dan murid dari akses tidak sah |
| **Compliance** | Mematuhi UU Perlindungan Data Pribadi (UU PDP) Indonesia |
| **Integritas** | Memastikan data tidak bisa dimanipulasi tanpa otorisasi |
| **Audit** | Menyediakan audit trail untuk setiap aksi sensitif |

---

## 3. Ruang Lingkup

Dokumen ini mencakup aspek keamanan berikut:
- Autentikasi & Manajemen Sesi
- Otorisasi & Akses Kontrol
- Perlindungan Data (at rest & in transit)
- Validasi Input & Output
- Keamanan File Upload
- Audit Trail & Logging
- Konfigurasi Server

---

## 4. Autentikasi

### 4.1 Mekanisme Autentikasi

| Aspek | Implementasi |
|---|---|
| **Framework** | Laravel Breeze + Laravel Sanctum |
| **Hashing** | bcrypt (cost factor: 12) |
| **Session Driver** | Database (`sessions` table) |
| **Session Lifetime** | 120 menit (2 jam) |
| **Remember Me** | Token-based, 30 hari |
| **CSRF Protection** | Token per session, auto-included di Blade |

### 4.2 Password Policy

| Rule | Requirement |
|---|---|
| Panjang minimum | 8 karakter |
| Panjang maksimum | 255 karakter |
| Konfirmasi | Password harus dikonfirmasi (confirmed) |
| Hashing | bcrypt (tidak pernah plain-text) |
| Reset | Via email token, valid 60 menit, single-use |

### 4.3 Rate Limiting

| Context | Limit | Window | Action |
|---|---|---|---|
| Login attempts | 5 percobaan | 1 menit | Throttle (429 Too Many Requests) |
| Password reset | 3 request | 1 menit | Throttle |
| API requests | 60 request | 1 menit | Throttle |
| File upload | 10 upload | 1 menit | Throttle |

### 4.4 Session Security

```php
// config/session.php
'driver' => 'database',
'lifetime' => 120,
'expire_on_close' => false,
'encrypt' => false,
'cookie' => 'dikelas_session',
'http_only' => true,
'secure' => true,         // HTTPS only
'same_site' => 'lax',
```

---

## 5. Otorisasi

### 5.1 Model Otorisasi

```
Role-Based Access Control (RBAC)
├── Setiap user memiliki 1 role
├── Setiap role memiliki banyak permissions
├── Middleware mengecek role dan permission
└── Policy mengecek kepemilikan resource
```

### 5.2 Middleware Stack

| Middleware | Fungsi | Contoh |
|---|---|---|
| `auth` | User harus login | Semua halaman non-publik |
| `role:{name}` | User harus memiliki role tertentu | `role:teacher` |
| `permission:{name}` | User harus memiliki permission | `permission:create-class` |
| `verified` | Email harus terverifikasi | Aksi sensitif |
| `throttle` | Rate limiting | Login, API |

### 5.3 Laravel Policy

| Resource | Policy | Rules |
|---|---|---|
| Classroom | ClassroomPolicy | Hanya guru pemilik yang bisa edit/delete |
| Assignment | AssignmentPolicy | Hanya guru pemilik kelas yang bisa CRUD |
| Submission | SubmissionPolicy | Murid hanya bisa edit submission sendiri |
| Quiz | QuizPolicy | Hanya guru pemilik kelas yang bisa CRUD |
| Material | MaterialPolicy | Hanya guru pemilik kelas yang bisa CRUD |
| User | UserPolicy | Hanya Super Admin yang bisa CRUD user |

---

## 6. Perlindungan Data

### 6.1 Data in Transit

| Aspek | Implementasi |
|---|---|
| **HTTPS** | Wajib di production (TLS 1.2+) |
| **Force HTTPS** | Middleware `\App\Http\Middleware\ForceHttps` |
| **HSTS** | Strict-Transport-Security header |
| **Secure Cookies** | `secure => true` di session config |

### 6.2 Data at Rest

| Data | Proteksi |
|---|---|
| Password | bcrypt hashing (cost: 12) |
| Session | Encrypted session cookie |
| Backup files | Stored di non-public directory |
| Upload files | Stored di `storage/app/private/` |
| Environment variables | `.env` file (not in version control) |

### 6.3 Data Sensitif

| Tipe Data | Klasifikasi | Proteksi |
|---|---|---|
| Password | 🔴 Kritis | Hashing, never exposed |
| Email | 🟡 Pribadi | Input validation, unique |
| NIS/NIP | 🟡 Pribadi | Access control |
| Nilai akademik | 🟡 Pribadi | Access control per student |
| Backup database | 🔴 Kritis | Akses Super Admin only |
| Activity logs | 🟡 Sensitif | Immutable, admin only |

---

## 7. Validasi Input

### 7.1 Prinsip Validasi

| Prinsip | Deskripsi |
|---|---|
| **Server-side wajib** | Semua input HARUS divalidasi di server |
| **Client-side opsional** | Validasi JavaScript untuk UX, bukan keamanan |
| **Whitelist approach** | Hanya terima input yang valid, tolak sisanya |
| **Sanitize output** | Blade auto-escaping `{{ }}` untuk semua output |

### 7.2 Validasi per Tipe Input

| Tipe Input | Validasi |
|---|---|
| **Email** | `required|email|max:255|unique:users` |
| **Password** | `required|min:8|confirmed` |
| **Nama** | `required|string|max:255` |
| **Deskripsi** | `nullable|string|max:5000` |
| **Nilai** | `required|numeric|min:0|max:100` |
| **Kode Kelas** | `required|string|size:6|alpha_num|exists:classrooms,code` |
| **File Upload** | `required|file|mimes:pdf,doc,docx,ppt,pptx,mp4|max:51200` |
| **Tanggal** | `required|date|after:now` |

### 7.3 Proteksi Terhadap Serangan

| Serangan | Proteksi | Implementasi |
|---|---|---|
| **SQL Injection** | Parameterized queries | Eloquent ORM (default) |
| **XSS** | Output escaping | Blade `{{ }}` (auto-escape) |
| **CSRF** | Token validation | `@csrf` directive di semua form |
| **Mass Assignment** | `$fillable` / `$guarded` | Eloquent Model properties |
| **Path Traversal** | Filename sanitization | `Str::slug()` untuk file names |
| **IDOR** | Policy authorization | `$this->authorize()` di controller |

---

## 8. Keamanan File Upload

### 8.1 Aturan Upload

| Aspek | Rule |
|---|---|
| **Ukuran Maksimal** | 50MB per file |
| **Format Diizinkan** | PDF, DOC, DOCX, PPT, PPTX, MP4, MOV, AVI, JPG, PNG |
| **MIME Validation** | Server-side MIME type checking |
| **Nama File** | Sanitize dan rename (UUID + extension) |
| **Storage Path** | `storage/app/private/{type}/{classroom_id}/` |
| **Direct Access** | Tidak bisa diakses langsung via URL |
| **Download** | Melalui controller dengan authorization check |

### 8.2 File Storage Structure

```
storage/app/private/
├── avatars/
│   └── {user_id}/avatar.{ext}
├── materials/
│   └── {classroom_id}/{uuid}.{ext}
├── assignments/
│   ├── attachments/{assignment_id}/{uuid}.{ext}
│   └── submissions/{assignment_id}/{student_id}/{uuid}.{ext}
└── backups/
    └── {filename}.sql.gz
```

---

## 9. Audit Trail

### 9.1 Aksi yang Di-log

| Kategori | Aksi |
|---|---|
| **Auth** | Login, Logout, Failed Login, Password Reset |
| **User CRUD** | Create, Update, Delete user |
| **Classroom** | Create, Update, Archive, Delete kelas |
| **Assignment** | Create, Update, Delete tugas |
| **Grading** | Input nilai, Update nilai |
| **Quiz** | Create, Update, Delete quiz |
| **Admin** | Backup, Restore, Import, Export, Settings change |
| **File** | Upload, Download, Delete file |

### 9.2 Data yang Dicatat

| Field | Deskripsi |
|---|---|
| `user_id` | ID user yang melakukan aksi |
| `action` | Nama aksi (e.g., `user.login`, `assignment.create`) |
| `subject_type` | Model class yang terpengaruh |
| `subject_id` | ID record yang terpengaruh |
| `properties` | JSON data (old values, new values) |
| `ip_address` | IP address user |
| `user_agent` | Browser/device info |
| `created_at` | Timestamp aksi |

### 9.3 Retensi Log

| Tipe | Retensi | Aksi Setelah Expired |
|---|---|---|
| Activity Log | 90 hari | Archive atau delete (configurable) |
| Auth Log | 180 hari | Archive |
| Error Log | 30 hari | Delete (rotate) |
| Backup Log | Permanent | Tidak dihapus |

---

## 10. Konfigurasi Server

### 10.1 Headers Keamanan

```
X-Content-Type-Options: nosniff
X-Frame-Options: SAMEORIGIN
X-XSS-Protection: 1; mode=block
Referrer-Policy: strict-origin-when-cross-origin
Content-Security-Policy: default-src 'self'
Strict-Transport-Security: max-age=31536000; includeSubDomains
```

### 10.2 Environment Security

| Item | Rule |
|---|---|
| `.env` file | TIDAK boleh di-commit ke version control |
| `APP_DEBUG` | `false` di production |
| `APP_KEY` | Generate unik per instalasi |
| Database credentials | Hanya di `.env`, tidak hardcode |
| `storage/` | Permission 775 (owner writable) |
| `public/` | Permission 755 (read only) |

---

## 11. Security Checklist

- [x] Password hashing dengan bcrypt
- [x] CSRF protection di semua form
- [x] XSS prevention (Blade auto-escaping)
- [x] SQL Injection prevention (Eloquent ORM)
- [x] Rate limiting untuk login dan API
- [x] Role-based access control (RBAC)
- [x] Policy-based authorization per resource
- [x] File upload validation (MIME, size, extension)
- [x] Secure file storage (non-public directory)
- [x] HTTPS enforcement di production
- [x] Security headers configured
- [x] Audit trail untuk aksi sensitif
- [x] Session security (httpOnly, secure, sameSite)
- [x] `.env` excluded dari version control
- [x] APP_DEBUG = false di production

---

## 12. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-SEC-001 | Password di-hash dengan bcrypt, tidak pernah plain-text | ✅ |
| AC-SEC-002 | CSRF token hadir di setiap form POST | ✅ |
| AC-SEC-003 | Semua output di-escape oleh Blade | ✅ |
| AC-SEC-004 | Rate limiting aktif untuk login (5x/menit) | ✅ |
| AC-SEC-005 | File upload hanya menerima format yang diizinkan | ✅ |
| AC-SEC-006 | File tersimpan di non-public directory | ✅ |
| AC-SEC-007 | Audit log mencatat semua aksi sensitif | ✅ |
| AC-SEC-008 | Policy mencegah akses resource milik user lain | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [15_NOTIFICATION_SYSTEM.md](./15_NOTIFICATION_SYSTEM.md)*


<!-- ============================================== -->
# SOURCE FILE: 15_NOTIFICATION_SYSTEM.md
<!-- ============================================== -->


# 15 — Notification System

> **Dokumen Terkait:** [07_FEATURE_LIST.md](./07_FEATURE_LIST.md) · [16_ASSIGNMENT_SYSTEM.md](./16_ASSIGNMENT_SYSTEM.md) · [08_FUNCTIONAL_REQUIREMENTS.md](./08_FUNCTIONAL_REQUIREMENTS.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **sistem notifikasi** DIKELAS — mekanisme pemberitahuan aktivitas penting menggunakan **Laravel Notifications** dengan channel **In-App** (database) dan **Email** (SMTP).

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Engagement** | Meningkatkan engagement dengan pemberitahuan aktivitas terbaru |
| **Awareness** | Memastikan murid tidak melewatkan deadline |
| **Efisiensi** | Mengurangi kebutuhan guru mengingatkan murid manual |

---

## 3. Ruang Lingkup

| Channel | Implementasi | Prioritas |
|---|---|---|
| **In-App** | Laravel Notifications (database) | 🔴 P0 |
| **Email** | Laravel Mail via SMTP | 🟡 P1 |
| **Push** | — | ⚪ Future |

---

## 4. Tipe Notifikasi

| ID | Tipe | Trigger | Penerima | Channel |
|---|---|---|---|---|
| N-001 | Tugas Baru | Guru publish tugas | Murid di kelas | In-App, Email |
| N-002 | Deadline Mendekati | 24 jam sebelum deadline | Murid belum submit | In-App |
| N-003 | Tugas Dinilai | Guru input nilai | Murid pemilik | In-App, Email |
| N-004 | Quiz Baru | Guru publish quiz | Murid di kelas | In-App, Email |
| N-005 | Quiz Akan Dimulai | 1 jam sebelum start | Murid di kelas | In-App |
| N-006 | Hasil Quiz | Guru finalize nilai | Murid pemilik | In-App |
| N-007 | Materi Baru | Guru upload materi | Murid di kelas | In-App |
| N-008 | Pengumuman Kelas | Guru buat pengumuman | Murid di kelas | In-App, Email |
| N-009 | Pengumuman Global | Admin buat pengumuman | Semua user | In-App |
| N-010 | Diskusi Reply | User reply post | Author post asli | In-App |
| N-011 | Murid Bergabung | Murid join kelas | Guru pemilik | In-App |
| N-012 | Submission Masuk | Murid submit tugas | Guru pemilik | In-App |
| N-013 | Backup Selesai | Backup completed | Super Admin | In-App |
| N-014 | Import Selesai | Import completed | Super Admin | In-App |

---

## 5. Arsitektur Teknis

### 5.1 Flow

```
[Event Trigger] → [Laravel Event] → [Notification Class]
    ├──▶ [Database Channel] → notifications table → [UI Bell Icon]
    └──▶ [Mail Channel] → SMTP Queue → [User Email]
```

### 5.2 Event-Listener Mapping

| Event | Notification |
|---|---|
| `AssignmentCreated` | `NewAssignmentNotification` |
| `SubmissionGraded` | `GradeNotification` |
| `QuizPublished` | `NewQuizNotification` |
| `MaterialUploaded` | `NewMaterialNotification` |
| `AnnouncementCreated` | `AnnouncementNotification` |
| `DiscussionReplied` | `DiscussionReplyNotification` |
| `StudentJoinedClass` | `StudentJoinedNotification` |
| `BackupCompleted` | `BackupCompleteNotification` |

---

## 6. UI Notifikasi

### 6.1 Bell Icon (Topbar)

```
🔔(3) ──▶ Dropdown:
├── 🔴 Deadline besok! Tugas Integral (2 jam lalu)
├── 🟡 Tugas Baru: PR Bab 5 Fisika (5 jam lalu)
├── 🔵 Materi Baru: Video Kimia (1 hari lalu)
└── [Lihat Semua →]
```

### 6.2 Fitur Halaman Notifikasi

| Fitur | Deskripsi |
|---|---|
| Daftar | Semua notifikasi dengan pagination |
| Filter | Semua / Belum Dibaca / Sudah Dibaca |
| Mark as read | Klik → tandai sudah dibaca |
| Mark all | Tombol "Tandai semua sudah dibaca" |
| Time format | Relative ("2 jam yang lalu") |

---

## 7. Scheduled Notifications

| Jadwal | Notifikasi | Mekanisme |
|---|---|---|
| Setiap jam | Cek deadline 24 jam ke depan | Laravel Scheduler |
| Setiap jam | Cek quiz dimulai 1 jam ke depan | Laravel Scheduler |
| Harian 00:00 | Backup reminder jika gagal | Laravel Scheduler |

---

## 8. Checklist

- [x] In-App notification terdefinisi
- [x] Email notification terdefinisi
- [x] 14 tipe notifikasi teridentifikasi
- [x] Event-Listener mapping terdefinisi
- [x] UI notifikasi terdefinisi
- [x] Scheduled notifications terdefinisi

---

## 9. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-NTF-001 | Notifikasi in-app muncul saat tugas baru | ✅ |
| AC-NTF-002 | Bell icon menampilkan jumlah belum dibaca | ✅ |
| AC-NTF-003 | Klik notifikasi → mark read + redirect | ✅ |
| AC-NTF-004 | Email terkirim untuk tugas baru dan pengumuman | ✅ |
| AC-NTF-005 | Deadline reminder berjalan via scheduler | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [16_ASSIGNMENT_SYSTEM.md](./16_ASSIGNMENT_SYSTEM.md)*


<!-- ============================================== -->
# SOURCE FILE: 16_ASSIGNMENT_SYSTEM.md
<!-- ============================================== -->


# 16 — Assignment System

> **Dokumen Terkait:** [07_FEATURE_LIST.md](./07_FEATURE_LIST.md) · [08_FUNCTIONAL_REQUIREMENTS.md](./08_FUNCTIONAL_REQUIREMENTS.md) · [17_GRADE_SYSTEM.md](./17_GRADE_SYSTEM.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **sistem tugas (assignment)** DIKELAS secara detail — mulai dari pembuatan tugas oleh guru, pengumpulan jawaban oleh murid, hingga penilaian dan feedback.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Distribusi** | Guru dapat mendistribusikan tugas ke seluruh murid di kelas |
| **Pengumpulan** | Murid dapat mengumpulkan jawaban secara digital |
| **Penilaian** | Guru dapat menilai dan memberikan feedback |
| **Tracking** | Status tugas terlacak untuk guru dan murid |

---

## 3. Ruang Lingkup

Sistem tugas mencakup siklus lengkap:
1. Guru membuat tugas → 2. Murid melihat → 3. Murid submit → 4. Guru menilai → 5. Murid melihat nilai

---

## 4. Status Lifecycle

```
[Tugas Dibuat]
      │
      ▼
[Murid Perspective]
├── pending ──────── Belum dikerjakan (🟡 Kuning)
├── submitted ────── Sudah dikerjakan (🔵 Biru)
├── late ─────────── Terlambat dikumpulkan (🔴 Merah)
└── graded ──────── Sudah dinilai (🟢 Hijau)
```

| Status | Kondisi | Aksi Murid | Aksi Guru |
|---|---|---|---|
| `pending` | Tugas belum di-submit | Submit jawaban | — |
| `submitted` | Submit sebelum deadline | Re-submit (sebelum deadline) | Nilai |
| `late` | Submit setelah deadline | — | Nilai |
| `graded` | Guru sudah beri nilai | Lihat nilai & feedback | Edit nilai |

---

## 5. Fitur Detail

### 5.1 Buat Tugas (Guru)

| Field | Tipe | Validasi |
|---|---|---|
| Judul | Text | required, max:255 |
| Instruksi | Rich Text | nullable |
| Nilai Maksimal | Number | required, integer, 1-100 |
| Deadline | Datetime | required, after:now |
| Lampiran | File(s) | nullable, max:25MB, mimes:pdf,doc,docx,ppt,pptx |
| Allow Late | Boolean | default: true |

### 5.2 Submit Tugas (Murid)

| Field | Tipe | Validasi |
|---|---|---|
| File Jawaban | File | required, max:25MB |
| Catatan | Text | nullable, max:1000 |

**Business Rules:**
- Satu murid hanya bisa punya 1 submission per tugas
- Re-submit diizinkan sebelum deadline (file lama diganti)
- Submit setelah deadline → status `late` (jika `allow_late = true`)
- Submit setelah deadline tidak diizinkan jika `allow_late = false`

### 5.3 Nilai Tugas (Guru)

| Field | Tipe | Validasi |
|---|---|---|
| Nilai | Number | required, numeric, 0-{max_score} |
| Feedback | Text | nullable, max:2000 |

---

## 6. Database Tables

| Tabel | Deskripsi |
|---|---|
| `assignments` | Data tugas |
| `assignment_attachments` | Lampiran file tugas dari guru |
| `submissions` | Jawaban tugas dari murid |

> Detail skema: [13_DATABASE_REQUIREMENTS.md](./13_DATABASE_REQUIREMENTS.md)

---

## 7. API Endpoints

| Method | Route | Aksi | Role |
|---|---|---|---|
| GET | `/teacher/classrooms/{id}/assignments` | Daftar tugas | Guru |
| GET | `/teacher/classrooms/{id}/assignments/create` | Form buat tugas | Guru |
| POST | `/teacher/classrooms/{id}/assignments` | Simpan tugas | Guru |
| GET | `/teacher/assignments/{id}/edit` | Form edit tugas | Guru |
| PUT | `/teacher/assignments/{id}` | Update tugas | Guru |
| DELETE | `/teacher/assignments/{id}` | Hapus tugas | Guru |
| GET | `/teacher/assignments/{id}/submissions` | Daftar submission | Guru |
| POST | `/teacher/submissions/{id}/grade` | Input nilai | Guru |
| GET | `/student/assignments` | Daftar tugas murid | Murid |
| GET | `/student/assignments/{id}` | Detail tugas | Murid |
| POST | `/student/assignments/{id}/submit` | Submit jawaban | Murid |

---

## 8. Notifikasi Terkait

| Event | Notifikasi | Penerima |
|---|---|---|
| Tugas dibuat | "Tugas baru: {judul}" | Murid di kelas |
| 24 jam sebelum deadline | "Deadline besok: {judul}" | Murid belum submit |
| Murid submit | "Submission masuk: {nama_murid}" | Guru |
| Guru nilai | "Tugas dinilai: {judul} — {nilai}" | Murid |

---

## 9. Checklist

- [x] Lifecycle status tugas terdefinisi
- [x] Form buat tugas terdefinisi
- [x] Form submit tugas terdefinisi
- [x] Form penilaian terdefinisi
- [x] Business rules terdefinisi
- [x] API endpoints terdefinisi
- [x] Notifikasi terkait terdefinisi

---

## 10. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-ASG-001 | Guru dapat membuat tugas dengan deadline dan lampiran | ✅ |
| AC-ASG-002 | Murid dapat melihat daftar tugas dengan status | ✅ |
| AC-ASG-003 | Murid dapat submit jawaban file | ✅ |
| AC-ASG-004 | Re-submit berfungsi sebelum deadline | ✅ |
| AC-ASG-005 | Status berubah ke "late" jika submit setelah deadline | ✅ |
| AC-ASG-006 | Guru dapat menilai dan memberikan feedback | ✅ |
| AC-ASG-007 | Notifikasi terkirim saat tugas baru dan dinilai | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [17_GRADE_SYSTEM.md](./17_GRADE_SYSTEM.md)*


<!-- ============================================== -->
# SOURCE FILE: 17_GRADE_SYSTEM.md
<!-- ============================================== -->


# 17 — Grade System

> **Dokumen Terkait:** [16_ASSIGNMENT_SYSTEM.md](./16_ASSIGNMENT_SYSTEM.md) · [18_QUIZ_SYSTEM.md](./18_QUIZ_SYSTEM.md) · [07_FEATURE_LIST.md](./07_FEATURE_LIST.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **sistem penilaian** DIKELAS — mekanisme input, kalkulasi, dan pelaporan nilai akademik murid. Nilai berasal dari dua sumber: **tugas** (manual grading) dan **quiz** (auto-grading untuk PG, manual untuk essay).

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Transparansi** | Murid dapat melihat nilai secara real-time |
| **Efisiensi** | Guru dapat menilai dan merekap dengan cepat |
| **Akurasi** | Kalkulasi otomatis mengurangi human error |
| **Pelaporan** | Export rekap nilai ke Excel |

---

## 3. Ruang Lingkup

| Aspek | In Scope | Out of Scope |
|---|---|---|
| Sumber nilai | Tugas, Quiz | Absensi, Sikap |
| Skala | 0–100 | Huruf (A-E) di MVP |
| Kalkulasi | Rata-rata, Rata-rata berbobot | Kurva, Statistik lanjutan |
| Export | Excel (.xlsx) | PDF rapor resmi |

---

## 4. Sumber Nilai

### 4.1 Nilai Tugas

```
Guru buat tugas (max_score: 100)
    ↓
Murid submit jawaban
    ↓
Guru input nilai (0–100) + feedback
    ↓
Nilai tersimpan di submissions.score
    ↓
Sinkron ke tabel grades (gradable: Assignment)
```

### 4.2 Nilai Quiz

```
Guru buat quiz (soal PG + Essay)
    ↓
Murid kerjakan quiz
    ↓
Auto-grading untuk soal PG dan B/S
    ↓
Guru input nilai manual untuk essay
    ↓
Total score tersimpan di quiz_attempts.total_score
    ↓
Sinkron ke tabel grades (gradable: Quiz)
```

---

## 5. Kalkulasi Nilai

### 5.1 Rata-rata Sederhana (Default)

```
Nilai Akhir = (Σ Nilai Tugas + Σ Nilai Quiz) / (Jumlah Tugas + Jumlah Quiz)
```

### 5.2 Rata-rata Berbobot (Configurable)

| Komponen | Bobot Default |
|---|---|
| Tugas | 60% |
| Quiz | 40% |

```
Nilai Akhir = (Rata-rata Tugas × Bobot Tugas) + (Rata-rata Quiz × Bobot Quiz)

Contoh:
Rata-rata Tugas = 80, Bobot = 60%
Rata-rata Quiz = 90, Bobot = 40%
Nilai Akhir = (80 × 0.6) + (90 × 0.4) = 48 + 36 = 84
```

---

## 6. Tampilan Nilai

### 6.1 Murid: Nilai Per Kelas

| Komponen | Judul | Nilai | Max | Status |
|---|---|---|---|---|
| Tugas 1 | Latihan Integral | 85 | 100 | ✅ Dinilai |
| Tugas 2 | PR Bab 5 | — | 100 | 🟡 Belum Dinilai |
| Quiz 1 | Ulangan Harian 1 | 90 | 100 | ✅ Dinilai |
| **Rata-rata** | | **87.5** | **100** | |

### 6.2 Guru: Rekap Nilai Per Kelas

| No | NIS | Nama | T1 | T2 | T3 | Q1 | Q2 | Rata-rata |
|---|---|---|---|---|---|---|---|---|
| 1 | 12001 | Rina Permata | 85 | 90 | 78 | 92 | — | 86.3 |
| 2 | 12002 | Ahmad Fadli | 70 | 85 | 80 | 75 | — | 77.5 |
| 3 | 12003 | Siti Nurhaliza | 95 | 88 | 92 | 98 | — | 93.3 |

---

## 7. Export Nilai

### 7.1 Format Excel

| Kolom | Deskripsi |
|---|---|
| No | Nomor urut |
| NIS | Nomor Induk Siswa |
| Nama | Nama lengkap murid |
| Tugas 1..N | Nilai per tugas |
| Quiz 1..N | Nilai per quiz |
| Rata-rata Tugas | Rata-rata semua tugas |
| Rata-rata Quiz | Rata-rata semua quiz |
| Nilai Akhir | Kalkulasi akhir (berbobot/sederhana) |

### 7.2 Implementasi

```
Route: GET /teacher/classrooms/{id}/grades/export
Library: Laravel Excel (Maatwebsite)
Format: .xlsx
Filename: Nilai_{NamaKelas}_{Semester}.xlsx
```

---

## 8. API Endpoints

| Method | Route | Aksi | Role |
|---|---|---|---|
| GET | `/teacher/classrooms/{id}/grades` | Rekap nilai kelas | Guru |
| GET | `/teacher/classrooms/{id}/grades/export` | Export Excel | Guru |
| GET | `/student/grades` | Rekap nilai murid | Murid |
| GET | `/student/classrooms/{id}/grades` | Nilai per kelas | Murid |

---

## 9. Checklist

- [x] Sumber nilai terdefinisi (Tugas + Quiz)
- [x] Formula kalkulasi terdefinisi
- [x] Tampilan nilai murid terdefinisi
- [x] Tampilan rekap nilai guru terdefinisi
- [x] Export Excel terdefinisi
- [x] Bobot nilai configurable
- [x] API endpoints terdefinisi

---

## 10. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-GRD-001 | Murid dapat melihat nilai per tugas dan quiz | ✅ |
| AC-GRD-002 | Guru dapat melihat rekap nilai seluruh murid per kelas | ✅ |
| AC-GRD-003 | Kalkulasi rata-rata otomatis | ✅ |
| AC-GRD-004 | Export rekap nilai ke Excel berfungsi | ✅ |
| AC-GRD-005 | Bobot nilai dapat dikonfigurasi per kelas | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [18_QUIZ_SYSTEM.md](./18_QUIZ_SYSTEM.md)*


<!-- ============================================== -->
# SOURCE FILE: 18_QUIZ_SYSTEM.md
<!-- ============================================== -->


# 18 — Quiz System

> **Dokumen Terkait:** [07_FEATURE_LIST.md](./07_FEATURE_LIST.md) · [17_GRADE_SYSTEM.md](./17_GRADE_SYSTEM.md) · [08_FUNCTIONAL_REQUIREMENTS.md](./08_FUNCTIONAL_REQUIREMENTS.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **sistem quiz** DIKELAS — mekanisme pembuatan, pengerjaan, dan penilaian quiz online. Mendukung tiga tipe soal: **Pilihan Ganda**, **Benar/Salah**, dan **Essay**, dengan **auto-grading** untuk soal objektif.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Evaluasi** | Guru dapat mengevaluasi pemahaman murid |
| **Efisiensi** | Auto-grading mengurangi waktu koreksi |
| **Kontrol** | Timer dan jadwal mencegah kecurangan |
| **Analisis** | Statistik hasil membantu guru evaluasi |

---

## 3. Ruang Lingkup

| Aspek | In Scope | Out of Scope |
|---|---|---|
| Tipe Soal | PG, B/S, Essay | Isian singkat, Menjodohkan |
| Grading | Auto (PG, B/S), Manual (Essay) | AI Grading |
| Timer | Per quiz (menit) | Per soal |
| Attempt | 1x per murid | Multiple attempts |

---

## 4. Tipe Soal

### 4.1 Pilihan Ganda (Multiple Choice)

```
Soal: Berapakah hasil dari 2 + 2?
├── A. 3
├── B. 4  ← Jawaban Benar
├── C. 5
└── D. 6

Auto-grading: Ya
Poin: Configurable per soal
```

### 4.2 Benar/Salah (True/False)

```
Soal: Matahari terbit dari arah barat.
├── Benar
└── Salah  ← Jawaban Benar

Auto-grading: Ya
Poin: Configurable per soal
```

### 4.3 Essay

```
Soal: Jelaskan proses fotosintesis!
└── [Text Area - jawaban panjang]

Auto-grading: Tidak (manual oleh guru)
Poin: Configurable per soal
```

---

## 5. Lifecycle Quiz

```
[Guru Buat Quiz] → [Draft]
    ↓
[Guru Publish] → [Published / Upcoming]
    ↓
[Waktu Mulai] → [Active / In Progress]
    ↓
[Murid Kerjakan] → [Timer Berjalan]
    ↓
[Submit / Waktu Habis] → [Completed]
    ↓
[Auto-grade PG + B/S]
    ↓
[Guru Grade Essay] → [Fully Graded]
```

### Status Quiz

| Status | Kondisi | Aksi |
|---|---|---|
| `draft` | Belum dipublish | Guru edit/publish |
| `upcoming` | Published, belum waktunya | Murid lihat info |
| `active` | Dalam periode start-end | Murid kerjakan |
| `ended` | Melewati end_at | Guru lihat hasil |

---

## 6. Fitur Detail

### 6.1 Buat Quiz (Guru)

| Field | Tipe | Validasi |
|---|---|---|
| Judul | Text | required, max:255 |
| Deskripsi | Text | nullable |
| Durasi (menit) | Number | required, min:5, max:180 |
| Tanggal Mulai | Datetime | required, after:now |
| Tanggal Selesai | Datetime | required, after:start_at |
| Acak Soal | Boolean | default: false |
| Tampilkan Hasil | Boolean | default: true |

### 6.2 Tambah Soal

| Field | Tipe | Validasi |
|---|---|---|
| Tipe Soal | Enum | required (multiple_choice / true_false / essay) |
| Konten Soal | Rich Text | required |
| Opsi Jawaban | Array | required untuk PG (min: 2, max: 5) |
| Jawaban Benar | String | required untuk PG dan B/S |
| Poin | Number | required, min:1 |

### 6.3 Kerjakan Quiz (Murid)

- Timer countdown di header
- Navigasi soal (prev/next + nomor soal)
- Progress indicator (soal terjawab / total)
- Auto-save jawaban setiap perubahan
- Auto-submit saat timer habis
- Konfirmasi sebelum submit manual

---

## 7. Kalkulasi Skor

### 7.1 Auto-grading (PG & B/S)

```
Untuk setiap soal PG/B/S:
  if jawaban_murid == answer_key:
    score += points
  else:
    score += 0

Total Score PG = (Σ Score Benar / Σ Total Points) × 100
```

### 7.2 Manual Grading (Essay)

```
Guru input score per soal essay
Total Score = (Score PG + Score Essay) / Total Points × 100
```

---

## 8. Analisis Quiz (Guru)

| Metrik | Deskripsi |
|---|---|
| Rata-rata skor | Rata-rata skor seluruh murid |
| Skor tertinggi | Skor tertinggi |
| Skor terendah | Skor terendah |
| Distribusi nilai | Grafik batang |
| Per soal | Persentase jawaban benar per soal |
| Soal tersulit | Soal dengan % benar terendah |

---

## 9. API Endpoints

| Method | Route | Aksi | Role |
|---|---|---|---|
| POST | `/teacher/.../quizzes` | Buat quiz | Guru |
| PUT | `/teacher/quizzes/{id}` | Edit quiz | Guru |
| DELETE | `/teacher/quizzes/{id}` | Hapus quiz | Guru |
| GET | `/teacher/quizzes/{id}/results` | Hasil quiz | Guru |
| GET | `/student/quizzes/{id}` | Info quiz | Murid |
| POST | `/student/quizzes/{id}/attempt` | Mulai quiz | Murid |
| POST | `/student/quizzes/{id}/submit` | Submit quiz | Murid |
| GET | `/student/quizzes/{id}/result` | Lihat hasil | Murid |

---

## 10. Checklist

- [x] 3 tipe soal terdefinisi (PG, B/S, Essay)
- [x] Lifecycle quiz terdefinisi
- [x] Auto-grading untuk PG dan B/S
- [x] Timer dan auto-submit
- [x] Analisis hasil quiz
- [x] API endpoints terdefinisi

---

## 11. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-QZ-001 | Guru dapat membuat quiz dengan 3 tipe soal | ✅ |
| AC-QZ-002 | Timer berjalan dan auto-submit saat habis | ✅ |
| AC-QZ-003 | Auto-grading benar untuk soal PG dan B/S | ✅ |
| AC-QZ-004 | Murid hanya bisa mengerjakan 1x | ✅ |
| AC-QZ-005 | Guru dapat melihat analisis hasil quiz | ✅ |
| AC-QZ-006 | Essay dinilai manual oleh guru | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [19_PERMISSION_MATRIX.md](./19_PERMISSION_MATRIX.md)*


<!-- ============================================== -->
# SOURCE FILE: 19_PERMISSION_MATRIX.md
<!-- ============================================== -->


# 19 — Permission Matrix

> **Dokumen Terkait:** [06_USER_ROLES.md](./06_USER_ROLES.md) · [14_SECURITY_REQUIREMENTS.md](./14_SECURITY_REQUIREMENTS.md) · [12_SITEMAP.md](./12_SITEMAP.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **matriks izin akses (permission matrix)** DIKELAS — pemetaan detail antara setiap aksi sistem dengan role yang diizinkan. Menggunakan model **RBAC (Role-Based Access Control)** dengan granular permissions per modul.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Keamanan** | Memastikan setiap aksi hanya bisa dilakukan oleh role yang berhak |
| **Referensi** | Panduan untuk Backend Engineer saat implementasi middleware dan policy |
| **Testing** | Acuan QA untuk menguji akses kontrol |

---

## 3. Ruang Lingkup

Matriks mencakup seluruh modul DIKELAS dengan 3 role: **Super Admin (SA)**, **Guru (G)**, dan **Murid (M)**.

**Legenda:**
- ✅ = Diizinkan
- ❌ = Tidak diizinkan
- 🔒 = Diizinkan dengan kondisi (lihat catatan)

---

## 4. Permission Matrix

### 4.1 Modul Autentikasi

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| Login | ✅ | ✅ | ✅ | |
| Register | ❌ | ❌ | ✅ | Hanya murid bisa self-register |
| Logout | ✅ | ✅ | ✅ | |
| Reset Password | ✅ | ✅ | ✅ | |

### 4.2 Modul Dashboard

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| View Admin Dashboard | ✅ | ❌ | ❌ | |
| View Teacher Dashboard | ❌ | ✅ | ❌ | |
| View Student Dashboard | ❌ | ❌ | ✅ | |

### 4.3 Modul Kelas

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| View All Classrooms | ✅ | ❌ | ❌ | Admin lihat semua kelas |
| View Own Classrooms | ❌ | ✅ | ✅ | Guru: kelas diajar, Murid: kelas diikuti |
| Create Classroom | ✅ | ✅ | ❌ | |
| Edit Classroom | ✅ | 🔒 | ❌ | Guru: hanya kelas sendiri |
| Archive Classroom | ✅ | 🔒 | ❌ | Guru: hanya kelas sendiri |
| Delete Classroom | ✅ | ❌ | ❌ | |
| Join Classroom | ❌ | ❌ | ✅ | Pakai kode kelas |
| Leave Classroom | ❌ | ❌ | ✅ | |
| View Members | ✅ | 🔒 | 🔒 | Guru/Murid: hanya kelas sendiri |
| Remove Member | ✅ | 🔒 | ❌ | Guru: hanya kelas sendiri |

### 4.4 Modul Materi

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| Create Material | ❌ | 🔒 | ❌ | Guru: hanya di kelas sendiri |
| Edit Material | ❌ | 🔒 | ❌ | Guru: hanya materi sendiri |
| Delete Material | ❌ | 🔒 | ❌ | Guru: hanya materi sendiri |
| View Material | ❌ | 🔒 | 🔒 | Anggota kelas saja |
| Download Material | ❌ | 🔒 | 🔒 | Anggota kelas saja |

### 4.5 Modul Tugas

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| Create Assignment | ❌ | 🔒 | ❌ | Guru: kelas sendiri |
| Edit Assignment | ❌ | 🔒 | ❌ | Guru: tugas sendiri |
| Delete Assignment | ❌ | 🔒 | ❌ | Guru: tugas sendiri |
| View Assignment | ❌ | 🔒 | 🔒 | Anggota kelas |
| Submit Assignment | ❌ | ❌ | 🔒 | Murid: kelas sendiri |
| View Submissions | ❌ | 🔒 | ❌ | Guru: kelas sendiri |
| Grade Submission | ❌ | 🔒 | ❌ | Guru: kelas sendiri |

### 4.6 Modul Quiz

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| Create Quiz | ❌ | 🔒 | ❌ | Guru: kelas sendiri |
| Edit Quiz | ❌ | 🔒 | ❌ | Guru: quiz sendiri |
| Delete Quiz | ❌ | 🔒 | ❌ | Guru: quiz sendiri |
| Attempt Quiz | ❌ | ❌ | 🔒 | Murid: kelas sendiri |
| View Quiz Results | ❌ | 🔒 | 🔒 | Guru: semua, Murid: sendiri |

### 4.7 Modul Nilai

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| View All Grades | ✅ | ❌ | ❌ | Admin: semua |
| View Class Grades | ❌ | 🔒 | ❌ | Guru: kelas sendiri |
| View Own Grades | ❌ | ❌ | ✅ | Murid: nilai sendiri |
| Input Grade | ❌ | 🔒 | ❌ | Guru: kelas sendiri |
| Export Grades | ✅ | 🔒 | ❌ | |

### 4.8 Modul Diskusi & Pengumuman

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| Create Discussion | ❌ | 🔒 | 🔒 | Anggota kelas |
| Reply Discussion | ❌ | 🔒 | 🔒 | Anggota kelas |
| Delete Discussion | ❌ | 🔒 | ❌ | Guru: kelas sendiri |
| Create Class Announcement | ❌ | 🔒 | ❌ | Guru: kelas sendiri |
| Create Global Announcement | ✅ | ❌ | ❌ | |
| Pin Announcement | ✅ | 🔒 | ❌ | |

### 4.9 Modul Administrasi

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| Manage Teachers | ✅ | ❌ | ❌ | CRUD guru |
| Manage Students | ✅ | ❌ | ❌ | CRUD murid |
| Manage Subjects | ✅ | ❌ | ❌ | CRUD mata pelajaran |
| Manage Semesters | ✅ | ❌ | ❌ | CRUD semester |
| Manage Academic Years | ✅ | ❌ | ❌ | CRUD tahun ajaran |
| Backup Database | ✅ | ❌ | ❌ | |
| Restore Database | ✅ | ❌ | ❌ | |
| Import Excel | ✅ | ❌ | ❌ | |
| Export Excel | ✅ | ❌ | ❌ | |
| View Activity Log | ✅ | ❌ | ❌ | |
| Manage Roles | ✅ | ❌ | ❌ | |
| System Settings | ✅ | ❌ | ❌ | |

---

## 5. Daftar Permission (Database)

| Module | Permission Name | Display Name |
|---|---|---|
| classroom | `classroom.view` | Lihat Kelas |
| classroom | `classroom.create` | Buat Kelas |
| classroom | `classroom.edit` | Edit Kelas |
| classroom | `classroom.delete` | Hapus Kelas |
| material | `material.create` | Upload Materi |
| material | `material.edit` | Edit Materi |
| material | `material.delete` | Hapus Materi |
| assignment | `assignment.create` | Buat Tugas |
| assignment | `assignment.grade` | Nilai Tugas |
| quiz | `quiz.create` | Buat Quiz |
| quiz | `quiz.grade` | Nilai Quiz |
| grade | `grade.view` | Lihat Nilai |
| grade | `grade.export` | Export Nilai |
| user | `user.manage` | Kelola User |
| admin | `admin.backup` | Backup |
| admin | `admin.restore` | Restore |
| admin | `admin.import` | Import |
| admin | `admin.export` | Export |
| admin | `admin.settings` | Pengaturan |
| admin | `admin.log` | Activity Log |

---

## 6. Implementasi Teknis

### 6.1 Middleware

```php
// Role middleware
Route::middleware(['auth', 'role:super_admin'])->prefix('admin')->group(...);
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->group(...);
Route::middleware(['auth', 'role:student'])->prefix('student')->group(...);
```

### 6.2 Policy

```php
// ClassroomPolicy
public function update(User $user, Classroom $classroom): bool
{
    return $user->id === $classroom->teacher_id
        || $user->hasRole('super_admin');
}
```

---

## 7. Checklist

- [x] Permission matrix per modul terdefinisi
- [x] 3 role dengan hierarki terdefinisi
- [x] Kondisi akses (🔒) terdokumentasi
- [x] Daftar permission database terdefinisi
- [x] Implementasi middleware dan policy terdefinisi

---

## 8. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-PM-001 | Setiap route memiliki middleware role yang sesuai | ✅ |
| AC-PM-002 | Policy mencegah akses resource milik user lain | ✅ |
| AC-PM-003 | Super Admin memiliki akses penuh ke modul admin | ✅ |
| AC-PM-004 | Murid tidak bisa mengakses route guru/admin | ✅ |
| AC-PM-005 | Guru hanya bisa CRUD di kelas sendiri | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [20_TECH_STACK.md](./20_TECH_STACK.md)*


<!-- ============================================== -->
# SOURCE FILE: 20_TECH_STACK.md
<!-- ============================================== -->


# 20 — Tech Stack

> **Dokumen Terkait:** [00_PROJECT_OVERVIEW.md](./00_PROJECT_OVERVIEW.md) · [21_LARAVEL_ARCHITECTURE.md](./21_LARAVEL_ARCHITECTURE.md) · [22_FOLDER_STRUCTURE.md](./22_FOLDER_STRUCTURE.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **tech stack** DIKELAS secara detail — alasan pemilihan setiap teknologi, versi yang digunakan, dan bagaimana teknologi-teknologi tersebut berinteraksi.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Standardisasi** | Memastikan seluruh tim menggunakan versi dan tools yang sama |
| **Onboarding** | Mempercepat onboarding developer baru |
| **Compatibility** | Mencegah konflik versi dan dependency |

---

## 3. Tech Stack Overview

```
┌────────────────────────────────────────┐
│           PRESENTATION LAYER           │
│  Blade + TailwindCSS + AlpineJS       │
│  Livewire (reactive components)        │
└────────────────┬───────────────────────┘
                 │
┌────────────────▼───────────────────────┐
│           APPLICATION LAYER            │
│  Laravel 12 (PHP 8.4)                  │
│  ├── Controllers + Services            │
│  ├── Eloquent ORM                      │
│  ├── Laravel Breeze (Auth)             │
│  ├── Laravel Sanctum (API Token)       │
│  └── Laravel Storage (File)            │
└────────────────┬───────────────────────┘
                 │
┌────────────────▼───────────────────────┐
│              DATA LAYER                │
│  MySQL 8.0 (Database)                  │
│  Local Filesystem (File Storage)       │
└────────────────────────────────────────┘
```

---

## 4. Detail Teknologi

### 4.1 Backend

| Teknologi | Versi | Fungsi | Alasan Pemilihan |
|---|---|---|---|
| **PHP** | 8.4 | Runtime | Performa terbaik, fitur modern (named args, enums, fibers) |
| **Laravel** | 12 | Framework | Framework PHP paling populer, ecosystem lengkap |
| **Composer** | 2.x | Package Manager | Standar package manager PHP |

### 4.2 Frontend

| Teknologi | Versi | Fungsi | Alasan Pemilihan |
|---|---|---|---|
| **Blade** | — | Template Engine | Native Laravel, server-side rendering |
| **TailwindCSS** | 4.x | CSS Framework | Utility-first, customizable, modern |
| **Livewire** | 3.x | Reactive Components | Full-stack reactivity tanpa menulis JS |
| **AlpineJS** | 3.x | JS Interactivity | Lightweight, deklaratif, cocok dengan Blade |
| **Vite** | Latest | Build Tool | Fast HMR, native ES modules |

### 4.3 Database

| Teknologi | Versi | Fungsi | Alasan Pemilihan |
|---|---|---|---|
| **MySQL** | 8.0 | Database | Paling umum di hosting Indonesia, familiar |

### 4.4 Authentication

| Teknologi | Versi | Fungsi | Alasan Pemilihan |
|---|---|---|---|
| **Laravel Breeze** | Latest | Auth Scaffolding | Simple, Blade-based, minimal overhead |
| **Laravel Sanctum** | Latest | API Token | Lightweight token auth untuk SPA/mobile (future) |

### 4.5 Packages Utama

| Package | Versi | Fungsi |
|---|---|---|
| `maatwebsite/excel` | 3.x | Import/Export Excel |
| `spatie/laravel-activitylog` | 4.x | Activity logging |
| `spatie/laravel-permission` | 6.x | Role & Permission (evaluasi) |
| `intervention/image` | 3.x | Image processing (avatar) |
| `barryvdh/laravel-debugbar` | 3.x | Development debugging |

### 4.6 Development Tools

| Tool | Fungsi |
|---|---|
| **Laravel Debugbar** | Query debugging, performance profiling |
| **Laravel Telescope** | Request monitoring (dev only) |
| **PHPUnit** | Unit & Feature testing |
| **Laravel Pint** | Code formatting (PSR-12) |
| **Pest** | Testing framework (opsional) |

---

## 5. Server Requirements

| Requirement | Minimum | Recommended |
|---|---|---|
| **PHP** | 8.4 | 8.4+ |
| **MySQL** | 8.0 | 8.0+ |
| **Nginx** | 1.18 | 1.24+ |
| **Node.js** | 18.x | 20.x (LTS) |
| **NPM** | 9.x | 10.x |
| **Composer** | 2.x | 2.7+ |
| **RAM** | 2 GB | 4 GB |
| **CPU** | 1 Core | 2 Core |
| **Storage** | 20 GB | 100 GB (SSD) |
| **OS** | Ubuntu 22.04 | Ubuntu 24.04 |

---

## 6. PHP Extensions Required

| Extension | Fungsi |
|---|---|
| `php-mbstring` | String multibyte |
| `php-xml` | XML parsing |
| `php-curl` | HTTP requests |
| `php-mysql` | MySQL driver |
| `php-zip` | Zip archive |
| `php-gd` | Image processing |
| `php-bcmath` | Math operations |
| `php-intl` | Internationalization |
| `php-fileinfo` | File type detection |

---

## 7. Checklist

- [x] Backend stack terdefinisi (PHP, Laravel)
- [x] Frontend stack terdefinisi (Blade, Tailwind, Livewire, Alpine)
- [x] Database stack terdefinisi (MySQL)
- [x] Auth stack terdefinisi (Breeze, Sanctum)
- [x] Packages utama terdefinisi
- [x] Server requirements terdefinisi
- [x] PHP extensions terdefinisi

---

## 8. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-TS-001 | Semua teknologi memiliki versi yang terspesifikasi | ✅ |
| AC-TS-002 | Alasan pemilihan terdokumentasi | ✅ |
| AC-TS-003 | Server requirements terdefinisi | ✅ |
| AC-TS-004 | PHP extensions terdaftar | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [21_LARAVEL_ARCHITECTURE.md](./21_LARAVEL_ARCHITECTURE.md)*


<!-- ============================================== -->
# SOURCE FILE: 21_LARAVEL_ARCHITECTURE.md
<!-- ============================================== -->


# 21 — Laravel Architecture

> **Dokumen Terkait:** [20_TECH_STACK.md](./20_TECH_STACK.md) · [22_FOLDER_STRUCTURE.md](./22_FOLDER_STRUCTURE.md) · [24_CODING_STANDARD.md](./24_CODING_STANDARD.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **arsitektur Laravel** DIKELAS — pattern yang digunakan, layer separation, dan konvensi untuk memastikan kode yang maintainable, testable, dan scalable.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Konsistensi** | Semua developer mengikuti pattern yang sama |
| **Maintainability** | Kode mudah di-maintain dan di-debug |
| **Testability** | Setiap layer bisa di-test secara independen |
| **Scalability** | Arsitektur mendukung pertumbuhan fitur |

---

## 3. Architecture Pattern

### 3.1 Layer Architecture

```
┌──────────────────────────────────────────┐
│            PRESENTATION LAYER            │
│  Blade Views + Livewire Components       │
│  (Tampilan, form, interaktivitas)        │
└─────────────────┬────────────────────────┘
                  │
┌─────────────────▼────────────────────────┐
│           CONTROLLER LAYER               │
│  HTTP Controllers                        │
│  (Request handling, validation, response) │
└─────────────────┬────────────────────────┘
                  │
┌─────────────────▼────────────────────────┐
│            SERVICE LAYER                 │
│  Business Logic Services                 │
│  (Business rules, calculations, workflow)│
└─────────────────┬────────────────────────┘
                  │
┌─────────────────▼────────────────────────┐
│              MODEL LAYER                 │
│  Eloquent Models + Relationships         │
│  (Data access, relationships, scopes)    │
└─────────────────┬────────────────────────┘
                  │
┌─────────────────▼────────────────────────┐
│            DATABASE LAYER                │
│  MySQL 8.0                               │
│  (Tables, indexes, constraints)          │
└──────────────────────────────────────────┘
```

### 3.2 Request Lifecycle

```
[HTTP Request]
    ↓
[Middleware] (auth, role, throttle)
    ↓
[Controller] (validate, call service)
    ↓
[Service] (business logic)
    ↓
[Model] (database operations)
    ↓
[Controller] (prepare response)
    ↓
[View/Redirect] (Blade template)
    ↓
[HTTP Response]
```

---

## 4. Konvensi Penamaan

### 4.1 Controllers

| Konvensi | Contoh |
|---|---|
| Singular, PascalCase, suffix `Controller` | `ClassroomController` |
| Prefixed by role jika perlu | `StudentAssignmentController` |
| Resource methods | `index`, `create`, `store`, `show`, `edit`, `update`, `destroy` |

### 4.2 Models

| Konvensi | Contoh |
|---|---|
| Singular, PascalCase | `Classroom`, `Assignment` |
| Tabel: plural, snake_case | `classrooms`, `assignments` |
| Pivot: alphabetical singular | `classroom_student` |

### 4.3 Services

| Konvensi | Contoh |
|---|---|
| Singular, PascalCase, suffix `Service` | `ClassroomService` |
| Method: camelCase, verb-first | `createClassroom()`, `gradeSubmission()` |

### 4.4 Views

| Konvensi | Contoh |
|---|---|
| kebab-case directories | `student/classrooms/index.blade.php` |
| Grouped by role + module | `teacher/assignments/create.blade.php` |
| Layouts: `layouts/` | `layouts/app.blade.php` |
| Components: `components/` | `components/card.blade.php` |

### 4.5 Routes

| Konvensi | Contoh |
|---|---|
| Prefixed by role | `/student/dashboard`, `/teacher/classrooms` |
| RESTful naming | `classrooms.index`, `classrooms.store` |
| kebab-case URLs | `/forgot-password`, `/activity-log` |

---

## 5. Design Patterns

### 5.1 Service Pattern

```php
// app/Services/ClassroomService.php
class ClassroomService
{
    public function create(array $data, User $teacher): Classroom
    {
        $data['code'] = $this->generateUniqueCode();
        $data['teacher_id'] = $teacher->id;
        return Classroom::create($data);
    }

    private function generateUniqueCode(): string
    {
        do {
            $code = strtoupper(Str::random(6));
        } while (Classroom::where('code', $code)->exists());
        return $code;
    }
}
```

### 5.2 Form Request Validation

```php
// app/Http/Requests/StoreClassroomRequest.php
class StoreClassroomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->hasRole('teacher');
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'subject_id' => 'required|exists:subjects,id',
            'semester_id' => 'required|exists:semesters,id',
            'description' => 'nullable|string|max:500',
        ];
    }
}
```

### 5.3 Policy Authorization

```php
// app/Policies/ClassroomPolicy.php
class ClassroomPolicy
{
    public function update(User $user, Classroom $classroom): bool
    {
        return $user->id === $classroom->teacher_id;
    }

    public function viewMembers(User $user, Classroom $classroom): bool
    {
        return $user->id === $classroom->teacher_id
            || $classroom->students()->where('student_id', $user->id)->exists();
    }
}
```

### 5.4 Event-Listener Pattern

```php
// Events
AssignmentCreated::class → SendNewAssignmentNotification::class
SubmissionGraded::class  → SendGradeNotification::class
StudentJoinedClass::class → SendStudentJoinedNotification::class
```

---

## 6. Middleware Stack

| Middleware | Lokasi | Fungsi |
|---|---|---|
| `auth` | Global (auth routes) | Cek login |
| `role:{name}` | Custom | Cek role user |
| `verified` | Laravel default | Cek email verified |
| `throttle:60,1` | API routes | Rate limiting |
| `ForceHttps` | Custom | HTTPS enforcement |

---

## 7. Eloquent Conventions

### 7.1 Model Base

```php
// Semua model utama extends BaseModel atau menggunakan traits
class Classroom extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', ...];
    protected $casts = ['is_active' => 'boolean'];

    // Relationships
    public function teacher(): BelongsTo { ... }
    public function students(): BelongsToMany { ... }
    public function assignments(): HasMany { ... }

    // Scopes
    public function scopeActive($query) { ... }
}
```

### 7.2 Relationship Conventions

| Relationship | Method Name | Contoh |
|---|---|---|
| BelongsTo | singular noun | `$classroom->teacher()` |
| HasMany | plural noun | `$classroom->assignments()` |
| BelongsToMany | plural noun | `$classroom->students()` |
| HasOne | singular noun | `$user->profile()` |
| MorphMany | plural noun | `$classroom->grades()` |

---

## 8. Checklist

- [x] Layer architecture terdefinisi
- [x] Request lifecycle terdokumentasi
- [x] Naming conventions terdefinisi
- [x] Design patterns terdefinisi (Service, FormRequest, Policy, Event)
- [x] Middleware stack terdefinisi
- [x] Eloquent conventions terdefinisi

---

## 9. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-LA-001 | Controller hanya handle request/response, bukan business logic | ✅ |
| AC-LA-002 | Business logic berada di Service layer | ✅ |
| AC-LA-003 | Validasi menggunakan FormRequest | ✅ |
| AC-LA-004 | Authorization menggunakan Policy | ✅ |
| AC-LA-005 | Naming conventions konsisten di seluruh codebase | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [22_FOLDER_STRUCTURE.md](./22_FOLDER_STRUCTURE.md)*


<!-- ============================================== -->
# SOURCE FILE: 22_FOLDER_STRUCTURE.md
<!-- ============================================== -->


# 22 — Folder Structure

> **Dokumen Terkait:** [21_LARAVEL_ARCHITECTURE.md](./21_LARAVEL_ARCHITECTURE.md) · [20_TECH_STACK.md](./20_TECH_STACK.md) · [24_CODING_STANDARD.md](./24_CODING_STANDARD.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **struktur folder** proyek DIKELAS berdasarkan konvensi Laravel 12 dengan customisasi untuk mendukung arsitektur layered (Controller → Service → Model).

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Navigasi** | Developer mudah menemukan file yang dicari |
| **Konsistensi** | Struktur seragam di seluruh proyek |
| **Scalability** | Folder terorganisir untuk pertumbuhan fitur |

---

## 3. Root Structure

```
DIKELAS/
├── app/                    # Application code
├── bootstrap/              # Framework bootstrap
├── config/                 # Configuration files
├── database/               # Migrations, seeders, factories
├── docs/                   # Project documentation
├── public/                 # Web root (index.php, assets)
├── resources/              # Views, CSS, JS
├── routes/                 # Route definitions
├── storage/                # File storage, cache, logs
├── tests/                  # Automated tests
├── vendor/                 # Composer dependencies (gitignored)
├── .env                    # Environment config (gitignored)
├── .env.example            # Environment template
├── artisan                 # Laravel CLI
├── composer.json           # PHP dependencies
├── package.json            # Node dependencies
├── phpunit.xml             # Test config
├── vite.config.js          # Vite build config
└── README.md               # Project readme
```

---

## 4. App Directory

```
app/
├── Console/
│   └── Commands/
│       ├── BackupDatabase.php
│       └── SendDeadlineReminder.php
├── Events/
│   ├── AssignmentCreated.php
│   ├── SubmissionGraded.php
│   ├── QuizPublished.php
│   ├── MaterialUploaded.php
│   ├── AnnouncementCreated.php
│   ├── StudentJoinedClass.php
│   └── BackupCompleted.php
├── Http/
│   ├── Controllers/
│   │   ├── Auth/
│   │   │   ├── LoginController.php
│   │   │   ├── RegisterController.php
│   │   │   └── ResetPasswordController.php
│   │   ├── Admin/
│   │   │   ├── DashboardController.php
│   │   │   ├── UserController.php
│   │   │   ├── SubjectController.php
│   │   │   ├── SemesterController.php
│   │   │   ├── AcademicYearController.php
│   │   │   ├── BackupController.php
│   │   │   ├── ImportController.php
│   │   │   ├── ExportController.php
│   │   │   ├── ActivityLogController.php
│   │   │   ├── RoleController.php
│   │   │   └── SettingController.php
│   │   ├── Teacher/
│   │   │   ├── DashboardController.php
│   │   │   ├── ClassroomController.php
│   │   │   ├── MaterialController.php
│   │   │   ├── AssignmentController.php
│   │   │   ├── SubmissionController.php
│   │   │   ├── QuizController.php
│   │   │   ├── GradeController.php
│   │   │   ├── AnnouncementController.php
│   │   │   └── DiscussionController.php
│   │   ├── Student/
│   │   │   ├── DashboardController.php
│   │   │   ├── ClassroomController.php
│   │   │   ├── AssignmentController.php
│   │   │   ├── SubmissionController.php
│   │   │   ├── QuizController.php
│   │   │   ├── GradeController.php
│   │   │   ├── AnnouncementController.php
│   │   │   ├── DiscussionController.php
│   │   │   └── CalendarController.php
│   │   └── ProfileController.php
│   ├── Middleware/
│   │   ├── RoleMiddleware.php
│   │   └── ForceHttps.php
│   └── Requests/
│       ├── Auth/
│       │   ├── LoginRequest.php
│       │   └── RegisterRequest.php
│       ├── Classroom/
│       │   ├── StoreClassroomRequest.php
│       │   └── UpdateClassroomRequest.php
│       ├── Assignment/
│       │   ├── StoreAssignmentRequest.php
│       │   └── StoreSubmissionRequest.php
│       ├── Quiz/
│       │   └── StoreQuizRequest.php
│       └── Admin/
│           ├── StoreUserRequest.php
│           └── ImportRequest.php
├── Listeners/
│   ├── SendNewAssignmentNotification.php
│   ├── SendGradeNotification.php
│   ├── SendNewQuizNotification.php
│   ├── SendAnnouncementNotification.php
│   └── SendStudentJoinedNotification.php
├── Models/
│   ├── User.php
│   ├── Role.php
│   ├── Permission.php
│   ├── AcademicYear.php
│   ├── Semester.php
│   ├── Subject.php
│   ├── Classroom.php
│   ├── Topic.php
│   ├── Material.php
│   ├── Assignment.php
│   ├── AssignmentAttachment.php
│   ├── Submission.php
│   ├── Quiz.php
│   ├── Question.php
│   ├── QuestionOption.php
│   ├── QuizAttempt.php
│   ├── QuizAnswer.php
│   ├── Grade.php
│   ├── Announcement.php
│   ├── Discussion.php
│   ├── DiscussionReply.php
│   ├── ActivityLog.php
│   ├── Backup.php
│   └── Setting.php
├── Notifications/
│   ├── NewAssignmentNotification.php
│   ├── GradeNotification.php
│   ├── NewQuizNotification.php
│   ├── AnnouncementNotification.php
│   ├── DeadlineReminderNotification.php
│   └── DiscussionReplyNotification.php
├── Policies/
│   ├── ClassroomPolicy.php
│   ├── AssignmentPolicy.php
│   ├── SubmissionPolicy.php
│   ├── QuizPolicy.php
│   ├── MaterialPolicy.php
│   └── DiscussionPolicy.php
├── Services/
│   ├── ClassroomService.php
│   ├── AssignmentService.php
│   ├── QuizService.php
│   ├── GradeService.php
│   ├── BackupService.php
│   ├── ImportService.php
│   └── ExportService.php
└── Exports/
    └── GradeExport.php
```

---

## 5. Resources Directory

```
resources/
├── css/
│   └── app.css
├── js/
│   ├── app.js
│   └── bootstrap.js
└── views/
    ├── layouts/
    │   ├── app.blade.php           # Main layout (sidebar + topbar)
    │   ├── guest.blade.php         # Auth pages layout
    │   └── partials/
    │       ├── sidebar.blade.php
    │       ├── topbar.blade.php
    │       └── footer.blade.php
    ├── components/
    │   ├── card.blade.php
    │   ├── modal.blade.php
    │   ├── table.blade.php
    │   ├── alert.blade.php
    │   ├── badge.blade.php
    │   ├── button.blade.php
    │   ├── empty-state.blade.php
    │   └── file-upload.blade.php
    ├── auth/
    │   ├── login.blade.php
    │   ├── register.blade.php
    │   ├── forgot-password.blade.php
    │   └── reset-password.blade.php
    ├── admin/
    │   ├── dashboard.blade.php
    │   ├── users/
    │   ├── subjects/
    │   ├── academic/
    │   ├── backup/
    │   ├── import/
    │   ├── activity-log/
    │   └── settings/
    ├── teacher/
    │   ├── dashboard.blade.php
    │   ├── classrooms/
    │   ├── assignments/
    │   ├── quizzes/
    │   ├── grades/
    │   └── announcements/
    ├── student/
    │   ├── dashboard.blade.php
    │   ├── classrooms/
    │   ├── assignments/
    │   ├── quizzes/
    │   ├── grades/
    │   ├── calendar/
    │   └── announcements/
    ├── profile/
    │   ├── show.blade.php
    │   └── edit.blade.php
    └── errors/
        ├── 403.blade.php
        ├── 404.blade.php
        ├── 500.blade.php
        └── 503.blade.php
```

---

## 6. Database Directory

```
database/
├── factories/
│   ├── UserFactory.php
│   ├── ClassroomFactory.php
│   └── AssignmentFactory.php
├── migrations/
│   ├── 0001_01_01_000000_create_users_table.php
│   ├── 0001_01_01_000001_create_roles_table.php
│   ├── ...  (sesuai urutan dependency)
│   └── xxxx_xx_xx_xxxxxx_create_settings_table.php
└── seeders/
    ├── DatabaseSeeder.php
    ├── RoleSeeder.php
    ├── PermissionSeeder.php
    ├── UserSeeder.php
    ├── SubjectSeeder.php
    └── SettingSeeder.php
```

---

## 7. Routes Directory

```
routes/
├── web.php                 # Main web routes
├── auth.php                # Authentication routes (Breeze)
├── admin.php               # Super Admin routes
├── teacher.php             # Teacher routes
├── student.php             # Student routes
└── console.php             # Artisan commands schedule
```

---

## 8. Checklist

- [x] Root structure terdefinisi
- [x] App directory terorganisir per layer
- [x] Controllers dikelompokkan per role
- [x] Views dikelompokkan per role
- [x] Services, Policies, Events, Notifications terorganisir
- [x] Database migrations dan seeders terdefinisi
- [x] Routes dipisah per role

---

## 9. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-FS-001 | Folder structure mengikuti konvensi Laravel 12 | ✅ |
| AC-FS-002 | Controllers dikelompokkan per role (Admin/Teacher/Student) | ✅ |
| AC-FS-003 | Views dikelompokkan per role | ✅ |
| AC-FS-004 | Service layer memiliki folder sendiri | ✅ |
| AC-FS-005 | Routes dipisahkan per file per role | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [23_DEVELOPMENT_GUIDELINES.md](./23_DEVELOPMENT_GUIDELINES.md)*


<!-- ============================================== -->
# SOURCE FILE: 23_DEVELOPMENT_GUIDELINES.md
<!-- ============================================== -->


# 23 — Development Guidelines

> **Dokumen Terkait:** [24_CODING_STANDARD.md](./24_CODING_STANDARD.md) · [21_LARAVEL_ARCHITECTURE.md](./21_LARAVEL_ARCHITECTURE.md) · [22_FOLDER_STRUCTURE.md](./22_FOLDER_STRUCTURE.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **panduan pengembangan** DIKELAS — workflow, Git conventions, code review process, dan best practices yang harus diikuti oleh seluruh tim development.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Konsistensi** | Workflow seragam di seluruh tim |
| **Kualitas** | Menjaga kualitas kode melalui review process |
| **Kolaborasi** | Menghindari konflik dan miskomunikasi |

---

## 3. Development Workflow

### 3.1 Git Branching Strategy

```
main ─────────────────────────────────────── (production)
  │
  └── develop ────────────────────────────── (staging)
        │
        ├── feature/auth-login ──────────── (fitur baru)
        ├── feature/classroom-crud ───────── (fitur baru)
        ├── bugfix/login-redirect ────────── (perbaikan bug)
        └── hotfix/security-patch ────────── (perbaikan urgent)
```

| Branch | Konvensi | Sumber | Merge Ke |
|---|---|---|---|
| `main` | Protected | — | — (production) |
| `develop` | Protected | `main` | `main` (release) |
| `feature/*` | `feature/{module}-{desc}` | `develop` | `develop` |
| `bugfix/*` | `bugfix/{desc}` | `develop` | `develop` |
| `hotfix/*` | `hotfix/{desc}` | `main` | `main` + `develop` |

### 3.2 Commit Convention

Format: `type(scope): description`

| Type | Deskripsi | Contoh |
|---|---|---|
| `feat` | Fitur baru | `feat(classroom): add join class by code` |
| `fix` | Perbaikan bug | `fix(auth): fix redirect after login` |
| `docs` | Dokumentasi | `docs(readme): update installation steps` |
| `style` | Formatting | `style(blade): fix indentation` |
| `refactor` | Refactoring | `refactor(service): extract grade calculation` |
| `test` | Testing | `test(classroom): add unit test for create` |
| `chore` | Maintenance | `chore(deps): update laravel to 12.1` |

### 3.3 Pull Request Process

```
1. Developer buat branch feature
2. Develop dan commit
3. Push ke remote
4. Buat Pull Request ke develop
5. Code review oleh minimal 1 reviewer
6. Fix review comments jika ada
7. Reviewer approve
8. Merge ke develop
```

---

## 4. Code Review Checklist

| No | Aspek | Pertanyaan |
|---|---|---|
| 1 | **Functionality** | Apakah kode berfungsi sesuai requirement? |
| 2 | **Architecture** | Apakah mengikuti layer architecture? |
| 3 | **Naming** | Apakah naming conventions konsisten? |
| 4 | **Validation** | Apakah input divalidasi di server? |
| 5 | **Authorization** | Apakah akses dikontrol dengan middleware/policy? |
| 6 | **Security** | Apakah ada potensi SQL injection, XSS, CSRF? |
| 7 | **Performance** | Apakah ada N+1 query? Perlu eager loading? |
| 8 | **Testing** | Apakah ada unit/feature test? |
| 9 | **Documentation** | Apakah kode terdokumentasi (PHPDoc)? |
| 10 | **DRY** | Apakah ada duplikasi yang bisa diekstrak? |

---

## 5. Development Environment Setup

### 5.1 Prerequisites

```bash
# Required
PHP 8.4+
MySQL 8.0+
Composer 2.x
Node.js 18+ & NPM 9+

# Optional
Laravel Valet (macOS) / XAMPP (Windows) / Docker
```

### 5.2 Initial Setup

```bash
# 1. Clone repository
git clone <repo-url>
cd DIKELAS

# 2. Install dependencies
composer install
npm install

# 3. Environment setup
cp .env.example .env
php artisan key:generate

# 4. Database setup
php artisan migrate
php artisan db:seed

# 5. Build assets
npm run dev

# 6. Start server
php artisan serve
```

### 5.3 Daily Development

```bash
# Start development
npm run dev              # Vite dev server (HMR)
php artisan serve        # Laravel dev server

# Database changes
php artisan make:migration create_xxx_table
php artisan migrate

# Clear cache
php artisan optimize:clear

# Run tests
php artisan test
```

---

## 6. Best Practices

### 6.1 Laravel Best Practices

| Practice | Deskripsi |
|---|---|
| **Eager Loading** | Selalu gunakan `with()` untuk relasi yang dibutuhkan |
| **Mass Assignment** | Definisikan `$fillable` di setiap model |
| **Soft Deletes** | Gunakan `SoftDeletes` untuk tabel utama |
| **Form Requests** | Validasi di FormRequest, bukan di controller |
| **Resource Routes** | Gunakan `Route::resource()` jika applicable |
| **Blade Components** | Ekstrak UI berulang ke Blade components |
| **Config over env** | Akses config via `config()`, bukan `env()` langsung |

### 6.2 Database Best Practices

| Practice | Deskripsi |
|---|---|
| **No raw queries** | Gunakan Eloquent/Query Builder |
| **Pagination** | Selalu paginate list yang bisa panjang |
| **Indexing** | Index kolom yang sering di-WHERE/JOIN |
| **Transactions** | Gunakan DB::transaction untuk operasi multi-table |
| **Migrations** | Semua perubahan schema via migration |

---

## 7. Checklist

- [x] Git branching strategy terdefinisi
- [x] Commit convention terdefinisi
- [x] Code review process terdefinisi
- [x] Development environment setup terdokumentasi
- [x] Best practices terdokumentasi
- [x] PR process terdefinisi

---

## 8. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-DG-001 | Semua developer mengikuti branching strategy | ✅ |
| AC-DG-002 | Commit messages mengikuti konvensi | ✅ |
| AC-DG-003 | Setiap PR di-review sebelum merge | ✅ |
| AC-DG-004 | Setup guide memungkinkan dev baru mulai dalam 30 menit | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [24_CODING_STANDARD.md](./24_CODING_STANDARD.md)*


<!-- ============================================== -->
# SOURCE FILE: 24_CODING_STANDARD.md
<!-- ============================================== -->


# 24 — Coding Standard

> **Dokumen Terkait:** [23_DEVELOPMENT_GUIDELINES.md](./23_DEVELOPMENT_GUIDELINES.md) · [21_LARAVEL_ARCHITECTURE.md](./21_LARAVEL_ARCHITECTURE.md) · [22_FOLDER_STRUCTURE.md](./22_FOLDER_STRUCTURE.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **standar penulisan kode** DIKELAS untuk memastikan konsistensi, keterbacaan, dan maintainability kode di seluruh proyek.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Keterbacaan** | Kode mudah dibaca oleh semua anggota tim |
| **Konsistensi** | Gaya penulisan seragam di seluruh proyek |
| **Kualitas** | Mengurangi bug dan technical debt |

---

## 3. PHP / Laravel Standards

### 3.1 Coding Style

| Aspek | Standard |
|---|---|
| **Base Standard** | PSR-12 |
| **Formatter** | Laravel Pint (default preset) |
| **PHP Version** | 8.4+ (gunakan fitur modern) |
| **Strict Types** | `declare(strict_types=1)` di file kritis |
| **Line Length** | Maksimum 120 karakter |
| **Indentation** | 4 spaces (bukan tab) |

### 3.2 Naming Conventions

| Aspek | Konvensi | Contoh |
|---|---|---|
| **Class** | PascalCase | `ClassroomController` |
| **Method** | camelCase | `createClassroom()` |
| **Variable** | camelCase | `$assignmentCount` |
| **Property** | camelCase | `$this->classroomService` |
| **Constant** | UPPER_SNAKE | `MAX_FILE_SIZE` |
| **Config Key** | snake_case | `app.timezone` |
| **Route Name** | dot notation | `teacher.classrooms.store` |
| **View File** | kebab-case | `class-detail.blade.php` |
| **Migration** | snake_case verb | `create_classrooms_table` |
| **Event** | PascalCase past tense | `AssignmentCreated` |
| **Listener** | PascalCase verb | `SendNotification` |

### 3.3 PHPDoc

```php
/**
 * Buat kelas baru untuk guru.
 *
 * @param  array<string, mixed>  $data
 * @param  User  $teacher
 * @return Classroom
 *
 * @throws \InvalidArgumentException
 */
public function createClassroom(array $data, User $teacher): Classroom
{
    // ...
}
```

| Rule | Deskripsi |
|---|---|
| Wajib untuk | Public methods, class, interface |
| Opsional untuk | Private methods (jika nama sudah jelas) |
| Format | `@param`, `@return`, `@throws` |
| Bahasa | Bahasa Indonesia untuk deskripsi |

### 3.4 Type Hints

```php
// ✅ Benar — gunakan type hints
public function store(StoreClassroomRequest $request): RedirectResponse
{
    $classroom = $this->service->create($request->validated(), auth()->user());
    return redirect()->route('teacher.classrooms.show', $classroom);
}

// ❌ Salah — tanpa type hints
public function store($request)
{
    // ...
}
```

---

## 4. Blade / Frontend Standards

### 4.1 Blade

| Aspek | Standard |
|---|---|
| **Output Escaping** | Selalu gunakan `{{ }}` (auto-escape) |
| **Raw Output** | `{!! !!}` hanya jika benar-benar diperlukan |
| **Directive** | `@if`, `@foreach`, `@auth`, `@role` |
| **Components** | Gunakan `<x-component>` untuk UI berulang |
| **Indentation** | 4 spaces |
| **Comment** | `{{-- Blade comment --}}` |

### 4.2 TailwindCSS

| Aspek | Standard |
|---|---|
| **Class Order** | Layout → Spacing → Sizing → Typography → Visual |
| **Responsive** | Mobile-first (`md:`, `lg:`) |
| **Custom** | Definisikan di `tailwind.config.js` |
| **Reusable** | Ekstrak ke Blade component, bukan `@apply` berlebihan |

### 4.3 AlpineJS

| Aspek | Standard |
|---|---|
| **Scope** | `x-data` di elemen terluar komponen |
| **Naming** | camelCase untuk properties |
| **Events** | `@click`, `@submit.prevent` |
| **Keep Simple** | Logika kompleks → pindah ke Livewire |

---

## 5. Database Standards

| Aspek | Standard |
|---|---|
| **Table** | snake_case, plural | 
| **Column** | snake_case, singular |
| **Primary Key** | `id` (auto increment) |
| **Foreign Key** | `{table_singular}_id` |
| **Boolean** | `is_` prefix |
| **Timestamp** | `_at` suffix |
| **Soft Delete** | `deleted_at` |
| **No Raw SQL** | Gunakan Eloquent / Query Builder |
| **Index** | Kolom yang sering di-WHERE |

---

## 6. Testing Standards

| Aspek | Standard |
|---|---|
| **Framework** | PHPUnit (default Laravel) |
| **Naming** | `test_` prefix atau `@test` annotation |
| **Structure** | Arrange → Act → Assert |
| **Coverage** | Minimal 80% untuk business logic |
| **Isolation** | Setiap test independent, gunakan `RefreshDatabase` |

```php
public function test_student_can_join_class_with_valid_code(): void
{
    // Arrange
    $student = User::factory()->student()->create();
    $classroom = Classroom::factory()->create(['code' => 'ABC123']);

    // Act
    $response = $this->actingAs($student)
        ->post('/student/classrooms/join', ['code' => 'ABC123']);

    // Assert
    $response->assertRedirect();
    $this->assertDatabaseHas('classroom_student', [
        'classroom_id' => $classroom->id,
        'student_id' => $student->id,
    ]);
}
```

---

## 7. Hal yang Harus Dihindari

| ❌ Jangan | ✅ Sebagai Gantinya |
|---|---|
| Business logic di Controller | Pindah ke Service |
| `env()` di luar config files | Gunakan `config()` |
| Raw SQL queries | Gunakan Eloquent |
| `dd()` di production | Gunakan Laravel Log |
| Hardcode strings | Gunakan lang files / constants |
| N+1 queries | Eager loading dengan `with()` |
| Fat controllers | Thin controller + Service |
| `*` di SELECT | Pilih kolom yang dibutuhkan |

---

## 8. Checklist

- [x] PSR-12 sebagai base standard
- [x] Naming conventions terdefinisi
- [x] PHPDoc requirements terdefinisi
- [x] Blade standards terdefinisi
- [x] Database naming conventions terdefinisi
- [x] Testing standards terdefinisi
- [x] Anti-patterns terdokumentasi

---

## 9. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-CS-001 | Semua kode lolos Laravel Pint tanpa error | ✅ |
| AC-CS-002 | Public methods memiliki PHPDoc | ✅ |
| AC-CS-003 | Type hints digunakan di semua method signatures | ✅ |
| AC-CS-004 | Tidak ada business logic di Controller | ✅ |
| AC-CS-005 | Naming conventions konsisten di seluruh codebase | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [25_UI_GUIDELINES.md](./25_UI_GUIDELINES.md)*


<!-- ============================================== -->
# SOURCE FILE: 25_UI_GUIDELINES.md
<!-- ============================================== -->


# 25 — UI Guidelines

> **Dokumen Terkait:** [03_PRODUCT_VISION.md](./03_PRODUCT_VISION.md) · [10_INFORMATION_ARCHITECTURE.md](./10_INFORMATION_ARCHITECTURE.md) · [05_USER_PERSONA.md](./05_USER_PERSONA.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **panduan desain UI** DIKELAS — design system, color palette, typography, spacing, komponen UI, dan prinsip desain yang harus diikuti untuk menciptakan antarmuka yang konsisten, modern, dan intuitif.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Konsistensi** | Semua halaman memiliki tampilan dan nuansa yang seragam |
| **Efisiensi** | Developer dan designer memiliki acuan komponen standar |
| **Aksesibilitas** | Antarmuka dapat digunakan oleh pengguna dengan berbagai kemampuan |

---

## 3. Design Principles

| No | Prinsip | Deskripsi |
|---|---|---|
| 1 | **Simplicity** | Tampilkan yang esensial, sembunyikan yang tidak perlu |
| 2 | **Consistency** | Elemen yang sama berperilaku sama di mana saja |
| 3 | **Feedback** | Setiap aksi user mendapat respons visual |
| 4 | **Hierarchy** | Informasi penting lebih menonjol |
| 5 | **Accessibility** | Warna kontras cukup, font mudah dibaca |

---

## 4. Color Palette

### 4.1 Brand Colors

| Nama | Hex | Penggunaan |
|---|---|---|
| **Primary** | `#4F46E5` (Indigo-600) | Tombol utama, link, aksen |
| **Primary Light** | `#818CF8` (Indigo-400) | Hover state, background ringan |
| **Primary Dark** | `#3730A3` (Indigo-800) | Active state, header |
| **Secondary** | `#0EA5E9` (Sky-500) | Aksen sekunder, info badge |

### 4.2 Semantic Colors

| Nama | Hex | Penggunaan |
|---|---|---|
| **Success** | `#22C55E` (Green-500) | Berhasil, dinilai, aktif |
| **Warning** | `#F59E0B` (Amber-500) | Peringatan, pending |
| **Danger** | `#EF4444` (Red-500) | Error, hapus, terlambat |
| **Info** | `#3B82F6` (Blue-500) | Informasi, submitted |

### 4.3 Neutral Colors

| Nama | Hex | Penggunaan |
|---|---|---|
| **White** | `#FFFFFF` | Background utama |
| **Gray-50** | `#F9FAFB` | Background sekunder |
| **Gray-100** | `#F3F4F6` | Card background |
| **Gray-200** | `#E5E7EB` | Border |
| **Gray-500** | `#6B7280` | Teks sekunder |
| **Gray-700** | `#374151` | Teks utama |
| **Gray-900** | `#111827` | Heading |

---

## 5. Typography

### 5.1 Font Family

| Penggunaan | Font | Fallback |
|---|---|---|
| **Heading** | Inter | system-ui, sans-serif |
| **Body** | Inter | system-ui, sans-serif |
| **Mono** | JetBrains Mono | monospace |

### 5.2 Font Scale

| Level | Size | Weight | Line Height | Penggunaan |
|---|---|---|---|---|
| **H1** | 30px / 1.875rem | Bold (700) | 1.2 | Judul halaman |
| **H2** | 24px / 1.5rem | Semibold (600) | 1.3 | Section heading |
| **H3** | 20px / 1.25rem | Semibold (600) | 1.4 | Sub-section |
| **H4** | 16px / 1rem | Semibold (600) | 1.4 | Card title |
| **Body** | 14px / 0.875rem | Regular (400) | 1.5 | Teks umum |
| **Small** | 12px / 0.75rem | Regular (400) | 1.5 | Label, caption |

---

## 6. Spacing System

Menggunakan skala 4px:

| Token | Value | Penggunaan |
|---|---|---|
| `space-1` | 4px | Micro spacing |
| `space-2` | 8px | Tight spacing |
| `space-3` | 12px | Compact |
| `space-4` | 16px | Default padding |
| `space-5` | 20px | Section gap |
| `space-6` | 24px | Card padding |
| `space-8` | 32px | Section gap besar |

---

## 7. Layout

### 7.1 Page Layout

```
┌─────────────────────────────────────────────────┐
│  Topbar (h: 64px, fixed top)                    │
├──────────┬──────────────────────────────────────┤
│ Sidebar  │  Main Content                        │
│ (w:256px)│  ┌────────────────────────────────┐  │
│          │  │ Page Header (Title + Actions)  │  │
│  Nav     │  ├────────────────────────────────┤  │
│  Items   │  │                                │  │
│          │  │ Content Area                   │  │
│          │  │ (max-w: 1280px, centered)      │  │
│          │  │                                │  │
│          │  └────────────────────────────────┘  │
└──────────┴──────────────────────────────────────┘
```

### 7.2 Responsive Breakpoints

| Breakpoint | Width | Layout |
|---|---|---|
| **Mobile** | < 768px | Sidebar tersembunyi (hamburger) |
| **Tablet** | 768px – 1023px | Sidebar collapsed (icon only) |
| **Desktop** | ≥ 1024px | Sidebar expanded |

---

## 8. Komponen UI

### 8.1 Button

| Variant | Penggunaan | Style |
|---|---|---|
| **Primary** | Aksi utama (Simpan, Buat) | bg-indigo-600 text-white |
| **Secondary** | Aksi sekunder (Batal) | bg-white border text-gray-700 |
| **Danger** | Aksi destruktif (Hapus) | bg-red-600 text-white |
| **Ghost** | Aksi ringan | bg-transparent text-gray-600 |

### 8.2 Card

```
┌──────────────────────────────┐
│  Card Header (optional)      │
├──────────────────────────────┤
│                              │
│  Card Content                │
│                              │
├──────────────────────────────┤
│  Card Footer (optional)      │
└──────────────────────────────┘

Style: bg-white rounded-lg shadow-sm border p-6
```

### 8.3 Table

| Fitur | Deskripsi |
|---|---|
| Header | bg-gray-50, text-gray-500, uppercase, text-xs |
| Row | border-b, hover:bg-gray-50 |
| Pagination | Bawah tabel, Laravel default |
| Empty State | Ilustrasi + pesan "Belum ada data" |

### 8.4 Badge / Status

| Status | Style |
|---|---|
| Aktif / Dinilai | `bg-green-100 text-green-800` |
| Pending | `bg-yellow-100 text-yellow-800` |
| Terlambat | `bg-red-100 text-red-800` |
| Submitted | `bg-blue-100 text-blue-800` |
| Archived | `bg-gray-100 text-gray-800` |

### 8.5 Form Elements

| Element | Style |
|---|---|
| Input | `border-gray-300 rounded-lg focus:ring-indigo-500` |
| Select | Same as input |
| Textarea | Same as input |
| Label | `text-sm font-medium text-gray-700` |
| Error | `text-sm text-red-600 mt-1` |

### 8.6 Toast / Alert

| Type | Style |
|---|---|
| Success | `bg-green-50 border-green-400 text-green-800` |
| Error | `bg-red-50 border-red-400 text-red-800` |
| Warning | `bg-yellow-50 border-yellow-400 text-yellow-800` |
| Info | `bg-blue-50 border-blue-400 text-blue-800` |

---

## 9. Icon System

| Library | Penggunaan |
|---|---|
| **Heroicons** | Navigation, UI icons |
| **Style** | Outline (24px) untuk navigasi, Solid (20px) untuk inline |

---

## 10. Checklist

- [x] Color palette terdefinisi (brand, semantic, neutral)
- [x] Typography scale terdefinisi
- [x] Spacing system terdefinisi
- [x] Layout structure terdefinisi
- [x] Responsive breakpoints terdefinisi
- [x] Komponen UI terdefinisi
- [x] Icon system terdefinisi

---

## 11. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-UI-001 | Color palette konsisten di semua halaman | ✅ |
| AC-UI-002 | Typography hierarchy terjaga | ✅ |
| AC-UI-003 | Responsive layout berfungsi di mobile, tablet, desktop | ✅ |
| AC-UI-004 | Semua status memiliki visual indicator (badge/color) | ✅ |
| AC-UI-005 | Toast/alert muncul untuk setiap user action | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [26_DEPLOYMENT_PLAN.md](./26_DEPLOYMENT_PLAN.md)*


<!-- ============================================== -->
# SOURCE FILE: 26_DEPLOYMENT_PLAN.md
<!-- ============================================== -->


# 26 — Deployment Plan

> **Dokumen Terkait:** [20_TECH_STACK.md](./20_TECH_STACK.md) · [27_TESTING_PLAN.md](./27_TESTING_PLAN.md) · [30_RELEASE_PLAN.md](./30_RELEASE_PLAN.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **rencana deployment** DIKELAS — strategi, environment, prosedur, dan checklist untuk men-deploy aplikasi ke server production.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Reliability** | Deployment yang konsisten dan repeatable |
| **Safety** | Rollback plan jika terjadi masalah |
| **Documentation** | Panduan langkah demi langkah untuk DevOps |

---

## 3. Deployment Strategy

### 3.1 Environments

| Environment | Tujuan | URL |
|---|---|---|
| **Local** | Development | `http://localhost:8000` |
| **Staging** | Testing & QA | `https://staging.dikelas.sch.id` |
| **Production** | Live | `https://dikelas.sch.id` |

### 3.2 Server Stack

```
┌──────────────────────────────────┐
│          Ubuntu 24.04            │
│  ┌────────────────────────────┐  │
│  │  Nginx 1.24+               │  │
│  │  ├── SSL (Let's Encrypt)   │  │
│  │  └── Reverse Proxy         │  │
│  ├────────────────────────────┤  │
│  │  PHP 8.4-FPM               │  │
│  │  └── Laravel Application   │  │
│  ├────────────────────────────┤  │
│  │  MySQL 8.0                 │  │
│  │  └── dikelas database      │  │
│  ├────────────────────────────┤  │
│  │  Supervisor                │  │
│  │  └── Queue Worker          │  │
│  ├────────────────────────────┤  │
│  │  Cron                      │  │
│  │  └── Laravel Scheduler     │  │
│  └────────────────────────────┘  │
└──────────────────────────────────┘
```

---

## 4. Server Requirements

| Requirement | Minimum | Recommended |
|---|---|---|
| **OS** | Ubuntu 22.04 | Ubuntu 24.04 LTS |
| **RAM** | 2 GB | 4 GB |
| **CPU** | 1 Core | 2 Core |
| **Storage** | 20 GB SSD | 100 GB SSD |
| **Bandwidth** | 1 TB/bulan | Unlimited |
| **PHP** | 8.4 | 8.4+ |
| **MySQL** | 8.0 | 8.0+ |
| **Nginx** | 1.18 | 1.24+ |

---

## 5. Deployment Procedure

### 5.1 First-time Setup

```bash
# 1. Server preparation
sudo apt update && sudo apt upgrade -y
sudo apt install nginx mysql-server php8.4-fpm php8.4-mysql \
    php8.4-mbstring php8.4-xml php8.4-curl php8.4-zip \
    php8.4-gd php8.4-bcmath php8.4-intl php8.4-fileinfo \
    composer nodejs npm supervisor -y

# 2. Clone repository
cd /var/www
git clone <repo-url> dikelas
cd dikelas

# 3. Install dependencies
composer install --no-dev --optimize-autoloader
npm install && npm run build

# 4. Environment config
cp .env.example .env
# Edit .env dengan production values
php artisan key:generate

# 5. Database
mysql -u root -p -e "CREATE DATABASE dikelas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
php artisan migrate --force
php artisan db:seed --force

# 6. Permissions
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

# 7. Optimization
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# 8. SSL
sudo certbot --nginx -d dikelas.sch.id

# 9. Supervisor (Queue Worker)
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start dikelas-worker:*

# 10. Cron (Scheduler)
# Tambahkan ke crontab:
# * * * * * cd /var/www/dikelas && php artisan schedule:run >> /dev/null 2>&1
```

### 5.2 Update Deployment

```bash
cd /var/www/dikelas

# 1. Maintenance mode
php artisan down

# 2. Pull latest code
git pull origin main

# 3. Update dependencies
composer install --no-dev --optimize-autoloader
npm install && npm run build

# 4. Migrate database
php artisan migrate --force

# 5. Clear & rebuild cache
php artisan optimize:clear
php artisan optimize

# 6. Restart services
sudo supervisorctl restart dikelas-worker:*
sudo systemctl restart php8.4-fpm

# 7. Exit maintenance mode
php artisan up
```

---

## 6. Nginx Configuration

```nginx
server {
    listen 80;
    server_name dikelas.sch.id;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    server_name dikelas.sch.id;
    root /var/www/dikelas/public;

    ssl_certificate /etc/letsencrypt/live/dikelas.sch.id/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/dikelas.sch.id/privkey.pem;

    index index.php;
    charset utf-8;
    client_max_body_size 50M;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.4-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

---

## 7. Backup Strategy

| Tipe | Frekuensi | Retensi | Metode |
|---|---|---|---|
| Database | Harian (00:00) | 30 hari | `mysqldump` + gzip |
| File Storage | Mingguan | 4 minggu | `tar` + gzip |
| Full Backup | Bulanan | 3 bulan | Database + Files + Config |

---

## 8. Monitoring

| Aspek | Tool | Metode |
|---|---|---|
| **Uptime** | UptimeRobot (free) | HTTP check setiap 5 menit |
| **Health Check** | `/health` endpoint | Return 200 OK |
| **Logs** | Laravel Log | `storage/logs/laravel.log` |
| **Disk** | Cron script | Alert jika > 80% |

---

## 9. Rollback Plan

```
Jika deployment gagal:
1. php artisan down
2. git checkout <previous-commit>
3. composer install --no-dev
4. php artisan migrate:rollback (jika perlu)
5. php artisan optimize
6. php artisan up
```

---

## 10. Checklist

- [x] Server requirements terdefinisi
- [x] Deployment procedure step-by-step
- [x] Nginx configuration tersedia
- [x] SSL/HTTPS dikonfigurasi
- [x] Queue worker setup (Supervisor)
- [x] Scheduler setup (Cron)
- [x] Backup strategy terdefinisi
- [x] Monitoring plan terdefinisi
- [x] Rollback plan terdefinisi

---

## 11. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-DP-001 | Deployment procedure reproducible | ✅ |
| AC-DP-002 | HTTPS aktif di production | ✅ |
| AC-DP-003 | Backup otomatis berjalan harian | ✅ |
| AC-DP-004 | Health check endpoint aktif | ✅ |
| AC-DP-005 | Rollback dapat dilakukan dalam 15 menit | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [27_TESTING_PLAN.md](./27_TESTING_PLAN.md)*


<!-- ============================================== -->
# SOURCE FILE: 27_TESTING_PLAN.md
<!-- ============================================== -->


# 27 — Testing Plan

> **Dokumen Terkait:** [26_DEPLOYMENT_PLAN.md](./26_DEPLOYMENT_PLAN.md) · [29_ACCEPTANCE_CRITERIA.md](./29_ACCEPTANCE_CRITERIA.md) · [08_FUNCTIONAL_REQUIREMENTS.md](./08_FUNCTIONAL_REQUIREMENTS.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **rencana pengujian** DIKELAS — strategi, jenis test, tools, dan coverage target untuk memastikan kualitas aplikasi sebelum rilis.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Kualitas** | Memastikan setiap fitur berfungsi sesuai spesifikasi |
| **Regresi** | Mencegah fitur yang sudah jalan rusak akibat perubahan baru |
| **Keamanan** | Memastikan tidak ada celah keamanan |
| **Performa** | Memastikan respons time memenuhi target |

---

## 3. Testing Strategy

### 3.1 Testing Pyramid

```
           ┌─────────┐
           │   E2E   │  ← Sedikit (browser tests)
          ┌┴─────────┴┐
          │Integration │  ← Sedang (feature tests)
         ┌┴───────────┴┐
         │  Unit Tests  │  ← Banyak (service/model tests)
         └─────────────┘
```

### 3.2 Jenis Testing

| Jenis | Scope | Tools | Coverage |
|---|---|---|---|
| **Unit Test** | Service, Model, Helper | PHPUnit | ≥ 80% |
| **Feature Test** | HTTP request → response | PHPUnit | ≥ 70% |
| **Browser Test** | UI end-to-end | Laravel Dusk (future) | Critical flows |
| **Security Test** | Auth, CSRF, XSS | Manual + automated | All auth routes |
| **Performance Test** | Load, response time | Laravel Debugbar | Key pages |

---

## 4. Unit Test Plan

### 4.1 Service Tests

| Service | Test Cases |
|---|---|
| `ClassroomService` | Create classroom, Generate unique code, Join class, Leave class |
| `AssignmentService` | Create assignment, Submit (before/after deadline), Grade submission |
| `QuizService` | Create quiz, Auto-grade PG, Calculate score |
| `GradeService` | Calculate average, Calculate weighted average, Export |
| `BackupService` | Create backup, Restore backup |
| `ImportService` | Parse Excel, Validate rows, Bulk insert |

### 4.2 Model Tests

| Model | Test Cases |
|---|---|
| `User` | Relationships (role, classrooms), Scopes (active, by role) |
| `Classroom` | Relationships (teacher, students, assignments), Code generation |
| `Assignment` | Status calculation, Deadline check |
| `Quiz` | Status (upcoming/active/ended), Score calculation |
| `Submission` | Late detection, Re-submit rules |

---

## 5. Feature Test Plan

### 5.1 Auth Tests

| Test | Expected |
|---|---|
| Login with valid credentials | Redirect to dashboard |
| Login with invalid credentials | Error message |
| Login rate limiting (6th attempt) | 429 response |
| Register as student | Account created, redirect |
| Register with existing email | Validation error |
| Logout | Session destroyed, redirect to login |
| Password reset request | Email sent |

### 5.2 Authorization Tests

| Test | Expected |
|---|---|
| Student access admin routes | 403 Forbidden |
| Teacher access admin routes | 403 Forbidden |
| Teacher edit other's classroom | 403 Forbidden |
| Student submit to non-enrolled class | 403 Forbidden |

### 5.3 Classroom Tests

| Test | Expected |
|---|---|
| Teacher create classroom | Classroom created, code generated |
| Student join with valid code | Enrolled, redirect |
| Student join with invalid code | Error |
| Student join already enrolled | Error |

### 5.4 Assignment Tests

| Test | Expected |
|---|---|
| Teacher create assignment | Assignment created |
| Student submit before deadline | Status: submitted |
| Student submit after deadline | Status: late |
| Teacher grade submission | Score saved |
| Student view own grades | Grades visible |

---

## 6. Security Test Checklist

- [ ] CSRF token required on all POST forms
- [ ] XSS prevention (script tags escaped)
- [ ] SQL injection prevention (parameterized queries)
- [ ] Authorization check on every protected route
- [ ] File upload validation (type, size, MIME)
- [ ] Rate limiting on login endpoint
- [ ] Session fixation prevention
- [ ] Sensitive data not exposed in responses
- [ ] `.env` not accessible via HTTP
- [ ] Debug mode off in production

---

## 7. Performance Test Targets

| Page | Target | Method |
|---|---|---|
| Dashboard | < 2s | Lighthouse |
| Class listing | < 1.5s | Debugbar |
| Assignment page | < 1.5s | Debugbar |
| Quiz page | < 2s | Debugbar |
| Admin dashboard | < 2s | Debugbar |
| File upload (10MB) | < 10s | Manual |
| Excel export (1000 rows) | < 30s | Manual |

---

## 8. Test Data

| Data | Quantity | Method |
|---|---|---|
| Users (students) | 100 | Factory |
| Users (teachers) | 10 | Factory |
| Classrooms | 20 | Factory |
| Assignments | 50 | Factory |
| Submissions | 200 | Factory |
| Quizzes | 20 | Factory |
| Quiz attempts | 100 | Factory |

---

## 9. UAT (User Acceptance Testing)

### 9.1 Skenario UAT

| No | Skenario | Tester | Expected |
|---|---|---|---|
| 1 | Guru mendaftar, buat kelas, upload materi, buat tugas | Guru sungguhan | Semua berhasil |
| 2 | Murid daftar, join kelas, lihat materi, submit tugas | Murid sungguhan | Semua berhasil |
| 3 | Admin import data, setup semester, backup | Operator sekolah | Semua berhasil |
| 4 | Guru buat quiz, murid kerjakan, lihat hasil | Guru + Murid | Auto-grading benar |

---

## 10. Checklist

- [x] Testing strategy (pyramid) terdefinisi
- [x] Unit test plan per service terdefinisi
- [x] Feature test plan per modul terdefinisi
- [x] Security test checklist tersedia
- [x] Performance targets terdefinisi
- [x] Test data requirements terdefinisi
- [x] UAT skenario terdefinisi

---

## 11. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-TP-001 | Unit test coverage ≥ 80% untuk services | ✅ |
| AC-TP-002 | Feature test untuk semua critical flows | ✅ |
| AC-TP-003 | Semua security test checklist passed | ✅ |
| AC-TP-004 | Performance targets terpenuhi | ✅ |
| AC-TP-005 | UAT skenario dilalui tanpa blocker | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [28_ROADMAP.md](./28_ROADMAP.md)*


<!-- ============================================== -->
# SOURCE FILE: 28_ROADMAP.md
<!-- ============================================== -->


# 28 — Roadmap

> **Dokumen Terkait:** [04_PRODUCT_SCOPE.md](./04_PRODUCT_SCOPE.md) · [30_RELEASE_PLAN.md](./30_RELEASE_PLAN.md) · [01_PRODUCT_REQUIREMENTS_DOCUMENT.md](./01_PRODUCT_REQUIREMENTS_DOCUMENT.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **peta jalan pengembangan (roadmap)** DIKELAS — timeline, milestones, dan deliverables dari fase dokumentasi hingga production release dan pengembangan lanjutan.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Planning** | Memberikan gambaran besar timeline pengembangan |
| **Tracking** | Memantau progress terhadap milestones |
| **Communication** | Mengkomunikasikan rencana ke stakeholder |

---

## 3. Roadmap Overview

```
Jul 2026          Agu 2026          Sep 2026          Okt 2026
├─ Fase 0 ─┤├──── Fase 1 ────┤├───── Fase 2 ─────┤├── Fase 3 ──┤
  Docs &       Foundation        Core Features       Advanced
  Planning     (3 minggu)        (4 minggu)          (3 minggu)

                   Nov 2026          Des 2026
                   ├─── Fase 4 ───┤├ Fase 5 ┤├ F6 ┤
                     Admin &        Testing    Deploy
                     Polish         & QA
                     (3 minggu)     (2 minggu) (1 mg)
```

---

## 4. Detail per Fase

### Fase 0: Dokumentasi & Planning (2 minggu)

| Minggu | Deliverable | Status |
|---|---|---|
| M1 | Project Overview, PRD, Business Requirements, Product Vision, Product Scope | ✅ |
| M2 | User Persona, User Roles, Feature List, Functional/Non-Functional Req, IA, User Flow, Sitemap | ✅ |
| M2 | Database Requirements, Security, Notification, Assignment, Quiz, Grade System | ✅ |
| M2 | Permission Matrix, Tech Stack, Architecture, Folder Structure, Guidelines | ✅ |
| M2 | Coding Standard, UI Guidelines, Deployment, Testing, Roadmap, Release Plan | ✅ |

**Milestone:** Seluruh dokumentasi di folder `docs/` selesai dan di-review.

---

### Fase 1: Foundation (3 minggu)

| Minggu | Deliverable |
|---|---|
| M3 | Project setup, Database design, Migrations, Seeders |
| M4 | Authentication (Login, Register, Logout, Reset Password) |
| M4 | Role middleware, Dashboard routing per role |
| M5 | Base layout (Sidebar, Topbar), UI components |
| M5 | Profile (View, Edit, Change Password) |

**Milestone:** User bisa register, login, dan melihat dashboard sesuai role.

| Kriteria Sukses | Target |
|---|---|
| Register → Login → Dashboard berfungsi | ✅ |
| Role-based redirect berfungsi | ✅ |
| Responsive layout berfungsi | ✅ |

---

### Fase 2: Core Features (4 minggu)

| Minggu | Deliverable |
|---|---|
| M6 | Manajemen Kelas (CRUD, Kode kelas, Join/Leave) |
| M7 | Manajemen Materi (Upload PDF/Video/Dokumen, Download, Topik) |
| M8 | Sistem Tugas (CRUD, Submission, Status tracking) |
| M9 | Sistem Penilaian (Input nilai, Rekap, Export Excel) |

**Milestone:** Guru bisa membuat kelas, upload materi, buat tugas. Murid bisa join, lihat materi, submit tugas, lihat nilai.

---

### Fase 3: Advanced Features (3 minggu)

| Minggu | Deliverable |
|---|---|
| M10 | Sistem Quiz (CRUD soal, Timer, Auto-grading) |
| M11 | Forum Diskusi (Post, Reply) + Pengumuman |
| M12 | Kalender + Notifikasi (In-App, Email) |

**Milestone:** Quiz, diskusi, kalender, dan notifikasi berfungsi.

---

### Fase 4: Administration & Polish (3 minggu)

| Minggu | Deliverable |
|---|---|
| M13 | Admin: CRUD Guru & Murid |
| M13 | Admin: CRUD Mapel, Semester, Tahun Ajaran |
| M14 | Admin: Backup & Restore, Import/Export Excel |
| M14 | Admin: Activity Log, Role & Permission |
| M15 | Admin: System Settings, UI Polish |
| M15 | Bug fixing, Performance optimization |

**Milestone:** Admin panel lengkap berfungsi.

---

### Fase 5: Testing & QA (2 minggu)

| Minggu | Deliverable |
|---|---|
| M16 | Unit Testing, Integration Testing |
| M17 | UAT (User Acceptance Testing), Security Testing |
| M17 | Bug fixing berdasarkan hasil testing |

**Milestone:** Semua test passed, UAT signed off.

---

### Fase 6: Deployment (1 minggu)

| Hari | Deliverable |
|---|---|
| H1-2 | Server setup, Staging deployment |
| H3-4 | Production deployment, SSL, Monitoring |
| H5 | Final testing, Go-live |

**Milestone:** Aplikasi live di production.

---

## 5. Post-Release Roadmap

### Tahun 1 (Q3-Q4 2026)

| Versi | Fitur |
|---|---|
| v1.1 | Bug fixes, Performance improvements |
| v1.2 | Dark mode, Enhanced notifications |
| v1.3 | Advanced analytics, Report generation |

### Tahun 2 (2027)

| Versi | Fitur |
|---|---|
| v2.0 | Mobile App (React Native) |
| v2.1 | Parent Portal |
| v2.2 | Attendance System, Gamification |
| v2.3 | Multi-language support |

### Tahun 3 (2028)

| Versi | Fitur |
|---|---|
| v3.0 | Multi-tenant SaaS |
| v3.1 | AI-powered features |
| v3.2 | DAPODIK Integration |

---

## 6. Risk & Mitigation

| Risk | Impact | Mitigation |
|---|---|---|
| Timeline slip | Sedang | Buffer 1 minggu per fase |
| Scope creep | Tinggi | Strict scope management |
| Key person dependency | Sedang | Knowledge sharing, documentation |
| Technical debt | Rendah | Code review, refactoring sprints |

---

## 7. Checklist

- [x] Roadmap per fase terdefinisi
- [x] Milestone per fase terdefinisi
- [x] Post-release roadmap terdefinisi
- [x] Risk & mitigation terdefinisi
- [x] Timeline realistis dan achievable
- [x] Deliverables jelas per minggu

---

## 8. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-RM-001 | Setiap fase memiliki deliverables yang jelas | ✅ |
| AC-RM-002 | Milestone terdefinisi dengan kriteria sukses | ✅ |
| AC-RM-003 | Post-release roadmap tersedia (3 tahun) | ✅ |
| AC-RM-004 | Risk assessment dan mitigation tersedia | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [29_ACCEPTANCE_CRITERIA.md](./29_ACCEPTANCE_CRITERIA.md)*


<!-- ============================================== -->
# SOURCE FILE: 29_ACCEPTANCE_CRITERIA.md
<!-- ============================================== -->


# 29 — Acceptance Criteria

> **Dokumen Terkait:** [27_TESTING_PLAN.md](./27_TESTING_PLAN.md) · [08_FUNCTIONAL_REQUIREMENTS.md](./08_FUNCTIONAL_REQUIREMENTS.md) · [30_RELEASE_PLAN.md](./30_RELEASE_PLAN.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **kriteria penerimaan** DIKELAS — kondisi yang harus dipenuhi agar setiap modul dan fitur dianggap selesai dan siap dirilis. Kriteria ini menjadi acuan untuk QA Engineer dan Product Owner dalam proses sign-off.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Clarity** | Definisi "selesai" yang jelas dan terukur |
| **Quality Gate** | Standar minimum yang harus dipenuhi |
| **Sign-off** | Acuan untuk Product Owner menerima deliverable |

---

## 3. Definition of Done (Global)

Setiap fitur dianggap **"Done"** jika memenuhi SEMUA kriteria berikut:

| No | Kriteria | Kategori |
|---|---|---|
| 1 | Fitur berfungsi sesuai spesifikasi di PRD | Functional |
| 2 | UI sesuai dengan UI Guidelines | Design |
| 3 | Responsive di mobile, tablet, dan desktop | Design |
| 4 | Validasi input berfungsi (server-side) | Security |
| 5 | Authorization/permission benar untuk setiap role | Security |
| 6 | Tidak ada error di console browser | Quality |
| 7 | Page load time < 2 detik | Performance |
| 8 | Unit test tersedia untuk business logic | Testing |
| 9 | Feature test tersedia untuk critical flows | Testing |
| 10 | Code review telah dilakukan dan approved | Process |
| 11 | Tidak ada P0/P1 bug yang belum diperbaiki | Quality |

---

## 4. Acceptance Criteria per Modul

### 4.1 AC: Autentikasi

| ID | Kriteria | Prioritas |
|---|---|---|
| AC-AUTH-001 | User dapat login dengan email dan password valid | P0 |
| AC-AUTH-002 | Login gagal menampilkan pesan error yang sesuai | P0 |
| AC-AUTH-003 | Rate limiting aktif setelah 5 percobaan gagal | P0 |
| AC-AUTH-004 | Murid dapat mendaftar akun baru | P0 |
| AC-AUTH-005 | User diarahkan ke dashboard sesuai role setelah login | P0 |
| AC-AUTH-006 | Logout menghapus session dan redirect ke login | P0 |
| AC-AUTH-007 | Reset password via email berfungsi | P1 |

### 4.2 AC: Manajemen Kelas

| ID | Kriteria | Prioritas |
|---|---|---|
| AC-CLS-001 | Guru dapat membuat kelas baru dengan kode unik otomatis | P0 |
| AC-CLS-002 | Murid dapat bergabung ke kelas dengan kode valid | P0 |
| AC-CLS-003 | Error muncul jika kode kelas invalid | P0 |
| AC-CLS-004 | Error muncul jika murid sudah terdaftar di kelas | P0 |
| AC-CLS-005 | Guru dapat melihat daftar anggota kelas | P0 |
| AC-CLS-006 | Guru dapat mengedit informasi kelas | P0 |
| AC-CLS-007 | Guru dapat mengarsipkan kelas | P1 |
| AC-CLS-008 | Guru dapat mengeluarkan murid dari kelas | P1 |

### 4.3 AC: Materi

| ID | Kriteria | Prioritas |
|---|---|---|
| AC-MAT-001 | Guru dapat upload materi PDF (max 25MB) | P0 |
| AC-MAT-002 | Guru dapat upload video (max 50MB) | P0 |
| AC-MAT-003 | Guru dapat upload dokumen Word/PPT (max 10MB) | P0 |
| AC-MAT-004 | Murid dapat melihat daftar materi per kelas | P0 |
| AC-MAT-005 | Murid dapat download materi | P0 |
| AC-MAT-006 | File tersimpan di non-public storage | P0 |
| AC-MAT-007 | Progress bar muncul saat upload | P1 |

### 4.4 AC: Tugas

| ID | Kriteria | Prioritas |
|---|---|---|
| AC-ASG-001 | Guru dapat membuat tugas dengan deadline | P0 |
| AC-ASG-002 | Murid dapat upload jawaban tugas | P0 |
| AC-ASG-003 | Status berubah saat submit (submitted/late) | P0 |
| AC-ASG-004 | Guru dapat menilai submission (0-100) | P0 |
| AC-ASG-005 | Murid dapat melihat nilai dan feedback | P0 |
| AC-ASG-006 | Re-submit berfungsi sebelum deadline | P1 |
| AC-ASG-007 | Notifikasi terkirim saat tugas baru | P1 |

### 4.5 AC: Quiz

| ID | Kriteria | Prioritas |
|---|---|---|
| AC-QZ-001 | Guru dapat membuat quiz dengan soal PG | P0 |
| AC-QZ-002 | Timer berjalan saat murid mengerjakan | P0 |
| AC-QZ-003 | Auto-submit saat timer habis | P0 |
| AC-QZ-004 | Auto-grading benar untuk soal PG | P0 |
| AC-QZ-005 | Murid melihat hasil setelah selesai | P0 |
| AC-QZ-006 | Soal essay dapat dinilai manual | P1 |
| AC-QZ-007 | Quiz hanya bisa dikerjakan 1 kali | P0 |

### 4.6 AC: Penilaian

| ID | Kriteria | Prioritas |
|---|---|---|
| AC-GRD-001 | Murid dapat melihat nilai per tugas dan quiz | P0 |
| AC-GRD-002 | Guru dapat melihat rekap nilai per kelas | P0 |
| AC-GRD-003 | Rata-rata nilai dihitung otomatis | P0 |
| AC-GRD-004 | Export nilai ke Excel berfungsi | P1 |

### 4.7 AC: Administrasi

| ID | Kriteria | Prioritas |
|---|---|---|
| AC-ADM-001 | Admin dapat CRUD guru | P0 |
| AC-ADM-002 | Admin dapat CRUD murid | P0 |
| AC-ADM-003 | Admin dapat CRUD mata pelajaran | P0 |
| AC-ADM-004 | Admin dapat CRUD semester dan tahun ajaran | P0 |
| AC-ADM-005 | Backup database berfungsi | P0 |
| AC-ADM-006 | Restore database berfungsi | P0 |
| AC-ADM-007 | Import Excel berfungsi dengan error report | P1 |
| AC-ADM-008 | Activity log mencatat aksi penting | P0 |

---

## 5. Non-Functional Acceptance Criteria

| ID | Kriteria | Target |
|---|---|---|
| AC-NF-001 | Page load time | < 2 detik |
| AC-NF-002 | API response time | < 500ms |
| AC-NF-003 | Concurrent users | ≥ 500 |
| AC-NF-004 | Uptime | ≥ 99.5% |
| AC-NF-005 | Browser support | Chrome, Firefox, Safari, Edge (2 versi terakhir) |
| AC-NF-006 | Mobile responsive | Berfungsi di 320px+ |
| AC-NF-007 | Security audit | Lolos semua security checklist |

---

## 6. Sign-off Process

```
Developer selesai ──▶ Code Review ──▶ QA Testing ──▶ UAT ──▶ Sign-off
                         │                │             │
                     Fix issues       Fix bugs      Approve
```

| Stage | Responsible | Deliverable |
|---|---|---|
| Code Review | Tech Lead | Approved PR |
| QA Testing | QA Engineer | Test Report |
| UAT | Product Owner + End Users | Acceptance Sign-off |
| Release | DevOps | Production Deployment |

---

## 7. Checklist

- [x] Definition of Done global terdefinisi
- [x] Acceptance criteria per modul terdefinisi
- [x] Non-functional criteria terdefinisi
- [x] Sign-off process terdefinisi
- [x] Setiap kriteria memiliki prioritas (P0/P1)

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [30_RELEASE_PLAN.md](./30_RELEASE_PLAN.md)*


<!-- ============================================== -->
# SOURCE FILE: 30_RELEASE_PLAN.md
<!-- ============================================== -->


# 30 — Release Plan

> **Dokumen Terkait:** [28_ROADMAP.md](./28_ROADMAP.md) · [26_DEPLOYMENT_PLAN.md](./26_DEPLOYMENT_PLAN.md) · [29_ACCEPTANCE_CRITERIA.md](./29_ACCEPTANCE_CRITERIA.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **rencana rilis** DIKELAS — versi, jadwal rilis, kriteria rilis, dan proses go-live untuk setiap versi aplikasi.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Planning** | Jadwal rilis yang jelas dan terstruktur |
| **Quality** | Kriteria yang harus dipenuhi sebelum rilis |
| **Communication** | Mengkomunikasikan rencana ke stakeholder |

---

## 3. Versioning

Menggunakan **Semantic Versioning (SemVer)**: `MAJOR.MINOR.PATCH`

| Komponen | Kapan Berubah | Contoh |
|---|---|---|
| **MAJOR** | Breaking changes, arsitektur baru | 1.0.0 → 2.0.0 |
| **MINOR** | Fitur baru, backward-compatible | 1.0.0 → 1.1.0 |
| **PATCH** | Bug fix, perbaikan kecil | 1.0.0 → 1.0.1 |

---

## 4. Release Schedule

### 4.1 MVP Release (v1.0.0)

| Atribut | Detail |
|---|---|
| **Versi** | 1.0.0 |
| **Target Rilis** | Desember 2026 |
| **Tipe** | Major Release |
| **Target User** | 1 sekolah pilot |

**Fitur yang Dirilis:**

| Modul | Fitur |
|---|---|
| Auth | Login, Register, Logout, Reset Password |
| Dashboard | Dashboard per role |
| Kelas | CRUD, Join/Leave, Kode kelas |
| Materi | Upload/Download (PDF, Video, Dokumen) |
| Tugas | CRUD, Submission, Penilaian |
| Quiz | PG + B/S + Essay, Auto-grading, Timer |
| Nilai | Input, Rekap, Export Excel |
| Kalender | Deadline tugas, Jadwal quiz |
| Diskusi | Forum per kelas |
| Pengumuman | Kelas + Global |
| Profil | View, Edit, Change Password |
| Admin | CRUD User, Data Master, Backup, Import/Export, Log |

---

### 4.2 Post-MVP Releases

| Versi | Target | Fitur Utama |
|---|---|---|
| **v1.1.0** | Jan 2027 | Bug fixes, Performance improvements |
| **v1.2.0** | Feb 2027 | Dark mode, Enhanced notifications |
| **v1.3.0** | Apr 2027 | Advanced analytics, Report dashboard |
| **v2.0.0** | Jul 2027 | Mobile App, Parent Portal |

---

## 5. Release Criteria

### 5.1 Pre-release Checklist

| No | Kriteria | Responsible |
|---|---|---|
| 1 | Semua fitur P0 berfungsi sesuai spesifikasi | QA |
| 2 | Unit test coverage ≥ 80% | Dev |
| 3 | Feature tests untuk critical flows passed | QA |
| 4 | Security checklist passed | Dev + QA |
| 5 | Performance targets terpenuhi | Dev |
| 6 | UAT signed off oleh end users | Product Owner |
| 7 | Tidak ada bug P0/P1 yang open | QA |
| 8 | Deployment documentation updated | DevOps |
| 9 | Backup mechanism tested | DevOps |
| 10 | Rollback plan ready | DevOps |

### 5.2 Go/No-Go Decision

| Kondisi | Keputusan |
|---|---|
| Semua kriteria terpenuhi | ✅ **GO** |
| Bug P1 masih open (< 3) | ⚠️ **GO** dengan known issues |
| Bug P0 masih open | ❌ **NO-GO** — fix dulu |
| UAT belum signed off | ❌ **NO-GO** — selesaikan UAT |
| Performance target tidak tercapai | ❌ **NO-GO** — optimize dulu |

---

## 6. Release Process

```
[Code Freeze] ──▶ [Final Testing] ──▶ [Go/No-Go Meeting]
                                              │
                                    ┌─────────┴──────────┐
                                    │                    │
                                  [GO]              [NO-GO]
                                    │                    │
                              [Staging Deploy]     [Fix Issues]
                                    │                    │
                              [Staging Test]       [Re-test]
                                    │                    │
                              [Production Deploy]  [Back to Review]
                                    │
                              [Smoke Test]
                                    │
                              [Announce Release]
                                    │
                              [Monitor 48 hours]
```

### 6.1 Timeline Rilis

| Hari | Aktivitas |
|---|---|
| **H-7** | Code freeze, final bug fixing |
| **H-5** | Final QA testing |
| **H-3** | Go/No-Go meeting |
| **H-2** | Staging deployment & testing |
| **H-1** | Production deployment preparation |
| **H-0** | Production deployment (go-live) |
| **H+1** | Monitoring & hotfix jika perlu |
| **H+2** | Post-release review |

---

## 7. Release Notes Template

```markdown
# DIKELAS v1.0.0 — Release Notes

**Tanggal Rilis:** [tanggal]

## ✨ Fitur Baru
- [daftar fitur baru]

## 🐛 Bug Fixes
- [daftar bug yang diperbaiki]

## ⚡ Improvements
- [daftar peningkatan]

## ⚠️ Known Issues
- [daftar masalah yang diketahui]

## 📋 Upgrade Notes
- [instruksi upgrade jika ada]
```

---

## 8. Post-Release Activities

| Aktivitas | Timeline | Responsible |
|---|---|---|
| Monitor error logs | 48 jam pertama | DevOps |
| Collect user feedback | 1 minggu pertama | Product |
| Fix critical bugs | ASAP | Dev |
| Performance review | 1 minggu | Dev |
| Retrospective meeting | 2 minggu | Seluruh tim |
| Plan next release | 2 minggu | Product |

---

## 9. Checklist

- [x] Versioning strategy terdefinisi (SemVer)
- [x] MVP release scope terdefinisi
- [x] Post-MVP release schedule terdefinisi
- [x] Release criteria dan checklist tersedia
- [x] Go/No-Go decision matrix tersedia
- [x] Release process step-by-step terdefinisi
- [x] Release notes template tersedia
- [x] Post-release activities terdefinisi

---

## 10. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-RL-001 | Release criteria jelas dan terukur | ✅ |
| AC-RL-002 | Go/No-Go decision matrix tersedia | ✅ |
| AC-RL-003 | Release process reproducible | ✅ |
| AC-RL-004 | Post-release monitoring plan tersedia | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Kembali ke: [00_PROJECT_OVERVIEW.md](./00_PROJECT_OVERVIEW.md)*

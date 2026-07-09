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

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

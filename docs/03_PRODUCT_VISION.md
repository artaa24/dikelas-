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

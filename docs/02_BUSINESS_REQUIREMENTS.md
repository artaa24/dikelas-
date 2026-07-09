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

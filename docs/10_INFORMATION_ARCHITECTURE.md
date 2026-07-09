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

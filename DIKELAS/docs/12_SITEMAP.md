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

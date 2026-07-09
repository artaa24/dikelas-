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

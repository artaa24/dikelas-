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

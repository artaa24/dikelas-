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

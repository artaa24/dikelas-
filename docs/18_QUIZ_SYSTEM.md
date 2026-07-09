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

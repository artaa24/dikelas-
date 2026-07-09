# 11 — User Flow

> **Dokumen Terkait:** [05_USER_PERSONA.md](./05_USER_PERSONA.md) · [07_FEATURE_LIST.md](./07_FEATURE_LIST.md) · [10_INFORMATION_ARCHITECTURE.md](./10_INFORMATION_ARCHITECTURE.md)

---

## 1. Tujuan

Dokumen ini mendefinisikan **alur perjalanan pengguna** (user flow) untuk setiap skenario utama di DIKELAS. Setiap flow menggambarkan langkah-langkah dari titik masuk hingga penyelesaian tugas.

---

## 2. Flow: Registrasi Murid

```
[Halaman Landing]
       │
       ▼
[Klik "Daftar"]
       │
       ▼
[Form Registrasi]
├── Input: Nama Lengkap
├── Input: Email
├── Input: Password
└── Input: Konfirmasi Password
       │
       ▼
[Klik "Daftar"] ──── Validasi Gagal? ──▶ [Tampilkan Error] ──▶ [Kembali ke Form]
       │
       │ Validasi Berhasil
       ▼
[Akun Terbuat (role: student)]
       │
       ▼
[Redirect ke Dashboard Murid]
       │
       ▼
[Dashboard Murid - Empty State]
├── "Belum ada kelas"
└── Tombol "Gabung Kelas"
```

---

## 3. Flow: Login

```
[Halaman Login]
       │
       ▼
[Input Email & Password]
       │
       ▼
[Klik "Masuk"] ──── Gagal? ──▶ [Error: "Email atau password salah"]
       │                              │
       │ Berhasil                      ▼
       │                        [Rate limit check]
       ▼                        (max 5x/menit)
[Cek Role User]
       │
       ├── role = student ──▶ [Dashboard Murid]
       ├── role = teacher ──▶ [Dashboard Guru]
       └── role = super_admin ──▶ [Dashboard Admin]
```

---

## 4. Flow: Murid Bergabung ke Kelas

```
[Dashboard Murid]
       │
       ▼
[Klik "Gabung Kelas"]
       │
       ▼
[Modal: Input Kode Kelas]
├── Input: Kode (6 karakter)
       │
       ▼
[Klik "Gabung"] ──── Kode Invalid? ──▶ [Error: "Kode tidak ditemukan"]
       │                │
       │                └── Sudah Terdaftar? ──▶ [Error: "Sudah di kelas ini"]
       │
       │ Berhasil
       ▼
[Murid ditambahkan ke kelas]
       │
       ▼
[Redirect ke Halaman Kelas]
       │
       ▼
[Kelas Stream: Materi, Tugas, Pengumuman]
```

---

## 5. Flow: Guru Membuat Kelas

```
[Dashboard Guru]
       │
       ▼
[Klik "Buat Kelas"]
       │
       ▼
[Form Buat Kelas]
├── Input: Nama Kelas (misal: "XI IPA 1 - Matematika")
├── Input: Deskripsi
├── Select: Mata Pelajaran
└── Select: Semester
       │
       ▼
[Klik "Buat"] ──── Validasi Gagal? ──▶ [Tampilkan Error]
       │
       │ Berhasil
       ▼
[Kelas Terbuat]
├── Kode kelas di-generate: "A7X2K9"
└── Guru otomatis jadi pemilik
       │
       ▼
[Redirect ke Halaman Kelas]
├── Tab: Stream (kosong)
├── Tab: Materi
├── Tab: Tugas
├── Tab: Anggota
└── Info: Kode kelas untuk dibagikan ke murid
```

---

## 6. Flow: Guru Upload Materi

```
[Halaman Kelas → Tab Materi]
       │
       ▼
[Klik "Tambah Materi"]
       │
       ▼
[Form Upload Materi]
├── Input: Judul
├── Input: Deskripsi (opsional)
├── Select: Topik/Bab
├── Upload: File (PDF/Video/Dokumen)
│   ├── Drag & Drop area
│   └── Atau klik "Pilih File"
       │
       ▼
[Upload Progress Bar: 0%...50%...100%]
       │
       ▼
[Klik "Simpan"] ──── Validasi Gagal? ──▶ [Error: File terlalu besar / format tidak didukung]
       │
       │ Berhasil
       ▼
[Materi Tersimpan]
       │
       ▼
[Tampil di daftar materi kelas]
[Murid dapat melihat dan download]
```

---

## 7. Flow: Guru Membuat Tugas

```
[Halaman Kelas → Tab Tugas]
       │
       ▼
[Klik "Buat Tugas"]
       │
       ▼
[Form Buat Tugas]
├── Input: Judul Tugas
├── Input: Instruksi / Deskripsi (rich text)
├── Input: Nilai Maksimal (0-100)
├── Input: Deadline (date & time picker)
└── Upload: Lampiran (opsional)
       │
       ▼
[Klik "Publish"] ──── Validasi Gagal? ──▶ [Error]
       │
       │ Berhasil
       ▼
[Tugas Terbuat & Dipublish]
       │
       ▼
[Tampil di kelas stream]
[Tampil di kalender murid]
[Notifikasi ke murid di kelas]
```

---

## 8. Flow: Murid Mengerjakan Tugas

```
[Dashboard → Tugas Pending]
       │
       ▼
[Klik tugas yang ingin dikerjakan]
       │
       ▼
[Halaman Detail Tugas]
├── Judul, Instruksi, Deadline
├── Lampiran guru (download)
├── Status: "Belum Dikerjakan"
└── Form Submit
       │
       ▼
[Upload File Jawaban]
├── Pilih file dari device
├── Catatan (opsional)
       │
       ▼
[Klik "Kirim"] ──── Setelah deadline? ──▶ [Submit dengan status "Terlambat"]
       │
       │ Sebelum deadline
       ▼
[Submission Terkirim]
├── Status: "Sudah Dikerjakan" ✅
├── Waktu submit tercatat
└── Opsi: "Kirim Ulang" (sebelum deadline)
       │
       ▼
[Menunggu Penilaian Guru]
       │
       ▼
[Guru Menilai] ──▶ [Status: "Dinilai" - Nilai: 85/100]
       │
       ▼
[Murid melihat nilai dan feedback]
```

---

## 9. Flow: Guru Menilai Tugas

```
[Dashboard → "45 submission perlu dinilai"]
       │
       ▼
[Klik tugas yang ingin dinilai]
       │
       ▼
[Halaman Daftar Submission]
├── Filter: Semua / Belum Dinilai / Sudah Dinilai
├── Tabel: Nama Murid | Waktu Submit | Status | Aksi
       │
       ▼
[Klik "Nilai" pada submission]
       │
       ▼
[Halaman Detail Submission]
├── Info murid
├── File jawaban (preview/download)
├── Form Penilaian:
│   ├── Input: Nilai (0-100)
│   └── Input: Feedback (opsional)
       │
       ▼
[Klik "Simpan Nilai"]
       │
       ▼
[Nilai tersimpan]
├── Status submission: "Dinilai"
├── Murid melihat nilai di halaman tugas
└── Lanjut ke submission berikutnya
```

---

## 10. Flow: Quiz (Murid)

```
[Dashboard / Kelas → Quiz Tersedia]
       │
       ▼
[Klik quiz yang akan dikerjakan]
       │
       ▼
[Halaman Info Quiz]
├── Judul, Deskripsi
├── Jumlah Soal, Durasi
├── Periode: 09 Jul 2026, 08:00 - 10:00
└── Tombol "Mulai Quiz"
       │
       ▼
[Klik "Mulai Quiz"] ──── Belum waktunya? ──▶ [Tombol disabled]
       │                    Sudah lewat? ──▶ ["Quiz sudah berakhir"]
       │
       │ Dalam periode
       ▼
[Quiz Dimulai - Timer Berjalan]
├── Soal 1/10: [Pilihan Ganda]
│   ├── A. ...
│   ├── B. ...
│   ├── C. ...
│   └── D. ...
├── Navigation: ◀ Prev | Next ▶
└── Progress: ████████░░ 8/10
       │
       ▼
[Klik "Selesai"] ──── Konfirmasi? ──▶ [Modal: "Yakin selesai? X soal belum dijawab"]
       │                                      │
       │                                      ├── Klik "Kembali" ──▶ [Lanjut mengerjakan]
       │                                      └── Klik "Ya, Selesai" ──▼
       │ Timer habis (auto-submit)                                     │
       ▼◀──────────────────────────────────────────────────────────────┘
[Quiz Selesai]
       │
       ▼
[Halaman Hasil]
├── Skor: 85/100
├── Detail per soal (benar/salah)
└── Soal essay: "Menunggu penilaian guru"
```

---

## 11. Flow: Super Admin - Import Data

```
[Dashboard Admin]
       │
       ▼
[Sidebar → Data → Import Excel]
       │
       ▼
[Halaman Import]
├── Select: Tipe Data (Guru / Murid)
├── Link: "Download Template Excel"
├── Upload: File Excel (.xlsx)
       │
       ▼
[Upload file Excel]
       │
       ▼
[Klik "Import"] 
       │
       ▼
[Proses Import - Loading]
├── Validasi setiap baris
├── Progress indicator
       │
       ▼
[Hasil Import]
├── ✅ Berhasil: 45 data
├── ❌ Gagal: 3 data
│   ├── Baris 12: Email sudah terdaftar
│   ├── Baris 25: Format email invalid
│   └── Baris 38: Nama kosong
└── Tombol: "Download Error Report"
```

---

## 12. Flow: Super Admin - Backup & Restore

```
[Sidebar → Data → Backup & Restore]
       │
       ▼
[Halaman Backup]
├── Tombol: "Backup Sekarang"
├── Tabel Histori Backup:
│   ├── Tanggal | Ukuran | Status | Aksi
│   ├── 09 Jul 2026 00:00 | 15 MB | ✅ Berhasil | Download / Restore / Hapus
│   └── 08 Jul 2026 00:00 | 14 MB | ✅ Berhasil | Download / Restore / Hapus
       │
       ├── [Klik "Backup Sekarang"]
       │   ▼
       │   [Proses backup...] ──▶ [Berhasil! File tersimpan]
       │
       └── [Klik "Restore"]
           ▼
           [Konfirmasi: "Restore akan menimpa data saat ini. Lanjutkan?"]
           ├── Batal ──▶ [Kembali]
           └── Ya ──▶ [Proses restore...] ──▶ [Berhasil! Data telah dipulihkan]
```

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [12_SITEMAP.md](./12_SITEMAP.md)*

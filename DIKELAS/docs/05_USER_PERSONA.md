# 05 — User Persona

> **Dokumen Terkait:** [04_PRODUCT_SCOPE.md](./04_PRODUCT_SCOPE.md) · [06_USER_ROLES.md](./06_USER_ROLES.md) · [11_USER_FLOW.md](./11_USER_FLOW.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **persona pengguna** DIKELAS — representasi fiktif namun realistis dari pengguna utama platform. Persona digunakan sebagai acuan oleh seluruh tim (Product, Design, Engineering, QA) untuk memastikan setiap keputusan desain dan teknis berpusat pada kebutuhan pengguna nyata.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Empati** | Memahami kebutuhan, motivasi, dan frustrasi pengguna |
| **Prioritas Fitur** | Menentukan fitur mana yang paling berdampak bagi persona utama |
| **Desain UI/UX** | Merancang antarmuka yang sesuai dengan kemampuan dan preferensi pengguna |
| **Testing** | Membuat skenario pengujian yang realistis |
| **Komunikasi Tim** | Menciptakan bahasa bersama saat membahas kebutuhan pengguna |

---

## 3. Ruang Lingkup

Dokumen ini mencakup **3 persona utama** yang merepresentasikan 3 role dalam DIKELAS:

| No | Persona | Role | Segmen |
|---|---|---|---|
| 1 | Rina Permata Sari | Murid (Student) | SMA/SMK Kelas XI |
| 2 | Budi Santoso, S.Pd. | Guru (Teacher) | Guru Matematika SMA |
| 3 | Dewi Anggraini, M.Pd. | Super Admin (Administrator) | Wakil Kepala Sekolah Bidang Kurikulum |

---

## 4. Persona 1: Rina Permata Sari — Murid

### 4.1 Profil

```
┌──────────────────────────────────────────────────────────┐
│  👩‍🎓  RINA PERMATA SARI                                  │
│  ─────────────────────────────────                       │
│  Role     : Murid (Student)                              │
│  Usia     : 16 tahun                                     │
│  Sekolah  : SMA Negeri 1 Bandung                         │
│  Kelas    : XI IPA 2                                     │
│  Device   : Smartphone Android (primary), Laptop (tugas) │
│  Internet : WiFi rumah + paket data 15GB/bulan           │
└──────────────────────────────────────────────────────────┘
```

### 4.2 Latar Belakang

Rina adalah siswi SMA kelas XI jurusan IPA yang aktif dan berprestasi. Dia terbiasa menggunakan smartphone untuk keperluan sehari-hari termasuk belajar. Rina mengikuti 8 mata pelajaran dan sering merasa kewalahan mengingat semua deadline tugas dari berbagai guru yang dikirim lewat WhatsApp Group yang berbeda-beda.

### 4.3 Motivasi & Tujuan

| No | Tujuan |
|---|---|
| 1 | Mengetahui semua tugas yang harus dikerjakan dalam satu tempat |
| 2 | Mengakses materi pelajaran kapan saja dan di mana saja |
| 3 | Submit tugas dengan mudah tanpa harus kirim via WhatsApp |
| 4 | Melihat nilai secara transparan dan real-time |
| 5 | Berdiskusi dengan guru dan teman sekelas |

### 4.4 Frustrasi (Pain Points)

| No | Pain Point | Tingkat |
|---|---|---|
| 1 | Tugas tersebar di banyak WhatsApp Group, sering terlewat | 🔴 Tinggi |
| 2 | Tidak tahu kapan deadline tugas karena pesan chat tertimbun | 🔴 Tinggi |
| 3 | Harus kirim tugas satu-satu ke guru via WA, sering double kirim | 🟡 Sedang |
| 4 | Tidak bisa cek nilai secara langsung, harus tanya guru | 🟡 Sedang |
| 5 | Materi pelajaran tersebar di Google Drive yang berbeda-beda | 🟡 Sedang |
| 6 | Aplikasi LMS yang pernah dipakai terlalu rumit dan lambat | 🟢 Rendah |

### 4.5 Skenario Penggunaan Harian

```
Pagi (06:30):
├── Buka DIKELAS di HP
├── Cek Dashboard → ada 2 tugas pending
└── Lihat pengumuman dari guru Fisika

Siang (12:00 — Istirahat):
├── Download materi Matematika bab baru
└── Baca diskusi tentang PR Kimia

Sore (16:00):
├── Kerjakan tugas Bahasa Indonesia di laptop
├── Upload file jawaban (.docx)
└── Cek kalender → quiz Fisika besok jam 10

Malam (20:00):
├── Belajar materi untuk quiz besok
├── Cek nilai tugas Matematika yang sudah dinilai → 85/100
└── Tanya di forum diskusi tentang soal yang tidak dipahami
```

### 4.6 Kebutuhan Teknis

| Aspek | Kebutuhan |
|---|---|
| **Device** | Mobile-first (responsive di smartphone Android) |
| **Bandwidth** | Optimal di koneksi 3G/4G (halaman ringan) |
| **UI** | Sederhana, warna menarik, font mudah dibaca di HP |
| **Notifikasi** | Alert untuk tugas baru dan deadline mendekati |
| **Navigasi** | Maksimal 3 tap untuk aksi utama |

### 4.7 Quote

> *"Aku cuma mau tahu tugas apa yang harus dikerjakan hari ini, dan bisa kirim jawabannya dari HP tanpa ribet."*

---

## 5. Persona 2: Budi Santoso, S.Pd. — Guru

### 5.1 Profil

```
┌──────────────────────────────────────────────────────────┐
│  👨‍🏫  BUDI SANTOSO, S.Pd.                                │
│  ─────────────────────────────────                       │
│  Role     : Guru (Teacher)                               │
│  Usia     : 45 tahun                                     │
│  Sekolah  : SMA Negeri 1 Bandung                         │
│  Mapel    : Matematika                                   │
│  Mengajar : 6 kelas (± 180 murid total)                  │
│  Device   : Laptop Windows (primary), Smartphone Android │
│  Internet : WiFi sekolah + WiFi rumah                    │
└──────────────────────────────────────────────────────────┘
```

### 5.2 Latar Belakang

Pak Budi adalah guru Matematika senior yang sudah mengajar selama 20 tahun. Beliau terbiasa dengan metode mengajar tradisional namun dipaksa beradaptasi dengan teknologi sejak pandemi. Literasi digitalnya menengah — bisa mengoperasikan Word, Excel, dan email, namun tidak nyaman dengan aplikasi yang terlalu kompleks. Beliau mengajar di 6 kelas dan sering kewalahan mengoreksi tugas dari 180 murid.

### 5.3 Motivasi & Tujuan

| No | Tujuan |
|---|---|
| 1 | Mendistribusikan materi ke semua kelas dengan mudah |
| 2 | Membuat dan mengelola tugas tanpa harus print kertas |
| 3 | Menilai tugas murid secara efisien |
| 4 | Membuat quiz yang bisa dinilai otomatis (hemat waktu) |
| 5 | Memantau progress belajar murid per kelas |
| 6 | Mengurangi waktu administrasi agar bisa fokus mengajar |

### 5.4 Frustrasi (Pain Points)

| No | Pain Point | Tingkat |
|---|---|---|
| 1 | Harus mengoreksi 180 tugas secara manual setiap minggu | 🔴 Tinggi |
| 2 | Tugas murid masuk via WA campur dengan chat lain | 🔴 Tinggi |
| 3 | Sulit melacak siapa yang sudah dan belum mengumpulkan | 🔴 Tinggi |
| 4 | Harus membuat rekap nilai manual di Excel per kelas | 🟡 Sedang |
| 5 | Platform LMS yang pernah dicoba terlalu rumit, banyak menu | 🟡 Sedang |
| 6 | Murid sering tidak membaca materi yang dishare di Google Drive | 🟢 Rendah |

### 5.5 Skenario Penggunaan Harian

```
Pagi (07:00 — Persiapan Mengajar):
├── Buka DIKELAS di laptop
├── Upload materi PDF untuk kelas hari ini
└── Cek: 45 submission tugas perlu dinilai

Siang (10:00 — Jam Kosong):
├── Buat tugas baru untuk kelas XI IPA 3
├── Set deadline: Jumat, 11 Jul 2026, 23:59
└── Lampirkan soal dalam format PDF

Sore (15:00 — Setelah Pulang):
├── Nilai 20 submission tugas
├── Beri feedback pada 5 jawaban yang perlu perbaikan
└── Export rekap nilai kelas XI IPA 1 ke Excel

Malam (20:00):
├── Buat quiz pilihan ganda (20 soal) untuk ulangan harian
├── Set jadwal quiz: Senin, 14 Jul 2026, 08:00-09:30
└── Cek diskusi kelas → jawab pertanyaan murid
```

### 5.6 Kebutuhan Teknis

| Aspek | Kebutuhan |
|---|---|
| **Device** | Laptop-first (form input lebih nyaman di desktop) |
| **Upload** | Drag & drop file, progress bar, support file besar |
| **Penilaian** | Satu halaman untuk menilai semua submission |
| **UI** | Tombol dan teks cukup besar, menu sederhana |
| **Export** | Export nilai ke Excel (format familiar) |
| **Quiz** | Auto-grading untuk PG agar hemat waktu |

### 5.7 Quote

> *"Saya tidak mau aplikasi yang ribet. Yang penting bisa upload materi, kasih tugas, dan nilai murid — itu saja sudah cukup."*

---

## 6. Persona 3: Dewi Anggraini, M.Pd. — Super Admin

### 6.1 Profil

```
┌──────────────────────────────────────────────────────────┐
│  👩‍💼  DEWI ANGGRAINI, M.Pd.                              │
│  ─────────────────────────────────                       │
│  Role     : Super Admin (Administrator)                  │
│  Usia     : 38 tahun                                     │
│  Jabatan  : Wakil Kepala Sekolah Bidang Kurikulum        │
│  Sekolah  : SMA Negeri 1 Bandung                         │
│  Kelola   : 80 guru, 1.200 murid                         │
│  Device   : Laptop Windows (primary)                     │
│  Internet : WiFi sekolah                                 │
└──────────────────────────────────────────────────────────┘
```

### 6.2 Latar Belakang

Bu Dewi adalah Wakil Kepala Sekolah Bidang Kurikulum yang bertanggung jawab atas pengelolaan akademik sekolah. Beliau lulusan S2 Pendidikan dan memiliki literasi digital yang cukup baik — terbiasa menggunakan Excel, Google Workspace, dan berbagai aplikasi administrasi sekolah. Tantangan utamanya adalah mengelola data akademik 1.200 murid dan 80 guru secara efisien, terutama saat awal tahun ajaran baru.

### 6.3 Motivasi & Tujuan

| No | Tujuan |
|---|---|
| 1 | Mengelola data guru dan murid secara terpusat |
| 2 | Setup semester dan tahun ajaran dengan cepat |
| 3 | Import data dari Excel yang sudah ada di sekolah |
| 4 | Memantau aktivitas penggunaan platform oleh guru dan murid |
| 5 | Memastikan keamanan data sekolah (backup rutin) |
| 6 | Mendapatkan laporan statistik penggunaan platform |

### 6.4 Frustrasi (Pain Points)

| No | Pain Point | Tingkat |
|---|---|---|
| 1 | Input data 1.200 murid satu-per-satu di awal tahun ajaran | 🔴 Tinggi |
| 2 | Tidak ada dashboard terpusat untuk memonitor aktivitas guru | 🔴 Tinggi |
| 3 | Backup data sekolah masih manual dan tidak rutin | 🟡 Sedang |
| 4 | Sulit mengetahui guru mana yang aktif dan tidak aktif di platform | 🟡 Sedang |
| 5 | Harus mengatur ulang kelas setiap pergantian semester | 🟡 Sedang |
| 6 | Tidak ada audit trail untuk melacak perubahan data | 🟢 Rendah |

### 6.5 Skenario Penggunaan

```
Awal Tahun Ajaran (Juli):
├── Login sebagai Super Admin
├── Buat tahun ajaran baru: 2026/2027
├── Buat semester: Ganjil
├── Import data 1.200 murid dari file Excel
├── Import data 20 guru baru dari file Excel
├── Setup mata pelajaran
└── Monitoring: guru mulai membuat kelas

Mingguan:
├── Cek dashboard: statistik penggunaan
├── Lihat activity log: siapa saja yang aktif
├── Verifikasi backup otomatis berjalan
└── Respons permintaan guru (reset password, dll)

Akhir Semester:
├── Export data nilai seluruh kelas
├── Arsipkan kelas semester berjalan
├── Backup database lengkap
├── Buat semester baru (Genap)
└── Generate laporan untuk Kepala Sekolah
```

### 6.6 Kebutuhan Teknis

| Aspek | Kebutuhan |
|---|---|
| **Device** | Desktop/Laptop (admin tasks memerlukan layar besar) |
| **Import** | Bulk import dari Excel dengan validasi dan error report |
| **Dashboard** | Statistik real-time: jumlah user, kelas, aktivitas |
| **Backup** | One-click backup dengan histori dan restore |
| **Monitoring** | Activity log yang bisa difilter dan di-search |
| **Export** | Export data ke Excel untuk pelaporan |

### 6.7 Quote

> *"Saya butuh satu dashboard yang menunjukkan semuanya — berapa guru aktif, berapa kelas berjalan, dan apakah backup sudah dilakukan. Jangan sampai data hilang."*

---

## 7. Empathy Map

### 7.1 Murid (Rina)

| Dimensi | Detail |
|---|---|
| **Thinks** | "Tugas apa yang harus dikerjakan hari ini?" |
| **Sees** | WhatsApp Group penuh pesan, materi tersebar |
| **Feels** | Kewalahan, takut ketinggalan deadline |
| **Does** | Scroll WA mencari info tugas, tanya teman |
| **Says** | "Kapan sih deadline-nya? Di group mana ya?" |
| **Pain** | Informasi tidak terpusat, sulit dilacak |
| **Gain** | Dashboard yang menampilkan semua tugas pending |

### 7.2 Guru (Budi)

| Dimensi | Detail |
|---|---|
| **Thinks** | "Bagaimana caranya menilai 180 tugas dengan cepat?" |
| **Sees** | Tumpukan file WA, Excel rekap nilai manual |
| **Feels** | Lelah, ingin fokus mengajar bukan administrasi |
| **Does** | Download tugas satu-satu dari WA, buka file, nilai di Excel |
| **Says** | "Kalau ada yang otomatis, saya mau pakai" |
| **Pain** | Proses penilaian manual yang memakan waktu |
| **Gain** | Auto-grading quiz, satu halaman untuk semua submission |

### 7.3 Super Admin (Dewi)

| Dimensi | Detail |
|---|---|
| **Thinks** | "Apakah semua data aman? Guru-guru sudah pakai platform?" |
| **Sees** | Data tersebar di banyak file Excel, tidak ada monitoring |
| **Feels** | Khawatir data hilang, sulit mengontrol penggunaan |
| **Does** | Rekap manual, backup manual, tanya guru satu-satu |
| **Says** | "Saya perlu satu sistem yang bisa saya kontrol" |
| **Pain** | Tidak ada visibilitas terhadap aktivitas akademik |
| **Gain** | Dashboard admin dengan statistik dan activity log |

---

## 8. Persona Comparison Matrix

| Aspek | Murid (Rina) | Guru (Budi) | Admin (Dewi) |
|---|---|---|---|
| **Usia** | 16 tahun | 45 tahun | 38 tahun |
| **Literasi Digital** | Tinggi | Menengah | Menengah-Tinggi |
| **Device Utama** | Smartphone | Laptop | Laptop |
| **Frekuensi Akses** | 3-5x/hari | 2-3x/hari | 1-2x/hari |
| **Durasi Sesi** | 5-15 menit | 15-45 menit | 30-60 menit |
| **Kebutuhan Utama** | Lihat tugas, submit | Upload, nilai | Kelola, monitor |
| **Toleransi Kompleksitas** | Rendah | Rendah | Menengah |
| **Motivasi Utama** | Akademik | Efisiensi | Kontrol & keamanan |

---

## 9. Implikasi Desain

Berdasarkan analisis persona, berikut implikasi untuk desain dan pengembangan DIKELAS:

### 9.1 UI/UX Design

| Persona | Implikasi |
|---|---|
| **Rina (Murid)** | Mobile-first responsive design, navigasi sederhana, warna menarik |
| **Budi (Guru)** | Tombol dan font besar, form yang straightforward, minimal jargon teknis |
| **Dewi (Admin)** | Dashboard informatif, bulk operations, data visualization |

### 9.2 Feature Priority

| Insight dari Persona | Fitur yang Diprioritaskan |
|---|---|
| Rina sering lupa deadline | Dashboard tugas pending + Kalender + Notifikasi |
| Budi kewalahan menilai | Satu halaman submission + Auto-grading quiz |
| Dewi perlu import massal | Excel import dengan validasi dan error report |
| Budi tidak suka kompleksitas | UI minimalis, maksimal 3 klik untuk aksi utama |
| Dewi khawatir data hilang | Auto backup + Restore + Activity log |

### 9.3 Performance

| Insight | Implikasi Teknis |
|---|---|
| Rina akses via 3G/4G | Halaman ringan, lazy loading, compressed assets |
| Budi upload file besar | Progress bar, chunked upload, retry mechanism |
| Dewi import data massal | Background job, progress indicator, async processing |

---

## 10. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-PER-001 | Setiap persona memiliki profil lengkap (background, motivasi, pain points) | ✅ |
| AC-PER-002 | Skenario penggunaan harian terdefinisi untuk setiap persona | ✅ |
| AC-PER-003 | Empathy map tersedia untuk setiap persona | ✅ |
| AC-PER-004 | Implikasi desain teridentifikasi berdasarkan analisis persona | ✅ |
| AC-PER-005 | Persona comparison matrix tersedia | ✅ |
| AC-PER-006 | Kebutuhan teknis per persona terdokumentasi | ✅ |
| AC-PER-007 | Dokumen terhubung dengan User Roles dan User Flow | ✅ |

---

## 11. Checklist

- [x] Persona Murid (Rina) — profil, motivasi, pain points, skenario
- [x] Persona Guru (Budi) — profil, motivasi, pain points, skenario
- [x] Persona Super Admin (Dewi) — profil, motivasi, pain points, skenario
- [x] Empathy Map untuk setiap persona
- [x] Comparison Matrix antar persona
- [x] Implikasi Desain (UI/UX, Fitur, Performa)
- [x] Acceptance Criteria
- [x] Cross-reference ke dokumen terkait

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [06_USER_ROLES.md](./06_USER_ROLES.md)*

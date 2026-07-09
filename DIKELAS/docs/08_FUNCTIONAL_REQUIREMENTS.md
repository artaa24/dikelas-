# 08 — Functional Requirements

> **Dokumen Terkait:** [07_FEATURE_LIST.md](./07_FEATURE_LIST.md) · [09_NON_FUNCTIONAL_REQUIREMENTS.md](./09_NON_FUNCTIONAL_REQUIREMENTS.md) · [13_DATABASE_REQUIREMENTS.md](./13_DATABASE_REQUIREMENTS.md)

---

## 1. Informasi Dokumen

| Atribut | Detail |
|---|---|
| **Nama Produk** | DIKELAS |
| **Versi** | 1.0.0 |
| **Tanggal** | Juli 2026 |
| **Status** | ✅ Approved |

---

## 2. Tujuan

Dokumen ini mendeskripsikan **perilaku fungsional** dari setiap modul DIKELAS secara detail. Setiap requirement menjelaskan **apa yang dilakukan sistem** dalam merespon input pengguna.

---

## 3. FR-AUTH: Autentikasi

### FR-AUTH-001: Login

| Atribut | Detail |
|---|---|
| **Input** | Email, Password |
| **Proses** | Validasi kredensial, cek role, buat session |
| **Output** | Redirect ke dashboard sesuai role |
| **Validasi** | Email: required, valid format; Password: required, min 8 karakter |
| **Error** | "Email atau password salah" (generic untuk keamanan) |
| **Rate Limit** | Maksimal 5 percobaan per menit per IP |

**Pre-condition:** User memiliki akun terdaftar dan aktif.
**Post-condition:** Session aktif, user diarahkan ke dashboard sesuai role.

### FR-AUTH-002: Register Murid

| Atribut | Detail |
|---|---|
| **Input** | Nama lengkap, Email, Password, Konfirmasi Password |
| **Proses** | Validasi input, cek email unik, hash password, buat user dengan role student |
| **Output** | Akun terbuat, redirect ke dashboard murid |
| **Validasi** | Nama: required, max 255; Email: required, unique, valid; Password: min 8, confirmed |
| **Error** | "Email sudah terdaftar" |

**Pre-condition:** Email belum terdaftar di sistem.
**Post-condition:** User baru dengan role `student` terbuat di database.

### FR-AUTH-003: Logout

| Atribut | Detail |
|---|---|
| **Input** | Klik tombol Logout |
| **Proses** | Hapus session, invalidate token |
| **Output** | Redirect ke halaman login |

### FR-AUTH-004: Reset Password

| Atribut | Detail |
|---|---|
| **Input** | Email |
| **Proses** | Generate token, kirim email dengan link reset |
| **Output** | Pesan "Link reset password telah dikirim ke email Anda" |
| **Token** | Valid selama 60 menit, single use |

---

## 4. FR-CLASS: Manajemen Kelas

### FR-CLASS-001: Buat Kelas

| Atribut | Detail |
|---|---|
| **Input** | Nama kelas, Deskripsi, Mata pelajaran, Semester |
| **Proses** | Validasi input, generate kode unik 6 karakter, simpan ke database |
| **Output** | Kelas terbuat, redirect ke halaman kelas |
| **Validasi** | Nama: required, max 100; Mapel: required, exists; Semester: required, exists |
| **Kode Kelas** | 6 karakter alfanumerik (uppercase), unik di seluruh sistem |

**Pre-condition:** User memiliki role `teacher`.
**Post-condition:** Kelas terbuat dengan guru sebagai pemilik.

### FR-CLASS-002: Join Kelas

| Atribut | Detail |
|---|---|
| **Input** | Kode kelas (6 karakter) |
| **Proses** | Validasi kode, cek belum terdaftar di kelas, tambahkan ke kelas |
| **Output** | Murid berhasil bergabung, redirect ke halaman kelas |
| **Error** | "Kode kelas tidak ditemukan" / "Anda sudah terdaftar di kelas ini" |

**Pre-condition:** User memiliki role `student`, kode kelas valid.
**Post-condition:** Relasi student-class terbuat di pivot table.

### FR-CLASS-003: Daftar Anggota Kelas

| Atribut | Detail |
|---|---|
| **Input** | ID Kelas |
| **Proses** | Query murid yang terdaftar di kelas |
| **Output** | Daftar murid dengan nama, email, tanggal bergabung |
| **Pagination** | 20 item per halaman |

---

## 5. FR-MAT: Manajemen Materi

### FR-MAT-001: Upload Materi

| Atribut | Detail |
|---|---|
| **Input** | Judul, Deskripsi, File (PDF/Video/Dokumen), Topik |
| **Proses** | Validasi file, simpan ke Laravel Storage, buat record di database |
| **Output** | Materi berhasil diupload, tampil di daftar materi kelas |
| **Validasi File** | PDF: max 25MB; Video: max 50MB; Dokumen: max 10MB |
| **Format** | PDF, MP4, MOV, AVI, DOC, DOCX, PPT, PPTX |

**Pre-condition:** User adalah guru pemilik kelas.
**Post-condition:** File tersimpan di storage, record di database.

### FR-MAT-002: Download Materi

| Atribut | Detail |
|---|---|
| **Input** | Klik tombol download pada materi |
| **Proses** | Cek akses (murid terdaftar di kelas), serve file dari storage |
| **Output** | File terdownload ke device pengguna |
| **Header** | Content-Disposition: attachment, Content-Type sesuai file |

---

## 6. FR-ASG: Sistem Tugas

### FR-ASG-001: Buat Tugas

| Atribut | Detail |
|---|---|
| **Input** | Judul, Instruksi, Deadline, Lampiran (opsional), Nilai maksimal |
| **Proses** | Validasi input, simpan tugas, lampirkan file jika ada |
| **Output** | Tugas terbuat, tampil di kelas stream |
| **Validasi** | Judul: required, max 200; Deadline: required, after now; Nilai max: required, integer, 1-100 |

### FR-ASG-002: Submit Tugas

| Atribut | Detail |
|---|---|
| **Input** | File jawaban, Catatan (opsional) |
| **Proses** | Validasi file, cek deadline, simpan submission |
| **Output** | Status berubah menjadi "submitted" atau "late" |
| **Logic** | Jika submit setelah deadline → status "late" (tetap diterima) |
| **Re-submit** | Bisa re-submit sebelum deadline, file lama diganti |

### FR-ASG-003: Nilai Tugas

| Atribut | Detail |
|---|---|
| **Input** | Nilai (0-100), Feedback (opsional) |
| **Proses** | Validasi nilai, simpan ke submission, update status |
| **Output** | Submission status berubah menjadi "graded" |

---

## 7. FR-QUIZ: Sistem Quiz

### FR-QUIZ-001: Buat Quiz

| Atribut | Detail |
|---|---|
| **Input** | Judul, Deskripsi, Durasi (menit), Tanggal mulai, Tanggal selesai, Daftar soal |
| **Proses** | Validasi input, simpan quiz dan soal-soalnya |
| **Output** | Quiz terbuat dengan semua soal |
| **Tipe Soal** | multiple_choice, true_false, essay |

### FR-QUIZ-002: Kerjakan Quiz

| Atribut | Detail |
|---|---|
| **Input** | Jawaban untuk setiap soal |
| **Proses** | Timer berjalan, simpan jawaban, auto-submit jika waktu habis |
| **Output** | Quiz selesai, nilai otomatis untuk PG dan B/S |
| **Logic** | PG: cocokkan dengan answer_key; Essay: guru input manual |
| **Constraint** | Hanya bisa dikerjakan sekali, dalam periode start-end |

### FR-QUIZ-003: Hasil Quiz

| Atribut | Detail |
|---|---|
| **Input** | ID Quiz attempt |
| **Proses** | Hitung skor, tampilkan jawaban benar/salah |
| **Output** | Skor total, detail per soal |

---

## 8. FR-GRD: Sistem Penilaian

### FR-GRD-001: Rekap Nilai

| Atribut | Detail |
|---|---|
| **Input** | ID Kelas, filter semester |
| **Proses** | Agregasi nilai tugas dan quiz per murid |
| **Output** | Tabel rekap: Nama Murid × Tugas/Quiz = Nilai |
| **Kalkulasi** | Rata-rata berbobot (jika bobot dikonfigurasi) atau rata-rata biasa |

### FR-GRD-002: Export Nilai

| Atribut | Detail |
|---|---|
| **Input** | ID Kelas, format (Excel) |
| **Proses** | Generate file Excel dengan rekap nilai |
| **Output** | File .xlsx terdownload |
| **Kolom** | No, NIS, Nama, Tugas 1..N, Quiz 1..N, Rata-rata |

---

## 9. FR-CAL: Kalender

### FR-CAL-001: Tampilkan Kalender

| Atribut | Detail |
|---|---|
| **Input** | Bulan, Tahun, Filter kelas (opsional) |
| **Proses** | Query deadline tugas dan jadwal quiz dari kelas yang diikuti/diajar |
| **Output** | Tampilan kalender dengan event markers |
| **Event Types** | assignment_deadline, quiz_schedule, announcement |

---

## 10. FR-DISC: Diskusi

### FR-DISC-001: Buat Post Diskusi

| Atribut | Detail |
|---|---|
| **Input** | Judul, Konten |
| **Proses** | Validasi input, simpan post, notifikasi ke anggota kelas |
| **Output** | Post tampil di forum kelas |
| **Validasi** | Judul: required, max 200; Konten: required |

### FR-DISC-002: Reply Post

| Atribut | Detail |
|---|---|
| **Input** | Konten reply |
| **Proses** | Validasi, simpan reply, notifikasi ke author post |
| **Output** | Reply tampil di bawah post |

---

## 11. FR-ADM: Administrasi

### FR-ADM-001: Import Excel

| Atribut | Detail |
|---|---|
| **Input** | File Excel (.xlsx) |
| **Proses** | Parse Excel, validasi setiap row, bulk insert |
| **Output** | Laporan import: X berhasil, Y gagal, detail error |
| **Template** | Admin dapat download template Excel |
| **Kolom Guru** | Nama, Email, NIP |
| **Kolom Murid** | Nama, Email, NIS, Kelas |

### FR-ADM-002: Backup Database

| Atribut | Detail |
|---|---|
| **Input** | Klik tombol "Backup Sekarang" |
| **Proses** | mysqldump, compress (gzip), simpan ke storage |
| **Output** | File backup tersimpan, entry di histori backup |
| **Naming** | `dikelas_backup_YYYYMMDD_HHmmss.sql.gz` |
| **Auto** | Backup otomatis harian via Laravel Scheduler |

### FR-ADM-003: Activity Log

| Atribut | Detail |
|---|---|
| **Tracked Actions** | Login, Logout, CRUD operations, File upload/download, Grade input |
| **Data** | User, Action, Target, IP Address, Timestamp, User Agent |
| **Retention** | 90 hari (configurable) |
| **Filter** | Filter by user, action type, date range |

---

## 12. Traceability Matrix

| Feature ID | Functional Req | Database Table | Controller | View |
|---|---|---|---|---|
| F-AUTH-001 | FR-AUTH-001 | users | AuthController | auth/login |
| F-AUTH-002 | FR-AUTH-002 | users | AuthController | auth/register |
| F-CLASS-001 | FR-CLASS-001 | classrooms | ClassroomController | classrooms/create |
| F-CLASS-005 | FR-CLASS-002 | classroom_student | ClassroomController | classrooms/join |
| F-MAT-001 | FR-MAT-001 | materials | MaterialController | materials/create |
| F-ASG-001 | FR-ASG-001 | assignments | AssignmentController | assignments/create |
| F-ASG-006 | FR-ASG-002 | submissions | SubmissionController | assignments/submit |
| F-QUIZ-001 | FR-QUIZ-001 | quizzes, questions | QuizController | quizzes/create |
| F-GRD-001 | FR-GRD-001 | grades | GradeController | grades/input |
| F-ADM-009 | FR-ADM-001 | users | ImportController | admin/import |
| F-ADM-007 | FR-ADM-002 | backups | BackupController | admin/backup |
| F-ADM-011 | FR-ADM-003 | activity_logs | ActivityLogController | admin/logs |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [09_NON_FUNCTIONAL_REQUIREMENTS.md](./09_NON_FUNCTIONAL_REQUIREMENTS.md)*

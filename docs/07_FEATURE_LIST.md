# 07 — Feature List

> **Dokumen Terkait:** [01_PRODUCT_REQUIREMENTS_DOCUMENT.md](./01_PRODUCT_REQUIREMENTS_DOCUMENT.md) · [08_FUNCTIONAL_REQUIREMENTS.md](./08_FUNCTIONAL_REQUIREMENTS.md) · [11_USER_FLOW.md](./11_USER_FLOW.md)

---

## 1. Overview

Daftar fitur lengkap DIKELAS diorganisasi berdasarkan modul dan prioritas. Setiap fitur memiliki ID unik untuk referensi silang dengan dokumen lain.

### Legenda Prioritas

| Label | Arti | Fase |
|---|---|---|
| 🔴 P0 | Must Have — Wajib untuk MVP | Fase 1–2 |
| 🟡 P1 | Should Have — Sangat diharapkan | Fase 3 |
| 🟢 P2 | Nice to Have — Nilai tambah | Fase 4 |
| ⚪ P3 | Future — Versi mendatang | Post-release |

---

## 2. Modul Autentikasi (AUTH)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-AUTH-001 | Login | Login dengan email dan password | Semua | 🔴 P0 |
| F-AUTH-002 | Register Murid | Murid mendaftar akun baru | Murid | 🔴 P0 |
| F-AUTH-003 | Logout | Keluar dari sistem | Semua | 🔴 P0 |
| F-AUTH-004 | Reset Password | Kirim link reset password via email | Semua | 🟡 P1 |
| F-AUTH-005 | Role-based Redirect | Redirect ke dashboard sesuai role setelah login | Semua | 🔴 P0 |
| F-AUTH-006 | Remember Me | Opsi "Ingat Saya" saat login | Semua | 🟢 P2 |
| F-AUTH-007 | Email Verification | Verifikasi email saat registrasi | Murid | 🟡 P1 |

---

## 3. Modul Dashboard (DASH)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-DASH-001 | Dashboard Murid | Daftar kelas, tugas pending, pengumuman | Murid | 🔴 P0 |
| F-DASH-002 | Dashboard Guru | Daftar kelas, submission pending, quick actions | Guru | 🔴 P0 |
| F-DASH-003 | Dashboard Admin | Statistik global, user count, activity summary | Admin | 🔴 P0 |
| F-DASH-004 | Widget Kalender | Mini kalender dengan deadline dan event | Murid, Guru | 🟡 P1 |
| F-DASH-005 | Widget Pengumuman | Pengumuman terbaru | Semua | 🟡 P1 |
| F-DASH-006 | Quick Actions | Tombol aksi cepat sesuai role | Semua | 🟢 P2 |

---

## 4. Modul Kelas (CLASS)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-CLASS-001 | Buat Kelas | Guru membuat kelas baru | Guru | 🔴 P0 |
| F-CLASS-002 | Edit Kelas | Guru mengedit informasi kelas | Guru | 🔴 P0 |
| F-CLASS-003 | Hapus/Arsipkan Kelas | Guru mengarsipkan kelas yang tidak aktif | Guru | 🟡 P1 |
| F-CLASS-004 | Generate Kode Kelas | Sistem generate kode unik 6 karakter | Sistem | 🔴 P0 |
| F-CLASS-005 | Join Kelas | Murid bergabung ke kelas dengan kode | Murid | 🔴 P0 |
| F-CLASS-006 | Leave Kelas | Murid keluar dari kelas | Murid | 🟡 P1 |
| F-CLASS-007 | Daftar Anggota | Guru melihat daftar murid di kelas | Guru | 🔴 P0 |
| F-CLASS-008 | Kick Murid | Guru mengeluarkan murid dari kelas | Guru | 🟡 P1 |
| F-CLASS-009 | Kelas Stream | Timeline aktivitas kelas (materi, tugas, pengumuman) | Semua | 🔴 P0 |
| F-CLASS-010 | Detail Kelas | Halaman detail kelas dengan tab navigasi | Semua | 🔴 P0 |

---

## 5. Modul Materi (MAT)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-MAT-001 | Upload PDF | Guru upload materi format PDF | Guru | 🔴 P0 |
| F-MAT-002 | Upload Video | Guru upload video pembelajaran | Guru | 🔴 P0 |
| F-MAT-003 | Upload Dokumen | Guru upload dokumen (Word, PPT) | Guru | 🔴 P0 |
| F-MAT-004 | Buat Materi Teks | Guru membuat materi berupa teks rich content | Guru | 🟡 P1 |
| F-MAT-005 | Organisasi Topik | Materi dikelompokkan berdasarkan topik/bab | Guru | 🔴 P0 |
| F-MAT-006 | Lihat Materi | Murid melihat daftar dan detail materi | Murid | 🔴 P0 |
| F-MAT-007 | Download Materi | Murid mendownload file materi | Murid | 🔴 P0 |
| F-MAT-008 | Streaming Video | Murid menonton video langsung di browser | Murid | 🟡 P1 |
| F-MAT-009 | Atur Urutan | Guru mengatur urutan tampil materi | Guru | 🟡 P1 |
| F-MAT-010 | Hapus Materi | Guru menghapus materi | Guru | 🔴 P0 |

---

## 6. Modul Tugas (ASG)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-ASG-001 | Buat Tugas | Guru membuat tugas dengan deskripsi dan deadline | Guru | 🔴 P0 |
| F-ASG-002 | Edit Tugas | Guru mengedit tugas yang sudah dibuat | Guru | 🔴 P0 |
| F-ASG-003 | Hapus Tugas | Guru menghapus tugas | Guru | 🔴 P0 |
| F-ASG-004 | Lampiran Tugas | Guru melampirkan file pada tugas | Guru | 🔴 P0 |
| F-ASG-005 | Lihat Tugas | Murid melihat daftar dan detail tugas | Murid | 🔴 P0 |
| F-ASG-006 | Submit Tugas | Murid mengupload jawaban tugas | Murid | 🔴 P0 |
| F-ASG-007 | Re-submit | Murid mengirim ulang jawaban sebelum deadline | Murid | 🟡 P1 |
| F-ASG-008 | Status Tugas | Tampilkan status: pending, submitted, late, graded | Sistem | 🔴 P0 |
| F-ASG-009 | Daftar Submission | Guru melihat semua submission per tugas | Guru | 🔴 P0 |
| F-ASG-010 | Feedback | Guru memberikan komentar pada submission | Guru | 🟡 P1 |

> Detail sistem: [16_ASSIGNMENT_SYSTEM.md](./16_ASSIGNMENT_SYSTEM.md)

---

## 7. Modul Quiz (QUIZ)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-QUIZ-001 | Buat Quiz | Guru membuat quiz baru | Guru | 🔴 P0 |
| F-QUIZ-002 | Soal Pilihan Ganda | Tipe soal multiple choice (A/B/C/D/E) | Guru | 🔴 P0 |
| F-QUIZ-003 | Soal Essay | Tipe soal jawaban panjang | Guru | 🟡 P1 |
| F-QUIZ-004 | Soal Benar/Salah | Tipe soal true/false | Guru | 🟡 P1 |
| F-QUIZ-005 | Set Durasi | Guru mengatur batas waktu pengerjaan | Guru | 🔴 P0 |
| F-QUIZ-006 | Set Jadwal | Guru mengatur tanggal mulai dan selesai | Guru | 🔴 P0 |
| F-QUIZ-007 | Kerjakan Quiz | Murid mengerjakan quiz dalam batas waktu | Murid | 🔴 P0 |
| F-QUIZ-008 | Auto-grading | Sistem menilai soal PG dan B/S secara otomatis | Sistem | 🔴 P0 |
| F-QUIZ-009 | Hasil Quiz | Murid melihat hasil setelah quiz selesai | Murid | 🔴 P0 |
| F-QUIZ-010 | Analisis Quiz | Guru melihat statistik jawaban per soal | Guru | 🟡 P1 |
| F-QUIZ-011 | Acak Soal | Randomisasi urutan soal per murid | Sistem | 🟢 P2 |

> Detail sistem: [18_QUIZ_SYSTEM.md](./18_QUIZ_SYSTEM.md)

---

## 8. Modul Penilaian (GRD)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-GRD-001 | Nilai Tugas | Guru menginput nilai untuk submission tugas | Guru | 🔴 P0 |
| F-GRD-002 | Nilai Quiz | Nilai quiz (otomatis PG, manual essay) | Guru | 🔴 P0 |
| F-GRD-003 | Lihat Nilai | Murid melihat nilai per tugas dan quiz | Murid | 🔴 P0 |
| F-GRD-004 | Rekap Nilai | Rekap nilai per kelas per semester | Guru | 🔴 P0 |
| F-GRD-005 | Export Nilai | Export rekap nilai ke Excel | Guru | 🟡 P1 |
| F-GRD-006 | Ringkasan Akademik | Murid melihat ringkasan nilai keseluruhan | Murid | 🟡 P1 |
| F-GRD-007 | Bobot Nilai | Konfigurasi bobot tugas vs quiz per kelas | Guru | 🟢 P2 |

> Detail sistem: [17_GRADE_SYSTEM.md](./17_GRADE_SYSTEM.md)

---

## 9. Modul Kalender (CAL)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-CAL-001 | Kalender Bulanan | Tampilan kalender per bulan | Semua | 🔴 P0 |
| F-CAL-002 | Deadline Tugas | Tampilkan deadline tugas di kalender | Murid, Guru | 🔴 P0 |
| F-CAL-003 | Jadwal Quiz | Tampilkan jadwal quiz di kalender | Murid, Guru | 🔴 P0 |
| F-CAL-004 | Filter Kelas | Filter event berdasarkan kelas | Murid, Guru | 🟡 P1 |
| F-CAL-005 | Tampilan Mingguan | Opsi tampilan mingguan | Semua | 🟡 P1 |

---

## 10. Modul Diskusi (DISC)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-DISC-001 | Forum Kelas | Forum diskusi per kelas | Murid, Guru | 🔴 P0 |
| F-DISC-002 | Buat Post | Membuat post diskusi baru | Murid, Guru | 🔴 P0 |
| F-DISC-003 | Reply | Membalas post diskusi | Murid, Guru | 🔴 P0 |
| F-DISC-004 | Hapus Post | Guru dapat menghapus post tidak pantas | Guru | 🟡 P1 |
| F-DISC-005 | Notifikasi Reply | Notifikasi saat ada reply baru | Murid, Guru | 🟡 P1 |

---

## 11. Modul Pengumuman (ANN)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-ANN-001 | Pengumuman Kelas | Guru membuat pengumuman untuk kelas | Guru | 🔴 P0 |
| F-ANN-002 | Pengumuman Global | Admin membuat pengumuman untuk semua user | Admin | 🔴 P0 |
| F-ANN-003 | Pin Pengumuman | Pin pengumuman penting di atas | Guru, Admin | 🟡 P1 |
| F-ANN-004 | Notifikasi | Notifikasi pengumuman baru | Semua | 🟡 P1 |

---

## 12. Modul Profil (PROF)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-PROF-001 | Lihat Profil | Melihat profil sendiri | Semua | 🔴 P0 |
| F-PROF-002 | Edit Profil | Mengedit nama, bio | Semua | 🔴 P0 |
| F-PROF-003 | Ubah Password | Mengubah password | Semua | 🔴 P0 |
| F-PROF-004 | Foto Profil | Upload foto profil | Semua | 🟡 P1 |

---

## 13. Modul Administrasi (ADM)

| ID | Fitur | Deskripsi | Role | Prioritas |
|---|---|---|---|---|
| F-ADM-001 | CRUD Guru | Tambah, lihat, edit, hapus data guru | Admin | 🔴 P0 |
| F-ADM-002 | CRUD Murid | Tambah, lihat, edit, hapus data murid | Admin | 🔴 P0 |
| F-ADM-003 | Kelola Kelas | Lihat semua kelas, assign guru | Admin | 🔴 P0 |
| F-ADM-004 | CRUD Mapel | Kelola mata pelajaran | Admin | 🔴 P0 |
| F-ADM-005 | CRUD Semester | Kelola semester, set aktif | Admin | 🔴 P0 |
| F-ADM-006 | CRUD Tahun Ajaran | Kelola tahun ajaran, set aktif | Admin | 🔴 P0 |
| F-ADM-007 | Backup DB | Backup database manual | Admin | 🔴 P0 |
| F-ADM-008 | Restore DB | Restore dari file backup | Admin | 🔴 P0 |
| F-ADM-009 | Import Excel | Import data guru/murid dari Excel | Admin | 🟡 P1 |
| F-ADM-010 | Export Excel | Export data ke Excel | Admin | 🟡 P1 |
| F-ADM-011 | Activity Log | Log aktivitas seluruh pengguna | Admin | 🔴 P0 |
| F-ADM-012 | Role & Permission | Kelola role dan permission | Admin | 🔴 P0 |
| F-ADM-013 | System Settings | Pengaturan sekolah (nama, logo, dll) | Admin | 🟡 P1 |

---

## 14. Ringkasan Statistik

| Prioritas | Jumlah Fitur |
|---|---|
| 🔴 P0 (Must Have) | 58 |
| 🟡 P1 (Should Have) | 27 |
| 🟢 P2 (Nice to Have) | 4 |
| **Total** | **89** |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [08_FUNCTIONAL_REQUIREMENTS.md](./08_FUNCTIONAL_REQUIREMENTS.md)*

# 15 — Notification System

> **Dokumen Terkait:** [07_FEATURE_LIST.md](./07_FEATURE_LIST.md) · [16_ASSIGNMENT_SYSTEM.md](./16_ASSIGNMENT_SYSTEM.md) · [08_FUNCTIONAL_REQUIREMENTS.md](./08_FUNCTIONAL_REQUIREMENTS.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **sistem notifikasi** DIKELAS — mekanisme pemberitahuan aktivitas penting menggunakan **Laravel Notifications** dengan channel **In-App** (database) dan **Email** (SMTP).

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Engagement** | Meningkatkan engagement dengan pemberitahuan aktivitas terbaru |
| **Awareness** | Memastikan murid tidak melewatkan deadline |
| **Efisiensi** | Mengurangi kebutuhan guru mengingatkan murid manual |

---

## 3. Ruang Lingkup

| Channel | Implementasi | Prioritas |
|---|---|---|
| **In-App** | Laravel Notifications (database) | 🔴 P0 |
| **Email** | Laravel Mail via SMTP | 🟡 P1 |
| **Push** | — | ⚪ Future |

---

## 4. Tipe Notifikasi

| ID | Tipe | Trigger | Penerima | Channel |
|---|---|---|---|---|
| N-001 | Tugas Baru | Guru publish tugas | Murid di kelas | In-App, Email |
| N-002 | Deadline Mendekati | 24 jam sebelum deadline | Murid belum submit | In-App |
| N-003 | Tugas Dinilai | Guru input nilai | Murid pemilik | In-App, Email |
| N-004 | Quiz Baru | Guru publish quiz | Murid di kelas | In-App, Email |
| N-005 | Quiz Akan Dimulai | 1 jam sebelum start | Murid di kelas | In-App |
| N-006 | Hasil Quiz | Guru finalize nilai | Murid pemilik | In-App |
| N-007 | Materi Baru | Guru upload materi | Murid di kelas | In-App |
| N-008 | Pengumuman Kelas | Guru buat pengumuman | Murid di kelas | In-App, Email |
| N-009 | Pengumuman Global | Admin buat pengumuman | Semua user | In-App |
| N-010 | Diskusi Reply | User reply post | Author post asli | In-App |
| N-011 | Murid Bergabung | Murid join kelas | Guru pemilik | In-App |
| N-012 | Submission Masuk | Murid submit tugas | Guru pemilik | In-App |
| N-013 | Backup Selesai | Backup completed | Super Admin | In-App |
| N-014 | Import Selesai | Import completed | Super Admin | In-App |

---

## 5. Arsitektur Teknis

### 5.1 Flow

```
[Event Trigger] → [Laravel Event] → [Notification Class]
    ├──▶ [Database Channel] → notifications table → [UI Bell Icon]
    └──▶ [Mail Channel] → SMTP Queue → [User Email]
```

### 5.2 Event-Listener Mapping

| Event | Notification |
|---|---|
| `AssignmentCreated` | `NewAssignmentNotification` |
| `SubmissionGraded` | `GradeNotification` |
| `QuizPublished` | `NewQuizNotification` |
| `MaterialUploaded` | `NewMaterialNotification` |
| `AnnouncementCreated` | `AnnouncementNotification` |
| `DiscussionReplied` | `DiscussionReplyNotification` |
| `StudentJoinedClass` | `StudentJoinedNotification` |
| `BackupCompleted` | `BackupCompleteNotification` |

---

## 6. UI Notifikasi

### 6.1 Bell Icon (Topbar)

```
🔔(3) ──▶ Dropdown:
├── 🔴 Deadline besok! Tugas Integral (2 jam lalu)
├── 🟡 Tugas Baru: PR Bab 5 Fisika (5 jam lalu)
├── 🔵 Materi Baru: Video Kimia (1 hari lalu)
└── [Lihat Semua →]
```

### 6.2 Fitur Halaman Notifikasi

| Fitur | Deskripsi |
|---|---|
| Daftar | Semua notifikasi dengan pagination |
| Filter | Semua / Belum Dibaca / Sudah Dibaca |
| Mark as read | Klik → tandai sudah dibaca |
| Mark all | Tombol "Tandai semua sudah dibaca" |
| Time format | Relative ("2 jam yang lalu") |

---

## 7. Scheduled Notifications

| Jadwal | Notifikasi | Mekanisme |
|---|---|---|
| Setiap jam | Cek deadline 24 jam ke depan | Laravel Scheduler |
| Setiap jam | Cek quiz dimulai 1 jam ke depan | Laravel Scheduler |
| Harian 00:00 | Backup reminder jika gagal | Laravel Scheduler |

---

## 8. Checklist

- [x] In-App notification terdefinisi
- [x] Email notification terdefinisi
- [x] 14 tipe notifikasi teridentifikasi
- [x] Event-Listener mapping terdefinisi
- [x] UI notifikasi terdefinisi
- [x] Scheduled notifications terdefinisi

---

## 9. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-NTF-001 | Notifikasi in-app muncul saat tugas baru | ✅ |
| AC-NTF-002 | Bell icon menampilkan jumlah belum dibaca | ✅ |
| AC-NTF-003 | Klik notifikasi → mark read + redirect | ✅ |
| AC-NTF-004 | Email terkirim untuk tugas baru dan pengumuman | ✅ |
| AC-NTF-005 | Deadline reminder berjalan via scheduler | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [16_ASSIGNMENT_SYSTEM.md](./16_ASSIGNMENT_SYSTEM.md)*

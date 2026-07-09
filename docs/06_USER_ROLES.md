# 06 — User Roles

> **Dokumen Terkait:** [05_USER_PERSONA.md](./05_USER_PERSONA.md) · [19_PERMISSION_MATRIX.md](./19_PERMISSION_MATRIX.md) · [14_SECURITY_REQUIREMENTS.md](./14_SECURITY_REQUIREMENTS.md)

---

## 1. Definisi Role

DIKELAS memiliki **3 role utama** dengan hierarki dan hak akses yang berbeda:

```
Super Admin (Level 3 — Tertinggi)
    │
    ├── Guru (Level 2)
    │
    └── Murid (Level 1 — Terendah)
```

---

## 2. Detail Role

### 2.1 Murid (Student)

| Atribut | Detail |
|---|---|
| **Slug** | `student` |
| **Level** | 1 |
| **Registrasi** | Self-register atau dibuat oleh Super Admin |
| **Jumlah per Sekolah** | 200 – 1.500 |

**Kemampuan:**

| Modul | Aksi |
|---|---|
| Auth | Login, Register, Logout, Reset Password |
| Dashboard | Lihat dashboard murid |
| Kelas | Gabung kelas (kode), keluar kelas, lihat daftar kelas |
| Materi | Lihat materi, download materi |
| Tugas | Lihat tugas, upload jawaban, lihat status submission |
| Quiz | Mengerjakan quiz, lihat hasil |
| Nilai | Lihat nilai per tugas/quiz, lihat rekap |
| Kalender | Lihat kalender (deadline, event) |
| Diskusi | Buat post, reply, lihat diskusi |
| Pengumuman | Lihat pengumuman |
| Profil | Lihat dan edit profil sendiri |

### 2.2 Guru (Teacher)

| Atribut | Detail |
|---|---|
| **Slug** | `teacher` |
| **Level** | 2 |
| **Registrasi** | Dibuat oleh Super Admin |
| **Jumlah per Sekolah** | 20 – 100 |

**Kemampuan:**

| Modul | Aksi |
|---|---|
| Auth | Login, Logout, Reset Password |
| Dashboard | Lihat dashboard guru |
| Kelas | Buat kelas, edit kelas, arsipkan kelas, lihat anggota, keluarkan murid |
| Materi | Upload materi (PDF, video, dokumen), edit, hapus, atur urutan |
| Tugas | Buat tugas, edit, hapus, lihat submission, beri feedback |
| Quiz | Buat quiz, edit, hapus, lihat hasil, analisis |
| Nilai | Beri nilai tugas/quiz, rekap per kelas, export |
| Kalender | Lihat kalender kelas sendiri |
| Diskusi | Buat post, reply, hapus post tidak pantas |
| Pengumuman | Buat pengumuman kelas |
| Profil | Lihat dan edit profil sendiri |

### 2.3 Super Admin (Administrator)

| Atribut | Detail |
|---|---|
| **Slug** | `super_admin` |
| **Level** | 3 |
| **Registrasi** | Seeder/manual (tidak bisa self-register) |
| **Jumlah per Sekolah** | 1 – 3 |

**Kemampuan:**

| Modul | Aksi |
|---|---|
| Auth | Login, Logout |
| Dashboard | Lihat dashboard admin (statistik global) |
| Kelola Guru | CRUD guru, reset password guru |
| Kelola Murid | CRUD murid, reset password murid |
| Kelola Kelas | Lihat semua kelas, assign guru, arsipkan |
| Kelola Mapel | CRUD mata pelajaran |
| Semester | CRUD semester, set semester aktif |
| Tahun Ajaran | CRUD tahun ajaran, set tahun aktif |
| Backup | Backup database manual, lihat histori backup |
| Restore | Restore dari file backup |
| Import | Import guru/murid dari Excel |
| Export | Export data ke Excel |
| Activity Log | Lihat log aktivitas seluruh pengguna |
| Role & Permission | Kelola role, assign permission |
| Settings | Pengaturan sistem (nama sekolah, logo, dll) |

---

## 3. Comparison Matrix

| Fitur | Murid | Guru | Super Admin |
|---|---|---|---|
| Self-register | ✅ | ❌ | ❌ |
| Dashboard | Own | Own Classes | Global |
| Buat kelas | ❌ | ✅ | ✅ |
| Join kelas | ✅ | ❌ | ❌ |
| Upload materi | ❌ | ✅ | ❌ |
| Download materi | ✅ | ✅ | ❌ |
| Buat tugas | ❌ | ✅ | ❌ |
| Submit tugas | ✅ | ❌ | ❌ |
| Buat quiz | ❌ | ✅ | ❌ |
| Kerjakan quiz | ✅ | ❌ | ❌ |
| Beri nilai | ❌ | ✅ | ❌ |
| Lihat nilai | Own | Class | All |
| Kelola user | ❌ | ❌ | ✅ |
| Kelola mapel | ❌ | ❌ | ✅ |
| Backup/Restore | ❌ | ❌ | ✅ |
| Import/Export | ❌ | Export nilai | ✅ |
| Activity Log | ❌ | ❌ | ✅ |
| Settings | ❌ | ❌ | ✅ |

---

## 4. Role Assignment Rules

| Rule | Deskripsi |
|---|---|
| Satu user, satu role | User hanya memiliki satu role pada satu waktu |
| Role tidak bisa diubah sendiri | Hanya Super Admin yang dapat mengubah role user |
| Super Admin minimal 1 | Sistem harus memiliki minimal 1 Super Admin yang tidak bisa dihapus |
| Guru dibuat oleh admin | Akun guru hanya bisa dibuat oleh Super Admin |
| Murid bisa self-register | Murid dapat mendaftar sendiri |
| Default role | User baru yang self-register mendapat role `student` |

---

## 5. Implementasi Teknis

### 5.1 Database

```sql
-- Tabel roles
CREATE TABLE roles (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,  -- 'student', 'teacher', 'super_admin'
    display_name VARCHAR(100) NOT NULL,
    description TEXT NULL,
    level TINYINT UNSIGNED DEFAULT 1,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Kolom role di tabel users
ALTER TABLE users ADD COLUMN role_id BIGINT UNSIGNED NOT NULL;
```

### 5.2 Middleware

```
Route::middleware(['auth', 'role:super_admin'])->group(function () {
    // Routes khusus Super Admin
});

Route::middleware(['auth', 'role:teacher'])->group(function () {
    // Routes khusus Guru
});

Route::middleware(['auth', 'role:student'])->group(function () {
    // Routes khusus Murid
});
```

### 5.3 Blade Directive

```blade
@role('super_admin')
    {{-- Konten khusus Super Admin --}}
@endrole

@role('teacher')
    {{-- Konten khusus Guru --}}
@endrole

@role('student')
    {{-- Konten khusus Murid --}}
@endrole
```

> Detail permission: [19_PERMISSION_MATRIX.md](./19_PERMISSION_MATRIX.md)

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [07_FEATURE_LIST.md](./07_FEATURE_LIST.md)*

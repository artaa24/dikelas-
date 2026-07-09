# 19 — Permission Matrix

> **Dokumen Terkait:** [06_USER_ROLES.md](./06_USER_ROLES.md) · [14_SECURITY_REQUIREMENTS.md](./14_SECURITY_REQUIREMENTS.md) · [12_SITEMAP.md](./12_SITEMAP.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **matriks izin akses (permission matrix)** DIKELAS — pemetaan detail antara setiap aksi sistem dengan role yang diizinkan. Menggunakan model **RBAC (Role-Based Access Control)** dengan granular permissions per modul.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Keamanan** | Memastikan setiap aksi hanya bisa dilakukan oleh role yang berhak |
| **Referensi** | Panduan untuk Backend Engineer saat implementasi middleware dan policy |
| **Testing** | Acuan QA untuk menguji akses kontrol |

---

## 3. Ruang Lingkup

Matriks mencakup seluruh modul DIKELAS dengan 3 role: **Super Admin (SA)**, **Guru (G)**, dan **Murid (M)**.

**Legenda:**
- ✅ = Diizinkan
- ❌ = Tidak diizinkan
- 🔒 = Diizinkan dengan kondisi (lihat catatan)

---

## 4. Permission Matrix

### 4.1 Modul Autentikasi

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| Login | ✅ | ✅ | ✅ | |
| Register | ❌ | ❌ | ✅ | Hanya murid bisa self-register |
| Logout | ✅ | ✅ | ✅ | |
| Reset Password | ✅ | ✅ | ✅ | |

### 4.2 Modul Dashboard

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| View Admin Dashboard | ✅ | ❌ | ❌ | |
| View Teacher Dashboard | ❌ | ✅ | ❌ | |
| View Student Dashboard | ❌ | ❌ | ✅ | |

### 4.3 Modul Kelas

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| View All Classrooms | ✅ | ❌ | ❌ | Admin lihat semua kelas |
| View Own Classrooms | ❌ | ✅ | ✅ | Guru: kelas diajar, Murid: kelas diikuti |
| Create Classroom | ✅ | ✅ | ❌ | |
| Edit Classroom | ✅ | 🔒 | ❌ | Guru: hanya kelas sendiri |
| Archive Classroom | ✅ | 🔒 | ❌ | Guru: hanya kelas sendiri |
| Delete Classroom | ✅ | ❌ | ❌ | |
| Join Classroom | ❌ | ❌ | ✅ | Pakai kode kelas |
| Leave Classroom | ❌ | ❌ | ✅ | |
| View Members | ✅ | 🔒 | 🔒 | Guru/Murid: hanya kelas sendiri |
| Remove Member | ✅ | 🔒 | ❌ | Guru: hanya kelas sendiri |

### 4.4 Modul Materi

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| Create Material | ❌ | 🔒 | ❌ | Guru: hanya di kelas sendiri |
| Edit Material | ❌ | 🔒 | ❌ | Guru: hanya materi sendiri |
| Delete Material | ❌ | 🔒 | ❌ | Guru: hanya materi sendiri |
| View Material | ❌ | 🔒 | 🔒 | Anggota kelas saja |
| Download Material | ❌ | 🔒 | 🔒 | Anggota kelas saja |

### 4.5 Modul Tugas

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| Create Assignment | ❌ | 🔒 | ❌ | Guru: kelas sendiri |
| Edit Assignment | ❌ | 🔒 | ❌ | Guru: tugas sendiri |
| Delete Assignment | ❌ | 🔒 | ❌ | Guru: tugas sendiri |
| View Assignment | ❌ | 🔒 | 🔒 | Anggota kelas |
| Submit Assignment | ❌ | ❌ | 🔒 | Murid: kelas sendiri |
| View Submissions | ❌ | 🔒 | ❌ | Guru: kelas sendiri |
| Grade Submission | ❌ | 🔒 | ❌ | Guru: kelas sendiri |

### 4.6 Modul Quiz

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| Create Quiz | ❌ | 🔒 | ❌ | Guru: kelas sendiri |
| Edit Quiz | ❌ | 🔒 | ❌ | Guru: quiz sendiri |
| Delete Quiz | ❌ | 🔒 | ❌ | Guru: quiz sendiri |
| Attempt Quiz | ❌ | ❌ | 🔒 | Murid: kelas sendiri |
| View Quiz Results | ❌ | 🔒 | 🔒 | Guru: semua, Murid: sendiri |

### 4.7 Modul Nilai

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| View All Grades | ✅ | ❌ | ❌ | Admin: semua |
| View Class Grades | ❌ | 🔒 | ❌ | Guru: kelas sendiri |
| View Own Grades | ❌ | ❌ | ✅ | Murid: nilai sendiri |
| Input Grade | ❌ | 🔒 | ❌ | Guru: kelas sendiri |
| Export Grades | ✅ | 🔒 | ❌ | |

### 4.8 Modul Diskusi & Pengumuman

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| Create Discussion | ❌ | 🔒 | 🔒 | Anggota kelas |
| Reply Discussion | ❌ | 🔒 | 🔒 | Anggota kelas |
| Delete Discussion | ❌ | 🔒 | ❌ | Guru: kelas sendiri |
| Create Class Announcement | ❌ | 🔒 | ❌ | Guru: kelas sendiri |
| Create Global Announcement | ✅ | ❌ | ❌ | |
| Pin Announcement | ✅ | 🔒 | ❌ | |

### 4.9 Modul Administrasi

| Permission | SA | G | M | Catatan |
|---|---|---|---|---|
| Manage Teachers | ✅ | ❌ | ❌ | CRUD guru |
| Manage Students | ✅ | ❌ | ❌ | CRUD murid |
| Manage Subjects | ✅ | ❌ | ❌ | CRUD mata pelajaran |
| Manage Semesters | ✅ | ❌ | ❌ | CRUD semester |
| Manage Academic Years | ✅ | ❌ | ❌ | CRUD tahun ajaran |
| Backup Database | ✅ | ❌ | ❌ | |
| Restore Database | ✅ | ❌ | ❌ | |
| Import Excel | ✅ | ❌ | ❌ | |
| Export Excel | ✅ | ❌ | ❌ | |
| View Activity Log | ✅ | ❌ | ❌ | |
| Manage Roles | ✅ | ❌ | ❌ | |
| System Settings | ✅ | ❌ | ❌ | |

---

## 5. Daftar Permission (Database)

| Module | Permission Name | Display Name |
|---|---|---|
| classroom | `classroom.view` | Lihat Kelas |
| classroom | `classroom.create` | Buat Kelas |
| classroom | `classroom.edit` | Edit Kelas |
| classroom | `classroom.delete` | Hapus Kelas |
| material | `material.create` | Upload Materi |
| material | `material.edit` | Edit Materi |
| material | `material.delete` | Hapus Materi |
| assignment | `assignment.create` | Buat Tugas |
| assignment | `assignment.grade` | Nilai Tugas |
| quiz | `quiz.create` | Buat Quiz |
| quiz | `quiz.grade` | Nilai Quiz |
| grade | `grade.view` | Lihat Nilai |
| grade | `grade.export` | Export Nilai |
| user | `user.manage` | Kelola User |
| admin | `admin.backup` | Backup |
| admin | `admin.restore` | Restore |
| admin | `admin.import` | Import |
| admin | `admin.export` | Export |
| admin | `admin.settings` | Pengaturan |
| admin | `admin.log` | Activity Log |

---

## 6. Implementasi Teknis

### 6.1 Middleware

```php
// Role middleware
Route::middleware(['auth', 'role:super_admin'])->prefix('admin')->group(...);
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->group(...);
Route::middleware(['auth', 'role:student'])->prefix('student')->group(...);
```

### 6.2 Policy

```php
// ClassroomPolicy
public function update(User $user, Classroom $classroom): bool
{
    return $user->id === $classroom->teacher_id
        || $user->hasRole('super_admin');
}
```

---

## 7. Checklist

- [x] Permission matrix per modul terdefinisi
- [x] 3 role dengan hierarki terdefinisi
- [x] Kondisi akses (🔒) terdokumentasi
- [x] Daftar permission database terdefinisi
- [x] Implementasi middleware dan policy terdefinisi

---

## 8. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-PM-001 | Setiap route memiliki middleware role yang sesuai | ✅ |
| AC-PM-002 | Policy mencegah akses resource milik user lain | ✅ |
| AC-PM-003 | Super Admin memiliki akses penuh ke modul admin | ✅ |
| AC-PM-004 | Murid tidak bisa mengakses route guru/admin | ✅ |
| AC-PM-005 | Guru hanya bisa CRUD di kelas sendiri | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [20_TECH_STACK.md](./20_TECH_STACK.md)*

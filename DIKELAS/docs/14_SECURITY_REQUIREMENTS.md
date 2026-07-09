# 14 — Security Requirements

> **Dokumen Terkait:** [09_NON_FUNCTIONAL_REQUIREMENTS.md](./09_NON_FUNCTIONAL_REQUIREMENTS.md) · [19_PERMISSION_MATRIX.md](./19_PERMISSION_MATRIX.md) · [06_USER_ROLES.md](./06_USER_ROLES.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **kebutuhan keamanan** DIKELAS secara komprehensif. Keamanan data pendidikan merupakan prioritas utama karena menyangkut data pribadi guru dan murid. Dokumen mencakup autentikasi, otorisasi, perlindungan data, validasi input, dan audit trail.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Proteksi Data** | Melindungi data pribadi guru dan murid dari akses tidak sah |
| **Compliance** | Mematuhi UU Perlindungan Data Pribadi (UU PDP) Indonesia |
| **Integritas** | Memastikan data tidak bisa dimanipulasi tanpa otorisasi |
| **Audit** | Menyediakan audit trail untuk setiap aksi sensitif |

---

## 3. Ruang Lingkup

Dokumen ini mencakup aspek keamanan berikut:
- Autentikasi & Manajemen Sesi
- Otorisasi & Akses Kontrol
- Perlindungan Data (at rest & in transit)
- Validasi Input & Output
- Keamanan File Upload
- Audit Trail & Logging
- Konfigurasi Server

---

## 4. Autentikasi

### 4.1 Mekanisme Autentikasi

| Aspek | Implementasi |
|---|---|
| **Framework** | Laravel Breeze + Laravel Sanctum |
| **Hashing** | bcrypt (cost factor: 12) |
| **Session Driver** | Database (`sessions` table) |
| **Session Lifetime** | 120 menit (2 jam) |
| **Remember Me** | Token-based, 30 hari |
| **CSRF Protection** | Token per session, auto-included di Blade |

### 4.2 Password Policy

| Rule | Requirement |
|---|---|
| Panjang minimum | 8 karakter |
| Panjang maksimum | 255 karakter |
| Konfirmasi | Password harus dikonfirmasi (confirmed) |
| Hashing | bcrypt (tidak pernah plain-text) |
| Reset | Via email token, valid 60 menit, single-use |

### 4.3 Rate Limiting

| Context | Limit | Window | Action |
|---|---|---|---|
| Login attempts | 5 percobaan | 1 menit | Throttle (429 Too Many Requests) |
| Password reset | 3 request | 1 menit | Throttle |
| API requests | 60 request | 1 menit | Throttle |
| File upload | 10 upload | 1 menit | Throttle |

### 4.4 Session Security

```php
// config/session.php
'driver' => 'database',
'lifetime' => 120,
'expire_on_close' => false,
'encrypt' => false,
'cookie' => 'dikelas_session',
'http_only' => true,
'secure' => true,         // HTTPS only
'same_site' => 'lax',
```

---

## 5. Otorisasi

### 5.1 Model Otorisasi

```
Role-Based Access Control (RBAC)
├── Setiap user memiliki 1 role
├── Setiap role memiliki banyak permissions
├── Middleware mengecek role dan permission
└── Policy mengecek kepemilikan resource
```

### 5.2 Middleware Stack

| Middleware | Fungsi | Contoh |
|---|---|---|
| `auth` | User harus login | Semua halaman non-publik |
| `role:{name}` | User harus memiliki role tertentu | `role:teacher` |
| `permission:{name}` | User harus memiliki permission | `permission:create-class` |
| `verified` | Email harus terverifikasi | Aksi sensitif |
| `throttle` | Rate limiting | Login, API |

### 5.3 Laravel Policy

| Resource | Policy | Rules |
|---|---|---|
| Classroom | ClassroomPolicy | Hanya guru pemilik yang bisa edit/delete |
| Assignment | AssignmentPolicy | Hanya guru pemilik kelas yang bisa CRUD |
| Submission | SubmissionPolicy | Murid hanya bisa edit submission sendiri |
| Quiz | QuizPolicy | Hanya guru pemilik kelas yang bisa CRUD |
| Material | MaterialPolicy | Hanya guru pemilik kelas yang bisa CRUD |
| User | UserPolicy | Hanya Super Admin yang bisa CRUD user |

---

## 6. Perlindungan Data

### 6.1 Data in Transit

| Aspek | Implementasi |
|---|---|
| **HTTPS** | Wajib di production (TLS 1.2+) |
| **Force HTTPS** | Middleware `\App\Http\Middleware\ForceHttps` |
| **HSTS** | Strict-Transport-Security header |
| **Secure Cookies** | `secure => true` di session config |

### 6.2 Data at Rest

| Data | Proteksi |
|---|---|
| Password | bcrypt hashing (cost: 12) |
| Session | Encrypted session cookie |
| Backup files | Stored di non-public directory |
| Upload files | Stored di `storage/app/private/` |
| Environment variables | `.env` file (not in version control) |

### 6.3 Data Sensitif

| Tipe Data | Klasifikasi | Proteksi |
|---|---|---|
| Password | 🔴 Kritis | Hashing, never exposed |
| Email | 🟡 Pribadi | Input validation, unique |
| NIS/NIP | 🟡 Pribadi | Access control |
| Nilai akademik | 🟡 Pribadi | Access control per student |
| Backup database | 🔴 Kritis | Akses Super Admin only |
| Activity logs | 🟡 Sensitif | Immutable, admin only |

---

## 7. Validasi Input

### 7.1 Prinsip Validasi

| Prinsip | Deskripsi |
|---|---|
| **Server-side wajib** | Semua input HARUS divalidasi di server |
| **Client-side opsional** | Validasi JavaScript untuk UX, bukan keamanan |
| **Whitelist approach** | Hanya terima input yang valid, tolak sisanya |
| **Sanitize output** | Blade auto-escaping `{{ }}` untuk semua output |

### 7.2 Validasi per Tipe Input

| Tipe Input | Validasi |
|---|---|
| **Email** | `required|email|max:255|unique:users` |
| **Password** | `required|min:8|confirmed` |
| **Nama** | `required|string|max:255` |
| **Deskripsi** | `nullable|string|max:5000` |
| **Nilai** | `required|numeric|min:0|max:100` |
| **Kode Kelas** | `required|string|size:6|alpha_num|exists:classrooms,code` |
| **File Upload** | `required|file|mimes:pdf,doc,docx,ppt,pptx,mp4|max:51200` |
| **Tanggal** | `required|date|after:now` |

### 7.3 Proteksi Terhadap Serangan

| Serangan | Proteksi | Implementasi |
|---|---|---|
| **SQL Injection** | Parameterized queries | Eloquent ORM (default) |
| **XSS** | Output escaping | Blade `{{ }}` (auto-escape) |
| **CSRF** | Token validation | `@csrf` directive di semua form |
| **Mass Assignment** | `$fillable` / `$guarded` | Eloquent Model properties |
| **Path Traversal** | Filename sanitization | `Str::slug()` untuk file names |
| **IDOR** | Policy authorization | `$this->authorize()` di controller |

---

## 8. Keamanan File Upload

### 8.1 Aturan Upload

| Aspek | Rule |
|---|---|
| **Ukuran Maksimal** | 50MB per file |
| **Format Diizinkan** | PDF, DOC, DOCX, PPT, PPTX, MP4, MOV, AVI, JPG, PNG |
| **MIME Validation** | Server-side MIME type checking |
| **Nama File** | Sanitize dan rename (UUID + extension) |
| **Storage Path** | `storage/app/private/{type}/{classroom_id}/` |
| **Direct Access** | Tidak bisa diakses langsung via URL |
| **Download** | Melalui controller dengan authorization check |

### 8.2 File Storage Structure

```
storage/app/private/
├── avatars/
│   └── {user_id}/avatar.{ext}
├── materials/
│   └── {classroom_id}/{uuid}.{ext}
├── assignments/
│   ├── attachments/{assignment_id}/{uuid}.{ext}
│   └── submissions/{assignment_id}/{student_id}/{uuid}.{ext}
└── backups/
    └── {filename}.sql.gz
```

---

## 9. Audit Trail

### 9.1 Aksi yang Di-log

| Kategori | Aksi |
|---|---|
| **Auth** | Login, Logout, Failed Login, Password Reset |
| **User CRUD** | Create, Update, Delete user |
| **Classroom** | Create, Update, Archive, Delete kelas |
| **Assignment** | Create, Update, Delete tugas |
| **Grading** | Input nilai, Update nilai |
| **Quiz** | Create, Update, Delete quiz |
| **Admin** | Backup, Restore, Import, Export, Settings change |
| **File** | Upload, Download, Delete file |

### 9.2 Data yang Dicatat

| Field | Deskripsi |
|---|---|
| `user_id` | ID user yang melakukan aksi |
| `action` | Nama aksi (e.g., `user.login`, `assignment.create`) |
| `subject_type` | Model class yang terpengaruh |
| `subject_id` | ID record yang terpengaruh |
| `properties` | JSON data (old values, new values) |
| `ip_address` | IP address user |
| `user_agent` | Browser/device info |
| `created_at` | Timestamp aksi |

### 9.3 Retensi Log

| Tipe | Retensi | Aksi Setelah Expired |
|---|---|---|
| Activity Log | 90 hari | Archive atau delete (configurable) |
| Auth Log | 180 hari | Archive |
| Error Log | 30 hari | Delete (rotate) |
| Backup Log | Permanent | Tidak dihapus |

---

## 10. Konfigurasi Server

### 10.1 Headers Keamanan

```
X-Content-Type-Options: nosniff
X-Frame-Options: SAMEORIGIN
X-XSS-Protection: 1; mode=block
Referrer-Policy: strict-origin-when-cross-origin
Content-Security-Policy: default-src 'self'
Strict-Transport-Security: max-age=31536000; includeSubDomains
```

### 10.2 Environment Security

| Item | Rule |
|---|---|
| `.env` file | TIDAK boleh di-commit ke version control |
| `APP_DEBUG` | `false` di production |
| `APP_KEY` | Generate unik per instalasi |
| Database credentials | Hanya di `.env`, tidak hardcode |
| `storage/` | Permission 775 (owner writable) |
| `public/` | Permission 755 (read only) |

---

## 11. Security Checklist

- [x] Password hashing dengan bcrypt
- [x] CSRF protection di semua form
- [x] XSS prevention (Blade auto-escaping)
- [x] SQL Injection prevention (Eloquent ORM)
- [x] Rate limiting untuk login dan API
- [x] Role-based access control (RBAC)
- [x] Policy-based authorization per resource
- [x] File upload validation (MIME, size, extension)
- [x] Secure file storage (non-public directory)
- [x] HTTPS enforcement di production
- [x] Security headers configured
- [x] Audit trail untuk aksi sensitif
- [x] Session security (httpOnly, secure, sameSite)
- [x] `.env` excluded dari version control
- [x] APP_DEBUG = false di production

---

## 12. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-SEC-001 | Password di-hash dengan bcrypt, tidak pernah plain-text | ✅ |
| AC-SEC-002 | CSRF token hadir di setiap form POST | ✅ |
| AC-SEC-003 | Semua output di-escape oleh Blade | ✅ |
| AC-SEC-004 | Rate limiting aktif untuk login (5x/menit) | ✅ |
| AC-SEC-005 | File upload hanya menerima format yang diizinkan | ✅ |
| AC-SEC-006 | File tersimpan di non-public directory | ✅ |
| AC-SEC-007 | Audit log mencatat semua aksi sensitif | ✅ |
| AC-SEC-008 | Policy mencegah akses resource milik user lain | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [15_NOTIFICATION_SYSTEM.md](./15_NOTIFICATION_SYSTEM.md)*

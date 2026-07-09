# 23 — Development Guidelines

> **Dokumen Terkait:** [24_CODING_STANDARD.md](./24_CODING_STANDARD.md) · [21_LARAVEL_ARCHITECTURE.md](./21_LARAVEL_ARCHITECTURE.md) · [22_FOLDER_STRUCTURE.md](./22_FOLDER_STRUCTURE.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **panduan pengembangan** DIKELAS — workflow, Git conventions, code review process, dan best practices yang harus diikuti oleh seluruh tim development.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Konsistensi** | Workflow seragam di seluruh tim |
| **Kualitas** | Menjaga kualitas kode melalui review process |
| **Kolaborasi** | Menghindari konflik dan miskomunikasi |

---

## 3. Development Workflow

### 3.1 Git Branching Strategy

```
main ─────────────────────────────────────── (production)
  │
  └── develop ────────────────────────────── (staging)
        │
        ├── feature/auth-login ──────────── (fitur baru)
        ├── feature/classroom-crud ───────── (fitur baru)
        ├── bugfix/login-redirect ────────── (perbaikan bug)
        └── hotfix/security-patch ────────── (perbaikan urgent)
```

| Branch | Konvensi | Sumber | Merge Ke |
|---|---|---|---|
| `main` | Protected | — | — (production) |
| `develop` | Protected | `main` | `main` (release) |
| `feature/*` | `feature/{module}-{desc}` | `develop` | `develop` |
| `bugfix/*` | `bugfix/{desc}` | `develop` | `develop` |
| `hotfix/*` | `hotfix/{desc}` | `main` | `main` + `develop` |

### 3.2 Commit Convention

Format: `type(scope): description`

| Type | Deskripsi | Contoh |
|---|---|---|
| `feat` | Fitur baru | `feat(classroom): add join class by code` |
| `fix` | Perbaikan bug | `fix(auth): fix redirect after login` |
| `docs` | Dokumentasi | `docs(readme): update installation steps` |
| `style` | Formatting | `style(blade): fix indentation` |
| `refactor` | Refactoring | `refactor(service): extract grade calculation` |
| `test` | Testing | `test(classroom): add unit test for create` |
| `chore` | Maintenance | `chore(deps): update laravel to 12.1` |

### 3.3 Pull Request Process

```
1. Developer buat branch feature
2. Develop dan commit
3. Push ke remote
4. Buat Pull Request ke develop
5. Code review oleh minimal 1 reviewer
6. Fix review comments jika ada
7. Reviewer approve
8. Merge ke develop
```

---

## 4. Code Review Checklist

| No | Aspek | Pertanyaan |
|---|---|---|
| 1 | **Functionality** | Apakah kode berfungsi sesuai requirement? |
| 2 | **Architecture** | Apakah mengikuti layer architecture? |
| 3 | **Naming** | Apakah naming conventions konsisten? |
| 4 | **Validation** | Apakah input divalidasi di server? |
| 5 | **Authorization** | Apakah akses dikontrol dengan middleware/policy? |
| 6 | **Security** | Apakah ada potensi SQL injection, XSS, CSRF? |
| 7 | **Performance** | Apakah ada N+1 query? Perlu eager loading? |
| 8 | **Testing** | Apakah ada unit/feature test? |
| 9 | **Documentation** | Apakah kode terdokumentasi (PHPDoc)? |
| 10 | **DRY** | Apakah ada duplikasi yang bisa diekstrak? |

---

## 5. Development Environment Setup

### 5.1 Prerequisites

```bash
# Required
PHP 8.4+
MySQL 8.0+
Composer 2.x
Node.js 18+ & NPM 9+

# Optional
Laravel Valet (macOS) / XAMPP (Windows) / Docker
```

### 5.2 Initial Setup

```bash
# 1. Clone repository
git clone <repo-url>
cd DIKELAS

# 2. Install dependencies
composer install
npm install

# 3. Environment setup
cp .env.example .env
php artisan key:generate

# 4. Database setup
php artisan migrate
php artisan db:seed

# 5. Build assets
npm run dev

# 6. Start server
php artisan serve
```

### 5.3 Daily Development

```bash
# Start development
npm run dev              # Vite dev server (HMR)
php artisan serve        # Laravel dev server

# Database changes
php artisan make:migration create_xxx_table
php artisan migrate

# Clear cache
php artisan optimize:clear

# Run tests
php artisan test
```

---

## 6. Best Practices

### 6.1 Laravel Best Practices

| Practice | Deskripsi |
|---|---|
| **Eager Loading** | Selalu gunakan `with()` untuk relasi yang dibutuhkan |
| **Mass Assignment** | Definisikan `$fillable` di setiap model |
| **Soft Deletes** | Gunakan `SoftDeletes` untuk tabel utama |
| **Form Requests** | Validasi di FormRequest, bukan di controller |
| **Resource Routes** | Gunakan `Route::resource()` jika applicable |
| **Blade Components** | Ekstrak UI berulang ke Blade components |
| **Config over env** | Akses config via `config()`, bukan `env()` langsung |

### 6.2 Database Best Practices

| Practice | Deskripsi |
|---|---|
| **No raw queries** | Gunakan Eloquent/Query Builder |
| **Pagination** | Selalu paginate list yang bisa panjang |
| **Indexing** | Index kolom yang sering di-WHERE/JOIN |
| **Transactions** | Gunakan DB::transaction untuk operasi multi-table |
| **Migrations** | Semua perubahan schema via migration |

---

## 7. Checklist

- [x] Git branching strategy terdefinisi
- [x] Commit convention terdefinisi
- [x] Code review process terdefinisi
- [x] Development environment setup terdokumentasi
- [x] Best practices terdokumentasi
- [x] PR process terdefinisi

---

## 8. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-DG-001 | Semua developer mengikuti branching strategy | ✅ |
| AC-DG-002 | Commit messages mengikuti konvensi | ✅ |
| AC-DG-003 | Setiap PR di-review sebelum merge | ✅ |
| AC-DG-004 | Setup guide memungkinkan dev baru mulai dalam 30 menit | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [24_CODING_STANDARD.md](./24_CODING_STANDARD.md)*

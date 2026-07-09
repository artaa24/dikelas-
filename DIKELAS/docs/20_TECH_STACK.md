# 20 — Tech Stack

> **Dokumen Terkait:** [00_PROJECT_OVERVIEW.md](./00_PROJECT_OVERVIEW.md) · [21_LARAVEL_ARCHITECTURE.md](./21_LARAVEL_ARCHITECTURE.md) · [22_FOLDER_STRUCTURE.md](./22_FOLDER_STRUCTURE.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **tech stack** DIKELAS secara detail — alasan pemilihan setiap teknologi, versi yang digunakan, dan bagaimana teknologi-teknologi tersebut berinteraksi.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Standardisasi** | Memastikan seluruh tim menggunakan versi dan tools yang sama |
| **Onboarding** | Mempercepat onboarding developer baru |
| **Compatibility** | Mencegah konflik versi dan dependency |

---

## 3. Tech Stack Overview

```
┌────────────────────────────────────────┐
│           PRESENTATION LAYER           │
│  Blade + TailwindCSS + AlpineJS       │
│  Livewire (reactive components)        │
└────────────────┬───────────────────────┘
                 │
┌────────────────▼───────────────────────┐
│           APPLICATION LAYER            │
│  Laravel 12 (PHP 8.4)                  │
│  ├── Controllers + Services            │
│  ├── Eloquent ORM                      │
│  ├── Laravel Breeze (Auth)             │
│  ├── Laravel Sanctum (API Token)       │
│  └── Laravel Storage (File)            │
└────────────────┬───────────────────────┘
                 │
┌────────────────▼───────────────────────┐
│              DATA LAYER                │
│  MySQL 8.0 (Database)                  │
│  Local Filesystem (File Storage)       │
└────────────────────────────────────────┘
```

---

## 4. Detail Teknologi

### 4.1 Backend

| Teknologi | Versi | Fungsi | Alasan Pemilihan |
|---|---|---|---|
| **PHP** | 8.4 | Runtime | Performa terbaik, fitur modern (named args, enums, fibers) |
| **Laravel** | 12 | Framework | Framework PHP paling populer, ecosystem lengkap |
| **Composer** | 2.x | Package Manager | Standar package manager PHP |

### 4.2 Frontend

| Teknologi | Versi | Fungsi | Alasan Pemilihan |
|---|---|---|---|
| **Blade** | — | Template Engine | Native Laravel, server-side rendering |
| **TailwindCSS** | 4.x | CSS Framework | Utility-first, customizable, modern |
| **Livewire** | 3.x | Reactive Components | Full-stack reactivity tanpa menulis JS |
| **AlpineJS** | 3.x | JS Interactivity | Lightweight, deklaratif, cocok dengan Blade |
| **Vite** | Latest | Build Tool | Fast HMR, native ES modules |

### 4.3 Database

| Teknologi | Versi | Fungsi | Alasan Pemilihan |
|---|---|---|---|
| **MySQL** | 8.0 | Database | Paling umum di hosting Indonesia, familiar |

### 4.4 Authentication

| Teknologi | Versi | Fungsi | Alasan Pemilihan |
|---|---|---|---|
| **Laravel Breeze** | Latest | Auth Scaffolding | Simple, Blade-based, minimal overhead |
| **Laravel Sanctum** | Latest | API Token | Lightweight token auth untuk SPA/mobile (future) |

### 4.5 Packages Utama

| Package | Versi | Fungsi |
|---|---|---|
| `maatwebsite/excel` | 3.x | Import/Export Excel |
| `spatie/laravel-activitylog` | 4.x | Activity logging |
| `spatie/laravel-permission` | 6.x | Role & Permission (evaluasi) |
| `intervention/image` | 3.x | Image processing (avatar) |
| `barryvdh/laravel-debugbar` | 3.x | Development debugging |

### 4.6 Development Tools

| Tool | Fungsi |
|---|---|
| **Laravel Debugbar** | Query debugging, performance profiling |
| **Laravel Telescope** | Request monitoring (dev only) |
| **PHPUnit** | Unit & Feature testing |
| **Laravel Pint** | Code formatting (PSR-12) |
| **Pest** | Testing framework (opsional) |

---

## 5. Server Requirements

| Requirement | Minimum | Recommended |
|---|---|---|
| **PHP** | 8.4 | 8.4+ |
| **MySQL** | 8.0 | 8.0+ |
| **Nginx** | 1.18 | 1.24+ |
| **Node.js** | 18.x | 20.x (LTS) |
| **NPM** | 9.x | 10.x |
| **Composer** | 2.x | 2.7+ |
| **RAM** | 2 GB | 4 GB |
| **CPU** | 1 Core | 2 Core |
| **Storage** | 20 GB | 100 GB (SSD) |
| **OS** | Ubuntu 22.04 | Ubuntu 24.04 |

---

## 6. PHP Extensions Required

| Extension | Fungsi |
|---|---|
| `php-mbstring` | String multibyte |
| `php-xml` | XML parsing |
| `php-curl` | HTTP requests |
| `php-mysql` | MySQL driver |
| `php-zip` | Zip archive |
| `php-gd` | Image processing |
| `php-bcmath` | Math operations |
| `php-intl` | Internationalization |
| `php-fileinfo` | File type detection |

---

## 7. Checklist

- [x] Backend stack terdefinisi (PHP, Laravel)
- [x] Frontend stack terdefinisi (Blade, Tailwind, Livewire, Alpine)
- [x] Database stack terdefinisi (MySQL)
- [x] Auth stack terdefinisi (Breeze, Sanctum)
- [x] Packages utama terdefinisi
- [x] Server requirements terdefinisi
- [x] PHP extensions terdefinisi

---

## 8. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-TS-001 | Semua teknologi memiliki versi yang terspesifikasi | ✅ |
| AC-TS-002 | Alasan pemilihan terdokumentasi | ✅ |
| AC-TS-003 | Server requirements terdefinisi | ✅ |
| AC-TS-004 | PHP extensions terdaftar | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [21_LARAVEL_ARCHITECTURE.md](./21_LARAVEL_ARCHITECTURE.md)*

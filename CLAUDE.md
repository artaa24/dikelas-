# CLAUDE.md

# DIKELAS

Learning Management System (LMS) berbasis Laravel.

---

# Project Overview

DIKELAS adalah platform LMS modern untuk sekolah Indonesia.

Target pengguna:

- Murid
- Guru
- Super Admin

Framework:

- Laravel 12
- PHP 8.4
- Blade
- Livewire
- AlpineJS
- TailwindCSS
- MySQL

---

# Source of Truth

Seluruh requirement terdapat pada folder:

docs/

Baca terlebih dahulu sebelum melakukan implementasi.

Prioritas dokumen:

1. docs/01_PRD.md
2. docs/05_USER_FLOW.md
3. docs/07_DATABASE.md
4. docs/08_ERD.md
5. docs/09_API.md
6. docs/10_UI_GUIDE.md

Jangan membuat asumsi apabila requirement belum jelas.

---

# Coding Principles

- Gunakan Clean Architecture.
- Gunakan Service Layer.
- Gunakan Repository Pattern.
- Jangan menaruh business logic di Controller.
- Gunakan Form Request untuk validasi.
- Gunakan Policy untuk Authorization.
- Gunakan Eloquent Relationship.
- Gunakan UUID pada entitas utama bila telah ditetapkan.
- Gunakan Soft Delete jika diperlukan.

---

# UI Rules

Ikuti desain Figma 100%.

Jangan mengubah:

- warna
- spacing
- typography
- radius
- layout
- design system

Gunakan component yang reusable.

---

# Development Workflow

Sebelum coding:

1. Baca PRD.
2. Baca Database.
3. Baca User Flow.
4. Baca UI.

Sesudah coding:

- Pastikan tidak merusak module lain.
- Pastikan responsive.
- Pastikan validasi lengkap.
- Pastikan error handling tersedia.

---

# Folder Structure

Business Logic

app/Services

Repository

app/Repositories

DTO

app/DTO

Enums

app/Enums

Policies

app/Policies

Notifications

app/Notifications

Actions

app/Actions

Traits

app/Traits

---

# Database

Database adalah MySQL.

Jangan mengubah struktur tabel tanpa memperbarui dokumentasi.

Selalu gunakan Migration Laravel.

---

# Naming Convention

Class

PascalCase

Method

camelCase

Database

snake_case

Migration

snake_case

---

# Before Creating New Feature

Selalu lakukan analisis:

- Apakah fitur sudah ada?
- Apakah database mendukung?
- Apakah UI tersedia?
- Apakah route sudah ada?
- Apakah permission sudah benar?

---

# Git Workflow

Branch:

develop

feature/auth

feature/classes

feature/material

feature/assignment

feature/admin

Jangan commit langsung ke main.

---

# Documentation

Jika membuat fitur baru:

Perbarui:

- PRD
- Database
- API
- User Flow

Jika diperlukan.

---

# Final Rule

Jangan membuat implementasi di luar requirement.

Jika requirement tidak ditemukan, minta klarifikasi atau tandai sebagai TODO daripada membuat asumsi.

---

# Directory Structure

DIKELAS/
│
├── CLAUDE.md          ← Aturan untuk Claude
├── AGENTS.md          ← (Opsional, untuk agent lain)
├── README.md
│
├── docs/
│   ├── 01_PRD.md
│   ├── 02_FEATURES.md
│   ├── 03_USER_FLOW.md
│   ├── 04_SITEMAP.md
│   ├── 05_DATABASE.md
│   ├── 06_ERD.md
│   ├── 07_API.md
│   ├── 08_UI_GUIDE.md
│   ├── 09_SECURITY.md
│   └── 10_ROADMAP.md
│
├── resources/
├── app/
├── database/
└── ...

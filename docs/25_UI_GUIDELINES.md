# 25 — UI Guidelines

> **Dokumen Terkait:** [03_PRODUCT_VISION.md](./03_PRODUCT_VISION.md) · [10_INFORMATION_ARCHITECTURE.md](./10_INFORMATION_ARCHITECTURE.md) · [05_USER_PERSONA.md](./05_USER_PERSONA.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **panduan desain UI** DIKELAS — design system, color palette, typography, spacing, komponen UI, dan prinsip desain yang harus diikuti untuk menciptakan antarmuka yang konsisten, modern, dan intuitif.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Konsistensi** | Semua halaman memiliki tampilan dan nuansa yang seragam |
| **Efisiensi** | Developer dan designer memiliki acuan komponen standar |
| **Aksesibilitas** | Antarmuka dapat digunakan oleh pengguna dengan berbagai kemampuan |

---

## 3. Design Principles

| No | Prinsip | Deskripsi |
|---|---|---|
| 1 | **Simplicity** | Tampilkan yang esensial, sembunyikan yang tidak perlu |
| 2 | **Consistency** | Elemen yang sama berperilaku sama di mana saja |
| 3 | **Feedback** | Setiap aksi user mendapat respons visual |
| 4 | **Hierarchy** | Informasi penting lebih menonjol |
| 5 | **Accessibility** | Warna kontras cukup, font mudah dibaca |

---

## 4. Color Palette

### 4.1 Brand Colors

| Nama | Hex | Penggunaan |
|---|---|---|
| **Primary** | `#4F46E5` (Indigo-600) | Tombol utama, link, aksen |
| **Primary Light** | `#818CF8` (Indigo-400) | Hover state, background ringan |
| **Primary Dark** | `#3730A3` (Indigo-800) | Active state, header |
| **Secondary** | `#0EA5E9` (Sky-500) | Aksen sekunder, info badge |

### 4.2 Semantic Colors

| Nama | Hex | Penggunaan |
|---|---|---|
| **Success** | `#22C55E` (Green-500) | Berhasil, dinilai, aktif |
| **Warning** | `#F59E0B` (Amber-500) | Peringatan, pending |
| **Danger** | `#EF4444` (Red-500) | Error, hapus, terlambat |
| **Info** | `#3B82F6` (Blue-500) | Informasi, submitted |

### 4.3 Neutral Colors

| Nama | Hex | Penggunaan |
|---|---|---|
| **White** | `#FFFFFF` | Background utama |
| **Gray-50** | `#F9FAFB` | Background sekunder |
| **Gray-100** | `#F3F4F6` | Card background |
| **Gray-200** | `#E5E7EB` | Border |
| **Gray-500** | `#6B7280` | Teks sekunder |
| **Gray-700** | `#374151` | Teks utama |
| **Gray-900** | `#111827` | Heading |

---

## 5. Typography

### 5.1 Font Family

| Penggunaan | Font | Fallback |
|---|---|---|
| **Heading** | Inter | system-ui, sans-serif |
| **Body** | Inter | system-ui, sans-serif |
| **Mono** | JetBrains Mono | monospace |

### 5.2 Font Scale

| Level | Size | Weight | Line Height | Penggunaan |
|---|---|---|---|---|
| **H1** | 30px / 1.875rem | Bold (700) | 1.2 | Judul halaman |
| **H2** | 24px / 1.5rem | Semibold (600) | 1.3 | Section heading |
| **H3** | 20px / 1.25rem | Semibold (600) | 1.4 | Sub-section |
| **H4** | 16px / 1rem | Semibold (600) | 1.4 | Card title |
| **Body** | 14px / 0.875rem | Regular (400) | 1.5 | Teks umum |
| **Small** | 12px / 0.75rem | Regular (400) | 1.5 | Label, caption |

---

## 6. Spacing System

Menggunakan skala 4px:

| Token | Value | Penggunaan |
|---|---|---|
| `space-1` | 4px | Micro spacing |
| `space-2` | 8px | Tight spacing |
| `space-3` | 12px | Compact |
| `space-4` | 16px | Default padding |
| `space-5` | 20px | Section gap |
| `space-6` | 24px | Card padding |
| `space-8` | 32px | Section gap besar |

---

## 7. Layout

### 7.1 Page Layout

```
┌─────────────────────────────────────────────────┐
│  Topbar (h: 64px, fixed top)                    │
├──────────┬──────────────────────────────────────┤
│ Sidebar  │  Main Content                        │
│ (w:256px)│  ┌────────────────────────────────┐  │
│          │  │ Page Header (Title + Actions)  │  │
│  Nav     │  ├────────────────────────────────┤  │
│  Items   │  │                                │  │
│          │  │ Content Area                   │  │
│          │  │ (max-w: 1280px, centered)      │  │
│          │  │                                │  │
│          │  └────────────────────────────────┘  │
└──────────┴──────────────────────────────────────┘
```

### 7.2 Responsive Breakpoints

| Breakpoint | Width | Layout |
|---|---|---|
| **Mobile** | < 768px | Sidebar tersembunyi (hamburger) |
| **Tablet** | 768px – 1023px | Sidebar collapsed (icon only) |
| **Desktop** | ≥ 1024px | Sidebar expanded |

---

## 8. Komponen UI

### 8.1 Button

| Variant | Penggunaan | Style |
|---|---|---|
| **Primary** | Aksi utama (Simpan, Buat) | bg-indigo-600 text-white |
| **Secondary** | Aksi sekunder (Batal) | bg-white border text-gray-700 |
| **Danger** | Aksi destruktif (Hapus) | bg-red-600 text-white |
| **Ghost** | Aksi ringan | bg-transparent text-gray-600 |

### 8.2 Card

```
┌──────────────────────────────┐
│  Card Header (optional)      │
├──────────────────────────────┤
│                              │
│  Card Content                │
│                              │
├──────────────────────────────┤
│  Card Footer (optional)      │
└──────────────────────────────┘

Style: bg-white rounded-lg shadow-sm border p-6
```

### 8.3 Table

| Fitur | Deskripsi |
|---|---|
| Header | bg-gray-50, text-gray-500, uppercase, text-xs |
| Row | border-b, hover:bg-gray-50 |
| Pagination | Bawah tabel, Laravel default |
| Empty State | Ilustrasi + pesan "Belum ada data" |

### 8.4 Badge / Status

| Status | Style |
|---|---|
| Aktif / Dinilai | `bg-green-100 text-green-800` |
| Pending | `bg-yellow-100 text-yellow-800` |
| Terlambat | `bg-red-100 text-red-800` |
| Submitted | `bg-blue-100 text-blue-800` |
| Archived | `bg-gray-100 text-gray-800` |

### 8.5 Form Elements

| Element | Style |
|---|---|
| Input | `border-gray-300 rounded-lg focus:ring-indigo-500` |
| Select | Same as input |
| Textarea | Same as input |
| Label | `text-sm font-medium text-gray-700` |
| Error | `text-sm text-red-600 mt-1` |

### 8.6 Toast / Alert

| Type | Style |
|---|---|
| Success | `bg-green-50 border-green-400 text-green-800` |
| Error | `bg-red-50 border-red-400 text-red-800` |
| Warning | `bg-yellow-50 border-yellow-400 text-yellow-800` |
| Info | `bg-blue-50 border-blue-400 text-blue-800` |

---

## 9. Icon System

| Library | Penggunaan |
|---|---|
| **Heroicons** | Navigation, UI icons |
| **Style** | Outline (24px) untuk navigasi, Solid (20px) untuk inline |

---

## 10. Checklist

- [x] Color palette terdefinisi (brand, semantic, neutral)
- [x] Typography scale terdefinisi
- [x] Spacing system terdefinisi
- [x] Layout structure terdefinisi
- [x] Responsive breakpoints terdefinisi
- [x] Komponen UI terdefinisi
- [x] Icon system terdefinisi

---

## 11. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-UI-001 | Color palette konsisten di semua halaman | ✅ |
| AC-UI-002 | Typography hierarchy terjaga | ✅ |
| AC-UI-003 | Responsive layout berfungsi di mobile, tablet, desktop | ✅ |
| AC-UI-004 | Semua status memiliki visual indicator (badge/color) | ✅ |
| AC-UI-005 | Toast/alert muncul untuk setiap user action | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [26_DEPLOYMENT_PLAN.md](./26_DEPLOYMENT_PLAN.md)*

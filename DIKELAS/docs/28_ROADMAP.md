# 28 — Roadmap

> **Dokumen Terkait:** [04_PRODUCT_SCOPE.md](./04_PRODUCT_SCOPE.md) · [30_RELEASE_PLAN.md](./30_RELEASE_PLAN.md) · [01_PRODUCT_REQUIREMENTS_DOCUMENT.md](./01_PRODUCT_REQUIREMENTS_DOCUMENT.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **peta jalan pengembangan (roadmap)** DIKELAS — timeline, milestones, dan deliverables dari fase dokumentasi hingga production release dan pengembangan lanjutan.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Planning** | Memberikan gambaran besar timeline pengembangan |
| **Tracking** | Memantau progress terhadap milestones |
| **Communication** | Mengkomunikasikan rencana ke stakeholder |

---

## 3. Roadmap Overview

```
Jul 2026          Agu 2026          Sep 2026          Okt 2026
├─ Fase 0 ─┤├──── Fase 1 ────┤├───── Fase 2 ─────┤├── Fase 3 ──┤
  Docs &       Foundation        Core Features       Advanced
  Planning     (3 minggu)        (4 minggu)          (3 minggu)

                   Nov 2026          Des 2026
                   ├─── Fase 4 ───┤├ Fase 5 ┤├ F6 ┤
                     Admin &        Testing    Deploy
                     Polish         & QA
                     (3 minggu)     (2 minggu) (1 mg)
```

---

## 4. Detail per Fase

### Fase 0: Dokumentasi & Planning (2 minggu)

| Minggu | Deliverable | Status |
|---|---|---|
| M1 | Project Overview, PRD, Business Requirements, Product Vision, Product Scope | ✅ |
| M2 | User Persona, User Roles, Feature List, Functional/Non-Functional Req, IA, User Flow, Sitemap | ✅ |
| M2 | Database Requirements, Security, Notification, Assignment, Quiz, Grade System | ✅ |
| M2 | Permission Matrix, Tech Stack, Architecture, Folder Structure, Guidelines | ✅ |
| M2 | Coding Standard, UI Guidelines, Deployment, Testing, Roadmap, Release Plan | ✅ |

**Milestone:** Seluruh dokumentasi di folder `docs/` selesai dan di-review.

---

### Fase 1: Foundation (3 minggu)

| Minggu | Deliverable |
|---|---|
| M3 | Project setup, Database design, Migrations, Seeders |
| M4 | Authentication (Login, Register, Logout, Reset Password) |
| M4 | Role middleware, Dashboard routing per role |
| M5 | Base layout (Sidebar, Topbar), UI components |
| M5 | Profile (View, Edit, Change Password) |

**Milestone:** User bisa register, login, dan melihat dashboard sesuai role.

| Kriteria Sukses | Target |
|---|---|
| Register → Login → Dashboard berfungsi | ✅ |
| Role-based redirect berfungsi | ✅ |
| Responsive layout berfungsi | ✅ |

---

### Fase 2: Core Features (4 minggu)

| Minggu | Deliverable |
|---|---|
| M6 | Manajemen Kelas (CRUD, Kode kelas, Join/Leave) |
| M7 | Manajemen Materi (Upload PDF/Video/Dokumen, Download, Topik) |
| M8 | Sistem Tugas (CRUD, Submission, Status tracking) |
| M9 | Sistem Penilaian (Input nilai, Rekap, Export Excel) |

**Milestone:** Guru bisa membuat kelas, upload materi, buat tugas. Murid bisa join, lihat materi, submit tugas, lihat nilai.

---

### Fase 3: Advanced Features (3 minggu)

| Minggu | Deliverable |
|---|---|
| M10 | Sistem Quiz (CRUD soal, Timer, Auto-grading) |
| M11 | Forum Diskusi (Post, Reply) + Pengumuman |
| M12 | Kalender + Notifikasi (In-App, Email) |

**Milestone:** Quiz, diskusi, kalender, dan notifikasi berfungsi.

---

### Fase 4: Administration & Polish (3 minggu)

| Minggu | Deliverable |
|---|---|
| M13 | Admin: CRUD Guru & Murid |
| M13 | Admin: CRUD Mapel, Semester, Tahun Ajaran |
| M14 | Admin: Backup & Restore, Import/Export Excel |
| M14 | Admin: Activity Log, Role & Permission |
| M15 | Admin: System Settings, UI Polish |
| M15 | Bug fixing, Performance optimization |

**Milestone:** Admin panel lengkap berfungsi.

---

### Fase 5: Testing & QA (2 minggu)

| Minggu | Deliverable |
|---|---|
| M16 | Unit Testing, Integration Testing |
| M17 | UAT (User Acceptance Testing), Security Testing |
| M17 | Bug fixing berdasarkan hasil testing |

**Milestone:** Semua test passed, UAT signed off.

---

### Fase 6: Deployment (1 minggu)

| Hari | Deliverable |
|---|---|
| H1-2 | Server setup, Staging deployment |
| H3-4 | Production deployment, SSL, Monitoring |
| H5 | Final testing, Go-live |

**Milestone:** Aplikasi live di production.

---

## 5. Post-Release Roadmap

### Tahun 1 (Q3-Q4 2026)

| Versi | Fitur |
|---|---|
| v1.1 | Bug fixes, Performance improvements |
| v1.2 | Dark mode, Enhanced notifications |
| v1.3 | Advanced analytics, Report generation |

### Tahun 2 (2027)

| Versi | Fitur |
|---|---|
| v2.0 | Mobile App (React Native) |
| v2.1 | Parent Portal |
| v2.2 | Attendance System, Gamification |
| v2.3 | Multi-language support |

### Tahun 3 (2028)

| Versi | Fitur |
|---|---|
| v3.0 | Multi-tenant SaaS |
| v3.1 | AI-powered features |
| v3.2 | DAPODIK Integration |

---

## 6. Risk & Mitigation

| Risk | Impact | Mitigation |
|---|---|---|
| Timeline slip | Sedang | Buffer 1 minggu per fase |
| Scope creep | Tinggi | Strict scope management |
| Key person dependency | Sedang | Knowledge sharing, documentation |
| Technical debt | Rendah | Code review, refactoring sprints |

---

## 7. Checklist

- [x] Roadmap per fase terdefinisi
- [x] Milestone per fase terdefinisi
- [x] Post-release roadmap terdefinisi
- [x] Risk & mitigation terdefinisi
- [x] Timeline realistis dan achievable
- [x] Deliverables jelas per minggu

---

## 8. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-RM-001 | Setiap fase memiliki deliverables yang jelas | ✅ |
| AC-RM-002 | Milestone terdefinisi dengan kriteria sukses | ✅ |
| AC-RM-003 | Post-release roadmap tersedia (3 tahun) | ✅ |
| AC-RM-004 | Risk assessment dan mitigation tersedia | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [29_ACCEPTANCE_CRITERIA.md](./29_ACCEPTANCE_CRITERIA.md)*

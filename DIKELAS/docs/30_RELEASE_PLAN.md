# 30 — Release Plan

> **Dokumen Terkait:** [28_ROADMAP.md](./28_ROADMAP.md) · [26_DEPLOYMENT_PLAN.md](./26_DEPLOYMENT_PLAN.md) · [29_ACCEPTANCE_CRITERIA.md](./29_ACCEPTANCE_CRITERIA.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **rencana rilis** DIKELAS — versi, jadwal rilis, kriteria rilis, dan proses go-live untuk setiap versi aplikasi.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Planning** | Jadwal rilis yang jelas dan terstruktur |
| **Quality** | Kriteria yang harus dipenuhi sebelum rilis |
| **Communication** | Mengkomunikasikan rencana ke stakeholder |

---

## 3. Versioning

Menggunakan **Semantic Versioning (SemVer)**: `MAJOR.MINOR.PATCH`

| Komponen | Kapan Berubah | Contoh |
|---|---|---|
| **MAJOR** | Breaking changes, arsitektur baru | 1.0.0 → 2.0.0 |
| **MINOR** | Fitur baru, backward-compatible | 1.0.0 → 1.1.0 |
| **PATCH** | Bug fix, perbaikan kecil | 1.0.0 → 1.0.1 |

---

## 4. Release Schedule

### 4.1 MVP Release (v1.0.0)

| Atribut | Detail |
|---|---|
| **Versi** | 1.0.0 |
| **Target Rilis** | Desember 2026 |
| **Tipe** | Major Release |
| **Target User** | 1 sekolah pilot |

**Fitur yang Dirilis:**

| Modul | Fitur |
|---|---|
| Auth | Login, Register, Logout, Reset Password |
| Dashboard | Dashboard per role |
| Kelas | CRUD, Join/Leave, Kode kelas |
| Materi | Upload/Download (PDF, Video, Dokumen) |
| Tugas | CRUD, Submission, Penilaian |
| Quiz | PG + B/S + Essay, Auto-grading, Timer |
| Nilai | Input, Rekap, Export Excel |
| Kalender | Deadline tugas, Jadwal quiz |
| Diskusi | Forum per kelas |
| Pengumuman | Kelas + Global |
| Profil | View, Edit, Change Password |
| Admin | CRUD User, Data Master, Backup, Import/Export, Log |

---

### 4.2 Post-MVP Releases

| Versi | Target | Fitur Utama |
|---|---|---|
| **v1.1.0** | Jan 2027 | Bug fixes, Performance improvements |
| **v1.2.0** | Feb 2027 | Dark mode, Enhanced notifications |
| **v1.3.0** | Apr 2027 | Advanced analytics, Report dashboard |
| **v2.0.0** | Jul 2027 | Mobile App, Parent Portal |

---

## 5. Release Criteria

### 5.1 Pre-release Checklist

| No | Kriteria | Responsible |
|---|---|---|
| 1 | Semua fitur P0 berfungsi sesuai spesifikasi | QA |
| 2 | Unit test coverage ≥ 80% | Dev |
| 3 | Feature tests untuk critical flows passed | QA |
| 4 | Security checklist passed | Dev + QA |
| 5 | Performance targets terpenuhi | Dev |
| 6 | UAT signed off oleh end users | Product Owner |
| 7 | Tidak ada bug P0/P1 yang open | QA |
| 8 | Deployment documentation updated | DevOps |
| 9 | Backup mechanism tested | DevOps |
| 10 | Rollback plan ready | DevOps |

### 5.2 Go/No-Go Decision

| Kondisi | Keputusan |
|---|---|
| Semua kriteria terpenuhi | ✅ **GO** |
| Bug P1 masih open (< 3) | ⚠️ **GO** dengan known issues |
| Bug P0 masih open | ❌ **NO-GO** — fix dulu |
| UAT belum signed off | ❌ **NO-GO** — selesaikan UAT |
| Performance target tidak tercapai | ❌ **NO-GO** — optimize dulu |

---

## 6. Release Process

```
[Code Freeze] ──▶ [Final Testing] ──▶ [Go/No-Go Meeting]
                                              │
                                    ┌─────────┴──────────┐
                                    │                    │
                                  [GO]              [NO-GO]
                                    │                    │
                              [Staging Deploy]     [Fix Issues]
                                    │                    │
                              [Staging Test]       [Re-test]
                                    │                    │
                              [Production Deploy]  [Back to Review]
                                    │
                              [Smoke Test]
                                    │
                              [Announce Release]
                                    │
                              [Monitor 48 hours]
```

### 6.1 Timeline Rilis

| Hari | Aktivitas |
|---|---|
| **H-7** | Code freeze, final bug fixing |
| **H-5** | Final QA testing |
| **H-3** | Go/No-Go meeting |
| **H-2** | Staging deployment & testing |
| **H-1** | Production deployment preparation |
| **H-0** | Production deployment (go-live) |
| **H+1** | Monitoring & hotfix jika perlu |
| **H+2** | Post-release review |

---

## 7. Release Notes Template

```markdown
# DIKELAS v1.0.0 — Release Notes

**Tanggal Rilis:** [tanggal]

## ✨ Fitur Baru
- [daftar fitur baru]

## 🐛 Bug Fixes
- [daftar bug yang diperbaiki]

## ⚡ Improvements
- [daftar peningkatan]

## ⚠️ Known Issues
- [daftar masalah yang diketahui]

## 📋 Upgrade Notes
- [instruksi upgrade jika ada]
```

---

## 8. Post-Release Activities

| Aktivitas | Timeline | Responsible |
|---|---|---|
| Monitor error logs | 48 jam pertama | DevOps |
| Collect user feedback | 1 minggu pertama | Product |
| Fix critical bugs | ASAP | Dev |
| Performance review | 1 minggu | Dev |
| Retrospective meeting | 2 minggu | Seluruh tim |
| Plan next release | 2 minggu | Product |

---

## 9. Checklist

- [x] Versioning strategy terdefinisi (SemVer)
- [x] MVP release scope terdefinisi
- [x] Post-MVP release schedule terdefinisi
- [x] Release criteria dan checklist tersedia
- [x] Go/No-Go decision matrix tersedia
- [x] Release process step-by-step terdefinisi
- [x] Release notes template tersedia
- [x] Post-release activities terdefinisi

---

## 10. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-RL-001 | Release criteria jelas dan terukur | ✅ |
| AC-RL-002 | Go/No-Go decision matrix tersedia | ✅ |
| AC-RL-003 | Release process reproducible | ✅ |
| AC-RL-004 | Post-release monitoring plan tersedia | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Kembali ke: [00_PROJECT_OVERVIEW.md](./00_PROJECT_OVERVIEW.md)*

# 27 — Testing Plan

> **Dokumen Terkait:** [26_DEPLOYMENT_PLAN.md](./26_DEPLOYMENT_PLAN.md) · [29_ACCEPTANCE_CRITERIA.md](./29_ACCEPTANCE_CRITERIA.md) · [08_FUNCTIONAL_REQUIREMENTS.md](./08_FUNCTIONAL_REQUIREMENTS.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **rencana pengujian** DIKELAS — strategi, jenis test, tools, dan coverage target untuk memastikan kualitas aplikasi sebelum rilis.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Kualitas** | Memastikan setiap fitur berfungsi sesuai spesifikasi |
| **Regresi** | Mencegah fitur yang sudah jalan rusak akibat perubahan baru |
| **Keamanan** | Memastikan tidak ada celah keamanan |
| **Performa** | Memastikan respons time memenuhi target |

---

## 3. Testing Strategy

### 3.1 Testing Pyramid

```
           ┌─────────┐
           │   E2E   │  ← Sedikit (browser tests)
          ┌┴─────────┴┐
          │Integration │  ← Sedang (feature tests)
         ┌┴───────────┴┐
         │  Unit Tests  │  ← Banyak (service/model tests)
         └─────────────┘
```

### 3.2 Jenis Testing

| Jenis | Scope | Tools | Coverage |
|---|---|---|---|
| **Unit Test** | Service, Model, Helper | PHPUnit | ≥ 80% |
| **Feature Test** | HTTP request → response | PHPUnit | ≥ 70% |
| **Browser Test** | UI end-to-end | Laravel Dusk (future) | Critical flows |
| **Security Test** | Auth, CSRF, XSS | Manual + automated | All auth routes |
| **Performance Test** | Load, response time | Laravel Debugbar | Key pages |

---

## 4. Unit Test Plan

### 4.1 Service Tests

| Service | Test Cases |
|---|---|
| `ClassroomService` | Create classroom, Generate unique code, Join class, Leave class |
| `AssignmentService` | Create assignment, Submit (before/after deadline), Grade submission |
| `QuizService` | Create quiz, Auto-grade PG, Calculate score |
| `GradeService` | Calculate average, Calculate weighted average, Export |
| `BackupService` | Create backup, Restore backup |
| `ImportService` | Parse Excel, Validate rows, Bulk insert |

### 4.2 Model Tests

| Model | Test Cases |
|---|---|
| `User` | Relationships (role, classrooms), Scopes (active, by role) |
| `Classroom` | Relationships (teacher, students, assignments), Code generation |
| `Assignment` | Status calculation, Deadline check |
| `Quiz` | Status (upcoming/active/ended), Score calculation |
| `Submission` | Late detection, Re-submit rules |

---

## 5. Feature Test Plan

### 5.1 Auth Tests

| Test | Expected |
|---|---|
| Login with valid credentials | Redirect to dashboard |
| Login with invalid credentials | Error message |
| Login rate limiting (6th attempt) | 429 response |
| Register as student | Account created, redirect |
| Register with existing email | Validation error |
| Logout | Session destroyed, redirect to login |
| Password reset request | Email sent |

### 5.2 Authorization Tests

| Test | Expected |
|---|---|
| Student access admin routes | 403 Forbidden |
| Teacher access admin routes | 403 Forbidden |
| Teacher edit other's classroom | 403 Forbidden |
| Student submit to non-enrolled class | 403 Forbidden |

### 5.3 Classroom Tests

| Test | Expected |
|---|---|
| Teacher create classroom | Classroom created, code generated |
| Student join with valid code | Enrolled, redirect |
| Student join with invalid code | Error |
| Student join already enrolled | Error |

### 5.4 Assignment Tests

| Test | Expected |
|---|---|
| Teacher create assignment | Assignment created |
| Student submit before deadline | Status: submitted |
| Student submit after deadline | Status: late |
| Teacher grade submission | Score saved |
| Student view own grades | Grades visible |

---

## 6. Security Test Checklist

- [ ] CSRF token required on all POST forms
- [ ] XSS prevention (script tags escaped)
- [ ] SQL injection prevention (parameterized queries)
- [ ] Authorization check on every protected route
- [ ] File upload validation (type, size, MIME)
- [ ] Rate limiting on login endpoint
- [ ] Session fixation prevention
- [ ] Sensitive data not exposed in responses
- [ ] `.env` not accessible via HTTP
- [ ] Debug mode off in production

---

## 7. Performance Test Targets

| Page | Target | Method |
|---|---|---|
| Dashboard | < 2s | Lighthouse |
| Class listing | < 1.5s | Debugbar |
| Assignment page | < 1.5s | Debugbar |
| Quiz page | < 2s | Debugbar |
| Admin dashboard | < 2s | Debugbar |
| File upload (10MB) | < 10s | Manual |
| Excel export (1000 rows) | < 30s | Manual |

---

## 8. Test Data

| Data | Quantity | Method |
|---|---|---|
| Users (students) | 100 | Factory |
| Users (teachers) | 10 | Factory |
| Classrooms | 20 | Factory |
| Assignments | 50 | Factory |
| Submissions | 200 | Factory |
| Quizzes | 20 | Factory |
| Quiz attempts | 100 | Factory |

---

## 9. UAT (User Acceptance Testing)

### 9.1 Skenario UAT

| No | Skenario | Tester | Expected |
|---|---|---|---|
| 1 | Guru mendaftar, buat kelas, upload materi, buat tugas | Guru sungguhan | Semua berhasil |
| 2 | Murid daftar, join kelas, lihat materi, submit tugas | Murid sungguhan | Semua berhasil |
| 3 | Admin import data, setup semester, backup | Operator sekolah | Semua berhasil |
| 4 | Guru buat quiz, murid kerjakan, lihat hasil | Guru + Murid | Auto-grading benar |

---

## 10. Checklist

- [x] Testing strategy (pyramid) terdefinisi
- [x] Unit test plan per service terdefinisi
- [x] Feature test plan per modul terdefinisi
- [x] Security test checklist tersedia
- [x] Performance targets terdefinisi
- [x] Test data requirements terdefinisi
- [x] UAT skenario terdefinisi

---

## 11. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-TP-001 | Unit test coverage ≥ 80% untuk services | ✅ |
| AC-TP-002 | Feature test untuk semua critical flows | ✅ |
| AC-TP-003 | Semua security test checklist passed | ✅ |
| AC-TP-004 | Performance targets terpenuhi | ✅ |
| AC-TP-005 | UAT skenario dilalui tanpa blocker | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [28_ROADMAP.md](./28_ROADMAP.md)*

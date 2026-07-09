# 09 — Non-Functional Requirements

> **Dokumen Terkait:** [08_FUNCTIONAL_REQUIREMENTS.md](./08_FUNCTIONAL_REQUIREMENTS.md) · [14_SECURITY_REQUIREMENTS.md](./14_SECURITY_REQUIREMENTS.md) · [26_DEPLOYMENT_PLAN.md](./26_DEPLOYMENT_PLAN.md)

---

## 1. Performance Requirements

### 1.1 Response Time

| Metrik | Target | Metode Pengukuran |
|---|---|---|
| Page load time (initial) | < 2 detik | Lighthouse, Chrome DevTools |
| Page load time (subsequent) | < 1 detik | Browser cache + Livewire |
| API response time | < 500ms | Laravel Debugbar |
| Database query time | < 100ms | Query log |
| File upload (10MB) | < 10 detik | Manual timing |
| File download start | < 2 detik | Manual timing |

### 1.2 Throughput

| Metrik | Target |
|---|---|
| Concurrent users | Hingga 500 per instance |
| Requests per second | > 100 RPS |
| File uploads simultan | Hingga 20 concurrent uploads |
| Database connections | Max 100 pool connections |

### 1.3 Resource Usage

| Resource | Limit |
|---|---|
| Memory per request | < 128MB |
| CPU per request | < 2 detik processing |
| Storage per file | Max 50MB |
| Total storage per sekolah | Configurable (default 50GB) |
| Database size | Optimal hingga 10GB |

---

## 2. Scalability Requirements

| Aspek | Requirement |
|---|---|
| **Horizontal** | Stateless application, session di database |
| **Vertical** | Optimal di server 2 CPU, 4GB RAM |
| **Data Growth** | Query tetap optimal hingga 100.000 records per tabel |
| **User Growth** | Mendukung hingga 2.000 total user per instance |
| **File Growth** | Pagination dan lazy loading untuk file listing |

---

## 3. Reliability & Availability

| Metrik | Target |
|---|---|
| **Uptime** | 99.5% (sekitar 1.8 hari downtime/tahun) |
| **MTTR** | < 4 jam (Mean Time To Recovery) |
| **MTBF** | > 30 hari (Mean Time Between Failures) |
| **Backup Frequency** | Harian (otomatis), on-demand (manual) |
| **Backup Retention** | 30 hari |
| **Recovery Point Objective** | < 24 jam |
| **Recovery Time Objective** | < 4 jam |

---

## 4. Security Requirements (Summary)

| Aspek | Requirement |
|---|---|
| **Authentication** | Laravel Breeze + Sanctum, bcrypt hashing |
| **Authorization** | Role-based access control (RBAC), middleware |
| **Data Protection** | HTTPS, CSRF protection, XSS prevention |
| **Input Validation** | Server-side validation wajib, client-side opsional |
| **SQL Injection** | Eloquent ORM (parameterized queries) |
| **Session** | Secure session config, timeout 2 jam |
| **File Upload** | MIME type validation, virus scan (future) |
| **Audit Trail** | Activity log untuk aksi sensitif |

> Detail: [14_SECURITY_REQUIREMENTS.md](./14_SECURITY_REQUIREMENTS.md)

---

## 5. Usability Requirements

| Aspek | Requirement |
|---|---|
| **Learnability** | User baru dapat menggunakan fitur utama dalam < 5 menit |
| **Efficiency** | Aksi utama membutuhkan maksimal 3 klik |
| **Error Prevention** | Konfirmasi untuk aksi destruktif (hapus, arsipkan) |
| **Error Recovery** | Pesan error yang jelas dan actionable |
| **Consistency** | UI konsisten di seluruh halaman |
| **Accessibility** | WCAG 2.1 Level A compliance |
| **Feedback** | Visual feedback untuk setiap aksi (toast, loading state) |
| **Language** | Bahasa Indonesia sebagai bahasa utama |

---

## 6. Compatibility Requirements

### 6.1 Browser Support

| Browser | Versi Minimum | Status |
|---|---|---|
| Google Chrome | 2 versi terakhir | ✅ Fully Supported |
| Mozilla Firefox | 2 versi terakhir | ✅ Fully Supported |
| Microsoft Edge | 2 versi terakhir | ✅ Fully Supported |
| Safari | 2 versi terakhir | ✅ Fully Supported |
| Internet Explorer | Semua versi | ❌ Not Supported |
| Opera | 2 versi terakhir | ⚠️ Best Effort |

### 6.2 Device Support

| Device | Screen Size | Status |
|---|---|---|
| Desktop | ≥ 1024px | ✅ Full Experience |
| Tablet | 768px – 1023px | ✅ Adapted Layout |
| Smartphone | 320px – 767px | ✅ Mobile-First |

### 6.3 Server Requirements

| Requirement | Minimum | Recommended |
|---|---|---|
| **PHP** | 8.4 | 8.4+ |
| **MySQL** | 8.0 | 8.0+ |
| **Web Server** | Apache 2.4 / Nginx 1.18 | Nginx 1.24+ |
| **RAM** | 2 GB | 4 GB |
| **CPU** | 1 Core | 2 Core |
| **Storage** | 20 GB | 100 GB (SSD) |
| **OS** | Ubuntu 22.04 / Windows Server 2019 | Ubuntu 24.04 |

---

## 7. Maintainability Requirements

| Aspek | Requirement |
|---|---|
| **Code Standard** | PSR-12, Laravel conventions |
| **Documentation** | Inline PHPDoc untuk semua class dan method public |
| **Testing** | Unit test coverage > 80% |
| **Logging** | Laravel Log (daily rotation, 14 hari) |
| **Monitoring** | Health check endpoint `/health` |
| **Dependency Updates** | Composer audit bulanan |
| **Database Migration** | Semua perubahan via migration, tidak ada raw SQL |

---

## 8. Data Requirements

| Aspek | Requirement |
|---|---|
| **Encoding** | UTF-8 (utf8mb4) untuk support emoji |
| **Timezone** | Asia/Jakarta (WIB) sebagai default |
| **Date Format** | `d M Y` (contoh: 09 Jul 2026) |
| **Time Format** | `H:i` (contoh: 14:30) |
| **Currency** | IDR (Rupiah) — jika dibutuhkan |
| **File Naming** | Sanitize filename, replace spasi dengan underscore |
| **Soft Delete** | Semua model utama menggunakan SoftDeletes |
| **Timestamps** | created_at, updated_at di setiap tabel |

---

## 9. Internationalization (i18n)

| Aspek | Requirement |
|---|---|
| **Bahasa Default** | Bahasa Indonesia |
| **Multi-language** | Tidak untuk MVP (future feature) |
| **String Management** | Laravel lang files untuk semua string UI |
| **Date Localization** | Format tanggal Indonesia |
| **Number Format** | Separator ribuan: titik (1.000), desimal: koma (3,5) |

---

## 10. Compliance Checklist

- [x] CSRF protection di semua form
- [x] XSS prevention (Blade auto-escaping)
- [x] SQL Injection prevention (Eloquent ORM)
- [x] Password hashing (bcrypt)
- [x] HTTPS enforcement
- [x] Rate limiting
- [x] Input validation (server-side)
- [x] File upload validation (MIME type, size)
- [x] Session security (httpOnly, secure cookies)
- [x] Soft delete untuk data integrity
- [x] Activity log untuk audit trail
- [ ] GDPR / UU PDP compliance (future)

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [10_INFORMATION_ARCHITECTURE.md](./10_INFORMATION_ARCHITECTURE.md)*

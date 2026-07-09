# 13 — Database Requirements

> **Dokumen Terkait:** [08_FUNCTIONAL_REQUIREMENTS.md](./08_FUNCTIONAL_REQUIREMENTS.md) · [09_ERD.md](./09_ERD.md) · [21_LARAVEL_ARCHITECTURE.md](./21_LARAVEL_ARCHITECTURE.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **kebutuhan database** DIKELAS secara menyeluruh — mulai dari skema tabel, relasi, indeks, hingga konvensi penamaan. Database menggunakan **MySQL 8.0** dengan encoding **utf8mb4** untuk mendukung karakter Unicode termasuk emoji.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Referensi** | Panduan utama untuk Database Architect dan Backend Engineer |
| **Konsistensi** | Memastikan konvensi penamaan dan struktur yang seragam |
| **Migration** | Acuan untuk membuat Laravel migration files |
| **Optimasi** | Mendefinisikan indeks dan constraint untuk performa optimal |

---

## 3. Ruang Lingkup

Dokumen ini mencakup seluruh tabel yang dibutuhkan untuk MVP DIKELAS beserta kolom, tipe data, relasi, dan indeks.

---

## 4. Konvensi Database

### 4.1 Penamaan

| Aspek | Konvensi | Contoh |
|---|---|---|
| **Nama Tabel** | snake_case, plural | `users`, `classrooms`, `assignments` |
| **Nama Kolom** | snake_case, singular | `first_name`, `created_at` |
| **Primary Key** | `id` (BIGINT UNSIGNED AUTO_INCREMENT) | `id` |
| **Foreign Key** | `{table_singular}_id` | `user_id`, `classroom_id` |
| **Pivot Table** | alphabetical order, singular | `classroom_student` |
| **Timestamps** | `created_at`, `updated_at` | — |
| **Soft Delete** | `deleted_at` | — |
| **Boolean** | `is_` prefix | `is_active`, `is_published` |
| **Date** | `_at` suffix atau `_date` | `deadline_at`, `start_date` |

### 4.2 Tipe Data Standar

| Jenis Data | MySQL Type | Laravel Migration |
|---|---|---|
| ID | BIGINT UNSIGNED | `$table->id()` |
| Foreign Key | BIGINT UNSIGNED | `$table->foreignId('x_id')` |
| Nama / Judul | VARCHAR(255) | `$table->string('name')` |
| Deskripsi Pendek | VARCHAR(500) | `$table->string('desc', 500)` |
| Konten Panjang | TEXT | `$table->text('content')` |
| Rich Content | LONGTEXT | `$table->longText('body')` |
| Email | VARCHAR(255) | `$table->string('email')` |
| Password | VARCHAR(255) | `$table->string('password')` |
| Integer | INT | `$table->integer('score')` |
| Decimal | DECIMAL(8,2) | `$table->decimal('grade', 8, 2)` |
| Boolean | TINYINT(1) | `$table->boolean('is_active')` |
| Enum | ENUM | `$table->enum('status', [...])` |
| Date | DATE | `$table->date('start_date')` |
| Datetime | TIMESTAMP | `$table->timestamp('deadline_at')` |
| File Path | VARCHAR(500) | `$table->string('file_path', 500)` |
| JSON | JSON | `$table->json('metadata')` |

---

## 5. Daftar Tabel

### 5.1 Ringkasan Tabel

| No | Tabel | Deskripsi | Relasi Utama |
|---|---|---|---|
| 1 | `users` | Data pengguna (murid, guru, admin) | roles |
| 2 | `roles` | Definisi role | users |
| 3 | `permissions` | Definisi permission | roles (pivot) |
| 4 | `role_permission` | Pivot role-permission | roles, permissions |
| 5 | `academic_years` | Tahun ajaran | semesters |
| 6 | `semesters` | Semester | academic_years, classrooms |
| 7 | `subjects` | Mata pelajaran | classrooms |
| 8 | `classrooms` | Kelas | users, subjects, semesters |
| 9 | `classroom_student` | Pivot kelas-murid | classrooms, users |
| 10 | `topics` | Topik/Bab materi | classrooms |
| 11 | `materials` | Materi pembelajaran | classrooms, topics |
| 12 | `assignments` | Tugas | classrooms |
| 13 | `assignment_attachments` | Lampiran tugas | assignments |
| 14 | `submissions` | Jawaban tugas murid | assignments, users |
| 15 | `quizzes` | Quiz | classrooms |
| 16 | `questions` | Soal quiz | quizzes |
| 17 | `question_options` | Opsi jawaban PG | questions |
| 18 | `quiz_attempts` | Percobaan quiz murid | quizzes, users |
| 19 | `quiz_answers` | Jawaban per soal | quiz_attempts, questions |
| 20 | `grades` | Nilai | users, classrooms |
| 21 | `announcements` | Pengumuman | classrooms, users |
| 22 | `discussions` | Post diskusi | classrooms, users |
| 23 | `discussion_replies` | Balasan diskusi | discussions, users |
| 24 | `notifications` | Notifikasi | users |
| 25 | `activity_logs` | Log aktivitas | users |
| 26 | `backups` | Histori backup | — |
| 27 | `settings` | Pengaturan sistem | — |

---

## 6. Detail Skema Tabel

### 6.1 `users`

```sql
CREATE TABLE users (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    role_id         BIGINT UNSIGNED NOT NULL,
    name            VARCHAR(255) NOT NULL,
    email           VARCHAR(255) NOT NULL UNIQUE,
    email_verified_at TIMESTAMP NULL,
    password        VARCHAR(255) NOT NULL,
    avatar          VARCHAR(500) NULL,
    bio             TEXT NULL,
    nis             VARCHAR(50) NULL,              -- Nomor Induk Siswa
    nip             VARCHAR(50) NULL,              -- Nomor Induk Pegawai
    phone           VARCHAR(20) NULL,
    is_active       TINYINT(1) DEFAULT 1,
    last_login_at   TIMESTAMP NULL,
    remember_token  VARCHAR(100) NULL,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (role_id) REFERENCES roles(id),
    INDEX idx_users_role (role_id),
    INDEX idx_users_email (email),
    INDEX idx_users_nis (nis),
    INDEX idx_users_nip (nip)
);
```

### 6.2 `roles`

```sql
CREATE TABLE roles (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name            VARCHAR(50) NOT NULL UNIQUE,
    display_name    VARCHAR(100) NOT NULL,
    description     TEXT NULL,
    level           TINYINT UNSIGNED DEFAULT 1,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL
);
```

### 6.3 `permissions` & `role_permission`

```sql
CREATE TABLE permissions (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name            VARCHAR(100) NOT NULL UNIQUE,
    display_name    VARCHAR(200) NOT NULL,
    module          VARCHAR(50) NOT NULL,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    INDEX idx_permissions_module (module)
);

CREATE TABLE role_permission (
    role_id         BIGINT UNSIGNED NOT NULL,
    permission_id   BIGINT UNSIGNED NOT NULL,
    PRIMARY KEY (role_id, permission_id),
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE,
    FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE
);
```

### 6.4 `academic_years`

```sql
CREATE TABLE academic_years (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name            VARCHAR(20) NOT NULL,          -- '2026/2027'
    start_date      DATE NOT NULL,
    end_date        DATE NOT NULL,
    is_active       TINYINT(1) DEFAULT 0,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL
);
```

### 6.5 `semesters`

```sql
CREATE TABLE semesters (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    academic_year_id BIGINT UNSIGNED NOT NULL,
    name            VARCHAR(50) NOT NULL,          -- 'Ganjil', 'Genap'
    type            ENUM('odd', 'even') NOT NULL,
    start_date      DATE NOT NULL,
    end_date        DATE NOT NULL,
    is_active       TINYINT(1) DEFAULT 0,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (academic_year_id) REFERENCES academic_years(id),
    INDEX idx_semesters_active (is_active)
);
```

### 6.6 `subjects`

```sql
CREATE TABLE subjects (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name            VARCHAR(100) NOT NULL,
    code            VARCHAR(20) NULL UNIQUE,
    description     TEXT NULL,
    is_active       TINYINT(1) DEFAULT 1,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL
);
```

### 6.7 `classrooms` & `classroom_student`

```sql
CREATE TABLE classrooms (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    teacher_id      BIGINT UNSIGNED NOT NULL,
    subject_id      BIGINT UNSIGNED NOT NULL,
    semester_id     BIGINT UNSIGNED NOT NULL,
    name            VARCHAR(100) NOT NULL,
    description     TEXT NULL,
    code            VARCHAR(6) NOT NULL UNIQUE,
    cover_image     VARCHAR(500) NULL,
    is_active       TINYINT(1) DEFAULT 1,
    is_archived     TINYINT(1) DEFAULT 0,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (teacher_id) REFERENCES users(id),
    FOREIGN KEY (subject_id) REFERENCES subjects(id),
    FOREIGN KEY (semester_id) REFERENCES semesters(id),
    INDEX idx_classrooms_code (code),
    INDEX idx_classrooms_teacher (teacher_id),
    INDEX idx_classrooms_semester (semester_id)
);

CREATE TABLE classroom_student (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    classroom_id    BIGINT UNSIGNED NOT NULL,
    student_id      BIGINT UNSIGNED NOT NULL,
    joined_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (classroom_id) REFERENCES classrooms(id) ON DELETE CASCADE,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE KEY unique_classroom_student (classroom_id, student_id)
);
```

### 6.8 `topics` & `materials`

```sql
CREATE TABLE topics (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    classroom_id    BIGINT UNSIGNED NOT NULL,
    name            VARCHAR(200) NOT NULL,
    description     TEXT NULL,
    sort_order      INT UNSIGNED DEFAULT 0,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (classroom_id) REFERENCES classrooms(id) ON DELETE CASCADE
);

CREATE TABLE materials (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    classroom_id    BIGINT UNSIGNED NOT NULL,
    topic_id        BIGINT UNSIGNED NULL,
    title           VARCHAR(255) NOT NULL,
    description     TEXT NULL,
    file_path       VARCHAR(500) NOT NULL,
    file_name       VARCHAR(255) NOT NULL,
    file_type       VARCHAR(20) NOT NULL,          -- 'pdf', 'video', 'document', 'presentation'
    file_size       BIGINT UNSIGNED DEFAULT 0,     -- bytes
    mime_type       VARCHAR(100) NULL,
    sort_order      INT UNSIGNED DEFAULT 0,
    download_count  INT UNSIGNED DEFAULT 0,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (classroom_id) REFERENCES classrooms(id) ON DELETE CASCADE,
    FOREIGN KEY (topic_id) REFERENCES topics(id) ON DELETE SET NULL,
    INDEX idx_materials_classroom (classroom_id)
);
```

### 6.9 `assignments`, `assignment_attachments`, `submissions`

```sql
CREATE TABLE assignments (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    classroom_id    BIGINT UNSIGNED NOT NULL,
    title           VARCHAR(255) NOT NULL,
    description     LONGTEXT NULL,
    max_score       INT UNSIGNED DEFAULT 100,
    deadline_at     TIMESTAMP NOT NULL,
    is_published    TINYINT(1) DEFAULT 1,
    allow_late      TINYINT(1) DEFAULT 1,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (classroom_id) REFERENCES classrooms(id) ON DELETE CASCADE,
    INDEX idx_assignments_classroom (classroom_id),
    INDEX idx_assignments_deadline (deadline_at)
);

CREATE TABLE assignment_attachments (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    assignment_id   BIGINT UNSIGNED NOT NULL,
    file_path       VARCHAR(500) NOT NULL,
    file_name       VARCHAR(255) NOT NULL,
    file_size       BIGINT UNSIGNED DEFAULT 0,
    mime_type       VARCHAR(100) NULL,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (assignment_id) REFERENCES assignments(id) ON DELETE CASCADE
);

CREATE TABLE submissions (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    assignment_id   BIGINT UNSIGNED NOT NULL,
    student_id      BIGINT UNSIGNED NOT NULL,
    file_path       VARCHAR(500) NOT NULL,
    file_name       VARCHAR(255) NOT NULL,
    file_size       BIGINT UNSIGNED DEFAULT 0,
    note            TEXT NULL,
    status          ENUM('submitted', 'late', 'graded') DEFAULT 'submitted',
    score           DECIMAL(5,2) NULL,
    feedback        TEXT NULL,
    graded_at       TIMESTAMP NULL,
    submitted_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (assignment_id) REFERENCES assignments(id) ON DELETE CASCADE,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE KEY unique_submission (assignment_id, student_id),
    INDEX idx_submissions_status (status)
);
```

### 6.10 `quizzes`, `questions`, `question_options`

```sql
CREATE TABLE quizzes (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    classroom_id    BIGINT UNSIGNED NOT NULL,
    title           VARCHAR(255) NOT NULL,
    description     TEXT NULL,
    duration_minutes INT UNSIGNED NOT NULL,
    start_at        TIMESTAMP NOT NULL,
    end_at          TIMESTAMP NOT NULL,
    is_published    TINYINT(1) DEFAULT 0,
    is_randomized   TINYINT(1) DEFAULT 0,
    show_result     TINYINT(1) DEFAULT 1,
    max_score       INT UNSIGNED DEFAULT 100,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (classroom_id) REFERENCES classrooms(id) ON DELETE CASCADE,
    INDEX idx_quizzes_classroom (classroom_id),
    INDEX idx_quizzes_schedule (start_at, end_at)
);

CREATE TABLE questions (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quiz_id         BIGINT UNSIGNED NOT NULL,
    type            ENUM('multiple_choice', 'true_false', 'essay') NOT NULL,
    content         LONGTEXT NOT NULL,
    answer_key      TEXT NULL,                      -- Kunci jawaban (PG: 'A', B/S: 'true')
    points          INT UNSIGNED DEFAULT 1,
    sort_order      INT UNSIGNED DEFAULT 0,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (quiz_id) REFERENCES quizzes(id) ON DELETE CASCADE,
    INDEX idx_questions_quiz (quiz_id)
);

CREATE TABLE question_options (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    question_id     BIGINT UNSIGNED NOT NULL,
    label           CHAR(1) NOT NULL,              -- 'A', 'B', 'C', 'D', 'E'
    content         TEXT NOT NULL,
    is_correct      TINYINT(1) DEFAULT 0,
    sort_order      INT UNSIGNED DEFAULT 0,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE
);
```

### 6.11 `quiz_attempts` & `quiz_answers`

```sql
CREATE TABLE quiz_attempts (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quiz_id         BIGINT UNSIGNED NOT NULL,
    student_id      BIGINT UNSIGNED NOT NULL,
    started_at      TIMESTAMP NOT NULL,
    finished_at     TIMESTAMP NULL,
    total_score     DECIMAL(5,2) NULL,
    status          ENUM('in_progress', 'completed', 'timed_out') DEFAULT 'in_progress',
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (quiz_id) REFERENCES quizzes(id) ON DELETE CASCADE,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE KEY unique_quiz_attempt (quiz_id, student_id)
);

CREATE TABLE quiz_answers (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    attempt_id      BIGINT UNSIGNED NOT NULL,
    question_id     BIGINT UNSIGNED NOT NULL,
    answer          TEXT NULL,
    is_correct      TINYINT(1) NULL,
    score           DECIMAL(5,2) NULL,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (attempt_id) REFERENCES quiz_attempts(id) ON DELETE CASCADE,
    FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE,
    UNIQUE KEY unique_quiz_answer (attempt_id, question_id)
);
```

### 6.12 `grades`

```sql
CREATE TABLE grades (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    student_id      BIGINT UNSIGNED NOT NULL,
    classroom_id    BIGINT UNSIGNED NOT NULL,
    gradable_type   VARCHAR(100) NOT NULL,         -- 'App\Models\Assignment', 'App\Models\Quiz'
    gradable_id     BIGINT UNSIGNED NOT NULL,
    score           DECIMAL(5,2) NOT NULL,
    max_score       DECIMAL(5,2) NOT NULL DEFAULT 100,
    notes           TEXT NULL,
    graded_by       BIGINT UNSIGNED NULL,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (student_id) REFERENCES users(id),
    FOREIGN KEY (classroom_id) REFERENCES classrooms(id),
    FOREIGN KEY (graded_by) REFERENCES users(id),
    INDEX idx_grades_student_class (student_id, classroom_id),
    INDEX idx_grades_gradable (gradable_type, gradable_id)
);
```

### 6.13 `announcements`

```sql
CREATE TABLE announcements (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id         BIGINT UNSIGNED NOT NULL,
    classroom_id    BIGINT UNSIGNED NULL,           -- NULL = global
    title           VARCHAR(255) NOT NULL,
    content         LONGTEXT NOT NULL,
    is_pinned       TINYINT(1) DEFAULT 0,
    published_at    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (classroom_id) REFERENCES classrooms(id) ON DELETE CASCADE,
    INDEX idx_announcements_classroom (classroom_id),
    INDEX idx_announcements_pinned (is_pinned)
);
```

### 6.14 `discussions` & `discussion_replies`

```sql
CREATE TABLE discussions (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    classroom_id    BIGINT UNSIGNED NOT NULL,
    user_id         BIGINT UNSIGNED NOT NULL,
    title           VARCHAR(255) NOT NULL,
    content         LONGTEXT NOT NULL,
    is_pinned       TINYINT(1) DEFAULT 0,
    replies_count   INT UNSIGNED DEFAULT 0,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (classroom_id) REFERENCES classrooms(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id),
    INDEX idx_discussions_classroom (classroom_id)
);

CREATE TABLE discussion_replies (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    discussion_id   BIGINT UNSIGNED NOT NULL,
    user_id         BIGINT UNSIGNED NOT NULL,
    content         TEXT NOT NULL,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,
    deleted_at      TIMESTAMP NULL,

    FOREIGN KEY (discussion_id) REFERENCES discussions(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
```

### 6.15 `notifications`

```sql
CREATE TABLE notifications (
    id              CHAR(36) PRIMARY KEY,           -- UUID
    type            VARCHAR(255) NOT NULL,
    notifiable_type VARCHAR(255) NOT NULL,
    notifiable_id   BIGINT UNSIGNED NOT NULL,
    data            JSON NOT NULL,
    read_at         TIMESTAMP NULL,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    INDEX idx_notifications_notifiable (notifiable_type, notifiable_id),
    INDEX idx_notifications_read (read_at)
);
```

### 6.16 `activity_logs`

```sql
CREATE TABLE activity_logs (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id         BIGINT UNSIGNED NULL,
    action          VARCHAR(100) NOT NULL,
    description     TEXT NULL,
    subject_type    VARCHAR(255) NULL,
    subject_id      BIGINT UNSIGNED NULL,
    properties      JSON NULL,
    ip_address      VARCHAR(45) NULL,
    user_agent      TEXT NULL,
    created_at      TIMESTAMP NULL,

    INDEX idx_activity_user (user_id),
    INDEX idx_activity_action (action),
    INDEX idx_activity_created (created_at),
    INDEX idx_activity_subject (subject_type, subject_id)
);
```

### 6.17 `backups`

```sql
CREATE TABLE backups (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name       VARCHAR(255) NOT NULL,
    file_path       VARCHAR(500) NOT NULL,
    file_size       BIGINT UNSIGNED DEFAULT 0,
    status          ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
    type            ENUM('manual', 'scheduled') DEFAULT 'manual',
    created_by      BIGINT UNSIGNED NULL,
    completed_at    TIMESTAMP NULL,
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    FOREIGN KEY (created_by) REFERENCES users(id)
);
```

### 6.18 `settings`

```sql
CREATE TABLE settings (
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `key`           VARCHAR(100) NOT NULL UNIQUE,
    value           LONGTEXT NULL,
    type            VARCHAR(20) DEFAULT 'string',  -- 'string', 'boolean', 'integer', 'json'
    group           VARCHAR(50) DEFAULT 'general',
    created_at      TIMESTAMP NULL,
    updated_at      TIMESTAMP NULL,

    INDEX idx_settings_group (`group`)
);
```

---

## 7. Strategi Indexing

| Tabel | Kolom Index | Tipe | Alasan |
|---|---|---|---|
| `users` | `email` | UNIQUE | Login lookup |
| `users` | `role_id` | INDEX | Filter by role |
| `classrooms` | `code` | UNIQUE | Join kelas lookup |
| `classrooms` | `teacher_id` | INDEX | Filter kelas per guru |
| `classrooms` | `semester_id` | INDEX | Filter per semester |
| `submissions` | `(assignment_id, student_id)` | UNIQUE | Satu submission per murid |
| `quiz_attempts` | `(quiz_id, student_id)` | UNIQUE | Satu attempt per murid |
| `grades` | `(student_id, classroom_id)` | INDEX | Rekap nilai per murid |
| `activity_logs` | `created_at` | INDEX | Query log by time |
| `announcements` | `is_pinned` | INDEX | Filter pinned first |

---

## 8. Seeder Data

| Tabel | Seeder | Data |
|---|---|---|
| `roles` | `RoleSeeder` | student, teacher, super_admin |
| `users` | `UserSeeder` | 1 super admin default |
| `subjects` | `SubjectSeeder` | Mata pelajaran SMA (Matematika, Fisika, dll) |
| `settings` | `SettingSeeder` | Pengaturan default (nama sekolah, dll) |
| `permissions` | `PermissionSeeder` | Semua permission per modul |
| `role_permission` | `RolePermissionSeeder` | Default permission per role |

---

## 9. Checklist

- [x] Konvensi penamaan terdefinisi
- [x] Semua tabel MVP terdefinisi (27 tabel)
- [x] Kolom dengan tipe data terspesifikasi
- [x] Foreign key constraint terdefinisi
- [x] Index strategy terdefinisi
- [x] Seeder data terdefinisi
- [x] Soft delete diterapkan pada tabel utama
- [x] Timestamps pada semua tabel

---

## 10. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-DB-001 | Semua tabel memiliki primary key `id` BIGINT UNSIGNED | ✅ |
| AC-DB-002 | Foreign key constraint terdefinisi untuk setiap relasi | ✅ |
| AC-DB-003 | Index terdefinisi untuk kolom yang sering di-query | ✅ |
| AC-DB-004 | Tabel utama menggunakan SoftDeletes | ✅ |
| AC-DB-005 | Semua tabel memiliki timestamps | ✅ |
| AC-DB-006 | Konvensi penamaan konsisten (snake_case) | ✅ |
| AC-DB-007 | Encoding menggunakan utf8mb4 | ✅ |
| AC-DB-008 | Seeder data untuk role dan settings terdefinisi | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [14_SECURITY_REQUIREMENTS.md](./14_SECURITY_REQUIREMENTS.md)*

# 22 — Folder Structure

> **Dokumen Terkait:** [21_LARAVEL_ARCHITECTURE.md](./21_LARAVEL_ARCHITECTURE.md) · [20_TECH_STACK.md](./20_TECH_STACK.md) · [24_CODING_STANDARD.md](./24_CODING_STANDARD.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **struktur folder** proyek DIKELAS berdasarkan konvensi Laravel 12 dengan customisasi untuk mendukung arsitektur layered (Controller → Service → Model).

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Navigasi** | Developer mudah menemukan file yang dicari |
| **Konsistensi** | Struktur seragam di seluruh proyek |
| **Scalability** | Folder terorganisir untuk pertumbuhan fitur |

---

## 3. Root Structure

```
DIKELAS/
├── app/                    # Application code
├── bootstrap/              # Framework bootstrap
├── config/                 # Configuration files
├── database/               # Migrations, seeders, factories
├── docs/                   # Project documentation
├── public/                 # Web root (index.php, assets)
├── resources/              # Views, CSS, JS
├── routes/                 # Route definitions
├── storage/                # File storage, cache, logs
├── tests/                  # Automated tests
├── vendor/                 # Composer dependencies (gitignored)
├── .env                    # Environment config (gitignored)
├── .env.example            # Environment template
├── artisan                 # Laravel CLI
├── composer.json           # PHP dependencies
├── package.json            # Node dependencies
├── phpunit.xml             # Test config
├── vite.config.js          # Vite build config
└── README.md               # Project readme
```

---

## 4. App Directory

```
app/
├── Console/
│   └── Commands/
│       ├── BackupDatabase.php
│       └── SendDeadlineReminder.php
├── Events/
│   ├── AssignmentCreated.php
│   ├── SubmissionGraded.php
│   ├── QuizPublished.php
│   ├── MaterialUploaded.php
│   ├── AnnouncementCreated.php
│   ├── StudentJoinedClass.php
│   └── BackupCompleted.php
├── Http/
│   ├── Controllers/
│   │   ├── Auth/
│   │   │   ├── LoginController.php
│   │   │   ├── RegisterController.php
│   │   │   └── ResetPasswordController.php
│   │   ├── Admin/
│   │   │   ├── DashboardController.php
│   │   │   ├── UserController.php
│   │   │   ├── SubjectController.php
│   │   │   ├── SemesterController.php
│   │   │   ├── AcademicYearController.php
│   │   │   ├── BackupController.php
│   │   │   ├── ImportController.php
│   │   │   ├── ExportController.php
│   │   │   ├── ActivityLogController.php
│   │   │   ├── RoleController.php
│   │   │   └── SettingController.php
│   │   ├── Teacher/
│   │   │   ├── DashboardController.php
│   │   │   ├── ClassroomController.php
│   │   │   ├── MaterialController.php
│   │   │   ├── AssignmentController.php
│   │   │   ├── SubmissionController.php
│   │   │   ├── QuizController.php
│   │   │   ├── GradeController.php
│   │   │   ├── AnnouncementController.php
│   │   │   └── DiscussionController.php
│   │   ├── Student/
│   │   │   ├── DashboardController.php
│   │   │   ├── ClassroomController.php
│   │   │   ├── AssignmentController.php
│   │   │   ├── SubmissionController.php
│   │   │   ├── QuizController.php
│   │   │   ├── GradeController.php
│   │   │   ├── AnnouncementController.php
│   │   │   ├── DiscussionController.php
│   │   │   └── CalendarController.php
│   │   └── ProfileController.php
│   ├── Middleware/
│   │   ├── RoleMiddleware.php
│   │   └── ForceHttps.php
│   └── Requests/
│       ├── Auth/
│       │   ├── LoginRequest.php
│       │   └── RegisterRequest.php
│       ├── Classroom/
│       │   ├── StoreClassroomRequest.php
│       │   └── UpdateClassroomRequest.php
│       ├── Assignment/
│       │   ├── StoreAssignmentRequest.php
│       │   └── StoreSubmissionRequest.php
│       ├── Quiz/
│       │   └── StoreQuizRequest.php
│       └── Admin/
│           ├── StoreUserRequest.php
│           └── ImportRequest.php
├── Listeners/
│   ├── SendNewAssignmentNotification.php
│   ├── SendGradeNotification.php
│   ├── SendNewQuizNotification.php
│   ├── SendAnnouncementNotification.php
│   └── SendStudentJoinedNotification.php
├── Models/
│   ├── User.php
│   ├── Role.php
│   ├── Permission.php
│   ├── AcademicYear.php
│   ├── Semester.php
│   ├── Subject.php
│   ├── Classroom.php
│   ├── Topic.php
│   ├── Material.php
│   ├── Assignment.php
│   ├── AssignmentAttachment.php
│   ├── Submission.php
│   ├── Quiz.php
│   ├── Question.php
│   ├── QuestionOption.php
│   ├── QuizAttempt.php
│   ├── QuizAnswer.php
│   ├── Grade.php
│   ├── Announcement.php
│   ├── Discussion.php
│   ├── DiscussionReply.php
│   ├── ActivityLog.php
│   ├── Backup.php
│   └── Setting.php
├── Notifications/
│   ├── NewAssignmentNotification.php
│   ├── GradeNotification.php
│   ├── NewQuizNotification.php
│   ├── AnnouncementNotification.php
│   ├── DeadlineReminderNotification.php
│   └── DiscussionReplyNotification.php
├── Policies/
│   ├── ClassroomPolicy.php
│   ├── AssignmentPolicy.php
│   ├── SubmissionPolicy.php
│   ├── QuizPolicy.php
│   ├── MaterialPolicy.php
│   └── DiscussionPolicy.php
├── Services/
│   ├── ClassroomService.php
│   ├── AssignmentService.php
│   ├── QuizService.php
│   ├── GradeService.php
│   ├── BackupService.php
│   ├── ImportService.php
│   └── ExportService.php
└── Exports/
    └── GradeExport.php
```

---

## 5. Resources Directory

```
resources/
├── css/
│   └── app.css
├── js/
│   ├── app.js
│   └── bootstrap.js
└── views/
    ├── layouts/
    │   ├── app.blade.php           # Main layout (sidebar + topbar)
    │   ├── guest.blade.php         # Auth pages layout
    │   └── partials/
    │       ├── sidebar.blade.php
    │       ├── topbar.blade.php
    │       └── footer.blade.php
    ├── components/
    │   ├── card.blade.php
    │   ├── modal.blade.php
    │   ├── table.blade.php
    │   ├── alert.blade.php
    │   ├── badge.blade.php
    │   ├── button.blade.php
    │   ├── empty-state.blade.php
    │   └── file-upload.blade.php
    ├── auth/
    │   ├── login.blade.php
    │   ├── register.blade.php
    │   ├── forgot-password.blade.php
    │   └── reset-password.blade.php
    ├── admin/
    │   ├── dashboard.blade.php
    │   ├── users/
    │   ├── subjects/
    │   ├── academic/
    │   ├── backup/
    │   ├── import/
    │   ├── activity-log/
    │   └── settings/
    ├── teacher/
    │   ├── dashboard.blade.php
    │   ├── classrooms/
    │   ├── assignments/
    │   ├── quizzes/
    │   ├── grades/
    │   └── announcements/
    ├── student/
    │   ├── dashboard.blade.php
    │   ├── classrooms/
    │   ├── assignments/
    │   ├── quizzes/
    │   ├── grades/
    │   ├── calendar/
    │   └── announcements/
    ├── profile/
    │   ├── show.blade.php
    │   └── edit.blade.php
    └── errors/
        ├── 403.blade.php
        ├── 404.blade.php
        ├── 500.blade.php
        └── 503.blade.php
```

---

## 6. Database Directory

```
database/
├── factories/
│   ├── UserFactory.php
│   ├── ClassroomFactory.php
│   └── AssignmentFactory.php
├── migrations/
│   ├── 0001_01_01_000000_create_users_table.php
│   ├── 0001_01_01_000001_create_roles_table.php
│   ├── ...  (sesuai urutan dependency)
│   └── xxxx_xx_xx_xxxxxx_create_settings_table.php
└── seeders/
    ├── DatabaseSeeder.php
    ├── RoleSeeder.php
    ├── PermissionSeeder.php
    ├── UserSeeder.php
    ├── SubjectSeeder.php
    └── SettingSeeder.php
```

---

## 7. Routes Directory

```
routes/
├── web.php                 # Main web routes
├── auth.php                # Authentication routes (Breeze)
├── admin.php               # Super Admin routes
├── teacher.php             # Teacher routes
├── student.php             # Student routes
└── console.php             # Artisan commands schedule
```

---

## 8. Checklist

- [x] Root structure terdefinisi
- [x] App directory terorganisir per layer
- [x] Controllers dikelompokkan per role
- [x] Views dikelompokkan per role
- [x] Services, Policies, Events, Notifications terorganisir
- [x] Database migrations dan seeders terdefinisi
- [x] Routes dipisah per role

---

## 9. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-FS-001 | Folder structure mengikuti konvensi Laravel 12 | ✅ |
| AC-FS-002 | Controllers dikelompokkan per role (Admin/Teacher/Student) | ✅ |
| AC-FS-003 | Views dikelompokkan per role | ✅ |
| AC-FS-004 | Service layer memiliki folder sendiri | ✅ |
| AC-FS-005 | Routes dipisahkan per file per role | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [23_DEVELOPMENT_GUIDELINES.md](./23_DEVELOPMENT_GUIDELINES.md)*

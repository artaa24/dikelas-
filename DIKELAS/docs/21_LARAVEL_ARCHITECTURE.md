# 21 — Laravel Architecture

> **Dokumen Terkait:** [20_TECH_STACK.md](./20_TECH_STACK.md) · [22_FOLDER_STRUCTURE.md](./22_FOLDER_STRUCTURE.md) · [24_CODING_STANDARD.md](./24_CODING_STANDARD.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **arsitektur Laravel** DIKELAS — pattern yang digunakan, layer separation, dan konvensi untuk memastikan kode yang maintainable, testable, dan scalable.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Konsistensi** | Semua developer mengikuti pattern yang sama |
| **Maintainability** | Kode mudah di-maintain dan di-debug |
| **Testability** | Setiap layer bisa di-test secara independen |
| **Scalability** | Arsitektur mendukung pertumbuhan fitur |

---

## 3. Architecture Pattern

### 3.1 Layer Architecture

```
┌──────────────────────────────────────────┐
│            PRESENTATION LAYER            │
│  Blade Views + Livewire Components       │
│  (Tampilan, form, interaktivitas)        │
└─────────────────┬────────────────────────┘
                  │
┌─────────────────▼────────────────────────┐
│           CONTROLLER LAYER               │
│  HTTP Controllers                        │
│  (Request handling, validation, response) │
└─────────────────┬────────────────────────┘
                  │
┌─────────────────▼────────────────────────┐
│            SERVICE LAYER                 │
│  Business Logic Services                 │
│  (Business rules, calculations, workflow)│
└─────────────────┬────────────────────────┘
                  │
┌─────────────────▼────────────────────────┐
│              MODEL LAYER                 │
│  Eloquent Models + Relationships         │
│  (Data access, relationships, scopes)    │
└─────────────────┬────────────────────────┘
                  │
┌─────────────────▼────────────────────────┐
│            DATABASE LAYER                │
│  MySQL 8.0                               │
│  (Tables, indexes, constraints)          │
└──────────────────────────────────────────┘
```

### 3.2 Request Lifecycle

```
[HTTP Request]
    ↓
[Middleware] (auth, role, throttle)
    ↓
[Controller] (validate, call service)
    ↓
[Service] (business logic)
    ↓
[Model] (database operations)
    ↓
[Controller] (prepare response)
    ↓
[View/Redirect] (Blade template)
    ↓
[HTTP Response]
```

---

## 4. Konvensi Penamaan

### 4.1 Controllers

| Konvensi | Contoh |
|---|---|
| Singular, PascalCase, suffix `Controller` | `ClassroomController` |
| Prefixed by role jika perlu | `StudentAssignmentController` |
| Resource methods | `index`, `create`, `store`, `show`, `edit`, `update`, `destroy` |

### 4.2 Models

| Konvensi | Contoh |
|---|---|
| Singular, PascalCase | `Classroom`, `Assignment` |
| Tabel: plural, snake_case | `classrooms`, `assignments` |
| Pivot: alphabetical singular | `classroom_student` |

### 4.3 Services

| Konvensi | Contoh |
|---|---|
| Singular, PascalCase, suffix `Service` | `ClassroomService` |
| Method: camelCase, verb-first | `createClassroom()`, `gradeSubmission()` |

### 4.4 Views

| Konvensi | Contoh |
|---|---|
| kebab-case directories | `student/classrooms/index.blade.php` |
| Grouped by role + module | `teacher/assignments/create.blade.php` |
| Layouts: `layouts/` | `layouts/app.blade.php` |
| Components: `components/` | `components/card.blade.php` |

### 4.5 Routes

| Konvensi | Contoh |
|---|---|
| Prefixed by role | `/student/dashboard`, `/teacher/classrooms` |
| RESTful naming | `classrooms.index`, `classrooms.store` |
| kebab-case URLs | `/forgot-password`, `/activity-log` |

---

## 5. Design Patterns

### 5.1 Service Pattern

```php
// app/Services/ClassroomService.php
class ClassroomService
{
    public function create(array $data, User $teacher): Classroom
    {
        $data['code'] = $this->generateUniqueCode();
        $data['teacher_id'] = $teacher->id;
        return Classroom::create($data);
    }

    private function generateUniqueCode(): string
    {
        do {
            $code = strtoupper(Str::random(6));
        } while (Classroom::where('code', $code)->exists());
        return $code;
    }
}
```

### 5.2 Form Request Validation

```php
// app/Http/Requests/StoreClassroomRequest.php
class StoreClassroomRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->hasRole('teacher');
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'subject_id' => 'required|exists:subjects,id',
            'semester_id' => 'required|exists:semesters,id',
            'description' => 'nullable|string|max:500',
        ];
    }
}
```

### 5.3 Policy Authorization

```php
// app/Policies/ClassroomPolicy.php
class ClassroomPolicy
{
    public function update(User $user, Classroom $classroom): bool
    {
        return $user->id === $classroom->teacher_id;
    }

    public function viewMembers(User $user, Classroom $classroom): bool
    {
        return $user->id === $classroom->teacher_id
            || $classroom->students()->where('student_id', $user->id)->exists();
    }
}
```

### 5.4 Event-Listener Pattern

```php
// Events
AssignmentCreated::class → SendNewAssignmentNotification::class
SubmissionGraded::class  → SendGradeNotification::class
StudentJoinedClass::class → SendStudentJoinedNotification::class
```

---

## 6. Middleware Stack

| Middleware | Lokasi | Fungsi |
|---|---|---|
| `auth` | Global (auth routes) | Cek login |
| `role:{name}` | Custom | Cek role user |
| `verified` | Laravel default | Cek email verified |
| `throttle:60,1` | API routes | Rate limiting |
| `ForceHttps` | Custom | HTTPS enforcement |

---

## 7. Eloquent Conventions

### 7.1 Model Base

```php
// Semua model utama extends BaseModel atau menggunakan traits
class Classroom extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', ...];
    protected $casts = ['is_active' => 'boolean'];

    // Relationships
    public function teacher(): BelongsTo { ... }
    public function students(): BelongsToMany { ... }
    public function assignments(): HasMany { ... }

    // Scopes
    public function scopeActive($query) { ... }
}
```

### 7.2 Relationship Conventions

| Relationship | Method Name | Contoh |
|---|---|---|
| BelongsTo | singular noun | `$classroom->teacher()` |
| HasMany | plural noun | `$classroom->assignments()` |
| BelongsToMany | plural noun | `$classroom->students()` |
| HasOne | singular noun | `$user->profile()` |
| MorphMany | plural noun | `$classroom->grades()` |

---

## 8. Checklist

- [x] Layer architecture terdefinisi
- [x] Request lifecycle terdokumentasi
- [x] Naming conventions terdefinisi
- [x] Design patterns terdefinisi (Service, FormRequest, Policy, Event)
- [x] Middleware stack terdefinisi
- [x] Eloquent conventions terdefinisi

---

## 9. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-LA-001 | Controller hanya handle request/response, bukan business logic | ✅ |
| AC-LA-002 | Business logic berada di Service layer | ✅ |
| AC-LA-003 | Validasi menggunakan FormRequest | ✅ |
| AC-LA-004 | Authorization menggunakan Policy | ✅ |
| AC-LA-005 | Naming conventions konsisten di seluruh codebase | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [22_FOLDER_STRUCTURE.md](./22_FOLDER_STRUCTURE.md)*

# 24 — Coding Standard

> **Dokumen Terkait:** [23_DEVELOPMENT_GUIDELINES.md](./23_DEVELOPMENT_GUIDELINES.md) · [21_LARAVEL_ARCHITECTURE.md](./21_LARAVEL_ARCHITECTURE.md) · [22_FOLDER_STRUCTURE.md](./22_FOLDER_STRUCTURE.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **standar penulisan kode** DIKELAS untuk memastikan konsistensi, keterbacaan, dan maintainability kode di seluruh proyek.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Keterbacaan** | Kode mudah dibaca oleh semua anggota tim |
| **Konsistensi** | Gaya penulisan seragam di seluruh proyek |
| **Kualitas** | Mengurangi bug dan technical debt |

---

## 3. PHP / Laravel Standards

### 3.1 Coding Style

| Aspek | Standard |
|---|---|
| **Base Standard** | PSR-12 |
| **Formatter** | Laravel Pint (default preset) |
| **PHP Version** | 8.4+ (gunakan fitur modern) |
| **Strict Types** | `declare(strict_types=1)` di file kritis |
| **Line Length** | Maksimum 120 karakter |
| **Indentation** | 4 spaces (bukan tab) |

### 3.2 Naming Conventions

| Aspek | Konvensi | Contoh |
|---|---|---|
| **Class** | PascalCase | `ClassroomController` |
| **Method** | camelCase | `createClassroom()` |
| **Variable** | camelCase | `$assignmentCount` |
| **Property** | camelCase | `$this->classroomService` |
| **Constant** | UPPER_SNAKE | `MAX_FILE_SIZE` |
| **Config Key** | snake_case | `app.timezone` |
| **Route Name** | dot notation | `teacher.classrooms.store` |
| **View File** | kebab-case | `class-detail.blade.php` |
| **Migration** | snake_case verb | `create_classrooms_table` |
| **Event** | PascalCase past tense | `AssignmentCreated` |
| **Listener** | PascalCase verb | `SendNotification` |

### 3.3 PHPDoc

```php
/**
 * Buat kelas baru untuk guru.
 *
 * @param  array<string, mixed>  $data
 * @param  User  $teacher
 * @return Classroom
 *
 * @throws \InvalidArgumentException
 */
public function createClassroom(array $data, User $teacher): Classroom
{
    // ...
}
```

| Rule | Deskripsi |
|---|---|
| Wajib untuk | Public methods, class, interface |
| Opsional untuk | Private methods (jika nama sudah jelas) |
| Format | `@param`, `@return`, `@throws` |
| Bahasa | Bahasa Indonesia untuk deskripsi |

### 3.4 Type Hints

```php
// ✅ Benar — gunakan type hints
public function store(StoreClassroomRequest $request): RedirectResponse
{
    $classroom = $this->service->create($request->validated(), auth()->user());
    return redirect()->route('teacher.classrooms.show', $classroom);
}

// ❌ Salah — tanpa type hints
public function store($request)
{
    // ...
}
```

---

## 4. Blade / Frontend Standards

### 4.1 Blade

| Aspek | Standard |
|---|---|
| **Output Escaping** | Selalu gunakan `{{ }}` (auto-escape) |
| **Raw Output** | `{!! !!}` hanya jika benar-benar diperlukan |
| **Directive** | `@if`, `@foreach`, `@auth`, `@role` |
| **Components** | Gunakan `<x-component>` untuk UI berulang |
| **Indentation** | 4 spaces |
| **Comment** | `{{-- Blade comment --}}` |

### 4.2 TailwindCSS

| Aspek | Standard |
|---|---|
| **Class Order** | Layout → Spacing → Sizing → Typography → Visual |
| **Responsive** | Mobile-first (`md:`, `lg:`) |
| **Custom** | Definisikan di `tailwind.config.js` |
| **Reusable** | Ekstrak ke Blade component, bukan `@apply` berlebihan |

### 4.3 AlpineJS

| Aspek | Standard |
|---|---|
| **Scope** | `x-data` di elemen terluar komponen |
| **Naming** | camelCase untuk properties |
| **Events** | `@click`, `@submit.prevent` |
| **Keep Simple** | Logika kompleks → pindah ke Livewire |

---

## 5. Database Standards

| Aspek | Standard |
|---|---|
| **Table** | snake_case, plural | 
| **Column** | snake_case, singular |
| **Primary Key** | `id` (auto increment) |
| **Foreign Key** | `{table_singular}_id` |
| **Boolean** | `is_` prefix |
| **Timestamp** | `_at` suffix |
| **Soft Delete** | `deleted_at` |
| **No Raw SQL** | Gunakan Eloquent / Query Builder |
| **Index** | Kolom yang sering di-WHERE |

---

## 6. Testing Standards

| Aspek | Standard |
|---|---|
| **Framework** | PHPUnit (default Laravel) |
| **Naming** | `test_` prefix atau `@test` annotation |
| **Structure** | Arrange → Act → Assert |
| **Coverage** | Minimal 80% untuk business logic |
| **Isolation** | Setiap test independent, gunakan `RefreshDatabase` |

```php
public function test_student_can_join_class_with_valid_code(): void
{
    // Arrange
    $student = User::factory()->student()->create();
    $classroom = Classroom::factory()->create(['code' => 'ABC123']);

    // Act
    $response = $this->actingAs($student)
        ->post('/student/classrooms/join', ['code' => 'ABC123']);

    // Assert
    $response->assertRedirect();
    $this->assertDatabaseHas('classroom_student', [
        'classroom_id' => $classroom->id,
        'student_id' => $student->id,
    ]);
}
```

---

## 7. Hal yang Harus Dihindari

| ❌ Jangan | ✅ Sebagai Gantinya |
|---|---|
| Business logic di Controller | Pindah ke Service |
| `env()` di luar config files | Gunakan `config()` |
| Raw SQL queries | Gunakan Eloquent |
| `dd()` di production | Gunakan Laravel Log |
| Hardcode strings | Gunakan lang files / constants |
| N+1 queries | Eager loading dengan `with()` |
| Fat controllers | Thin controller + Service |
| `*` di SELECT | Pilih kolom yang dibutuhkan |

---

## 8. Checklist

- [x] PSR-12 sebagai base standard
- [x] Naming conventions terdefinisi
- [x] PHPDoc requirements terdefinisi
- [x] Blade standards terdefinisi
- [x] Database naming conventions terdefinisi
- [x] Testing standards terdefinisi
- [x] Anti-patterns terdokumentasi

---

## 9. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-CS-001 | Semua kode lolos Laravel Pint tanpa error | ✅ |
| AC-CS-002 | Public methods memiliki PHPDoc | ✅ |
| AC-CS-003 | Type hints digunakan di semua method signatures | ✅ |
| AC-CS-004 | Tidak ada business logic di Controller | ✅ |
| AC-CS-005 | Naming conventions konsisten di seluruh codebase | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [25_UI_GUIDELINES.md](./25_UI_GUIDELINES.md)*

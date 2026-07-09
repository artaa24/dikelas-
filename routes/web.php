<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout']); // Fallback for simple links

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::middleware('auth')->group(function () {
    // Murid Routes
    Route::middleware('role:student')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\StudentController::class, 'dashboard']);
        Route::get('/courses', [\App\Http\Controllers\StudentController::class, 'courses']);
        Route::post('/courses/join', [\App\Http\Controllers\StudentController::class, 'joinClass']);
    });
    Route::get('/schedule', function () { return view('auth.schedule'); });
    Route::get('/assignments', [\App\Http\Controllers\StudentController::class, 'assignments']);
    Route::get('/profile', function () { return view('auth.profile'); });
    Route::get('/notifications', function () { return view('auth.notifications'); });
    Route::get('/classrooms/{id}', [\App\Http\Controllers\ClassroomController::class, 'show'])->name('classrooms.show');
    Route::post('/classrooms/{id}/materials', [\App\Http\Controllers\ClassroomController::class, 'storeMaterial'])->name('classrooms.materials.store');
    
    // Assignment Routes
    Route::post('/classrooms/{id}/assignments', [\App\Http\Controllers\AssignmentController::class, 'store'])->name('classrooms.assignments.store');
    Route::get('/assignments/{id}', [\App\Http\Controllers\AssignmentController::class, 'show'])->name('assignments.show');
    Route::post('/assignments/{id}/submit', [\App\Http\Controllers\AssignmentController::class, 'submit'])->name('assignments.submit');
    Route::post('/submissions/{id}/grade', [\App\Http\Controllers\AssignmentController::class, 'grade'])->name('submissions.grade');
    
    // Guru Routes
    Route::middleware('role:teacher')->group(function () {
        Route::get('/guru/dashboard', [\App\Http\Controllers\TeacherController::class, 'dashboard']);
        Route::get('/guru/classes', [\App\Http\Controllers\TeacherController::class, 'classes']);
        Route::post('/guru/classes', [\App\Http\Controllers\TeacherController::class, 'storeClass']);
        Route::get('/guru/assignments', [\App\Http\Controllers\TeacherController::class, 'assignments']);
    });

    // Admin Routes
    Route::middleware('role:super_admin')->group(function () {
        Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard']);
        Route::get('/admin/users', [\App\Http\Controllers\AdminController::class, 'users']);
        Route::post('/admin/users', [\App\Http\Controllers\AdminController::class, 'storeUser']);
    });

    // General / Shared Routes
    Route::get('/bookmarks', function () { return view('auth.bookmarks'); });
    Route::get('/announcements', function () { return view('auth.announcements'); });
    Route::get('/edit-profile', function () { return view('auth.edit-profile'); });
    Route::get('/help-center', function () { return view('auth.help-center'); });
});

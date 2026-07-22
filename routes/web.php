<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout']); // Fallback for simple links
Route::post('/password-reset-request', [AuthController::class, 'requestReset'])->name('password.reset.request')->middleware('throttle:3,5');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit')->middleware('throttle:5,1');

Route::middleware('auth')->group(function () {
    // Murid Routes
    Route::middleware('role:student')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\StudentController::class, 'dashboard']);
        Route::get('/courses', [\App\Http\Controllers\StudentController::class, 'courses']);
        Route::post('/courses/join', [\App\Http\Controllers\StudentController::class, 'joinClass']);
        Route::get('/schedule', [\App\Http\Controllers\StudentController::class, 'schedule'])->name('schedule');
        Route::get('/grades', [\App\Http\Controllers\StudentController::class, 'grades'])->name('grades.index');
        
        // Sertifikat (Murid)
        Route::get('/certificates', [\App\Http\Controllers\CertificateController::class, 'index'])->name('certificates.index');
    });

    Route::get('/assignments', [\App\Http\Controllers\StudentController::class, 'assignments'])->name('assignments.index');
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::get('/edit-profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    
    // Pencarian Global
    Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');
    
    // Notifications (Dinamis)
    Route::get('/notifications', [\App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/mark-all-read', [\App\Http\Controllers\NotificationController::class, 'markAllRead'])->name('notifications.markAllRead');
    Route::post('/notifications/{id}/mark-read', [\App\Http\Controllers\NotificationController::class, 'markRead'])->name('notifications.markRead');
    
    // Announcements (Dinamis — single route, tidak duplikat)
    Route::get('/announcements', [\App\Http\Controllers\AnnouncementController::class, 'index'])->name('announcements.index');
    
    // Bookmarks (Dinamis)
    Route::get('/bookmarks', [\App\Http\Controllers\BookmarkController::class, 'index'])->name('bookmarks.index');
    Route::post('/bookmarks/{materialId}/toggle', [\App\Http\Controllers\BookmarkController::class, 'toggle'])->name('bookmarks.toggle');
    Route::delete('/bookmarks/{materialId}', [\App\Http\Controllers\BookmarkController::class, 'destroy'])->name('bookmarks.destroy');
    
    // Help Center (via Controller)
    Route::get('/help-center', [\App\Http\Controllers\HelpCenterController::class, 'index'])->name('help-center');
    
    // Classroom Routes
    Route::get('/classrooms/{id}', [\App\Http\Controllers\ClassroomController::class, 'show'])->name('classrooms.show');
    Route::post('/classrooms/{id}/materials', [\App\Http\Controllers\ClassroomController::class, 'storeMaterial'])->name('classrooms.materials.store');
    Route::delete('/classrooms/{classroomId}/students/{studentId}', [\App\Http\Controllers\ClassroomController::class, 'removeStudent'])->name('classrooms.students.remove');
    Route::put('/classrooms/{id}/settings', [\App\Http\Controllers\ClassroomController::class, 'updateSettings'])->name('classrooms.settings.update');
    
    // Topics (Materi)
    Route::post('/classrooms/{classroomId}/topics', [\App\Http\Controllers\TopicController::class, 'store'])->name('classrooms.topics.store');
    Route::delete('/classrooms/{classroomId}/topics/{topicId}', [\App\Http\Controllers\TopicController::class, 'destroy'])->name('classrooms.topics.destroy');
    
    // Discussions
    Route::get('/classrooms/{classroomId}/discussions', [\App\Http\Controllers\DiscussionController::class, 'index'])->name('classrooms.discussions.index');
    Route::post('/classrooms/{classroomId}/discussions', [\App\Http\Controllers\DiscussionController::class, 'store'])->name('classrooms.discussions.store');
    Route::get('/classrooms/{classroomId}/discussions/{discussionId}', [\App\Http\Controllers\DiscussionController::class, 'show'])->name('classrooms.discussions.show');
    Route::post('/classrooms/{classroomId}/discussions/{discussionId}/reply', [\App\Http\Controllers\DiscussionController::class, 'reply'])->name('classrooms.discussions.reply');

    // Grades (Rekap Nilai)
    Route::get('/classrooms/{classroomId}/grades', [\App\Http\Controllers\GradeController::class, 'index'])->name('classrooms.grades.index');
    Route::get('/classrooms/{classroomId}/grades/{studentId}', [\App\Http\Controllers\GradeController::class, 'studentGrades'])->name('classrooms.grades.student');

    
    // Certificate Routes (shared — download/preview accessible to student, teacher, admin)
    Route::get('/certificates/{id}/download', [\App\Http\Controllers\CertificateController::class, 'download'])->name('certificates.download');
    Route::get('/certificates/{id}/preview', [\App\Http\Controllers\CertificateController::class, 'preview'])->name('certificates.preview');
    
    // Assignment Routes
    Route::post('/classrooms/{id}/assignments', [\App\Http\Controllers\AssignmentController::class, 'store'])->name('classrooms.assignments.store');
    Route::get('/assignments/{id}', [\App\Http\Controllers\AssignmentController::class, 'show'])->name('assignments.show');
    Route::post('/assignments/{id}/submit', [\App\Http\Controllers\AssignmentController::class, 'submit'])->name('assignments.submit');
    Route::post('/submissions/{id}/grade', [\App\Http\Controllers\AssignmentController::class, 'grade'])->name('submissions.grade');
    Route::get('/submissions/{id}/download', [\App\Http\Controllers\AssignmentController::class, 'download'])->name('submissions.download');
    
    // Quiz Routes
    Route::post('/classrooms/{id}/quizzes', [\App\Http\Controllers\QuizController::class, 'store'])->name('classrooms.quizzes.store');
    Route::get('/quizzes/{id}', [\App\Http\Controllers\QuizController::class, 'show'])->name('quizzes.show');
    Route::post('/quizzes/{id}/attempt', [\App\Http\Controllers\QuizController::class, 'startAttempt'])->name('quizzes.attempt.start');
    Route::post('/quizzes/attempt/{attempt_id}/submit', [\App\Http\Controllers\QuizController::class, 'submitAttempt'])->name('quizzes.attempt.submit');
    
    // Guru Routes
    Route::middleware('role:teacher')->group(function () {
        Route::get('/guru/dashboard', [\App\Http\Controllers\TeacherController::class, 'dashboard']);
        Route::get('/guru/classes', [\App\Http\Controllers\TeacherController::class, 'classes']);
        Route::post('/guru/classes', [\App\Http\Controllers\TeacherController::class, 'storeClass']);
        Route::put('/guru/classes/{id}', [\App\Http\Controllers\TeacherController::class, 'updateClass']);
        Route::delete('/guru/classes/{id}', [\App\Http\Controllers\TeacherController::class, 'destroyClass']);

        Route::get('/guru/assignments', [\App\Http\Controllers\TeacherController::class, 'assignments']);
        Route::post('/guru/assignments', [\App\Http\Controllers\TeacherController::class, 'storeAssignment']);
        Route::put('/guru/assignments/{id}', [\App\Http\Controllers\TeacherController::class, 'updateAssignment']);
        Route::delete('/guru/assignments/{id}', [\App\Http\Controllers\TeacherController::class, 'destroyAssignment']);

        Route::get('/guru/materials', [\App\Http\Controllers\TeacherController::class, 'materials']);
        Route::post('/guru/materials', [\App\Http\Controllers\TeacherController::class, 'storeMaterial']);
        Route::put('/guru/materials/{id}', [\App\Http\Controllers\TeacherController::class, 'updateMaterial']);
        Route::delete('/guru/materials/{id}', [\App\Http\Controllers\TeacherController::class, 'destroyMaterial']);
        
        Route::get('/guru/quizzes/{id}', [\App\Http\Controllers\QuizController::class, 'showTeacher'])->name('guru.quizzes.show');
        Route::post('/guru/quizzes/{id}/questions', [\App\Http\Controllers\QuizController::class, 'storeQuestion'])->name('guru.quizzes.questions.store');
        Route::post('/guru/quizzes/{id}/import', [\App\Http\Controllers\QuizController::class, 'importQuestions'])->name('guru.quizzes.import');
        Route::get('/guru/quizzes/{id}/export', [\App\Http\Controllers\QuizController::class, 'exportQuestions'])->name('guru.quizzes.export');

        Route::get('/guru/grades', [\App\Http\Controllers\TeacherController::class, 'grades']);
        Route::get('/guru/grades/export', [\App\Http\Controllers\TeacherController::class, 'exportGrades'])->name('guru.grades.export');
        
        Route::get('/guru/schedule', [\App\Http\Controllers\TeacherController::class, 'schedule']);
        
        // Sertifikat (Guru - manajemen)
        Route::get('/guru/certificates/{classroomId}', [\App\Http\Controllers\CertificateController::class, 'manage'])->name('guru.certificates.manage');
        Route::post('/guru/certificates/{classroomId}/issue', [\App\Http\Controllers\CertificateController::class, 'issue'])->name('guru.certificates.issue');
    });

    // Admin Routes
    Route::middleware('role:super_admin')->group(function () {
        Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard']);
        Route::get('/admin/users', [\App\Http\Controllers\AdminController::class, 'users']);
        Route::post('/admin/users', [\App\Http\Controllers\AdminController::class, 'storeUser']);
        Route::put('/admin/users/{id}', [\App\Http\Controllers\AdminController::class, 'updateUser']);
        Route::delete('/admin/users/{id}', [\App\Http\Controllers\AdminController::class, 'destroyUser']);
        Route::post('/admin/resolve-reset/{id}', [\App\Http\Controllers\AdminController::class, 'resolveReset'])->name('admin.resolve-reset');
        
        // Admin: Settings, Logs, Backups, Permissions
        Route::get('/admin/settings', [\App\Http\Controllers\SettingController::class, 'index'])->name('admin.settings.index');
        Route::put('/admin/settings', [\App\Http\Controllers\SettingController::class, 'update'])->name('admin.settings.update');
        
        Route::get('/admin/logs', [\App\Http\Controllers\ActivityLogController::class, 'index'])->name('admin.logs.index');
        
        Route::get('/admin/backups', [\App\Http\Controllers\BackupController::class, 'index'])->name('admin.backups.index');
        Route::post('/admin/backups', [\App\Http\Controllers\BackupController::class, 'create'])->name('admin.backups.create');
        
        Route::get('/admin/permissions', [\App\Http\Controllers\PermissionController::class, 'index'])->name('admin.permissions.index');
        Route::put('/admin/permissions/roles/{roleId}', [\App\Http\Controllers\PermissionController::class, 'updateRolePermissions'])->name('admin.permissions.update');
    });
});

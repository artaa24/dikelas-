<?php

$dir = __DIR__ . '/resources/views/auth';

function processDir($path) {
    $files = scandir($path);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        $fullPath = $path . '/' . $file;
        if (is_dir($fullPath)) {
            processDir($fullPath);
        } elseif (str_ends_with($file, '.blade.php')) {
            processFile($fullPath);
        }
    }
}

function processFile($file) {
    $content = file_get_contents($file);
    
    // Find the start of <aside...
    $start = strpos($content, '<aside');
    if ($start === false) return;
    
    // Find the end of </aside>
    $end = strpos($content, '</aside>', $start);
    if ($end === false) return;
    $end += 8; // length of </aside>
    
    $asideBlock = substr($content, $start, $end - $start);
    
    // Determine active tab
    $active = '';
    if (str_contains($file, 'dashboard.blade.php')) $active = 'dashboard';
    elseif (str_contains($file, 'courses.blade.php')) $active = 'courses';
    elseif (str_contains($file, 'classes.blade.php')) $active = 'classes';
    elseif (str_contains($file, 'schedule.blade.php')) $active = 'schedule';
    elseif (str_contains($file, 'assignments.blade.php')) $active = 'assignments';
    elseif (str_contains($file, 'grades.blade.php')) $active = 'grades';
    elseif (str_contains($file, 'profile.blade.php')) $active = 'profile';
    elseif (str_contains($file, 'users.blade.php')) $active = 'users';
    
    // If it's a detail page, we just keep the active of its parent, or leave it blank
    if (str_contains($file, 'class-detail.blade.php') || str_contains($file, 'quiz-detail.blade.php') || str_contains($file, 'assignment-detail.blade.php')) {
        $active = 'courses'; // default for student. for guru it won't highlight but that's okay, or we can use dynamic.
    }

    // Determine the include block
    // Check if the file is in a specific folder
    if (str_contains($file, 'guru' . DIRECTORY_SEPARATOR)) {
        $replacement = "@include('components.sidebar-guru', ['active' => '$active'])";
    } elseif (str_contains($file, 'admin' . DIRECTORY_SEPARATOR)) {
        $replacement = "@include('components.sidebar-admin', ['active' => '$active'])";
    } else {
        // Shared or student
        // For shared files like class-detail, assignment-detail, profile, edit-profile
        if (in_array(basename($file), ['class-detail.blade.php', 'assignment-detail.blade.php', 'quiz-detail.blade.php', 'profile.blade.php', 'edit-profile.blade.php', 'announcements.blade.php', 'notifications.blade.php', 'bookmarks.blade.php', 'quiz-attempt.blade.php'])) {
            $replacement = <<<BLADE
    @if(auth()->check() && auth()->user()->role_id == 1)
        @include('components.sidebar-admin', ['active' => '$active'])
    @elseif(auth()->check() && auth()->user()->role_id == 2)
        @include('components.sidebar-guru', ['active' => '$active'])
    @else
        @include('components.sidebar-student', ['active' => '$active'])
    @endif
BLADE;
        } else {
            // Student specific
            $replacement = "@include('components.sidebar-student', ['active' => '$active'])";
        }
    }
    
    $newContent = substr_replace($content, $replacement, $start, $end - $start);
    file_put_contents($file, $newContent);
    echo "Processed $file\n";
}

processDir($dir);


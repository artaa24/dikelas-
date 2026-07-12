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
    
    // Find all <img class="h-10 w-10... src="pravatar..."
    $pattern = '/<img[^>]*class="h-10 w-10 rounded-full[^>]*src="https:\/\/i\.pravatar\.cc[^"]*"[^>]*>/i';
    
    $replacement = '<img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="{{ auth()->user()->avatar ? asset(\'storage/\' . auth()->user()->avatar) : \'https://ui-avatars.com/api/?name=\' . urlencode(auth()->user()->name) . \'&background=0D8ABC&color=fff\' }}" alt="User Avatar">';

    $newContent = preg_replace($pattern, $replacement, $content);
    
    if ($newContent !== $content && $newContent !== null) {
        file_put_contents($file, $newContent);
        echo "Processed avatar in $file\n";
    }
}

processDir($dir);

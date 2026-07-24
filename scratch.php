<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $c = App\Models\Classroom::first();
    if (!$c) {
        echo "No classroom found.\n";
        exit;
    }
    
    $u = App\Models\User::whereHas('role', function($q) { $q->where('name', 'teacher'); })->first();
    if (!$u) {
        $u = App\Models\User::first();
    }
    auth()->login($u);
    
    echo app(\App\Http\Controllers\GradeController::class)->index($c->id)->render();
    echo "SUCCESS\n";
} catch (\Throwable $e) {
    echo "ERROR: " . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine() . "\n";
}

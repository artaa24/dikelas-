<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/dashboard', function () {
    return view('auth.dashboard');
});

Route::get('/courses', function () {
    return view('auth.courses');
});

Route::get('/schedule', function () {
    return view('auth.schedule');
});

Route::get('/assignments', function () {
    return view('auth.assignments');
});

Route::get('/profile', function () {
    return view('auth.profile');
});

Route::get('/notifications', function () {
    return view('auth.notifications');
});

Route::get('/class-detail', function () {
    return view('auth.class-detail');
});

Route::get('/material-detail', function () {
    return view('auth.material-detail');
});

Route::get('/assignment-detail', function () {
    return view('auth.assignment-detail');
});

Route::get('/grades', function () {
    return view('auth.grades');
});

// Guru Routes
Route::get('/guru/dashboard', function () {
    return view('auth.guru.dashboard');
});

Route::get('/guru/classes', function () {
    return view('auth.guru.classes');
});

Route::get('/guru/materials', function () {
    return view('auth.guru.materials');
});

Route::get('/guru/assignments', function () {
    return view('auth.guru.assignments');
});

Route::get('/guru/students', function () {
    return view('auth.guru.students');
});

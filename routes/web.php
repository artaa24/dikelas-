<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('auth.dashboard');
});

Route::get('/courses', function () {
    return view('auth.courses');
});

Route::get('/assignments', function () {
    return view('auth.assignments');
});

Route::get('/class-detail', function () {
    return view('auth.class-detail');
});

Route::get('/assignment-detail', function () {
    return view('auth.assignment-detail');
});

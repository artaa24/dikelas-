<?php

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

$roles = Role::pluck('id', 'name');

User::updateOrCreate(
    ['email' => 'admindikelas@gmail.com'],
    [
        'name' => 'admin',
        'password' => Hash::make('admindikelas22n'),
        'role_id' => $roles['super_admin'],
        'is_active' => true,
    ]
);

User::updateOrCreate(
    ['email' => 'suarsana21@gmail.com'],
    [
        'name' => 'Pak Guru',
        'password' => Hash::make('suarsuar11'),
        'role_id' => $roles['teacher'],
        'is_active' => true,
    ]
);

User::updateOrCreate(
    ['email' => 'artasuputra57@gmail.com'],
    [
        'name' => 'Arta',
        'password' => Hash::make('artanyoman33'),
        'role_id' => $roles['student'],
        'is_active' => true,
    ]
);

echo "Users created successfully.\n";

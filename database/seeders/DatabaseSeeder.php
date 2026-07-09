<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Roles
        $superAdminRole = \App\Models\Role::create([
            'name' => 'super_admin',
            'display_name' => 'Super Admin',
            'description' => 'Administrator Sistem Sekolah',
            'level' => 3
        ]);

        $teacherRole = \App\Models\Role::create([
            'name' => 'teacher',
            'display_name' => 'Guru',
            'description' => 'Pengajar / Tenaga Pendidik',
            'level' => 2
        ]);

        $studentRole = \App\Models\Role::create([
            'name' => 'student',
            'display_name' => 'Murid',
            'description' => 'Siswa Aktif',
            'level' => 1
        ]);

        // Create Default Users
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@dikelas.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role_id' => $superAdminRole->id,
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Guru Matematika',
            'email' => 'guru@dikelas.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role_id' => $teacherRole->id,
            'nip' => '198001012005011001',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Budi Santoso',
            'email' => 'murid@dikelas.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role_id' => $studentRole->id,
            'nis' => '12345678',
            'is_active' => true,
        ]);
    }
}

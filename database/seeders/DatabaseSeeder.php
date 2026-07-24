<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     * 
     * PERINGATAN: Seeder ini hanya untuk DEVELOPMENT / TESTING.
     * Jangan jalankan di production tanpa mengubah password default.
     */
    public function run(): void
    {
        // Create Roles
        $superAdminRole = Role::create([
            'name' => 'super_admin',
            'display_name' => 'Super Admin',
            'description' => 'Administrator Sistem Sekolah',
            'level' => 3
        ]);

        $teacherRole = Role::create([
            'name' => 'teacher',
            'display_name' => 'Guru',
            'description' => 'Pengajar / Tenaga Pendidik',
            'level' => 2
        ]);

        $studentRole = Role::create([
            'name' => 'student',
            'display_name' => 'Murid',
            'description' => 'Siswa Aktif',
            'level' => 1
        ]);

        // Create Default Users (HANYA UNTUK DEVELOPMENT)
        // Di production: jalankan seeder role saja, buat user via Admin Panel
        if (app()->environment('local', 'testing')) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'admin@dikelas.com',
                'password' => 'Admin@Dikelas2026!',
                'role_id' => $superAdminRole->id,
                'is_active' => true,
            ]);

            User::create([
                'name' => 'Guru Matematika',
                'email' => 'guru@dikelas.com',
                'password' => 'Guru@Dikelas2026!',
                'role_id' => $teacherRole->id,
                'nip' => '198001012005011001',
                'is_active' => true,
            ]);

            User::create([
                'name' => 'Budi Santoso',
                'email' => 'murid@dikelas.com',
                'password' => 'Murid@Dikelas2026!',
                'role_id' => $studentRole->id,
                'nis' => '12345678',
                'is_active' => true,
            ]);
        }
    }
}

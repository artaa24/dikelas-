<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
    </style>
</head>
<body class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    @include('components.sidebar-admin', ['active' => 'dashboard'])

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-full overflow-hidden relative">
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-8 z-10">
            <div class="flex items-center text-gray-400 text-sm font-medium">
                <span class="text-[#007cc3]">Dashboard</span>
            </div>
            <div class="flex items-center gap-6">
                @if($pendingResets > 0)
                <a href="/admin/users" class="relative p-2 text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-1 right-1 w-4 h-4 bg-red-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center">{{ $pendingResets }}</span>
                </a>
                @endif
                <div class="flex items-center">
                    <img class="h-10 w-10 rounded-full object-cover shadow-sm" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=0D8ABC&color=fff' }}" alt="User Avatar">
                    <div class="ml-3 hidden md:block">
                        <p class="text-sm font-bold text-gray-900">{{ auth()->user()->name ?? 'Super Admin' }}</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-auto p-8 xl:p-10">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Ringkasan Sistem</h2>
            <p class="text-gray-500 mb-8">Pantau statistik dan aktivitas seluruh sistem LMS.</p>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium mb-1">Total Guru</p>
                        <h3 class="text-4xl font-bold text-gray-900">{{ $totalTeachers ?? 0 }}</h3>
                    </div>
                    <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium mb-1">Total Murid</p>
                        <h3 class="text-4xl font-bold text-gray-900">{{ $totalStudents ?? 0 }}</h3>
                    </div>
                    <div class="w-16 h-16 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium mb-1">Kelas Aktif</p>
                        <h3 class="text-4xl font-bold text-gray-900">{{ $totalClasses ?? 0 }}</h3>
                    </div>
                    <div class="w-16 h-16 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium mb-1">Sertifikat Terbit</p>
                        <h3 class="text-4xl font-bold text-gray-900">{{ $totalCertificates ?? 0 }}</h3>
                    </div>
                    <div class="w-16 h-16 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Kelas Terbaru -->
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-900">Kelas Terbaru</h3>
                    </div>
                    <div class="space-y-4">
                        @forelse($recentClasses ?? [] as $class)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center font-bold text-sm mr-3">
                                    {{ strtoupper(substr($class->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-gray-900">{{ $class->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $class->teacher->name ?? 'N/A' }} · {{ $class->students_count }} murid</p>
                                </div>
                            </div>
                            <span class="px-2.5 py-1 text-xs font-bold rounded-full {{ $class->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $class->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </div>
                        @empty
                        <p class="text-sm text-gray-500 text-center py-4">Belum ada kelas yang dibuat.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Pengguna Terbaru -->
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-900">Pengguna Terbaru</h3>
                        <a href="/admin/users" class="text-sm text-[#007cc3] hover:underline font-medium">Lihat Semua</a>
                    </div>
                    <div class="space-y-4">
                        @forelse($recentUsers ?? [] as $u)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center font-bold text-sm mr-3">
                                    {{ strtoupper(substr($u->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-sm text-gray-900">{{ $u->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $u->email }}</p>
                                </div>
                            </div>
                            <span class="px-2.5 py-1 text-xs font-bold rounded-full 
                                @if($u->role && $u->role->name === 'super_admin') bg-red-100 text-red-700 
                                @elseif($u->role && $u->role->name === 'teacher') bg-purple-100 text-purple-700 
                                @else bg-green-100 text-green-700 @endif">
                                {{ $u->role->display_name ?? ucfirst($u->role->name ?? 'user') }}
                            </span>
                        </div>
                        @empty
                        <p class="text-sm text-gray-500 text-center py-4">Belum ada pengguna.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-8 bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
                <h3 class="text-xl font-bold text-gray-900 mb-6">Aksi Cepat</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="/admin/users" class="bg-blue-50 hover:bg-blue-100 text-[#007cc3] font-bold py-4 px-6 rounded-xl flex items-center transition">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                        Kelola Pengguna
                    </a>
                    <a href="/profile" class="bg-purple-50 hover:bg-purple-100 text-purple-700 font-bold py-4 px-6 rounded-xl flex items-center transition">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Pengaturan Profil
                    </a>
                    <a href="/help-center" class="bg-amber-50 hover:bg-amber-100 text-amber-700 font-bold py-4 px-6 rounded-xl flex items-center transition">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Pusat Bantuan
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

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
    @include('components.sidebar-student', ['active' => 'dashboard'])

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-full overflow-hidden relative">
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-8 z-10">
            <div class="flex items-center text-gray-400 text-sm font-medium">
                <span class="text-[#007cc3]">Dashboard</span>
            </div>
            <div class="flex items-center gap-6">
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
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Ringkasan Sistem</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
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
            </div>

            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
                <h3 class="text-xl font-bold text-gray-900 mb-6">Kelola Sekolah Anda</h3>
                <p class="text-gray-500 mb-6">Pilih menu Manajemen Pengguna untuk menambah guru dan murid baru ke dalam sistem LMS ini.</p>
                <a href="/admin/users" class="bg-[#007cc3] hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl inline-flex items-center transition shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                    Kelola Pengguna Sekarang
                </a>
            </div>
        </div>
    </main>
</body>
</html>

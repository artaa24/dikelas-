<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    <!-- Left Sidebar -->
    @include('components.sidebar-guru', ['active' => 'dashboard'])

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <!-- Header -->
        <header class="h-20 bg-[#F8FAFC] flex items-center justify-between px-8 flex-shrink-0">
            <!-- Search -->
            <div class="flex-1 max-w-2xl">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-5">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" class="w-full bg-white border border-gray-200 rounded-full py-3.5 pl-12 pr-4 text-sm focus:outline-none focus:ring-1 focus:ring-[#007cc3]" placeholder="Cari kelas, murid, atau tugas...">
                </div>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center space-x-6 ml-6">
                <a href="/notifications" class="text-gray-400 hover:text-gray-600 relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-[#F8FAFC]"></span>
                </a>
                <div class="h-8 w-px bg-gray-200"></div>
                <a href="/edit-profile" class="flex items-center cursor-pointer">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=0D8ABC&color=fff' }}" alt="User Avatar">
                </a>
            </div>
        </header>

        <!-- Scrollable Dashboard Content -->
        <div class="flex-1 overflow-auto hide-scrollbar px-8 pb-10 flex flex-col xl:flex-row gap-8">
            
            <!-- Left Side (Main Dashboard Content) -->
            <div class="flex-1 min-w-0">
                <!-- Welcome Banner -->
                <div class="bg-gradient-to-r from-[#0A4B7D] to-[#007cc3] rounded-[2rem] p-10 text-white mb-8 shadow-xl shadow-blue-900/10 relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 bg-white opacity-5 rounded-full"></div>
                    <div class="absolute bottom-0 left-10 -mb-16 w-32 h-32 bg-white opacity-10 rounded-full"></div>
                    
                    <h2 class="text-3xl font-bold mb-3 flex items-center relative z-10">
                        Selamat Pagi, Guru Hebat! 👋
                    </h2>
                    <p class="text-blue-50 text-lg mb-8 max-w-2xl relative z-10 opacity-90">
                        Anda saat ini mengelola {{ $totalClasses ?? 0 }} kelas. Total tugas yang perlu dinilai saat ini berjumlah {{ $pendingGrades ?? 0 }} tugas. Terus menginspirasi anak bangsa!
                    </p>
                    <a href="/guru/classes" class="bg-white text-[#0A4B7D] px-6 py-3 rounded-full font-semibold shadow hover:bg-gray-50 transition relative z-10 inline-block text-center text-sm">
                        Kelola Kelas Sekarang
                    </a>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mb-10">
                    <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center">
                        <div class="w-12 h-12 rounded-full bg-[#E5F9FC] text-[#02B1CC] flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 font-medium mb-1">Total Kelas</p>
                        <h3 class="text-3xl font-bold text-gray-900">{{ $totalClasses ?? 4 }}</h3>
                    </div>
                    
                    <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center">
                        <div class="w-12 h-12 rounded-full bg-[#E8F1FC] text-[#3B82F6] flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 font-medium mb-1">Total Murid</p>
                        <h3 class="text-3xl font-bold text-gray-900">{{ $totalStudents ?? 120 }}</h3>
                    </div>

                    <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center">
                        <div class="w-12 h-12 rounded-full bg-[#EBF8F2] text-[#10B981] flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 font-medium mb-1">Materi Dibagikan</p>
                        <h3 class="text-3xl font-bold text-gray-900">{{ $totalMaterials ?? 32 }}</h3>
                    </div>

                    <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full mt-6 mr-6"></div>
                        <div class="w-12 h-12 rounded-full bg-[#FEF2F2] text-[#EF4444] flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 font-medium mb-1">Perlu Dinilai</p>
                        <h3 class="text-3xl font-bold text-gray-900">{{ $pendingGrades ?? 45 }}</h3>
                    </div>
                </div>

                <!-- Kelas Anda -->
                <div class="mb-6 flex justify-between items-end">
                    <h3 class="text-xl font-bold text-gray-900">Kelas Aktif Anda</h3>
                    <a href="/guru/classes" class="text-sm text-[#007cc3] font-medium hover:underline">Kelola Semua Kelas</a>
                </div>

                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-2 overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                                <th class="p-4 font-medium rounded-tl-xl rounded-bl-xl">Nama Kelas</th>
                                <th class="p-4 font-medium">Jadwal</th>
                                <th class="p-4 font-medium">Siswa</th>
                                <th class="p-4 font-medium text-right rounded-tr-xl rounded-br-xl">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @forelse($activeClasses as $c)
                            <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition">
                                <td class="p-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600 font-bold mr-3">
                                            {{ strtoupper(substr($c->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900">{{ $c->name }}</p>
                                            <p class="text-xs text-gray-500">Kode: {{ $c->code }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 text-gray-600">-</td>
                                <td class="p-4 text-gray-600">{{ $c->students_count }} Siswa</td>
                                <td class="p-4 text-right">
                                    <a href="{{ route('classrooms.show', $c->id) }}" class="inline-block px-4 py-2 bg-gray-100 text-gray-700 hover:bg-gray-200 rounded-lg font-medium text-xs transition">Masuk Kelas</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="p-8 text-center text-gray-500">Belum ada kelas aktif.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
            
            <!-- Right Sidebar (Agenda) -->
            <div class="w-full xl:w-80 flex-shrink-0 space-y-6">
                <!-- Tugas Menunggu Penilaian -->
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-gray-900">Menunggu Penilaian</h3>
                        <a href="/guru/grades" class="text-xs text-[#007cc3] font-medium hover:underline">Buka</a>
                    </div>
                    
                    <div class="space-y-4">
                        @forelse($recentAssignments as $assignment)
                        @php
                            $totalStudents = $assignment->classroom ? $assignment->classroom->students()->count() : 0;
                            $submittedCount = $assignment->submissions->count();
                        @endphp
                        <div class="p-4 border border-gray-100 rounded-2xl hover:border-blue-100 transition">
                            <h4 class="font-bold text-gray-900 text-sm mb-1">{{ $assignment->title }}</h4>
                            <p class="text-xs text-gray-500 mb-3">{{ $assignment->classroom->name ?? '-' }} • Deadline: {{ \Carbon\Carbon::parse($assignment->deadline_at)->diffForHumans() }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-xs font-medium text-orange-500 bg-orange-50 px-2.5 py-1 rounded-full">{{ $submittedCount }}/{{ $totalStudents }} Kumpul</span>
                                <a href="/guru/grades?assignment_id={{ $assignment->id }}" class="text-xs font-bold text-[#007cc3] hover:underline">Pantau</a>
                            </div>
                        </div>
                        @empty
                        <div class="p-4 border border-gray-100 rounded-2xl text-center text-gray-500 text-sm">
                            Tidak ada tugas terbaru.
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>

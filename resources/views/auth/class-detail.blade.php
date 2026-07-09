<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $classroom->name }} - DIKELAS</title>
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
    <aside class="w-64 bg-white border-r border-gray-100 flex flex-col justify-between h-full flex-shrink-0">
        <div>
            <!-- Logo -->
            <div class="p-8 pb-6">
                <h1 class="text-2xl font-bold text-[#0A4B7D]">DIKELAS</h1>
                <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Professional LMS</p>
            </div>

            <!-- Navigation -->
            <nav class="px-4 space-y-2">
                <a href="/dashboard" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                <!-- Active Link -->
                <a href="/courses" class="flex items-center px-4 py-3 bg-[#9AE6F1] text-[#0A4B7D] rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    Kursus Saya
                </a>
                <a href="/schedule" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Jadwal
                </a>
                <a href="/assignments" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    Tugasku
                </a>
                <a href="/profile" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Pengaturan
                </a>
            </nav>
        </div>

        <div class="p-4 mb-4">
            <div class="h-px bg-gray-100 mb-4 w-full"></div>
            <a href="#" class="flex items-center px-4 py-2 text-gray-600 hover:text-gray-900 transition-colors mb-2">
                <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Pusat Bantuan
            </a>
            <a href="/login" class="flex items-center px-4 py-2 text-gray-600 hover:text-red-600 transition-colors">
                <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Keluar
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-full overflow-hidden relative">
        
        <!-- Header Image & Info -->
        <div class="h-64 relative flex-shrink-0">
            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" alt="Course Cover" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0A4B7D] via-[#0A4B7D]/70 to-transparent"></div>
            
            <div class="absolute top-0 left-0 w-full p-6 flex justify-between items-center z-10">
                <a href="/courses" class="text-white hover:bg-white/20 p-2 rounded-full backdrop-blur-sm transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <div class="flex items-center space-x-4">
                    <button class="text-white bg-black/20 hover:bg-black/40 p-2 rounded-full backdrop-blur-sm transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
                    </button>
                </div>
            </div>

            <div class="absolute bottom-0 left-0 w-full px-10 pb-8 flex justify-between items-end">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="bg-[#9AE6F1] text-[#0A4B7D] px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">{{ $classroom->code }}</span>
                        <span class="text-sm font-medium text-white/80"><svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg> {{ $classroom->students->count() }} Siswa</span>
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-white mb-2">{{ $classroom->name }}</h2>
                    <p class="text-white/80 font-medium text-lg">Dosen: {{ $classroom->teacher->name }}</p>
                </div>
                
                @if(auth()->user()->role->name == 'student')
                <div class="bg-white/10 rounded-2xl p-4 border border-white/20 w-full md:w-64 backdrop-blur-sm">
                    <div class="flex justify-between items-end mb-2">
                        <span class="text-white/80 text-sm font-medium">Progress Belajar</span>
                        <span class="text-white font-bold text-lg">0%</span>
                    </div>
                    <div class="w-full bg-black/20 rounded-full h-2">
                        <div class="bg-white h-2 rounded-full" style="width: 0%"></div>
                    </div>
                </div>
                @else
                <div class="hidden md:flex gap-3">
                    <button onclick="document.getElementById('uploadMaterialModal').classList.remove('hidden')" class="bg-white text-[#0A4B7D] hover:bg-gray-100 font-bold py-2.5 px-5 rounded-xl shadow-md transition flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                        Materi Baru
                    </button>
                    <button onclick="document.getElementById('createAssignmentModal').classList.remove('hidden')" class="bg-[#9AE6F1] text-[#0A4B7D] hover:bg-cyan-200 font-bold py-2.5 px-5 rounded-xl shadow-md transition flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Tugas Baru
                    </button>
                </div>
                @endif
            </div>
        </div>

        <!-- Scrollable Content Area -->
        <div class="flex-1 overflow-auto hide-scrollbar flex flex-col xl:flex-row">
            
            <!-- Main Content (Modules) -->
            <div class="flex-1 px-8 xl:px-10 py-8">
                <!-- Navigation Tabs -->
                <div class="flex border-b border-gray-200 mb-8 space-x-8">
                    <button class="pb-4 font-bold text-[#007cc3] border-b-2 border-[#007cc3]">Modul Materi</button>
                    <button class="pb-4 font-medium text-gray-500 hover:text-gray-700 transition">Tugas Kelas (6)</button>
                    <button class="pb-4 font-medium text-gray-500 hover:text-gray-700 transition">Pengumuman</button>
                    <button class="pb-4 font-medium text-gray-500 hover:text-gray-700 transition">Diskusi</button>
                </div>

                <h3 class="text-xl font-bold text-gray-900 mb-4">Silabus Pembelajaran</h3>
                
                <div class="space-y-6">
                    <!-- Modul Materi (Dinamis) -->
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="p-5 flex items-center justify-between cursor-pointer bg-gray-50/50 hover:bg-gray-50 transition border-b border-gray-100">
                            <div class="flex items-center">
                                <div class="bg-[#007cc3] text-white rounded-full p-2 mr-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-lg">Daftar Materi Pembelajaran</h4>
                                    <p class="text-sm text-gray-500">Materi yang diunggah oleh guru untuk dipelajari.</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 bg-white">
                            @forelse($materials as $material)
                            <a href="{{ Storage::url($material->file_path) }}" target="_blank" class="flex items-center px-4 py-3 hover:bg-gray-50 rounded-xl transition group border-b border-gray-50 last:border-0">
                                @if($material->file_type == 'pdf')
                                <svg class="w-5 h-5 text-red-500 group-hover:text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                @elseif($material->file_type == 'video')
                                <svg class="w-5 h-5 text-purple-500 group-hover:text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                @else
                                <svg class="w-5 h-5 text-blue-500 group-hover:text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                @endif
                                <div class="flex-1">
                                    <span class="text-sm font-bold text-gray-800 block">{{ $material->title }}</span>
                                    <span class="text-xs text-gray-500 line-clamp-1">{{ $material->description }}</span>
                                </div>
                                <span class="text-xs font-semibold text-gray-400 bg-gray-100 px-2 py-1 rounded-md">{{ number_format($material->file_size / 1024, 0) }} KB</span>
                            </a>
                            @empty
                            <div class="p-8 text-center text-gray-500">
                                Belum ada materi yang diunggah.
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Modul Tugas (Dinamis) -->
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="p-5 flex items-center justify-between cursor-pointer bg-gray-50/50 hover:bg-gray-50 transition border-b border-gray-100">
                            <div class="flex items-center">
                                <div class="bg-red-100 text-red-600 rounded-full p-2 mr-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-lg">Daftar Tugas Kelas</h4>
                                    <p class="text-sm text-gray-500">Tugas yang harus dikerjakan oleh murid.</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 bg-white">
                            @forelse($assignments as $assignment)
                            <a href="{{ route('assignments.show', $assignment->id) }}" class="flex items-center px-4 py-3 hover:bg-gray-50 rounded-xl transition group">
                                <svg class="w-5 h-5 text-red-400 group-hover:text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                <div class="flex-1">
                                    <span class="text-sm font-medium text-gray-700 block">{{ $assignment->title }}</span>
                                    <span class="text-xs text-gray-500 line-clamp-1">{{ $assignment->description }}</span>
                                </div>
                                <span class="text-xs font-medium {{ now()->gt($assignment->deadline_at) ? 'text-red-500' : 'text-[#007cc3]' }}">
                                    Tenggat: {{ \Carbon\Carbon::parse($assignment->deadline_at)->format('d M Y, H:i') }}
                                </span>
                            </a>
                            @empty
                            <div class="p-8 text-center text-gray-500">
                                Belum ada tugas yang diberikan.
                            </div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>

            <!-- Right Sidebar Info -->
            <div class="w-full xl:w-80 bg-white border-l border-gray-100 p-8 flex flex-col hide-scrollbar overflow-y-auto">
                <h3 class="font-bold text-gray-900 mb-4">Informasi Kelas</h3>
                
                <div class="mb-6 space-y-3">
                    <div class="flex items-center text-sm">
                        <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-gray-600">Dibuat: {{ $classroom->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center text-sm">
                        <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span class="text-gray-600">{{ $classroom->students->count() }} Murid terdaftar</span>
                    </div>
                </div>

                <hr class="border-gray-100 mb-6">

                <h3 class="font-bold text-gray-900 mb-4">Teman Kelas</h3>
                <div class="flex flex-wrap gap-2 mb-6">
                    @foreach($classroom->students->take(8) as $student)
                        <div class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm bg-[#007cc3] text-white font-bold flex items-center justify-center text-sm" title="{{ $student->name }}">
                            {{ strtoupper(substr($student->name, 0, 1)) }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

</body>
</html>

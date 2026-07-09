<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kelas - DIKELAS</title>
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
                <div>
                    <span class="inline-block px-3 py-1 bg-[#9AE6F1] text-[#0A4B7D] text-xs font-bold rounded-md mb-3">Teknologi</span>
                    <h2 class="text-4xl font-bold text-white mb-2 shadow-sm">Algoritma & Pemrograman Dasar</h2>
                    <p class="text-blue-100 flex items-center text-sm">
                        <img src="https://i.pravatar.cc/150?img=32" class="w-6 h-6 rounded-full border border-white/50 mr-2" alt="Instructor">
                        Dosen: Prof. Dr. Agus, S.Kom., M.T.
                    </p>
                </div>
                <div class="hidden md:block">
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/20 text-white min-w-[200px]">
                        <div class="flex justify-between items-end mb-2">
                            <span class="text-xs text-blue-100">Progres Anda</span>
                            <span class="font-bold text-xl">75%</span>
                        </div>
                        <div class="w-full bg-white/20 rounded-full h-2 mb-1">
                            <div class="bg-[#9AE6F1] h-2 rounded-full" style="width: 75%"></div>
                        </div>
                        <span class="text-[10px] text-blue-100">18 dari 24 modul diselesaikan</span>
                    </div>
                </div>
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
                
                <div class="space-y-4">
                    <!-- Modul 1 (Completed) -->
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="p-5 flex items-center justify-between cursor-pointer bg-gray-50/50 hover:bg-gray-50 transition border-b border-gray-100">
                            <div class="flex items-center">
                                <div class="bg-green-100 text-green-600 rounded-full p-2 mr-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-lg">Modul 1: Pengenalan Algoritma</h4>
                                    <p class="text-sm text-gray-500">Konsep dasar, sejarah, dan kegunaan algoritma dalam pemrograman.</p>
                                </div>
                            </div>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div class="p-2 bg-white">
                            <!-- Items inside module -->
                            <a href="/material-detail" class="flex items-center px-4 py-3 hover:bg-gray-50 rounded-xl transition group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-[#007cc3] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="text-sm font-medium text-gray-700 flex-1">Video: Apa itu Algoritma?</span>
                                <span class="text-xs text-gray-400">12 Menit</span>
                            </a>
                            <a href="/material-detail" class="flex items-center px-4 py-3 hover:bg-gray-50 rounded-xl transition group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-[#007cc3] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                <span class="text-sm font-medium text-gray-700 flex-1">Materi Bacaan: Sejarah Algoritma</span>
                                <span class="text-xs text-gray-400">PDF</span>
                            </a>
                        </div>
                    </div>

                    <!-- Modul 2 (Current) -->
                    <div class="bg-white rounded-2xl border-2 border-[#007cc3] shadow-md overflow-hidden">
                        <div class="p-5 flex items-center justify-between cursor-pointer">
                            <div class="flex items-center">
                                <div class="bg-[#007cc3] text-white rounded-full w-9 h-9 flex items-center justify-center font-bold mr-4">
                                    2
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-lg">Modul 2: Struktur Data Dasar (Array)</h4>
                                    <p class="text-sm text-gray-500">Mempelajari cara menyimpan kumpulan data secara statis.</p>
                                </div>
                            </div>
                            <svg class="w-5 h-5 text-gray-600 transform rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div class="p-2 bg-white border-t border-gray-100">
                            <a href="/material-detail" class="flex items-center px-4 py-3 bg-blue-50/50 rounded-xl transition group">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="text-sm font-medium text-gray-900 flex-1 line-through opacity-75">Pengenalan Array</span>
                                <span class="text-xs font-bold text-green-600">Selesai</span>
                            </a>
                            <a href="/material-detail" class="flex items-center px-4 py-3 bg-white hover:bg-gray-50 rounded-xl transition group border-l-2 border-blue-500 shadow-sm my-1">
                                <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="text-sm font-bold text-[#007cc3] flex-1">Video: Array Multi-dimensi (Sedang Berjalan)</span>
                                <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-md font-bold">Lanjutkan</span>
                            </a>
                            <a href="/assignment-detail" class="flex items-center px-4 py-3 hover:bg-gray-50 rounded-xl transition group">
                                <svg class="w-5 h-5 text-red-400 group-hover:text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                <span class="text-sm font-medium text-gray-700 flex-1">Tugas 1: Praktik Array <span class="text-red-500 text-xs ml-2 font-bold">(Wajib)</span></span>
                                <span class="text-xs font-medium text-red-500">Tenggat: Hari Ini</span>
                            </a>
                        </div>
                    </div>

                    <!-- Modul 3 (Locked) -->
                    <div class="bg-gray-50 rounded-2xl border border-gray-200 overflow-hidden opacity-75">
                        <div class="p-5 flex items-center justify-between cursor-not-allowed">
                            <div class="flex items-center">
                                <div class="bg-gray-200 text-gray-500 rounded-full w-9 h-9 flex items-center justify-center font-bold mr-4">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-500 text-lg">Modul 3: Linked List</h4>
                                    <p class="text-sm text-gray-400">Terbuka setelah menyelesaikan Modul 2.</p>
                                </div>
                            </div>
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
                        <span class="text-gray-600">Jadwal: Senin & Rabu, 09:00 WIB</span>
                    </div>
                    <div class="flex items-center text-sm">
                        <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span class="text-gray-600">45 Mahasiswa terdaftar</span>
                    </div>
                    <div class="flex items-center text-sm">
                        <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                        <span class="text-gray-600">Bahasa Indonesia</span>
                    </div>
                </div>

                <hr class="border-gray-100 mb-6">

                <h3 class="font-bold text-gray-900 mb-4">Teman Kelas</h3>
                <div class="flex flex-wrap gap-2 mb-6">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="https://i.pravatar.cc/150?img=12" alt="Student">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="https://i.pravatar.cc/150?img=13" alt="Student">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="https://i.pravatar.cc/150?img=14" alt="Student">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="https://i.pravatar.cc/150?img=15" alt="Student">
                    <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-xs font-bold text-gray-500 border-2 border-white shadow-sm">+41</div>
                </div>

                <button class="w-full bg-[#007cc3]/10 text-[#007cc3] hover:bg-[#007cc3]/20 font-bold py-3 rounded-xl transition text-sm">
                    Lihat Semua Anggota
                </button>
            </div>
        </div>
    </main>

</body>
</html>

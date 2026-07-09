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
    <aside class="w-64 bg-white border-r border-gray-100 flex flex-col justify-between h-full flex-shrink-0">
        <div>
            <!-- Logo -->
            <div class="p-8 pb-6">
                <h1 class="text-2xl font-bold text-[#0A4B7D]">DIKELAS</h1>
                <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Teacher Portal</p>
            </div>

            <!-- Navigation -->
            <nav class="px-4 space-y-2">
                <!-- Active Link -->
                <a href="/guru/dashboard" class="flex items-center px-4 py-3 bg-[#9AE6F1] text-[#0A4B7D] rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                <a href="/guru/classes" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    Kelasku
                </a>
                <a href="/guru/materials" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    Manajemen Materi
                </a>
                <a href="/guru/assignments" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    Daftar Tugas
                </a>
                <a href="/guru/students" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Anggota
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
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <!-- Header -->
        <header class="h-20 bg-white flex items-center justify-between px-8 xl:px-10 flex-shrink-0 border-b border-gray-100">
            <!-- Breadcrumbs / Greeting -->
            <div>
                <h2 class="text-xl font-bold text-gray-800">Selamat datang, Guru! 👋</h2>
                <p class="text-sm text-gray-500">Mari kelola kelas Anda dengan mudah hari ini.</p>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center space-x-6">
                <!-- Add New Button -->
                <a href="/guru/materials" class="hidden sm:flex bg-[#007cc3] hover:bg-blue-700 text-white text-sm font-semibold py-2 px-5 rounded-full shadow-sm shadow-blue-500/20 transition-all items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Materi
                </a>
                
                <a href="#" class="text-gray-400 hover:text-gray-600 relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                </a>
                
                <div class="h-8 w-px bg-gray-200"></div>
                <a href="#" class="flex items-center cursor-pointer">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-gray-100 shadow-sm" src="https://i.pravatar.cc/150?img=32" alt="Teacher Avatar">
                    <div class="ml-3 hidden md:block">
                        <p class="text-sm font-semibold text-gray-700">Prof. Dr. Agus</p>
                        <p class="text-xs text-gray-500">Guru Matematika</p>
                    </div>
                </a>
            </div>
        </header>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-auto hide-scrollbar p-8 xl:p-10">
            
            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Total Kelas</p>
                        <h3 class="text-3xl font-bold text-gray-900">4</h3>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                </div>
                
                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Total Murid</p>
                        <h3 class="text-3xl font-bold text-gray-900">128</h3>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-green-50 text-green-600 flex items-center justify-center">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Materi Terupload</p>
                        <h3 class="text-3xl font-bold text-gray-900">32</h3>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 border border-red-100 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-red-500 mb-1">Perlu Dinilai</p>
                        <h3 class="text-3xl font-bold text-red-600">14</h3>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                
                <!-- Jadwal Hari ini -->
                <div class="xl:col-span-2 space-y-6">
                    <div class="flex justify-between items-end mb-2">
                        <h3 class="text-xl font-bold text-gray-900">Jadwal Mengajar Hari Ini</h3>
                        <a href="#" class="text-sm font-semibold text-[#007cc3] hover:underline">Lihat Kalender Lengkap</a>
                    </div>
                    
                    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden p-2">
                        <!-- Class Schedule Item -->
                        <div class="flex items-center p-4 hover:bg-gray-50 rounded-2xl transition cursor-pointer">
                            <div class="w-16 h-16 bg-blue-50 text-[#007cc3] rounded-2xl flex flex-col items-center justify-center font-bold mr-5">
                                <span class="text-lg leading-none">08</span>
                                <span class="text-xs uppercase mt-1 opacity-70">AM</span>
                            </div>
                            <div class="flex-1">
                                <span class="inline-block px-2 py-0.5 bg-blue-100 text-blue-700 text-xs font-bold rounded-md mb-1">Algoritma & Pemrograman</span>
                                <h4 class="font-bold text-gray-900 text-lg">Kelas X - IPA 1</h4>
                                <p class="text-sm text-gray-500">Ruang Laboratorium Komputer A</p>
                            </div>
                            <button class="px-5 py-2.5 bg-white border border-[#007cc3] text-[#007cc3] font-semibold rounded-xl text-sm hover:bg-[#007cc3] hover:text-white transition">
                                Mulai Kelas
                            </button>
                        </div>
                        
                        <!-- Class Schedule Item -->
                        <div class="flex items-center p-4 hover:bg-gray-50 rounded-2xl transition cursor-pointer border-t border-gray-50">
                            <div class="w-16 h-16 bg-gray-50 text-gray-400 rounded-2xl flex flex-col items-center justify-center font-bold mr-5">
                                <span class="text-lg leading-none">10</span>
                                <span class="text-xs uppercase mt-1 opacity-70">AM</span>
                            </div>
                            <div class="flex-1">
                                <span class="inline-block px-2 py-0.5 bg-purple-100 text-purple-700 text-xs font-bold rounded-md mb-1">Matematika Diskrit</span>
                                <h4 class="font-bold text-gray-900 text-lg">Kelas X - IPS 2</h4>
                                <p class="text-sm text-gray-500">Ruang Kelas 104</p>
                            </div>
                            <button class="px-5 py-2.5 bg-gray-50 border border-gray-200 text-gray-400 font-semibold rounded-xl text-sm hover:text-gray-600 transition">
                                Persiapan
                            </button>
                        </div>
                    </div>

                    <!-- Aktivitas Terbaru -->
                    <div class="flex justify-between items-end mb-2 mt-8">
                        <h3 class="text-xl font-bold text-gray-900">Aktivitas Terkini</h3>
                    </div>
                    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6">
                        <div class="space-y-6">
                            <!-- Item -->
                            <div class="flex">
                                <div class="mt-1 flex-shrink-0">
                                    <div class="w-2.5 h-2.5 bg-[#007cc3] rounded-full"></div>
                                    <div class="w-px h-full bg-gray-200 mx-auto mt-2"></div>
                                </div>
                                <div class="ml-4 pb-2">
                                    <p class="text-sm text-gray-500 mb-0.5">Baru Saja</p>
                                    <p class="text-sm font-semibold text-gray-800">Budi Santoso mengumpulkan <span class="text-[#007cc3]">Tugas Array 1</span></p>
                                </div>
                            </div>
                            <!-- Item -->
                            <div class="flex">
                                <div class="mt-1 flex-shrink-0">
                                    <div class="w-2.5 h-2.5 bg-green-500 rounded-full"></div>
                                    <div class="w-px h-full bg-gray-200 mx-auto mt-2"></div>
                                </div>
                                <div class="ml-4 pb-2">
                                    <p class="text-sm text-gray-500 mb-0.5">2 Jam yang lalu</p>
                                    <p class="text-sm font-semibold text-gray-800">Anda menambahkan materi baru <span class="text-[#007cc3]">Pengantar C++</span></p>
                                </div>
                            </div>
                            <!-- Item -->
                            <div class="flex">
                                <div class="mt-1 flex-shrink-0">
                                    <div class="w-2.5 h-2.5 bg-gray-300 rounded-full"></div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm text-gray-500 mb-0.5">Kemarin</p>
                                    <p class="text-sm font-semibold text-gray-800">15 siswa telah menyelesaikan Kuis Matematika Dasar</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right Sidebar (Tasks to Grade) -->
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Perlu Penilaian</h3>
                    
                    <div class="bg-white rounded-3xl border border-red-100 shadow-sm p-1 overflow-hidden relative">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-red-500 to-orange-400"></div>
                        
                        <!-- Assignment Item -->
                        <div class="p-5 border-b border-gray-50 hover:bg-gray-50 transition cursor-pointer group rounded-t-3xl">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-red-500 bg-red-50 px-2 py-0.5 rounded">Tenggat Lewat</span>
                                <span class="text-xs font-bold text-gray-400">12/30 Kumpul</span>
                            </div>
                            <h4 class="font-bold text-gray-800 group-hover:text-[#007cc3] transition">Tugas Algoritma #1</h4>
                            <p class="text-xs text-gray-500 mt-1">Kelas X - IPA 1</p>
                            <a href="/guru/assignments" class="mt-3 block text-center w-full bg-red-50 text-red-600 font-semibold text-xs py-2 rounded-xl group-hover:bg-red-500 group-hover:text-white transition">
                                Nilai Sekarang
                            </a>
                        </div>

                        <!-- Assignment Item -->
                        <div class="p-5 border-b border-gray-50 hover:bg-gray-50 transition cursor-pointer group">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-yellow-600 bg-yellow-50 px-2 py-0.5 rounded border border-yellow-200">Hari ini</span>
                                <span class="text-xs font-bold text-gray-400">28/30 Kumpul</span>
                            </div>
                            <h4 class="font-bold text-gray-800 group-hover:text-[#007cc3] transition">Kuis Matematika</h4>
                            <p class="text-xs text-gray-500 mt-1">Kelas X - IPS 2</p>
                            <a href="/guru/assignments" class="mt-3 block text-center w-full bg-gray-50 text-gray-600 border border-gray-200 font-semibold text-xs py-2 rounded-xl hover:bg-gray-100 transition">
                                Cek Progress
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </main>

</body>
</html>

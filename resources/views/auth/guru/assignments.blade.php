<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas - DIKELAS</title>
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
                <a href="/guru/dashboard" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
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
                <!-- Active Link -->
                <a href="/guru/assignments" class="flex items-center px-4 py-3 bg-[#9AE6F1] text-[#0A4B7D] rounded-xl font-medium transition-colors">
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
            <!-- Search -->
            <div class="flex-1 max-w-2xl">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-5">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" class="w-full bg-gray-50 border border-gray-200 rounded-full py-3 pl-12 pr-4 text-sm focus:outline-none focus:ring-1 focus:ring-[#007cc3]" placeholder="Cari penugasan...">
                </div>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center space-x-6 ml-6">
                <a href="#" class="text-gray-400 hover:text-gray-600 relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                </a>
                <div class="h-8 w-px bg-gray-200"></div>
                <a href="#" class="flex items-center cursor-pointer">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-gray-100 shadow-sm" src="https://i.pravatar.cc/150?img=32" alt="Teacher Avatar">
                </a>
            </div>
        </header>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-auto hide-scrollbar p-8 xl:p-10">
            
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Daftar Tugas</h2>
                    <p class="text-gray-500">Kelola dan nilai semua tugas yang telah dikumpulkan oleh murid Anda.</p>
                </div>
                <a href="/guru/create-assignment" class="bg-[#007cc3] hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl shadow-lg shadow-blue-500/30 flex items-center transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Buat Tugas Baru
                </a>
            </div>

            <!-- Task Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Task Card -->
                <div class="bg-white rounded-3xl shadow-sm border border-red-100 overflow-hidden flex flex-col h-full relative">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-red-500 to-orange-400"></div>
                    <div class="p-6 flex-1">
                        <div class="flex justify-between items-start mb-4">
                            <span class="bg-red-50 text-red-600 px-3 py-1 rounded-full text-xs font-bold border border-red-100 uppercase tracking-wider">Tenggat Lewat</span>
                            <div class="bg-gray-100 px-3 py-1 rounded-full text-xs font-bold text-gray-600">X IPA 1</div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Tugas Praktik 1: Implementasi Array</h3>
                        <p class="text-sm text-gray-500 line-clamp-2 mb-4">Instruksi: Buatlah sebuah program sederhana menggunakan bahasa C++ yang mengimplementasikan array 2 dimensi.</p>
                        
                        <div class="bg-gray-50 rounded-xl p-4 mt-auto">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="font-medium text-gray-600">Progress Pengumpulan</span>
                                <span class="font-bold text-gray-900">12 / 32</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-[#007cc3] h-2 rounded-full" style="width: 37%"></div>
                            </div>
                            <p class="text-xs text-red-500 mt-2 font-medium">12 Siswa belum dinilai!</p>
                        </div>
                    </div>
                    <div class="px-6 py-4 border-t border-gray-50 flex gap-3">
                        <button class="flex-1 bg-white border border-[#007cc3] text-[#007cc3] font-semibold py-2 rounded-xl text-sm hover:bg-blue-50 transition">Edit Tugas</button>
                        <a href="/guru/assignment-preview" class="flex-1 bg-red-50 border border-red-100 text-red-600 font-semibold py-2 rounded-xl text-sm hover:bg-red-100 transition text-center">Nilai Sekarang</a>
                    </div>
                </div>
                
                <!-- Task Card 2 -->
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col h-full">
                    <div class="p-6 flex-1">
                        <div class="flex justify-between items-start mb-4">
                            <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-bold border border-blue-100 uppercase tracking-wider">Aktif</span>
                            <div class="bg-gray-100 px-3 py-1 rounded-full text-xs font-bold text-gray-600">X IPS 2</div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Tugas Merangkum: Teori Himpunan</h3>
                        <p class="text-sm text-gray-500 line-clamp-2 mb-4">Buatlah rangkuman mengenai teori himpunan, diagram venn, dan operasinya. Minimal 2 halaman folio.</p>
                        
                        <div class="bg-gray-50 rounded-xl p-4 mt-auto">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="font-medium text-gray-600">Progress Pengumpulan</span>
                                <span class="font-bold text-gray-900">28 / 28</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 100%"></div>
                            </div>
                            <p class="text-xs text-green-600 mt-2 font-medium">Semua siswa sudah dinilai.</p>
                        </div>
                    </div>
                    <div class="px-6 py-4 border-t border-gray-50">
                        <a href="/guru/assignment-preview" class="w-full inline-block text-center bg-white border border-gray-200 text-gray-600 font-semibold py-2 rounded-xl text-sm hover:bg-gray-50 transition">Lihat Rekap Nilai</a>
                    </div>
                </div>

            </div>
            
        </div>
    </main>

</body>
</html>

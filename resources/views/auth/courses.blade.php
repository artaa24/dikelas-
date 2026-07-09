<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursus Saya - DIKELAS</title>
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
            <div class="p-8 pb-6">
                <h1 class="text-2xl font-bold text-[#0A4B7D]">DIKELAS</h1>
                <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Professional LMS</p>
            </div>
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
                <a href="/edit-profile" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Pengaturan
                </a>
            </nav>
        </div>

        <div class="p-4 mb-4">
            <div class="h-px bg-gray-100 mb-4 w-full"></div>
            <a href="/help-center" class="flex items-center px-4 py-2 text-gray-600 hover:text-gray-900 transition-colors mb-2">
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
        <header class="h-20 bg-[#F8FAFC] flex items-center justify-between px-8 xl:px-10 flex-shrink-0">
            <!-- Search -->
            <div class="flex-1 max-w-2xl">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-5">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" class="w-full bg-white border border-gray-200 rounded-full py-3.5 pl-12 pr-4 text-sm focus:outline-none focus:ring-1 focus:ring-[#007cc3]" placeholder="Cari materi, tugas, atau kursus...">
                </div>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center space-x-6 ml-6">
                <a href="/announcements" class="text-gray-400 hover:text-gray-600 relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-[#F8FAFC]"></span>
                </a>
                <button class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                </button>
                <div class="h-8 w-px bg-gray-200"></div>
                <a href="/edit-profile" class="flex items-center cursor-pointer">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="https://i.pravatar.cc/150?img=11" alt="User Avatar">
                </a>
            </div>
        </header>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-auto hide-scrollbar px-8 xl:px-10 pb-10">
            
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Kursus Saya</h2>
                    <p class="text-gray-500">Lanjutkan pembelajaran Anda untuk mencapai target.</p>
                </div>
                <!-- Filtering -->
                <div class="flex bg-white rounded-full p-1 border border-gray-200 shadow-sm">
                    <button class="px-6 py-2 rounded-full bg-[#007cc3] text-white text-sm font-semibold shadow-sm transition">Semua</button>
                    <button class="px-6 py-2 rounded-full text-gray-600 hover:bg-gray-100 text-sm font-semibold transition">Sedang Berjalan</button>
                    <button class="px-6 py-2 rounded-full text-gray-600 hover:bg-gray-100 text-sm font-semibold transition">Selesai</button>
                </div>
            </div>

            <!-- Course Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                
                <!-- Course Card 1 -->
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col group hover:shadow-md transition-shadow">
                    <div class="h-48 bg-gray-200 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Course">
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm flex items-center">
                            <svg class="w-3.5 h-3.5 mr-1 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> 4.9
                        </div>
                        <div class="absolute top-4 right-4 bg-blue-100 text-[#007cc3] text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm">Teknologi</div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="font-bold text-gray-900 text-lg mb-2 line-clamp-2">Algoritma & Pemrograman Dasar</h3>
                        
                        <div class="flex items-center mb-5">
                            <img src="https://i.pravatar.cc/150?img=32" class="w-8 h-8 rounded-full border border-gray-200 mr-2" alt="Instructor">
                            <span class="text-sm text-gray-600 font-medium">Prof. Dr. Agus</span>
                        </div>
                        
                        <div class="mt-auto">
                            <div class="flex justify-between items-end mb-2">
                                <span class="text-xs text-gray-500 font-medium">Progres Belajar</span>
                                <span class="font-bold text-[#007cc3]">75%</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5 mb-5">
                                <div class="bg-[#007cc3] h-2.5 rounded-full" style="width: 75%"></div>
                            </div>
                            
                            <div class="flex items-center justify-between text-xs text-gray-500 mb-5 font-medium border-t border-gray-100 pt-4">
                                <div class="flex items-center"><svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg> 24 Materi</div>
                                <div class="flex items-center"><svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg> 6 Tugas</div>
                            </div>
                            
                            <a href="/class-detail" class="w-full bg-white border border-[#007cc3] text-[#007cc3] hover:bg-[#007cc3] hover:text-white font-semibold py-2.5 rounded-xl flex items-center justify-center transition-colors text-sm text-center block">
                                Lanjutkan Belajar
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Course Card 2 -->
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col group hover:shadow-md transition-shadow">
                    <div class="h-48 bg-gray-200 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Course">
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm flex items-center">
                            <svg class="w-3.5 h-3.5 mr-1 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> 5.0
                        </div>
                        <div class="absolute top-4 right-4 bg-purple-100 text-purple-700 text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm">Bisnis</div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="font-bold text-gray-900 text-lg mb-2 line-clamp-2">Komunikasi Bisnis Profesional</h3>
                        
                        <div class="flex items-center mb-5">
                            <img src="https://i.pravatar.cc/150?img=44" class="w-8 h-8 rounded-full border border-gray-200 mr-2" alt="Instructor">
                            <span class="text-sm text-gray-600 font-medium">Sarah Wijaya</span>
                        </div>
                        
                        <div class="mt-auto">
                            <div class="flex justify-between items-end mb-2">
                                <span class="text-xs text-gray-500 font-medium">Progres Belajar</span>
                                <span class="font-bold text-[#007cc3]">32%</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5 mb-5">
                                <div class="bg-[#007cc3] h-2.5 rounded-full" style="width: 32%"></div>
                            </div>
                            
                            <div class="flex items-center justify-between text-xs text-gray-500 mb-5 font-medium border-t border-gray-100 pt-4">
                                <div class="flex items-center"><svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg> 18 Materi</div>
                                <div class="flex items-center"><svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg> 3 Tugas</div>
                            </div>
                            
                            <button class="w-full bg-white border border-[#007cc3] text-[#007cc3] hover:bg-[#007cc3] hover:text-white font-semibold py-2.5 rounded-xl flex items-center justify-center transition-colors text-sm">
                                Lanjutkan Belajar
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Course Card 3 (Completed) -->
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col group hover:shadow-md transition-shadow relative">
                    <div class="h-48 bg-gray-200 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 filter brightness-90" alt="Course">
                        <div class="absolute inset-0 bg-black/10"></div>
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm flex items-center">
                            <svg class="w-3.5 h-3.5 mr-1 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> 4.8
                        </div>
                        <div class="absolute top-4 right-4 bg-green-100 text-green-700 text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm flex items-center">
                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Selesai
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="font-bold text-gray-900 text-lg mb-2 line-clamp-2">Pengantar Ilmu Sejarah</h3>
                        
                        <div class="flex items-center mb-5">
                            <img src="https://i.pravatar.cc/150?img=52" class="w-8 h-8 rounded-full border border-gray-200 mr-2" alt="Instructor">
                            <span class="text-sm text-gray-600 font-medium">Dr. Rahmat Hidayat</span>
                        </div>
                        
                        <div class="mt-auto">
                            <div class="flex justify-between items-end mb-2">
                                <span class="text-xs text-green-600 font-bold flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Kursus Selesai
                                </span>
                                <span class="font-bold text-green-600">100%</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5 mb-5">
                                <div class="bg-green-500 h-2.5 rounded-full" style="width: 100%"></div>
                            </div>
                            
                            <a href="/class-detail" class="w-full bg-gray-50 border border-gray-200 text-gray-600 hover:bg-gray-100 font-semibold py-2.5 rounded-xl flex items-center justify-center transition-colors text-sm text-center block">
                                Lihat Ulang Materi
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>
</html>

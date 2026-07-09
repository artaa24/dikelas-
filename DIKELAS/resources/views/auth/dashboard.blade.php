<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Hide scrollbar for clean UI but keep functionality */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
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
                <a href="#" class="flex items-center px-4 py-3 bg-[#9AE6F1] text-[#0A4B7D] rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    My Courses
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Schedule
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    Assignments
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Settings
                </a>
            </nav>
        </div>

        <div class="p-4 mb-4">
            <div class="h-px bg-gray-100 mb-4 w-full"></div>
            <a href="#" class="flex items-center px-4 py-2 text-gray-600 hover:text-gray-900 transition-colors mb-2">
                <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Help Center
            </a>
            <a href="#" class="flex items-center px-4 py-2 text-gray-600 hover:text-red-600 transition-colors">
                <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Logout
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
                    <input type="text" class="w-full bg-white border border-gray-200 rounded-full py-3.5 pl-12 pr-4 text-sm focus:outline-none focus:ring-1 focus:ring-[#007cc3]" placeholder="Cari materi, tugas, atau mentor...">
                </div>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center space-x-6 ml-6">
                <button class="text-gray-400 hover:text-gray-600 relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-[#F8FAFC]"></span>
                </button>
                <button class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                </button>
                <div class="h-8 w-px bg-gray-200"></div>
                <div class="flex items-center cursor-pointer">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="https://i.pravatar.cc/150?img=11" alt="User Avatar">
                </div>
            </div>
        </header>

        <!-- Scrollable Dashboard Content -->
        <div class="flex-1 overflow-auto hide-scrollbar px-8 xl:px-10 pb-10 flex flex-col xl:flex-row gap-8">
            
            <!-- Left Side (Main Dashboard Content) -->
            <div class="flex-1 min-w-0">
                <!-- Welcome Banner -->
                <div class="bg-[#007cc3] rounded-[2rem] p-10 text-white mb-8 shadow-xl shadow-blue-900/10 relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 bg-white opacity-5 rounded-full"></div>
                    <div class="absolute bottom-0 left-10 -mb-16 w-32 h-32 bg-white opacity-10 rounded-full"></div>
                    
                    <h2 class="text-4xl font-bold mb-4 flex items-center relative z-10">
                        Selamat Datang, Budi!
                    </h2>
                    <p class="text-blue-50 text-lg mb-8 max-w-2xl relative z-10 leading-relaxed opacity-90">
                        Siap belajar hari ini? Kamu telah menyelesaikan 85% dari target mingguanmu. Hanya tinggal 2 tugas lagi untuk mencapai IPK sempurna!
                    </p>
                    <button class="bg-white text-[#007cc3] px-6 py-3 rounded-full font-semibold shadow hover:bg-gray-50 transition relative z-10">
                        Lanjutkan Belajar
                    </button>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mb-10">
                    <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center">
                        <div class="w-12 h-12 rounded-full bg-[#E5F9FC] text-[#02B1CC] flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <p class="text-sm text-gray-500 font-medium mb-1">Selesai</p>
                        <h3 class="text-3xl font-bold text-gray-900 mb-1">12 <span class="text-sm font-medium text-gray-500">Matkul</span></h3>
                    </div>
                    
                    <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center">
                        <div class="w-12 h-12 rounded-full bg-[#E8F1FC] text-[#3B82F6] flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        </div>
                        <p class="text-sm text-gray-500 font-medium mb-1">Tugas Aktif</p>
                        <h3 class="text-3xl font-bold text-gray-900 mb-1">4 <span class="text-sm font-medium text-gray-500">Tugas</span></h3>
                    </div>

                    <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center">
                        <div class="w-12 h-12 rounded-full bg-[#EBF8F2] text-[#10B981] flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                        </div>
                        <p class="text-sm text-gray-500 font-medium mb-1">IPK Semester</p>
                        <h3 class="text-3xl font-bold text-gray-900 mb-1">3.92 <span class="text-sm font-medium text-gray-500">Skala 4.0</span></h3>
                    </div>

                    <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center">
                        <div class="w-12 h-12 rounded-full bg-[#E5F7F9] text-[#02A7A4] flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-sm text-gray-500 font-medium mb-1">Jam Belajar</p>
                        <h3 class="text-3xl font-bold text-gray-900 mb-1">42.5 <span class="text-sm font-medium text-gray-500">Jam/Mgg</span></h3>
                    </div>
                </div>

                <!-- Kursus Aktif -->
                <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Kursus Aktif</h3>
                        <div class="flex flex-wrap gap-2">
                            <button class="px-5 py-2 rounded-full bg-[#007cc3] text-white text-sm font-medium shadow-sm">Semua</button>
                            <button class="px-5 py-2 rounded-full bg-gray-200 text-gray-600 hover:bg-gray-300 text-sm font-medium transition">Matematika</button>
                            <button class="px-5 py-2 rounded-full bg-gray-200 text-gray-600 hover:bg-gray-300 text-sm font-medium transition">Bahasa</button>
                            <button class="px-5 py-2 rounded-full bg-gray-200 text-gray-600 hover:bg-gray-300 text-sm font-medium transition">Sains</button>
                            <button class="px-5 py-2 rounded-full bg-gray-200 text-gray-600 hover:bg-gray-300 text-sm font-medium transition">Seni</button>
                        </div>
                    </div>
                </div>

                <!-- Course Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Card 1 -->
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                        <div class="h-44 bg-gray-200 relative">
                            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover" alt="Course Image">
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#007cc3] text-xs font-bold px-4 py-1.5 rounded-full shadow-sm">Matematika Diskrit</div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center">
                                    <img src="https://i.pravatar.cc/150?img=32" class="w-10 h-10 rounded-full border border-gray-200 mr-3" alt="Instructor">
                                    <div>
                                        <h4 class="font-bold text-gray-900 text-sm">Prof. Dr. Agus</h4>
                                        <p class="text-xs text-gray-500">Mentor Utama</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="font-bold text-[#007cc3] text-lg">75%</span>
                                    <p class="text-[10px] text-gray-500 font-medium">Progress</p>
                                </div>
                            </div>
                            
                            <div class="w-full bg-gray-100 rounded-full h-2 mb-6">
                                <div class="bg-[#007cc3] h-2 rounded-full" style="width: 75%"></div>
                            </div>
                            
                            <div class="flex items-center justify-between text-xs text-gray-500 mb-6 font-medium">
                                <div class="flex items-center"><svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg> 24 Materi</div>
                                <div class="flex items-center"><svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg> 6 Tugas</div>
                                <div class="flex items-center text-gray-700"><svg class="w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> 4.9</div>
                            </div>
                            
                            <button class="w-full bg-[#007cc3] hover:bg-blue-700 text-white font-bold py-3 rounded-full flex items-center justify-center transition mt-auto text-sm">
                                Masuk Kelas <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                        <div class="h-44 bg-blue-50 relative">
                            <!-- Abstract image representation -->
                            <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover" alt="Course Image">
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#007cc3] text-xs font-bold px-4 py-1.5 rounded-full shadow-sm">Komunikasi Bisnis</div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center">
                                    <img src="https://i.pravatar.cc/150?img=44" class="w-10 h-10 rounded-full border border-gray-200 mr-3" alt="Instructor">
                                    <div>
                                        <h4 class="font-bold text-gray-900 text-sm">Sarah Wijaya</h4>
                                        <p class="text-xs text-gray-500">Mentor Senior</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="font-bold text-[#007cc3] text-lg">32%</span>
                                    <p class="text-[10px] text-gray-500 font-medium">Progress</p>
                                </div>
                            </div>
                            
                            <div class="w-full bg-gray-100 rounded-full h-2 mb-6">
                                <div class="bg-[#007cc3] h-2 rounded-full" style="width: 32%"></div>
                            </div>
                            
                            <div class="flex items-center justify-between text-xs text-gray-500 mb-6 font-medium">
                                <div class="flex items-center"><svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg> 18 Materi</div>
                                <div class="flex items-center"><svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg> 3 Tugas</div>
                                <div class="flex items-center text-gray-700"><svg class="w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> 5.0</div>
                            </div>
                            
                            <button class="w-full bg-[#007cc3] hover:bg-blue-700 text-white font-bold py-3 rounded-full flex items-center justify-center transition mt-auto text-sm">
                                Masuk Kelas <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            
            <!-- Right Sidebar (Agenda) -->
            <div class="w-full xl:w-72 flex-shrink-0">
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-gray-900">Agenda Terdekat</h3>
                        <a href="#" class="text-xs text-[#007cc3] font-medium hover:underline">Lihat Semua</a>
                    </div>
                    
                    <div class="space-y-4">
                        <!-- Agenda 1 -->
                        <div class="flex items-start">
                            <div class="bg-gray-100 rounded-xl p-2 w-14 text-center mr-4 flex-shrink-0">
                                <span class="block text-[10px] font-bold text-gray-500 uppercase">Okt</span>
                                <span class="block text-xl font-bold text-gray-900">14</span>
                            </div>
                            <div class="pt-1">
                                <h4 class="text-sm font-bold text-gray-900 leading-tight mb-1">Quiz Matematika 02</h4>
                                <div class="flex items-center text-xs text-gray-500">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    09:00 WIB
                                </div>
                            </div>
                        </div>

                        <!-- Agenda 2 -->
                        <div class="flex items-start">
                            <div class="bg-gray-100 rounded-xl p-2 w-14 text-center mr-4 flex-shrink-0">
                                <span class="block text-[10px] font-bold text-gray-500 uppercase">Okt</span>
                                <span class="block text-xl font-bold text-gray-900">16</span>
                            </div>
                            <div class="pt-1">
                                <h4 class="text-sm font-bold text-gray-900 leading-tight mb-1">Submission Essay Indo</h4>
                                <div class="flex items-center text-xs text-gray-500">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    23:59 WIB
                                </div>
                            </div>
                        </div>

                        <!-- Agenda 3 -->
                        <div class="flex items-start">
                            <div class="bg-gray-100 rounded-xl p-2 w-14 text-center mr-4 flex-shrink-0">
                                <span class="block text-[10px] font-bold text-gray-500 uppercase">Okt</span>
                                <span class="block text-xl font-bold text-gray-900">18</span>
                            </div>
                            <div class="pt-1">
                                <h4 class="text-sm font-bold text-gray-900 leading-tight mb-1">Proyek Sains Akhir</h4>
                                <div class="flex items-center text-xs text-gray-500">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    15:30 WIB
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>

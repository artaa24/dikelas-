<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    <!-- Sidebar -->
    @include('components.sidebar-student', ['active' => ''])

    <!-- Main Content -->
    <main class="flex-1 flex flex-col overflow-hidden">
        
        <!-- Header -->
        <header class="h-20 bg-[#F8FAFC] flex items-center justify-between px-10 flex-shrink-0">
            <!-- Search -->
            <div class="flex-1 max-w-xl">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" class="w-full bg-gray-100 rounded-full py-3 pl-12 pr-4 text-sm focus:outline-none focus:ring-1 focus:ring-[#007cc3]" placeholder="Search for courses, materials, or teachers...">
                </div>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center space-x-6 ml-4">
                <button class="text-gray-400 hover:text-gray-600 relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-0 right-0 block h-2.5 w-2.5 rounded-full bg-red-500 ring-2 ring-white"></span>
                </button>
                <button class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                </button>
                <div class="h-8 w-px bg-gray-200"></div>
                <div class="flex items-center cursor-pointer">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=0D8ABC&color=fff' }}" alt="User Avatar">
                </div>
            </div>
        </header>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-auto px-10 pb-10">
            
            <!-- Welcome Banner -->
            <div class="bg-[#026B9D] rounded-3xl p-10 text-white mb-8 shadow-lg shadow-blue-900/10 relative overflow-hidden">
                <!-- Decoration -->
                <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-white opacity-5 rounded-full"></div>
                
                <h2 class="text-4xl font-bold mb-4 flex items-center relative z-10">
                    Selamat Datang, Budi! <span class="ml-3 text-3xl">👋</span>
                </h2>
                <p class="text-blue-100 text-lg mb-8 max-w-2xl relative z-10">
                    Lanjutkan perjalanan belajarmu hari ini. Kamu sudah menyelesaikan 75% target mingguan!
                </p>
                <button class="bg-white text-[#026B9D] px-6 py-3 rounded-full font-semibold shadow-md hover:bg-gray-50 transition relative z-10">
                    Lanjutkan Belajar
                </button>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                <div class="bg-white rounded-3xl p-6 flex items-center shadow-sm border border-gray-100">
                    <div class="w-14 h-14 rounded-full bg-[#E5F9FC] text-[#02B1CC] flex items-center justify-center mr-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Selesai</p>
                        <h3 class="text-2xl font-bold text-gray-900">12</h3>
                    </div>
                </div>
                
                <div class="bg-white rounded-3xl p-6 flex items-center shadow-sm border border-gray-100">
                    <div class="w-14 h-14 rounded-full bg-[#E8F1FC] text-[#3B82F6] flex items-center justify-center mr-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Tugas Aktif</p>
                        <h3 class="text-2xl font-bold text-gray-900">04</h3>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 flex items-center shadow-sm border border-gray-100">
                    <div class="w-14 h-14 rounded-full bg-[#EBF8F2] text-[#10B981] flex items-center justify-center mr-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">IPK Semester</p>
                        <h3 class="text-2xl font-bold text-gray-900">3.88</h3>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 flex items-center shadow-sm border border-gray-100">
                    <div class="w-14 h-14 rounded-full bg-[#FEF3C7] text-[#D97706] flex items-center justify-center mr-4">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Jam Belajar</p>
                        <h3 class="text-2xl font-bold text-gray-900">42h</h3>
                    </div>
                </div>
            </div>

            <!-- Kursus Aktif -->
            <div class="mb-6 flex justify-between items-end">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Kursus Aktif</h3>
                    <div class="flex space-x-2">
                        <button class="px-5 py-2 rounded-full bg-[#026B9D] text-white text-sm font-medium">Semua</button>
                        <button class="px-5 py-2 rounded-full bg-gray-200 text-gray-600 hover:bg-gray-300 text-sm font-medium transition">Matematika</button>
                        <button class="px-5 py-2 rounded-full bg-gray-200 text-gray-600 hover:bg-gray-300 text-sm font-medium transition">Bahasa</button>
                        <button class="px-5 py-2 rounded-full bg-gray-200 text-gray-600 hover:bg-gray-300 text-sm font-medium transition">Sains</button>
                        <button class="px-5 py-2 rounded-full bg-gray-200 text-gray-600 hover:bg-gray-300 text-sm font-medium transition">Informatika</button>
                    </div>
                </div>
                <a href="#" class="text-[#026B9D] font-medium hover:underline text-sm mb-2">Lihat Semua</a>
            </div>

            <!-- Course Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Card 1 -->
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                    <div class="h-40 bg-gray-800 relative">
                        <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover opacity-80" alt="Course Image">
                        <div class="absolute top-4 left-4 bg-[#026B9D] text-white text-xs font-semibold px-3 py-1.5 rounded-full">Informatika</div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h4 class="text-xl font-bold text-gray-900 mb-1">Database...</h4>
                        <p class="text-sm text-gray-500 mb-6">Bab 1 - Pengenalan Database</p>
                        
                        <div class="flex items-center mb-6">
                            <img src="https://i.pravatar.cc/150?img=12" class="w-8 h-8 rounded-full mr-3" alt="Instructor">
                            <span class="text-sm font-medium text-gray-700">I Made Jannah Nasihuy</span>
                        </div>
                        
                        <div class="mt-auto">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="font-semibold text-gray-700">Progress</span>
                                <span class="font-bold text-gray-900">65%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-6">
                                <div class="bg-[#026B9D] h-2.5 rounded-full" style="width: 65%"></div>
                            </div>
                            
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div class="flex space-x-4 text-xs text-gray-500">
                                    <div class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg> 12 Materi</div>
                                    <div class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg> 4 Tugas</div>
                                </div>
                                <a href="#" class="text-[#026B9D] font-bold text-sm flex items-center hover:text-blue-800">
                                    Masuk Kelas <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                    <div class="h-40 bg-gray-800 relative">
                        <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover opacity-80" alt="Course Image">
                        <div class="absolute top-4 left-4 bg-[#026B9D] text-white text-xs font-semibold px-3 py-1.5 rounded-full">Matematika</div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h4 class="text-xl font-bold text-gray-900 mb-1">Matematika...</h4>
                        <p class="text-sm text-gray-500 mb-6">Bab 4 - Trigonometri Dasar</p>
                        
                        <div class="flex items-center mb-6">
                            <img src="https://i.pravatar.cc/150?img=33" class="w-8 h-8 rounded-full mr-3" alt="Instructor">
                            <span class="text-sm font-medium text-gray-700">Bambang Wijaya, M.Pd</span>
                        </div>
                        
                        <div class="mt-auto">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="font-semibold text-gray-700">Progress</span>
                                <span class="font-bold text-gray-900">25%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-6">
                                <div class="bg-[#026B9D] h-2.5 rounded-full" style="width: 25%"></div>
                            </div>
                            
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div class="flex space-x-4 text-xs text-gray-500">
                                    <div class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg> 24 Materi</div>
                                    <div class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg> 8 Tugas</div>
                                </div>
                                <a href="#" class="text-[#026B9D] font-bold text-sm flex items-center hover:text-blue-800">
                                    Masuk Kelas <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                    <div class="h-40 bg-gray-800 relative">
                        <img src="https://images.unsplash.com/photo-1599946347371-68eb71b16afc?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover opacity-80" alt="Course Image">
                        <div class="absolute top-4 left-4 bg-[#026B9D] text-white text-xs font-semibold px-3 py-1.5 rounded-full">Bahasa</div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h4 class="text-xl font-bold text-gray-900 mb-1">Bahasa Jerman A1</h4>
                        <p class="text-sm text-gray-500 mb-6">Bab 2 - Pengenalan Sejarah</p>
                        
                        <div class="flex items-center mb-6">
                            <img src="https://i.pravatar.cc/150?img=47" class="w-8 h-8 rounded-full mr-3" alt="Instructor">
                            <span class="text-sm font-medium text-gray-700">Hanna Schmidt</span>
                        </div>
                        
                        <div class="mt-auto">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="font-semibold text-gray-700">Progress</span>
                                <span class="font-bold text-gray-900">90%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-6">
                                <div class="bg-[#026B9D] h-2.5 rounded-full" style="width: 90%"></div>
                            </div>
                            
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div class="flex space-x-4 text-xs text-gray-500">
                                    <div class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg> 10 Materi</div>
                                    <div class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg> 2 Tugas</div>
                                </div>
                                <a href="#" class="text-[#026B9D] font-bold text-sm flex items-center hover:text-blue-800">
                                    Masuk Kelas <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>
</html>

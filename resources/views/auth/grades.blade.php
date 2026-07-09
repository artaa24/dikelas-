<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai - DIKELAS</title>
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
                <a href="/courses" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
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

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        <header class="h-20 bg-white flex items-center justify-between px-8 border-b border-gray-100">
            <h2 class="text-xl font-bold text-gray-900">Transkrip Nilai</h2>
            <div class="flex items-center space-x-6 ml-6">
                <a href="/announcements" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </a>
                <div class="h-8 w-px bg-gray-200"></div>
                <a href="/edit-profile" class="flex items-center cursor-pointer">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="https://i.pravatar.cc/150?img=11" alt="User Avatar">
                </a>
            </div>
        </header>

        <div class="flex-1 overflow-auto p-8 max-w-5xl mx-auto w-full">
            
            <div class="bg-[#007cc3] rounded-3xl p-8 text-white mb-8 shadow-md flex justify-between items-center">
                <div>
                    <p class="text-blue-100 text-sm mb-1 uppercase tracking-widest font-bold">IPK Semester Ini</p>
                    <h2 class="text-5xl font-bold">3.92 <span class="text-xl font-normal opacity-75">/ 4.00</span></h2>
                </div>
                <div class="bg-white/20 px-6 py-4 rounded-2xl backdrop-blur-sm text-center">
                    <p class="text-xs font-semibold mb-1 opacity-90">Total SKS</p>
                    <p class="text-2xl font-bold">24</p>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="font-bold text-gray-900 text-lg">Rincian Mata Kuliah</h3>
                    <select class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                        <option>Semester Ganjil 2026</option>
                        <option>Semester Genap 2025</option>
                    </select>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-400 uppercase bg-gray-50/50">
                            <tr>
                                <th scope="col" class="px-6 py-4">Mata Kuliah</th>
                                <th scope="col" class="px-6 py-4">SKS</th>
                                <th scope="col" class="px-6 py-4">Tugas</th>
                                <th scope="col" class="px-6 py-4">UTS</th>
                                <th scope="col" class="px-6 py-4">UAS</th>
                                <th scope="col" class="px-6 py-4">Nilai Akhir</th>
                                <th scope="col" class="px-6 py-4">Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-bold text-gray-900">Matematika Diskrit</td>
                                <td class="px-6 py-4">3</td>
                                <td class="px-6 py-4">90</td>
                                <td class="px-6 py-4">85</td>
                                <td class="px-6 py-4">88</td>
                                <td class="px-6 py-4 font-bold text-[#007cc3]">87.5</td>
                                <td class="px-6 py-4"><span class="bg-green-100 text-green-800 text-xs font-bold px-2.5 py-1 rounded">A</span></td>
                            </tr>
                            <tr class="bg-white border-b border-gray-50 hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-bold text-gray-900">Komunikasi Bisnis</td>
                                <td class="px-6 py-4">2</td>
                                <td class="px-6 py-4">95</td>
                                <td class="px-6 py-4">92</td>
                                <td class="px-6 py-4">-</td>
                                <td class="px-6 py-4 font-bold text-[#007cc3]">-</td>
                                <td class="px-6 py-4"><span class="bg-gray-100 text-gray-800 text-xs font-bold px-2.5 py-1 rounded">TBD</span></td>
                            </tr>
                            <tr class="bg-white hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-bold text-gray-900">Pemrograman Web</td>
                                <td class="px-6 py-4">4</td>
                                <td class="px-6 py-4">100</td>
                                <td class="px-6 py-4">95</td>
                                <td class="px-6 py-4">98</td>
                                <td class="px-6 py-4 font-bold text-[#007cc3]">97.8</td>
                                <td class="px-6 py-4"><span class="bg-green-100 text-green-800 text-xs font-bold px-2.5 py-1 rounded">A+</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </main>
</body>
</html>

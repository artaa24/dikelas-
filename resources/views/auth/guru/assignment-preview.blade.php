<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Tugas - DIKELAS</title>
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
    <aside class="w-64 bg-white border-r border-gray-100 flex flex-col justify-between h-full flex-shrink-0 transition-all duration-300">
        <div>
            <div class="p-8 pb-6">
                <h1 class="text-2xl font-bold text-[#0A4B7D]">DIKELAS</h1>
                <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Teacher Portal</p>
            </div>
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
        <header class="h-20 bg-white flex items-center justify-between px-8 flex-shrink-0 border-b border-gray-100">
            <div class="flex items-center text-sm text-gray-500 font-medium">
                <a href="/guru/assignments" class="hover:text-[#007cc3] transition">Daftar Tugas</a>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="text-gray-900">Preview & Penilaian</span>
            </div>
            <div class="ml-auto flex items-center">
                <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="https://i.pravatar.cc/150?img=32" alt="Teacher Avatar">
            </div>
        </header>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-auto hide-scrollbar flex flex-col xl:flex-row p-4 lg:p-8 gap-8 max-w-[1400px] mx-auto w-full">
            
            <!-- Left Side: Student Submission List -->
            <div class="w-full xl:w-[350px] flex flex-col bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex-shrink-0">
                <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="font-bold text-gray-900 mb-1">Tugas Praktik 1</h3>
                    <p class="text-xs text-gray-500">Daftar Pengumpulan (X IPA 1)</p>
                    
                    <div class="mt-4 flex gap-2">
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">12 Dinilai</span>
                        <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs font-bold">20 Belum</span>
                    </div>
                </div>
                
                <div class="overflow-y-auto hide-scrollbar flex-1 p-2">
                    <!-- Student Item (Active) -->
                    <div class="flex items-center justify-between p-3 bg-blue-50 border border-blue-100 rounded-xl cursor-pointer mb-2">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full object-cover mr-3" src="https://i.pravatar.cc/150?img=11" alt="Student">
                            <div>
                                <p class="font-bold text-[#007cc3] text-sm">Budi Santoso</p>
                                <p class="text-[10px] text-gray-500">Tepat Waktu</p>
                            </div>
                        </div>
                        <span class="text-xs font-bold bg-white text-gray-400 px-2 py-1 rounded-lg border border-gray-200">_ / 100</span>
                    </div>
                    
                    <!-- Student Item -->
                    <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-xl cursor-pointer mb-2 transition">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full object-cover mr-3" src="https://i.pravatar.cc/150?img=5" alt="Student">
                            <div>
                                <p class="font-bold text-gray-700 text-sm">Siti Aminah</p>
                                <p class="text-[10px] text-gray-500">Tepat Waktu</p>
                            </div>
                        </div>
                        <span class="text-xs font-bold bg-green-100 text-green-700 px-2 py-1 rounded-lg border border-green-200">92 / 100</span>
                    </div>

                    <!-- Student Item (Late) -->
                    <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-xl cursor-pointer transition">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full object-cover mr-3" src="https://i.pravatar.cc/150?img=12" alt="Student">
                            <div>
                                <p class="font-bold text-gray-700 text-sm">Ahmad Fauzi</p>
                                <p class="text-[10px] text-red-500 font-medium">Terlambat 2 Jam</p>
                            </div>
                        </div>
                        <span class="text-xs font-bold bg-gray-100 text-gray-400 px-2 py-1 rounded-lg">_ / 100</span>
                    </div>
                </div>
            </div>

            <!-- Right Side: Submission Detail & Grading -->
            <div class="flex-1 flex flex-col gap-6">
                
                <!-- Submission Viewer -->
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 flex-1 flex flex-col">
                    <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
                        <div class="flex items-center gap-4">
                            <img class="h-12 w-12 rounded-full object-cover" src="https://i.pravatar.cc/150?img=11" alt="Student">
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">Budi Santoso</h2>
                                <p class="text-sm text-gray-500">Dikumpulkan: 28 Okt 2026, 14:30 WIB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Attached Files -->
                    <div class="mb-6">
                        <h3 class="text-sm font-bold text-gray-900 mb-3">File Jawaban:</h3>
                        <div class="flex items-center p-4 bg-gray-50 border border-gray-200 rounded-xl max-w-sm hover:bg-gray-100 transition cursor-pointer">
                            <div class="bg-blue-100 text-blue-500 p-3 rounded-lg mr-4">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-bold text-gray-900">Tugas1_BudiSantoso.zip</h4>
                                <p class="text-xs text-gray-500">1.2 MB</p>
                            </div>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-sm font-bold text-gray-900 mb-3">Catatan dari Murid:</h3>
                        <div class="bg-yellow-50 text-yellow-800 p-4 rounded-xl text-sm italic border border-yellow-100">
                            "Maaf pak, saya melampirkan laporan dalam bentuk ZIP karena berisi file kode C++ dan PDF laporannya."
                        </div>
                    </div>
                </div>

                <!-- Grading Panel -->
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-[#007cc3]/30">
                    <h3 class="font-bold text-gray-900 mb-4 text-lg">Beri Penilaian</h3>
                    
                    <form action="/guru/assignments" class="space-y-4">
                        <div class="grid grid-cols-2 gap-6 items-start">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Akhir (Skala 100) <span class="text-red-500">*</span></label>
                                <input type="number" placeholder="0 - 100" class="w-32 text-2xl font-bold text-[#0A4B7D] bg-blue-50 border border-blue-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition text-center">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Feedback Tambahan (Opsional)</label>
                                <textarea rows="3" placeholder="Tulis masukan untuk murid..." class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition"></textarea>
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                            <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-[#007cc3] hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition-all">
                                Simpan Nilai
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>

</body>
</html>

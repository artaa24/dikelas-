<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Murid - DIKELAS</title>
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
                <a href="/guru/assignments" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    Daftar Tugas
                </a>
                <a href="/guru/students" class="flex items-center px-4 py-3 bg-[#9AE6F1] text-[#0A4B7D] rounded-xl font-medium transition-colors">
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
                <a href="/guru/students" class="hover:text-[#007cc3] transition">Anggota</a>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="text-gray-900">Tambah Murid</span>
            </div>
            <div class="flex items-center space-x-6 ml-6">
                <a href="#" class="flex items-center cursor-pointer">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-gray-100 shadow-sm" src="https://i.pravatar.cc/150?img=32" alt="Teacher Avatar">
                </a>
            </div>
        </header>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-auto hide-scrollbar p-8 xl:p-10 max-w-3xl mx-auto w-full">
            
            <div class="mb-8 text-center">
                <div class="w-20 h-20 bg-blue-50 text-[#007cc3] rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Tambah Murid ke Kelas</h2>
                <p class="text-gray-500">Undang murid ke dalam kelas Anda melalui NISN atau Email.</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <form action="/guru/students" class="p-8 space-y-6">
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Kelas Tujuan <span class="text-red-500">*</span></label>
                        <select class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition appearance-none">
                            <option value="" disabled selected>Pilih kelas terlebih dahulu</option>
                            <option value="1">X IPA 1</option>
                            <option value="2">X IPS 2</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pencarian Murid (Berdasarkan NISN/Email) <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input type="text" placeholder="Masukkan Nomor Induk Siswa Nasional atau Email" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 pl-4 pr-12 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition">
                            <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 p-2 bg-[#007cc3] text-white rounded-lg hover:bg-blue-700 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Search Result Mock -->
                    <div class="bg-green-50 border border-green-200 rounded-xl p-4 flex justify-between items-center hidden">
                        <div class="flex items-center">
                            <img class="h-10 w-10 rounded-full object-cover mr-3" src="https://i.pravatar.cc/150?img=12" alt="Student">
                            <div>
                                <p class="font-bold text-gray-900 text-sm">Ahmad Fauzi</p>
                                <p class="text-xs text-green-700">NISN: 1029384821 | Ditemukan</p>
                            </div>
                        </div>
                        <button type="button" class="px-4 py-2 bg-green-600 text-white font-bold rounded-lg text-sm hover:bg-green-700">Tambahkan</button>
                    </div>

                    <div class="relative py-4">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500 font-medium">Atau dengan Kode Kelas</span>
                        </div>
                    </div>

                    <div class="text-center p-6 bg-gray-50 rounded-xl border border-gray-200 border-dashed">
                        <p class="text-sm font-medium text-gray-600 mb-3">Bagikan kode berikut agar murid dapat mendaftar sendiri:</p>
                        <div class="inline-flex items-center justify-center bg-white border border-gray-300 px-6 py-3 rounded-xl font-mono text-2xl font-bold tracking-widest text-[#0A4B7D]">
                            XIPA1-2026
                        </div>
                        <button type="button" class="block mx-auto mt-4 text-sm font-semibold text-[#007cc3] hover:underline">Salin Kode Kelas</button>
                    </div>

                    <!-- Footer Actions -->
                    <div class="flex justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                        <a href="/guru/students" class="px-6 py-3 bg-white border border-gray-200 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition">
                            Kembali
                        </a>
                    </div>

                </form>
            </div>
            
        </div>
    </main>

</body>
</html>

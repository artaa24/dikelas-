<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .dropzone { border: 2px dashed #CBD5E1; transition: all 0.3s ease; }
        .dropzone:hover { border-color: #007cc3; background-color: #F0F9FF; }
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
                <span class="text-gray-900">Buat Tugas Baru</span>
            </div>
            <div class="flex items-center space-x-6 ml-6">
                <a href="#" class="flex items-center cursor-pointer">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-gray-100 shadow-sm" src="https://i.pravatar.cc/150?img=32" alt="Teacher Avatar">
                </a>
            </div>
        </header>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-auto hide-scrollbar p-8 xl:p-10 max-w-5xl mx-auto w-full">
            
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Buat Tugas Baru</h2>
                <p class="text-gray-500">Berikan penugasan kepada murid Anda beserta instruksi dan tenggat waktu.</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <form action="/guru/assignments" class="p-8 flex flex-col gap-8">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Left Col -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Tugas <span class="text-red-500">*</span></label>
                                <input type="text" placeholder="Masukkan judul tugas" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Kelas <span class="text-red-500">*</span></label>
                                <select class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition appearance-none">
                                    <option value="" disabled selected>Pilih kelas yang diberi tugas</option>
                                    <option value="1">X IPA 1</option>
                                    <option value="2">X IPS 2</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Instruksi Tugas <span class="text-red-500">*</span></label>
                                <textarea rows="6" placeholder="Tuliskan instruksi langkah demi langkah..." class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition"></textarea>
                            </div>
                        </div>

                        <!-- Right Col -->
                        <div class="space-y-6">
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tenggat Waktu (Deadline) <span class="text-red-500">*</span></label>
                                    <input type="datetime-local" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Poin Maksimal <span class="text-red-500">*</span></label>
                                    <input type="number" value="100" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">File Lampiran (Opsional)</label>
                                <div class="dropzone rounded-2xl bg-gray-50 flex flex-col items-center justify-center py-8 px-4 text-center cursor-pointer group">
                                    <div class="w-12 h-12 bg-blue-100 text-[#007cc3] rounded-full flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                    </div>
                                    <p class="font-semibold text-gray-700 text-sm mb-1">Lampirkan File Rujukan</p>
                                    <span class="text-xs text-gray-400">PDF, Word, Excel, atau ZIP</span>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3 bg-gray-50 p-4 rounded-xl border border-gray-200">
                                <label class="relative inline-flex items-center cursor-pointer">
                                  <input type="checkbox" value="" class="sr-only peer" checked>
                                  <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#007cc3]"></div>
                                </label>
                                <div>
                                    <span class="text-sm font-bold text-gray-900 block">Kirim Notifikasi</span>
                                    <span class="text-xs text-gray-500">Beritahu murid melalui Lonceng dan Email</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Actions -->
                    <div class="flex justify-end gap-4 mt-4 pt-6 border-t border-gray-100">
                        <a href="/guru/assignments" class="px-6 py-3 bg-white border border-gray-200 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition">
                            Batal
                        </a>
                        <button type="submit" class="px-8 py-3 bg-[#007cc3] hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition-all flex items-center">
                            Publikasikan Tugas
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        </button>
                    </div>

                </form>
            </div>
            
        </div>
    </main>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Materi - DIKELAS</title>
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
                <a href="/guru/materials" class="flex items-center px-4 py-3 bg-[#9AE6F1] text-[#0A4B7D] rounded-xl font-medium transition-colors">
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
                <a href="/guru/materials" class="hover:text-[#007cc3] transition">Manajemen Materi</a>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="text-gray-900">Tambah Materi Baru</span>
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
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Tambah Materi Baru</h2>
                <p class="text-gray-500">Unggah dokumen atau video pembelajaran untuk dipelajari oleh murid Anda.</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <form action="/guru/materials" class="p-8 flex flex-col gap-8">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Left Col -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Materi <span class="text-red-500">*</span></label>
                                <input type="text" placeholder="Masukkan judul materi" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Kelas <span class="text-red-500">*</span></label>
                                <select class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition appearance-none">
                                    <option value="" disabled selected>Pilih kelas tujuan</option>
                                    <option value="1">X IPA 1</option>
                                    <option value="2">X IPS 2</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Materi</label>
                                <textarea rows="4" placeholder="Tuliskan deskripsi atau instruksi singkat materi ini..." class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition"></textarea>
                            </div>
                        </div>

                        <!-- Right Col -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Upload File Materi <span class="text-red-500">*</span></label>
                                <div class="dropzone rounded-2xl bg-gray-50 flex flex-col items-center justify-center py-10 px-4 text-center cursor-pointer group">
                                    <div class="w-16 h-16 bg-blue-100 text-[#007cc3] rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    </div>
                                    <p class="font-bold text-gray-700 mb-1">Tarik & Lepas file Anda ke sini</p>
                                    <p class="text-sm text-gray-500 mb-4">atau klik untuk menelusuri komputer</p>
                                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Maks. File 50MB (PDF, MP4, PPTX)</span>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3">
                                <label class="relative inline-flex items-center cursor-pointer">
                                  <input type="checkbox" value="" class="sr-only peer" checked>
                                  <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#007cc3]"></div>
                                </label>
                                <span class="text-sm font-semibold text-gray-700">Langsung Publikasikan</span>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Actions -->
                    <div class="flex justify-end gap-4 mt-4 pt-6 border-t border-gray-100">
                        <a href="/guru/materials" class="px-6 py-3 bg-white border border-gray-200 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition">
                            Batal
                        </a>
                        <button type="submit" class="px-8 py-3 bg-[#007cc3] hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition-all flex items-center">
                            Simpan & Unggah
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </button>
                    </div>

                </form>
            </div>
            
        </div>
    </main>

</body>
</html>

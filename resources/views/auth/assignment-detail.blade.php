<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        /* Custom drag & drop area styling */
        .dropzone { border: 2px dashed #CBD5E1; transition: all 0.3s ease; }
        .dropzone:hover, .dropzone.active { border-color: #007cc3; background-color: #F0F9FF; }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    <!-- Left Sidebar (Collapsed for focus mode) -->
    <aside class="w-20 lg:w-64 bg-white border-r border-gray-100 flex flex-col justify-between h-full flex-shrink-0 transition-all duration-300">
        <div>
            <div class="p-4 lg:p-8 pb-6 flex justify-center lg:justify-start">
                <h1 class="text-2xl font-bold text-[#0A4B7D] hidden lg:block">DIKELAS</h1>
                <div class="lg:hidden w-10 h-10 bg-[#0A4B7D] text-white rounded-xl flex items-center justify-center font-bold text-xl">D</div>
            </div>
            <nav class="px-3 lg:px-4 space-y-2">
                <a href="/dashboard" class="flex items-center justify-center lg:justify-start px-3 lg:px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors group" title="Dashboard">
                    <svg class="w-6 h-6 lg:w-5 lg:h-5 lg:mr-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="hidden lg:block">Dashboard</span>
                </a>
                <a href="/courses" class="flex items-center justify-center lg:justify-start px-3 lg:px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors group" title="Kursus Saya">
                    <svg class="w-6 h-6 lg:w-5 lg:h-5 lg:mr-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <span class="hidden lg:block">Kursus Saya</span>
                </a>
                <a href="/schedule" class="flex items-center justify-center lg:justify-start px-3 lg:px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors group" title="Jadwal">
                    <svg class="w-6 h-6 lg:w-5 lg:h-5 lg:mr-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span class="hidden lg:block">Jadwal</span>
                </a>
                <a href="/assignments" class="flex items-center justify-center lg:justify-start px-3 lg:px-4 py-3 bg-[#9AE6F1] text-[#0A4B7D] rounded-xl font-medium transition-colors group" title="Tugasku">
                    <svg class="w-6 h-6 lg:w-5 lg:h-5 lg:mr-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    <span class="hidden lg:block">Tugasku</span>
                </a>
                <a href="/profile" class="flex items-center justify-center lg:justify-start px-3 lg:px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors group" title="Pengaturan">
                    <svg class="w-6 h-6 lg:w-5 lg:h-5 lg:mr-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span class="hidden lg:block">Pengaturan</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <!-- Header -->
        <header class="h-20 bg-white flex items-center px-8 flex-shrink-0 border-b border-gray-100">
            <div class="flex items-center text-sm text-gray-500 font-medium">
                <a href="/assignments" class="hover:text-[#007cc3] transition">Tugasku</a>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <a href="/class-detail" class="hover:text-[#007cc3] transition">Algoritma & Pemrograman Dasar</a>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="text-gray-900">Tugas Praktik 1</span>
            </div>
            <div class="ml-auto flex items-center">
                <a href="/profile">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="https://i.pravatar.cc/150?img=11" alt="User Avatar">
                </a>
            </div>
        </header>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-auto hide-scrollbar flex flex-col xl:flex-row p-4 lg:p-8 gap-8 max-w-7xl mx-auto w-full">
            
            <!-- Left Side: Assignment Brief -->
            <div class="flex-1 bg-white rounded-3xl p-8 shadow-sm border border-gray-100 flex flex-col">
                
                <div class="flex justify-between items-start mb-6 border-b border-gray-100 pb-6">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider flex items-center">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> Mendesak
                            </span>
                            <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Tugas Individu</span>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Tugas Praktik 1: Implementasi Array Multi-dimensi</h2>
                        <p class="text-gray-500 font-medium">Oleh: Prof. Dr. Agus, S.Kom., M.T.</p>
                    </div>
                    
                    <div class="text-right">
                        <p class="text-sm text-gray-500 mb-1">Tenggat Waktu (Deadline)</p>
                        <p class="text-xl font-bold text-red-600">Hari Ini, 23:59 WIB</p>
                        <p class="text-xs font-bold text-gray-400 mt-2">NILAI MAX: 100</p>
                    </div>
                </div>

                <!-- Instructions Content -->
                <div class="prose prose-blue max-w-none text-gray-600 flex-1">
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Instruksi Tugas</h3>
                    <p class="mb-4">Buatlah sebuah program sederhana menggunakan bahasa pemrograman C++ yang mengimplementasikan array 2 dimensi. Program tersebut harus mampu:</p>
                    <ol class="list-decimal pl-5 mb-6 space-y-2">
                        <li>Menerima input dimensi matriks dari *user* (minimal 2x2, maksimal 5x5).</li>
                        <li>Meminta *user* untuk memasukkan nilai *integer* ke dalam setiap elemen matriks.</li>
                        <li>Menampilkan matriks hasil input ke layar dalam bentuk baris dan kolom yang rapi.</li>
                        <li>Menghitung dan menampilkan total jumlahan seluruh elemen matriks tersebut.</li>
                    </ol>

                    <h3 class="text-lg font-bold text-gray-900 mb-3">Ketentuan Pengumpulan</h3>
                    <ul class="list-disc pl-5 mb-6 space-y-2">
                        <li>File kode sumber (`.cpp`) wajib dikumpulkan.</li>
                        <li>Buatlah laporan singkat dalam format PDF (maksimal 2 halaman) yang berisi *screenshot* kode, *screenshot* *output* program saat dijalankan, dan penjelasan singkat alur program.</li>
                        <li>Jadikan kedua file tersebut ke dalam satu file berformat `.zip` atau `.rar` dengan format penamaan: `Tugas1_NIM_NamaLengkap.zip`.</li>
                    </ul>

                    <!-- Attached Files from Teacher -->
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Lampiran Tambahan</h3>
                    <div class="flex items-center p-4 bg-gray-50 border border-gray-200 rounded-xl max-w-sm mb-6 hover:bg-gray-100 transition cursor-pointer">
                        <div class="bg-red-100 text-red-500 p-3 rounded-lg mr-4">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-sm font-bold text-gray-900">Format Laporan Praktik.pdf</h4>
                            <p class="text-xs text-gray-500">245 KB</p>
                        </div>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    </div>
                </div>

            </div>

            <!-- Right Side: Submission Area -->
            <div class="w-full xl:w-96 flex flex-col gap-6">
                <!-- Status Card -->
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                    <h3 class="font-bold text-gray-900 mb-4 text-lg border-b border-gray-100 pb-3">Status Pengumpulan</h3>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Status Tugas</span>
                            <span class="font-bold text-red-600 bg-red-50 px-2 py-1 rounded">Belum Dikumpulkan</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Status Nilai</span>
                            <span class="font-medium text-gray-700 bg-gray-100 px-2 py-1 rounded">Belum Dinilai</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Sisa Waktu</span>
                            <span class="font-bold text-red-600">14 Jam 03 Menit</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Terakhir Diubah</span>
                            <span class="font-medium text-gray-700">-</span>
                        </div>
                    </div>
                </div>

                <!-- Upload Card -->
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-[#007cc3]/30">
                    <h3 class="font-bold text-gray-900 mb-4 text-lg">Kumpulkan Tugas Anda</h3>
                    
                    <div class="dropzone rounded-2xl bg-gray-50 flex flex-col items-center justify-center py-10 px-4 text-center cursor-pointer mb-6 group">
                        <div class="w-16 h-16 bg-blue-100 text-[#007cc3] rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        </div>
                        <p class="font-bold text-gray-700 mb-1">Tarik & Lepas file Anda ke sini</p>
                        <p class="text-sm text-gray-500 mb-4">atau klik untuk menelusuri komputer</p>
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Maks. File 10MB (.zip, .rar)</span>
                    </div>

                    <button class="w-full bg-[#007cc3] hover:bg-blue-700 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-blue-500/30 transition-all flex justify-center items-center">
                        Upload & Kumpulkan
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    </button>
                    <p class="text-center text-xs text-gray-400 mt-3 font-medium">Pastikan file sudah benar sebelum mengklik kumpulkan.</p>
                </div>
            </div>

        </div>
    </main>

</body>
</html>

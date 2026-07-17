<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Bantuan - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    <!-- Sidebar -->
    @if(auth()->user()->isAdmin())
        @include('components.sidebar-admin', ['active' => ''])
    @elseif(auth()->user()->isTeacher())
        @include('components.sidebar-guru', ['active' => ''])
    @else
        @include('components.sidebar-student', ['active' => ''])
    @endif

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-full overflow-hidden bg-white">
        
        <!-- Header -->
        <header class="h-48 bg-gradient-to-r from-[#0A4B7D] to-[#007cc3] flex-shrink-0 flex items-center justify-center relative overflow-hidden">
            <!-- Decorative Circles -->
            <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-white opacity-10"></div>
            <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-48 h-48 rounded-full bg-[#9AE6F1] opacity-20"></div>
            
            <div class="relative z-10 text-center px-8 w-full max-w-3xl">
                <h2 class="text-3xl font-bold text-white mb-4">Halo, apa yang bisa kami bantu?</h2>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-5">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" class="w-full bg-white rounded-full py-4 pl-14 pr-4 text-sm focus:outline-none focus:ring-4 focus:ring-white/30 shadow-lg" placeholder="Cari topik bantuan (contoh: cara kumpul tugas, lupa password)...">
                </div>
            </div>
        </header>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-auto hide-scrollbar p-8 xl:p-12 max-w-5xl mx-auto w-full">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <!-- Card 1 -->
                <div class="border border-gray-200 rounded-3xl p-6 hover:shadow-lg transition cursor-pointer group">
                    <div class="w-12 h-12 bg-blue-50 text-[#007cc3] rounded-xl flex items-center justify-center mb-4 group-hover:bg-[#007cc3] group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg mb-2">Lupa Password</h3>
                    <p class="text-sm text-gray-500">Cara mereset password akun yang terhubung dengan sekolah.</p>
                </div>
                <!-- Card 2 -->
                <div class="border border-gray-200 rounded-3xl p-6 hover:shadow-lg transition cursor-pointer group">
                    <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center mb-4 group-hover:bg-green-500 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg mb-2">Pengumpulan Tugas</h3>
                    <p class="text-sm text-gray-500">Panduan lengkap mengunggah file dan melampirkan tugas.</p>
                </div>
                <!-- Card 3 -->
                <div class="border border-gray-200 rounded-3xl p-6 hover:shadow-lg transition cursor-pointer group">
                    <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center mb-4 group-hover:bg-purple-500 group-hover:text-white transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg mb-2">Kode Kelas Invalid</h3>
                    <p class="text-sm text-gray-500">Kenapa kode kelas tidak berfungsi dan cara mengatasinya.</p>
                </div>
            </div>

            <!-- FAQ Section -->
            <h3 class="font-bold text-2xl text-gray-900 mb-6">Pertanyaan yang Sering Diajukan (FAQ)</h3>
            
            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="border border-gray-200 rounded-2xl p-6">
                    <h4 class="font-bold text-gray-900 text-lg mb-2">Apakah saya bisa mengubah NISN saya?</h4>
                    <p class="text-sm text-gray-600 leading-relaxed">Tidak. NISN adalah nomor identifikasi unik dari pemerintah yang diinput oleh administrator sekolah. Jika ada kesalahan pada NISN Anda, silakan hubungi Tata Usaha sekolah untuk melakukan koreksi di sistem pusat.</p>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="border border-gray-200 rounded-2xl p-6">
                    <h4 class="font-bold text-gray-900 text-lg mb-2">Bagaimana cara melihat nilai tugas yang sudah diperiksa?</h4>
                    <p class="text-sm text-gray-600 leading-relaxed">Nilai akan otomatis muncul pada menu "Tugasku" atau "Nilai" di panel navigasi sebelah kiri Anda. Jika nilai belum muncul, kemungkinan Guru pengampu belum menyelesaikan proses penilaian (grading).</p>
                </div>

                <!-- FAQ Item 3 -->
                <div class="border border-gray-200 rounded-2xl p-6">
                    <h4 class="font-bold text-gray-900 text-lg mb-2">Kenapa saya tidak bisa upload file tugas lebih dari 50MB?</h4>
                    <p class="text-sm text-gray-600 leading-relaxed">Untuk menjaga performa server, DIKELAS membatasi ukuran file maksimal 50MB per unggahan. Jika file Anda (seperti video) melebihi batas tersebut, disarankan mengunggahnya ke Google Drive atau YouTube, lalu kirimkan link (tautan) pada kolom deskripsi tugas.</p>
                </div>
            </div>

            <!-- Contact Support -->
            <div class="mt-12 bg-gray-50 rounded-3xl p-8 text-center border border-gray-200">
                <h3 class="font-bold text-xl text-gray-900 mb-2">Masih Butuh Bantuan?</h3>
                <p class="text-sm text-gray-500 mb-6">Tim dukungan IT sekolah siap membantu Anda memecahkan kendala teknis.</p>
                <div class="flex justify-center gap-4">
                    <a href="#" class="px-6 py-3 bg-[#007cc3] text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition">Hubungi via WhatsApp</a>
                    <a href="mailto:support@dikelas.com" class="px-6 py-3 bg-white border border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-100 transition">Kirim Email</a>
                </div>
            </div>
            
        </div>
    </main>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Pembelajaran - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    <!-- Left Sidebar (Collapsed style for learning mode) -->
    <aside class="w-20 bg-white border-r border-gray-100 flex flex-col items-center py-8 h-full flex-shrink-0">
        <a href="/dashboard" class="mb-8 font-bold text-[#0A4B7D] text-xl">DK</a>
        
        <nav class="flex flex-col space-y-4 w-full px-3">
            <a href="/dashboard" class="flex items-center justify-center p-3 text-gray-400 hover:bg-gray-50 hover:text-[#0A4B7D] rounded-xl transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            </a>
            <a href="/courses" class="flex items-center justify-center p-3 bg-[#9AE6F1] text-[#0A4B7D] rounded-xl transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </a>
            <a href="/assignments" class="flex items-center justify-center p-3 text-gray-400 hover:bg-gray-50 hover:text-[#0A4B7D] rounded-xl transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            </a>
        </nav>
        
        <div class="mt-auto flex flex-col w-full px-3">
            <a href="/login" class="flex items-center justify-center p-3 text-gray-400 hover:text-red-500 rounded-xl transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        <!-- Header Top -->
        <header class="h-16 bg-white flex items-center justify-between px-6 border-b border-gray-100 flex-shrink-0">
            <div class="flex items-center">
                <a href="/class-detail" class="text-gray-400 hover:text-gray-900 mr-4 transition flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    <span class="text-sm font-semibold">Kembali ke Kelas</span>
                </a>
                <div class="h-6 w-px bg-gray-200 mx-4"></div>
                <h2 class="text-sm font-bold text-gray-900">Bab 4 - Trigonometri Dasar: Sinus & Cosinus</h2>
            </div>
            
            <div class="flex items-center space-x-4">
                <button class="bg-[#E5F9FC] text-[#02B1CC] px-4 py-1.5 rounded-full text-xs font-bold shadow-sm">
                    Tandai Selesai
                </button>
            </div>
        </header>

        <!-- Video & Content Area -->
        <div class="flex-1 overflow-auto bg-gray-900 flex flex-col">
            <!-- Video Player Placeholder -->
            <div class="w-full max-w-5xl mx-auto flex-1 flex flex-col justify-center items-center p-8 relative">
                <div class="w-full aspect-video bg-black rounded-xl overflow-hidden shadow-2xl relative border border-gray-800">
                    <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80" class="w-full h-full object-cover opacity-50" alt="Video Thumbnail">
                    <!-- Play Button -->
                    <button class="absolute inset-0 m-auto w-20 h-20 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center transition cursor-pointer">
                        <svg class="w-10 h-10 text-white ml-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path></svg>
                    </button>
                    <!-- Controls bar (Fake) -->
                    <div class="absolute bottom-0 w-full h-12 bg-gradient-to-t from-black/80 to-transparent flex items-center px-4">
                        <div class="w-full flex items-center text-white text-xs space-x-4">
                            <span>▶</span>
                            <span>04:12 / 15:30</span>
                            <div class="flex-1 bg-white/30 h-1 rounded-full overflow-hidden">
                                <div class="bg-blue-500 w-1/4 h-full"></div>
                            </div>
                            <span>⚙️</span>
                            <span>⛶</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Description Below Video -->
            <div class="bg-white rounded-t-3xl min-h-[40vh] p-8 lg:p-12 shadow-[0_-10px_40px_rgba(0,0,0,0.1)]">
                <div class="max-w-4xl mx-auto">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">Trigonometri Dasar: Sinus & Cosinus</h1>
                            <p class="text-gray-500 text-sm">Oleh Bambang Wijaya, M.Pd • Diperbarui 2 hari yang lalu</p>
                        </div>
                        <a href="/assignment-detail" class="bg-[#007cc3] text-white px-5 py-2.5 rounded-full text-sm font-bold shadow-md hover:bg-blue-700 transition">
                            Lanjut ke Latihan
                        </a>
                    </div>
                    
                    <hr class="border-gray-100 my-6">

                    <div class="prose max-w-none text-gray-600 leading-relaxed">
                        <p class="mb-4">Pada materi ini kita akan mempelajari konsep dasar dari Sinus (sin) dan Cosinus (cos) dalam segitiga siku-siku. Pastikan Anda mencatat rumus-rumus penting yang ada di dalam video.</p>
                        
                        <h4 class="text-lg font-bold text-gray-900 mt-6 mb-2">Objektif Pembelajaran:</h4>
                        <ul class="list-disc pl-5 space-y-2 mb-6">
                            <li>Memahami perbandingan trigonometri pada segitiga siku-siku.</li>
                            <li>Menghitung nilai sin dan cos pada sudut istimewa.</li>
                            <li>Mengaplikasikan rumus dalam soal cerita sederhana.</li>
                        </ul>

                        <div class="bg-blue-50 p-6 rounded-2xl border border-blue-100 flex items-start">
                            <svg class="w-6 h-6 text-blue-500 mr-4 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm mb-1">Bahan Bacaan Tambahan</h4>
                                <a href="#" class="text-[#007cc3] text-sm hover:underline font-medium">Download PDF Modul Bab 4 (2.5 MB)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

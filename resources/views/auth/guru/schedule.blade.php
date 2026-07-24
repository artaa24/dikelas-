   <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Akademik - Guru DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    <!-- Left Sidebar -->
    @include('components.sidebar-guru', ['active' => 'schedule'])

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <header class="h-20 bg-white flex items-center justify-between px-8 border-b border-gray-100 flex-shrink-0">
            <h2 class="text-2xl font-bold text-gray-900">Jadwal Pengajaran (Tenggat Waktu)</h2>
        </header>

        <div class="flex-1 overflow-auto hide-scrollbar p-8">
            <div class="max-w-5xl mx-auto">
                
                <h3 class="text-xl font-bold text-gray-900 mb-6">Tenggat Waktu Mendatang</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Assignments -->
                    @forelse($assignments as $assignment)
                        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 relative overflow-hidden group hover:border-[#007cc3] transition">
                            <div class="absolute top-0 right-0 bg-[#007cc3] text-white px-3 py-1 rounded-bl-xl text-xs font-bold flex items-center">
                                Tugas
                            </div>
                            <div class="w-12 h-12 bg-blue-50 text-[#007cc3] rounded-2xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            </div>
                            <h4 class="font-bold text-gray-900 text-lg line-clamp-1 mb-1">{{ $assignment->title }}</h4>
                            <p class="text-sm text-gray-500 mb-4">{{ $assignment->classroom->name }}</p>
                            
                            <div class="flex items-center text-sm font-semibold text-red-500 bg-red-50 p-3 rounded-xl mb-4">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ \Carbon\Carbon::parse($assignment->deadline_at)->format('d M Y, H:i') }}
                            </div>
                            
                            <a href="/guru/assignments" class="block text-center w-full bg-gray-50 text-gray-700 hover:bg-[#007cc3] hover:text-white font-medium py-2.5 rounded-xl transition">
                                Pantau Progress
                            </a>
                        </div>
                    @empty
                    @endforelse

                    <!-- Quizzes -->
                    @forelse($quizzes as $quiz)
                        <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 relative overflow-hidden group hover:border-purple-500 transition">
                            <div class="absolute top-0 right-0 bg-purple-500 text-white px-3 py-1 rounded-bl-xl text-xs font-bold flex items-center">
                                Kuis
                            </div>
                            <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h4 class="font-bold text-gray-900 text-lg line-clamp-1 mb-1">{{ $quiz->title }}</h4>
                            <p class="text-sm text-gray-500 mb-4">{{ $quiz->classroom->name }}</p>
                            
                            <div class="flex items-center text-sm font-semibold text-gray-600 bg-gray-50 p-3 rounded-xl mb-4">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                Durasi: {{ $quiz->duration_minutes }} Menit
                            </div>
                            
                            <a href="{{ route('guru.quizzes.show', $quiz->id) }}" class="block text-center w-full bg-gray-50 text-gray-700 hover:bg-purple-600 hover:text-white font-medium py-2.5 rounded-xl transition">
                                Kelola Kuis
                            </a>
                        </div>
                    @empty
                    @endforelse

                    @if(count($assignments) == 0 && count($quizzes) == 0)
                        <div class="col-span-full bg-white rounded-3xl p-12 text-center border border-gray-100 shadow-sm">
                            <div class="w-20 h-20 bg-gray-50 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Tidak Ada Jadwal Mendesak</h3>
                            <p class="text-gray-500">Bagus! Belum ada tugas atau kuis yang Anda jadwalkan dalam waktu dekat.</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </main>
</body>
</html>

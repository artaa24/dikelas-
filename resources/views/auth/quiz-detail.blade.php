<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kuis - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <header class="h-20 bg-white flex items-center px-8 border-b border-gray-100">
            <div class="flex items-center text-sm text-gray-500 font-medium">
                <a href="{{ route('classrooms.show', $quiz->classroom_id) }}" class="hover:text-[#007cc3] transition flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke {{ $quiz->classroom->name }}
                </a>
            </div>
        </header>

        <div class="flex-1 overflow-auto hide-scrollbar p-8 flex items-center justify-center">
            
            <div class="w-full max-w-2xl bg-white rounded-3xl shadow-sm border border-gray-100 p-8 text-center">
                <div class="w-20 h-20 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                
                <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $quiz->title }}</h2>
                <p class="text-gray-500 mb-8">{{ $quiz->description }}</p>

                @php
                    $questionCount = $quiz->questions()->count();
                @endphp
                <div class="flex justify-center gap-6 mb-8 border-y border-gray-100 py-6">
                    <div class="text-center">
                        <p class="text-xs text-gray-400 font-bold uppercase mb-1">Durasi</p>
                        <p class="text-xl font-bold text-gray-900">{{ $quiz->duration_minutes }} Menit</p>
                    </div>
                    <div class="w-px bg-gray-200"></div>
                    <div class="text-center">
                        <p class="text-xs text-gray-400 font-bold uppercase mb-1">Jumlah Soal</p>
                        <p class="text-xl font-bold text-gray-900">{{ $questionCount }}</p>
                    </div>
                    <div class="w-px bg-gray-200"></div>
                    <div class="text-center">
                        <p class="text-xs text-gray-400 font-bold uppercase mb-1">Nilai Maksimal</p>
                        <p class="text-xl font-bold text-gray-900">{{ $quiz->max_score }}</p>
                    </div>
                </div>

                @if($attempt && $attempt->status == 'completed')
                    <div class="bg-green-50 border border-green-200 rounded-2xl p-6 mb-6">
                        <h3 class="text-lg font-bold text-green-900 mb-2">Kuis Selesai!</h3>
                        <p class="text-green-700 mb-4">Anda telah menyelesaikan kuis ini pada {{ \Carbon\Carbon::parse($attempt->finished_at)->format('d M Y, H:i') }}.</p>
                        <div class="text-4xl font-black text-green-600">{{ $attempt->total_score }}</div>
                        <p class="text-sm font-bold text-green-700/60 mt-1 uppercase">Nilai Anda</p>
                    </div>
                @else
                    @if($questionCount > 0)
                        <form action="{{ route('quizzes.attempt.start', $quiz->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full sm:w-auto bg-[#007cc3] hover:bg-blue-700 text-white font-bold py-4 px-12 rounded-xl shadow-lg shadow-blue-500/30 transition-all text-lg">
                                Mulai Kerjakan Kuis
                            </button>
                        </form>
                        <p class="text-xs text-gray-400 mt-4">*Pastikan koneksi internet Anda stabil sebelum memulai.</p>
                    @else
                        <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-6">
                            <div class="flex items-center justify-center mb-3">
                                <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path></svg>
                            </div>
                            <h3 class="text-lg font-bold text-yellow-800 mb-1">Kuis Belum Tersedia</h3>
                            <p class="text-sm text-yellow-700">Guru belum menambahkan soal untuk kuis ini. Silakan coba lagi nanti.</p>
                        </div>
                    @endif
                @endif
            </div>

        </div>
    </main>

</body>
</html>

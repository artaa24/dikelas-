<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mengerjakan Kuis - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-50 flex flex-col h-screen overflow-hidden text-gray-800">

    <header class="h-16 bg-white flex items-center justify-between px-8 border-b border-gray-100 flex-shrink-0 shadow-sm z-10">
        <div class="flex items-center">
            <div class="bg-purple-100 text-purple-600 p-2 rounded-lg mr-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h1 class="font-bold text-gray-900">{{ $quiz->title }}</h1>
        </div>
        <div class="flex items-center gap-4">
            <div class="bg-red-50 text-red-600 border border-red-200 px-4 py-1.5 rounded-full font-mono font-bold flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span id="countdown">00:00:00</span>
            </div>
        </div>
    </header>

    <main class="flex-1 overflow-auto p-4 md:p-8 flex justify-center">
        
        <div class="w-full max-w-4xl">
            <form id="quizForm" action="{{ route('quizzes.attempt.submit', $attempt->id) }}" method="POST">
                @csrf
                
                <div class="space-y-6 mb-8">
                    @forelse($quiz->questions as $index => $question)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                            <div class="flex items-start gap-4 mb-4">
                                <div class="bg-[#007cc3] text-white w-8 h-8 rounded-full flex items-center justify-center font-bold flex-shrink-0">
                                    {{ $index + 1 }}
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 text-lg leading-relaxed">{{ $question->content }}</h3>
                                    <p class="text-xs text-gray-400 font-bold mt-1">{{ $question->points }} Poin</p>
                                </div>
                            </div>

                            @if($question->type == 'multiple_choice')
                                <div class="pl-12 space-y-3">
                                    @foreach($question->options as $option)
                                        <label class="flex items-center p-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition peer-checked:border-[#007cc3] peer-checked:bg-blue-50">
                                            <input type="radio" name="q_{{ $question->id }}" value="{{ $option->id }}" class="w-5 h-5 text-[#007cc3] mr-4 cursor-pointer">
                                            <span class="font-medium text-gray-700">{{ $option->label }}. {{ $option->content }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 text-center text-gray-500">
                            Tidak ada pertanyaan dalam kuis ini.
                        </div>
                    @endforelse
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 flex justify-between items-center sticky bottom-8">
                    <p class="text-sm text-gray-500">Pastikan semua jawaban terisi sebelum menyimpan.</p>
                    <button type="button" onclick="confirmSubmit(event)" class="bg-[#007cc3] hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl shadow-md transition">
                        Selesaikan Kuis
                    </button>
                </div>
            </form>
        </div>

    </main>

    @php
        // Kalkulasi waktu tersisa
        $startTime = \Carbon\Carbon::parse($attempt->started_at);
        $endTime = $startTime->copy()->addMinutes($quiz->duration_minutes);
        $secondsLeft = now()->diffInSeconds($endTime, false);
        if ($secondsLeft < 0) $secondsLeft = 0;
    @endphp

    <script>
        let timeLeft = {{ $secondsLeft }};
        const countdownEl = document.getElementById('countdown');
        const quizForm = document.getElementById('quizForm');

        function updateTimer() {
            if (timeLeft <= 0) {
                countdownEl.innerText = "WAKTU HABIS";
                // Auto submit when time is up
                quizForm.submit();
                return;
            }

            const h = Math.floor(timeLeft / 3600);
            const m = Math.floor((timeLeft % 3600) / 60);
            const s = timeLeft % 60;

            countdownEl.innerText = 
                (h < 10 ? "0" + h : h) + ":" + 
                (m < 10 ? "0" + m : m) + ":" + 
                (s < 10 ? "0" + s : s);
            
            if(timeLeft < 300) {
                countdownEl.parentElement.classList.add('animate-pulse', 'bg-red-100');
            }

            timeLeft--;
        }

        setInterval(updateTimer, 1000);
        updateTimer();

        function confirmSubmit(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Selesai Mengerjakan?',
                text: 'Apakah Anda yakin ingin menyelesaikan kuis ini? Jawaban tidak dapat diubah lagi.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#007cc3',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Selesaikan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    quizForm.submit();
                }
            });
        }
    </script>
</body>
</html>

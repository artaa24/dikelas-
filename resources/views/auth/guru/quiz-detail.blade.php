<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kuis - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    <!-- Sidebar and Navigation -->
    @if(auth()->user()->isAdmin())
        @include('components.sidebar-admin', ['active' => ''])
    @elseif(auth()->user()->isTeacher())
        @include('components.sidebar-guru', ['active' => ''])
    @else
        @include('components.sidebar-student', ['active' => ''])
    @endif

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <header class="h-20 bg-white flex items-center px-8 border-b border-gray-100">
            <div class="flex items-center text-sm text-gray-500 font-medium">
                <a href="{{ route('classrooms.show', $quiz->classroom_id) }}" class="hover:text-[#007cc3] transition">{{ $quiz->classroom->name }}</a>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="text-gray-900 font-semibold">{{ $quiz->title }}</span>
            </div>
        </header>

        <div class="flex-1 overflow-auto hide-scrollbar p-8">
            
            @if(session('success'))
            <div class="mb-6 bg-green-50 text-green-700 border border-green-200 rounded-xl p-4 text-sm font-medium">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="mb-6 bg-red-50 text-red-600 border border-red-200 rounded-xl p-4 text-sm font-medium">
                {{ session('error') }}
            </div>
            @endif

            <div class="flex justify-between items-start mb-8 border-b border-gray-100 pb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $quiz->title }}</h2>
                    <p class="text-gray-500">{{ $quiz->description }}</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="bg-gray-100 px-4 py-2 rounded-xl text-center">
                        <p class="text-xs text-gray-500 font-bold uppercase">Durasi</p>
                        <p class="text-lg font-bold text-gray-900">{{ $quiz->duration_minutes }} Mnt</p>
                    </div>
                    <div class="bg-blue-50 px-4 py-2 rounded-xl text-center">
                        <p class="text-xs text-blue-500 font-bold uppercase">Nilai Max</p>
                        <p class="text-lg font-bold text-[#007cc3]">{{ $quiz->max_score }}</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Kiri: Daftar Soal -->
                <div class="flex-1 space-y-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-gray-900">Daftar Pertanyaan ({{ $quiz->questions->count() }})</h3>
                        <div class="flex items-center gap-2">
                            <!-- Import Button -->
                            <button onclick="document.getElementById('importModal').classList.remove('hidden')" class="bg-green-50 text-green-700 hover:bg-green-100 font-bold py-2 px-4 rounded-xl text-sm transition flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                Import
                            </button>
                            <!-- Export Button -->
                            @if($quiz->questions->count() > 0)
                            <a href="{{ route('guru.quizzes.export', $quiz->id) }}" class="bg-purple-50 text-purple-700 hover:bg-purple-100 font-bold py-2 px-4 rounded-xl text-sm transition flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Export
                            </a>
                            @endif
                            <!-- Add Question Button -->
                            <button onclick="document.getElementById('addQuestionModal').classList.remove('hidden')" class="bg-[#007cc3] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl text-sm transition">
                                + Tambah Soal
                            </button>
                        </div>
                    </div>

                    @forelse($quiz->questions as $index => $question)
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                            <div class="flex justify-between items-start mb-4">
                                <h4 class="font-bold text-gray-900">Soal #{{ $index + 1 }}</h4>
                                <span class="text-xs font-bold text-gray-400 bg-gray-100 px-2 py-1 rounded-md">{{ $question->points }} Poin</span>
                            </div>
                            <p class="text-gray-800 mb-4">{{ $question->content }}</p>
                            
                            @if($question->type == 'multiple_choice')
                                <div class="space-y-2">
                                    @foreach($question->options as $option)
                                        <div class="flex items-center p-3 rounded-xl border {{ $option->is_correct ? 'bg-green-50 border-green-200' : 'bg-gray-50 border-gray-100' }}">
                                            <span class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold mr-3 {{ $option->is_correct ? 'bg-green-500 text-white' : 'bg-gray-200 text-gray-600' }}">
                                                {{ $option->label }}
                                            </span>
                                            <span class="text-sm {{ $option->is_correct ? 'font-semibold text-green-900' : 'text-gray-700' }}">{{ $option->content }}</span>
                                            @if($option->is_correct)
                                                <svg class="w-5 h-5 ml-auto text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="text-center py-10 bg-white rounded-2xl border border-gray-100">
                            <p class="text-gray-500">Belum ada soal untuk kuis ini. Silakan tambahkan soal atau import dari file.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Kanan: Hasil Murid -->
                <div class="w-full lg:w-96">
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Hasil Pengerjaan</h3>
                        <div class="space-y-3">
                            @forelse($quiz->attempts as $attempt)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                                    <div>
                                        <p class="font-semibold text-sm text-gray-800">{{ $attempt->student->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $attempt->finished_at ? \Carbon\Carbon::parse($attempt->finished_at)->format('d M, H:i') : 'Sedang mengerjakan' }}</p>
                                    </div>
                                    <span class="font-bold text-lg {{ $attempt->total_score >= ($quiz->max_score * 0.7) ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $attempt->total_score ?? '-' }}
                                    </span>
                                </div>
                            @empty
                                <p class="text-sm text-gray-500 text-center py-4">Belum ada murid yang mengerjakan kuis ini.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Tambah Soal -->
    <div id="addQuestionModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm" onclick="document.getElementById('addQuestionModal').classList.add('hidden')"></div>
        <div class="flex items-center justify-center min-h-screen px-4 py-8">
            <div class="relative bg-white rounded-2xl w-full max-w-2xl max-h-screen overflow-y-auto">
                <form action="{{ route('guru.quizzes.questions.store', $quiz->id) }}" method="POST">
                    @csrf
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Tambah Pertanyaan Pilihan Ganda</h3>
                        <input type="hidden" name="type" value="multiple_choice">
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pertanyaan</label>
                            <textarea name="content" rows="3" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none"></textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Bobot Poin</label>
                            <input type="number" name="points" value="10" min="1" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none">
                        </div>
                        
                        <h4 class="font-bold text-gray-900 mb-2">Pilihan Jawaban</h4>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="correct_option" value="A" required class="w-5 h-5 text-[#007cc3]">
                                <span class="font-bold text-gray-700 w-6">A.</span>
                                <input type="text" name="option_a" required class="flex-1 px-4 py-2 border border-gray-300 rounded-xl">
                            </div>
                            <div class="flex items-center gap-3">
                                <input type="radio" name="correct_option" value="B" class="w-5 h-5 text-[#007cc3]">
                                <span class="font-bold text-gray-700 w-6">B.</span>
                                <input type="text" name="option_b" required class="flex-1 px-4 py-2 border border-gray-300 rounded-xl">
                            </div>
                            <div class="flex items-center gap-3">
                                <input type="radio" name="correct_option" value="C" class="w-5 h-5 text-[#007cc3]">
                                <span class="font-bold text-gray-700 w-6">C.</span>
                                <input type="text" name="option_c" required class="flex-1 px-4 py-2 border border-gray-300 rounded-xl">
                            </div>
                            <div class="flex items-center gap-3">
                                <input type="radio" name="correct_option" value="D" class="w-5 h-5 text-[#007cc3]">
                                <span class="font-bold text-gray-700 w-6">D.</span>
                                <input type="text" name="option_d" required class="flex-1 px-4 py-2 border border-gray-300 rounded-xl">
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">*Pilih radio button untuk menentukan jawaban yang benar.</p>
                    </div>
                    <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 rounded-b-2xl">
                        <button type="button" onclick="document.getElementById('addQuestionModal').classList.add('hidden')" class="px-4 py-2 bg-white border border-gray-300 rounded-xl text-gray-700 font-medium">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-[#007cc3] rounded-xl text-white font-medium">Simpan Soal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Import Soal -->
    <div id="importModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm" onclick="document.getElementById('importModal').classList.add('hidden')"></div>
        <div class="flex items-center justify-center min-h-screen px-4 py-8">
            <div class="relative bg-white rounded-2xl w-full max-w-xl overflow-hidden shadow-2xl">
                <form action="{{ route('guru.quizzes.import', $quiz->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col max-h-[90vh]">
                    @csrf
                    <div class="p-6 overflow-y-auto flex-1">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Import Soal dari File PDF</h3>
                        <p class="text-sm text-gray-500 mb-6">Upload file PDF berisi soal-soal yang sudah Anda miliki. Sistem akan mengekstrak teksnya.</p>
                        
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">File PDF</label>
                            <div class="w-full flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:bg-gray-50 transition cursor-pointer relative" onclick="document.getElementById('import-file-input').click()">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <div class="flex text-sm text-gray-600 justify-center">
                                        <span class="font-medium text-[#007cc3]">Pilih file</span>
                                        <p class="pl-1">atau drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">File .pdf (max 5MB)</p>
                                    <p id="import-file-name" class="text-sm font-bold text-[#0A4B7D] mt-2"></p>
                                </div>
                                <input id="import-file-input" name="import_file" type="file" accept=".pdf" class="sr-only" required onchange="document.getElementById('import-file-name').textContent = this.files[0].name">
                            </div>
                        </div>

                    </div>
                    <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 rounded-b-2xl">
                        <button type="button" onclick="document.getElementById('importModal').classList.add('hidden')" class="px-4 py-2 bg-white border border-gray-300 rounded-xl text-gray-700 font-medium">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded-xl text-white font-medium transition flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                            Import Soal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

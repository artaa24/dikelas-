<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $classroom->name }} - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    @if(auth()->user()->isAdmin())
        @include('components.sidebar-admin', ['active' => ''])
    @elseif(auth()->user()->isTeacher())
        @include('components.sidebar-guru', ['active' => ''])
    @else
        @include('components.sidebar-student', ['active' => ''])
    @endif

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-full overflow-hidden relative">
        
        <!-- Header Image & Info -->
        <div class="h-64 relative flex-shrink-0">
            @if($classroom->banner_image)
                <img src="{{ asset('storage/' . $classroom->banner_image) }}" alt="Course Cover" class="w-full h-full object-cover">
            @else
                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" alt="Course Cover" class="w-full h-full object-cover">
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-[#0A4B7D] via-[#0A4B7D]/70 to-transparent"></div>
            
            <div class="absolute top-0 left-0 w-full p-6 flex justify-between items-center z-10">
                <a href="/courses" class="text-white hover:bg-white/20 p-2 rounded-full backdrop-blur-sm transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <div class="flex items-center space-x-4">
                    <button class="text-white bg-black/20 hover:bg-black/40 p-2 rounded-full backdrop-blur-sm transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
                    </button>
                </div>
            </div>

            <div class="absolute bottom-0 left-0 w-full px-10 pb-8 flex justify-between items-end">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="bg-[#9AE6F1] text-[#0A4B7D] px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">{{ $classroom->code }}</span>
                        <span class="text-sm font-medium text-white/80"><svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg> {{ $classroom->students->count() }} Siswa</span>
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-white mb-2">{{ $classroom->name }}</h2>
                    <p class="text-white/80 font-medium text-lg">Guru: {{ $classroom->teacher->name }}</p>
                </div>
                
                @if(auth()->user()->role->name == 'student')
                <div class="bg-white/10 rounded-2xl p-4 border border-white/20 w-full md:w-64 backdrop-blur-sm">
                    <div class="flex justify-between items-end mb-2">
                        <span class="text-white/80 text-sm font-medium">Progress Belajar</span>
                        <span class="text-white font-bold text-lg">0%</span>
                    </div>
                    <div class="w-full bg-black/20 rounded-full h-2">
                        <div class="bg-white h-2 rounded-full" style="width: 0%"></div>
                    </div>
                </div>
                @else
                <div class="hidden md:flex gap-3">
                    <button onclick="document.getElementById('uploadMaterialModal').classList.remove('hidden')" class="bg-white text-[#0A4B7D] hover:bg-gray-100 font-bold py-2.5 px-5 rounded-xl shadow-md transition flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                        Materi Baru
                    </button>
                    <button onclick="document.getElementById('createAssignmentModal').classList.remove('hidden')" class="bg-[#9AE6F1] text-[#0A4B7D] hover:bg-cyan-200 font-bold py-2.5 px-5 rounded-xl shadow-md transition flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Tugas Baru
                    </button>
                    <button onclick="document.getElementById('createQuizModal').classList.remove('hidden')" class="bg-purple-100 text-purple-700 hover:bg-purple-200 font-bold py-2.5 px-5 rounded-xl shadow-md transition flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Kuis Baru
                    </button>
                </div>
                @endif
            </div>
        </div>

        <!-- Scrollable Content Area -->
        <div class="flex-1 overflow-auto hide-scrollbar flex flex-col xl:flex-row">
            
            <!-- Main Content (Modules) -->
            <div class="flex-1 px-8 xl:px-10 py-8">
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
                
                <!-- Navigation Tabs -->
                <div class="flex border-b border-gray-200 mb-8 space-x-8" id="classTabs">
                    <button onclick="switchTab('materi')" id="btn-materi" class="pb-4 font-bold text-[#007cc3] border-b-2 border-[#007cc3]">Modul Materi</button>
                    <button onclick="switchTab('tugas')" id="btn-tugas" class="pb-4 font-medium text-gray-500 hover:text-gray-700 transition">Tugas & Kuis</button>
                    <a href="{{ route('classrooms.discussions.index', $classroom->id) }}" class="pb-4 font-medium text-gray-500 hover:text-gray-700 transition">Forum Diskusi</a>
                    <a href="{{ route('classrooms.grades.index', $classroom->id) }}" class="pb-4 font-medium text-gray-500 hover:text-gray-700 transition">Rekap Nilai</a>
                </div>

                <div class="space-y-6" id="tab-materi">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Silabus Pembelajaran</h3>
                    <!-- Modul Materi (Dinamis) -->
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="p-5 flex items-center justify-between cursor-pointer bg-gray-50/50 hover:bg-gray-50 transition border-b border-gray-100">
                            <div class="flex items-center">
                                <div class="bg-[#007cc3] text-white rounded-full p-2 mr-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-lg">Daftar Materi Pembelajaran</h4>
                                    <p class="text-sm text-gray-500">Materi yang diunggah oleh guru untuk dipelajari.</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 bg-white">
                            @forelse($materials as $material)
                            <a href="{{ Storage::url($material->file_path) }}" target="_blank" class="flex items-center px-4 py-3 hover:bg-gray-50 rounded-xl transition group border-b border-gray-50 last:border-0">
                                @if($material->file_type == 'pdf')
                                <svg class="w-5 h-5 text-red-500 group-hover:text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                @elseif($material->file_type == 'video')
                                <svg class="w-5 h-5 text-purple-500 group-hover:text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                @else
                                <svg class="w-5 h-5 text-blue-500 group-hover:text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                @endif
                                <div class="flex-1">
                                    <span class="text-sm font-bold text-gray-800 block">{{ $material->title }}</span>
                                    <span class="text-xs text-gray-500 line-clamp-1">{{ $material->description }}</span>
                                </div>
                                <span class="text-xs font-semibold text-gray-400 bg-gray-100 px-2 py-1 rounded-md">{{ number_format($material->file_size / 1024, 0) }} KB</span>
                            </a>
                            @empty
                            <div class="p-8 text-center text-gray-500">
                                Belum ada materi yang diunggah.
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="space-y-6 hidden" id="tab-tugas">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Daftar Evaluasi Pembelajaran</h3>
                    <!-- Modul Tugas (Dinamis) -->
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="p-5 flex items-center justify-between cursor-pointer bg-gray-50/50 hover:bg-gray-50 transition border-b border-gray-100">
                            <div class="flex items-center">
                                <div class="bg-red-100 text-red-600 rounded-full p-2 mr-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-lg">Daftar Tugas Kelas</h4>
                                    <p class="text-sm text-gray-500">Tugas yang harus dikerjakan oleh murid.</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 bg-white">
                            @forelse($assignments as $assignment)
                            <a href="{{ route('assignments.show', $assignment->id) }}" class="flex items-center px-4 py-3 hover:bg-gray-50 rounded-xl transition group">
                                <svg class="w-5 h-5 text-red-400 group-hover:text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                <div class="flex-1">
                                    <span class="text-sm font-medium text-gray-700 block">{{ $assignment->title }}</span>
                                    <span class="text-xs text-gray-500 line-clamp-1">{{ $assignment->description }}</span>
                                </div>
                                <span class="text-xs font-medium {{ now()->gt($assignment->deadline_at) ? 'text-red-500' : 'text-[#007cc3]' }}">
                                    Tenggat: {{ \Carbon\Carbon::parse($assignment->deadline_at)->format('d M Y, H:i') }}
                                </span>
                            </a>
                            @empty
                            <div class="p-8 text-center text-gray-500">
                                Belum ada tugas yang diberikan.
                            </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Modul Kuis (Dinamis) -->
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="p-5 flex items-center justify-between cursor-pointer bg-gray-50/50 hover:bg-gray-50 transition border-b border-gray-100">
                            <div class="flex items-center">
                                <div class="bg-purple-100 text-purple-600 rounded-full p-2 mr-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-lg">Daftar Kuis Kelas</h4>
                                    <p class="text-sm text-gray-500">Kuis dan evaluasi untuk mengukur pemahaman murid.</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 bg-white">
                            @forelse($quizzes ?? [] as $quiz)
                            <a href="{{ auth()->user()->role->name == 'teacher' ? route('guru.quizzes.show', $quiz->id) : route('quizzes.show', $quiz->id) }}" class="flex items-center px-4 py-3 hover:bg-gray-50 rounded-xl transition group border-b border-gray-50 last:border-0">
                                <svg class="w-5 h-5 text-purple-400 group-hover:text-purple-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="flex-1">
                                    <span class="text-sm font-medium text-gray-700 block">{{ $quiz->title }}</span>
                                    <span class="text-xs text-gray-500 line-clamp-1">{{ $quiz->description }}</span>
                                </div>
                                <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2 py-1 rounded-md">
                                    Durasi: {{ $quiz->duration_minutes }} mnt
                                </span>
                            </a>
                            @empty
                            <div class="p-8 text-center text-gray-500">
                                Belum ada kuis yang dibuat.
                            </div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>

            <!-- Right Sidebar Info -->
            <div class="w-full xl:w-80 bg-white border-l border-gray-100 p-8 flex flex-col hide-scrollbar overflow-y-auto">
                <h3 class="font-bold text-gray-900 mb-4">Informasi Kelas</h3>
                
                <div class="mb-6 space-y-3">
                    <div class="flex items-center text-sm">
                        <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-gray-600">Dibuat: {{ $classroom->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center text-sm">
                        <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span class="text-gray-600">{{ $classroom->students->count() }}{{ $classroom->max_students ? '/' . $classroom->max_students : '' }} Murid terdaftar</span>
                    </div>
                    <div class="flex items-center text-sm">
                        <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-gray-600">Status: <span class="font-semibold {{ $classroom->is_active ? 'text-green-600' : 'text-red-600' }}">{{ $classroom->is_active ? 'Aktif' : 'Nonaktif' }}</span></span>
                    </div>
                </div>

                <hr class="border-gray-100 mb-6">

                @if(auth()->user()->role->name == 'teacher' && $classroom->teacher_id == auth()->id())
                    <!-- Teacher: Class Settings -->
                    <div class="mb-6">
                        <h3 class="font-bold text-gray-900 mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Pengaturan Kelas
                        </h3>
                        <form action="{{ route('classrooms.settings.update', $classroom->id) }}" method="POST" class="space-y-3">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Batas Murid (kosongkan = tanpa batas)</label>
                                <input type="number" name="max_students" value="{{ $classroom->max_students }}" min="1" max="999" class="w-full bg-gray-50 border border-gray-200 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-1 focus:ring-[#007cc3]" placeholder="Contoh: 40">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 mb-1">Status Kelas</label>
                                <select name="is_active" class="w-full bg-gray-50 border border-gray-200 rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-1 focus:ring-[#007cc3]">
                                    <option value="1" {{ $classroom->is_active ? 'selected' : '' }}>Aktif (Menerima Murid)</option>
                                    <option value="0" {{ !$classroom->is_active ? 'selected' : '' }}>Nonaktif (Ditutup)</option>
                                </select>
                            </div>
                            <button type="submit" class="w-full bg-gray-100 text-gray-700 hover:bg-[#007cc3] hover:text-white font-medium py-2 rounded-lg text-sm transition">Simpan Pengaturan</button>
                        </form>
                    </div>

                    <hr class="border-gray-100 mb-6">

                    <!-- Teacher: Certificate Link -->
                    <a href="{{ route('guru.certificates.manage', $classroom->id) }}" class="mb-6 flex items-center p-3 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl hover:from-blue-100 hover:to-cyan-100 transition group">
                        <div class="w-10 h-10 bg-[#007cc3] rounded-xl flex items-center justify-center mr-3 group-hover:scale-110 transition">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-900">Terbitkan Sertifikat</p>
                            <p class="text-xs text-gray-500">Buat sertifikat untuk murid kelas ini</p>
                        </div>
                    </a>

                    <hr class="border-gray-100 mb-6">

                    <!-- Teacher: Student Management -->
                    <h3 class="font-bold text-gray-900 mb-3">Daftar Murid ({{ $classroom->students->count() }})</h3>
                    <div class="space-y-2 max-h-80 overflow-y-auto">
                        @forelse($classroom->students as $student)
                        <div class="flex items-center justify-between p-2 rounded-xl hover:bg-gray-50 transition group">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-full bg-[#007cc3] text-white font-bold flex items-center justify-center text-xs mr-2">
                                    {{ strtoupper(substr($student->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900 leading-tight">{{ $student->name }}</p>
                                    <p class="text-[10px] text-gray-500">{{ $student->nis ?? $student->email }}</p>
                                </div>
                            </div>
                            <form action="{{ route('classrooms.students.remove', [$classroom->id, $student->id]) }}" method="POST" onsubmit="return confirm('Keluarkan {{ addslashes($student->name) }} dari kelas?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 text-gray-300 hover:text-red-500 opacity-0 group-hover:opacity-100 transition" title="Keluarkan murid">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </button>
                            </form>
                        </div>
                        @empty
                        <p class="text-sm text-gray-500 text-center py-4">Belum ada murid di kelas ini.</p>
                        @endforelse
                    </div>
                @else
                    <!-- Student: Classmates view -->
                    <h3 class="font-bold text-gray-900 mb-4">Teman Kelas</h3>
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach($classroom->students->take(8) as $student)
                            <div class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm bg-[#007cc3] text-white font-bold flex items-center justify-center text-sm" title="{{ $student->name }}">
                                {{ strtoupper(substr($student->name, 0, 1)) }}
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </main>

    <!-- Create Assignment Modal -->
    <div id="createAssignmentModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm" onclick="document.getElementById('createAssignmentModal').classList.add('hidden')"></div>
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <div class="relative bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg w-full">
                <form action="{{ route('classrooms.assignments.store', $classroom->id) }}" method="POST">
                    @csrf
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mb-4">
                            <h3 class="text-xl leading-6 font-bold text-gray-900">Buat Tugas Baru</h3>
                            <p class="text-sm text-gray-500 mt-1">Berikan penugasan untuk siswa di kelas ini.</p>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Tugas</label>
                                <input type="text" name="title" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition" placeholder="Contoh: Latihan Soal UTS">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Tugas</label>
                                <textarea name="description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition" placeholder="Tuliskan instruksi pengerjaan tugas..."></textarea>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Batas Waktu</label>
                                    <input type="datetime-local" name="deadline_at" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nilai Maksimal</label>
                                    <input type="number" name="max_score" value="100" min="1" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-100">
                        <button type="submit" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-2 bg-[#007cc3] text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm transition">
                            Simpan Tugas
                        </button>
                        <button type="button" onclick="document.getElementById('createAssignmentModal').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Create Quiz Modal -->
    <div id="createQuizModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm" onclick="document.getElementById('createQuizModal').classList.add('hidden')"></div>
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <div class="relative bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg w-full">
                <form action="{{ route('classrooms.quizzes.store', $classroom->id) }}" method="POST">
                    @csrf
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mb-4">
                            <h3 class="text-xl leading-6 font-bold text-gray-900">Buat Kuis Baru</h3>
                            <p class="text-sm text-gray-500 mt-1">Buat kuis untuk menguji pemahaman siswa.</p>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Kuis</label>
                                <input type="text" name="title" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition" placeholder="Contoh: Kuis 1: Persamaan Kuadrat">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi & Aturan Kuis</label>
                                <textarea name="description" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition"></textarea>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Durasi (Menit)</label>
                                    <input type="number" name="duration_minutes" value="30" min="1" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Poin Maksimal</label>
                                    <input type="number" name="max_score" value="100" min="1" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-100">
                        <button type="submit" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-2 bg-[#007cc3] text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm transition">
                            Buat Kuis
                        </button>
                        <button type="button" onclick="document.getElementById('createQuizModal').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Upload Material Modal -->
    <div id="uploadMaterialModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm" onclick="document.getElementById('uploadMaterialModal').classList.add('hidden')"></div>
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <div class="relative bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg w-full">
                <form action="{{ route('classrooms.materials.store', $classroom->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mb-4">
                            <h3 class="text-xl leading-6 font-bold text-gray-900">Upload Materi Baru</h3>
                            <p class="text-sm text-gray-500 mt-1">Bagikan file materi untuk dipelajari oleh siswa.</p>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Materi</label>
                                <input type="text" name="title" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition" placeholder="Contoh: Modul 1 - Pendahuluan">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
                                <textarea name="description" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition"></textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">File Materi (Drag & Drop)</label>
                                <div class="w-full flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:bg-gray-50 transition cursor-pointer relative" id="drop-zone" onclick="document.getElementById('file-upload').click()">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <div class="flex text-sm text-gray-600 justify-center">
                                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-[#007cc3] hover:text-blue-500 focus-within:outline-none">
                                                <span>Upload a file</span>
                                                <input id="file-upload" name="file" type="file" class="sr-only" required onchange="document.getElementById('file-name').textContent = this.files[0].name">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PDF, PPTX, DOCX up to 10MB</p>
                                        <p id="file-name" class="text-sm font-bold text-[#0A4B7D] mt-2"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-100">
                        <button type="submit" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-2 bg-[#007cc3] text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm transition">
                            Upload Materi
                        </button>
                        <button type="button" onclick="document.getElementById('uploadMaterialModal').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Simple drag and drop script
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('file-upload');
        const fileName = document.getElementById('file-name');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            dropZone.classList.add('bg-blue-50', 'border-[#007cc3]');
        }

        function unhighlight(e) {
            dropZone.classList.remove('bg-blue-50', 'border-[#007cc3]');
        }

        dropZone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            let dt = e.dataTransfer;
            let files = dt.files;
            
            if(files.length > 0) {
                fileInput.files = files;
                fileName.textContent = files[0].name;
            }
        }

        // Tab Switching Logic
        function switchTab(tabName) {
            // Reset tabs
            document.getElementById('btn-materi').className = 'pb-4 font-medium text-gray-500 hover:text-gray-700 transition';
            document.getElementById('btn-tugas').className = 'pb-4 font-medium text-gray-500 hover:text-gray-700 transition';
            
            // Hide all contents
            document.getElementById('tab-materi').classList.add('hidden');
            document.getElementById('tab-tugas').classList.add('hidden');
            
            // Activate selected tab
            document.getElementById('btn-' + tabName).className = 'pb-4 font-bold text-[#007cc3] border-b-2 border-[#007cc3]';
            document.getElementById('tab-' + tabName).classList.remove('hidden');
        }
    </script>
</body>
</html>

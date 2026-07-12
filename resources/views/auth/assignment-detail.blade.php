<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $assignment->title }} - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    <!-- Left Sidebar -->
        @if(auth()->check() && auth()->user()->role_id == 1)
        @include('components.sidebar-admin', ['active' => 'courses'])
    @elseif(auth()->check() && auth()->user()->role_id == 2)
        @include('components.sidebar-guru', ['active' => 'courses'])
    @else
        @include('components.sidebar-student', ['active' => 'courses'])
    @endif

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <!-- Header -->
        <header class="h-20 bg-white flex items-center px-8 flex-shrink-0 border-b border-gray-100">
            <div class="flex items-center text-sm text-gray-500 font-medium">
                <a href="{{ route('classrooms.show', $assignment->classroom_id) }}" class="hover:text-[#007cc3] transition">{{ $assignment->classroom->name }}</a>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="text-gray-900 font-semibold">{{ $assignment->title }}</span>
            </div>
            <div class="ml-auto">
                <div class="w-10 h-10 rounded-full bg-[#007cc3] text-white font-bold flex items-center justify-center">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            </div>
        </header>

        @if(session('success'))
        <div class="mx-8 mt-4 bg-green-50 text-green-700 border border-green-200 rounded-xl p-4 text-sm font-medium">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="mx-8 mt-4 bg-red-50 text-red-700 border border-red-200 rounded-xl p-4 text-sm font-medium">
            {{ session('error') }}
        </div>
        @endif

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-auto hide-scrollbar flex flex-col xl:flex-row p-4 lg:p-8 gap-8 max-w-7xl mx-auto w-full">
            
            <!-- Left Side: Assignment Brief -->
            <div class="flex-1 bg-white rounded-3xl p-8 shadow-sm border border-gray-100 flex flex-col">
                <div class="flex justify-between items-start mb-6 border-b border-gray-100 pb-6">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            @if(now()->gt($assignment->deadline_at))
                                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-bold">Tenggat Terlampaui</span>
                            @else
                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-bold">Aktif</span>
                            @endif
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $assignment->title }}</h2>
                        <p class="text-gray-500 font-medium">Oleh: {{ $assignment->classroom->teacher->name }}</p>
                    </div>
                    <div class="text-right flex-shrink-0 ml-4">
                        <p class="text-sm text-gray-500 mb-1">Tenggat Waktu</p>
                        <p class="text-lg font-bold {{ now()->gt($assignment->deadline_at) ? 'text-red-600' : 'text-[#007cc3]' }}">
                            {{ \Carbon\Carbon::parse($assignment->deadline_at)->format('d M Y') }}
                        </p>
                        <p class="text-sm font-semibold text-gray-500">{{ \Carbon\Carbon::parse($assignment->deadline_at)->format('H:i') }} WIB</p>
                        <p class="text-xs font-bold text-gray-400 mt-1">NILAI MAX: {{ $assignment->max_score }}</p>
                    </div>
                </div>

                <!-- Instructions -->
                <div class="prose max-w-none text-gray-600 flex-1">
                    <h3 class="text-lg font-bold text-gray-900 mb-3">Instruksi Tugas</h3>
                    <div class="bg-gray-50 rounded-xl p-5 text-sm leading-relaxed whitespace-pre-wrap">{{ $assignment->description ?? 'Tidak ada instruksi tambahan.' }}</div>
                </div>

                <!-- Teacher: Daftar Submission Murid -->
                @if(auth()->user()->role->name == 'teacher')
                <div class="mt-8 border-t border-gray-100 pt-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Status Pengumpulan Murid ({{ $submissions->count() }} / {{ $students->count() }})</h3>
                    <div class="space-y-3">
                        @forelse($students as $student)
                            @php $sub = $submissions->firstWhere('student_id', $student->id); @endphp
                            <div class="flex items-center p-4 bg-gray-50 rounded-xl border border-gray-100">
                                <div class="w-9 h-9 rounded-full bg-[#007cc3] text-white font-bold flex items-center justify-center text-sm mr-3">
                                    {{ strtoupper(substr($student->name, 0, 1)) }}
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-800 text-sm">{{ $student->name }}</p>
                                    @if($sub)
                                        <p class="text-xs text-gray-500">Dikumpulkan: {{ \Carbon\Carbon::parse($sub->submitted_at)->format('d M Y, H:i') }}</p>
                                    @else
                                        <p class="text-xs text-gray-400">Belum mengumpulkan</p>
                                    @endif
                                </div>
                                @if($sub)
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('submissions.download', $sub->id) }}" class="text-xs text-[#007cc3] font-semibold hover:underline">Unduh</a>
                                        @if($sub->status == 'graded')
                                            <span class="text-xs font-bold text-green-600 bg-green-50 px-2 py-1 rounded-lg">Nilai: {{ $sub->score }}</span>
                                        @else
                                            <!-- Form Beri Nilai -->
                                            <form action="{{ route('submissions.grade', $sub->id) }}" method="POST" class="flex items-center gap-2">
                                                @csrf
                                                <input type="number" name="score" placeholder="Nilai" min="0" max="{{ $assignment->max_score }}" class="w-20 border border-gray-200 rounded-lg py-1 px-2 text-xs focus:outline-none focus:ring-1 focus:ring-[#007cc3]" required>
                                                <button type="submit" class="text-xs bg-[#007cc3] text-white px-3 py-1 rounded-lg font-semibold hover:bg-blue-700 transition">Nilai</button>
                                            </form>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-xs font-medium text-gray-400 bg-gray-100 px-2 py-1 rounded-lg">Belum Kumpul</span>
                                @endif
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-6">Belum ada murid terdaftar di kelas ini.</p>
                        @endforelse
                    </div>
                </div>
                @endif
            </div>

            <!-- Right Side: Submission Area (Murid Only) -->
            @if(auth()->user()->role->name == 'student')
            <div class="w-full xl:w-96 flex flex-col gap-6">
                <!-- Status Card -->
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                    <h3 class="font-bold text-gray-900 mb-4 text-lg border-b border-gray-100 pb-3">Status Pengumpulan</h3>
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Status Tugas</span>
                            @if($submission)
                                <span class="font-bold text-green-600 bg-green-50 px-2 py-1 rounded">Sudah Dikumpulkan</span>
                            @else
                                <span class="font-bold text-red-600 bg-red-50 px-2 py-1 rounded">Belum Dikumpulkan</span>
                            @endif
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Nilai</span>
                            @if($submission && $submission->status == 'graded')
                                <span class="font-bold text-[#007cc3] bg-blue-50 px-2 py-1 rounded">{{ $submission->score }} / {{ $assignment->max_score }}</span>
                            @else
                                <span class="font-medium text-gray-500 bg-gray-100 px-2 py-1 rounded">Belum Dinilai</span>
                            @endif
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Tenggat</span>
                            <span class="font-semibold {{ now()->gt($assignment->deadline_at) ? 'text-red-600' : 'text-gray-700' }}">
                                {{ \Carbon\Carbon::parse($assignment->deadline_at)->diffForHumans() }}
                            </span>
                        </div>
                    </div>

                    @if($submission && $submission->feedback)
                    <div class="bg-blue-50 border border-blue-100 rounded-xl p-4">
                        <p class="text-xs font-bold text-[#007cc3] mb-1">Feedback Guru:</p>
                        <p class="text-sm text-gray-600">{{ $submission->feedback }}</p>
                    </div>
                    @endif
                </div>

                <!-- Upload Card -->
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-[#007cc3]/30">
                    <h3 class="font-bold text-gray-900 mb-4 text-lg">
                        {{ $submission ? 'Perbarui Jawaban Anda' : 'Kumpulkan Tugas Anda' }}
                    </h3>
                    <form action="{{ route('assignments.submit', $assignment->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($submission)
                        <div class="mb-4 p-3 bg-gray-50 rounded-xl border border-gray-100">
                            <p class="text-xs text-gray-500 mb-1">File terakhir:</p>
                            <a href="{{ route('submissions.download', $submission->id) }}" class="text-sm font-semibold text-[#007cc3] hover:underline">{{ $submission->file_name }}</a>
                        </div>
                        @endif
                        <div class="mb-4">
                            <input type="file" name="file" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-2 px-4 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-[#007cc3] hover:file:bg-blue-100">
                            <p class="text-xs text-gray-400 mt-2">Format: PDF, ZIP, RAR (Maks. 10MB)</p>
                        </div>
                        <button type="submit" class="w-full bg-[#007cc3] hover:bg-blue-700 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-blue-500/30 transition-all flex justify-center items-center">
                            {{ $submission ? 'Perbarui & Kumpulkan' : 'Upload & Kumpulkan' }}
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
            @endif

        </div>
    </main>

</body>
</html>

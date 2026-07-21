<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Diskusi: {{ $classroom->name }} - DIKELAS</title>
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

    <main class="flex-1 flex flex-col h-full overflow-hidden relative">
        <!-- Header -->
        <div class="bg-white border-b border-gray-200 px-8 py-6 flex-shrink-0 flex justify-between items-center shadow-sm z-10">
            <div>
                <div class="flex items-center text-sm text-gray-500 mb-1">
                    <a href="{{ route('classrooms.show', $classroom->id) }}" class="hover:text-[#007cc3] transition font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        Kembali ke Kelas
                    </a>
                </div>
                <h1 class="text-2xl font-bold text-gray-900">Forum Diskusi: {{ $classroom->name }}</h1>
            </div>
            <button onclick="document.getElementById('createDiscussionModal').classList.remove('hidden')" class="bg-[#007cc3] text-white hover:bg-blue-700 font-bold py-2.5 px-5 rounded-xl shadow-md transition flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Topik Baru
            </button>
        </div>

        <!-- Content -->
        <div class="flex-1 overflow-auto p-8 hide-scrollbar">
            @if(session('success'))
            <div class="mb-6 bg-green-50 text-green-700 border border-green-200 rounded-xl p-4 text-sm font-medium flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden max-w-5xl mx-auto">
                <div class="bg-gray-50 border-b border-gray-200 p-4 px-6 flex justify-between items-center">
                    <h2 class="font-bold text-gray-800">Daftar Topik Diskusi</h2>
                    <span class="text-xs font-semibold text-gray-500 bg-gray-200 px-3 py-1 rounded-full">{{ $discussions->count() }} Topik</span>
                </div>
                
                @forelse($discussions as $discussion)
                <a href="{{ route('classrooms.discussions.show', [$classroom->id, $discussion->id]) }}" class="block p-6 border-b border-gray-100 hover:bg-blue-50/50 transition group last:border-0">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-4">
                            <div class="h-12 w-12 rounded-full bg-gradient-to-br from-blue-500 to-[#0A4B7D] text-white font-bold flex items-center justify-center text-lg flex-shrink-0 mt-1 shadow-sm">
                                {{ strtoupper(substr($discussion->user->name, 0, 1)) }}
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 group-hover:text-[#007cc3] transition mb-1">{{ $discussion->title }}</h3>
                                <p class="text-xs text-gray-500 mb-2">
                                    Dibuat oleh <span class="font-semibold text-gray-700">{{ $discussion->user->name }}</span> 
                                    @if($discussion->user->role->name == 'teacher')
                                    <span class="bg-blue-100 text-blue-700 text-[9px] px-1.5 py-0.5 rounded font-bold ml-1">GURU</span>
                                    @endif
                                    <span class="mx-1">•</span> {{ $discussion->created_at->diffForHumans() }}
                                </p>
                                <p class="text-gray-600 line-clamp-2 text-sm">{{ $discussion->content }}</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center justify-center bg-gray-50 group-hover:bg-white rounded-xl px-4 py-2.5 border border-gray-100 transition shadow-sm ml-4 flex-shrink-0">
                            <span class="text-xl font-bold {{ $discussion->replies_count > 0 ? 'text-[#007cc3]' : 'text-gray-400' }}">{{ $discussion->replies_count }}</span>
                            <span class="text-[11px] text-gray-500 font-medium uppercase tracking-wider mt-0.5">Balasan</span>
                        </div>
                    </div>
                </a>
                @empty
                <div class="p-16 text-center">
                    <div class="w-20 h-20 bg-blue-50 text-[#007cc3] rounded-full flex items-center justify-center mx-auto mb-5">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Belum ada diskusi</h3>
                    <p class="text-gray-500 mb-6">Jadilah yang pertama memulai topik diskusi di kelas ini!</p>
                    <button onclick="document.getElementById('createDiscussionModal').classList.remove('hidden')" class="bg-gray-900 text-white font-medium px-6 py-2.5 rounded-xl hover:bg-gray-800 transition">Buat Topik Baru</button>
                </div>
                @endforelse
            </div>
            
            <div class="h-10"></div>
        </div>
    </main>

    <!-- Create Discussion Modal -->
    <div id="createDiscussionModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-gray-900/60 backdrop-blur-sm transition-opacity" onclick="document.getElementById('createDiscussionModal').classList.add('hidden')"></div>
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <div class="relative bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:max-w-2xl w-full">
                <form action="{{ route('classrooms.discussions.store', $classroom->id) }}" method="POST">
                    @csrf
                    <div class="bg-white px-8 pt-8 pb-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-2xl font-bold text-gray-900">Topik Diskusi Baru</h3>
                            <button type="button" onclick="document.getElementById('createDiscussionModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                        
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Judul Diskusi <span class="text-red-500">*</span></label>
                                <input type="text" name="title" required class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-100 focus:border-[#007cc3] outline-none transition" placeholder="Tuliskan judul yang jelas (contoh: Pertanyaan Modul 3)...">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Isi Pesan <span class="text-red-500">*</span></label>
                                <textarea name="content" rows="6" required class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-100 focus:border-[#007cc3] outline-none transition" placeholder="Jelaskan secara detail pertanyaan atau topik yang ingin didiskusikan dengan teman kelas atau guru..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-8 py-5 flex justify-end space-x-3 border-t border-gray-100">
                        <button type="button" onclick="document.getElementById('createDiscussionModal').classList.add('hidden')" class="px-6 py-2.5 bg-white border border-gray-300 rounded-xl text-gray-700 font-semibold hover:bg-gray-50 transition">Batal</button>
                        <button type="submit" class="px-6 py-2.5 bg-[#007cc3] text-white rounded-xl font-semibold hover:bg-blue-700 transition shadow-md">Kirim Topik</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

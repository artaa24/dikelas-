<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian: "{{ $query }}" - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
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

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <header class="h-20 bg-white flex items-center justify-between px-8 border-b border-gray-100 flex-shrink-0">
            <div class="flex items-center gap-4">
                <a href="javascript:history.back()" class="text-gray-400 hover:text-gray-600 transition p-2 rounded-full hover:bg-gray-50">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </a>
                <h2 class="text-xl font-bold text-gray-900">Hasil Pencarian</h2>
            </div>
            
            <form action="{{ route('search') }}" method="GET" class="flex-1 max-w-xl mx-8">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" name="q" value="{{ $query }}" class="w-full bg-gray-50 border border-gray-200 rounded-full py-2.5 pl-12 pr-4 text-sm focus:outline-none focus:ring-1 focus:ring-[#007cc3]" placeholder="Cari materi, tugas, kelas, atau mentor...">
                </div>
            </form>
        </header>

        <div class="flex-1 overflow-auto hide-scrollbar p-8">
            <div class="max-w-5xl mx-auto space-y-8">
                
                @if(empty($query))
                    <div class="bg-white rounded-3xl p-12 text-center border border-gray-100 shadow-sm">
                        <div class="w-20 h-20 bg-blue-50 text-[#007cc3] rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Pencarian</h3>
                        <p class="text-gray-500">Ketikkan kata kunci di atas untuk mencari.</p>
                    </div>
                @else
                    <h3 class="text-lg font-medium text-gray-600 mb-6">Menampilkan hasil untuk: <span class="font-bold text-gray-900">"{{ $query }}"</span></h3>
                    
                    @php $hasResults = false; @endphp

                    <!-- Hasil Pengguna (Admin Only) -->
                    @if(isset($results['users']) && $results['users']->count() > 0)
                        @php $hasResults = true; @endphp
                        <div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                Pengguna ({{ $results['users']->count() }})
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($results['users'] as $user)
                                <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-4">
                                    <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=0D8ABC&color=fff' }}" class="w-12 h-12 rounded-full object-cover">
                                    <div>
                                        <h5 class="font-bold text-gray-900 text-sm line-clamp-1">{{ $user->name }}</h5>
                                        <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Hasil Kelas -->
                    @if(isset($results['classrooms']) && $results['classrooms']->count() > 0)
                        @php $hasResults = true; @endphp
                        <div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                Kelas ({{ $results['classrooms']->count() }})
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($results['classrooms'] as $class)
                                <a href="{{ route('classrooms.show', $class->id) }}" class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm hover:border-[#007cc3] transition group">
                                    <div class="bg-[#007cc3] text-white text-[10px] font-bold px-2 py-1 rounded inline-block mb-2">{{ $class->code }}</div>
                                    <h5 class="font-bold text-gray-900 line-clamp-1 group-hover:text-[#007cc3] transition">{{ $class->name }}</h5>
                                    @if($class->teacher)
                                        <p class="text-xs text-gray-500 mt-2">Guru: {{ $class->teacher->name }}</p>
                                    @endif
                                </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Hasil Tugas -->
                    @if(isset($results['assignments']) && $results['assignments']->count() > 0)
                        @php $hasResults = true; @endphp
                        <div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                Tugas ({{ $results['assignments']->count() }})
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($results['assignments'] as $assignment)
                                <a href="{{ auth()->user()->isTeacher() ? '/guru/assignments' : route('assignments.show', $assignment->id) }}" class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm hover:border-orange-500 transition group flex items-start gap-4">
                                    <div class="w-10 h-10 bg-orange-50 text-orange-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                    </div>
                                    <div>
                                        <h5 class="font-bold text-gray-900 group-hover:text-orange-600 transition">{{ $assignment->title }}</h5>
                                        <p class="text-xs text-gray-500 mt-1">{{ $assignment->classroom->name ?? 'Kelas' }}</p>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Hasil Materi -->
                    @if(isset($results['materials']) && $results['materials']->count() > 0)
                        @php $hasResults = true; @endphp
                        <div>
                            <h4 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                Materi Pembelajaran ({{ $results['materials']->count() }})
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($results['materials'] as $material)
                                <a href="{{ route('classrooms.show', $material->classroom_id) }}" class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm hover:border-[#007cc3] transition group flex items-start gap-4">
                                    <div class="w-10 h-10 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                    </div>
                                    <div>
                                        <h5 class="font-bold text-gray-900 group-hover:text-blue-600 transition">{{ $material->title }}</h5>
                                        <p class="text-xs text-gray-500 mt-1">{{ $material->classroom->name ?? 'Kelas' }}</p>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Jika tidak ada hasil sama sekali -->
                    @if(!$hasResults)
                        <div class="bg-white rounded-3xl p-12 text-center border border-gray-100 shadow-sm">
                            <div class="w-20 h-20 bg-gray-50 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Tidak ada hasil ditemukan</h3>
                            <p class="text-gray-500">Coba gunakan kata kunci lain yang lebih umum.</p>
                        </div>
                    @endif

                @endif
            </div>
        </div>
    </main>

</body>
</html>

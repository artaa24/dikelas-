<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Hide scrollbar for clean UI but keep functionality */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    <!-- Left Sidebar -->
    @include('components.sidebar-student', ['active' => 'dashboard'])

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <!-- Header -->
        <header class="h-20 bg-[#F8FAFC] flex items-center justify-between px-8 xl:px-10 flex-shrink-0">
            <!-- Search -->
            <form action="{{ route('search') }}" method="GET" class="flex-1 max-w-2xl">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-5">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" name="q" value="{{ request('q') }}" class="w-full bg-white border border-gray-200 rounded-full py-3.5 pl-12 pr-4 text-sm focus:outline-none focus:ring-1 focus:ring-[#007cc3]" placeholder="Cari materi, tugas, atau mentor...">
                </div>
            </form>

            <!-- Right Actions -->
            <div class="flex items-center space-x-6 ml-6">
                <a href="/notifications" class="text-gray-400 hover:text-[#007cc3] relative transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    @if($unreadNotifs > 0)
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                    @endif
                </a>
                <button class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                </button>
                <div class="h-8 w-px bg-gray-200"></div>
                <a href="/edit-profile" class="flex items-center cursor-pointer">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=0D8ABC&color=fff' }}" alt="User Avatar">
                </a>
            </div>
        </header>

        <!-- Scrollable Dashboard Content -->
        <div class="flex-1 overflow-auto hide-scrollbar px-8 xl:px-10 pb-10 flex flex-col xl:flex-row gap-8">
            
            <!-- Left Side (Main Dashboard Content) -->
            <div class="flex-1 min-w-0">
                <!-- Welcome Banner -->
                <div class="bg-[#007cc3] rounded-[2rem] p-10 text-white mb-8 shadow-xl shadow-blue-900/10 relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 bg-white opacity-5 rounded-full"></div>
                    <div class="absolute bottom-0 left-10 -mb-16 w-32 h-32 bg-white opacity-10 rounded-full"></div>
                    
                    <h2 class="text-4xl font-bold mb-4 flex items-center relative z-10">
                        Selamat Datang, {{ explode(' ', auth()->user()->name)[0] }}!
                    </h2>
                    <p class="text-blue-50 text-lg mb-8 max-w-2xl relative z-10 leading-relaxed opacity-90">
                        Siap belajar hari ini? @if($activeAssignments > 0) Saat ini kamu memiliki {{ $activeAssignments }} tugas aktif yang perlu dikerjakan. @else Kamu sudah menyelesaikan semua tugas! Waktunya bersantai atau mempelajari materi baru. @endif Terus pertahankan semangatmu!
                    </p>
                    <a href="/courses" class="bg-white text-[#007cc3] px-6 py-3 rounded-full font-semibold shadow hover:bg-gray-50 transition relative z-10 inline-block text-center">
                        Lanjutkan Belajar
                    </a>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mb-10">
                    <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center">
                        <div class="w-12 h-12 rounded-full bg-[#E5F9FC] text-[#02B1CC] flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <p class="text-sm text-gray-500 font-medium mb-1">Kelas Diikuti</p>
                        <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ $totalClasses }} <span class="text-sm font-medium text-gray-500">Kelas</span></h3>
                    </div>
                    
                    <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center">
                        <div class="w-12 h-12 rounded-full bg-[#E8F1FC] text-[#3B82F6] flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        </div>
                        <p class="text-sm text-gray-500 font-medium mb-1">Tugas Aktif</p>
                        <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ $activeAssignments }} <span class="text-sm font-medium text-gray-500">Tugas</span></h3>
                    </div>

                    <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center">
                        <div class="w-12 h-12 rounded-full bg-[#EBF8F2] text-[#10B981] flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                        </div>
                        <p class="text-sm text-gray-500 font-medium mb-1">Rata-rata Nilai</p>
                        <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ $averageScore ?? '0' }} <span class="text-sm font-medium text-gray-500">/ 100</span></h3>
                    </div>

                    <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center">
                        <div class="w-12 h-12 rounded-full bg-[#E5F7F9] text-[#02A7A4] flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-sm text-gray-500 font-medium mb-1">Tugas Selesai</p>
                        <h3 class="text-3xl font-bold text-gray-900 mb-1">{{ $completedAssignments }} <span class="text-sm font-medium text-gray-500">Tugas</span></h3>
                    </div>
                </div>

                <!-- Kursus Aktif -->
                <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Kursus Aktif</h3>
                    </div>
                </div>

                <!-- Course Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($classrooms as $classroom)
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
                        <div class="h-44 bg-gray-200 relative">
                            @if($classroom->banner_image)
                                <img src="{{ asset('storage/' . $classroom->banner_image) }}" class="w-full h-full object-cover" alt="Course Image">
                            @else
                                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover" alt="Course Image">
                            @endif
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-[#007cc3] text-xs font-bold px-4 py-1.5 rounded-full shadow-sm">{{ $classroom->code }}</div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <h3 class="font-bold text-lg text-gray-900 mb-2">{{ $classroom->name }}</h3>
                            @php
                                $aCount = \App\Models\Assignment::where('classroom_id', $classroom->id)->count();
                                $completedCount = \App\Models\Submission::where('student_id', auth()->id())
                                    ->whereHas('assignment', function($q) use ($classroom) {
                                        $q->where('classroom_id', $classroom->id);
                                    })->count();
                                $progressPercent = $aCount > 0 ? round(($completedCount / $aCount) * 100) : 0;
                            @endphp
                            <div class="w-full bg-gray-100 rounded-full h-2 mb-6 mt-4">
                                <div class="bg-[#007cc3] h-2 rounded-full transition-all duration-1000" style="width: {{ $progressPercent }}%"></div>
                            </div>
                            
                            <div class="flex items-center justify-between text-xs text-gray-500 mb-6 font-medium">
                                @php
                                    $mCount = \App\Models\Material::where('classroom_id', $classroom->id)->count();
                                @endphp
                                <div class="flex items-center"><svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg> {{ $mCount }} Materi</div>
                                <div class="flex items-center"><svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg> {{ $aCount }} Tugas</div>
                            </div>
                            
                            <a href="/classrooms/{{ $classroom->id }}" class="w-full bg-[#007cc3] hover:bg-blue-700 text-white font-bold py-3 rounded-full flex items-center justify-center transition mt-auto text-sm">
                                Masuk Kelas <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-12 text-center text-gray-500 bg-white rounded-3xl border border-gray-100">
                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        <p class="text-lg font-medium text-gray-900">Belum ada kelas</p>
                        <p class="text-sm mt-1">Anda belum bergabung dengan kelas manapun.</p>
                        <a href="/courses" class="inline-block mt-4 text-[#007cc3] hover:underline font-medium text-sm">Cari Kelas</a>
                    </div>
                    @endforelse

                </div>
            </div>
            
            <!-- Right Sidebar (Agenda) -->
            <div class="w-full xl:w-72 flex-shrink-0">
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-gray-900">Agenda Terdekat</h3>
                        <a href="/schedule" class="text-xs text-[#007cc3] font-medium hover:underline">Lihat Semua</a>
                    </div>
                    
                    <div class="space-y-4">
                        @forelse($upcomingAssignments ?? [] as $assignment)
                        <div class="flex items-start">
                            <div class="bg-gray-100 rounded-xl p-2 w-14 text-center mr-4 flex-shrink-0">
                                <span class="block text-[10px] font-bold text-gray-500 uppercase">{{ \Carbon\Carbon::parse($assignment->deadline_at)->format('M') }}</span>
                                <span class="block text-xl font-bold text-gray-900">{{ \Carbon\Carbon::parse($assignment->deadline_at)->format('d') }}</span>
                            </div>
                            <div class="pt-1">
                                <h4 class="text-sm font-bold text-gray-900 leading-tight mb-1 line-clamp-1">{{ $assignment->title }}</h4>
                                <div class="flex items-center text-xs text-gray-500">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ \Carbon\Carbon::parse($assignment->deadline_at)->format('H:i') }} WIB
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center text-sm text-gray-500 py-4">Tidak ada agenda mendesak.</div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>

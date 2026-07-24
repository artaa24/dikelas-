<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugasku - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    <!-- Left Sidebar -->
    @include('components.sidebar-student', ['active' => 'assignments'])

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <!-- Header -->
        <header class="h-20 bg-[#F8FAFC] flex items-center justify-between px-8 xl:px-10 flex-shrink-0 border-b border-gray-100">
            <!-- Search -->
            <div class="flex-1 max-w-2xl">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-5">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" class="w-full bg-white border border-gray-200 rounded-full py-3.5 pl-12 pr-4 text-sm focus:outline-none focus:ring-1 focus:ring-[#007cc3]" placeholder="Cari materi, tugas, atau kursus...">
                </div>
            </div>

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

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-auto hide-scrollbar px-8 xl:px-10 py-8">
            
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Tugasku</h2>
                    <p class="text-gray-500">Kelola dan kumpulkan tugas Anda sebelum tenggat waktu.</p>
                </div>
                <!-- Filtering -->
                <div class="flex bg-white rounded-full p-1 border border-gray-200 shadow-sm" id="assignment-filters">
                    <button onclick="filterAssignments('all', this)" class="filter-btn px-6 py-2 rounded-full bg-[#007cc3] text-white text-sm font-semibold shadow-sm transition">Semua Tugas ({{ count($assignments) }})</button>
                    <button onclick="filterAssignments('pending', this)" class="filter-btn px-6 py-2 rounded-full text-gray-600 hover:bg-gray-100 text-sm font-semibold transition">Perlu Dikerjakan</button>
                    <button onclick="filterAssignments('completed', this)" class="filter-btn px-6 py-2 rounded-full text-gray-600 hover:bg-gray-100 text-sm font-semibold transition">Selesai</button>
                </div>
            </div>

            <!-- List of Assignments -->
            <div class="space-y-4">
                
                @forelse($assignments as $assignment)
                @php
                    $sub = $assignment->submissions->first();
                    $isLate = now()->gt($assignment->deadline_at);
                    
                    $filterStatus = 'pending';
                    
                    if ($sub && $sub->status == 'graded') {
                        $borderColor = 'border-green-100 bg-gray-50 opacity-75';
                        $lineColor = 'bg-green-500';
                        $iconBg = 'bg-green-100 text-green-600';
                        $statusText = 'Dinilai';
                        $statusBg = 'bg-green-100 text-green-700 border-green-200';
                        $filterStatus = 'completed';
                    } elseif ($sub) {
                        $borderColor = 'border-blue-100 bg-white';
                        $lineColor = 'bg-[#007cc3]';
                        $iconBg = 'bg-blue-50 text-[#007cc3]';
                        $statusText = 'Terkumpul';
                        $statusBg = 'bg-blue-100 text-blue-700 border-blue-200';
                        $filterStatus = 'completed';
                    } elseif ($isLate) {
                        $borderColor = 'border-red-100 bg-white';
                        $lineColor = 'bg-red-500';
                        $iconBg = 'bg-red-50 text-red-600';
                        $statusText = 'Terlambat';
                        $statusBg = 'bg-red-100 text-red-700 border-red-200';
                    } else {
                        $borderColor = 'border-yellow-100 bg-white hover:shadow-md';
                        $lineColor = 'bg-yellow-400';
                        $iconBg = 'bg-yellow-50 text-yellow-600';
                        $statusText = 'Belum Dikerjakan';
                        $statusBg = 'bg-yellow-100 text-yellow-700 border-yellow-200';
                    }
                @endphp
                <div class="assignment-item rounded-2xl p-6 shadow-sm border {{ $borderColor }} transition-shadow flex flex-col md:flex-row md:items-center justify-between gap-6 relative overflow-hidden" data-status="{{ $filterStatus }}">
                    <div class="absolute left-0 top-0 bottom-0 w-1.5 {{ $lineColor }}"></div>
                    
                    <div class="flex items-start gap-5 flex-1 pl-2">
                        <div class="{{ $iconBg }} p-3.5 rounded-xl">
                            @if($sub && $sub->status == 'graded')
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            @else
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            @endif
                        </div>
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <span class="bg-gray-100 text-gray-700 text-[10px] font-bold px-2 py-0.5 rounded-md uppercase tracking-wide">{{ $assignment->classroom->name }}</span>
                                <span class="text-xs font-semibold {{ $isLate && !$sub ? 'text-red-500 flex items-center' : 'text-gray-500' }}">
                                    @if($isLate && !$sub)
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    @endif
                                    Tenggat: {{ \Carbon\Carbon::parse($assignment->deadline_at)->format('d M Y, H:i') }}
                                </span>
                            </div>
                            <h3 class="text-lg font-bold {{ $sub && $sub->status == 'graded' ? 'text-gray-700 line-through' : 'text-gray-900' }} mb-1">{{ $assignment->title }}</h3>
                            <p class="text-sm text-gray-500 line-clamp-2">{{ $assignment->description }}</p>
                        </div>
                    </div>
                    
                    <div class="flex flex-col md:items-end gap-3 min-w-[140px]">
                        @if($sub && $sub->status == 'graded')
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Nilai</span>
                            <div class="flex items-end text-green-600 font-black">
                                <span class="text-3xl leading-none">{{ $sub->score }}</span>
                                <span class="text-sm pb-0.5">/{{ $assignment->max_score }}</span>
                            </div>
                            <a href="{{ route('assignments.show', $assignment->id) }}" class="mt-2 text-[#007cc3] text-sm font-semibold hover:underline text-center block">
                                Lihat Feedback
                            </a>
                        @else
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Status</span>
                            <span class="px-3 py-1 text-xs font-bold rounded-full border {{ $statusBg }}">{{ $statusText }}</span>
                            <a href="{{ route('assignments.show', $assignment->id) }}" class="mt-2 bg-[#007cc3] hover:bg-blue-700 text-white text-sm font-semibold py-2 px-5 rounded-xl shadow-sm transition-all w-full md:w-auto text-center block">
                                {{ $sub ? 'Lihat Tugas' : 'Kerjakan' }}
                            </a>
                        @endif
                    </div>
                </div>
                @empty
                <div class="text-center py-10">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Belum ada tugas</h3>
                    <p class="text-gray-500">Hore! Belum ada tugas yang diberikan oleh guru.</p>
                </div>
                @endforelse

            </div>
        </div>
    </main>

    <script>
        function filterAssignments(status, btn) {
            // Update class buttons
            document.querySelectorAll('.filter-btn').forEach(b => {
                b.classList.remove('bg-[#007cc3]', 'text-white', 'shadow-sm');
                b.classList.add('text-gray-600', 'hover:bg-gray-100');
            });
            btn.classList.remove('text-gray-600', 'hover:bg-gray-100');
            btn.classList.add('bg-[#007cc3]', 'text-white', 'shadow-sm');

            // Toggle visibility
            document.querySelectorAll('.assignment-item').forEach(item => {
                if (status === 'all' || item.getAttribute('data-status') === status) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>

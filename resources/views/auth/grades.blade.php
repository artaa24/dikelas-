<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Saya - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    <!-- Left Sidebar -->
    @include('components.sidebar-student', ['active' => 'grades'])

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">

        <!-- Header -->
        <header class="h-20 bg-white flex items-center justify-between px-8 xl:px-10 flex-shrink-0 border-b border-gray-100">
            <div class="flex-1 max-w-2xl">
                <h2 class="text-xl font-bold text-gray-900">Nilai Saya</h2>
            </div>

            <div class="flex items-center space-x-6 ml-6">
                <a href="/notifications" class="text-gray-400 hover:text-[#007cc3] relative transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    @if($unreadNotifs > 0)
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                    @endif
                </a>
                <div class="h-8 w-px bg-gray-200"></div>
                <a href="/profile" class="flex items-center cursor-pointer">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=0D8ABC&color=fff' }}" alt="User Avatar">
                </a>
            </div>
        </header>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-auto hide-scrollbar p-8 xl:p-10">

            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Nilai Saya</h2>
                <p class="text-gray-500">Lihat hasil evaluasi tugas dan kuis yang telah Anda kerjakan.</p>
            </div>

            <!-- Summary -->
            @if($allGrades->count() > 0)
            @php
                $avgScore = $allGrades->count() > 0 ? round($allGrades->sum('score') / max($allGrades->sum('max_score'), 1) * 100, 1) : 0;
            @endphp
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-sm text-gray-500 font-medium mb-1">Rata-rata Nilai</p>
                    <h3 class="text-3xl font-bold {{ $avgScore >= 70 ? 'text-green-600' : 'text-red-500' }}">{{ $avgScore }}%</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-sm text-gray-500 font-medium mb-1">Tugas Dinilai</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $allGrades->where('type', 'Tugas')->count() }}</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-sm text-gray-500 font-medium mb-1">Kuis Selesai</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $allGrades->where('type', 'Kuis')->count() }}</h3>
                </div>
            </div>
            @endif

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                                <th class="p-4 font-medium rounded-tl-xl">Jenis</th>
                                <th class="p-4 font-medium">Tugas / Kuis</th>
                                <th class="p-4 font-medium">Kelas</th>
                                <th class="p-4 font-medium">Dinilai Pada</th>
                                <th class="p-4 font-medium text-right rounded-tr-xl">Nilai</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @forelse($allGrades as $grade)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="p-4">
                                    @if($grade->type === 'Tugas')
                                        <span class="px-2.5 py-1 bg-blue-50 text-blue-600 text-xs font-bold rounded-full border border-blue-100">Tugas</span>
                                    @else
                                        <span class="px-2.5 py-1 bg-purple-50 text-purple-600 text-xs font-bold rounded-full border border-purple-100">Kuis</span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-xl {{ $grade->type === 'Tugas' ? 'bg-blue-50 text-[#007cc3]' : 'bg-purple-50 text-purple-600' }} flex items-center justify-center mr-3 flex-shrink-0">
                                            @if($grade->type === 'Tugas')
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                            @else
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900">{{ $grade->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 text-gray-600 font-medium">{{ $grade->classroom_name }}</td>
                                <td class="p-4 text-gray-500">{{ $grade->graded_at ? \Carbon\Carbon::parse($grade->graded_at)->format('d M Y, H:i') : '-' }}</td>
                                <td class="p-4 text-right">
                                    <span class="inline-flex items-center justify-center px-3 py-1 {{ ($grade->score / max($grade->max_score, 1) * 100) >= 70 ? 'bg-green-50 text-green-700 border-green-200' : 'bg-red-50 text-red-600 border-red-200' }} rounded-lg font-bold text-base border">
                                        {{ $grade->score }} <span class="text-sm font-normal text-gray-400 ml-1">/ {{ $grade->max_score }}</span>
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-12 text-center">
                                    <div class="w-20 h-20 bg-gray-50 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">Belum Ada Nilai</h3>
                                    <p class="text-gray-500 text-sm">Belum ada tugas atau kuis yang dinilai oleh guru Anda.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

</body>
</html>

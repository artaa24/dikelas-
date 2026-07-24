<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Nilai - DIKELAS</title>
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
        @include('components.sidebar-guru', ['active' => 'grades'])
    @else
        @include('components.sidebar-student', ['active' => 'grades'])
    @endif

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        <!-- Header -->
        <header class="h-20 bg-white flex items-center justify-between px-8 border-b border-gray-100 flex-shrink-0">
            <div class="flex items-center text-sm text-gray-400 font-medium">
                <a href="{{ route('classrooms.show', $classroom->id) }}" class="hover:text-gray-700">{{ $classroom->name }}</a>
                <span class="mx-2">/</span>
                <span class="text-[#007cc3]">Rekap Nilai</span>
            </div>
            <div class="flex items-center space-x-6">
                <a href="{{ route('classrooms.show', $classroom->id) }}" class="text-sm text-gray-500 hover:text-[#007cc3] font-medium transition">Kembali ke Kelas</a>
            </div>
        </header>

        <!-- Content -->
        <div class="flex-1 overflow-auto hide-scrollbar p-8 xl:p-10">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Rekap Nilai</h2>
                <p class="text-gray-500">Ringkasan nilai seluruh siswa di kelas {{ $classroom->name }} ({{ $assignments->count() }} tugas, {{ $quizzes->count() }} kuis).</p>
            </div>

            @if(count($recap) > 0)
            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-sm text-gray-500 font-medium mb-1">Total Siswa</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ count($recap) }}</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-sm text-gray-500 font-medium mb-1">Rata-rata Kelas</p>
                    @php
                        $averages = array_column($recap, 'average');
                        $validAverages = array_filter($averages, fn($a) => $a !== null);
                        $classAvg = count($validAverages) > 0 ? round(array_sum($validAverages) / count($validAverages), 1) : '-';
                    @endphp
                    <h3 class="text-3xl font-bold {{ $classAvg !== '-' && $classAvg >= 70 ? 'text-green-600' : 'text-red-500' }}">{{ $classAvg }}{{ $classAvg !== '-' ? '%' : '' }}</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-sm text-gray-500 font-medium mb-1">Tugas/Kuis Terdaftar</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $assignments->count() + $quizzes->count() }}</h3>
                </div>
            </div>

            <!-- Grade Table -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100">
                                <th class="p-4 font-semibold text-gray-500 sticky left-0 bg-gray-50 z-10 min-w-[180px]">Nama Siswa</th>
                                @foreach($assignments as $assignment)
                                <th class="p-4 font-semibold text-gray-500 text-center min-w-[100px]" title="Tugas: {{ $assignment->title }}">
                                    <span class="text-[10px] uppercase tracking-wider text-blue-400 block mb-0.5">Tugas</span>
                                    {{ \Illuminate\Support\Str::limit($assignment->title, 20) }}
                                </th>
                                @endforeach
                                @foreach($quizzes as $quiz)
                                <th class="p-4 font-semibold text-gray-500 text-center min-w-[100px]" title="Kuis: {{ $quiz->title }}">
                                    <span class="text-[10px] uppercase tracking-wider text-purple-400 block mb-0.5">Kuis</span>
                                    {{ \Illuminate\Support\Str::limit($quiz->title, 20) }}
                                </th>
                                @endforeach
                                <th class="p-4 font-semibold text-gray-500 text-center min-w-[80px] bg-gray-50 sticky right-0 z-10">Rata-rata</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($recap as $item)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="p-4 font-bold text-gray-900 sticky left-0 bg-white z-10">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-xs mr-3 flex-shrink-0 uppercase">
                                            {{ substr($item['student']->name, 0, 2) }}
                                        </div>
                                        <div>
                                            <p class="font-bold">{{ $item['student']->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                @foreach($item['grades'] as $grade)
                                <td class="p-4 text-center">
                                    @if($grade['score'] !== null)
                                        <span class="font-bold {{ $grade['score'] / max($grade['max_score'], 1) * 100 >= 70 ? 'text-green-600' : 'text-red-500' }}">
                                            {{ $grade['score'] }}
                                        </span>
                                        <span class="text-gray-400">/{{ $grade['max_score'] }}</span>
                                        <div class="mt-1">
                                            @if($grade['type'] === 'Tugas' && $grade['status'] === 'Dinilai')
                                                <span class="text-[9px] text-green-500 font-medium">Dinilai</span>
                                            @elseif($grade['type'] === 'Kuis')
                                                <span class="text-[9px] text-purple-500 font-medium">Kuis</span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-gray-300">-</span>
                                        <div class="mt-1">
                                            <span class="text-[9px] text-gray-400">Belum</span>
                                        </div>
                                    @endif
                                </td>
                                @endforeach
                                <td class="p-4 text-center bg-gray-50/50 sticky right-0 z-10">
                                    @if($item['average'] !== null)
                                        <span class="text-lg font-bold {{ $item['average'] >= 70 ? 'text-green-600' : 'text-red-500' }}">
                                            {{ $item['average'] }}%
                                        </span>
                                        <div class="mt-1">
                                            @if($item['average'] >= 70)
                                                <span class="text-[9px] text-green-500 font-medium px-2 py-0.5 bg-green-50 rounded-full border border-green-100">Lulus</span>
                                            @else
                                                <span class="text-[9px] text-red-500 font-medium px-2 py-0.5 bg-red-50 rounded-full border border-red-100">Perlu Peningkatan</span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-gray-300">-</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-gray-100 flex items-center justify-between">
                    <p class="text-xs text-gray-500">{{ count($recap) }} siswa • {{ $assignments->count() }} tugas • {{ $quizzes->count() }} kuis</p>
                    <p class="text-xs text-gray-400">Nilai ≥ 70% = Lulus</p>
                </div>
            </div>
            @else
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-12 text-center">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                <h3 class="text-lg font-bold text-gray-900 mb-1">Belum Ada Data Nilai</h3>
                <p class="text-gray-500 text-sm mb-4">Belum ada siswa yang dinilai di kelas ini.</p>
                <a href="{{ route('classrooms.show', $classroom->id) }}" class="inline-block bg-[#007cc3] text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition">Kembali ke Kelas</a>
            </div>
            @endif
        </div>
    </main>
</body>
</html>

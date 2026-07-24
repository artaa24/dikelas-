<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Nilai Siswa - DIKELAS</title>
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
                <a href="{{ route('classrooms.grades.index', $classroom->id) }}" class="hover:text-gray-700">Rekap Nilai</a>
                <span class="mx-2">/</span>
                <span class="text-[#007cc3]">Detail Nilai</span>
            </div>
            <button onclick="window.history.back()" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-5 rounded-xl text-sm transition">
                Kembali
            </button>
        </header>

        <!-- Content -->
        <div class="flex-1 overflow-auto hide-scrollbar p-8 xl:p-10">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Rincian Nilai</h2>
                <p class="text-gray-500">Nilai untuk kelas {{ $classroom->name }}.</p>
            </div>

            @if($grades->count() > 0)
            <!-- Summary -->
            @php
                $gradedItems = $grades->filter(fn($g) => $g->score !== null);
                $avgScore = $gradedItems->count() > 0 ? round($gradedItems->sum('score') / $gradedItems->sum('max_score') * 100, 1) : null;
            @endphp
            @if($avgScore !== null)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-sm text-gray-500 font-medium mb-1">Rata-rata Nilai</p>
                    <h3 class="text-3xl font-bold {{ $avgScore >= 70 ? 'text-green-600' : 'text-red-500' }}">{{ $avgScore }}%</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-sm text-gray-500 font-medium mb-1">Tugas Dinilai</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $grades->where('type', 'Tugas')->whereNotNull('score')->count() }} / {{ $grades->where('type', 'Tugas')->count() }}</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <p class="text-sm text-gray-500 font-medium mb-1">Kuis Selesai</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $grades->where('type', 'Kuis')->whereNotNull('score')->count() }} / {{ $grades->where('type', 'Kuis')->count() }}</h3>
                </div>
            </div>
            @endif

            <!-- Detail Table -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50 border-b border-gray-100">
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Jenis</th>
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Nama</th>
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Nilai</th>
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Status</th>
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Tanggal</th>
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Umpan Balik</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($grades as $grade)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-4 px-6">
                                    @if($grade->type === 'Tugas')
                                        <span class="px-2.5 py-1 bg-blue-50 text-blue-600 text-xs font-bold rounded-full border border-blue-100">Tugas</span>
                                    @else
                                        <span class="px-2.5 py-1 bg-purple-50 text-purple-600 text-xs font-bold rounded-full border border-purple-100">Kuis</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-800 font-bold">{{ $grade->name }}</td>
                                <td class="py-4 px-6 font-bold text-lg {{ $grade->score !== null && ($grade->score / max($grade->max_score, 1) * 100) >= 70 ? 'text-green-600' : 'text-red-500' }}">
                                    @if($grade->score !== null)
                                        {{ $grade->score }} <span class="text-sm font-normal text-gray-400">/ {{ $grade->max_score }}</span>
                                    @else
                                        <span class="text-gray-300 text-base">-</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6">
                                    @if($grade->score !== null)
                                        @if(($grade->score / max($grade->max_score, 1) * 100) >= 70)
                                            <span class="px-3 py-1 bg-green-50 text-green-600 text-xs font-bold rounded-full border border-green-200">Lulus</span>
                                        @else
                                            <span class="px-3 py-1 bg-red-50 text-red-600 text-xs font-bold rounded-full border border-red-200">Perlu Peningkatan</span>
                                        @endif
                                    @else
                                        <span class="px-3 py-1 bg-gray-100 text-gray-500 text-xs font-bold rounded-full border border-gray-200">Belum Dinilai</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500">
                                    {{ $grade->graded_at ? \Carbon\Carbon::parse($grade->graded_at)->format('d M Y, H:i') : '-' }}
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500">
                                    {{ $grade->feedback ?? '-' }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="py-8 px-6 text-center text-gray-500">
                                    Belum ada nilai yang tersedia.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-12 text-center">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                <h3 class="text-lg font-bold text-gray-900 mb-1">Belum Ada Nilai</h3>
                <p class="text-gray-500 text-sm">Belum ada tugas atau kuis yang dinilai.</p>
            </div>
            @endif
        </div>
    </main>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Siswa - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
    </style>
</head>
<body class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    @if(auth()->user()->role->name == 'student')
        @include('components.sidebar-student', ['active' => 'grades'])
    @elseif(auth()->user()->role->name == 'teacher')
        @include('components.sidebar-teacher', ['active' => 'grades'])
    @else
        @include('components.sidebar-admin', ['active' => 'grades'])
    @endif

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-full overflow-hidden relative">
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-8 z-10">
            <div class="flex items-center text-gray-400 text-sm font-medium">
                <span class="hover:text-gray-900 cursor-pointer">Nilai</span>
                <span class="mx-2">/</span>
                <span class="text-[#007cc3]">{{ $classroom->name }}</span>
            </div>
            <div class="flex items-center gap-6">
                <div class="flex items-center">
                    <img class="h-10 w-10 rounded-full object-cover shadow-sm" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=0D8ABC&color=fff' }}" alt="User Avatar">
                    <div class="ml-3 hidden md:block">
                        <p class="text-sm font-bold text-gray-900">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500 capitalize">{{ str_replace('_', ' ', auth()->user()->role->name) }}</p>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-auto p-8 xl:p-10">
            <div class="mb-8 flex justify-between items-end">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Rincian Nilai</h2>
                    <p class="text-gray-500">Nilai untuk kelas {{ $classroom->name }}.</p>
                </div>
                <button onclick="window.history.back()" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-2.5 px-6 rounded-xl transition">
                    Kembali
                </button>
            </div>

            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50 border-b border-gray-100">
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Tugas/Kuis</th>
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Nilai</th>
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Status</th>
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Tanggal Penilaian</th>
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Umpan Balik</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($grades as $grade)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-4 px-6 text-sm text-gray-800 font-bold">
                                    {{ $grade->assignment->title ?? 'Tugas/Kuis' }}
                                </td>
                                <td class="py-4 px-6 font-bold text-[#007cc3]">
                                    {{ $grade->score }} / 100
                                </td>
                                <td class="py-4 px-6">
                                    @if($grade->score >= 70)
                                        <span class="px-3 py-1 bg-green-50 text-green-600 text-xs font-bold rounded-full border border-green-200">Lulus</span>
                                    @else
                                        <span class="px-3 py-1 bg-red-50 text-red-600 text-xs font-bold rounded-full border border-red-200">Tidak Lulus</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500">
                                    {{ $grade->created_at->format('d M Y, H:i') }}
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500">
                                    {{ $grade->feedback ?? '-' }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-8 px-6 text-center text-gray-500">
                                    Belum ada nilai yang dimasukkan.
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

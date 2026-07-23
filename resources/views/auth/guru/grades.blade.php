<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian - DIKELAS</title>
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
    @include('components.sidebar-guru', ['active' => 'grades'])

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <!-- Header -->
        <header class="h-20 bg-[#F8FAFC] flex items-center justify-between px-8 flex-shrink-0 border-b border-gray-100">
            <h2 class="text-2xl font-bold text-gray-900">Penilaian Tugas</h2>

            <!-- Right Actions -->
            <div class="flex items-center space-x-6 ml-6">
                <a href="/notifications" class="text-gray-400 hover:text-[#007cc3] relative transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    @php
                        $unreadNotifs = \App\Models\Notification::where('notifiable_id', auth()->id())->whereNull('read_at')->count();
                    @endphp
                    @if($unreadNotifs > 0)
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                    @endif
                </a>
                <div class="h-8 w-px bg-gray-200"></div>
                <a href="/edit-profile" class="flex items-center cursor-pointer">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=0D8ABC&color=fff' }}" alt="User Avatar">
                </a>
            </div>
        </header>

        <!-- Scrollable Dashboard Content -->
        <div class="flex-1 overflow-auto hide-scrollbar px-8 py-8">
            
            <div class="bg-white rounded-3xl p-6 mb-8 border border-gray-100 shadow-sm flex flex-col md:flex-row gap-6 items-start md:items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">
                        {{ $selectedAssignment ? $selectedAssignment->title : 'Pilih Tugas' }}
                    </h3>
                    @if($selectedAssignment)
                    <p class="text-sm text-gray-500">Kelas: <span class="font-semibold text-[#0A4B7D]">{{ $selectedAssignment->classroom->name ?? '-' }}</span> • Deadline: {{ \Carbon\Carbon::parse($selectedAssignment->deadline_at)->format('d M Y, H:i') }}</p>
                    @endif
                </div>
                
                <div class="flex items-center space-x-4 w-full md:w-auto">
                    <form action="/guru/grades" method="GET" class="flex-1 md:w-64">
                        <select name="assignment_id" onchange="this.form.submit()" class="w-full bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                            <option value="">Pilih Tugas...</option>
                            @foreach($assignments as $assignment)
                            <option value="{{ $assignment->id }}" {{ $selectedAssignmentId == $assignment->id ? 'selected' : '' }}>
                                {{ $assignment->title }} - {{ $assignment->classroom->name ?? '' }}
                            </option>
                            @endforeach
                        </select>
                    </form>
                    
                    <a href="{{ route('guru.grades.export', ['assignment_id' => $selectedAssignmentId]) }}" class="bg-red-50 text-red-700 hover:bg-red-100 font-medium rounded-xl text-sm px-4 py-2.5 transition flex items-center whitespace-nowrap">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Export PDF
                    </a>
                </div>
            </div>

            <!-- Table of Submissions -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                                <th class="p-5 font-medium">Nama Siswa</th>
                                <th class="p-5 font-medium">Waktu Pengumpulan</th>
                                <th class="p-5 font-medium">File Jawaban</th>
                                <th class="p-5 font-medium text-center">Status</th>
                                <th class="p-5 font-medium">Nilai / Form</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @if($selectedAssignment)
                                @forelse($submissions as $item)
                                @php
                                    $hasSubmitted = $item->submission !== null;
                                    $isGraded = $hasSubmitted && $item->submission->status === 'graded';
                                @endphp
                                <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition {{ !$hasSubmitted ? 'opacity-60' : '' }}">
                                    <td class="p-5">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold mr-3 text-xs uppercase">
                                                {{ substr($item->student->name, 0, 2) }}
                                            </div>
                                            <div>
                                                <p class="font-bold text-gray-900">{{ $item->student->name }}</p>
                                                <p class="text-[11px] text-gray-500">{{ $item->student->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    @if($hasSubmitted)
                                    <td class="p-5 text-gray-600">
                                        {{ \Carbon\Carbon::parse($item->submission->submitted_at)->format('d M Y, H:i') }}
                                        @if($item->submission->submitted_at <= $selectedAssignment->deadline_at)
                                        <span class="block text-[10px] text-green-500 font-medium">Tepat Waktu</span>
                                        @else
                                        <span class="block text-[10px] text-red-500 font-medium">Terlambat</span>
                                        @endif
                                    </td>
                                    <td class="p-5">
                                        @if($item->submission->file_path)
                                        <a href="{{ route('submissions.download', $item->submission->id) }}" target="_blank" class="flex items-center text-[#007cc3] hover:underline text-xs font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                            Lihat File
                                        </a>
                                        @else
                                        <span class="text-xs text-gray-500">-</span>
                                        @endif
                                    </td>
                                    <td class="p-5 text-center">
                                        @if($isGraded)
                                        <span class="px-2.5 py-1 bg-green-50 text-green-600 rounded-full text-[10px] font-bold border border-green-100">Dinilai</span>
                                        @else
                                        <span class="px-2.5 py-1 bg-yellow-50 text-yellow-600 rounded-full text-[10px] font-bold border border-yellow-100">Perlu Dinilai</span>
                                        @endif
                                    </td>
                                    <td class="p-5">
                                        <form action="/submissions/{{ $item->submission->id }}/grade" method="POST" class="flex items-center space-x-2">
                                            @csrf
                                            @if($isGraded)
                                            <input type="number" name="score" value="{{ $item->submission->score }}" class="w-16 border border-gray-300 rounded-lg p-1.5 text-sm focus:ring-blue-500 focus:border-blue-500 text-center font-bold text-lg text-gray-900" min="0" max="100">
                                            <button type="submit" class="text-gray-400 hover:text-[#007cc3] p-1.5 rounded-lg transition" title="Update Nilai">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                            </button>
                                            @else
                                            <input type="number" name="score" class="w-16 border border-gray-300 rounded-lg p-1.5 text-sm focus:ring-blue-500 focus:border-blue-500 text-center" placeholder="0-100" min="0" max="100" required>
                                            <button type="submit" class="bg-[#007cc3] hover:bg-blue-700 text-white p-1.5 rounded-lg transition" title="Beri Nilai">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            </button>
                                            @endif
                                        </form>
                                    </td>
                                    @else
                                    <td class="p-5 text-gray-500 italic text-xs">Belum mengumpulkan</td>
                                    <td class="p-5 text-gray-400 text-xs">-</td>
                                    <td class="p-5 text-center">
                                        <span class="px-2.5 py-1 bg-gray-100 text-gray-500 rounded-full text-[10px] font-bold">Kosong</span>
                                    </td>
                                    <td class="p-5">
                                        <div class="flex items-center space-x-2">
                                            <span class="text-xs text-gray-400 italic">N/A</span>
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="p-8 text-center text-gray-500">Tidak ada data siswa.</td>
                                </tr>
                                @endforelse
                            @else
                                <tr>
                                    <td colspan="5" class="p-8 text-center text-gray-500">Pilih tugas untuk melihat daftar nilai.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                
                <div class="p-4 border-t border-gray-100 flex items-center justify-between">
                    <p class="text-xs text-gray-500">Menampilkan {{ $submissions->count() }} siswa</p>
                </div>
            </div>

        </div>
    </main>

</body>
</html>

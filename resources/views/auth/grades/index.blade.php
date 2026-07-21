<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Nilai - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden">
    @if(auth()->user()->isAdmin())
        @include('components.sidebar-admin', ['active' => ''])
    @elseif(auth()->user()->isTeacher())
        @include('components.sidebar-guru', ['active' => ''])
    @else
        @include('components.sidebar-student', ['active' => ''])
    @endif
    
    <main class="flex-1 flex flex-col h-full overflow-y-auto p-10">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">Rekap Nilai Kelas: {{ $classroom->name }}</h1>
        <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
            <svg class="w-16 h-16 text-green-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
            <h2 class="text-xl font-bold text-gray-800">Fitur Rekap Nilai Sedang Dikembangkan</h2>
            <p class="text-gray-500 mt-2">Halaman antarmuka untuk buku nilai terpadu sedang dalam proses pengerjaan. Backend sudah siap.</p>
            <a href="{{ route('classrooms.show', $classroom->id) }}" class="mt-6 inline-block bg-[#007cc3] text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition">Kembali ke Kelas</a>
        </div>
    </main>
</body>
</html>

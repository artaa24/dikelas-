<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backup Database - Admin DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
    </style>
</head>
<body class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    @include('components.sidebar-admin', ['active' => 'backups'])

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-full overflow-hidden relative">
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-8 z-10">
            <div class="flex items-center text-gray-400 text-sm font-medium">
                <span class="hover:text-gray-900 cursor-pointer">Admin</span>
                <span class="mx-2">/</span>
                <span class="text-[#007cc3]">Backup Data</span>
            </div>
            <div class="flex items-center gap-6">
                <div class="flex items-center">
                    <img class="h-10 w-10 rounded-full object-cover shadow-sm" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=0D8ABC&color=fff' }}" alt="User Avatar">
                    <div class="ml-3 hidden md:block">
                        <p class="text-sm font-bold text-gray-900">{{ auth()->user()->name ?? 'Super Admin' }}</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-auto p-8 xl:p-10">
            @if(session('success'))
            <div class="mb-6 bg-green-50 text-green-600 border border-green-200 rounded-xl p-4 text-sm font-medium flex items-center">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('success') }}
            </div>
            @endif

            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Backup Database</h2>
                    <p class="text-gray-500">Amankan data sistem dengan mencadangkan database secara berkala.</p>
                </div>
                <form action="{{ route('admin.backups.create') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-[#007cc3] hover:bg-blue-700 text-white font-bold py-2.5 px-6 rounded-full shadow-md flex items-center transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                        Buat Backup Manual
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50 border-b border-gray-100">
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Nama File</th>
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Tipe</th>
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Status</th>
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Tanggal Dibuat</th>
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($backups as $backup)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <svg class="w-8 h-8 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                                        <p class="font-bold text-gray-900 text-sm">{{ $backup->file_name }}</p>
                                    </div>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <span class="px-3 py-1 text-xs font-bold rounded-full uppercase tracking-wider {{ $backup->type == 'manual' ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700' }}">
                                        {{ $backup->type }}
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="px-3 py-1 text-xs font-bold rounded-full {{ $backup->status == 'completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                        {{ ucfirst($backup->status) }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-600">
                                    {{ $backup->created_at->format('d M Y, H:i') }}
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <a href="#" class="text-sm font-medium text-[#007cc3] hover:underline" onclick="alert('Fitur download backup segera hadir!')">Download</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-8 px-6 text-center text-gray-500">
                                    Belum ada data backup database.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="p-4 border-t border-gray-100">
                    {{ $backups->links() }}
                </div>
            </div>
        </div>
    </main>
</body>
</html>

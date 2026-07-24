<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Aktivitas - Admin DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
    </style>
</head>
<body class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    @include('components.sidebar-admin', ['active' => 'logs'])

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-full overflow-hidden relative">
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-8 z-10">
            <div class="flex items-center text-gray-400 text-sm font-medium">
                <span class="hover:text-gray-900 cursor-pointer">Admin</span>
                <span class="mx-2">/</span>
                <span class="text-[#007cc3]">Log Aktivitas</span>
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
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Log Aktivitas Pengguna</h2>
                <p class="text-gray-500">Pantau seluruh aktivitas yang terjadi di dalam aplikasi DIKELAS.</p>
            </div>

            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[800px]">
                        <thead>
                            <tr class="bg-gray-50/50 border-b border-gray-100">
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Waktu</th>
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Pengguna</th>
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Aksi</th>
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Deskripsi</th>
                                <th class="py-4 px-6 font-semibold text-gray-500 text-sm">Alamat IP</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($logs as $log)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-600">
                                    {{ $log->created_at->format('d M Y, H:i') }}
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs mr-3">
                                            {{ $log->user ? strtoupper(substr($log->user->name, 0, 1)) : '?' }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900 text-sm">{{ $log->user->name ?? 'Sistem / Guest' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    <span class="px-3 py-1 text-xs font-bold rounded-full bg-gray-100 text-gray-700 uppercase tracking-wider">
                                        {{ str_replace('_', ' ', $log->action) }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-600">
                                    {{ $log->description }}
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap text-xs text-gray-400 font-mono">
                                    {{ $log->ip_address ?? '-' }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-8 px-6 text-center text-gray-500">
                                    Belum ada catatan log aktivitas.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="p-4 border-t border-gray-100">
                    {{ $logs->links() }}
                </div>
            </div>
        </div>
    </main>
</body>
</html>

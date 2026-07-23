<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hak Akses - Admin DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
    </style>
</head>
<body class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    @include('components.sidebar-admin', ['active' => 'permissions'])

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-full overflow-hidden relative">
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-8 z-10">
            <div class="flex items-center text-gray-400 text-sm font-medium">
                <span class="hover:text-gray-900 cursor-pointer">Admin</span>
                <span class="mx-2">/</span>
                <span class="text-[#007cc3]">Hak Akses</span>
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

            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Manajemen Hak Akses</h2>
                <p class="text-gray-500">Atur izin dan hak akses untuk setiap peran (role) dalam sistem.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Role Cards -->
                @foreach($roles as $role)
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 cursor-pointer hover:shadow-md transition {{ request('role') == $role->id ? 'ring-2 ring-[#007cc3]' : '' }}"
                     onclick="window.location.href='?role={{ $role->id }}'">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-bold text-lg
                            @if($role->name == 'super_admin') bg-red-100 text-red-600
                            @elseif($role->name == 'teacher') bg-purple-100 text-purple-600
                            @else bg-green-100 text-green-600 @endif">
                            {{ substr(strtoupper($role->name), 0, 1) }}
                        </div>
                        <span class="text-xs font-bold px-3 py-1 bg-gray-100 text-gray-600 rounded-full">{{ $role->permissions->count() }} Akses</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 capitalize">{{ str_replace('_', ' ', $role->name) }}</h3>
                    <p class="text-sm text-gray-500 mt-1 line-clamp-2">{{ $role->description ?? 'Tidak ada deskripsi' }}</p>
                </div>
                @endforeach
            </div>

            @php
                $activeRole = request('role') ? $roles->where('id', request('role'))->first() : $roles->first();
            @endphp

            @if($activeRole)
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Hak Akses: <span class="capitalize text-[#007cc3]">{{ str_replace('_', ' ', $activeRole->name) }}</span></h3>
                        <p class="text-sm text-gray-500">Centang kotak untuk memberikan izin spesifik pada peran ini.</p>
                    </div>
                </div>
                
                <form action="{{ route('admin.permissions.update', $activeRole->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="p-6">
                        @if($activeRole->name == 'super_admin')
                            <div class="p-4 bg-red-50 text-red-600 rounded-xl text-sm font-medium border border-red-100 mb-6 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                Peringatan: Mengubah hak akses Super Admin bisa menyebabkan Anda kehilangan kontrol atas sistem.
                            </div>
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($permissions as $group => $groupPermissions)
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4 border-b border-gray-100 pb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                    {{ ucfirst($group) }}
                                </h4>
                                <div class="space-y-3">
                                    @foreach($groupPermissions as $permission)
                                    <label class="flex items-start group cursor-pointer">
                                        <div class="flex items-center h-5">
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                                                {{ $activeRole->permissions->contains($permission->id) ? 'checked' : '' }}
                                                class="w-4 h-4 text-[#007cc3] bg-gray-100 border-gray-300 rounded focus:ring-[#007cc3] focus:ring-2">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <span class="font-medium text-gray-700 group-hover:text-gray-900">{{ str_replace('_', ' ', $permission->name) }}</span>
                                        </div>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="p-6 border-t border-gray-100 bg-gray-50/50 flex justify-end">
                        <button type="submit" class="bg-[#007cc3] hover:bg-blue-700 text-white font-bold py-2.5 px-6 rounded-xl shadow-md transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </main>
</body>
</html>

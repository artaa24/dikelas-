<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil & Pengaturan - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    @if(auth()->user()->isAdmin())
        @include('components.sidebar-admin', ['active' => 'profile'])
    @elseif(auth()->user()->isTeacher())
        @include('components.sidebar-guru', ['active' => 'profile'])
    @else
        @include('components.sidebar-student', ['active' => 'profile'])
    @endif

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        <header class="h-20 bg-white flex items-center justify-between px-8 border-b border-gray-100">
            <h2 class="text-xl font-bold text-gray-900">Profil & Pengaturan</h2>
            <div class="flex items-center space-x-6 ml-6">
                <a href="/notifications" class="text-gray-400 hover:text-gray-600 relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </a>
            </div>
        </header>

        <div class="flex-1 overflow-auto p-8 max-w-4xl">
            <!-- Profil Singkat -->
            <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 mb-8 flex items-center">
                <div class="relative">
                    <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&color=007cc3&background=EBF4FF' }}" alt="Profile" class="w-24 h-24 rounded-full border-4 border-white shadow-md object-cover">
                </div>
                <div class="ml-6">
                    <h2 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h2>
                    <p class="text-gray-500">
                        @if($user->isAdmin()) Administrator
                        @elseif($user->isTeacher()) Guru - NIP: {{ $user->nip ?? '-' }}
                        @else Siswa - NISN: {{ $user->nis ?? '-' }}
                        @endif
                    </p>
                    <p class="text-sm font-bold text-[#007cc3] mt-2 bg-blue-50 inline-block px-3 py-1 rounded-full">
                        {{ $user->role->name ?? 'User' }}
                    </p>
                </div>
            </div>

            <!-- Form Edit -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="border-b border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-900">Informasi Pribadi</h3>
                </div>
                
                @if(session('success'))
                <div class="m-6 mb-0 bg-green-50 text-green-600 border border-green-200 rounded-xl p-4 text-sm font-medium flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('success') }}
                </div>
                @endif
                
                @if($errors->any())
                <div class="m-6 mb-0 bg-red-50 text-red-600 border border-red-200 rounded-xl p-4 text-sm font-medium">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form class="p-8 space-y-6" action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:outline-none focus:border-[#007cc3] transition">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:outline-none focus:border-[#007cc3] transition">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon/WhatsApp</label>
                            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:outline-none focus:border-[#007cc3] transition">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Bio / Tentang Saya</label>
                            <textarea name="bio" rows="3" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition">{{ old('bio', $user->bio) }}</textarea>
                        </div>
                    </div>
                    
                    <hr class="border-gray-100 my-4">
                    <h3 class="text-lg font-bold text-gray-900">Keamanan</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Password Baru</label>
                            <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:outline-none focus:border-[#007cc3] transition">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" placeholder="Konfirmasi password baru" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:outline-none focus:border-[#007cc3] transition">
                        </div>
                    </div>

                    <div class="flex justify-end pt-4 space-x-4">
                        <button type="button" onclick="window.location.href='/dashboard'" class="px-6 py-3 border border-gray-200 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition">
                            Batal
                        </button>
                        <button type="submit" class="px-6 py-3 bg-[#007cc3] text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

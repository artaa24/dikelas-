<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
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

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <!-- Header -->
        <header class="h-20 bg-white flex items-center justify-between px-8 xl:px-10 flex-shrink-0 border-b border-gray-100">
            <div class="flex items-center text-sm text-gray-500 font-medium">
                <span class="text-gray-900 font-bold text-lg">Profil Saya</span>
            </div>
            <!-- Right Actions -->
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
        <div class="flex-1 overflow-auto hide-scrollbar p-8 xl:p-10 max-w-4xl mx-auto w-full">
            
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Edit Profil</h2>
                <p class="text-gray-500">Sesuaikan informasi profil Anda agar teman dan guru mudah mengenali Anda.</p>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden mb-8">
                @if(session('success'))
                <div class="m-8 mb-0 bg-green-50 text-green-600 border border-green-200 rounded-xl p-4 text-sm font-medium flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('success') }}
                </div>
                @endif
                
                @if($errors->any())
                <div class="m-8 mb-0 bg-red-50 text-red-600 border border-red-200 rounded-xl p-4 text-sm font-medium">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="flex flex-col">
                    @csrf
                    @method('PUT')
                    
                    <!-- Avatar Upload Section -->
                    <div class="p-8 border-b border-gray-100 bg-gray-50 flex flex-col md:flex-row items-center gap-6">
                        <div class="relative group cursor-pointer flex-shrink-0" onclick="document.getElementById('avatar-input').click()">
                            <img class="h-28 w-28 rounded-full object-cover border-4 border-white shadow-sm" src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&color=007cc3&background=EBF4FF' }}" alt="Student Avatar" id="avatar-preview">
                            <div class="absolute inset-0 bg-black/40 rounded-full opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                        </div>
                        <input type="file" id="avatar-input" name="avatar" class="hidden" accept="image/*" onchange="previewImage(event)">
                        
                        <div class="text-center md:text-left">
                            <h3 class="font-bold text-xl text-gray-900 mb-1">Foto Profil Anda</h3>
                            <p class="text-sm text-gray-500 mb-4">Gunakan rasio 1:1, ukuran maksimal 2MB (JPG/PNG).</p>
                            <div class="flex gap-3 justify-center md:justify-start">
                                <button type="button" onclick="document.getElementById('avatar-input').click()" class="px-5 py-2 bg-[#007cc3] text-white font-semibold rounded-xl text-sm shadow-sm hover:bg-blue-700 transition">Pilih Foto</button>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 flex flex-col gap-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition">
                            </div>
                            <div>
                                @if($user->isTeacher())
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">NIP</label>
                                    <input type="text" value="{{ $user->nip }}" disabled class="w-full bg-gray-100 text-gray-400 border border-gray-200 rounded-xl py-3 px-4 cursor-not-allowed">
                                    <p class="text-[10px] text-gray-400 mt-1">*NIP tidak dapat diubah sendiri.</p>
                                @elseif($user->isStudent())
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">NISN</label>
                                    <input type="text" value="{{ $user->nis }}" disabled class="w-full bg-gray-100 text-gray-400 border border-gray-200 rounded-xl py-3 px-4 cursor-not-allowed">
                                    <p class="text-[10px] text-gray-400 mt-1">*NISN tidak dapat diubah oleh murid.</p>
                                @else
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">ID Pengguna</label>
                                    <input type="text" value="{{ $user->id }}" disabled class="w-full bg-gray-100 text-gray-400 border border-gray-200 rounded-xl py-3 px-4 cursor-not-allowed">
                                @endif
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon/WhatsApp</label>
                                <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Bio / Tentang Saya</label>
                                <textarea name="bio" rows="3" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition">{{ old('bio', $user->bio) }}</textarea>
                            </div>
                        </div>
                        
                        <div class="mt-6 pt-6 border-t border-gray-100">
                            <h3 class="font-bold text-lg text-gray-900 mb-4">Ubah Password (Opsional)</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password Baru</label>
                                    <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password Baru</label>
                                    <input type="password" name="password_confirmation" placeholder="Konfirmasi password baru" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:outline-none focus:ring-2 focus:ring-[#007cc3]/50 focus:border-[#007cc3] transition">
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end pt-6 border-t border-gray-100 mt-2">
                            <button type="submit" class="px-8 py-3 bg-[#007cc3] hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition-all w-full sm:w-auto">
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            
        </div>
    </main>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('avatar-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</body>
</html>

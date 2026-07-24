<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Sistem - Admin DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
    </style>
</head>
<body class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    @include('components.sidebar-admin', ['active' => 'settings'])

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-full overflow-hidden relative">
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-gray-100 flex items-center justify-between px-8 z-10">
            <div class="flex items-center text-gray-400 text-sm font-medium">
                <span class="hover:text-gray-900 cursor-pointer">Admin</span>
                <span class="mx-2">/</span>
                <span class="text-[#007cc3]">Pengaturan Sistem</span>
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

            @if($errors->any())
            <div class="mb-6 bg-red-50 text-red-600 border border-red-200 rounded-xl p-4 text-sm font-medium">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Pengaturan Sistem</h2>
                <p class="text-gray-500">Konfigurasi umum aplikasi dan manajemen tahun ajaran.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                
                <!-- General Settings -->
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 lg:p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-[#007cc3]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Pengaturan Umum
                    </h3>
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="space-y-5">
                            @forelse($settings as $group => $items)
                                @foreach($items as $setting)
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">{{ str_replace('_', ' ', $setting->key) }}</label>
                                    @if($setting->type == 'boolean')
                                        <select name="{{ $setting->key }}" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#007cc3]">
                                            <option value="1" {{ $setting->value ? 'selected' : '' }}>Aktif</option>
                                            <option value="0" {{ !$setting->value ? 'selected' : '' }}>Nonaktif</option>
                                        </select>
                                    @else
                                        <input type="text" name="{{ $setting->key }}" value="{{ $setting->value }}" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#007cc3]">
                                    @endif
                                </div>
                                @endforeach
                            @empty
                                <div class="p-4 bg-gray-50 rounded-xl text-gray-500 text-sm text-center">Belum ada pengaturan umum.</div>
                            @endforelse
                        </div>
                        <div class="mt-8 flex justify-end">
                            <button type="submit" class="bg-[#007cc3] hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-xl shadow-md transition">Simpan Pengaturan</button>
                        </div>
                    </form>
                </div>

                <!-- Academic Year & Semester Settings -->
                <div class="flex flex-col gap-8">
                    <!-- Academic Year -->
                    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 lg:p-8">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold text-gray-900 flex items-center">
                                <svg class="w-6 h-6 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                Tahun Ajaran
                            </h3>
                            <button onclick="openAddAYModal()" class="text-sm bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-2 px-4 rounded-lg transition">Tambah</button>
                        </div>
                        
                        <div class="space-y-4">
                            @foreach($academicYears as $ay)
                            <div class="flex items-center justify-between p-4 {{ $ay->is_active ? 'bg-green-50 border border-green-200' : 'bg-gray-50 border border-gray-100' }} rounded-xl">
                                <div>
                                    <p class="font-bold {{ $ay->is_active ? 'text-green-800' : 'text-gray-800' }}">{{ $ay->name }}</p>
                                    <p class="text-xs {{ $ay->is_active ? 'text-green-600' : 'text-gray-500' }}">{{ $ay->start_date }} s/d {{ $ay->end_date }}</p>
                                </div>
                                <div>
                                    @if($ay->is_active)
                                        <span class="px-3 py-1 bg-green-500 text-white text-xs font-bold rounded-full">Aktif</span>
                                    @else
                                        <form action="{{ route('admin.settings.academic-years.set-active', $ay->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-sm text-[#007cc3] hover:underline font-medium">Set Aktif</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Semester -->
                    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 lg:p-8">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold text-gray-900 flex items-center">
                                <svg class="w-6 h-6 mr-3 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                Semester
                            </h3>
                            <button onclick="openAddSemesterModal()" class="text-sm bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-2 px-4 rounded-lg transition">Tambah</button>
                        </div>
                        
                        <div class="space-y-4">
                            @foreach($semesters as $sem)
                            <div class="flex items-center justify-between p-4 {{ $sem->is_active ? 'bg-purple-50 border border-purple-200' : 'bg-gray-50 border border-gray-100' }} rounded-xl">
                                <div>
                                    <p class="font-bold {{ $sem->is_active ? 'text-purple-800' : 'text-gray-800' }}">{{ $sem->name }} ({{ $sem->academicYear->name ?? 'N/A' }})</p>
                                    <p class="text-xs {{ $sem->is_active ? 'text-purple-600' : 'text-gray-500' }} uppercase">{{ $sem->type }} | {{ $sem->start_date }} s/d {{ $sem->end_date }}</p>
                                </div>
                                <div>
                                    @if($sem->is_active)
                                        <span class="px-3 py-1 bg-purple-500 text-white text-xs font-bold rounded-full">Aktif</span>
                                    @else
                                        <form action="{{ route('admin.settings.semesters.set-active', $sem->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-sm text-[#007cc3] hover:underline font-medium">Set Aktif</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Tambah Tahun Ajaran -->
    <div id="addAYModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden opacity-0 transition-opacity duration-300">
        <div class="bg-white rounded-3xl w-full max-w-md shadow-xl overflow-hidden transform scale-95 transition-transform duration-300 relative">
            <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <h3 class="text-xl font-bold text-gray-900">Tambah Tahun Ajaran</h3>
                <button onclick="closeAddAYModal()" class="text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <div class="p-8">
                <form action="{{ route('admin.settings.academic-years.store') }}" method="POST">
                    @csrf
                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Tahun Ajaran (Contoh: 2026/2027)</label>
                            <input type="text" name="name" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#007cc3]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                            <input type="date" name="start_date" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#007cc3]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Berakhir</label>
                            <input type="date" name="end_date" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#007cc3]">
                        </div>
                    </div>
                    <div class="mt-8 flex justify-end gap-3">
                        <button type="button" onclick="closeAddAYModal()" class="px-5 py-2.5 text-sm font-semibold text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition">Batal</button>
                        <button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-[#007cc3] rounded-xl hover:bg-blue-700 shadow-md transition">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Semester -->
    <div id="addSemesterModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden opacity-0 transition-opacity duration-300">
        <div class="bg-white rounded-3xl w-full max-w-md shadow-xl overflow-hidden transform scale-95 transition-transform duration-300 relative">
            <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <h3 class="text-xl font-bold text-gray-900">Tambah Semester</h3>
                <button onclick="closeAddSemesterModal()" class="text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <div class="p-8">
                <form action="{{ route('admin.settings.semesters.store') }}" method="POST">
                    @csrf
                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Tahun Ajaran</label>
                            <select name="academic_year_id" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#007cc3]">
                                @foreach($academicYears as $ay)
                                    <option value="{{ $ay->id }}">{{ $ay->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Semester (Contoh: Semester Ganjil 2026)</label>
                            <input type="text" name="name" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#007cc3]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tipe</label>
                            <select name="type" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#007cc3]">
                                <option value="odd">Ganjil (Odd)</option>
                                <option value="even">Genap (Even)</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                                <input type="date" name="start_date" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#007cc3]">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Akhir</label>
                                <input type="date" name="end_date" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-[#007cc3]">
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 flex justify-end gap-3">
                        <button type="button" onclick="closeAddSemesterModal()" class="px-5 py-2.5 text-sm font-semibold text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition">Batal</button>
                        <button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-[#007cc3] rounded-xl hover:bg-blue-700 shadow-md transition">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openAddAYModal() {
            const modal = document.getElementById('addAYModal');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.children[0].classList.remove('scale-95');
            }, 10);
        }

        function closeAddAYModal() {
            const modal = document.getElementById('addAYModal');
            modal.classList.add('opacity-0');
            modal.children[0].classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }

        function openAddSemesterModal() {
            const modal = document.getElementById('addSemesterModal');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.children[0].classList.remove('scale-95');
            }, 10);
        }

        function closeAddSemesterModal() {
            const modal = document.getElementById('addSemesterModal');
            modal.classList.add('opacity-0');
            modal.children[0].classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }
    </script>
</body>
</html>

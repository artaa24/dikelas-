<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursus Saya - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    <!-- Left Sidebar -->
    @include('components.sidebar-student', ['active' => 'courses'])

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <!-- Header -->
        <header class="h-20 bg-[#F8FAFC] flex items-center justify-between px-8 xl:px-10 flex-shrink-0">
            <!-- Search -->
            <form action="{{ route('search') }}" method="GET" class="flex-1 max-w-2xl">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-5">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" name="q" value="{{ request('q') }}" class="w-full bg-white border border-gray-200 rounded-full py-3.5 pl-12 pr-4 text-sm focus:outline-none focus:ring-1 focus:ring-[#007cc3]" placeholder="Cari materi, tugas, atau kursus...">
                </div>
            </form>

            <!-- Right Actions -->
            <div class="flex items-center space-x-6 ml-6">
                <a href="/notifications" class="text-gray-400 hover:text-[#007cc3] relative transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    @if($unreadNotifs > 0)
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                    @endif
                </a>
                <button class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                </button>
                <div class="h-8 w-px bg-gray-200"></div>
                <a href="/edit-profile" class="flex items-center cursor-pointer">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=0D8ABC&color=fff' }}" alt="User Avatar">
                </a>
            </div>
        </header>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-auto hide-scrollbar px-8 xl:px-10 pb-10 relative">
            
            @if(session('success'))
            <div class="mt-8 mb-4 bg-green-50 text-green-600 border border-green-200 rounded-xl p-4 text-sm font-medium flex items-center">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="mt-8 mb-4 bg-red-50 text-red-600 border border-red-200 rounded-xl p-4 text-sm font-medium">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 mb-8 mt-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Kursus Saya</h2>
                    <p class="text-gray-500">Lanjutkan pembelajaran Anda untuk mencapai target.</p>
                </div>
                <div class="flex gap-3 items-center">
                    <button id="openJoinModalBtn" class="bg-[#007cc3] hover:bg-blue-700 text-white font-bold py-2.5 px-5 rounded-full shadow-md flex items-center transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Gabung Kelas Baru
                    </button>
                </div>
            </div>

            <!-- Course Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                
                @forelse($classrooms as $index => $class)
                <!-- Course Card -->
                <div class="course-card bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col group hover:shadow-md transition-shadow" data-status="ongoing">
                    <div class="h-48 {{ $class->banner_image ? '' : ['bg-blue-600', 'bg-purple-600', 'bg-green-600', 'bg-orange-600'][$index % 4] }} relative overflow-hidden" @if($class->banner_image) style="background-image: url('{{ asset('storage/' . $class->banner_image) }}'); background-size: cover; background-position: center;" @endif>
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm flex items-center">
                            {{ $class->code }}
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="font-bold text-gray-900 text-lg mb-2 line-clamp-2">{{ $class->name }}</h3>
                        
                        <div class="flex items-center mb-5">
                            @if($class->teacher && $class->teacher->avatar)
                                <img src="{{ asset('storage/' . $class->teacher->avatar) }}" alt="{{ $class->teacher->name }}" class="w-8 h-8 rounded-full object-cover mr-2 border border-gray-300">
                            @else
                                <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-500 font-bold flex items-center justify-center mr-2 text-xs border border-gray-300">
                                    {{ strtoupper(substr($class->teacher->name ?? 'G', 0, 1)) }}
                                </div>
                            @endif
                            <span class="text-sm text-gray-600 font-medium">{{ $class->teacher->name ?? 'Guru Tidak Diketahui' }}</span>
                        </div>
                        
                        <div class="mt-auto">
                            <div class="flex items-center justify-between text-xs text-gray-500 mb-5 font-medium border-t border-gray-100 pt-4">
                                <div class="flex items-center"><svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg> {{ $class->materials_count ?? 0 }} Materi</div>
                                <div class="flex items-center"><svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg> {{ $class->assignments_count ?? 0 }} Tugas</div>
                            </div>
                            
                            <a href="/classrooms/{{ $class->id }}" class="w-full bg-white border border-[#007cc3] text-[#007cc3] hover:bg-[#007cc3] hover:text-white font-semibold py-2.5 rounded-xl flex items-center justify-center transition-colors text-sm text-center block">
                                Masuk Kelas
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full bg-white rounded-3xl shadow-sm border border-gray-100 p-12 text-center mt-8">
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Kursus</h3>
                    <p class="text-gray-500 mb-6">Anda belum terdaftar di kelas manapun. Bergabung sekarang dengan menggunakan kode dari guru Anda.</p>
                    <button onclick="document.getElementById('openJoinModalBtn').click()" class="bg-[#007cc3] hover:bg-blue-700 text-white font-bold py-2.5 px-6 rounded-full shadow-md inline-flex items-center transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Gabung Kelas Sekarang
                    </button>
                </div>
                @endforelse

                <!-- Pesan saat filter kosong -->
                <div id="emptyFilterState" class="col-span-full bg-white rounded-3xl shadow-sm border border-gray-100 p-12 text-center mt-8" style="display: none;">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Tidak Ada Kursus</h3>
                    <p class="text-gray-500">Tidak ada kursus yang sesuai dengan kategori yang dipilih.</p>
                </div>

                </div>

            </div>
        </div>
    </main>

    <!-- Modal Gabung Kelas -->
    <div id="joinClassModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden opacity-0 transition-opacity duration-300">
        <div class="bg-white rounded-3xl w-full max-w-lg shadow-xl overflow-hidden transform scale-95 transition-transform duration-300 relative">
            <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <h3 class="text-xl font-bold text-gray-900">Gabung ke Kelas</h3>
                <button id="closeJoinModalBtn" class="text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <div class="p-8">
                <p class="text-gray-600 text-sm mb-6 leading-relaxed">Mintalah kode kelas kepada guru Anda, lalu masukkan kode tersebut di sini untuk mulai belajar.</p>
                <form action="/courses/join" method="POST">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kode Kelas</label>
                        <input type="text" name="class_code" required maxlength="6" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-center text-xl tracking-widest font-mono uppercase focus:outline-none focus:ring-1 focus:ring-[#007cc3]" placeholder="A7B2X9">
                    </div>
                    
                    <div class="mt-8 flex justify-end gap-3">
                        <button type="button" id="cancelJoinModalBtn" class="px-5 py-2.5 text-sm font-semibold text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition">Batal</button>
                        <button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-[#007cc3] rounded-xl hover:bg-blue-700 shadow-md transition">Gabung</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script for Modal -->
    <script>
        const openBtn = document.getElementById('openJoinModalBtn');
        const closeBtn = document.getElementById('closeJoinModalBtn');
        const cancelBtn = document.getElementById('cancelJoinModalBtn');
        const modal = document.getElementById('joinClassModal');

        function toggleModal(show) {
            if(show) {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modal.children[0].classList.remove('scale-95');
                }, 10);
            } else {
                modal.classList.add('opacity-0');
                modal.children[0].classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        }

        if (openBtn) openBtn.addEventListener('click', () => toggleModal(true));
        if (closeBtn) closeBtn.addEventListener('click', () => toggleModal(false));
        if (cancelBtn) cancelBtn.addEventListener('click', () => toggleModal(false));

    </script>
</body>
</html>

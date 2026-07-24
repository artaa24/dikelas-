<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmark Materi - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    <!-- Left Sidebar -->
    @if(auth()->user()->isAdmin())
        @include('components.sidebar-admin', ['active' => ''])
    @elseif(auth()->user()->isTeacher())
        @include('components.sidebar-guru', ['active' => ''])
    @else
        @include('components.sidebar-student', ['active' => ''])
    @endif

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <!-- Header -->
        <header class="h-20 bg-white flex items-center justify-between px-8 xl:px-10 flex-shrink-0 border-b border-gray-100">
            <!-- Search -->
            <div class="flex-1 max-w-2xl">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-5">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" id="searchBookmark" class="w-full bg-gray-50 border border-gray-200 rounded-full py-3 pl-12 pr-4 text-sm focus:outline-none focus:ring-1 focus:ring-[#007cc3]" placeholder="Cari materi yang disimpan...">
                </div>
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
        <div class="flex-1 overflow-auto hide-scrollbar p-8 xl:p-10">
            
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Bookmark Materi</h2>
                <p class="text-gray-500">Koleksi catatan, video, dan modul yang Anda simpan untuk dipelajari lagi nanti.</p>
            </div>

            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Bookmark Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="bookmarkGrid">
                
                @forelse($bookmarks as $material)
                    <div class="bookmark-card bg-white rounded-3xl p-6 border border-gray-100 shadow-sm hover:shadow-lg transition group relative">
                        <!-- File Type Icon -->
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center mb-4
                            @if(str_contains($material->file_type ?? '', 'pdf')) bg-red-50 text-red-500
                            @elseif(str_contains($material->file_type ?? '', 'doc')) bg-blue-50 text-blue-500
                            @elseif(str_contains($material->file_type ?? '', 'ppt')) bg-orange-50 text-orange-500
                            @elseif(str_contains($material->file_type ?? '', 'video')) bg-purple-50 text-purple-500
                            @else bg-gray-50 text-gray-500
                            @endif
                        ">
                            @if(str_contains($material->file_type ?? '', 'pdf'))
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z"/></svg>
                            @else
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                            @endif
                        </div>

                        <h3 class="font-bold text-gray-900 text-lg mb-1 bookmark-title">{{ $material->title }}</h3>
                        <p class="text-sm text-gray-500 mb-3">{{ $material->classroom->name ?? 'Kelas tidak diketahui' }}</p>
                        
                        @if($material->description)
                            <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $material->description }}</p>
                        @endif

                        <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-50">
                            <span class="text-xs text-gray-400">
                                Disimpan {{ $material->pivot->created_at ? \Carbon\Carbon::parse($material->pivot->created_at)->diffForHumans() : '' }}
                            </span>
                            <form action="{{ route('bookmarks.destroy', $material->id) }}" method="POST" onsubmit="return confirm('Hapus bookmark ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-500 transition" title="Hapus bookmark">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white rounded-3xl p-12 text-center border border-gray-100 shadow-sm mt-8">
                        <div class="w-20 h-20 bg-gray-50 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Belum ada bookmark</h3>
                        <p class="text-gray-500">Anda belum menyimpan materi apapun ke daftar bookmark.</p>
                    </div>
                @endforelse

            </div>
            
        </div>
    </main>

    <script>
        // Client-side search filter
        document.getElementById('searchBookmark')?.addEventListener('input', function(e) {
            const query = e.target.value.toLowerCase();
            document.querySelectorAll('.bookmark-card').forEach(card => {
                const title = card.querySelector('.bookmark-title')?.textContent.toLowerCase() || '';
                card.style.display = title.includes(query) ? '' : 'none';
            });
        });
    </script>

</body>
</html>

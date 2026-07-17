<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman Sekolah - DIKELAS</title>
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
        @include('components.sidebar-admin', ['active' => ''])
    @elseif(auth()->user()->isTeacher())
        @include('components.sidebar-guru', ['active' => ''])
    @else
        @include('components.sidebar-student', ['active' => ''])
    @endif

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <header class="h-20 bg-white flex items-center justify-between px-8 border-b border-gray-100 flex-shrink-0">
            <h2 class="text-2xl font-bold text-gray-900">Pengumuman Sekolah</h2>
        </header>

        <div class="flex-1 overflow-auto hide-scrollbar p-8">
            <div class="max-w-4xl mx-auto space-y-6">
                
                @forelse($announcements as $announcement)
                    <div class="bg-white rounded-3xl p-6 shadow-sm border {{ $announcement->is_pinned ? 'border-[#007cc3]' : 'border-gray-100' }} relative overflow-hidden">
                        @if($announcement->is_pinned)
                            <div class="absolute top-0 right-0 bg-[#007cc3] text-white px-3 py-1 rounded-bl-xl text-xs font-bold uppercase flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                                Pinned
                            </div>
                        @endif
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $announcement->title }}</h3>
                                <p class="text-xs text-gray-500 mb-4 font-medium">{{ \Carbon\Carbon::parse($announcement->published_at)->diffForHumans() }}</p>
                                <div class="text-gray-700 leading-relaxed">
                                    {!! nl2br(e($announcement->content)) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white rounded-3xl p-12 text-center border border-gray-100 shadow-sm">
                        <div class="w-20 h-20 bg-gray-50 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Belum ada pengumuman</h3>
                        <p class="text-gray-500">Saat ini tidak ada pengumuman terbaru dari sekolah.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </main>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
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

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        <header class="h-20 bg-white flex items-center justify-between px-8 border-b border-gray-100">
            <div class="flex items-center gap-4">
                <h2 class="text-xl font-bold text-gray-900">Notifikasi</h2>
                @if($unreadCount > 0)
                    <span class="bg-red-500 text-white text-xs font-bold px-2.5 py-1 rounded-full">{{ $unreadCount }} baru</span>
                @endif
            </div>
            <div class="flex items-center space-x-4 ml-6">
                @if($unreadCount > 0)
                    <form action="{{ route('notifications.markAllRead') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-sm text-[#007cc3] hover:underline font-medium">Tandai semua dibaca</button>
                    </form>
                @endif
                <a href="/profile" class="flex items-center cursor-pointer">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=0D8ABC&color=fff' }}" alt="User Avatar">
                </a>
            </div>
        </header>

        <div class="flex-1 overflow-auto hide-scrollbar p-8 max-w-3xl mx-auto w-full">
            @if($notifications->count() > 0)
                <div class="space-y-4">
                    @foreach($notifications as $notification)
                        <div class="bg-white rounded-2xl p-5 border {{ $notification->read_at ? 'border-gray-100' : 'border-[#007cc3]/30 bg-blue-50/30' }} shadow-sm flex items-start gap-4 transition hover:shadow-md">
                            <!-- Icon based on type -->
                            <div class="w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0
                                @if(str_contains($notification->type, 'assignment')) bg-orange-50 text-orange-500
                                @elseif(str_contains($notification->type, 'quiz')) bg-purple-50 text-purple-500
                                @elseif(str_contains($notification->type, 'grade')) bg-green-50 text-green-500
                                @elseif(str_contains($notification->type, 'announcement')) bg-blue-50 text-blue-500
                                @else bg-gray-50 text-gray-500
                                @endif
                            ">
                                @if(str_contains($notification->type, 'assignment'))
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                @elseif(str_contains($notification->type, 'quiz'))
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                @elseif(str_contains($notification->type, 'grade'))
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                @else
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                                @endif
                            </div>

                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-900">{{ $notification->data['title'] ?? 'Notifikasi' }}</p>
                                <p class="text-sm text-gray-600 mt-1">{{ $notification->data['message'] ?? '' }}</p>
                                <p class="text-xs text-gray-400 mt-2">{{ $notification->created_at->diffForHumans() }}</p>
                            </div>

                            @if(!$notification->read_at)
                                <form action="{{ route('notifications.markRead', $notification->id) }}" method="POST" class="flex-shrink-0">
                                    @csrf
                                    <button type="submit" class="w-3 h-3 bg-[#007cc3] rounded-full" title="Tandai dibaca"></button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="mt-6">
                    {{ $notifications->links() }}
                </div>
            @else
                <div class="col-span-full bg-white rounded-3xl p-12 text-center border border-gray-100 shadow-sm mt-8">
                    <div class="w-20 h-20 bg-gray-50 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Belum ada notifikasi</h3>
                    <p class="text-gray-500">Saat ini Anda tidak memiliki notifikasi baru.</p>
                </div>
            @endif
        </div>
    </main>
</body>
</html>

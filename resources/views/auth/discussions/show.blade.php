<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $discussion->title }} - Diskusi DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
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

    <main class="flex-1 flex flex-col h-full overflow-hidden relative">
        <!-- Header -->
        <div class="bg-white border-b border-gray-200 px-8 py-6 flex-shrink-0 shadow-sm z-10">
            <div class="flex items-center text-sm text-gray-500 mb-2">
                <a href="{{ route('classrooms.discussions.index', $classroom->id) }}" class="hover:text-[#007cc3] transition font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    Kembali ke Daftar Forum
                </a>
                <span class="mx-3 text-gray-300">/</span>
                <span class="font-medium text-gray-800 truncate max-w-xs">{{ $discussion->title }}</span>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 leading-tight">{{ $discussion->title }}</h1>
        </div>

        <!-- Content -->
        <div class="flex-1 overflow-auto p-4 md:p-8 hide-scrollbar">
            @if(session('success'))
            <div class="mb-6 max-w-4xl mx-auto bg-green-50 text-green-700 border border-green-200 rounded-xl p-4 text-sm font-medium flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                {{ session('success') }}
            </div>
            @endif

            <div class="max-w-4xl mx-auto space-y-6">
                <!-- Original Post -->
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="p-6 md:p-8">
                        <div class="flex items-center space-x-4 mb-6 pb-6 border-b border-gray-100">
                            <div class="h-14 w-14 rounded-full bg-gradient-to-br from-blue-500 to-[#0A4B7D] text-white font-bold flex items-center justify-center text-xl shadow-md">
                                {{ strtoupper(substr($discussion->user->name, 0, 1)) }}
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 text-lg">{{ $discussion->user->name }}</h3>
                                <div class="flex items-center text-sm text-gray-500 mt-1">
                                    @if($discussion->user->role->name == 'teacher')
                                    <span class="bg-blue-100 text-blue-700 text-[10px] px-2 py-0.5 rounded font-bold mr-2 uppercase tracking-wide">Guru</span>
                                    @else
                                    <span class="bg-gray-100 text-gray-600 text-[10px] px-2 py-0.5 rounded font-bold mr-2 uppercase tracking-wide">Murid</span>
                                    @endif
                                    <span>{{ $discussion->created_at->format('d M Y, H:i') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-gray-800 text-base leading-relaxed whitespace-pre-wrap">{{ $discussion->content }}</div>
                    </div>
                </div>

                <!-- Replies Header -->
                <div class="flex items-center space-x-2 text-gray-600 font-bold pl-2 pt-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    <span>{{ $discussion->replies->count() }} Balasan</span>
                </div>

                <!-- Replies Thread -->
                <div class="space-y-5">
                    @foreach($discussion->replies as $reply)
                    <div class="bg-white rounded-2xl border {{ $reply->user->role->name == 'teacher' ? 'border-blue-200 bg-blue-50/20' : 'border-gray-100' }} shadow-sm p-6 ml-0 md:ml-12 relative group">
                        <!-- Connecting line for desktop thread visual -->
                        <div class="hidden md:block absolute -left-12 top-10 w-12 h-px bg-gray-200 group-hover:bg-blue-300 transition-colors"></div>
                        <div class="hidden md:block absolute -left-12 top-0 h-10 w-px bg-gray-200 group-hover:bg-blue-300 transition-colors"></div>
                        
                        <div class="flex items-start space-x-4 mb-3">
                            <div class="h-10 w-10 rounded-full {{ $reply->user->role->name == 'teacher' ? 'bg-gradient-to-br from-[#007cc3] to-[#0A4B7D]' : 'bg-gradient-to-br from-gray-500 to-gray-700' }} text-white font-bold flex items-center justify-center text-sm shadow-sm flex-shrink-0">
                                {{ strtoupper(substr($reply->user->name, 0, 1)) }}
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <h4 class="font-bold text-gray-900 mr-2">{{ $reply->user->name }}</h4>
                                        @if($reply->user->role->name == 'teacher')
                                        <span class="bg-blue-100 text-blue-700 text-[10px] px-1.5 py-0.5 rounded font-bold uppercase">Guru</span>
                                        @endif
                                    </div>
                                    <span class="text-xs font-medium text-gray-400">{{ $reply->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="text-gray-700 text-sm md:text-base mt-2 whitespace-pre-wrap leading-relaxed">{{ $reply->content }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Reply Form -->
                <div class="bg-white rounded-2xl border border-[#007cc3]/30 shadow-md p-6 ml-0 md:ml-12 mt-8">
                    <h3 class="font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 text-[#007cc3] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>
                        Tulis Balasan
                    </h3>
                    <form action="{{ route('classrooms.discussions.reply', [$classroom->id, $discussion->id]) }}" method="POST">
                        @csrf
                        <textarea name="content" rows="4" required class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-[#007cc3] outline-none transition mb-4 text-gray-800" placeholder="Ketik balasan Anda di sini..."></textarea>
                        <div class="flex justify-end">
                            <button type="submit" class="px-8 py-3 bg-[#007cc3] text-white rounded-xl font-bold hover:bg-blue-700 transition shadow-md flex items-center transform hover:-translate-y-0.5">
                                <svg class="w-4 h-4 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                Kirim Balasan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="h-16"></div> <!-- padding bottom spacer -->
        </div>
    </main>
</body>
</html>

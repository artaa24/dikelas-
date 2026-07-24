<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Saya - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    @include('components.sidebar-student', ['active' => 'certificates'])

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        <header class="h-20 bg-[#F8FAFC] flex items-center justify-between px-8 flex-shrink-0 border-b border-gray-100">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Sertifikat Saya</h2>
                <p class="text-sm text-gray-500">Koleksi sertifikat yang telah kamu peroleh</p>
            </div>
            <div class="flex items-center space-x-6">
                <a href="/edit-profile" class="flex items-center cursor-pointer">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=0D8ABC&color=fff' }}" alt="User Avatar">
                </a>
            </div>
        </header>

        <div class="flex-1 overflow-auto hide-scrollbar px-8 py-8">
            @if(session('success'))
            <div class="mb-6 bg-green-50 text-green-700 border border-green-200 rounded-xl p-4 text-sm font-medium">
                {{ session('success') }}
            </div>
            @endif

            @if($certificates->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($certificates as $cert)
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-md transition-all duration-300">
                    <!-- Certificate preview header -->
                    <div class="h-40 bg-gradient-to-br from-[#0A4B7D] to-[#007cc3] relative overflow-hidden flex items-center justify-center">
                        <div class="absolute inset-0 opacity-10">
                            <svg class="w-full h-full" viewBox="0 0 400 200" fill="none">
                                <circle cx="350" cy="50" r="100" stroke="white" stroke-width="0.5"/>
                                <circle cx="50" cy="180" r="80" stroke="white" stroke-width="0.5"/>
                            </svg>
                        </div>
                        <div class="text-center z-10">
                            <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-3 backdrop-blur-sm border border-white/30">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                </svg>
                            </div>
                            <p class="text-white/80 text-xs font-bold uppercase tracking-widest">Sertifikat</p>
                        </div>
                        
                        <!-- Type badge -->
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 text-xs font-bold rounded-full 
                                @if($cert->type === 'completion') bg-green-400/20 text-green-100
                                @elseif($cert->type === 'achievement') bg-yellow-400/20 text-yellow-100
                                @else bg-blue-400/20 text-blue-100 @endif">
                                @if($cert->type === 'completion') Kelulusan
                                @elseif($cert->type === 'achievement') Prestasi
                                @else Partisipasi @endif
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-gray-900 mb-1 line-clamp-2">{{ $cert->title }}</h3>
                        <p class="text-sm text-gray-500 mb-4">{{ $cert->classroom->name }}</p>
                        
                        <div class="flex items-center justify-between text-xs text-gray-500 mb-4 bg-gray-50 rounded-xl p-3">
                            <div class="text-center">
                                <p class="font-bold text-gray-900 text-lg">{{ $cert->final_score ? number_format($cert->final_score, 1) : '-' }}</p>
                                <p>Nilai</p>
                            </div>
                            <div class="w-px h-8 bg-gray-200"></div>
                            <div class="text-center">
                                <p class="font-bold text-gray-900 text-sm">{{ $cert->issued_at->format('d M Y') }}</p>
                                <p>Terbit</p>
                            </div>
                            <div class="w-px h-8 bg-gray-200"></div>
                            <div class="text-center">
                                <p class="font-bold text-gray-900 text-[10px] font-mono">{{ $cert->certificate_number }}</p>
                                <p>Nomor</p>
                            </div>
                        </div>

                        <div class="flex gap-2">
                            <a href="{{ route('certificates.preview', $cert->id) }}" target="_blank" class="flex-1 bg-blue-50 text-[#007cc3] hover:bg-[#007cc3] hover:text-white font-medium py-2.5 rounded-xl flex items-center justify-center transition text-sm">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                Lihat
                            </a>
                            <a href="{{ route('certificates.download', $cert->id) }}" class="flex-1 bg-green-50 text-green-700 hover:bg-green-600 hover:text-white font-medium py-2.5 rounded-xl flex items-center justify-center transition text-sm">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Download
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-20 bg-white rounded-3xl border border-gray-100">
                <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-1">Belum Ada Sertifikat</h3>
                <p class="text-sm text-gray-500 max-w-sm mx-auto">Sertifikat akan muncul di sini setelah guru menerbitkannya untuk kamu. Terus belajar dan raih prestasi!</p>
            </div>
            @endif
        </div>
    </main>
</body>
</html>

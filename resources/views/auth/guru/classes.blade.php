<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelasku - DIKELAS</title>
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
    <aside class="w-64 bg-white border-r border-gray-100 flex flex-col justify-between h-full flex-shrink-0">
        <div>
            <!-- Logo -->
            <div class="p-8 pb-6">
                <h1 class="text-2xl font-bold text-[#0A4B7D]">DIKELAS</h1>
                <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Teacher Dashboard</p>
            </div>

            <!-- Navigation -->
            <nav class="px-4 space-y-2">
                <a href="/guru/dashboard" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                <a href="/guru/classes" class="flex items-center px-4 py-3 bg-[#9AE6F1] text-[#0A4B7D] rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    Kelasku
                </a>
                <a href="/guru/materials" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                    Manajemen Materi
                </a>
                <a href="/guru/assignments" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    Daftar Tugas
                </a>
                <a href="/guru/grades" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
                    <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Penilaian
                </a>
            </nav>
        </div>

        <div class="p-4 mb-4">
            <div class="h-px bg-gray-100 mb-4 w-full"></div>
            <a href="/login" class="flex items-center px-4 py-2 text-gray-600 hover:text-red-600 transition-colors">
                <svg class="w-5 h-5 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Keluar
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <!-- Header -->
        <header class="h-20 bg-[#F8FAFC] flex items-center justify-between px-8 flex-shrink-0 border-b border-gray-100">
            <h2 class="text-2xl font-bold text-gray-900">Kelas Saya</h2>

            <!-- Right Actions -->
            <div class="flex items-center space-x-6 ml-6">
                <a href="/notifications" class="text-gray-400 hover:text-gray-600 relative">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </a>
                <div class="h-8 w-px bg-gray-200"></div>
                <a href="/edit-profile" class="flex items-center cursor-pointer">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="https://i.pravatar.cc/150?img=68" alt="Teacher Avatar">
                </a>
            </div>
        </header>

        <!-- Scrollable Dashboard Content -->
        <div class="flex-1 overflow-auto hide-scrollbar px-8 py-8">
            
            <div class="flex justify-between items-center mb-8">
                <p class="text-gray-600">Kelola kelas-kelas yang Anda ajar pada semester ini.</p>
                <button onclick="document.getElementById('createClassModal').classList.remove('hidden')" class="bg-[#007cc3] text-white px-5 py-2.5 rounded-xl font-medium shadow-sm hover:bg-blue-700 transition flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Buat Kelas Baru
                </button>
            </div>

            <!-- Course Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($classrooms as $classroom)
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col group relative">
                    <div class="h-40 bg-gray-200 relative">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover" alt="Course Image">
                        <div class="absolute top-4 right-4 flex space-x-2">
                            <div class="bg-white/90 backdrop-blur-sm text-[#007cc3] text-xs font-bold px-3 py-1 rounded-full">{{ $classroom->is_active ? 'Aktif' : 'Nonaktif' }}</div>
                        </div>
                        
                        <!-- Hover Actions (Edit/Delete) -->
                        <div class="absolute top-4 left-4 flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button onclick="document.getElementById('editClassModal{{ $classroom->id }}').classList.remove('hidden')" class="bg-white/90 backdrop-blur-sm text-blue-600 p-1.5 rounded-full hover:bg-white transition shadow-sm" title="Edit Kelas">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </button>
                            <form action="/guru/classes/{{ $classroom->id }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-white/90 backdrop-blur-sm text-red-600 p-1.5 rounded-full hover:bg-white transition shadow-sm" title="Hapus Kelas">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="font-bold text-lg text-gray-900 mb-1">{{ $classroom->name }}</h3>
                        <p class="text-xs text-gray-500 mb-4 font-mono">Kode: {{ $classroom->code }}</p>
                        
                        <div class="flex items-center justify-between text-xs text-gray-600 mb-6 bg-gray-50 p-3 rounded-xl">
                            <div class="flex flex-col items-center">
                                <span class="font-bold text-gray-900 text-lg mb-0.5">{{ $classroom->students_count ?? 0 }}</span>
                                <span>Siswa</span>
                            </div>
                            <div class="w-px h-8 bg-gray-200"></div>
                            <div class="flex flex-col items-center">
                                @php
                                    $mCount = \App\Models\Material::where('classroom_id', $classroom->id)->count();
                                    $aCount = \App\Models\Assignment::where('classroom_id', $classroom->id)->count();
                                @endphp
                                <span class="font-bold text-gray-900 text-lg mb-0.5">{{ $mCount }}</span>
                                <span>Materi</span>
                            </div>
                            <div class="w-px h-8 bg-gray-200"></div>
                            <div class="flex flex-col items-center">
                                <span class="font-bold text-gray-900 text-lg mb-0.5">{{ $aCount }}</span>
                                <span>Tugas</span>
                            </div>
                        </div>
                        
                        <a href="/classrooms/{{ $classroom->id }}" class="w-full bg-blue-50 text-[#007cc3] hover:bg-[#007cc3] hover:text-white font-medium py-2.5 rounded-xl flex items-center justify-center transition mt-auto text-sm">
                            Kelola Kelas <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Edit Class Modal -->
                <div id="editClassModal{{ $classroom->id }}" class="fixed inset-0 z-50 hidden">
                    <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm" onclick="document.getElementById('editClassModal{{ $classroom->id }}').classList.add('hidden')"></div>
                    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                        <div class="relative bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg w-full">
                            <form action="/guru/classes/{{ $classroom->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="mb-4">
                                        <h3 class="text-xl leading-6 font-bold text-gray-900">Edit Kelas</h3>
                                    </div>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kelas</label>
                                            <input type="text" name="name" value="{{ $classroom->name }}" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                                            <textarea name="description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition">{{ $classroom->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-100">
                                    <button type="submit" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-2 bg-[#007cc3] text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm transition">
                                        Simpan Perubahan
                                    </button>
                                    <button type="button" onclick="document.getElementById('editClassModal{{ $classroom->id }}').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition">
                                        Batal
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-12 text-center text-gray-500 bg-white rounded-3xl border border-gray-100">
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    <p class="text-lg font-medium text-gray-900">Belum ada kelas</p>
                    <p class="text-sm mt-1">Buat kelas pertama Anda untuk memulai mengajar.</p>
                </div>
                @endforelse
            </div>

        </div>
    </main>

    <!-- Create Class Modal -->
    <div id="createClassModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm" onclick="document.getElementById('createClassModal').classList.add('hidden')"></div>
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <div class="relative bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg w-full">
                <form action="/guru/classes" method="POST">
                    @csrf
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mb-4">
                            <h3 class="text-xl leading-6 font-bold text-gray-900" id="modal-title">Buat Kelas Baru</h3>
                            <p class="text-sm text-gray-500 mt-1">Isi detail kelas yang akan Anda ajar.</p>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kelas</label>
                                <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition" placeholder="Contoh: Matematika Wajib - XI IPA 1">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi (Opsional)</label>
                                <textarea name="description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition" placeholder="Tuliskan deskripsi singkat tentang kelas ini..."></textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Mata Pelajaran</label>
                                <select name="subject_id" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition text-gray-700">
                                    <option value="1">Matematika Umum</option>
                                    <option value="2">Fisika</option>
                                    <option value="3">Biologi</option>
                                    <option value="4">Bahasa Indonesia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-100">
                        <button type="submit" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-2 bg-[#007cc3] text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm transition">
                            Simpan Kelas
                        </button>
                        <button type="button" onclick="document.getElementById('createClassModal').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

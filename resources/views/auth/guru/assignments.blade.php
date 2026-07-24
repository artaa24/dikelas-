<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    <!-- Left Sidebar -->
    @include('components.sidebar-guru', ['active' => 'assignments'])

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <!-- Header -->
        <header class="h-20 bg-[#F8FAFC] flex items-center justify-between px-8 flex-shrink-0 border-b border-gray-100">
            <h2 class="text-2xl font-bold text-gray-900">Daftar Tugas</h2>

            <!-- Right Actions -->
            <div class="flex items-center space-x-6 ml-6">
                <a href="/notifications" class="text-gray-400 hover:text-[#007cc3] relative transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    @if($unreadNotifs > 0)
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                    @endif
                </a>
                <div class="h-8 w-px bg-gray-200"></div>
                <a href="/edit-profile" class="flex items-center cursor-pointer">
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=0D8ABC&color=fff' }}" alt="User Avatar">
                </a>
            </div>
        </header>

        <!-- Scrollable Dashboard Content -->
        <div class="flex-1 overflow-auto hide-scrollbar px-8 py-8">
            
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                <div class="flex bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm w-full max-w-md">
                    <div class="pl-4 py-2.5 flex items-center">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" class="w-full px-3 py-2.5 text-sm focus:outline-none" placeholder="Cari judul tugas...">
                    <select class="border-l border-gray-200 bg-gray-50 px-3 text-sm focus:outline-none text-gray-600">
                        <option>Semua Kelas</option>
                        @foreach($classrooms as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button onclick="document.getElementById('createAssignmentModal').classList.remove('hidden')" class="bg-[#007cc3] text-white px-5 py-2.5 rounded-xl font-medium shadow-sm hover:bg-blue-700 transition flex items-center whitespace-nowrap">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Buat Tugas Baru
                </button>
            </div>

            <!-- Assignments Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($assignments as $assignment)
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 flex flex-col relative overflow-hidden group">
                    @if(\Carbon\Carbon::parse($assignment->deadline_at)->isPast())
                    <div class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full mt-6 mr-6"></div>
                    @else
                    <div class="absolute top-0 right-0 w-2 h-2 bg-green-500 rounded-full mt-6 mr-6"></div>
                    @endif
                    
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </div>
                        <div class="flex-1 pr-6">
                            <h3 class="font-bold text-gray-900 text-lg leading-tight">{{ $assignment->title }}</h3>
                            <p class="text-xs text-gray-500 mt-1">{{ $assignment->classroom->name ?? 'Semua Kelas' }}</p>
                        </div>
                    </div>
                    
                    <p class="text-sm text-gray-600 mb-6 flex-1">{{ Str::limit($assignment->description, 80) }}</p>
                    
                    <div class="bg-gray-50 rounded-xl p-3 flex justify-between items-center mb-6">
                        <div class="text-center">
                            <p class="text-xs text-gray-500 mb-0.5">Dikumpulkan</p>
                            @php
                                $totalStudents = $assignment->classroom ? $assignment->classroom->students->count() : 0;
                                $submittedCount = $assignment->submissions->count();
                                $gradedCount = $assignment->submissions->whereNotNull('score')->count();
                            @endphp
                            <p class="font-bold text-gray-900 text-lg">{{ $submittedCount }}<span class="text-sm font-normal text-gray-500">/{{ $totalStudents > 0 ? $totalStudents : '-' }}</span></p>
                        </div>
                        <div class="w-px h-8 bg-gray-200"></div>
                        <div class="text-center">
                            <p class="text-xs text-gray-500 mb-0.5">Sudah Dinilai</p>
                            <p class="font-bold text-green-600 text-lg">{{ $gradedCount }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between text-xs font-medium border-t border-gray-100 pt-4">
                        <div class="flex items-center {{ \Carbon\Carbon::parse($assignment->deadline_at)->isPast() ? 'text-red-500' : 'text-orange-500' }}">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Batas: {{ \Carbon\Carbon::parse($assignment->deadline_at)->format('d M Y H:i') }}
                        </div>
                        
                        <div class="flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button onclick="document.getElementById('editAssignmentModal{{ $assignment->id }}').classList.remove('hidden')" class="p-1.5 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 transition" title="Edit Tugas">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </button>
                            <form action="/guru/assignments/{{ $assignment->id }}" method="POST" class="inline" onsubmit="confirmAction(event, this, 'Yakin ingin menghapus tugas ini?', 'Hapus', '#d33')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 bg-red-50 text-red-600 rounded hover:bg-red-100 transition" title="Hapus Tugas">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                            <a href="/guru/grades" class="text-[#007cc3] hover:underline px-3 py-1.5 bg-blue-50 rounded-lg transition ml-1">Detail</a>
                        </div>
                    </div>
                </div>

                <!-- Edit Assignment Modal -->
                <div id="editAssignmentModal{{ $assignment->id }}" class="fixed inset-0 z-50 hidden">
                    <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm" onclick="document.getElementById('editAssignmentModal{{ $assignment->id }}').classList.add('hidden')"></div>
                    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                        <div class="relative bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg w-full">
                            <form action="/guru/assignments/{{ $assignment->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="mb-4">
                                        <h3 class="text-xl leading-6 font-bold text-gray-900">Edit Tugas</h3>
                                    </div>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Judul Tugas</label>
                                            <input type="text" name="title" value="{{ $assignment->title }}" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Tugas</label>
                                            <textarea name="description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition">{{ $assignment->description }}</textarea>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Batas Waktu (Deadline)</label>
                                            <input type="datetime-local" name="deadline_at" value="{{ \Carbon\Carbon::parse($assignment->deadline_at)->format('Y-m-d\TH:i') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition">
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-100">
                                    <button type="submit" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-2 bg-[#007cc3] text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm transition">
                                        Simpan Perubahan
                                    </button>
                                    <button type="button" onclick="document.getElementById('editAssignmentModal{{ $assignment->id }}').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition">
                                        Batal
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-12 text-center text-gray-500 bg-white rounded-3xl border border-gray-100">
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    <p class="text-lg font-medium text-gray-900">Belum ada tugas</p>
                    <p class="text-sm mt-1">Berikan penugasan baru untuk murid di kelas Anda.</p>
                </div>
                @endforelse
            </div>

        </div>
    </main>

    <!-- Create Assignment Modal -->
    <div id="createAssignmentModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm" onclick="document.getElementById('createAssignmentModal').classList.add('hidden')"></div>
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
            <div class="relative bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg w-full">
                <form action="/guru/assignments" method="POST">
                    @csrf
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mb-4">
                            <h3 class="text-xl leading-6 font-bold text-gray-900" id="modal-title">Buat Tugas Baru</h3>
                            <p class="text-sm text-gray-500 mt-1">Berikan penugasan untuk siswa di kelas Anda.</p>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Tugas</label>
                                <input type="text" name="title" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition" placeholder="Contoh: Latihan Soal UTS">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Tugas</label>
                                <textarea name="description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition" placeholder="Tuliskan instruksi pengerjaan tugas..."></textarea>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Batas Waktu (Deadline)</label>
                                    <input type="datetime-local" name="deadline_at" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Kelas Tujuan</label>
                                    <select name="classroom_id" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-[#007cc3] focus:border-[#007cc3] outline-none transition text-gray-700">
                                        @foreach($classrooms as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-100">
                        <button type="submit" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-4 py-2 bg-[#007cc3] text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm transition">
                            Simpan Tugas
                        </button>
                        <button type="button" onclick="document.getElementById('createAssignmentModal').classList.add('hidden')" class="mt-3 w-full inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmAction(event, form, message, btnText, btnColor) {
            event.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: btnColor,
                cancelButtonColor: '#9ca3af',
                confirmButtonText: 'Ya, ' + btnText + '!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Sertifikat - {{ $classroom->name }} - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-gray-800">

    @include('components.sidebar-guru', ['active' => 'classes'])

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        <header class="h-20 bg-white flex items-center px-8 border-b border-gray-100">
            <div class="flex items-center text-sm text-gray-500 font-medium">
                <a href="/guru/classes" class="hover:text-[#007cc3] transition">Kelas Saya</a>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <a href="{{ route('classrooms.show', $classroom->id) }}" class="hover:text-[#007cc3] transition">{{ $classroom->name }}</a>
                <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="text-gray-900 font-semibold">Sertifikat</span>
            </div>
        </header>

        <div class="flex-1 overflow-auto hide-scrollbar p-8">
            @if(session('success'))
            <div class="mb-6 bg-green-50 text-green-700 border border-green-200 rounded-xl p-4 text-sm font-medium flex items-center">
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

            <div class="flex justify-between items-start mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Kelola Sertifikat</h2>
                    <p class="text-gray-500">Terbitkan sertifikat untuk murid kelas <span class="font-semibold">{{ $classroom->name }}</span></p>
                </div>
            </div>

            <!-- Issue Certificate Form -->
            <form action="{{ route('guru.certificates.issue', $classroom->id) }}" method="POST">
                @csrf
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8 mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Detail Sertifikat</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Judul Sertifikat</label>
                            <input type="text" name="title" required value="Sertifikat Kelulusan {{ $classroom->name }}" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:ring-1 focus:ring-[#007cc3]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Sertifikat</label>
                            <select name="type" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:ring-1 focus:ring-[#007cc3]">
                                <option value="completion">Kelulusan (Completion)</option>
                                <option value="achievement">Prestasi (Achievement)</option>
                                <option value="participation">Partisipasi (Participation)</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi (Opsional)</label>
                        <textarea name="description" rows="2" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 text-sm focus:outline-none focus:ring-1 focus:ring-[#007cc3]" placeholder="Deskripsi tambahan yang akan muncul di sertifikat..."></textarea>
                    </div>

                    <h3 class="text-lg font-bold text-gray-900 mb-4">Pilih Murid</h3>
                    <p class="text-sm text-gray-500 mb-4">Centang murid yang akan menerima sertifikat. Murid yang sudah memiliki sertifikat tidak bisa dipilih.</p>

                    <!-- Select All Checkbox -->
                    <div class="flex items-center mb-4 pb-4 border-b border-gray-100">
                        <input type="checkbox" id="selectAll" class="w-5 h-5 rounded text-[#007cc3] border-gray-300 focus:ring-[#007cc3] mr-3 cursor-pointer">
                        <label for="selectAll" class="text-sm font-bold text-gray-900 cursor-pointer">Pilih Semua yang Tersedia</label>
                    </div>

                    <div class="space-y-3 max-h-96 overflow-y-auto">
                        @forelse($classroom->students as $student)
                        @php $hasCert = in_array($student->id, $certifiedStudentIds); @endphp
                        <label class="flex items-center justify-between p-4 rounded-2xl border {{ $hasCert ? 'border-green-200 bg-green-50/50' : 'border-gray-100 bg-white hover:bg-gray-50' }} transition cursor-pointer">
                            <div class="flex items-center">
                                @if(!$hasCert)
                                <input type="checkbox" name="student_ids[]" value="{{ $student->id }}" class="student-checkbox w-5 h-5 rounded text-[#007cc3] border-gray-300 focus:ring-[#007cc3] mr-4">
                                @else
                                <div class="w-5 h-5 bg-green-500 rounded flex items-center justify-center mr-4">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                @endif
                                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm mr-3">
                                    {{ strtoupper(substr($student->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900 text-sm">{{ $student->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $student->nis ?? $student->email }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                @if(isset($studentScores[$student->id]) && $studentScores[$student->id] !== null)
                                <div class="text-center">
                                    <p class="text-xs text-gray-500">Rata-rata</p>
                                    <p class="font-bold text-sm {{ $studentScores[$student->id] >= 70 ? 'text-green-600' : 'text-red-600' }}">{{ $studentScores[$student->id] }}</p>
                                </div>
                                @else
                                <p class="text-xs text-gray-400">Belum ada nilai</p>
                                @endif
                                
                                @if($hasCert)
                                <span class="px-3 py-1 text-xs font-bold rounded-full bg-green-100 text-green-700">Sudah Terbit</span>
                                @endif
                            </div>
                        </label>
                        @empty
                        <div class="text-center py-10 text-gray-500">
                            <p>Belum ada murid di kelas ini.</p>
                        </div>
                        @endforelse
                    </div>

                    <div class="mt-8 flex justify-end">
                        <a href="{{ route('classrooms.show', $classroom->id) }}" class="px-5 py-2.5 text-sm font-semibold text-gray-600 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition mr-3">Kembali</a>
                        <button type="submit" class="px-6 py-2.5 text-sm font-bold text-white bg-[#007cc3] rounded-xl hover:bg-blue-700 shadow-md transition flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                            Terbitkan Sertifikat
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.student-checkbox');
            checkboxes.forEach(cb => cb.checked = this.checked);
        });
    </script>
</body>
</html>

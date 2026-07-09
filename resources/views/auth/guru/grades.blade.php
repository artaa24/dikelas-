<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian - DIKELAS</title>
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
                <a href="/guru/classes" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-xl font-medium transition-colors">
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
                <a href="/guru/grades" class="flex items-center px-4 py-3 bg-[#9AE6F1] text-[#0A4B7D] rounded-xl font-medium transition-colors">
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
            <h2 class="text-2xl font-bold text-gray-900">Penilaian Tugas</h2>

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
            
            <div class="bg-white rounded-3xl p-6 mb-8 border border-gray-100 shadow-sm flex flex-col md:flex-row gap-6 items-start md:items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Tugas Persamaan Kuadrat</h3>
                    <p class="text-sm text-gray-500">Kelas: <span class="font-semibold text-[#0A4B7D]">XI IPA 1</span> • Deadline: 13 Okt 2026</p>
                </div>
                
                <div class="flex items-center space-x-4 w-full md:w-auto">
                    <select class="flex-1 md:w-48 bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                        <option>Semua Status</option>
                        <option>Belum Dinilai (4)</option>
                        <option>Sudah Dinilai (24)</option>
                        <option>Belum Mengumpulkan (4)</option>
                    </select>
                    
                    <button class="bg-green-100 text-green-700 hover:bg-green-200 font-medium rounded-xl text-sm px-4 py-2.5 transition flex items-center whitespace-nowrap">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Export Excel
                    </button>
                </div>
            </div>

            <!-- Table of Submissions -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                                <th class="p-5 font-medium">Nama Siswa</th>
                                <th class="p-5 font-medium">Waktu Pengumpulan</th>
                                <th class="p-5 font-medium">File Jawaban</th>
                                <th class="p-5 font-medium text-center">Status</th>
                                <th class="p-5 font-medium">Nilai / Form</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            
                            <!-- Row 1: Menunggu Dinilai -->
                            <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition">
                                <td class="p-5">
                                    <div class="flex items-center">
                                        <img class="h-8 w-8 rounded-full object-cover mr-3" src="https://i.pravatar.cc/150?img=11" alt="Avatar">
                                        <div>
                                            <p class="font-bold text-gray-900">Arta Suputra</p>
                                            <p class="text-[11px] text-gray-500">NIS: 10024</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-5 text-gray-600">
                                    12 Okt 2026, 14:30
                                    <span class="block text-[10px] text-green-500 font-medium">Tepat Waktu</span>
                                </td>
                                <td class="p-5">
                                    <a href="#" class="flex items-center text-[#007cc3] hover:underline text-xs font-medium">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                        arta_tugas1.pdf
                                    </a>
                                </td>
                                <td class="p-5 text-center">
                                    <span class="px-2.5 py-1 bg-yellow-50 text-yellow-600 rounded-full text-[10px] font-bold border border-yellow-100">Perlu Dinilai</span>
                                </td>
                                <td class="p-5">
                                    <div class="flex items-center space-x-2">
                                        <input type="number" class="w-16 border border-gray-300 rounded-lg p-1.5 text-sm focus:ring-blue-500 focus:border-blue-500 text-center" placeholder="0-100">
                                        <button class="bg-[#007cc3] hover:bg-blue-700 text-white p-1.5 rounded-lg transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Row 2: Sudah Dinilai -->
                            <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition">
                                <td class="p-5">
                                    <div class="flex items-center">
                                        <img class="h-8 w-8 rounded-full object-cover mr-3" src="https://i.pravatar.cc/150?img=5" alt="Avatar">
                                        <div>
                                            <p class="font-bold text-gray-900">Budi Santoso</p>
                                            <p class="text-[11px] text-gray-500">NIS: 10025</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-5 text-gray-600">
                                    13 Okt 2026, 23:55
                                    <span class="block text-[10px] text-yellow-500 font-medium">Mendekati Deadline</span>
                                </td>
                                <td class="p-5">
                                    <a href="#" class="flex items-center text-[#007cc3] hover:underline text-xs font-medium">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                        budi_mtk.docx
                                    </a>
                                </td>
                                <td class="p-5 text-center">
                                    <span class="px-2.5 py-1 bg-green-50 text-green-600 rounded-full text-[10px] font-bold border border-green-100">Dinilai</span>
                                </td>
                                <td class="p-5">
                                    <div class="flex items-center space-x-2">
                                        <span class="w-16 text-center font-bold text-lg text-gray-900">85</span>
                                        <button class="text-gray-400 hover:text-gray-600 p-1.5 rounded-lg transition" title="Edit Nilai">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            
                            <!-- Row 3: Belum Kumpul -->
                            <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition opacity-60">
                                <td class="p-5">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-bold mr-3 text-xs">CD</div>
                                        <div>
                                            <p class="font-bold text-gray-900">Citra Dewi</p>
                                            <p class="text-[11px] text-gray-500">NIS: 10026</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-5 text-gray-500 italic text-xs">
                                    Belum mengumpulkan
                                </td>
                                <td class="p-5 text-gray-400 text-xs">
                                    -
                                </td>
                                <td class="p-5 text-center">
                                    <span class="px-2.5 py-1 bg-gray-100 text-gray-500 rounded-full text-[10px] font-bold">Kosong</span>
                                </td>
                                <td class="p-5">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xs text-gray-400 italic">N/A</span>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                
                <div class="p-4 border-t border-gray-100 flex items-center justify-between">
                    <p class="text-xs text-gray-500">Menampilkan 3 dari 32 siswa</p>
                    <div class="flex space-x-1">
                        <button class="px-3 py-1 bg-gray-100 text-gray-500 rounded text-sm disabled:opacity-50" disabled>Sebelumnya</button>
                        <button class="px-3 py-1 bg-[#007cc3] text-white rounded text-sm">1</button>
                        <button class="px-3 py-1 bg-gray-100 text-gray-600 hover:bg-gray-200 rounded text-sm transition">2</button>
                        <button class="px-3 py-1 bg-gray-100 text-gray-600 hover:bg-gray-200 rounded text-sm transition">Berikutnya</button>
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>

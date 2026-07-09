<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="flex min-h-screen bg-gray-50">
    <!-- Left Side -->
    <div class="hidden lg:flex lg:w-5/12 bg-gradient-to-br from-[#29A4E3] to-[#0A88CB] text-white p-12 xl:p-16 flex-col justify-between relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute top-0 right-0 -mr-32 -mt-32 w-96 h-96 rounded-full bg-white opacity-10"></div>
        <div class="absolute bottom-0 left-0 -ml-24 -mb-24 w-72 h-72 rounded-full bg-white opacity-5"></div>
        
        <div class="relative z-10">
            <div class="inline-block px-4 py-1.5 border border-white/30 rounded-full text-xs font-medium mb-10 tracking-wide bg-white/5 backdrop-blur-sm">
                Edisi Enterprise 2026
            </div>
            
            <h1 class="text-4xl xl:text-5xl font-bold leading-tight mb-6">Mulai Perjalanan Belajar Anda</h1>
            
            <p class="text-lg text-blue-50 mb-14 max-w-lg leading-relaxed opacity-90">
                Bergabunglah dengan ribuan profesional di DIKELAS. Dapatkan akses ke kurikulum eksklusif, mentor berpengalaman, dan komunitas belajar global yang dirancang untuk masa depan karier Anda.
            </p>
            
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <div class="w-12 h-12 bg-white/15 rounded-full flex items-center justify-center mb-4 shadow-inner backdrop-blur-md border border-white/10">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Terakreditasi</h3>
                    <p class="text-sm text-blue-100 opacity-80 leading-relaxed">Sertifikasi resmi yang diakui oleh industri global.</p>
                </div>
                <div>
                    <div class="w-12 h-12 bg-white/15 rounded-full flex items-center justify-center mb-4 shadow-inner backdrop-blur-md border border-white/10">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Kolaboratif</h3>
                    <p class="text-sm text-blue-100 opacity-80 leading-relaxed">Belajar bersama melalui proyek nyata dan forum interaktif.</p>
                </div>
            </div>
        </div>
        
        <div class="flex items-center mt-12 relative z-10">
            <div class="flex -space-x-3">
                <img class="w-10 h-10 rounded-full border-2 border-[#29A4E3] object-cover" src="https://i.pravatar.cc/100?img=1" alt="Avatar">
                <img class="w-10 h-10 rounded-full border-2 border-[#29A4E3] object-cover" src="https://i.pravatar.cc/100?img=2" alt="Avatar">
                <img class="w-10 h-10 rounded-full border-2 border-[#29A4E3] object-cover" src="https://i.pravatar.cc/100?img=3" alt="Avatar">
            </div>
            <span class="ml-4 text-sm font-medium text-white opacity-90">Bergabung dengan 12k+ pelajar hari ini</span>
        </div>
    </div>

    <!-- Right Side -->
    <div class="w-full lg:w-7/12 flex flex-col justify-center items-center p-6 lg:p-12 relative">
        <!-- Main Form Card -->
        <div class="bg-white p-8 sm:p-10 lg:p-12 rounded-[2rem] shadow-xl shadow-gray-200/50 w-full max-w-xl border border-gray-100/50 relative z-10">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2 tracking-tight">Buat Akun Baru</h2>
                <p class="text-gray-500 text-sm">Lengkapi data diri Anda untuk mulai belajar.</p>
            </div>
            
            <form action="/login" method="GET">
                <div class="space-y-5">
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="name">Nama Lengkap</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-[#1291D2] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <input class="w-full pl-11 pr-4 py-3.5 rounded-2xl border border-gray-200 focus:outline-none focus:border-[#1291D2] focus:ring-1 focus:ring-[#1291D2] bg-gray-50 hover:bg-gray-100/50 focus:bg-white transition-all text-sm" id="name" type="text" name="name" placeholder="Nama lengkap Anda" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="email">Alamat Email</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-[#1291D2] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <input class="w-full pl-11 pr-4 py-3.5 rounded-2xl border border-gray-200 focus:outline-none focus:border-[#1291D2] focus:ring-1 focus:ring-[#1291D2] bg-gray-50 hover:bg-gray-100/50 focus:bg-white transition-all text-sm" id="email" type="email" name="email" placeholder="nama@email.com" required>
                        </div>
                    </div>
                    
                    <!-- Role Selection -->
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-3">Pilih Peran</label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="cursor-pointer relative">
                                <input type="radio" name="role" value="murid" class="peer sr-only" checked>
                                <div class="rounded-2xl border-2 border-gray-200 bg-gray-50 py-4 flex flex-col items-center justify-center peer-checked:border-[#1291D2] peer-checked:bg-[#F4F9FD] transition-all hover:bg-gray-100/50 group">
                                    <svg class="w-7 h-7 text-gray-500 mb-2 peer-checked:text-[#1291D2] group-hover:text-gray-700 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                                    <span class="font-semibold text-sm text-gray-600 peer-checked:text-[#1291D2]">Murid</span>
                                </div>
                                <!-- Checkmark icon for active state -->
                                <div class="absolute top-3 right-3 hidden peer-checked:block text-[#1291D2]">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                </div>
                            </label>
                            
                            <label class="cursor-pointer relative">
                                <input type="radio" name="role" value="guru" class="peer sr-only">
                                <div class="rounded-2xl border-2 border-gray-200 bg-gray-50 py-4 flex flex-col items-center justify-center peer-checked:border-[#1291D2] peer-checked:bg-[#F4F9FD] transition-all hover:bg-gray-100/50 group">
                                    <svg class="w-7 h-7 text-gray-500 mb-2 peer-checked:text-[#1291D2] group-hover:text-gray-700 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    <span class="font-semibold text-sm text-gray-600 peer-checked:text-[#1291D2]">Guru</span>
                                </div>
                                <div class="absolute top-3 right-3 hidden peer-checked:block text-[#1291D2]">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Password and Confirmation -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-2">
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2" for="password">Password</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-[#1291D2] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                </div>
                                <input class="w-full pl-11 pr-4 py-3.5 rounded-2xl border border-gray-200 focus:outline-none focus:border-[#1291D2] focus:ring-1 focus:ring-[#1291D2] bg-gray-50 hover:bg-gray-100/50 focus:bg-white transition-all text-sm" id="password" type="password" name="password" placeholder="••••••••" required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2" for="password_confirmation">Konfirmasi</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-[#1291D2] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                </div>
                                <input class="w-full pl-11 pr-4 py-3.5 rounded-2xl border border-gray-200 focus:outline-none focus:border-[#1291D2] focus:ring-1 focus:ring-[#1291D2] bg-gray-50 hover:bg-gray-100/50 focus:bg-white transition-all text-sm" id="password_confirmation" type="password" name="password_confirmation" placeholder="••••••••" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <button class="w-full bg-[#1291D2] hover:bg-[#0F7EB8] text-white font-bold py-3.5 px-4 rounded-full shadow-lg shadow-blue-500/30 transition-all duration-300 hover:shadow-blue-500/50 transform hover:-translate-y-0.5" type="submit">
                        Daftar Sekarang
                    </button>
                </div>
                
                <p class="text-center text-sm text-gray-600 mt-6">
                    Sudah punya akun? <a href="{{ route('login') }}" class="font-semibold text-[#1291D2] hover:text-[#0F7EB8] transition-colors hover:underline">Login</a>
                </p>
            </form>
        </div>
        
        <!-- Footer outside card -->
        <div class="w-full max-w-xl mt-8 flex justify-between items-center text-xs text-gray-400">
            <span>© 2026 DIKELAS LMS</span>
            <div class="space-x-6">
                <a href="#" class="hover:text-gray-600 transition-colors">Bantuan</a>
                <a href="#" class="hover:text-gray-600 transition-colors">Bahasa</a>
            </div>
        </div>
    </div>
</body>
</html>

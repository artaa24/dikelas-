<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
    </style>
</head>
<body class="flex min-h-screen bg-gray-50">
    <!-- Main Content -->
    <div class="w-full flex flex-col justify-center items-center p-6 lg:p-12 relative mx-auto">
        <!-- Main Form Card -->
        <div class="bg-white p-8 sm:p-10 lg:p-12 rounded-[2rem] shadow-xl shadow-gray-200/50 w-full max-w-xl border border-gray-100/50 relative z-10">
            <div class="flex justify-center mb-8">
                <img src="{{ asset('assets/Logo.png') }}" alt="DIKELAS Logo" class="h-16">
            </div>
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-2 tracking-tight">Buat Akun Baru</h2>
                <p class="text-gray-500 text-sm">Lengkapi data diri Anda untuk mulai belajar.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 bg-red-50 text-red-600 border border-red-200 rounded-xl p-4 text-sm font-medium">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('register.submit') }}" method="POST">
                @csrf
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
                                <input class="w-full pl-11 pr-12 py-3.5 rounded-2xl border border-gray-200 focus:outline-none focus:border-[#1291D2] focus:ring-1 focus:ring-[#1291D2] bg-gray-50 hover:bg-gray-100/50 focus:bg-white transition-all text-sm" id="password" type="password" name="password" placeholder="••••••••" required>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center cursor-pointer hover:text-gray-600 transition-colors" onclick="togglePassword('password')">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2" for="password_confirmation">Konfirmasi</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-[#1291D2] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                </div>
                                <input class="w-full pl-11 pr-12 py-3.5 rounded-2xl border border-gray-200 focus:outline-none focus:border-[#1291D2] focus:ring-1 focus:ring-[#1291D2] bg-gray-50 hover:bg-gray-100/50 focus:bg-white transition-all text-sm" id="password_confirmation" type="password" name="password_confirmation" placeholder="••••••••" required>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center cursor-pointer hover:text-gray-600 transition-colors" onclick="togglePassword('password_confirmation')">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </div>
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
                <a href="/help-center" class="hover:text-gray-600 transition-colors">Bantuan</a>
                <a href="#" class="hover:text-gray-600 transition-colors">Bahasa</a>
            </div>
        </div>
    </div>
    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
            } else {
                input.type = 'password';
            }
        }
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DIKELAS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4 lg:p-8">
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row w-full max-w-6xl">
        <!-- Left Side -->
        <div class="hidden md:flex md:w-1/2 bg-[#0275B1] text-white p-12 flex-col justify-center items-center text-center relative overflow-hidden">
            <!-- Decorative circle -->
            <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-white opacity-5"></div>
            <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-48 h-48 rounded-full bg-white opacity-5"></div>
            
            <h1 class="text-4xl lg:text-5xl font-bold mb-6 relative z-10 leading-tight">Inovasi Belajar Masa Depan</h1>
            <p class="text-lg text-blue-100 mb-10 max-w-md relative z-10">Akses ribuan materi pembelajaran interaktif dan kelola jadwal pengajaran Anda dalam satu platform cerdas.</p>
            
            <div class="w-full max-w-md bg-white/10 rounded-xl p-3 backdrop-blur-sm relative z-10 border border-white/20 shadow-2xl">
                 <img src="{{ asset('assets/Home - DIKELAS Professional LMS.png') }}" alt="Dashboard Illustration" class="rounded-lg shadow-lg opacity-90 hover:opacity-100 transition duration-300 w-full h-auto object-cover">
            </div>
        </div>

        <!-- Right Side -->
        <div class="w-full md:w-1/2 p-10 lg:px-20 xl:px-24 flex flex-col justify-center bg-white">
            <div class="flex justify-center mb-8">
                <!-- Droplet Logo -->
                <svg class="w-12 h-12 text-[#0A4B7D]" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/>
                    <circle cx="12" cy="14" r="2" fill="white"/>
                </svg>
            </div>
            
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-3 tracking-tight">Selamat Datang di DIKELAS</h2>
            <p class="text-center text-gray-500 mb-10 text-sm">Masuk untuk melanjutkan proses belajar mengajar Anda.</p>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                
                @if ($errors->any())
                <div class="mb-6 bg-red-50 text-red-600 border border-red-200 rounded-xl p-4 text-sm font-medium">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="mb-5">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="email">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <input class="w-full pl-11 pr-4 py-3.5 rounded-full border {{ $errors->has('email') ? 'border-red-500 ring-1 ring-red-500' : 'border-gray-200 focus:border-[#0275B1] focus:ring-[#0275B1]' }} focus:outline-none focus:ring-1 bg-gray-50/50 transition-colors" id="email" type="email" name="email" placeholder="nama@institusi.ac.id" value="{{ old('email') }}" required autofocus>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="password">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input class="w-full pl-11 pr-12 py-3.5 rounded-full border {{ $errors->has('password') ? 'border-red-500 ring-1 ring-red-500' : 'border-gray-200 focus:border-[#0275B1] focus:ring-[#0275B1]' }} focus:outline-none focus:ring-1 bg-gray-50/50 transition-colors" id="password" type="password" name="password" placeholder="••••••••" required>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center cursor-pointer hover:text-gray-600 transition-colors">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between mb-8">
                    <label class="flex items-center cursor-pointer">
                        <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-[#0275B1] border-gray-300 rounded focus:ring-[#0275B1] transition">
                        <span class="ml-2 text-sm text-gray-600">Ingat Saya</span>
                    </label>
                    <a href="#" class="text-sm font-medium text-[#0275B1] hover:text-blue-800 transition-colors">Lupa Password?</a>
                </div>

                <button class="w-full bg-[#0275B1] hover:bg-blue-700 text-white font-semibold py-3.5 px-4 rounded-full flex justify-center items-center shadow-lg shadow-blue-500/30 transition-all duration-300 hover:shadow-blue-500/50" type="submit">
                    Masuk Sekarang 
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </form>

            <div class="mt-8 flex items-center justify-center relative">
                <div class="w-full h-px bg-gray-200"></div>
                <span class="px-4 text-xs font-medium text-gray-400 bg-white absolute uppercase tracking-wider">Atau masuk dengan</span>
            </div>

            <div class="mt-8 grid grid-cols-2 gap-4">
                <button type="button" class="flex items-center justify-center py-2.5 px-4 border border-gray-200 rounded-full hover:bg-gray-50 hover:border-gray-300 transition-all">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="h-5 w-5 mr-2" alt="Google">
                    <span class="text-sm font-medium text-gray-600">Google</span>
                </button>
                <button type="button" class="flex items-center justify-center py-2.5 px-4 border border-gray-200 rounded-full hover:bg-gray-50 hover:border-gray-300 transition-all">
                    <img src="https://www.svgrepo.com/show/448234/microsoft.svg" class="h-5 w-5 mr-2" alt="Microsoft">
                    <span class="text-sm font-medium text-gray-600">Microsoft</span>
                </button>
            </div>

            <p class="mt-8 text-center text-sm text-gray-600">
                Belum punya akun? <a href="{{ route('register') }}" class="font-semibold text-[#0275B1] hover:text-blue-800 transition-colors">Daftar gratis</a>
            </p>
            
            <p class="mt-12 text-center text-xs text-gray-400">
                © 2024 DIKELAS Learning Management System.<br>Seluruh hak cipta dilindungi.
            </p>
        </div>
    </div>
</body>
</html>

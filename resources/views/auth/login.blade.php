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
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col w-full max-w-md">
        <!-- Login Form -->
        <div class="w-full p-8 sm:p-10 flex flex-col justify-center bg-white">
            <div class="flex justify-center mb-8">
                <img src="{{ asset('assets/Logo.png') }}" alt="DIKELAS Logo" class="h-16">
            </div>
            
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-3 tracking-tight">Selamat Datang di DIKELAS</h2>
            <p class="text-center text-gray-500 mb-10 text-sm">Masuk untuk melanjutkan proses belajar mengajar Anda.</p>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                
                @if (session('success'))
                <div class="mb-6 bg-green-50 text-green-600 border border-green-200 rounded-xl p-4 text-sm font-medium">
                    {{ session('success') }}
                </div>
                @endif
                
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
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center cursor-pointer hover:text-gray-600 transition-colors" onclick="togglePassword('password', this)">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mb-8">
                    <button type="button" onclick="document.getElementById('resetModal').classList.remove('hidden')" class="text-sm font-medium text-[#0275B1] hover:text-blue-800 transition-colors">Lupa Password?</button>
                </div>

                <button class="w-full bg-[#0275B1] hover:bg-blue-700 text-white font-semibold py-3.5 px-4 rounded-full flex justify-center items-center shadow-lg shadow-blue-500/30 transition-all duration-300 hover:shadow-blue-500/50" type="submit">
                    Masuk Sekarang 
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-gray-600">
                Belum punya akun? <a href="{{ route('register') }}" class="font-semibold text-[#0275B1] hover:text-blue-800 transition-colors">Daftar</a>
            </p>
            
            <p class="mt-12 text-center text-xs text-gray-400">
                © 2024 DIKELAS Learning Management System.<br>Seluruh hak cipta dilindungi.
            </p>
        </div>
    </div>
    
    <!-- Password Reset Modal -->
    <div id="resetModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-gray-900/50 backdrop-blur-sm transition-opacity">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-3xl shadow-xl w-full max-w-md p-8 relative">
                <button onclick="document.getElementById('resetModal').classList.add('hidden')" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-blue-50 text-[#0275B1] rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Lupa Password?</h3>
                    <p class="text-gray-500 mt-2 text-sm">Masukkan NIP, NIS, atau Email Anda. Kami akan mengirimkan notifikasi ke Tata Usaha untuk mereset kata sandi Anda.</p>
                </div>
                
                <form action="{{ route('password.reset.request') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">NIP / NIS / Email</label>
                        <input type="text" name="identifier" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:bg-white focus:outline-none focus:border-[#0275B1] transition" placeholder="Masukkan ID Anda...">
                    </div>
                    <div class="flex gap-3">
                        <button type="button" onclick="document.getElementById('resetModal').classList.add('hidden')" class="w-1/2 px-4 py-3 border border-gray-200 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition">Batal</button>
                        <button type="submit" class="w-1/2 bg-[#0275B1] hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-xl shadow-lg shadow-blue-500/30 transition-all">Kirim Permintaan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId, el) {
            const input = document.getElementById(inputId);
            const svg = el.querySelector('svg');
            if (input.type === 'password') {
                input.type = 'text';
                svg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />';
            } else {
                input.type = 'password';
                svg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>';
            }
        }
    </script>
</body>
</html>

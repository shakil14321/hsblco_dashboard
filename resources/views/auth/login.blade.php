<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#050d24] relative overflow-hidden">

<div class="absolute inset-0">
    <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-blue-600/20 blur-[160px]"></div>
    <div class="absolute bottom-0 right-0 w-[450px] h-[450px] bg-cyan-500/20 blur-[160px]"></div>
</div>

<div class="relative z-10 min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-[480px]">

        <div class="backdrop-blur-xl bg-white/5 border border-cyan-500/20 rounded-[24px] p-8 shadow-[0_0_50px_rgba(0,180,255,0.15)]">

            <div class="flex justify-center mb-6">
                <img
                    src="{{ asset('HSBLCO-LLC.png') }}"
                    alt="HSBLCO LLC Logo"
                    class="h-20 w-auto"
                >
            </div>

            <h2 class="text-3xl font-bold text-white text-center">
                Sign In
            </h2>

            <p class="text-slate-400 text-center mt-2">
                Access your dashboard securely
            </p>

            @if ($errors->any())
                <div class="mt-5 rounded-xl bg-red-500/20 border border-red-300/20 px-4 py-3 text-sm text-red-100">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}" class="mt-7 space-y-4">
                @csrf

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    placeholder="Email Address"
                    class="w-full h-12 rounded-xl bg-white/10 border border-cyan-500/20 text-white px-5 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                >

                <input
                    type="password"
                    name="password"
                    required
                    placeholder="Password"
                    class="w-full h-12 rounded-xl bg-white/10 border border-cyan-500/20 text-white px-5 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                >

                <div class="flex justify-between items-center text-sm text-slate-300">
                    <label class="flex items-center gap-2">
                        <input
                            type="checkbox"
                            name="remember"
                            class="rounded border-cyan-500/20 bg-white/10"
                        >
                        Remember Me
                    </label>

                    <a href="#" class="text-cyan-400 font-medium hover:text-cyan-300">
                        Forgot Password?
                    </a>
                </div>

                <button
                    type="submit"
                    class="w-full h-12 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-semibold shadow-lg shadow-cyan-500/30 hover:opacity-90 transition">
                    Sign In
                </button>
            </form>

            <p class="mt-6 text-center text-slate-400">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-cyan-400 font-semibold hover:text-cyan-300">
                    Register
                </a>
            </p>

        </div>

    </div>

</div>

</body>
</html>

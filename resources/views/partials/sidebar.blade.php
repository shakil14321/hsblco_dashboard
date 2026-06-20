<aside class="w-64 bg-slate-900 text-white min-h-screen flex flex-col">

    <!-- Logo -->
    <div class="p-6 border-b border-slate-700">
        <h2 class="text-2xl font-bold tracking-wide">
            HSBLCO
        </h2>
    </div>

    <!-- Menu -->
    <nav class="flex-1 p-4 space-y-2">

        <a href="{{ route('dashboard') }}"
           class="flex items-center px-4 py-3 rounded-xl bg-slate-800 text-white font-medium transition hover:bg-slate-700">
            Dashboard
        </a>

        <a href="#"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Users
        </a>

        <a href="#"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Reports
        </a>

        <a href="#"
           class="flex items-center px-4 py-3 rounded-xl text-slate-300 transition hover:bg-slate-800 hover:text-white">
            Settings
        </a>

    </nav>

    <!-- User Section -->
    <div class="p-4 border-t border-slate-700">

{{--        <div class="mb-4">--}}
{{--            <p class="text-sm text-slate-400">Logged in as</p>--}}
{{--            <p class="font-semibold truncate">--}}
{{--                {{ Auth::user()->name ?? 'User' }}--}}
{{--            </p>--}}
{{--        </div>--}}

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button
                type="submit"
                class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-xl font-semibold transition duration-200 shadow-lg">
                Logout
            </button>
        </form>

    </div>

</aside>

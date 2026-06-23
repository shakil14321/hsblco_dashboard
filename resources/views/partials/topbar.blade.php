<header class="sticky top-0 z-50 h-[88px] bg-white dark:bg-[#0f172a] border-b border-gray-200 dark:border-[#1e293b] px-6">

    <div class="h-full flex items-center justify-between">

        <button type="button"
                @click="sidebarOpen = !sidebarOpen"
                class="w-11 h-11 flex items-center justify-center rounded-xl border border-gray-200 dark:border-[#1e293b] bg-white dark:bg-[#111827] text-gray-500 dark:text-slate-400 hover:bg-gray-100 dark:hover:bg-[#1e293b] transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h10M4 18h16"/>
            </svg>
        </button>

        <div class="flex items-center gap-3">

            <button type="button"
                    @click="darkMode = !darkMode"
                    class="w-11 h-11 flex items-center justify-center rounded-full border border-gray-200 dark:border-[#1e293b] bg-white dark:bg-[#111827] text-gray-500 dark:text-slate-400 hover:bg-gray-100 dark:hover:bg-[#1e293b] transition">
                <span x-show="!darkMode">🌙</span>
                <span x-show="darkMode" x-cloak>☀️</span>
            </button>

            <button type="button"
                    class="relative w-11 h-11 flex items-center justify-center rounded-full border border-gray-200 dark:border-[#1e293b] bg-white dark:bg-[#111827] text-gray-500 dark:text-slate-400 hover:bg-gray-100 dark:hover:bg-[#1e293b] transition">
                <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-orange-400"></span>
                🔔
            </button>

            <div class="relative" x-data="{ userDropdown: false }" @click.outside="userDropdown = false">

                <button type="button"
                        @click="userDropdown = !userDropdown"
                        class="flex items-center gap-3 pl-2">

                    <div class="w-11 h-11 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>

                    <p class="hidden sm:block text-sm font-semibold text-gray-800 dark:text-white">
                        {{ Auth::user()->name }}
                    </p>

                    <svg :class="userDropdown ? 'rotate-180' : ''"
                         class="w-4 h-4 text-slate-500 transition"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-show="userDropdown"
                     x-transition
                     x-cloak
                     class="absolute right-0 mt-4 w-60 rounded-2xl border border-gray-200 dark:border-[#1e293b] bg-white dark:bg-[#111827] p-3 shadow-xl z-50">

                    <div class="px-3 pb-3 border-b border-gray-200 dark:border-[#1e293b]">
                        <p class="text-sm font-semibold text-gray-800 dark:text-white">
                            {{ Auth::user()->name }}
                        </p>

                        <p class="text-xs text-slate-500 mt-1">
                            {{ Auth::user()->email ?? '' }}
                        </p>
                    </div>

                    <form action="{{ route('logout') }}" method="POST" class="mt-3">
                        @csrf
                        <button type="submit"
                                class="w-full flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-semibold text-red-500 hover:bg-red-500/10 transition">
                            <span>↪</span>
                            <span>Logout</span>
                        </button>
                    </form>

                </div>

            </div>

        </div>

    </div>

</header>

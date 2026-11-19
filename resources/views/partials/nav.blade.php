<header class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b border-slate-200/80 shadow-xs">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
        <div class="flex items-center gap-8">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
                <span class="h-9 w-9 rounded-xl bg-teal-700 text-white flex items-center justify-center font-extrabold text-lg shadow-sm group-hover:bg-teal-800 transition">W</span>
                <span class="font-extrabold text-lg tracking-tight text-slate-900">Warta<span class="text-teal-700">Tech</span></span>
            </a>

            <nav class="hidden sm:flex items-center gap-1">
                <a href="{{ route('home') }}"
                   class="px-3.5 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('home') ? 'bg-teal-50 text-teal-700' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                    Home
                </a>
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('dashboard') ? 'bg-teal-50 text-teal-700' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('articles.index') }}"
                       class="px-3.5 py-2 rounded-lg text-sm font-semibold transition {{ request()->routeIs('articles.*') ? 'bg-teal-50 text-teal-700' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100' }}">
                        Kelola Artikel
                    </a>
                @endauth
            </nav>
        </div>

        <div class="flex items-center gap-3">
            @auth
                <div class="hidden md:flex items-center gap-2 bg-slate-100 px-3 py-1.5 rounded-full border border-slate-200">
                    <span class="h-6 w-6 rounded-full bg-teal-700 text-white text-xs font-bold flex items-center justify-center uppercase">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </span>
                    <span class="text-xs font-semibold text-slate-700">{{ Auth::user()->name }}</span>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-3.5 py-2 rounded-lg text-xs font-bold text-rose-600 bg-rose-50 hover:bg-rose-100 border border-rose-200 transition cursor-pointer">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-100 transition">
                    Login
                </a>
                <a href="{{ route('register') }}" class="px-4 py-2 rounded-lg text-sm font-semibold text-white bg-teal-700 hover:bg-teal-800 shadow-xs transition">
                    Register
                </a>
            @endauth
        </div>
    </div>
</header>
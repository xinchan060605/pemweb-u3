@extends('layouts.app')

@section('title', 'Beranda — WartaTech')

@section('content')
    {{-- Hero Banner --}}
    <section class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-slate-900 via-slate-800 to-teal-900 text-white p-8 sm:p-10 mb-10 shadow-lg">
        <div class="max-w-2xl relative z-10">
            <span class="inline-block px-3 py-1 rounded-full bg-teal-500/20 border border-teal-400/30 text-teal-300 text-xs font-bold uppercase tracking-wider mb-3">
                Portal Berita Terkini
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight leading-tight mb-3">
                Informasi Akurat, Ringkas, dan Terpercaya.
            </h1>
            <p class="text-slate-300 text-sm sm:text-base leading-relaxed mb-6">
                @auth
                    Halo <strong class="text-white">{{ Auth::user()->name }}</strong>, kelola tulisan atau publikasikan berita terbaru melalui panel artikel.
                @else
                    Jelajahi berita terbaru dari para kontributor kami. Masuk atau daftar akun untuk mulai menulis artikel Anda sendiri.
                @endauth
            </p>
            <div class="flex flex-wrap gap-3">
                @auth
                    <a href="{{ route('articles.create') }}" class="px-5 py-2.5 rounded-xl bg-teal-500 hover:bg-teal-400 text-slate-950 font-bold text-sm transition shadow-md">
                        + Tulis Artikel Baru
                    </a>
                    <a href="{{ route('dashboard') }}" class="px-5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-semibold text-sm border border-white/15 transition">
                        Ke Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-5 py-2.5 rounded-xl bg-teal-500 hover:bg-teal-400 text-slate-950 font-bold text-sm transition shadow-md">
                        Mulai Menulis
                    </a>
                @endauth
            </div>
        </div>
    </section>

    {{-- Section Berita Terbaru --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Berita Terbaru</h2>
            <p class="text-xs text-slate-500 mt-0.5">Menampilkan 6 publikasi terkini dari redaksi</p>
        </div>
        @auth
            <a href="{{ route('articles.index') }}" class="text-sm font-bold text-teal-700 hover:text-teal-800">
                Lihat Semua →
            </a>
        @endauth
    </div>

    @if ($articles->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($articles as $article)
                <article class="group bg-white rounded-2xl border border-slate-200/90 overflow-hidden shadow-xs hover:shadow-md hover:-translate-y-0.5 transition-all duration-200 flex flex-col">
                    <a href="{{ route('articles.show', $article) }}" class="block aspect-video overflow-hidden bg-slate-100 relative">
                        <img src="{{ $article->image ?: 'https://picsum.photos/seed/' . $article->id . '/800/450' }}"
                             alt="{{ $article->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </a>

                    <div class="p-5 flex-grow flex flex-col">
                        <div class="flex items-center gap-2 text-xs text-slate-500 mb-2.5">
                            <span class="px-2.5 py-0.5 rounded-md bg-teal-50 text-teal-700 font-semibold">
                                {{ $article->user->name }}
                            </span>
                            <span>•</span>
                            <time>{{ $article->created_at->format('d M Y') }}</time>
                        </div>

                        <h3 class="font-bold text-lg text-slate-900 leading-snug mb-2 group-hover:text-teal-700 transition line-clamp-2">
                            <a href="{{ route('articles.show', $article) }}">
                                {{ $article->title }}
                            </a>
                        </h3>

                        <p class="text-sm text-slate-600 leading-relaxed line-clamp-3 mb-4 flex-grow">
                            {{ Str::limit(strip_tags($article->body), 120) }}
                        </p>

                        <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                            <a href="{{ route('articles.show', $article) }}" class="inline-flex items-center gap-1 text-xs font-bold text-teal-700 group-hover:gap-2 transition-all">
                                Baca selengkapnya <span>→</span>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center">
            <p class="text-slate-500 font-medium">Belum ada berita yang dipublikasikan.</p>
        </div>
    @endif
@endsection
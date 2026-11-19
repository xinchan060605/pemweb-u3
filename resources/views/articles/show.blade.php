@extends('layouts.app')

@section('title', $article->title . ' — WartaTech')

@section('content')
    <article class="max-w-3xl mx-auto bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="p-6 sm:p-10">
            <div class="flex items-center gap-2 text-xs text-slate-500 mb-4">
                <span class="px-2.5 py-1 rounded-md bg-teal-50 text-teal-700 font-bold">{{ $article->user->name }}</span>
                <span>•</span>
                <span>Dipublikasikan pada {{ $article->created_at->format('d M Y') }}</span>
            </div>

            <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 leading-tight mb-6">
                {{ $article->title }}
            </h1>

            <div class="rounded-2xl overflow-hidden bg-slate-100 mb-8 border border-slate-200/70">
                <img src="{{ $article->image ?: 'https://picsum.photos/seed/' . $article->id . '/1000/520' }}"
                     alt="{{ $article->title }}"
                     class="w-full max-h-[420px] object-cover">
            </div>

            <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed space-y-4 text-base whitespace-pre-line">
                {{ $article->body }}
            </div>

            <div class="mt-10 pt-6 border-t border-slate-200 flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-4 text-sm font-bold text-teal-700">
                    <a href="{{ route('home') }}" class="hover:underline">← Kembali ke Home</a>
                    @auth
                        <span class="text-slate-300">|</span>
                        <a href="{{ route('articles.index') }}" class="hover:underline">Lihat semua artikel</a>
                    @endauth
                </div>

                @auth
                    @if ($article->user_id === Auth::id())
                        <a href="{{ route('articles.edit', $article) }}" class="px-4 py-2 rounded-xl text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100 transition">
                            Edit Artikel Ini
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </article>
@endsection
@extends('layouts.app')

@section('title', 'Kelola Artikel — WartaTech')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Daftar Artikel</h1>
            <p class="text-sm text-slate-500 mt-0.5">Kelola publikasi berita atau baca artikel dari seluruh kontributor.</p>
        </div>
        <a href="{{ route('articles.create') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-teal-700 hover:bg-teal-800 text-white font-bold text-sm shadow-xs transition">
            + Artikel Baru
        </a>
    </div>

    @if ($articles->count())
        <div class="bg-white rounded-2xl border border-slate-200 shadow-xs divide-y divide-slate-100 overflow-hidden">
            @foreach ($articles as $article)
                <div class="p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50/70 transition">
                    <div class="flex items-start sm:items-center gap-4 min-w-0">
                        <img src="{{ $article->image ?: 'https://picsum.photos/seed/' . $article->id . '/200/120' }}"
                             alt="{{ $article->title }}"
                             class="w-20 h-14 rounded-xl object-cover bg-slate-100 shrink-0 border border-slate-200/60">
                        <div class="min-w-0">
                            <a href="{{ route('articles.show', $article) }}" class="font-bold text-base text-slate-900 hover:text-teal-700 transition block truncate">
                                {{ $article->title }}
                            </a>
                            <div class="flex flex-wrap items-center gap-2 mt-1 text-xs text-slate-500">
                                <span class="px-2 py-0.5 rounded-md font-semibold {{ $article->user_id === Auth::id() ? 'bg-teal-50 text-teal-700 border border-teal-200' : 'bg-slate-100 text-slate-600' }}">
                                    oleh {{ $article->user->name }}
                                </span>
                                <span>•</span>
                                <span>{{ $article->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>

                    @if ($article->user_id === Auth::id())
                        <div class="flex items-center gap-2 shrink-0">
                            <a href="{{ route('articles.edit', $article) }}"
                               class="px-3.5 py-1.5 rounded-lg text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100 transition">
                                Edit
                            </a>
                            <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Hapus artikel ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3.5 py-1.5 rounded-lg text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200 hover:bg-rose-100 transition cursor-pointer">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        {{ $articles->links('pagination::default') }}
    @else
        <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center">
            <p class="text-slate-500">Belum ada artikel.</p>
        </div>
    @endif
@endsection
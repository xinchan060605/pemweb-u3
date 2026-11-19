@extends('layouts.app')

@section('title', 'Edit Artikel — WartaTech')

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-2xl border border-slate-200 shadow-xs p-6 sm:p-8">
        <div class="mb-6">
            <h1 class="text-2xl font-extrabold text-slate-900">Edit Artikel / Berita</h1>
            <p class="text-sm text-slate-500 mt-1">Perbarui informasi berita di bawah ini.</p>
        </div>

        <form action="{{ route('articles.update', $article) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1.5">Judul Artikel</label>
                <input type="text" name="title" value="{{ old('title', $article->title) }}" required
                       class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-teal-600 focus:ring-2 focus:ring-teal-600/20 outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1.5">URL Gambar (opsional)</label>
                <input type="url" name="image" value="{{ old('image', $article->image) }}" placeholder="https://example.com/gambar.jpg"
                       class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-teal-600 focus:ring-2 focus:ring-teal-600/20 outline-none transition">
            </div>

            <div>
                <p class="text-xs font-bold text-slate-500 mb-2">Pratinjau gambar saat ini:</p>
                <img src="{{ $article->image ?: 'https://picsum.photos/seed/' . $article->id . '/800/400' }}"
                     alt="Pratinjau"
                     class="w-full max-h-56 object-cover rounded-xl border border-slate-200">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1.5">Isi Berita</label>
                <textarea name="body" rows="7" required
                          class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-teal-600 focus:ring-2 focus:ring-teal-600/20 outline-none transition">{{ old('body', $article->body) }}</textarea>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-teal-700 hover:bg-teal-800 text-white font-bold text-sm shadow-xs transition cursor-pointer">
                    Update Artikel
                </button>
                <a href="{{ route('articles.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-100 font-semibold text-sm transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
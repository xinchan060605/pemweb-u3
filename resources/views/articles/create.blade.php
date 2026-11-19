@extends('layouts.app')

@section('title', 'Tambah Artikel Baru — WartaTech')

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-2xl border border-slate-200 shadow-xs p-6 sm:p-8">
        <div class="mb-6">
            <h1 class="text-2xl font-extrabold text-slate-900">Tambah Artikel / Berita</h1>
            <p class="text-sm text-slate-500 mt-1">Isi formulir di bawah untuk mempublikasikan berita baru ke portal.</p>
        </div>

        <form action="{{ route('articles.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1.5">Judul Artikel</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Masukkan judul berita yang menarik..."
                       class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-teal-600 focus:ring-2 focus:ring-teal-600/20 outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1.5">URL Gambar (opsional)</label>
                <input type="url" name="image" value="{{ old('image') }}" placeholder="https://example.com/gambar.jpg"
                       class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-teal-600 focus:ring-2 focus:ring-teal-600/20 outline-none transition">
                <p class="text-xs text-slate-400 mt-1">Jika dikosongkan, sistem otomatis memakai gambar placeholder dari <code class="text-slate-600">picsum.photos</code>.</p>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1.5">Isi Berita</label>
                <textarea name="body" rows="7" required placeholder="Tuliskan isi berita secara lengkap..."
                          class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-teal-600 focus:ring-2 focus:ring-teal-600/20 outline-none transition">{{ old('body') }}</textarea>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-teal-700 hover:bg-teal-800 text-white font-bold text-sm shadow-xs transition cursor-pointer">
                    Simpan Artikel
                </button>
                <a href="{{ route('articles.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-100 font-semibold text-sm transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
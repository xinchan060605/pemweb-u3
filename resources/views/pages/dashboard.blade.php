@extends('layouts.app')

@section('title', 'Dashboard — WartaTech')

@section('content')
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                Selamat datang, {{ $user->name }} 👋
            </h1>
            <p class="text-sm text-slate-500 mt-1">Ringkasan statistik publikasi dan aktivitas akun Anda.</p>
        </div>
        <a href="{{ route('articles.create') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-teal-700 hover:bg-teal-800 text-white font-bold text-sm shadow-xs transition">
            + Tambah Artikel Baru
        </a>
    </div>

    {{-- Kartu Statistik --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">
        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Artikel Sistem</p>
                <p class="text-3xl font-extrabold text-slate-900 mt-1">{{ $totalArticles }}</p>
                <p class="text-xs text-slate-500 mt-1">Seluruh berita terpublikasi</p>
            </div>
            <div class="h-12 w-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-xl">
                📰
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Artikel Kamu</p>
                <p class="text-3xl font-extrabold text-teal-700 mt-1">{{ $myArticles }}</p>
                <p class="text-xs text-slate-500 mt-1">Ditulis oleh {{ $user->name }}</p>
            </div>
            <div class="h-12 w-12 rounded-2xl bg-teal-50 text-teal-700 flex items-center justify-center font-bold text-xl">
                ✍️
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Status Akun</p>
                <p class="text-base font-bold text-slate-900 mt-1 truncate max-w-[170px]">{{ $user->email }}</p>
                <span class="inline-block mt-1.5 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                    Aktif Terverifikasi
                </span>
            </div>
            <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-xl">
                👤
            </div>
        </div>
    </div>

    {{-- Artikel Terbaru --}}
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between">
            <h2 class="font-bold text-lg text-slate-900">5 Artikel Terbaru di Portal</h2>
            <a href="{{ route('articles.index') }}" class="text-xs font-bold text-teal-700 hover:underline">Kelola Semua →</a>
        </div>
        <div class="divide-y divide-slate-100">
            @foreach ($latestArticles as $item)
                <div class="p-5 flex items-center gap-4 hover:bg-slate-50/80 transition">
                    <img src="{{ $item->image ?: 'https://picsum.photos/seed/' . $item->id . '/200/120' }}"
                         alt="{{ $item->title }}"
                         class="w-20 h-14 rounded-lg object-cover bg-slate-100 shrink-0">
                    <div class="min-w-0 flex-grow">
                        <a href="{{ route('articles.show', $item) }}" class="font-bold text-slate-900 hover:text-teal-700 transition block truncate">
                            {{ $item->title }}
                        </a>
                        <p class="text-xs text-slate-500 mt-0.5">
                            Oleh <span class="font-semibold text-slate-700">{{ $item->user->name }}</span> • {{ $item->created_at->format('d M Y, H:i') }}
                        </p>
                    </div>
                    <a href="{{ route('articles.show', $item) }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold border border-slate-200 text-slate-600 hover:bg-white hover:text-slate-900 shrink-0">
                        Buka
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
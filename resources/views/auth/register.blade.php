@extends('layouts.app')

@section('title', 'Register — WartaTech')

@section('content')
    <div class="max-w-md mx-auto bg-white rounded-2xl border border-slate-200 shadow-xs p-8 my-6">
        <div class="text-center mb-6">
            <span class="inline-flex h-11 w-11 rounded-xl bg-teal-700 text-white items-center justify-center font-extrabold text-xl mb-3">W</span>
            <h1 class="text-2xl font-extrabold text-slate-900">Buat Akun Baru</h1>
            <p class="text-xs text-slate-500 mt-1">Bergabung sebagai kontributor berita di WartaTech</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-teal-600 focus:ring-2 focus:ring-teal-600/20 outline-none">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-teal-600 focus:ring-2 focus:ring-teal-600/20 outline-none">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Password</label>
                <input type="password" name="password" required
                       class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-teal-600 focus:ring-2 focus:ring-teal-600/20 outline-none">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required
                       class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-teal-600 focus:ring-2 focus:ring-teal-600/20 outline-none">
            </div>

            <button type="submit" class="w-full py-2.5 rounded-xl bg-teal-700 hover:bg-teal-800 text-white font-bold text-sm shadow-xs transition cursor-pointer">
                Daftar Akun
            </button>
        </form>

        <p class="text-center text-xs text-slate-500 mt-6">
            Sudah punya akun? <a href="{{ route('login') }}" class="font-bold text-teal-700 hover:underline">Masuk di sini</a>
        </p>
    </div>
@endsection
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WartaTech — Portal Berita Modern')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        /* Styling Pagination Kustom Laravel 13 */
        .pagination { display: flex; align-items: center; gap: 0.375rem; list-style: none; padding: 0; margin-top: 1.5rem; }
        .pagination li a, .pagination li span {
            display: inline-flex; align-items: center; justify-content: center;
            min-width: 2.25rem; height: 2.25rem; padding: 0 0.75rem;
            border-radius: 0.5rem; font-size: 0.875rem; font-weight: 600;
            border: 1px solid #e2e8f0; background: #ffffff; color: #334155;
            transition: all 0.15s ease;
        }
        .pagination li a:hover { background: #f1f5f9; border-color: #cbd5e1; color: #0f172a; }
        .pagination li.active span { background: #0f766e; border-color: #0f766e; color: #ffffff; }
        .pagination li.disabled span { opacity: 0.45; cursor: not-allowed; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col antialiased selection:bg-teal-600 selection:text-white">

    @include('partials.nav')

    <main class="flex-grow max-w-6xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if (session('success'))
            <div class="mb-6 flex items-center justify-between rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3.5 text-sm font-medium text-emerald-800 shadow-sm">
                <div class="flex items-center gap-2.5">
                    <span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-600 text-white text-xs">✓</span>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-800 shadow-sm">
                <p class="font-bold mb-1">Terjadi kesalahan input:</p>
                <ul class="list-disc list-inside space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-white border-t border-slate-200 mt-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-2">
            <p class="font-semibold text-slate-700">WartaTech Portal Berita © {{ date('Y') }}</p>
            <p>Praktikum Pemrograman Web — Laravel CRUD & Eloquent ORM</p>
        </div>
    </footer>

</body>
</html>
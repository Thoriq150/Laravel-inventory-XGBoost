<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <title>
        {{ $title ?? 'Gudangku' }} | {{ config('app.name') }}
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description"
        content="Gudangku merupakan sistem inventori berbasis web untuk membantu UMKM dalam mengelola data barang, transaksi, monitoring stok, dan prediksi kebutuhan stok menggunakan algoritma XGBoost.">

    <meta name="theme-color" content="#2563eb">

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    {{-- CSS --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- Alpine JS --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body class="bg-slate-100 text-slate-700 antialiased"
    style="font-family:'Lexend',sans-serif;">

    {{-- Navbar --}}
    @include('layouts.landing.navbar')

    {{-- Content --}}
    <main class="min-h-screen pb-20">

        @yield('content')

    </main>

    {{-- Mobile Navigation --}}
    @include('layouts.landing.mobileNav')

    {{-- SweetAlert --}}
    @if(View::exists('sweetalert::alert'))
        @include('sweetalert::alert')
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('js')

</body>

</html>
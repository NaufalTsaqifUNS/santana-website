<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Meta Tags -->
        <meta name="description" content="Santana Rental Mobil Solo - Layanan rental mobil terpercaya di Solo dengan harga terjangkau, armada terawat, dan pelayanan profesional. Sewa mobil untuk perjalanan wisata, bisnis, atau kebutuhan pribadi.">
        <meta name="keywords" content="rental mobil solo, sewa mobil solo, rental mobil murah solo, sewa mobil murah solo, rental mobil sukoharjo, santana rental">
        <meta name="author" content="Santana Rental Mobil Solo">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ config('app.name', 'Laravel') }} - Rental Mobil Terpercaya">
        <meta property="og:description" content="Layanan rental mobil terpercaya di Solo dengan harga terjangkau dan armada terawat.">
        <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ config('app.name', 'Laravel') }} - Rental Mobil Terpercaya">
        <meta name="twitter:description" content="Layanan rental mobil terpercaya di Solo dengan harga terjangkau dan armada terawat.">

        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="{{ asset('images/Logo-santana.svg') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/santana-logo.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/santana-logo.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/santana-logo.png') }}">
        <link rel="shortcut icon" href="{{ asset('images/Logo-santana.svg') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>

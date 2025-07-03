<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Meta dinámico --}}
    <title>@yield('title', 'Malvorlagen zum Ausdrucken')</title>
    <meta name="description" content="@yield('meta_description', 'Kostenlose Ausmalbilder zum Herunterladen und Ausdrucken für Kinder und Familien.')">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}" />

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('og_title', 'Malvorlagen zum Ausdrucken')" />
    <meta property="og:description" content="@yield('og_description', 'Kostenlose Ausmalbilder für Kinder')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="@yield('og_image', asset('og-default.jpg'))" />

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('twitter_title', 'Malvorlagen zum Ausdrucken')" />
    <meta name="twitter:description" content="@yield('twitter_description', 'Ausmalbilder kostenlos drucken')" />
    <meta name="twitter:image" content="@yield('twitter_image', asset('og-default.jpg'))" />

    {{-- Estilos --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800">
    <header class="p-4 bg-gray-100 border-b">
        <a href="/" class="text-xl font-bold">MalFreude.com</a>
    </header>

    <main class="p-4 max-w-5xl mx-auto">
        @yield('content')
    </main>

    <footer class="p-4 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} MalFreude.com – Alle Rechte vorbehalten.
    </footer>
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>
    <meta name="title" content="@yield('title', config('app.name'))" />
    <meta name="description" content="@yield('description', '')" />
    <link rel="canonical" href="@yield('canonical_url', url()->current())" />

    <meta property="fb:app_id" content="{{ config('services.facebook.client_id') }}" />

    <meta property="og:locale" content="es_PE" />
    <meta property="og:type" content="@yield('type', 'website')" />
    <meta property="og:title" content="@yield('title', config('app.name'))" />
    <meta property="og:description" content="@yield('description', '')" />
    <meta property="og:url" content="@yield('url', url()->current())" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta property="og:image" content="@yield('image', url('img/logo.png'))" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="627" />

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;700&family=Crimson+Text&family=Great+Vibes&family=Lateef&family=Nunito:wght@300&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/main.css') }}?ver=1.1" rel="stylesheet">
    @yield('styles')
</head>

<body>
    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif
    <main>
        {{ $slot }}
    </main>
    @include('inc.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    {{-- custom --}}
    <script src="{{ asset('js/main.js') }}?ver=1.0"></script>
    @stack('modals')

    @livewireScripts
    @yield('scripts')
</body>

</html>

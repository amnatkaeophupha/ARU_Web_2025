<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'ARU Photo Gallery')</title>

    {{-- Bootstrap (ถ้ามีอยู่แล้วไม่ต้องใส้ซ้ำ) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    {{-- Fancybox 3 --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>

    @stack('styles')
</head>
<body>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Fancybox --}}
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

    @stack('scripts')
</body>
</html>

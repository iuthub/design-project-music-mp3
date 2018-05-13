<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    @include('layouts.styles')
</head>
<body>
@include('layouts/header')
            @yield('content')
@include('layouts/footer')
@include('layouts/scripts')
</body>
<!-- Scripts -->
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.header')
    <body>
        @yield('content')
        @include('layouts.footer')
    </body>
</html>

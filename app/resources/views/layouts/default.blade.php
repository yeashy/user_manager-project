<!doctype html>
<html lang="ru">
@include('partials.common.head')
<body>
@include('partials.common.header')
<div class="content_wrapper">
    @yield('content')
</div>

@yield('bottom-scripts')
</body>
</html>

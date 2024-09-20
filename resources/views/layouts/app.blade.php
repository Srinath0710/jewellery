<!-- resources/views/layouts/app.blade.php -->
@include('layouts.header')
@include('layouts.nav')

<div class="container">
    @yield('content')
</div>

@include('layouts.footer', ['pages' => $pages])

<!doctype html>
<html lang="en-us">

    @include('layouts.include.header')
    <body class="o-page ">
        
        @include('layouts.include.breadcrumb')
        @include('layouts.include.message')
        @include('layouts.include.left-sidebar')
        
    <main class="o-page__content">
        @yield('content')
    </main>
    @include('layouts.include.footer')
</body>

</html>
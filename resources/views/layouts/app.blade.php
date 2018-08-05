<!doctype html>
<html lang="en-us">

    @include('layouts.include.header')
    <body class="o-page ">
        @php
        $session = Session::all();
        @endphp
        @include('layouts.include.breadcrumb')
        @include('layouts.include.message')
        
        @if($session['logindata'][0]['type'] == 2)
            @include('layouts.include.leftpanel.admin-left-sidebar')
        @elseif($session['logindata'][0]['type'] == 1)
            @include('layouts.include.leftpanel.custome-left-sidebar')
        @elseif($session['logindata'][0]['type'] == 0)
            @include('layouts.include.leftpanel.user-left-sidebar')
        @else
        
        @endif
        
    <main class="o-page__content">
        @yield('content')
    </main>
    @include('layouts.include.footer')
</body>

</html>
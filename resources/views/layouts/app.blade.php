<!doctype html>
<html lang="en-us">

    @include('layouts.include.header')
    <body class="o-page ">
        @php
        $session = Session::all();
        @endphp
        <input type="hidden" id="loginusertype" value="{{ $session['logindata'][0]['type'] }}">
        
        @include('layouts.include.breadcrumb')
        @include('layouts.include.message')
        
        @if($session['logindata'][0]['type'] == 'ADMIN')
            @include('layouts.include.leftpanel.admin-left-sidebar')
        @elseif($session['logindata'][0]['type'] == 'CUSTOMER')
            @include('layouts.include.leftpanel.custome-left-sidebar')
        @elseif($session['logindata'][0]['type'] == 'USER')
            @include('layouts.include.leftpanel.user-left-sidebar')
        @elseif($session['logindata'][0]['type'] == 'AGENT')
            @include('layouts.include.leftpanel.agent-left-sidebar')
        @else
        
        @endif
        
    <main class="o-page__content">
        @yield('content')
    </main>
    @include('layouts.include.footer')
</body>

</html>
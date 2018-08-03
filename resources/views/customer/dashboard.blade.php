@extends('layouts.app')

@section('content')
<div class="container">
<h1>
    Welcome to Customer Dashboard
</h1>
    
<h4>Name : {{ $detail->name }}</h4>
<h4>Email : {{ $detail->email }}</h4>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <a href="{{ route('logout') }}"><button>Logout</button></a>
</div>
@endsection
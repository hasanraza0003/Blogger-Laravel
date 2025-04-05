@extends('layout.app')

@section('content')

@include('components.navbar')
<div class="w-full h-full">
        @yield('indexpage')
</div>
@include('components.footer')
        
@endsection
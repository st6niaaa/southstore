@extends('components.layouts.wbase')

@section('body')
    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
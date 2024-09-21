@extends('components.layouts.admview')

@section('body')
    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
@extends('layouts.base')

@section('content')
    @if (session()->has('message'))
        <div id="message" class="">
            <p>{{ session('message') }}</p>
        </div>
    @endif
    @include('partials.slider')
@endsection

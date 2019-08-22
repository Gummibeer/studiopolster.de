@extends('master')

@section('content')
    <img class="lazyload img-fluid min-w-100" data-src="{{ versioned_asset('img/content/home.svg') }}" />
    @foreach($content as $element)
        @element($element['type'], $element['data'])
    @endforeach
@endsection

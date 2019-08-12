@extends('master')

@section('content')
    @foreach($content as $element)
        @element($element['type'], $element['data'])
    @endforeach
@endsection

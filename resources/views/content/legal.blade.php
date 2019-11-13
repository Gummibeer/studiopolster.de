@extends('master')

@section('title', sprintf('%s | %s', \Illuminate\Support\Str::title($slug), config('app.name')))

@section('content')
    <section>
        <div class="container px-4">
            <div class="text-wrapper">
                {!! $contents !!}
            </div>
        </div>
    </section>
@endsection

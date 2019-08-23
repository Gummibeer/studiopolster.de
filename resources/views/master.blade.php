<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@if(app('request')->path() != '/') @if(isset($title)) {{ $title }} @else {{ title_case(str_replace('/', ' ', app('request')->path())) }} @endif | @endif Studio Polster</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ versioned_asset('img/favicon.ico') }}">

    <link rel="stylesheet" href="https://use.typekit.net/sdo1rnk.css">
    <link rel="stylesheet" href="{{ versioned_asset('css/app.min.css') }}">
</head>
<body id="{{ \Illuminate\Support\Str::slug($pageName, '-') }}">

<div id="wrapper">
    @include('partials.header')

    <article id="content">
        @yield('content')
    </article>

    @include('partials.footer')
</div>

<script src="{{ versioned_asset('js/jquery.min.js') }}"></script>
<script src="{{ versioned_asset('js/bootstrap.min.js') }}"></script>
<script src="{{ versioned_asset('js/lazysizes.min.js') }}"></script>
<script src="{{ versioned_asset('js/ls.unveilhooks.min.js') }}"></script>
<script src="{{ versioned_asset('js/jquery.smooth-scroll.min.js') }}"></script>
<script src="{{ versioned_asset('js/app.js') }}"></script>

</body>
</html>

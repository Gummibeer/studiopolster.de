<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="Wir sind ein kleines leistungsstarkes Designstudio in Aumühle, Hamburg. Wir bieten: Grafikdesign, Corporate Design, Editorial Design, Webdesign, Illustration, Infografik, Fotografie, Naming, Logo-Entwicklung, Kommunikation im Raum und digitale Markenentwicklung." />

    <link rel="stylesheet" href="https://use.typekit.net/sdo1rnk.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />

    <link rel="sitemap" type="application/xml" href="{{ url('sitemap.xml') }}" title="Sitemap" />

    <link rel="shortcut icon" type="image/x-icon" href="{{ mix('favicon.ico') }}" />
</head>
<body id="body-{{ $slug }}">

<div id="wrapper">
    @include('partials.header')

    <div id="content">
        @yield('content')
    </div>

    @include('partials.footer')
</div>

<script async defer src="{{ mix('js/app.js') }}" type="application/javascript"></script>
</body>
</html>

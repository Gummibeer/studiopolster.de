@extends('master')

@section('content')
    <img class="lazyload img-fluid min-w-100" data-src="{{ mix('images/home.svg') }}" />

    <section class="bg-white" id="about-us">
        <div class="container px-4">
            <div class="text-wrapper">
                {!! $contents !!}
            </div>
        </div>
    </section>

    <section id="work">
        <div class="container px-4">
            <div class="row works">
                @foreach($works as $work)
                    <div class="col-12 col-md-6 work-item">
                        <div class="embed-responsive embed-responsive-1by1">
                            <div class="embed-responsive-item lazyload img-bg-center" data-bg="{{ mix($work['image']) }}">
                                <div class="overlay">
                                    <strong class="headline">{{ $work['headline'] }}</strong>
                                    <p class="description">{!! nl2br($work['description']) !!}</p>
                                    <a href="{{ mix($work['pdf']) }}" target="_blank" class="download position-relative" download>
                                        <i class="icon-pdf"></i>
                                        Arbeitsprobe
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white" id="contact">
        <div class="container px-4">
            <div class="text-wrapper">
                <h2>Kontakt</h2>
                <div class="row">
                    <div class="col">
                        Studio Polster
                        <br/>
                        Hans-Juergen Polster
                        <br/>
                        Oberförsterkoppel 10
                        <br/>
                        21521 Aumühle
                    </div>
                    <div class="col">
                        Telefon: 04104 9659733
                        <br/>
                        Mobil: 0171 7676861
                        <br/>
                        <br/>
                        E-Mail: <a href="mailto:mail@hansjuergenpolster.de">mail@hansjuergenpolster.de</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('master')

@section('content')
    <img
        class="img-fluid min-w-100"
        src="{{ mix('images/home.svg') }}"
        alt="Studio Polster Logo und Dienstleistungen (Naming, Logoentwicklung, Markenentwicklung, Digitale Marke, Corporate Design, Editorial Design, Web Design, Art Direction)"
    />

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
                            <div class="embed-responsive-item lazyload img-bg-center" data-bg="{{ asset(mix($work['image'])) }}">
                                <div class="overlay">
                                    <strong class="headline">{{ $work['headline'] }}</strong>
                                    <p class="description">{!! nl2br($work['description']) !!}</p>
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

@extends('master')

@section('title', sprintf('Fehler 404 | %s', config('app.name')))

@section('content')
    <section>
        <div class="container px-4">
            <div class="text-wrapper">
                <h2>Nicht gefunden</h2>
                <p class="mb-2">
                    Bitte vergewissere dich, dass der Link korrekt ist.<br/>
                    Du kannst es ansonsten in wenigen Minuten noch einmal versuchen.<br/>
                    Wenn das alles nichts hilft dann schreib uns doch einfach oder besuche uns direkt im Laden.
                </p>
                <a href="{{ url('/') }}" class="btn btn-primary mt-3">zur Startseite</a>
            </div>
        </div>
    </section>
@endsection

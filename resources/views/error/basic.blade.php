@extends('master')

@section('content')
    <section>
        <div class="text-wrapper">
            <h2>Fehler</h2>
            <p class="mb-2">
                Irgendwas stimmt hier nicht!<br/>
                Du kannst es ansonsten in wenigen Minuten noch einmal versuchen.<br/>
                Wenn das nichts hilft dann schreib uns doch einfach oder besuche uns direkt im Laden.
            </p>
            <a href="{{ url() }}" class="btn btn-primary mt-3">zur Startseite</a>
        </div>
    </section>
@endsection

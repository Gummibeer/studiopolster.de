<header id="header">
    <div class="container px-4">
        <nav class="navbar navbar-expand-md navbar-black" id="main-menu">
            <a class="navbar-brand" href="{{ url('/') }}">
                <h1>{{ config('app.name') }}</h1>
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-main-menu">
                <span class="navbar-toggler-icon"></span>
                <span class="sr-only">Menü</span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-main-menu">
                <ul class="navbar-nav ml-auto">
                    @if(request()->is('/'))
                        <li class="nav-item">
                            <a class="nav-link smooth" href="#about-us">Über uns</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link smooth" href="#work">Arbeiten</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link smooth" href="#contact">Kontakt</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Startseite</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>

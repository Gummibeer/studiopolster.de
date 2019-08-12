<header id="header">
    <div class="container px-4">
        <nav class="navbar navbar-expand-md navbar-black">
            <a class="navbar-brand" href="{{ url('/') }}">
                <h1>Studio Polster</h1>
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-main-menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-main-menu">
                <ul class="navbar-nav ml-auto">
                    @foreach(menu() as $entry)
                        <li class="nav-item @if($entry['active']) active @endif">
                            <a class="nav-link" href="{{ url($entry['link']) }}">{{ $entry['text'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</header>

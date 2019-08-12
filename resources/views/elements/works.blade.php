<section class="{{ $section_class }}">
    <div class="row works">
        @foreach($works as $work)
            <div class="col-12 col-md-6 work-item">
                <div class="embed-responsive embed-responsive-1by1">
                    <div class="embed-responsive-item lazyload img-bg-center" data-bg="{{ $work['image'] }}">
                        <div class="overlay">
                            <strong class="headline">{{ $work['headline'] }}</strong>
                            <p class="description">{!! nl2br($work['description']) !!}</p>
                            <a href="{{ $work['pdf'] }}" target="_blank" class="download" download>
                                <i class="far fa-file-pdf"></i>
                                Arbeitsprobe
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

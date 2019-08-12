<section class="{{ $section_class }}">
    <div class="row">
        <div class="col-md-6 @if($direction == 'rtl') order-md-last @endif">
            @isset($link)<a href="{{ $link }}">@endisset
            <div class="embed-responsive embed-responsive-21by9 h-100">
                <div class="embed-responsive-item lazyload img-bg-{{ $bg_position }}" data-bg="{{ $image }}"></div>
            </div>
            @isset($link)</a>@endisset
        </div>
        <div class="col-md-6">
            <div class="text-wrapper">
                <h2 class="mt-0 mb-3 text-{{ $headline_align }}">{{ $headline }}</h2>
                <p class="mx-auto @if(isset($link) && isset($button_text)) mb-4 @else mb-0 @endif">{!! nl2br($text) !!}</p>
                @if(isset($link) && isset($button_text))
                    <a href="{{ $link }}" class="btn btn-secondary btn-block m-0">{{ $button_text }}</a>
                @endisset
            </div>
        </div>
    </div>
</section>

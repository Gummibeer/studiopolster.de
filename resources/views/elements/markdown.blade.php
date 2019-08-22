<section class="{{ $section_class }}" @if(!empty($section_id)) id="{{ $section_id }}" @endif>
    <div class="container px-4">
        <div class="text-wrapper">
            {!! $markdown !!}
        </div>
    </div>
</section>

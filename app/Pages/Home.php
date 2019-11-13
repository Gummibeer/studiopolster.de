<?php

namespace App\Pages;

use Astrotomic\Stancy\Contracts\Routable;
use Astrotomic\Stancy\Models\PageData;
use Astrotomic\Stancy\Traits\PageHasContent;
use Astrotomic\Stancy\Traits\PageHasSlug;
use Astrotomic\Stancy\Traits\PageHasUrl;

class Home extends PageData implements Routable
{
    use PageHasContent, PageHasSlug, PageHasUrl;

    /** @var \Illuminate\Support\Collection */
    public $works;

    public function __construct(array $parameters = [])
    {
        if (isset($parameters['works']) && is_array($parameters['works'])) {
            $parameters['works'] = collect($parameters['works'])->sortBy('order')->values();
        }

        parent::__construct($parameters);
    }

    public function getUrl(): string
    {
        return url('/');
    }
}

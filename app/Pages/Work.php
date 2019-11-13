<?php

namespace App\Pages;

use Astrotomic\Stancy\Contracts\Routable;
use Astrotomic\Stancy\Models\PageData;
use Astrotomic\Stancy\Traits\PageHasContent;
use Astrotomic\Stancy\Traits\PageHasOrder;
use Astrotomic\Stancy\Traits\PageHasSlug;
use Astrotomic\Stancy\Traits\PageHasUrl;

class Work extends PageData implements Routable
{
    use PageHasSlug, PageHasOrder, PageHasUrl;

    /** @var string */
    public $image;

    /** @var string */
    public $headline;

    /** @var string */
    public $description;

    /** @var string */
    public $pdf;

    public function __construct(array $parameters = [])
    {
        if (isset($parameters['order']) && is_string($parameters['order'])) {
            $parameters['order'] = intval($parameters['order']);
        }

        parent::__construct($parameters);
    }

    public function getUrl(): string
    {
        return url(mix($this->pdf));
    }
}

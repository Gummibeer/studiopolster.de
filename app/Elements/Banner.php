<?php

namespace App\Elements;

class Banner extends Element
{
    protected $name = 'banner';

    protected $required = [
        'image',
    ];

    protected $types = [
        'image' => 'string',
    ];

    protected $normalizers = [
        'image' => 'asset',
    ];
}

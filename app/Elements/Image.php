<?php

namespace App\Elements;

class Image extends Element
{
    protected $name = 'image';

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

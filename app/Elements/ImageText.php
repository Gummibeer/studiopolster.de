<?php

namespace App\Elements;

class ImageText extends Element
{
    protected $name = 'image_text';

    protected $required = [
        'direction',
        'image',
        'bg_position',
        'headline_align',
        'headline',
        'text',
    ];

    protected $types = [
        'direction' => 'string',
        'image' => 'string',
        'bg_position' => 'string',
        'headline_align' => 'string',
        'headline' => 'string',
        'text' => 'string',
        'link' => 'string',
        'button_text' => 'string',
    ];

    protected $defaults = [
        'direction' => 'ltr',
        'bg_position' => 'center',
        'headline_align' => 'center',
    ];

    protected $values = [
        'direction' => ['ltr', 'rtl'],
        'bg_position' => ['top', 'center', 'bottom'],
        'headline_align' => ['left', 'center', 'right'],
    ];

    protected $normalizers = [
        'image' => 'asset',
        'link' => 'url',
    ];
}

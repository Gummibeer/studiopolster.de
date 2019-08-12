<?php

namespace App\Elements;

class Works extends Element
{
    protected $name = 'works';

    protected $required = [
        'works',
    ];

    protected $types = [
        'works' => 'array',
    ];

    protected $nested = [
        'works.*' => [
            'required' => [
                'image',
                'headline',
                'description',
                'pdf',
            ],
            'types' => [
                'image' => 'string',
                'headline' => 'string',
                'description' => 'string',
                'pdf' => 'string',
            ],
            'normalizers' => [
                'image' => 'asset',
                'pdf' => 'url',
            ],
        ],
    ];
}

<?php

namespace App\Elements;

class Markdown extends Element
{
    protected $name = 'markdown';

    protected $required = [
        'markdown',
    ];

    protected $types = [
        'markdown' => 'string',
    ];

    protected $normalizers = [
        'markdown' => 'file',
    ];
}

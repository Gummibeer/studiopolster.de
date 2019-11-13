<?php

use Spatie\Sheets\ContentParsers\JsonParser;
use Spatie\Sheets\PathParsers\SlugWithOrderParser;

return [
    'default_collection' => 'static',

    'collections' => [
        'static',
        'error',
        'work' => [
            'content_parser' => JsonParser::class,
            'path_parser' => SlugWithOrderParser::class,
            'extension' => 'json',
        ],
    ],
];

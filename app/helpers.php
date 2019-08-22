<?php

if(!function_exists('versioned_asset')) {
    function versioned_asset(string $path) {
        $url = url($path);
        if(str_contains($url, '?')) {
            return $url;
        }

        return $url.'?v='.env('APP_VERSION', time());
    }
}

if(!function_exists('load_data_json')) {
    function load_data_json(string $name) {
        $data = json_decode(file_get_contents(resource_path('data/'.$name.'.json')), true);

        switch(json_last_error()) {
            case JSON_ERROR_NONE:
                $error = null;
                break;
            case JSON_ERROR_DEPTH:
                $error = 'JSON_ERROR_DEPTH';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                $error = 'JSON_ERROR_STATE_MISMATCH';
                break;
            case JSON_ERROR_CTRL_CHAR:
                $error = 'JSON_ERROR_CTRL_CHAR';
                break;
            case JSON_ERROR_SYNTAX:
                $error = 'JSON_ERROR_SYNTAX';
                break;
            case JSON_ERROR_UTF8:
                $error = 'JSON_ERROR_UTF8';
                break;
            default:
                $error = 'JSON_UNKNOWN_ERROR';
                break;
        }

        if(!is_null($error)) {
            throw new JsonException('['.$error.'] '.json_last_error_msg());
        }

        return $data;
    }
}

if(!function_exists('pages')) {
    function pages() {
        return [
            'impressum' => [
                'data' => 'imprint',
            ],
            'datenschutz' => [
                'data' => 'privacy',
            ],
        ];
    }
}

if(!function_exists('request_is')) {
    function request_is($pattern) {
        $pattern = trim($pattern, '/');
        $pattern = $pattern ?: '/';
        return app('request')->is($pattern);
    }
}

if(!function_exists('menu')) {
    function menu(array $menu = []): array {
        if(empty($menu)) {
            $menu = load_data_json('menu');
        }

        return collect($menu)->map(function (array $entry) {
            $entry['active'] = false;

            if(isset($entry['link'])) {
                $entry['link'] = '/'.trim($entry['link'], '/');
                $entry['active'] = request_is($entry['link']);
            }

            if(isset($entry['childs'])) {
                $entry['childs'] = menu($entry['childs']);
                $entry['active'] = $entry['active'] ? true : collect($entry['childs'])->pluck('active')->contains(true);
            }

            return $entry;
        })->all();
    }
}

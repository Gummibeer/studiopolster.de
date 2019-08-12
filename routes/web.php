<?php

$router->get('/', function () {
    $data = [
        'pageName' => 'home',
    ];

    return view('home', $data);
});

foreach(pages() as $route => $page) {
    $router->get($route, function () use ($route, $page) {
        $data = [
            'pageName' => $page['data'],
        ];
        $data['content'] = load_data_json($page['data']);
        if(isset($page['title'])) {
            $data['title'] = $page['title'];
        }

        return view('page', $data);
    });
}

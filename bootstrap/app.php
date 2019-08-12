<?php

require_once __DIR__ . '/../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(__DIR__ . '/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    realpath(__DIR__ . '/../')
);

$app->withFacades();

// $app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

// $app->middleware([
//    App\Http\Middleware\ExampleMiddleware::class
// ]);

// $app->routeMiddleware([
//     'auth' => App\Http\Middleware\Authenticate::class,
// ]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

$app->register(\Curlyspoon\Cms\CurlyspoonServiceProvider::class);
$app->singleton(Parsedown::class, function (): Parsedown {
    return new Parsedown();
});

$app->make(\Curlyspoon\Cms\Contracts\NormalizerManager::class)
    ->register('sort', function (\Symfony\Component\OptionsResolver\Options $options, $value) {
        if (is_array($value)) {
            natsort($value);
        }

        return $value;
    })
    ->register('url', function (\Symfony\Component\OptionsResolver\Options $options, $value) {
        return url($value);
    })
    ->register('asset', function (\Symfony\Component\OptionsResolver\Options $options, $value) {
        return versioned_asset($value);
    })
    ->register('file', function (\Symfony\Component\OptionsResolver\Options $options, $value) {
        $files = array_wrap($value);

        foreach ($files as &$file) {
            if (!starts_with($file, 'file:')) {
                continue;
            }

            $path = resource_path('data/' . substr($file, 5));
            if (!file_exists($path)) {
                throw new \Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException($path);
            }
            $file = file_get_contents($path);

            if (ends_with($path, '.json')) {
                $file = json_decode($file, true);
            } elseif (ends_with($path, '.md')) {
                $file = app(Parsedown::class)->text($file);
            }
        }

        if (is_string($value)) {
            return array_first($files);
        }

        return $files;
    });

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__ . '/../routes/web.php';
});

return $app;

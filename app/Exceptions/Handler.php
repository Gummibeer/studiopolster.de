<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Psr\Log\LoggerInterface;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Whoops\Exception\Inspector;
use Whoops\Handler\CallbackHandler;
use Whoops\Handler\JsonResponseHandler;
use Whoops\Handler\PlainTextHandler;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run as Whoops;
use Whoops\RunInterface;
use Whoops\Util\Misc as WhoopsMisc;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        // do not log
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response|string
     */
    public function render($request, Exception $e)
    {
        $fe = FlattenException::create($e);
        $status = $fe->getStatusCode();
        $isDebug = env('APP_DEBUG', config('app.debug', false));

        if(WhoopsMisc::isAjaxRequest()) {
            $handler = tap(new JsonResponseHandler(), function(JsonResponseHandler $handler) use ($isDebug) {
                $handler->setJsonApi(true);
                $handler->addTraceToOutput($isDebug);
            });
        } elseif(WhoopsMisc::isCommandLine()) {
            $handler = tap(new PlainTextHandler(), function(PlainTextHandler $handler) {
                $handler->setLogger(app(LoggerInterface::class));
            });
        } elseif($isDebug) {
            $handler = tap(new PrettyPageHandler(), function (PrettyPageHandler $handler) {
                $handler->setApplicationRootPath(base_path());
                $handler->setApplicationPaths(array_except(
                    array_flip((new Filesystem())->directories(base_path())),
                    [
                        base_path('vendor'),
                        base_path('node_modules'),
                    ]
                ));
                $handler->setEditor('phpstorm');
            });
        } else {
            $handler = new CallbackHandler(function () use ($status) {
                $baseError = substr($status, 0, 1).'00';

                $data = [];
                $data['status'] = $status;

                if(view()->exists('error.'.$status)) {
                    $view = view('error.'.$status, $data);
                } elseif(view()->exists('error.'.$baseError)) {
                    $view = view('error.'.$baseError, $data);
                } else {
                    $view = view('error.basic', $data);
                }

                echo $view;

                return CallbackHandler::QUIT;
            });
        }

        return response(tap(new Whoops(), function(Whoops $whoops) use ($handler) {
            $whoops->pushHandler($handler);
            $whoops->writeToOutput(false);
            $whoops->allowQuit(false);
        })->handleException($e), $status);
    }
}

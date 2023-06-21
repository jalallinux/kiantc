<?php

namespace App\Exceptions;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $request->expectsJson()
            ? responseMessage(__('auth.unauthenticated'), 401)
            : redirect()->guest($exception->redirectTo() ?? RouteServiceProvider::HOME);
    }

    public function convertQueryExceptions($request, Throwable $e)
    {
        switch ($e->getCode()) {
            case "22P02":
                throw (new ModelNotFoundException())->setModel(@last(array_keys($request->route()->parameters)));
            default:
                break;
        }
    }

    public function render($request, Throwable $e)
    {
        if ($request->expectsJson()) {
            switch (get_class($e)) {
                case AuthorizationException::class:
                    return responseMessage(__('auth.unauthorization'), 403);
                case QueryException::class:
                    $this->convertQueryExceptions($request, $e);
                    break;
                case ModelNotFoundException::class:
                    return responseMessage(__('validation.exists', [
                        'attribute' => __('validation.attributes.' . modelLangAttribute($e->getModel()))
                    ]), 404);
                default :
                    parent::render($request, $e);
            }
        }
        return parent::render($request, $e);
    }
}

<?php

namespace App\Exceptions;

use App\Exceptions\Error as ExceptionsError;
use ErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Arr;
use Illuminate\Http\Response;
use Throwable;


class Handler extends ExceptionHandler
{
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof ModelNotFoundException) {
            $replacement = [
                'id' => collect($e->getIds())->first(),
                'model' => Arr::last(explode('\\', $e->getModel())),
            ];

            $error = new ExceptionsError(
                error: trans('exception.model_not_found.message', $replacement)
            );

            return response($error->toArray(), Response::HTTP_NOT_FOUND);
        } else if ($e instanceof ThrottleRequestsException) {

            $error = new ExceptionsError(
                error: trans('exception.throttle_exception.message')
            );

            return response($error->toArray(), Response::HTTP_TOO_MANY_REQUESTS);
        } else if ($e instanceof ErrorException) {

            $error = new ExceptionsError(
                error: trans('exception.error_exception.message')
            );

            return response($error->toArray(), Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $e);
    }

    /**
     * Register the exception handling callbacks for the application.
     *  
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            if (app()->bound('sentry')) {
                app('sentry')->captureException($e);
            }
        });
    }
}

<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Throwable $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        return $this->handleException($request, $exception);
    }

    public function handleException($request, Throwable $exception)
    {
        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->errorJson('The specified method for the request is invalid', 405);
        }

        if ($exception instanceof RouteNotFoundException || $exception instanceof NotFoundHttpException) {
            return response()->errorJson('The specified URL cannot be found', 404);
        }

        if ($exception instanceof HttpException) {
            return response()->errorJson($exception->getMessage(), $exception->getStatusCode());
        }

        if ($exception instanceof ValidationException) {

            $items = $exception->validator->errors()->getMessages();

            return response()->errorJson($exception->getMessage(), 422, $items);
        }

        if ($exception instanceof AuthenticationException) {
            return response()->errorJson($exception->getMessage(), 401);
        }

        if ($exception instanceof AuthorizationException) {
            return response()->errorJson($exception->getMessage(), 403);
        }

        return response()->errorJson($exception->getMessage() . ' in ' . $exception->getFile() . ":" . $exception->getLine(), 500);

    }
}

<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * @param  \Exception  $exception
     * @return void
     * @throws
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // This will replace our 404 response with a JSON response.
        if ($request->wantsJson()) {
            if ($exception instanceof ModelNotFoundException) {
                return response()->json(['error' => 'Resource not found: ModelNotFoundException'], 404);
            }
            if ($exception instanceof NotFoundHttpException) {
                return response()->json(['error' => 'Resource not found: NotFoundHttpException'], 404);
            }
            // This will replace our 401 response with a JSON response.
            if ($exception instanceof AuthorizationException) {
                return response()->json(['error' => 'Action not allowed: AuthorizationException'], 401);
            }
            // This will replace our 405 response with a JSON response.
            if ($exception instanceof MethodNotAllowedHttpException) {
                return response()->json(['error' => 'Method not allowed for this route: MethodNotAllowedException'], 405);
            }
        }
        return parent::render($request, $exception);
    }

    /**
     * Return json exeption on 'Unauthenticated' occurrence
     *
     * @param \Illuminate\Http\Request $request
     * @param AuthenticationException $exception
     * @return \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->wantsJson()) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
        return parent::unauthenticated($request, $exception);
    }
}

<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Throwable;

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

    public function render($request, Throwable $e)
    {
        if ($e instanceof ModelNotFoundException && $request->expectsJson()) {
            $modelName = class_basename($e->getModel());

            return response()->json([
                'status'  => Response::HTTP_NOT_FOUND,
                'message' => "$modelName not found",
            ], Response::HTTP_NOT_FOUND);
        }

        if ($e instanceof ValidationException && $request->expectsJson()) {
            $firstError = collect($e->errors())->first();

            return response()->json([
                'status'  => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $firstError[0],
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($e instanceof ValidationException && !$request->expectsJson()) {
            $firstError = collect($e->errors())->first();

            return redirect()->back()->withInput()->withErrors(['error' => $firstError[0]]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'status'  => Response::HTTP_BAD_REQUEST,
                'message' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }

        return parent::render($request, $e);
    }
}

<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function report(Throwable $exception){
        if($this->shouldntReport($exception)){
            //Log the exception
            Log::error($exception);
        }
        Parent::report($exception);
    }
    public function render($request, Throwable $exception){
        if($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException){
            return response()->view('errors.product_not_found',[],404);
            return response()->view('errors.user_not_found',[],404);

        }
        return Parent::render($request, $exception);
    }
 
}

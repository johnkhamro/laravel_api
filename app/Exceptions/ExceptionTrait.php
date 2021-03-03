<?php

namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait ExceptionTrait
{
    public function apiException($request, $e)
    {
        if($e instanceof ModelNotFoundException){
            return response()->json([
                'error' => 'Model Not Found'
            ], 404);
        }

            if($e instanceof NotFoundHttpException){
                return response()->json([
                    'errors' => 'Incorrect route'
                ], 404);
            }

                return parent::render($request, $e);
    }
}

<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
trait JsonResponseTrait
{
    public function success($message, $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
        ], $code);
    }
    public function fail($message, $code = 500): JsonResponse
    {
        return response()->json([
            'status' => 'fail',
            'message' => $message,
        ], $code);
    }
}


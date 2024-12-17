<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponses
{
    protected function success($message,$data, $statusCode = 200): JsonResponse
    {
        return response()->json([
           'message'=>$message,
           'data'=>$data,
           'status'=>$statusCode
        ],$statusCode);
    }
    protected function error($message, $statusCode): JsonResponse
    {
        return response()->json([
           'message'=>$message,
           'status'=>$statusCode
        ],$statusCode);
    }
}

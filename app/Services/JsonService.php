<?php


namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class JsonService
{
    public static function success(array $data, int $status = Response::HTTP_OK): JsonResponse
    {
        $data = [
            'status' => $status,
            'data' => $data
        ];

        return response()->json($data, $status);
    }
}

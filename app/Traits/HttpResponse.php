<?php

namespace App\Traits;

use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

trait HttpResponse
{
    public function response(
        string $message,
        string|int $status,
        array|Model|JsonResource|Collection $data = [],
        array $headers = []
    ): \Illuminate\Http\JsonResponse
    {
        $res = response()->json([
            'message' => $message,
            'status' => $status,
            'data' => $data
        ], $status);
        foreach ($headers as $key => $value) {
            $res->header($key, $value);
        }
        return $res;
    }

    public function error(
        string $message,
        string|int $status,
        array|MessageBag $errors = [],
        array $data = []
    ): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'message' => $message,
            'status' => $status,
            'errors' => $errors,
            'data' => $data
        ], $status);
    }
}

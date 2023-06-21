<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

if (! function_exists('to_valid_mobile_number')) {
    function to_valid_mobile_number(string $mobile, string $prefix = '+98'): string
    {
        return $prefix.substr($mobile, -10, 10);
    }
}

if (! function_exists('responseMessage')) {
    function responseMessage(string $message, int $status = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
        ], $status);
    }
}

if (! function_exists('modelLangAttribute')) {
    function modelLangAttribute(string $class, string $separator = '_'): string
    {
        return strtolower(Str::snake(last(explode('\\', $class)), $separator));
    }
}

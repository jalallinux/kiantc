<?php

use Illuminate\Http\JsonResponse;

if (! function_exists('to_valid_mobile_number')) {
    function to_valid_mobile_number(string $mobile, string $prefix = '+98'): string
    {
        return $prefix.substr($mobile, -10, 10);
    }
}

if (!function_exists('responseMessage')) {
    function responseMessage(string $message, int $status = 200): JsonResponse
    {
        return response()->json([
            'message' => $message
        ], $status);
    }
}

if (!function_exists('classToSlug')) {
    function classToSlug(string $class, string $separator = '_'): string
    {
        return strtolower(implode($separator, preg_split('/(?=[A-Z])/', class_basename($class), -1, PREG_SPLIT_NO_EMPTY)));
    }
}

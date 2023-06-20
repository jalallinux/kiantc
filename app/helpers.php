<?php

if (! function_exists('to_valid_mobile_number')) {
    function to_valid_mobile_number(string $mobile, string $prefix = '+98'): string
    {
        return $prefix.substr($mobile, -10, 10);
    }
}

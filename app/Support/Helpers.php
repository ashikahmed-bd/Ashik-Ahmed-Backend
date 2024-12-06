<?php

use Illuminate\Support\Facades\URL;

if (!function_exists('client_url')) {
    function client_url($value): string
    {
        return URL::format(config('app.client_url'), $value);
    }
}


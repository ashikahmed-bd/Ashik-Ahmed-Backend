<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

if (!function_exists('client_url')) {
    function client_url($value): string
    {
        return URL::format(config('app.client_url'), $value);
    }
}

if (!function_exists('asset_url')) {
    function asset_url($value): string
    {
        return Storage::disk(config('app.disk'))
            ->url($value === '' ? 'default.png' : $value);
    }
}


if (!function_exists('Limit')) {
    function Limit($value, $default = 60): string
    {
        return Str::limit($value, $default);
    }
}


if (!function_exists('DateFormat')) {
    function DateFormat($date): string
    {
        return Carbon::parse($date)->format('d M Y');
    }
}

if (! function_exists('generateLicenseKey')){
    function generateLicenseKey(): string
    {
        return strtoupper(Str::random('5').'-'.Str::random('5').'-'.Str::random('5').'-'.Str::random('5').'-'.Str::random('5'));
    }
}

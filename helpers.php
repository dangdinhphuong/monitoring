<?php

use App\Models\config;
use Illuminate\Support\Facades\Auth;

if (!function_exists('configHelper')) {
    function configByKeyHelper($key)
    {
        $config = config::where('key',$key)->first();
        return $config ?? [];
    }
}

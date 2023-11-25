<?php

use App\Models\Config;
use Illuminate\Support\Facades\Auth;

if (!function_exists('configHelper')) {
    function configByKeyHelper($key)
    {
        $config = Config::where('key',$key)->first();
        return $config ?? [];
    }
}

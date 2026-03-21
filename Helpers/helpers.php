<?php

if (! function_exists('mlbrgnAsset')) {
    function mlbrgnAsset(string $path): string
    {
        return asset("vendor/mlbrgn/laravel-form-components/$path");
    }
}

if (! function_exists('mlbrgn_csp_nonce')) {
    function mlbrgn_csp_nonce()
    {
        $resolver = config('form-components.csp_nonce');

        return is_callable($resolver)
            ? $resolver()
            : $resolver;
    }
}


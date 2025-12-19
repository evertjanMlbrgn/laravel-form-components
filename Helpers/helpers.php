<?php

//if (! function_exists('package_asset')) {
//    function package_asset($name): string
//    {
//        return route('package.assets', ['name' => $name]);
//    }
//}

if (! function_exists('mlbrgnAsset')) {
    function mlbrgnAsset(string $path): string
    {
        return asset("vendor/mlbrgn/laravel-form-components/$path");
    }
}


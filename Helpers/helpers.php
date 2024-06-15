<?php

if (!function_exists('package_asset')) {
    function package_asset($path) {
        return route('package.assets', ['path' => $path]);
    }
}

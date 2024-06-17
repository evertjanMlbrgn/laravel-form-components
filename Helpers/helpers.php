<?php

if (!function_exists('package_asset')) {
    function package_asset($name) {
        return route('package.assets', ['name' => $name]);
    }
}

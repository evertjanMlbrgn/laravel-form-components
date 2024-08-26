<?php

if (! function_exists('package_asset')) {
    function package_asset($name): string
    {
        return route('package.assets', ['name' => $name]);
    }
}

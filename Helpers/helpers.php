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

if (! function_exists('theme_class')) {
    /**
     * Resolve a theme-specific class or flag.
     *
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    function theme_class(string $key, $default = null): mixed
    {
        return \Mlbrgn\LaravelFormComponents\Theme\Theme::resolve($key, $default);
    }
}

if (! function_exists('theme_framework')) {
    /**
     * Get the active theme framework.
     *
     * @return string
     */
    function theme_framework(): string
    {
        return \Mlbrgn\LaravelFormComponents\Theme\Theme::framework();
    }
}

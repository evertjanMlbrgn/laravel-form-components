<?php

namespace Mlbrgn\LaravelFormComponents\Theme;

class Theme
{
    /**
     * Resolve a theme-specific class or flag.
     *
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    public static function resolve(string $key, $default = null): mixed
    {
        $framework = config('form-components.framework') ?: 'bootstrap-5';
        $theme = config("form-components.themes.{$framework}", []);

        return data_get($theme, $key, $default);
    }
}

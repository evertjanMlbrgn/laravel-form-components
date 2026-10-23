<?php

namespace Mlbrgn\LaravelFormComponents\Theme;

class Theme
{
    /**
     * Get the active framework.
     *
     * @return string
     */
    public static function framework(): string
    {
        return config('form-components.framework') ?: 'plain';
    }

    /**
     * Resolve a theme-specific class or flag.
     *
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    public static function resolve(string $key, $default = null): mixed
    {
        $framework = static::framework();
        $themes = config('form-components.themes', []);

        $activeTheme = data_get($themes, $framework, []);

        if (static::hasInTheme($activeTheme, $key)) {
            return data_get($activeTheme, $key);
        }

        if ($framework !== 'plain') {
            $plainTheme = data_get($themes, 'plain', []);
            if (static::hasInTheme($plainTheme, $key)) {
                return data_get($plainTheme, $key);
            }
        }

        return $default;
    }

    /**
     * Check if a theme has a specific key.
     *
     * @param string $key
     * @return bool
     */
    public static function has(string $key): bool
    {
        $framework = static::framework();
        $themes = config('form-components.themes', []);

        if (static::hasInTheme(data_get($themes, $framework, []), $key)) {
            return true;
        }

        if ($framework !== 'plain' && static::hasInTheme(data_get($themes, 'plain', []), $key)) {
            return true;
        }

        return false;
    }

    /**
     * Get all values for the active theme (including fallbacks).
     *
     * @return array
     */
    public static function all(): array
    {
        $framework = static::framework();
        $themes = config('form-components.themes', []);

        $plain = data_get($themes, 'plain', []);
        $active = data_get($themes, $framework, []);

        if ($framework === 'plain') {
            return $plain;
        }

        return array_replace_recursive($plain, $active);
    }

    /**
     * Internal helper to check if a key exists in a theme array (supporting dot notation).
     *
     * @param array $theme
     * @param string $key
     * @return bool
     */
    protected static function hasInTheme(array $theme, string $key): bool
    {
        $value = data_get($theme, $key, '__NOT_FOUND__');

        return $value !== '__NOT_FOUND__';
    }
}

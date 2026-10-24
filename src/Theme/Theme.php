<?php

namespace Mlbrgn\LaravelFormComponents\Theme;

class Theme
{
    /**
     * Get the active framework.
     */
    public static function framework(): string
    {
        return config('form-components.framework') ?: 'plain';
    }

    /**
     * Get the display name for a framework.
     */
    public static function frameworkName(?string $framework = null): string
    {
        $framework = $framework ?: static::framework();

        $names = [
            'bootstrap-5' => 'Bootstrap 5',
            'bootstrap-6' => 'Bootstrap 6',
            'tailwind' => 'Tailwind CSS',
            'daisyui' => 'DaisyUI',
            'plain' => 'Plain',
        ];

        return $names[$framework] ?? ucfirst($framework);
    }

    /**
     * Resolve a theme-specific class or flag.
     *
     * @param  mixed|null  $default
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
     * Check if the active theme supports a specific feature.
     */
    public static function supports(string $feature): bool
    {
        // Default to true unless explicitly disabled in the theme or its fallback
        return (bool) static::resolve("supports.$feature", true);
    }

    /**
     * Internal helper to check if a key exists in a theme array (supporting dot notation).
     */
    protected static function hasInTheme(array $theme, string $key): bool
    {
        $value = data_get($theme, $key, '__NOT_FOUND__');

        return $value !== '__NOT_FOUND__';
    }
}

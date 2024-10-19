<?php

namespace Mlbrgn\LaravelFormComponents\Traits;

use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Support\ViewErrorBag;

trait HandlesValidationErrors
{
    public bool $showErrors = true;

    /**
     * Returns a boolean whether the given attribute has an error
     * and should be shown.
     */
    public function shouldShowError(string $name, string $bag = 'default'): bool
    {
        return $this->showErrors && $this->hasError($name, $bag);
    }

    /**
     * Getter for the ErrorBag.
     */
    protected function getErrorBag(string $bag = 'default'): ?MessageBag
    {
        if (request()->hasSession()) {
            $bags = View::shared('errors', fn() => request()->session()->get('errors', new ViewErrorBag));

            return $bags->getBag($bag);
        }
        return null;
    }

    /**
     * Returns a boolean whether the given attribute has an error.
     */
    public function hasError(string $name, string $bag = 'default'): bool
    {
        $name = str_replace(['[', ']'], ['.', ''], Str::before($name, '[]'));
        $errorBag = $this->getErrorBag($bag);

        if ($errorBag) {
            return $errorBag->has($name) || $errorBag->has($name.'.*');
        }
        return false;
    }
}

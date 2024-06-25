<?php

namespace Mlbrgn\LaravelFormComponents\Traits;

use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Support\ViewErrorBag;

trait HandlesValidationErrors
{
    public $showErrors = true;

    /**
     * Returns a boolean whether the given attribute has an error
     * and the should be shown.
     */
    public function shouldShowError(string $name, string $bag = 'default'): bool
    {
//        if ($name === 'radio-inline') {
//            echo 'inside shouldShowError: ' . $name . '<br>'; // . ' should show errors: ' . $this->showErrors && $this->hasError($name, $bag);
//        }
        return $this->showErrors && $this->hasError($name, $bag);
    }

    /**
     * Getter for the ErrorBag.
     */
    protected function getErrorBag(string $bag = 'default'): MessageBag
    {
        $bags = View::shared('errors', fn () => request()->session()->get('errors', new ViewErrorBag()));

        return $bags->getBag($bag);
    }

    /**
     * Returns a boolean whether the given attribute has an error.
     */
    public function hasError(string $name, string $bag = 'default'): bool
    {
        $name = str_replace(['[', ']'], ['.', ''], Str::before($name, '[]'));

//        if ($name === 'radio-inline') {
//            echo 'hasError name: '.$name . '<br>';
//        }
        $errorBag = $this->getErrorBag($bag);

//        if ($name === 'radio-inline') {
//            echo 'hasError errorBag.has: '.$errorBag->has($name) . '<br>';
//        }

//        if ($name === 'radio-inline') {
//            echo 'errorbag messages: ';
//            dump($errorBag->getMessages());
//        }

        return $errorBag->has($name) || $errorBag->has($name.'.*');
    }
}

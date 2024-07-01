<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;
use Mlbrgn\LaravelFormComponents\View\FormBaseComponent;

class Form extends FormBaseComponent
{
    /**
     * Request method.
     */
    public string $method;

    /**
     * Form method spoofing to support PUT, PATCH and DELETE actions.
     * https://laravel.com/docs/master/routing#form-method-spoofing
     */
    public bool $spoofMethod = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $method = 'POST',
        public bool $usesCustomValidation = false,
        public bool $usesValidation = false,
        public string $validationMode = 'default'
    ) {
        $this->method = strtoupper($method);
        $this->spoofMethod = in_array($this->method, ['PUT', 'PATCH', 'DELETE']);
    }

    /**
     * Returns a boolean whether the error bag is not empty.
     *
     * @param  string  $bag
     */
    public function hasError($bag = 'default'): bool
    {
        $errors = View::shared('errors', fn () => request()->session()->get('errors', new ViewErrorBag()));

        return $errors->getBag($bag)->isNotEmpty();
    }
}

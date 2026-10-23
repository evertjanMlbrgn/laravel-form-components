<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;
use Mlbrgn\LaravelFormComponents\Helpers\FormDataBinder;
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

    public string $validationMode = 'client-default';

    public $bind;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $method = 'POST',
        ?string $validationMode = null,
        $bind = null
    ) {
        $this->method = strtoupper($method);
        $this->spoofMethod = in_array($this->method, ['PUT', 'PATCH', 'DELETE']);
        $this->validationMode = ! is_null($validationMode) ? $validationMode : config('form-components.default-form-validation-mode');
        $this->bind = $bind;

        if ($bind) {
            app(FormDataBinder::class)->bind($bind);
        }
    }

    /**
     * Returns a boolean whether the error bag is not empty.
     */
    public function hasError(string $bag = 'default'): bool
    {
        if (request()->hasSession()) {
            $errors = View::shared('errors', fn () => request()->session()->get('errors', new ViewErrorBag));

            return $errors->getBag($bag)->isNotEmpty();
        }

        return false;
    }

    public function assetConfig(): array
    {
        $assets = [];
        if ($this->validationMode === 'client-default' || $this->validationMode === 'client-custom') {
            $assets['validation'] = true;
        }

        return [
            'assets' => $assets,
        ];
    }
}

<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class FormInline extends Component
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
     */
    public function __construct(
        public string $action,
        public string $tooltip,
        string $method = 'POST',
        public string $label = ''
    ) {
        $this->method = strtoupper($method);
        $this->spoofMethod = in_array($this->method, ['PUT', 'PATCH', 'DELETE']);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $buttonType = Str::lower($this->method) === 'delete' ? 'danger' : 'primary';

        return view(config('form-components.view_namespace').'::'.Str::kebab(class_basename($this)), [
            'buttonType' => $buttonType,
        ]);
        //        return view('components.form.form-inline', [
        //            'buttonType' => $buttonType,
        //        ]);
    }
}

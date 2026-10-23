<?php

namespace Mlbrgn\LaravelFormComponents\View\Components\Layout;

use Mlbrgn\LaravelFormComponents\View\FormBaseComponent;

class FormInputWrapper extends FormBaseComponent
{
    public function __construct(
        public $horizontal = false,
    ) {
        $this->horizontal = filter_var($horizontal, FILTER_VALIDATE_BOOLEAN);
    }

    protected function viewName(): string
    {
        return 'layout.form-input-wrapper';
    }
}

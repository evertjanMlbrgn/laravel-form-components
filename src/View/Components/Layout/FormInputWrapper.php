<?php

namespace Mlbrgn\LaravelFormComponents\View\Components\Layout;

use Illuminate\View\Component;

class FormInputWrapper extends Component
{
    public function __construct(
        public $horizontal = false,
    ) {
        $this->horizontal = filter_var($horizontal, FILTER_VALIDATE_BOOLEAN);
    }

    public function render()
    {
        return view('form::components.layout.form-input-wrapper');
    }
}

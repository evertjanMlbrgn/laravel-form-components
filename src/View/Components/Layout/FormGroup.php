<?php

namespace Mlbrgn\LaravelFormComponents\View\Components\Layout;

use Illuminate\View\Component;
use Mlbrgn\LaravelFormComponents\Traits\HandlesValidationErrors;

class FormGroup extends Component
{
    use HandlesValidationErrors;

    public function __construct(
        public string $name = '',
        public $horizontal = false,
        public $floating = false,
        $showErrors = true,
    ) {
        $this->horizontal = filter_var($horizontal, FILTER_VALIDATE_BOOLEAN);
        $this->floating = filter_var($floating, FILTER_VALIDATE_BOOLEAN);
        $this->showErrors = filter_var($showErrors, FILTER_VALIDATE_BOOLEAN);
    }

    public function render()
    {
        return view('form::components.layout.form-group');
    }
}

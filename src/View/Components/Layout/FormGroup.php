<?php

namespace Mlbrgn\LaravelFormComponents\View\Components\Layout;

use Mlbrgn\LaravelFormComponents\Traits\HandlesValidationErrors;
use Mlbrgn\LaravelFormComponents\View\FormBaseComponent;

class FormGroup extends FormBaseComponent
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

    protected function viewName(): string
    {
        return 'layout.form-group';
    }
}

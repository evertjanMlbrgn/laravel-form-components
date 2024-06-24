<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Mlbrgn\LaravelFormComponents\Traits\HandlesValidationErrors;
use Mlbrgn\LaravelFormComponents\View\FormBaseComponent;

class InputGroup extends FormBaseComponent
{
    use HandlesValidationErrors;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $name = '',
        public string $label = '',
        bool $showErrors = true,
        public string $helpText = '',
        public bool $hidden = false
    )
    {
        $this->showErrors = $name && $showErrors;
    }
}

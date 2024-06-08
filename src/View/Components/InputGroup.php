<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Mlbrgn\LaravelFormComponents\Traits\HandlesValidationErrors;

class InputGroup extends FormBaseComponent
{
    use HandlesValidationErrors;

    public string $name;
    public string $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name = '', string $label = '', bool $showErrors = true)
    {
        $this->name       = $name;
        $this->label      = $label;
        $this->showErrors = $name && $showErrors;
    }
}

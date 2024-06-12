<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Mlbrgn\LaravelFormComponents\Traits\HandlesValidationErrors;
use Mlbrgn\LaravelFormComponents\View\FormBaseComponent;

class Group extends FormBaseComponent
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
        public bool $inline = false,
        bool $showErrors = true)
    {
        $this->showErrors = $name && $showErrors;
    }
}

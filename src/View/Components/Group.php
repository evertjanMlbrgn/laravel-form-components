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
        public string $validFeedback = '',
        public string $invalidFeedback = '',
        public bool $tooltipFeedback = false,
        bool $showErrors = true,
        public string $helpText = ''
    )
    {
        $this->showErrors = $name && $showErrors;
    }
}

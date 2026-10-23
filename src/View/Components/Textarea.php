<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Mlbrgn\LaravelFormComponents\Traits\HandlesDefaultAndOldValue;
use Mlbrgn\LaravelFormComponents\Traits\HandlesValidationErrors;
use Mlbrgn\LaravelFormComponents\View\FormBaseComponent;

class Textarea extends FormBaseComponent
{
    use HandlesDefaultAndOldValue;
    use HandlesValidationErrors;

    public $value;

    public function __construct(
        public string $name = '',
        $bind = null,
        $default = null,
        $language = null,
        $value = null,
        public string $label = '',
        public string $type = 'text',
        $showErrors = true,
        public $horizontal = false,
        public $floating = false,
        public $hidden = false,
        public string $validFeedback = '',
        public string $invalidFeedback = '',
        public $tooltipFeedback = false,
        public string $helpText = '',
    ) {

        $this->showErrors = filter_var($showErrors, FILTER_VALIDATE_BOOLEAN);
        $this->horizontal = filter_var($horizontal, FILTER_VALIDATE_BOOLEAN);
        $this->floating = filter_var($floating, FILTER_VALIDATE_BOOLEAN);
        $this->hidden = filter_var($hidden, FILTER_VALIDATE_BOOLEAN);
        $this->tooltipFeedback = filter_var($tooltipFeedback, FILTER_VALIDATE_BOOLEAN);

        if ($language) {
            $this->name = "{$name}[$language]";
        }

        $this->setValue($value, $name, $bind, $default, $language);

    }
}

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
        public string $label = '',
        public string $type = 'text',
        bool $showErrors = true,
        public bool $horizontal = false,
        public bool $floating = false,
//        public bool $required = false,
        public bool $hidden = false,
        public string $validFeedback = '',
        public string $invalidFeedback = '',
        public bool $tooltipFeedback = false,
        public string $helpText = ''
    ) {

        $this->showErrors = $showErrors;

        if ($language) {
            $this->name = "{$name}[{$language}]";
        }

        $this->setValue($name, $bind, $default, $language);
    }
}

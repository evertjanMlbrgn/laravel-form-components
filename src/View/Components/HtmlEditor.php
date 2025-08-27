<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Mlbrgn\LaravelFormComponents\Traits\HandlesDefaultAndOldValue;
use Mlbrgn\LaravelFormComponents\Traits\HandlesValidationErrors;
use Mlbrgn\LaravelFormComponents\View\FormBaseComponent;

class HtmlEditor extends FormBaseComponent
{
    use HandlesDefaultAndOldValue;
    use HandlesValidationErrors;

    public $value;
    public string $tinymceConfigJson = '{}';

    public function __construct(
        public string $name = '',
        $bind = null,
        $default = null,
        $language = null,
        $value = null,
        public string $label = '',
        public string $type = 'text',
        bool $showErrors = true,
        public bool $horizontal = false,
        public bool $floating = false,
        public bool $hidden = false,
        public string $validFeedback = '',
        public string $invalidFeedback = '',
        public bool $tooltipFeedback = false,
        public string $helpText = '',
        public array $extraFormData = [],
        $tinymceConfig = [] // Accept array or JSON string
    ) {

        $this->showErrors = $showErrors;

        if ($language) {
            $this->name = "{$name}[$language]";
        }

        $this->setValue($value, $name, $bind, $default, $language);

        // Handle TinyMCE config
        if (is_string($tinymceConfig)) {
            $decoded = json_decode($tinymceConfig, true);
            $tinymceConfig = $decoded ?? [];
        }

//        $this->tinymceConfigJson = e(json_encode($tinymceConfig));
        $this->tinymceConfigJson = json_encode($tinymceConfig);

    }
}

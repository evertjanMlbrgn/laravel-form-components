<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Mlbrgn\LaravelFormComponents\Traits\HandlesBoundValues;
use Mlbrgn\LaravelFormComponents\Traits\HandlesValidationErrors;
use Mlbrgn\LaravelFormComponents\View\FormBaseComponent;

class Radio extends FormBaseComponent
{
    use HandlesBoundValues;
    use HandlesValidationErrors;

    public bool $checked = false;

    public string $type = 'radio';

    public function __construct(
        public string $name = '',
        public string $label = '',
        public mixed $value = 1,
        $bind = null,
        $default = false,
        $showErrors = true,
        public $toggle = false,
        public $hidden = false,
        public string $validFeedback = '',
        public string $invalidFeedback = '',
        public $tooltipFeedback = false,
        public string $helpText = ''
    ) {
        $this->showErrors = filter_var($showErrors, FILTER_VALIDATE_BOOLEAN);
        $this->toggle = filter_var($toggle, FILTER_VALIDATE_BOOLEAN);
        $this->hidden = filter_var($hidden, FILTER_VALIDATE_BOOLEAN);
        $this->tooltipFeedback = filter_var($tooltipFeedback, FILTER_VALIDATE_BOOLEAN);
        $default = filter_var($default, FILTER_VALIDATE_BOOLEAN);

        $inputName = static::convertBracketsToDots($name);

        if (old($inputName) !== null) {
            $this->checked = old($inputName) == $value;
        }

        if (! session()->hasOldInput()) {
            $boundValue = $this->getBoundValue($bind, $inputName);

            if (! is_null($boundValue)) {
                $this->checked = $boundValue == $this->value;
            } else {
                $this->checked = $default;
            }
        }
    }

    /**
     * Override
     */
    protected function generateIdByName(): string
    {
        return 'auto_id_'.$this->name.'_'.md5((string) $this->value);
    }
}

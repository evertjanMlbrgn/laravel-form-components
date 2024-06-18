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
    public $type = 'radio';

    public function __construct(
        public string $name = '',
        public string $label = '',
        public mixed $value = 1,
        $bind = null,
        bool $default = false,
        bool $showErrors = true,
        public bool $toggle = false,
        public string $classButton = 'btn-primary',
        public bool $hidden = false,
        public string $classLabel = '',
        public string $validFeedback = '',
        public string $invalidFeedback = '',
        public bool $tooltipFeedback = false

    ) {
        $this->showErrors = $showErrors;

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
        return 'auto_id_'.$this->name.'_'.$this->value;
    }
}

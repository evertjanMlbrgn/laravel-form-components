<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Mlbrgn\LaravelFormComponents\Traits\HandlesBoundValues;
use Mlbrgn\LaravelFormComponents\Traits\HandlesValidationErrors;
use Mlbrgn\LaravelFormComponents\View\FormBaseComponent;

class Checkbox extends FormBaseComponent
{
    use HandlesBoundValues;
    use HandlesValidationErrors;

    public $value;

    public $type = 'checkbox';
    public bool $checked = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $name = '',
        $value = 1,
        $bind = null,
        bool $default = false,
        bool $showErrors = true,
        public string $label = '',
        public bool $toggle = false,
        public string $classButton = 'btn-primary',
        public string $classLabel = '',
        public string $validFeedback = '',
        public string $invalidFeedback = '',
        public bool $tooltipFeedback = false
    ) {
        $this->value = $value;
        $this->showErrors = $showErrors;

        $inputName = static::convertBracketsToDots(Str::before($name, '[]'));

        if ($oldData = old($inputName)) {
            $this->checked = in_array($value, Arr::wrap($oldData));
        }

        if (! session()->hasOldInput()) {
            $boundValue = $this->getBoundValue($bind, $inputName);

            if ($boundValue instanceof Arrayable) {
                $boundValue = $boundValue->toArray();
            }

            if (is_array($boundValue)) {
                $this->checked = in_array($value, $boundValue);

                return;
            }

            $this->checked = is_null($boundValue) ? $default : $boundValue;
        }
    }

    /**
     * override
     */
    protected function generateIdByName(): string
    {
        return 'auto_id_'.$this->name.'_'.$this->value;
    }
}

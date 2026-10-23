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

    //    public string $value;

    public string $type = 'checkbox';

    public bool $checked = false;

    //    protected $casts = [
    //        'defaultToZero' => 'boolean',
    // //        'hidden' => 'boolean',
    // //        'default' => 'boolean',
    // //        'show_errors' => 'boolean',
    // //        'toggle' => 'boolean',
    // //        'tooltipFeedback' => 'boolean',
    //    ];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $name = '',
        public ?string $value = null,
        $bind = null,
        $default = false,
        $showErrors = true,
        public string $label = '',
        public $toggle = false,
        public string $validFeedback = '',
        public string $invalidFeedback = '',
        public $hidden = false,
        public $tooltipFeedback = false,
        public string $helpText = '',
        public $defaultToZero = false,
    ) {

        $this->value = $value ?? '1'; // value in checkbox is deterministic must have value!

        $this->showErrors = filter_var($showErrors, FILTER_VALIDATE_BOOLEAN);
        $this->toggle = filter_var($toggle, FILTER_VALIDATE_BOOLEAN);
        $this->hidden = filter_var($hidden, FILTER_VALIDATE_BOOLEAN);
        $this->tooltipFeedback = filter_var($tooltipFeedback, FILTER_VALIDATE_BOOLEAN);
        $this->defaultToZero = filter_var($defaultToZero, FILTER_VALIDATE_BOOLEAN)
            ?? config('form-components.checkbox.default_to_zero', false);

        $default = filter_var($default, FILTER_VALIDATE_BOOLEAN);

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
        return 'auto_id_'.$this->name.'_'.md5((string) $this->value);
    }
}

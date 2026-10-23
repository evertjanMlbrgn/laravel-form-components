<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Mlbrgn\LaravelFormComponents\Traits\HandlesBoundValues;
use Mlbrgn\LaravelFormComponents\Traits\HandlesValidationErrors;
use Mlbrgn\LaravelFormComponents\View\FormBaseComponent;

class Select extends FormBaseComponent
{
    use HandlesBoundValues;
    use HandlesValidationErrors;

    public mixed $selectedKey;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $name = '',
        public string $label = '',
        public mixed $options = [],
        $bind = null,
        $default = null,
        public $multiple = false,
        $showErrors = true,
        $manyRelation = false,
        public $floating = false,
        public string $placeholder = '',
        public string $placeholderValue = '',
        public $horizontal = false,
        public $hidden = false,
        public string $validFeedback = '',
        public string $invalidFeedback = '',
        public $tooltipFeedback = false,
        public string $helpText = ''
    ) {
        $this->multiple = filter_var($multiple, FILTER_VALIDATE_BOOLEAN);
        $this->showErrors = filter_var($showErrors, FILTER_VALIDATE_BOOLEAN);
        $this->manyRelation = filter_var($manyRelation, FILTER_VALIDATE_BOOLEAN);
        $this->floating = filter_var($floating, FILTER_VALIDATE_BOOLEAN) && ! $this->multiple;
        $this->horizontal = filter_var($horizontal, FILTER_VALIDATE_BOOLEAN);
        $this->hidden = filter_var($hidden, FILTER_VALIDATE_BOOLEAN);
        $this->tooltipFeedback = filter_var($tooltipFeedback, FILTER_VALIDATE_BOOLEAN);

        $inputName = static::convertBracketsToDots(Str::before($name, '[]'));

        if (is_null($default)) {
            $default = $this->getBoundValue($bind, $inputName);
        }

        $this->selectedKey = old($inputName, $default);

        if ($this->selectedKey instanceof Arrayable) {
            $this->selectedKey = $this->selectedKey->toArray();
        }

        $this->showErrors = $showErrors;
        $this->floating = $floating && ! $multiple;
    }

    public function isSelected($key): bool
    {
        return in_array($key, Arr::wrap($this->selectedKey));
    }

    public function nothingSelected(): bool
    {
        return is_array($this->selectedKey) ? empty($this->selectedKey) : is_null($this->selectedKey);
    }
}

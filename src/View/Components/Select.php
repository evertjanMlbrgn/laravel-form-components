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

    public $selectedKey;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $name = '',
        public string $label = '',
        public array $options = [],
        $bind = null,
        $default = null,
        public bool $multiple = false,
        bool $showErrors = true,
        bool $manyRelation = false,
        public bool $floating = false,
        public string $placeholder = '',
        public bool $horizontal = false,
        public string $classLabel = '',
        public string $classControl = '',
        public string $validFeedback = '',
        public string $invalidFeedback = '',
        public bool $tooltipFeedback = false
    ) {
        $this->manyRelation = $manyRelation;

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

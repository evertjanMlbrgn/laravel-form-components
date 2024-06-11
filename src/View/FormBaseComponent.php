<?php

namespace Mlbrgn\LaravelFormComponents\View;

use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class FormBaseComponent extends Component
{

    public $showErrors = true;

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        return view(config('form-components.view_namespace').'::' . Str::kebab(class_basename($this)));
    }

    /**
     * Generates an ID, once, for this component.
     */
    public function getId(): string
    {
        if ($this->attributes->has('id') && !empty($this->attributes->get('id'))) {
            return $this->id = $this->attributes->get('id');
        }
        if ($this->name) {
            return $this->id = $this->generateIdByName();
        }
        return $this->id = Str::random(4);
    }

    /**
     * Generates an ID by the name attribute.
     */
    protected function generateIdByName(): string
    {
        return 'auto_id_'.$this->name;
    }

    /**
     * Converts a bracket-notation to a dotted-notation
     *
     * @param  string  $name
     */
    protected static function convertBracketsToDots($name): string
    {
        return str_replace(['[', ']'], ['.', ''], $name);
    }
}

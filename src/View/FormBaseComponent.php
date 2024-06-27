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
        return function (array $data) {
            $id = $this->determineId($data['attributes']->get('id'), $data['name'] ?? '');
            return view(config('form-components.view_namespace').'::'.Str::kebab(class_basename($this)), ['id' => $id]);
        };
    }

    /**
     * Generates an ID, once, for this component.
     */
    public function getId(): string
    {
        if ($this->attributes->has('id') && ! empty($this->attributes->get('id'))) {
            return $this->id = $this->attributes->get('id');
        }
        if ($this->name) {
            return $this->id = $this->generateIdByName();
        }

        return $this->id = 'rand_id_' . Str::random(4);
    }

    public function determineId($id, $name): string
    {
        if (!empty($id)) {
            return $this->attributes->get('id');
        }
        if (!empty($name)) {
            return 'auto_id_'.$name;
        }

        return 'rand_id_' . Str::random(4);
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

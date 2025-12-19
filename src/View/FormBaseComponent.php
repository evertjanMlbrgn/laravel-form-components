<?php

namespace Mlbrgn\LaravelFormComponents\View;

use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class FormBaseComponent extends Component
{
    public bool $showErrors = true;

    /**
     * {@inheritDoc}
     */
    public function render(): View|Htmlable|Closure|string
    {
        return function (array $data) {
            $id = $this->determineId($data['attributes']->get('id'), $data['name'] ?? '');

            return view(config('form-components.view_namespace').'::'.Str::kebab(class_basename($this)), ['id' => $id]);
        };
    }

    public function assetFeatures(): array
    {
        return [];
    }

    /**
     * Generates an ID
     */
    public function determineId($id, $name): string
    {

        if (! empty($id)) {
            return $this->attributes->get('id');
        }
        if (! empty($name)) {
            return 'auto_id_'.$name.Str::random(4);
        }

        return 'rand_id_'.Str::random(4);
    }

    /**
     * Generates a random id
     * Used by text component to ensure that help text gets a random id to add aria attribute
     */
    //    public function getRandomId(): string
    //    {
    //        return 'rand_id_' . Str::random(4);
    //    }
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
     * @return string
     */
    protected static function convertBracketsToDots(string $name): string
    {
        return str_replace(['[', ']'], ['.', ''], $name);
    }


}

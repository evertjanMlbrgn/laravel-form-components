<?php

namespace Mlbrgn\LaravelFormComponents\View;

use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Mlbrgn\LaravelFormComponents\Theme\Theme;

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
            $componentName = $this->viewName();
            $framework = Theme::framework();

            $view = "mlbrgn-form-components::themes.{$framework}.{$componentName}";

            if (! view()->exists($view)) {
                $view = "mlbrgn-form-components::{$componentName}";
            }

            // Laravel re-applies the full component data via View::with() after this closure returns,
            // so only the generated id needs to be supplied here.
            return view($view, ['id' => $id]);
        };
    }

    protected function viewName(): string
    {
        return Str::kebab(class_basename($this));
    }

    public function assetConfig(): array
    {
        return [];
    }

    /**
     * Generates an ID
     */
    public function determineId($id, $name): string
    {
        if (! empty($id)) {
            return $id;
        }

        if (app()->runningUnitTests()) {
            return 'auto_id_'.md5($name.($this->type ?? ''));
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
     */
    protected static function convertBracketsToDots(string $name): string
    {
        return str_replace(['[', ']'], ['.', ''], $name);
    }
}

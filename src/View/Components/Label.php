<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Mlbrgn\LaravelFormComponents\View\FormBaseComponent;

class Label extends FormBaseComponent
{
    public string $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $label = '')
    {
        $this->label = $label;
    }
}

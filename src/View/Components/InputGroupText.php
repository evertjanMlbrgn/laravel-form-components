<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

class InputGroupText extends FormBaseComponent
{
    public string $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $text = '')
    {
        $this->text = $text;
    }
}

<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Illuminate\Support\Str;
use Mlbrgn\LaravelFormComponents\View\FormBaseComponent;

class Errors extends FormBaseComponent
{
    public string $name;
    public string $bag;

    public function __construct(string $name, string $bag = 'default')
    {
        $this->name = static::convertBracketsToDots(Str::before($name, '[]'));
        $this->bag = $bag;
    }

    // TODO?
//    public function shouldRender(): bool
//    {
////        return $this->hasErrors;
//        return true;
//    }
}

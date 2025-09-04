<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\View\View;

class LocalPackageBadge extends Component
{
    public function render(): View
    {
        return view(config('form-components.view_namespace').'::'.Str::kebab(class_basename($this)));
    }
}

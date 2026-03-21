<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Assets extends Component
{
    public array $assetConfig;

    public function __construct(array $assetConfig = [])
    {
        $this->assetConfig = array_merge([
            'assets' => [
                'validation' => false,
                'htmlEditor' => false,
            ],
        ], $assetConfig);
    }

    public function render(): View
    {
       return view('mlbrgn-form-components::assets');
    }
}

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
            'basePath' => asset('vendor/mlbrgn/laravel-form-components'),
            'features' => [
                'validation' => false,
                'htmlEditor' => false,
//                'preview' => false,
            ],
        ], $assetConfig);
    }

    public function render(): View
    {
       return view('mlbrgn-form-components::assets');
    }
}

<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Assets extends Component
{
    public array $config;

    public function __construct(array $config = [])
    {
        $this->config = array_merge([
            'basePath' => asset('vendor/mlbrgn/laravel-form-components'),
            'features' => [
                'validation' => false,
                'htmlEditor' => false,
//                'preview' => false,
            ],
        ], $config);
    }

    public function render(): View
    {
       return view('mlbrgn-form-components::assets');
    }
}

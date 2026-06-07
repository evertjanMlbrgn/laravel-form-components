<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Assets extends Component
{
    public array $assetConfig;

    public function __construct(
        array $assetConfig = [],
    ) {
        $this->assetConfig = array_replace_recursive([
            'assets' => [
                'validation' => true,
                'htmlEditor' => true,
                'preview' => false,
            ],
            'assetBasePath' => asset(
                config('form-components.asset_path')
            ),
        ], $assetConfig);
    }

    public function render(): View
    {
        return view('mlbrgn-form-components::assets');
    }
}

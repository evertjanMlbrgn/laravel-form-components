<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Illuminate\Support\Facades\View;
use Mlbrgn\LaravelFormComponents\Traits\HandlesDefaultAndOldValue;
use Mlbrgn\LaravelFormComponents\Traits\HandlesValidationErrors;
use Mlbrgn\LaravelFormComponents\View\FormBaseComponent;

class HtmlEditor extends FormBaseComponent
{
    use HandlesDefaultAndOldValue;
    use HandlesValidationErrors;

    public $value;
    public string $tinymceConfigJson = '{}';

    public function __construct(
        public string $name = '',
        $bind = null,
        $default = null,
        $language = null,
        $value = null,
        public string $label = '',
        public string $type = 'text',
        bool $showErrors = true,
        public bool $horizontal = false,
        public bool $floating = false,
        public bool $hidden = false,
        public string $validFeedback = '',
        public string $invalidFeedback = '',
        public bool $tooltipFeedback = false,
        public string $helpText = '',
        public array $extraFormData = [],
        $tinymceConfig = [] // Accept array or JSON string
    ) {

        $this->showErrors = $showErrors;

        if ($language) {
            $this->name = "{$name}[$language]";
        }

        $this->setValue($value, $name, $bind, $default, $language);

        // Handle TinyMCE config
        if (is_string($tinymceConfig)) {
            $decoded = json_decode($tinymceConfig, true);
            $tinymceConfig = $decoded ?? [];
        }

//        $this->tinymceConfigJson = e(json_encode($tinymceConfig));
        $this->tinymceConfigJson = json_encode($tinymceConfig);

        // Push extra scripts from config
        foreach (config('form-components.html_editor_tinymce_global_config.extra_scripts', []) as $script) {
            View::startPush('mfc-html-editor-assets');
            echo '<script type="module" src="' . e($script) . '"></script>';
            View::stopPush();
        }

        foreach (config('form-components.html_editor_tinymce_global_config.extra_styles', []) as $style) {
            View::startPush('mfc-html-editor-assets');
            echo '<link rel="stylesheet" href="' . e($style) . '">';
            View::stopPush();
        }

    }

    public function assetFeatures(): array
    {
        return [
            'features' => ['htmlEditor' => true],
            'basePath' => asset('vendor/mlbrgn/laravel-form-components')
        ];
    }


    public function tinymceConfig(): array
    {
        // Merge global config with component-specific settings if needed
        return config('form-components.html_editor_tinymce_global_config', []);
    }

}

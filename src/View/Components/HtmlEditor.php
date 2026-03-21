<?php
/** @noinspection PhpMultipleClassDeclarationsInspection */

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Illuminate\Support\Facades\View;
use Illuminate\Support\HtmlString;
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

        $globalConfig = $this->tinymceConfig();

        if (is_string($tinymceConfig)) {
            $tinymceConfig = json_decode($tinymceConfig, true) ?? [];
        }

        // Merge global defaults with component-specific config
        $mergedConfig = array_merge($globalConfig, $tinymceConfig);

        // Encode for frontend
        $this->tinymceConfigJson = json_encode($mergedConfig);

        // Push extra scripts from config
        $nonce = mlbrgn_csp_nonce();

        foreach (config('form-components.html_editor_tinymce_global_config.extra_scripts', []) as $script) {
            View::startPush('mfc-html-editor-assets');

            echo '<script type="module" src="' . e($script) . '"' .
                (isset($nonce) ? ' nonce="' . e($nonce) . '"' : '') .
                '></script>';

            View::stopPush();
        }

        foreach (config('form-components.html_editor_tinymce_global_config.extra_styles', []) as $style) {
            View::startPush('mfc-html-editor-assets');
            $attr = isset($nonce) ? ' nonce="'.e($nonce).'"' : '';
            echo new HtmlString('<script type="module" src="'.e($script).'"'.$attr.'></script>');
            View::stopPush();
        }
    }

    public function assetConfig(): array
    {
        return [
            'assets' => ['htmlEditor' => true],
        ];
    }

    public function tinymceConfig(): array
    {
        // Merge global config with component-specific settings if needed
        return config('form-components.html_editor_tinymce_global_config', []);
    }

}

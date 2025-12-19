<?php
/**
 * IDE Helper for Laravel Form Components
 *
 * This file exists solely to help IDEs recognize Blade components
 * provided by the mlbrgn-laravel-form-components package.
 *
 * This file is NOT loaded at runtime.
 *
 * Regeneration:
 * Run: php scripts/generate_ide_helper.php
 * It reads the component list from FormComponentsServiceProvider::$components
 */

use Mlbrgn\LaravelFormComponents\View\Components\{
    Button,
    Captcha,
    Checkbox,
    Errors,
    Form,
    Group,
    HtmlEditor,
    Input,
    InputGroup,
    InputGroupIcon,
    InputGroupText,
    Label,
    LocalPackageBadge,
    Radio,
    RecaptchaV2,
    Select,
    Submit,
    Text,
    Textarea
};
use Illuminate\Support\Facades\Blade;

// Explicit Blade component registration for IDE autocompletion
Blade::component('form-input', Mlbrgn\LaravelFormComponents\View\Components\Input::class);
Blade::component('form-captcha', Mlbrgn\LaravelFormComponents\View\Components\Captcha::class);
Blade::component('form-checkbox', Mlbrgn\LaravelFormComponents\View\Components\Checkbox::class);
Blade::component('form-errors', Mlbrgn\LaravelFormComponents\View\Components\Errors::class);
Blade::component('form-form', Mlbrgn\LaravelFormComponents\View\Components\Form::class);
Blade::component('form-group', Mlbrgn\LaravelFormComponents\View\Components\Group::class);
Blade::component('form-html-editor', Mlbrgn\LaravelFormComponents\View\Components\HtmlEditor::class);
Blade::component('form-input-group', Mlbrgn\LaravelFormComponents\View\Components\InputGroup::class);
Blade::component('form-input-group-icon', Mlbrgn\LaravelFormComponents\View\Components\InputGroupIcon::class);
Blade::component('form-input-group-text', Mlbrgn\LaravelFormComponents\View\Components\InputGroupText::class);
Blade::component('form-label', Mlbrgn\LaravelFormComponents\View\Components\Label::class);
Blade::component('form-radio', Mlbrgn\LaravelFormComponents\View\Components\Radio::class);
Blade::component('form-recaptcha-v2', Mlbrgn\LaravelFormComponents\View\Components\RecaptchaV2::class);
Blade::component('form-select', Mlbrgn\LaravelFormComponents\View\Components\Select::class);
Blade::component('form-submit', Mlbrgn\LaravelFormComponents\View\Components\Submit::class);
Blade::component('form-text', Mlbrgn\LaravelFormComponents\View\Components\Text::class);
Blade::component('form-textarea', Mlbrgn\LaravelFormComponents\View\Components\Textarea::class);
Blade::component('form-button', Mlbrgn\LaravelFormComponents\View\Components\Button::class);
Blade::component('form-local-package-badge', Mlbrgn\LaravelFormComponents\View\Components\LocalPackageBadge::class);

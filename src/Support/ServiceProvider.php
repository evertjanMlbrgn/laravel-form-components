<?php

namespace Mlbrgn\LaravelFormComponents\Support;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Mlbrgn\LaravelFormComponents\FormDataBinder;
use Mlbrgn\LaravelFormComponents\View\Components\Captcha;
use Mlbrgn\LaravelFormComponents\View\Components\Checkbox;
use Mlbrgn\LaravelFormComponents\View\Components\Errors;
use Mlbrgn\LaravelFormComponents\View\Components\Form;
use Mlbrgn\LaravelFormComponents\View\Components\Group;
use Mlbrgn\LaravelFormComponents\View\Components\HtmlEditor;
use Mlbrgn\LaravelFormComponents\View\Components\Inline;
use Mlbrgn\LaravelFormComponents\View\Components\Input;
use Mlbrgn\LaravelFormComponents\View\Components\InputGroup;
use Mlbrgn\LaravelFormComponents\View\Components\InputGroupText;
use Mlbrgn\LaravelFormComponents\View\Components\Label;
use Mlbrgn\LaravelFormComponents\View\Components\Radio;
use Mlbrgn\LaravelFormComponents\View\Components\Range;
use Mlbrgn\LaravelFormComponents\View\Components\Select;
use Mlbrgn\LaravelFormComponents\View\Components\Submit;
use Mlbrgn\LaravelFormComponents\View\Components\Textarea;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {



        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../config/config.php' => config_path('form-components.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../../resources/views' => base_path('resources/View/vendor/form-components'),
            ], 'View');
        }

        $this->loadViewComponentsAs('form', [
            Captcha::class,
            Checkbox::class,
            Errors::class,
            Form::class,
            Group::class,
            HtmlEditor::class,
            Inline::class,
            Input::class,
            InputGroup::class,
            InputGroupText::class,
            Label::class,
            Radio::class,
            Range::class,
            Select::class,
            Submit::class,
            TextArea::class
        ]);
//        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'form-components');

        Blade::directive('bind', function ($bind) {
            return '<?php app(\Mlbrgn\LaravelFormComponents\FormDataBinder::class)->bind(' . $bind . '); ?>';
        });

        Blade::directive('endbind', function () {
            return '<?php app(\Mlbrgn\LaravelFormComponents\FormDataBinder::class)->pop(); ?>';
        });

        //

//        $prefix = config('form-components.prefix');
//
//        Collection::make(config('form-components.components'))->each(
//            fn ($component, $alias) => Blade::component($alias, $component['class'], $prefix)
//        );
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'form-components');

        $this->app->singleton(FormDataBinder::class, fn () => new FormDataBinder);
    }
}

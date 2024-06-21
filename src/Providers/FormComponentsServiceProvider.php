<?php

namespace Mlbrgn\LaravelFormComponents\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\ComponentAttributeBag;
use Mlbrgn\LaravelFormComponents\Helpers\FormDataBinder;
use Mlbrgn\LaravelFormComponents\View\Components\Button;
use Mlbrgn\LaravelFormComponents\View\Components\Captcha;
use Mlbrgn\LaravelFormComponents\View\Components\Checkbox;
use Mlbrgn\LaravelFormComponents\View\Components\Errors;
use Mlbrgn\LaravelFormComponents\View\Components\Form;
use Mlbrgn\LaravelFormComponents\View\Components\HtmlEditor;
use Mlbrgn\LaravelFormComponents\View\Components\Input;
use Mlbrgn\LaravelFormComponents\View\Components\InputGroup;
use Mlbrgn\LaravelFormComponents\View\Components\InputGroupText;
use Mlbrgn\LaravelFormComponents\View\Components\Label;
use Mlbrgn\LaravelFormComponents\View\Components\Radio;
use Mlbrgn\LaravelFormComponents\View\Components\Select;
use Mlbrgn\LaravelFormComponents\View\Components\Submit;
use Mlbrgn\LaravelFormComponents\View\Components\Text;
use Mlbrgn\LaravelFormComponents\View\Components\Textarea;

class FormComponentsServiceProvider extends BaseServiceProvider
{
    // TODO consider using https://github.com/spatie/laravel-package-tools, makes installing package easier
    // READ https://dcblog.dev/my-process-for-writing-laravel-packages#heading-serviceprovider about github cli and packagist

    private const PATH_TO_BLADE_COMPONENT_VIEWS = __DIR__.'/../../resources/views/components';
    private const PATH_TO_OTHER_BLADE_VIEWS = __DIR__.'/../../resources/views/preview';

//    private const PATH_VIEW_CLASSES = __DIR__.'../View/';

//    private const PATH_TRAITS = __DIR__.'../Traits/';

//    private const PATH_SERVICE_PROVIDER = __DIR__.'/FormComponentsServiceProvider.php';

//    private const PATH_HELPERS = __DIR__.'../Helpers';

    private const CONFIG_FILE = __DIR__.'/../../config/config.php';
    private const ROUTES_PATH = __DIR__.'/../../routes/web.php';

    public function boot(): void
    {

        if ($this->app->runningInConsole()) {
            $this->publishes([
                self::CONFIG_FILE => config_path('form-components.php'),
            ], 'mlbrgn-form-components-config');

//            $this->publishes([
//                self::PATH_TO_BLADE_COMPONENT_VIEWS => base_path('resources/views/components/form'),
//            ], 'mlbrgn-form-components-views');

//            $this->publishes([
//                self::PATH_TRAITS => base_path('app/Traits'),
//            ], 'mlbrgn-form-components-traits');

//            $this->publishes([
//                self::PATH_VIEW_CLASSES => base_path('app/View'),
//            ], 'mlbrgn-form-components-view-classes');

//            $this->publishes([
//                self::PATH_SERVICE_PROVIDER => base_path('app/Providers'),
//            ], 'mlbrgn-form-components-service-provider');

//            $this->publishes([
//                self::PATH_HELPERS => base_path('app/Helpers'),
//            ], 'mlbrgn-form-components-helpers');

            // publish js for html editor
            $this->publishes([
                __DIR__.'/../dist' => public_path('vendor/laravel-form-components'),
            ], 'public');

// publish test page?
//            $this->publishes([
//                __DIR__.'/../resources/js' => resource_path('js/vendor/package_name'),
//            ]);
        }

        // method 1 of loading view components
        $this->registerComponents();

        // method 2 of loading view components
        //$this->loadViewComponentsAs('mlbrgn', $this->viewComponents());

        // method 3 of registering view components
        //Blade::componentNamespace('Mlbrgn\LaravelFormComponents\View\Components', config('form-components.tag_prefix'));

        $this->loadViewsFrom(realpath(self::PATH_TO_OTHER_BLADE_VIEWS), 'preview');
        $this->loadRoutesFrom(self::ROUTES_PATH);

        Blade::directive('bind', function ($bind) {
            return '<?php app(\Mlbrgn\LaravelFormComponents\Helpers\FormDataBinder::class)->bind('.$bind.'); ?>';
        });

        Blade::directive('endbind', function () {
            return '<?php app(\Mlbrgn\LaravelFormComponents\Helpers\FormDataBinder::class)->pop(); ?>';
        });

        $this->registerMacro();
    }

    protected function registerComponents(): void
    {

        $this->loadViewsFrom(realpath(self::PATH_TO_BLADE_COMPONENT_VIEWS), config('form-components.view_namespace'));

        $this->callAfterResolving(BladeCompiler::class, function () {
            $this->registerComponent('captcha', Captcha::class);
            $this->registerComponent('checkbox', Checkbox::class);
            $this->registerComponent('errors', Errors::class);
            $this->registerComponent('form', Form::class);
            $this->registerComponent('html-editor', HtmlEditor::class);
            $this->registerComponent('input', Input::class);
            $this->registerComponent('input-group', InputGroup::class);
            $this->registerComponent('input-group-text', InputGroupText::class);
            $this->registerComponent('label', Label::class);
            $this->registerComponent('radio', Radio::class);
            $this->registerComponent('select', Select::class);
            $this->registerComponent('submit', Submit::class);
            $this->registerComponent('text', Text::class);
            $this->registerComponent('textarea', Textarea::class);
            $this->registerComponent('button', Button::class);
        });
    }

    // tagAlias will become tag name (e.g. $tagAlias = 'abc' -> tag will be <x-abc/>)
    protected function registerComponent(string $tagAlias, string $class): void
    {
        // with dash syntax. e.g. <x-form-input>
        Blade::component(config('form-components.tag_prefix').'-'.$tagAlias, $class);

        // with dot syntax. e.g. <x-form.input> TODO deprecate
        Blade::component(config('form-components.tag_prefix').'.'.$tagAlias, $class);

        // for internal use, so that user can change prefix and we can still find components inside our views
        Blade::component( 'mlbrgn-form-'.$tagAlias, $class);
    }

    public function register(): void
    {
        $this->mergeConfigFrom(self::CONFIG_FILE, 'form-components');

        $this->app->singleton(FormDataBinder::class, fn () => new FormDataBinder);
    }

    private function registerMacro()
    {
        ComponentAttributeBag::macro('onlyWrapperClasses', function () {

            if (!config('form-components.use_wrapper_classes')) {
                return new static([]);
            }

            $classes = $this->get('class', '');

            // Filter classes starting with 'm-', 'ms-', 'mt-', 'me-', 'mb-'
            $wrapperClasses = array_filter(explode(' ', $classes), function ($value) {
                return str_starts_with($value, 'm-') ||
                    str_starts_with($value, 'ms-') ||
                    str_starts_with($value, 'mt-') ||
                    str_starts_with($value, 'me-') ||
                    str_starts_with($value, 'mb-') ||
                    str_starts_with($value, 'mx-') ||
                    str_starts_with($value, 'my-');
            });

            // Join the filtered margin classes back into a string
            $wrapperClassesString = implode(' ', $wrapperClasses);

            $retAttributes = [];
            $retAttributes['class'] = $wrapperClassesString;

            return new static($retAttributes);
        });

        ComponentAttributeBag::macro('exceptWrapperClasses', function () {

            if (!config('form-components.use_wrapper_classes')) {
                return $this;
            }

            $classes = $this->get('class', '');

            // Filter classes starting with 'm-', 'ms-', 'mt-', 'me-', 'mb-'
            $nonWrapperClasses = array_filter(explode(' ', $classes), function ($value) {
                return !str_starts_with($value, 'm-') &&
                    !str_starts_with($value, 'ms-') &&
                    !str_starts_with($value, 'mt-') &&
                    !str_starts_with($value, 'me-') &&
                    !str_starts_with($value, 'mb-') &&
                    !str_starts_with($value, 'mx-') &&
                    !str_starts_with($value, 'my-');
            });

            // Join the filtered margin classes back into a string
            $nonWrapperClasses = implode(' ', $nonWrapperClasses);

            $retAttributes = $this->getAttributes();
            $retAttributes['class'] = $nonWrapperClasses;

            return new static($retAttributes);
        });
    }
}

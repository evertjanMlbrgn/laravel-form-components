<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

it('links labels to inputs using the "for" attribute', function () {
    $view = $this->blade('<x-form-input name="email" label="Email Address" id="email-field" />');
    $view->assertSee('for="email-field"', false);
    $view->assertSee('id="email-field"', false);
});

it('links help text via aria-describedby', function () {
    $view = $this->blade('<x-form-input name="test" help-text="Helpful hint" id="test-input" />');
    $view->assertSee('aria-describedby="test-input-help-text"', false);
    $view->assertSee('id="test-input-help-text"', false);
});

it('links error messages via aria-describedby', function () {
    $errors = new ViewErrorBag;
    $errors->put('default', new MessageBag(['test_field' => ['The field is invalid.']]));
    View::share('errors', $errors);

    $view = $this->blade(
        '<x-form-input name="test_field" id="test-input" />'
    );

    $view->assertSee('aria-describedby="test-input-error"', false);
    $view->assertSee('id="test-input-error"', false);
    $view->assertSee('The field is invalid.');
});

it('includes both help text and error message in aria-describedby', function () {
    $errors = new ViewErrorBag;
    $errors->put('default', new MessageBag(['test_field' => ['Error here']]));
    View::share('errors', $errors);

    $view = $this->blade(
        '<x-form-input name="test_field" help-text="Help here" id="test-input" />'
    );

    $view->assertSee('aria-describedby="test-input-help-text test-input-error"', false);
});

it('adds required attribute when specified', function () {
    $view = $this->blade('<x-form-input name="test" required />');
    $view->assertSee('required');
});

it('links labels for checkboxes and radios', function () {
    $viewCheckbox = $this->blade('<x-form-checkbox name="check" label="Check me" id="check-id" />');
    $viewCheckbox->assertSee('for="check-id"', false);
    $viewCheckbox->assertSee('id="check-id"', false);

    $viewRadio = $this->blade('<x-form-radio name="radio" label="Select me" id="radio-id" />');
    $viewRadio->assertSee('for="radio-id"', false);
    $viewRadio->assertSee('id="radio-id"', false);
});

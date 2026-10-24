<?php

it('renders inputs with different sizes', function () {
    $viewLg = $this->blade('<x-form-input name="test" class="form-control-lg" />');
    $viewLg->assertSee('form-control-lg');

    $viewSm = $this->blade('<x-form-input name="test" class="form-control-sm" />');
    $viewSm->assertSee('form-control-sm');
});

it('renders horizontal labels with correct size based on input size', function () {
    // Tests the auto-detection of lg/sm classes from parentClasses
    $viewLg = $this->blade('<x-form-input name="test" label="Lg Label" horizontal class="form-control-lg" />');
    $viewLg->assertSee('col-form-label-lg');

    $viewSm = $this->blade('<x-form-input name="test" label="Sm Label" horizontal class="form-control-sm" />');
    $viewSm->assertSee('col-form-label-sm');
});

it('does not render labels for hidden inputs', function () {
    $view = $this->blade('<x-form-input name="test" label="Hidden Label" type="hidden" />');
    $view->assertDontSee('Hidden Label');
});

it('supports hidden attribute on components', function () {
    // Test that the 'hidden' attribute suppresses the label and adds the 'hidden' attribute to the input
    $view = $this->blade('<x-form-input name="test" label="Hidden Input" hidden />');
    $view->assertDontSee('Hidden Input');
    $view->assertSee('hidden');
});

it('respects custom IDs when provided', function () {
    $view = $this->blade('<x-form-input name="test" id="custom-id" />');
    $view->assertSee('id="custom-id"', false);
});

it('generates deterministic IDs in tests', function () {
    $view1 = $this->blade('<x-form-input name="test" />');
    $view2 = $this->blade('<x-form-input name="test" />');

    // In Unit Tests, IDs should be deterministic based on name
    expect((string) $view1)->toBe((string) $view2);
});

it('links help text via aria-describedby', function () {
    $view = $this->blade('<x-form-input name="test" help-text="Help text" id="my-input" />');
    $view->assertSee('aria-describedby="my-input-help-text"', false);
    $view->assertSee('id="my-input-help-text"', false);
    $view->assertSee('Help text');
});

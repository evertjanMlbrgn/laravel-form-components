<?php /** @noinspection Annotator */

use Illuminate\Http\Request;

it('always gets an id attribute', function () {
    $this->registerTestRoute('textarea-no-id');

    $this->visit('/textarea-no-id')
        ->seeElement('textarea[name="textarea"][id]');
});

it('sets classes', function () {
    $this->registerTestRoute('textarea-no-id');
    $this->visit('/textarea-no-id')
        ->seeElement('textarea.form-control');
});

it('sets extra attributes', function () {
    $this->registerTestRoute('textarea-extra-attributes');
    $this->visit('/textarea-extra-attributes')
        ->seeElement('textarea[name="textarea"][readonly][disabled]');
});

it('sets extra classes', function () {
    $this->registerTestRoute('textarea-extra-classes');
    $this->visit('/textarea-extra-classes')
        ->seeElement('textarea[name="textarea"].extra-1.extra-2.form-control-lg');
});

it('sets a default value', function () {
    $this->registerTestRoute('textarea-default');

    $this->visit('/textarea-default')
        ->seeInElement('textarea[name="textarea"]', 'b');
});

it('does not render label when hidden', function () {
    $this->registerTestRoute('textarea-hidden');

    $this->visit('/textarea-hidden')
        ->dontSeeElement('label[for="textarea"]')
        ->seeElement('label[for="non-hidden-textarea"]');
});

it('honors use_wrapper_classes when set to true', function () {
    Config::set('form-components.use_wrapper_classes', true);

    $this->registerTestRoute('textarea-wrapper-classes');

    $this->visit('/textarea-wrapper-classes')
        ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 textarea[name="textarea"].form-control-lg.some-other-class');

});

it('honors use_wrapper_classes when set to false', function () {
    Config::set('form-components.use_wrapper_classes', false);

    $this->registerTestRoute('textarea-wrapper-classes');

    $this->visit('/textarea-wrapper-classes')
        ->seeElement('textarea[name="textarea"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3');

    Config::set('form-components.use_wrapper_classes', true);
});

it('uses old value after submit', function () {
    $this->registerTestRoute('textarea-validation', function (Request $request) {
        $request->validate([
            'textarea' => 'required|in:abc',
        ]);
    });

    $this->visit('/textarea-validation')
        ->type('abc', 'textarea-validation')
        ->press('Send')
        ->seeInElement('textarea[name="textarea-validation"]', 'abc');
});

it('shows a validation error', function () {
    $this->registerTestRoute('textarea-validation-error', function (Request $request) {
        $request->validate([
            'textarea' => 'required',
        ]);
    });

    $this->visit('/textarea-validation-error')
        ->press('Send')
        ->seeElement('textarea[name="textarea"]')
        ->seeElement('textarea[name="textarea"] ~ div.invalid-feedback')
        ->seeInElement('textarea[name="textarea"] ~ div.invalid-feedback', 'The textarea field is required');
});

it('does have help text when "help-text" attribute present', function () {
    $this->registerTestRoute('textarea-help-text');

    $this->visit('/textarea-help-text')
      ->seeElement('div.form-text[id="textarea-help-text"]')
                ->seeInElement('div.form-text[id="textarea-help-text"]', 'attribute help text');
});

it('does have help text when @slot("help") attribute present', function () {
    $this->registerTestRoute('textarea-help-slot');

    $this->visit('/textarea-help-slot')
        ->seeElement('div.form-text[id="textarea-help-text"]')
                ->seeInElement('div.form-text[id="textarea-help-text"]', 'slot help text');
});

it('does not have help text when no @slot("help") or "help-text" attribute', function () {
    $this->registerTestRoute('textarea-no-help');

    $this->visit('/textarea-no-help')
       ->seeElement('textarea')
                ->dontSeeElement('div[id="textarea-help-text"]');
});

it('does not have help text when hidden', function () {
    $this->registerTestRoute('textarea-hidden');

    $this->visit('/textarea-hidden')
       ->seeElement('textarea') // always make sure node list is not empty when only using dontSeeElement
            ->dontSeeElement('div.form-text[id="hidden-textarea-help-text"]')
                ->seeElement('div.form-text[id="non-hidden-textarea-help-text"]')
                ->seeInElement('div.form-text[id="non-hidden-textarea-help-text"]', 'textarea help text');
});

it('can bind data', function () {
    $this->registerTestRoute('textarea-bind');

    $this->visit('/textarea-bind')
        ->seeInElement('textarea[id="bound-textarea"]', 'Textarea bound value');
});

it('can set value using slot', function () {
    $this->registerTestRoute('textarea-value-by-slot');

    $this->visit('/textarea-value-by-slot')
       ->seeElement('textarea')
                ->seeInElement('textarea[id="value-using-slot"]', 'Value using slot');
});

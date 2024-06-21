<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);
use Illuminate\Http\Request;

it('check the right element as default', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-1', function() {
            $this->seeElement('input[value="1"]:checked')
                ->seeElement('input[value="0"]:not(:checked)');
        });
});

it('check radio labels work', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-1', function() {
            $this->seeElement('input[value="1"] ~ label')
                ->seeElement('input[value="0"] ~ label');
        });
});

it('sets correct classes on radio labels', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-1', function() {
            $this->seeElement('input[value="1"] ~ label.form-check-label')
                ->seeElement('input[value="0"] ~ label.form-check-label');
        });
});

it('checks the right element as default with a bound target', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-1', function() {
            $this->seeElement('input[value="1"]:checked')
                ->seeElement('input[value="0"]:not(:checked)');
        });
});

it('checks the right radio button after a validation error', function () {
    $this->registerTestRoute('bootstrap-radio', function (Request $request) {
        $data = $request->validate([
            'radio' => 'required|in:a',
        ]);
    });

    $this->visit('/bootstrap-radio')
        ->within('#form-radio-validation', function() {
            $this->select('b', 'radio')
                ->press('Send')
                ->seeElement('input[value="a"]:not(:checked)')
                ->seeElement('input[value="b"]:checked');
        });
});

it('checks the right input element after a validation error of another field', function () {
    $this->registerTestRoute('bootstrap-radio', function (Request $request) {
        $data = $request->validate([
            'input' => 'required',
        ]);
    });

    $this->visit('/bootstrap-radio')
        ->within('#form-radio-zero-value', function() {
            $this->select('0', 'radio')
                ->press('Send')
                ->seeElement('input[value="0"]:checked')
                ->seeElement('input[value="1"]:not(:checked)');
        });
});

it('always has an id attribute', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-1', function() {
            $this->seeElement('input[value="1"][id]')
                ->seeElement('input[value="0"][id]');
        });
});

it('does not render label when radio is hidden', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-2', function() {
                return $this->dontSeeElement('label[for="hidden-radio"]')
                    ->seeElement('label[for="non-hidden-radio"]');
        });
});

it('honors use_wrapper_classes when set to true', function () {
    Config::set('form-components.use_wrapper_classes', true);

    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-3', function() {
            $this->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="radio"].form-control-lg.some-other-class');

        });
});

it('honors use_wrapper_classes when set to false', function () {
    Config::set('form-components.use_wrapper_classes', false);

    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-3', function() {
            $this->seeElement('input[name="radio"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3');
        });

    Config::set('form-components.use_wrapper_classes', true);

});

it('sets a default value', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-default', function() {
            $this->seeElement('input[name="radio"]:checked');
        });
});

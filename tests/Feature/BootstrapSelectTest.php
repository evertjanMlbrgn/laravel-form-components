<?php

use Illuminate\Http\Request;

it('always gets an id attribute', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-select-no-id', function() {
            $this->seeElement('select[name="select"][id]');
        });
});

it('honors extra attributes', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-select-extra-attributes', function() {
            return $this->seeElement('select[name="select"][id="select"][readonly][disabled][value="test"]:not([required])');
        });
});

it('honors extra classes', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-select-extra-classes', function() {
            return $this->seeElement('select[name="select"].extra-1.extra-2.form-control-lg');
        });
});

it('sets a default value', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-select-default', function() {
            $this->seeElement('option[value="c"]:selected');
        });
});

it('does not render label when select is hidden', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-select-hidden', function() {
            $this->dontSeeElement('label[for="hidden-select"]')
                ->seeElement('label[for="non-hidden-select"]');
        });

});

it('honors use_wrapper_classes when set to true', function () {
    Config::set('form-components.use_wrapper_classes', true);

    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-wrapper-classes', function() {
            $this->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 select[name="select"].form-control-lg.some-other-class');

        });
});

it('honors use_wrapper_classes when set to false', function () {
    Config::set('form-components.use_wrapper_classes', false);

    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-wrapper-classes', function() {
            $this->seeElement('select[name="select"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3');
        });

    Config::set('form-components.use_wrapper_classes', true);

});

it('remembers old value after submit', function () {
    $this->registerTestRoute('bootstrap-select', function (Request $request) {
        $request->validate([
            'select' => 'required|in:0,1',
        ]);
    });

    $this->visit('/bootstrap-select')
        ->within('#form-select-validation', function() {
            $this->select('2', 'select')
                ->press('Send')
                ->within('#form-select-validation', function() {
                    $this->seeElement('option[value="0"]:not(:selected)')
                        ->seeElement('option[value="1"]:not(:selected)')
                        ->seeElement('option[value="2"]:selected');
                });
        });
});

it('shows a validation error', function () {
    $this->registerTestRoute('bootstrap-select', function (Request $request) {
        $request->validate([
            'select' => 'required|in:0,1',
        ]);
    });

    $this->visit('/bootstrap-select')
        ->within('#form-select-validation-error', function() {
            $this->press('Send')
                ->within('#form-select-validation-error', function() {
                    $this->seeElement('option[value="a"]:not(:selected)')
                        ->seeElement('option[value="b"]:not(:selected)')
                        ->seeElement('option[value="c"]:not(:selected)')
                    ->seeElement('div.invalid-feedback')
                    ->seeInElement('div.invalid-feedback', 'The select field is required');
                });
        });
});

it('shows slot when no options attribute provided', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-select-options-using-slot', function() {
            $this->seeElement('option[value="a"]')
                ->seeElement('option[value="b"]')
                ->seeElement('option[value="c"]');
        });
});

it('can render a placeholder', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-select-placeholder', function() {
            $this->seeElement('option[value=""][selected="selected"]')
                ->seeElement('option[value="a"]')
                ->seeElement('option[value="b"]');
        });
});

it('does have help text when "help-text" attribute present', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-select-help-text', function() {
            $this->seeElement('div.form-text[id="select-help-text"]');

        });
});

it('does have help text when @slot("help") attribute present', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-select-help-slot', function() {
            $this->seeElement('div.form-text[id="select-help-text"]');

        });
});

it('does not have help text when no @slot("help") or "help-text" attribute', function () {
    $this->registerTestRoute('bootstrap-select');

    // reusing "form-select-options-using-slot" for this test
    $this->visit('/bootstrap-select')
        ->within('#form-select-options-using-slot', function() {
            $this->seeElement('select')// always make sure node list is not empty when only using dontSeeElement
            ->dontSeeElement('div.form-text');
        });
});

it('does not have help text when select is hidden', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-select-hidden', function() {
            $this->seeElement('select') // always make sure node list is not empty when only using dontSeeElement
            ->dontSeeElement('div.form-text[id="hidden-select-help-text"]')
                ->dontSeeElement('div.form-text[id="hidden-select-2-help-text"]')
                ->seeElement('div.form-text[id="non-hidden-select-help-text"]')
                ->seeInElement('div.form-text[id="non-hidden-select-help-text"]', 'other help text');
        });
});

it('selects a boolean value using bind', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-select-boolean', function() {
            $this->seeElement('option[value="1"]')
                ->seeElement('option[value="0"][selected="selected"]');
        });

});

it('makes the values numeric', function () {
    $this->registerTestRoute('bootstrap-select', function (Request $request) {
        $request->validate([
            'select' => 'required|in:a,b',
        ]);
    });

    $this->visit('/bootstrap-select')
        ->within('#form-select-without-keys', function() {
            $this->seeInElement('option[value="0"]', 'a')
                ->seeInElement('option[value="1"]', 'b')
                ->seeInElement('option[value="2"]', 'c');
        });
});

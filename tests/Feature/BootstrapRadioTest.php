<?php

use Illuminate\Http\Request;

it('always gets an id attribute', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-radio-no-id', function () {
            $this->seeElement('input[value="1"][id]')
                ->seeElement('input[value="0"][id]');
        });
});

it('sets classes', function () {
    $this->registerTestRoute('bootstrap-radio');
    $this->visit('/bootstrap-radio')
        ->within('#form-radio-classes', function () {
            $this->seeElement('div.form-check input.form-check-input');
        });
});

it('sets extra attributes', function () {
    $this->registerTestRoute('bootstrap-radio');
    $this->visit('/bootstrap-radio')
        ->within('#form-radio-extra-attributes', function () {
            $this->seeElement('input[name="radio"][readonly][disabled]');
        });
});

it('sets extra classes', function () {
    $this->registerTestRoute('bootstrap-radio');
    $this->visit('/bootstrap-radio')
        ->within('#form-radio-extra-classes', function () {
            $this->seeElement('input[name="radio"].extra-1.extra-2.form-control-lg');
        });
});

it('sets a default value', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-radio-default', function () {
            $this->seeElement('input[name="radio"]:checked');
        });
});

it('does not render label when hidden', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-radio-hidden', function () {
            return $this->dontSeeElement('label[for="hidden-radio"]')
                ->seeElement('label[for="non-hidden-radio"]');
        });
});

it('honors use_wrapper_classes when set to true', function () {
    Config::set('form-components.use_wrapper_classes', true);

    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-radio-wrapper-classes', function () {
            $this->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="radio"].form-control-lg.some-other-class');

        });
});

it('honors use_wrapper_classes when set to false', function () {
    Config::set('form-components.use_wrapper_classes', false);

    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-radio-wrapper-classes', function () {
            $this->seeElement('input[name="radio"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3');
        });

    Config::set('form-components.use_wrapper_classes', true);

});

it('uses old value after submit', function () {
    $this->registerTestRoute('bootstrap-radio', function (Request $request) {
        $request->validate([
            'radio' => 'required',
        ]);
    });

    $this->visit('/bootstrap-radio')
        ->check('radio-validation')
        ->press('Send')
        ->within('#form-radio-validation', function () {
            $this->seeElement('input[name="radio-validation"]:checked');
        });
});

it('shows a validation error', function () {
    $this->registerTestRoute('bootstrap-radio', function (Request $request) {
        $request->validate([
            'radio' => 'required',
        ]);
    });

    $this->visit('/bootstrap-radio')
        ->within('#form-radio-validation-error', function () {
            $this->press('Send')
                ->within('#form-radio-validation-error', function () {
                    $this->seeElement('input[name="radio"]')
                        ->seeElement('input[name="radio"] ~ div.invalid-feedback')
                        ->seeInElement('input[name="radio"] ~ div.invalid-feedback', 'The radio field is required');
                });
        });
});

it('does have help text when "help-text" attribute present', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-radio-help-text', function () {
            $this->seeElement('div.form-text[id="radio-help-text"]')
                ->seeInElement('div.form-text[id="radio-help-text"]', 'attribute help text');
        });
});

it('does have help text when @slot("help") attribute present', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-radio-help-slot', function () {
            $this->seeElement('div.form-text[id="radio-help-text"]')
                ->seeInElement('div.form-text[id="radio-help-text"]', 'slot help text');
        });
});

it('does not have help text when no @slot("help") or "help-text" attribute', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-radio-no-help', function () {
            $this->dontSeeElement('div[id="radio-help-text"]');
        });
});

it('does not have help text when hidden', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-radio-hidden', function () {
            $this->seeElement('input[type="radio"]') // always make sure node list is not empty when only using dontSeeElement
                ->dontSeeElement('div.form-text[id="hidden-radio-help-text"]')
                ->seeElement('div.form-text[id="non-hidden-radio-help-text"]')
                ->seeInElement('div.form-text[id="non-hidden-radio-help-text"]', 'help text');
        });
});

// TODO other name
it('check the right element as default', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-radio-no-id', function () {
            $this->seeElement('input[value="1"]:checked')
                ->seeElement('input[value="0"]:not(:checked)');
        });
});

// TODO other name
it('check radio labels work', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-radio-no-id', function () {
            $this->seeElement('input[value="1"] ~ label')
                ->seeElement('input[value="0"] ~ label');
        });
});

it('has correct classes on label', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-radio-no-id', function () {
            $this->seeElement('input[value="0"] ~ label.form-check-label')
                ->seeElement('input[value="1"] ~ label.form-check-label');
        });
});

it('sets correct classes on radio labels', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-radio-no-id', function () {
            $this->seeElement('input[value="1"] ~ label.form-check-label')
                ->seeElement('input[value="0"] ~ label.form-check-label');
        });
});

it('checks the right element as default with a bound target', function () {
    $this->registerTestRoute('bootstrap-radio');

    $this->visit('/bootstrap-radio')
        ->within('#form-radio-no-id', function () {
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
        ->within('#form-radio-validation', function () {
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
        ->within('#form-radio-zero-value', function () {
            $this->select('0', 'radio')
                ->press('Send')
                ->seeElement('input[value="0"]:checked')
                ->seeElement('input[value="1"]:not(:checked)');
        });
});

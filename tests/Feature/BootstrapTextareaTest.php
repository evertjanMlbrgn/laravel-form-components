<?php /** @noinspection Annotator */

use Illuminate\Http\Request;

it('always gets an id attribute', function () {
    $this->registerTestRoute('bootstrap-textarea');

    $this->visit('/bootstrap-textarea')
        ->within('#form-textarea-no-id', function () {
            $this->seeElement('textarea[name="textarea"][id]');
        });
});

it('sets classes', function () {
    $this->registerTestRoute('bootstrap-textarea');
    $this->visit('/bootstrap-textarea')
        ->within('#form-textarea-no-id', function () {
            $this->seeElement('textarea.form-control');
        });
});

it('sets extra attributes', function () {
    $this->registerTestRoute('bootstrap-textarea');
    $this->visit('/bootstrap-textarea')
        ->within('#form-textarea-extra-attributes', function () {
            $this->seeElement('textarea[name="textarea"][readonly][disabled]');
        });
});

it('sets extra classes', function () {
    $this->registerTestRoute('bootstrap-textarea');
    $this->visit('/bootstrap-textarea')
        ->within('#form-textarea-extra-classes', function () {
            $this->seeElement('textarea[name="textarea"].extra-1.extra-2.form-control-lg');
        });
});

it('sets a default value', function () {
    $this->registerTestRoute('bootstrap-textarea');

    $this->visit('/bootstrap-textarea')
        ->within('#form-textarea-default', function () {
            $this->seeInElement('textarea[name="textarea"]', 'b');
        });
});

it('does not render label when hidden', function () {
    $this->registerTestRoute('bootstrap-textarea');

    $this->visit('/bootstrap-textarea')
        ->within('#form-textarea-hidden', function () {
            $this->dontSeeElement('label[for="textarea"]')
                ->seeElement('label[for="non-hidden-textarea"]');
        });
});

it('honors use_wrapper_classes when set to true', function () {
    Config::set('form-components.use_wrapper_classes', true);

    $this->registerTestRoute('bootstrap-textarea');

    $this->visit('/bootstrap-textarea')
        ->within('#form-textarea-wrapper-classes', function () {
            $this->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 textarea[name="textarea"].form-control-lg.some-other-class');

        });
});

it('honors use_wrapper_classes when set to false', function () {
    Config::set('form-components.use_wrapper_classes', false);

    $this->registerTestRoute('bootstrap-textarea');

    $this->visit('/bootstrap-textarea')
        ->within('#form-textarea-wrapper-classes', function () {
            $this->seeElement('textarea[name="textarea"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3');
        });

    Config::set('form-components.use_wrapper_classes', true);
});

it('uses old value after submit', function () {
    $this->registerTestRoute('bootstrap-textarea', function (Request $request) {
        $request->validate([
            'textarea' => 'required|in:abc',
        ]);
    });

    $this->visit('/bootstrap-textarea')
        ->type('abc', 'textarea-validation')
        ->press('Send')
        ->within('#form-textarea-validation', function () {
            $this->seeInElement('textarea[name="textarea-validation"]', 'abc');
        });
});

it('shows a validation error', function () {
    $this->registerTestRoute('bootstrap-textarea', function (Request $request) {
        $request->validate([
            'textarea' => 'required',
        ]);
    });

    $this->visit('/bootstrap-textarea')
        ->within('#form-textarea-validation-error', function () {
            $this->press('Send')
                ->within('#form-textarea-validation-error', function () {
                    $this->seeElement('textarea[name="textarea"]')
                        ->seeElement('textarea[name="textarea"] ~ div.invalid-feedback')
                        ->seeInElement('textarea[name="textarea"] ~ div.invalid-feedback', 'The textarea field is required');
                });
        });
});

it('does have help text when "help-text" attribute present', function () {
    $this->registerTestRoute('bootstrap-textarea');

    $this->visit('/bootstrap-textarea')
        ->within('#form-textarea-help-text', function () {
            $this->seeElement('div.form-text[id="textarea-help-text"]')
                ->seeInElement('div.form-text[id="textarea-help-text"]', 'attribute help text');
        });
});

it('does have help text when @slot("help") attribute present', function () {
    $this->registerTestRoute('bootstrap-textarea');

    $this->visit('/bootstrap-textarea')
        ->within('#form-textarea-help-slot', function () {
            $this->seeElement('div.form-text[id="textarea-help-text"]')
                ->seeInElement('div.form-text[id="textarea-help-text"]', 'slot help text');
        });
});

it('does not have help text when no @slot("help") or "help-text" attribute', function () {
    $this->registerTestRoute('bootstrap-textarea');

    $this->visit('/bootstrap-textarea')
        ->within('#form-textarea-no-help', function () {
            $this->seeElement('textarea')
                ->dontSeeElement('div[id="textarea-help-text"]');
        });
});

it('does not have help text when hidden', function () {
    $this->registerTestRoute('bootstrap-textarea');

    $this->visit('/bootstrap-textarea')
        ->within('#form-textarea-hidden', function () {
            $this->seeElement('textarea') // always make sure node list is not empty when only using dontSeeElement
                ->dontSeeElement('div.form-text[id="hidden-textarea-help-text"]')
                ->seeElement('div.form-text[id="non-hidden-textarea-help-text"]')
                ->seeInElement('div.form-text[id="non-hidden-textarea-help-text"]', 'textarea help text');
        });
});

it('can bind data', function () {
    $this->registerTestRoute('bootstrap-textarea');

    $this->visit('/bootstrap-textarea')
        ->within('#form-textarea-bind', function () {
            $this->seeInElement('textarea[id="bound-textarea"]', 'Textarea bound value');
        });
});

it('can set value using slot', function () {
    $this->registerTestRoute('bootstrap-textarea');

    $this->visit('/bootstrap-textarea')
        ->within('#form-textarea-value-using-slot', function () {
            $this->seeElement('textarea')
                ->seeInElement('textarea[id="value-using-slot"]', 'Value using slot');
        });
});

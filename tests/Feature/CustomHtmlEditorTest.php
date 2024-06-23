<?php

use Illuminate\Http\Request;

it('always gets an id attribute', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-html-editor-no-id', function() {
            $this->seeElement('textarea[id]');
        });
});

//it('always gets an id attribute and label refers to it', function () {
//    $this->registerTestRoute('custom-html-editor');
//
//    $this->visit('/custom-html-editor')
//        ->within('#form-html-editor-no-id', function() {
//            $randomId = $this->crawler()->filter('textarea.html-editor-3')->attr('id');
//
//            $this->seeElement('textarea[id="id-using-id"]')
//                ->seeElement('textarea[id="auto_id_id-using-name"]')
//                ->seeElement('textarea.html-editor-3[id="' . $randomId . '"]')
//                ->seeElement('label[for="id-using-id"].form-label.required')
//                ->seeElement('label[for="auto_id_id-using-name"].form-label')
//                ->seeElement('label[for="' . $randomId . '"].form-label');
//        });
//});

it('sets classes', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('custom-html-editor')
        ->within('#form-html-editor-classes', function() {
            $this->seeElement('textarea[name="html-editor"].form-control.html-editor');
        });
});

it('sets extra classes', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('custom-html-editor')
        ->within('#form-html-editor-extra-classes', function() {
            $this->seeElement('textarea[name="html-editor"].extra-class.extra-class-2');
        });
});

it('sets extra attributes', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('custom-html-editor')
        ->within('#form-html-editor-extra-attributes', function() {
            $this->seeElement('textarea[name="html-editor"][required][disabled][something][readonly]');
        });
});

it('sets a default value', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-html-editor-default', function() {
            $this->seeInElement('textarea[name="textarea"]', 'b');
        });
});

it('does not render label when hidden', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-html-editor-hidden', function() {
           $this->dontSeeElement('label[for="hidden-html-editor"]')
               ->seeElement('label[for="non-hidden-html-editor"]');
        });
});

it('honors use_wrapper_classes when set to true', function () {
    Config::set('form-components.use_wrapper_classes', true);

    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-html-editor-wrapper-classes', function() {
            $this->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 textarea[name="html-editor"].form-control-lg.some-other-class');
        });
});

it('honors use_wrapper_classes when set to false', function () {
    Config::set('form-components.use_wrapper_classes', false);

    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-html-editor-wrapper-classes', function() {
            $this->seeElement('textarea[name="html-editor"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3');
        });

    Config::set('form-components.use_wrapper_classes', true);

});

it('uses old value after submit', function () {
    $this->registerTestRoute('custom-html-editor', function (Request $request) {
        $request->validate([
            'html-editor-validation' => 'required',
        ]);
    });

    $this->visit('/custom-html-editor')
        ->type('abc', 'html-editor-validation')
        ->press('Send')
        ->within('#form-html-editor-validation', function() {
            $this->seeInElement('textarea[name="html-editor-validation"]', 'abc');
        });
})->todo();

it('shows a validation error', function () {
    $this->registerTestRoute('custom-html-editor', function (Request $request) {
        $request->validate([
            'html-editor-validation' => 'required',
        ]);
    });

    $this->visit('/custom-html-editor')
        ->within('#form-html-error-validation-error', function() {
            $this->press('Send')
                ->within('#form-html-editor-validation-error', function() {
                    $this->seeElement('textarea[name="html-editor"]')
                        ->seeElement('textarea[name="html-editor"] ~ div.invalid-feedback')
                        ->seeInElement('textarea[name="html-editor"] ~ div.invalid-feedback', 'The html-editor field is required');
                });
        });
})->todo();

it('does have help text when "help-text" attribute present', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-html-editor-help-text', function() {
            $this->seeElement('div.form-text[id="html-editor-help-text"]')
                ->seeInElement('div.form-text[id="html-editor-help-text"]', 'attribute help text');
        });
});

it('does have help text when @slot("help") attribute present', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-html-editor-help-slot', function() {
            $this->seeElement('div.form-text[id="html-editor-help-text"]')
                ->seeInElement('div.form-text[id="html-editor-help-text"]', 'slot help text');
        });
});

it('does not have help text when no @slot("help") or "help-text" attribute', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-html-editor-no-help', function() {
            $this->seeElement('textarea')
            ->dontSeeElement('div[id="content-using-slot-help-text"]');
        });
});

it('does not have help text when hidden', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-html-editor-hidden', function() {
            $this->seeElement('textarea') // always make sure node list is not empty when only using dontSeeElement
            ->dontSeeElement('div.form-text[id="hidden-html-editor-help-text"]')
                ->seeElement('div.form-text[id="non-hidden-html-editor-help-text"]')
                ->seeInElement('div.form-text[id="non-hidden-html-editor-help-text"]', 'other help text');
        });
});

it('can bind data', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-html-editor-bind', function() {
            $this->seeInElement('textarea[id="bound-html-editor"]', 'html-editor-bound-value');
        });
})->todo();

it('can set value using slot', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-html-editor-value-using-slot', function() {
            $this->seeInElement('textarea[id="value-using-slot"]', 'Sample content');
        });
});


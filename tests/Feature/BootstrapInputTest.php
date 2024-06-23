<?php

use Illuminate\Http\Request;

it('always gets an id attribute', function () {
    $this->registerTestRoute('bootstrap-input');

    $this->visit('/bootstrap-input')
        ->within('#form-input-no-id', function() {
            return $this->seeElement('button[id]')// uses button component
            ->seeElement('input[id]')
                ->seeElement('input[id]')
                ->seeElement('input[id]')
                ->seeElement('input[id]')
                ->seeElement('input[id]')
                ->seeElement('input[id]')
                ->seeElement('input[id]')
                ->seeElement('input[id]')
                ->seeElement('input[id]')
                ->seeElement('input[id]')
                ->seeElement('input[id]')
                ->seeElement('input[id]')
                ->seeElement('input[id]')
                ->seeElement('button[id]')// uses button component
                ->seeElement('input[id]')
                ->seeElement('button[id]')// uses button component
                ->seeElement('input[id]')
                ->seeElement('input[id]')
                ->seeElement('input[id]')
                ->seeElement('input[id]')
                ->seeElement('input[id]');
        });
});

it('sets classes', function () {
    $this->registerTestRoute('bootstrap-input');

    // reusing form "form-type-attribute"
    $this->visit('bootstrap-input')
        ->within('#form-type-attribute', function() {
            $this->seeElement('button[name="button"].btn')// uses button component
                ->seeElement('input[name="checkbox"].form-check-input')
                ->seeElement('input[name="color"].form-control')
                ->seeElement('input[name="date"].form-control')
                ->seeElement('input[name="datetime-local"].form-control')
                ->seeElement('input[name="email"].form-control')
                ->seeElement('input[name="file"].form-control')
                ->seeElement('input[name="hidden"].form-control')
                ->seeElement('input[name="image"].form-control')
                ->seeElement('input[name="month"].form-control')
                ->seeElement('input[name="number"].form-control')
                ->seeElement('input[name="password"].form-control')
                ->seeElement('input[name="radio"].form-check-input')
                ->seeElement('input[name="range"].form-range')
                ->seeElement('button[name="reset"].btn')// uses button component
                ->seeElement('input[name="search"].form-control')
                ->seeElement('button[name="submit"].btn')// uses button component
                ->seeElement('input[name="tel"].form-control')
                ->seeElement('input[name="text"].form-control')
                ->seeElement('input[name="time"].form-control')
                ->seeElement('input[name="url"].form-control')
                ->seeElement('input[name="week"].form-control');
        });
});

it('sets extra attributes', function () {
    $this->registerTestRoute('bootstrap-input');

    $this->visit('/bootstrap-input')
        ->within('#form-input-extra-attributes', function() {
            return $this->seeElement('button[name="button"][id="button"][disabled][value="test value"]:not([required]):not([readonly])')// uses button component
                ->seeElement('input[name="checkbox"][type="checkbox"][id="checkbox"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="color"][type="color"][id="color"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="date"][type="date"][id="date"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="datetime-local"][type="datetime-local"][id="datetime-local"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="email"][type="email"][id="email"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="file"][type="file"][id="file"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="hidden"][type="hidden"][id="hidden"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="image"][type="image"][id="image"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="month"][type="month"][id="month"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="number"][type="number"][id="number"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="password"][type="password"][id="password"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="radio"][type="radio"][id="radio"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="range"][type="range"][id="range"][required][readonly][disabled][value="test value"]')
                ->seeElement('button[name="reset"][type="reset"][id="reset"][disabled][value="test value"]:not([required]):not([readonly])')// uses button component
                ->seeElement('input[name="search"][type="search"][id="search"][required][readonly][disabled][value="test value"]')
                ->seeElement('button[name="submit"][type="submit"][id="submit"][disabled][value="test value"]:not([required]):not([readonly])')// uses button component
                ->seeElement('input[name="tel"][type="tel"][id="tel"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="text"][type="text"][id="text"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="time"][type="time"][id="time"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="url"][type="url"][id="url"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="week"][type="week"][id="week"][required][readonly][disabled][value="test value"]');
        });
});

it('sets extra classes', function () {
    $this->registerTestRoute('bootstrap-input');

    $this->visit('/bootstrap-input')
        ->within('#form-input-extra-classes', function() {
            return $this->seeElement('button[name="button"].extra-1.extra-2.form-control-sm')// uses button component
                ->seeElement('button[name="button"].extra-1.extra-2.form-control-sm')// uses button component
                ->seeElement('input[name="checkbox"].extra-1.extra-2.form-control-sm')
                ->seeElement('input[name="color"].extra-1.extra-2.form-control-sm')
                ->seeElement('input[name="date"].extra-1.extra-2.form-control-sm')
                ->seeElement('input[name="datetime-local"].extra-1.extra-2.form-control-sm')
                ->seeElement('input[name="email"].extra-1.extra-2.form-control-sm')
                ->seeElement('input[name="file"].extra-1.extra-2.form-control-sm')
                ->seeElement('input[name="hidden"].extra-1.extra-2.form-control-sm')
                ->seeElement('input[name="image"].extra-1.extra-2.form-control-sm')
                ->seeElement('input[name="month"].extra-1.extra-2.form-control-sm')
                ->seeElement('input[name="number"].extra-1.extra-2.form-control-sm')
                ->seeElement('input[name="password"].extra-1.extra-2.form-control-sm')
                ->seeElement('input[name="radio"].extra-1.extra-2.form-control-sm')
                ->seeElement('input[name="range"].extra-1.extra-2.form-control-sm')
                ->seeElement('button[name="reset"].extra-1.extra-2.form-control-sm')// uses button component
                ->seeElement('button[name="reset"].extra-1.extra-2.form-control-sm')// uses button component
                ->seeElement('input[name="search"].extra-1.extra-2.form-control-sm')
                ->seeElement('button[name="submit"].extra-1.extra-2.form-control-sm')// uses button component
                ->seeElement('button[name="submit"].extra-1.extra-2.form-control-sm')// uses button component
                ->seeElement('input[name="tel"].extra-1.extra-2.form-control-sm')
                ->seeElement('input[name="text"].extra-1.extra-2.form-control-sm')
                ->seeElement('input[name="time"].extra-1.extra-2.form-control-sm')
                ->seeElement('input[name="url"].extra-1.extra-2.form-control-sm')
                ->seeElement('input[name="week"].extra-1.extra-2.form-control-sm');
        });
});

it('sets a default value', function () {
    $this->registerTestRoute('bootstrap-input');

    $this->visit('/bootstrap-input')
        ->within('#form-input-default', function() {
            $this->seeElement('input[name="input"][value="a"]');
        });
});

it('does not render label when hidden', function () {
    $this->registerTestRoute('bootstrap-input');

    $this->visit('/bootstrap-input')
        ->within('#form-hidden-controls', function() {
            return $this->seeElement('input') // always make sure node list is not empty when only using dontSeeElement
                ->dontSeeElement('label[for="checkbox"]')
                ->dontSeeElement('label[for="color"]')
                ->dontSeeElement('label[for="date"]')
                ->dontSeeElement('label[for="datetime-local"]')
                ->dontSeeElement('label[for="email"]')
                ->dontSeeElement('label[for="file"]')
                ->dontSeeElement('label[for="hidden"]')
                ->dontSeeElement('label[for="image"]')
                ->dontSeeElement('label[for="month"]')
                ->dontSeeElement('label[for="number"]')
                ->dontSeeElement('label[for="password"]')
                ->dontSeeElement('label[for="radio"]')
                ->dontSeeElement('label[for="range"]')
                ->dontSeeElement('label[for="search"]')
                ->dontSeeElement('label[for="tel"]')
                ->dontSeeElement('label[for="text"]')
                ->dontSeeElement('label[for="time"]')
                ->dontSeeElement('label[for="url"]')
                ->dontSeeElement('label[for="week"]');
        });
});

it('honors use_wrapper_classes when set to true', function () {
    Config::set('form-components.use_wrapper_classes', true);

    $this->registerTestRoute('bootstrap-input');

    $this->visit('/bootstrap-input')
        ->within('#form-wrapper-classes', function() {
            $this->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="checkbox"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="color"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="date"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="datetime-local"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="email"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="file"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="hidden"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="image"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="month"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="number"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="password"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="radio"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="range"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="search"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="tel"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="text"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="time"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="url"].form-control-lg.some-other-class')
                ->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 input[name="week"].form-control-lg.some-other-class');
        });
});

it('honors use_wrapper_classes when set to false', function () {
    Config::set('form-components.use_wrapper_classes', false);

    $this->registerTestRoute('bootstrap-input');

    $this->visit('/bootstrap-input')
        ->within('#form-wrapper-classes', function() {
            $this->seeElement('input[name="checkbox"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="color"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="date"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="datetime-local"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="email"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="file"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="hidden"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="image"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="month"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="number"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="password"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="radio"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="range"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="search"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="tel"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="text"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="time"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="url"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3')
                ->seeElement('input[name="week"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3');
        });

        Config::set('form-components.use_wrapper_classes', true);

});

it('uses old value after submit', function () {
    $this->registerTestRoute('bootstrap-input', function (Request $request) {
        $request->validate([
            'text-validation' => 'required|in:abc',
            'tel-validation' => 'required|in:123',
            'checkbox-validation' => 'required',
            'radio-validation' => 'required',
        ]);
    });

    $this->visit('/bootstrap-input')
        ->type('abc', 'text-validation')
        ->type('123', 'tel-validation')
//        ->check('checkbox-validation')
//        ->check('radio-validation')
        ->press('Send')
        ->within('#form-input-validation', function() {
            $this->seeElement('input[name="text-validation"][value="abc"]')
            ->seeElement('input[name="tel-validation"][value="123"]');
//            ->seeElement('input[name="checkbox-validation"]:checked')
//            ->seeElement('input[name="radio-validation"]:checked');
        });
});

// sample of inputs are checked
it('shows a validation error', function () {
    $this->registerTestRoute('bootstrap-input', function (Request $request) {
        $request->validate([
            'text' => 'required',
            'tel' => 'required',
            'checkbox' => 'required',
            'radio' => 'required',
        ]);
    });

    $this->visit('/bootstrap-input')
        ->within('#form-input-validation-error', function() {
            $this->press('Send')
                ->within('#form-input-validation-error', function() {
//                    $this->seeElement('quote');
                    $this->seeElement('input[name="text"]')
                        ->seeElement('input[name="text"] ~ div.invalid-feedback')
                        ->seeInElement('input[name="text"] ~ div.invalid-feedback', 'The text field is required')
                        ->seeElement('input[name="tel"]')
                        ->seeElement('input[name="tel"] ~ div.invalid-feedback')
                        ->seeInElement('input[name="tel"] ~ div.invalid-feedback', 'The tel field is required')
                        ->seeElement('input[name="checkbox"]')
                        ->seeElement('input[name="checkbox"] ~ div.invalid-feedback')
                        ->seeInElement('input[name="checkbox"] ~ div.invalid-feedback', 'The checkbox field is required')
                        ->seeElement('input[name="radio"]')
                        ->seeElement('input[name="radio"] ~ div.invalid-feedback')
                        ->seeInElement('input[name="radio"] ~ div.invalid-feedback', 'The radio field is required');
                });
        });
});

it('sets label of button by using value attribute', function () {
    $this->registerTestRoute('bootstrap-input');

    $this->visit('/bootstrap-input')
        ->within('#form-button-label-by-value-attribute', function() {
            return $this->seeInElement('button[name="button"]', 'button label')// uses button component
            ->seeInElement('button[name="reset"]', 'button label')// uses button component
            ->seeInElement('button[name="submit"]', 'button label');// uses button component
        });
});

it('does have help text when "help-text" attribute present', function () {
    $this->registerTestRoute('bootstrap-input');

    $this->visit('/bootstrap-input')
        ->within('#form-input-help-text', function() {
//            $this->seeElement('div.form-text[id="button"]')// uses button component
            $this->seeElement('div.form-text[id="checkbox-help-text"]')
                ->seeElement('div.form-text[id="color-help-text"]')
                ->seeElement('div.form-text[id="date-help-text"]')
                ->seeElement('div.form-text[id="datetime-local-help-text"]')
                ->seeElement('div.form-text[id="email-help-text"]')
                ->seeElement('div.form-text[id="file-help-text"]')
//                ->dontSeeElement('div.form-text[id="hidden-help-text"]')
                ->seeElement('div.form-text[id="image-help-text"]')
                ->seeElement('div.form-text[id="month-help-text"]')
                ->seeElement('div.form-text[id="number-help-text"]')
                ->seeElement('div.form-text[id="password-help-text"]')
                ->seeElement('div.form-text[id="radio-help-text"]')
                ->seeElement('div.form-text[id="range-help-text"]')
//                ->seeElement('div.form-text[id="reset-help-text"]')
                ->seeElement('div.form-text[id="search-help-text"]')
//                ->seeElement('div.form-text[id="submit-help-text"]')
                ->seeElement('div.form-text[id="tel-help-text"]')
                ->seeElement('div.form-text[id="text-help-text"]')
                ->seeElement('div.form-text[id="time-help-text"]')
                ->seeElement('div.form-text[id="url-help-text"]')
                ->seeElement('div.form-text[id="week-help-text"]');
        });
});

it('does have help text when @slot("help") attribute present', function () {
    $this->registerTestRoute('bootstrap-input');

    $this->visit('/bootstrap-input')
        ->within('#form-help-slot', function() {
//            $this->seeElement('div.form-text[id="button"]')// uses button component
            $this->seeElement('div.form-text[id="checkbox-help-text"]')
                ->seeElement('div.form-text[id="color-help-text"]')
                ->seeElement('div.form-text[id="date-help-text"]')
                ->seeElement('div.form-text[id="datetime-local-help-text"]')
                ->seeElement('div.form-text[id="email-help-text"]')
                ->seeElement('div.form-text[id="file-help-text"]')
                ->dontSeeElement('div.form-text[id="hidden-help-text"]')
                ->seeElement('div.form-text[id="image-help-text"]')
                ->seeElement('div.form-text[id="month-help-text"]')
                ->seeElement('div.form-text[id="number-help-text"]')
                ->seeElement('div.form-text[id="password-help-text"]')
                ->seeElement('div.form-text[id="radio-help-text"]')
                ->seeElement('div.form-text[id="range-help-text"]')
//                ->seeElement('div.form-text[id="reset-help-text"]')
                ->seeElement('div.form-text[id="search-help-text"]')
//                ->seeElement('div.form-text[id="submit-help-text"]')
                ->seeElement('div.form-text[id="tel-help-text"]')
                ->seeElement('div.form-text[id="text-help-text"]')
                ->seeElement('div.form-text[id="time-help-text"]')
                ->seeElement('div.form-text[id="url-help-text"]')
                ->seeElement('div.form-text[id="week-help-text"]');
        });
});

it('does not have help text when hidden', function () {
    $this->registerTestRoute('bootstrap-input');

    $this->visit('/bootstrap-input')
        ->within('#form-hidden-controls', function() {
            $this->seeElement('input') // always make sure node list is not empty when only using dontSeeElement
            ->dontSeeElement('div[id="button-1-help-text"]')// uses button component
            ->dontSeeElement('div[id="checkbox-1-help-text"]')
                ->dontSeeElement('div[id="color-1-help-text"]')
                ->dontSeeElement('div[id="date-1-help-text"]')
                ->dontSeeElement('div[id="datetime-local-1-help-text"]')
                ->dontSeeElement('div[id="email-1-help-text"]')
                ->dontSeeElement('div[id="file-1-help-text"]')
                ->dontSeeElement('div[id="hidden-1-help-text"]')
                ->dontSeeElement('div[id="image-1-help-text"]')
                ->dontSeeElement('div[id="month-1-help-text"]')
                ->dontSeeElement('div[id="number-1-help-text"]')
                ->dontSeeElement('div[id="password-1-help-text"]')
                ->dontSeeElement('div[id="radio-1-help-text"]')
                ->dontSeeElement('div[id="range-1-help-text"]')
                ->dontSeeElement('div[id="reset-1-help-text"]')
                ->dontSeeElement('div[id="search-1-help-text"]')
                ->dontSeeElement('div[id="submit-1-help-text"]')
                ->dontSeeElement('div[id="tel-1-help-text"]')
                ->dontSeeElement('div[id="text-1-help-text"]')
                ->dontSeeElement('div[id="time-1-help-text"]')
                ->dontSeeElement('div[id="url-1-help-text"]')
                ->dontSeeElement('div[id="week-1-help-text"]');
        });
});

it('does not have help text when no @slot("help") or "help-text" attribute', function () {
    $this->registerTestRoute('bootstrap-input');

    $this->visit('/bootstrap-input')
        ->within('#form-input-no-help', function() {
            $this->seeElement('input') // always make sure node list is not empty when only using dontSeeElement
            ->dontSeeElement('div[id="button-help-text"]')// uses button component
            ->dontSeeElement('div[id="checkbox-help-text"]')
                ->dontSeeElement('div[id="color-help-text"]')
                ->dontSeeElement('div[id="date-help-text"]')
                ->dontSeeElement('div[id="datetime-local-1-help-text"]')
                ->dontSeeElement('div[id="email-help-text"]')
                ->dontSeeElement('div[id="file-help-text"]')
//                ->dontSeeElement('div[id="hidden-help-text"]')
                ->dontSeeElement('div[id="image-help-text"]')
                ->dontSeeElement('div[id="month-help-text"]')
                ->dontSeeElement('div[id="number-help-text"]')
                ->dontSeeElement('div[id="password-help-text"]')
                ->dontSeeElement('div[id="radio-help-text"]')
                ->dontSeeElement('div[id="range-help-text"]')
                ->dontSeeElement('div[id="reset-help-text"]')
                ->dontSeeElement('div[id="search-help-text"]')
                ->dontSeeElement('div[id="submit-help-text"]')
                ->dontSeeElement('div[id="tel-help-text"]')
                ->dontSeeElement('div[id="text-help-text"]')
                ->dontSeeElement('div[id="time-help-text"]')
                ->dontSeeElement('div[id="url-help-text"]')
                ->dontSeeElement('div[id="week-help-text"]');
        });
});

it('sets type to "text" when no type provided to input', function () {
    $this->registerTestRoute('bootstrap-input');

    $this->visit('/bootstrap-input')
        ->within('#form-defaults-to-text', function() {
            return $this->seeElement('input[name="input-text-1"][type="text"]');
        });
});

it('honors type attribute', function () {
    $this->registerTestRoute('bootstrap-input');

    $this->visit('/bootstrap-input')
        ->within('#form-type-attribute', function() {
            $this->seeElement('button[name="button"][type="button"]')// uses button component
            ->seeElement('input[name="checkbox"][type="checkbox"]')
                ->seeElement('input[name="color"][type="color"]')
                ->seeElement('input[name="date"][type="date"]')
                ->seeElement('input[name="datetime-local"][type="datetime-local"]')
                ->seeElement('input[name="email"][type="email"]')
                ->seeElement('input[name="file"][type="file"]')
                ->seeElement('input[name="hidden"][type="hidden"]')
                ->seeElement('input[name="image"][type="image"]')
                ->seeElement('input[name="month"][type="month"]')
                ->seeElement('input[name="number"][type="number"]')
                ->seeElement('input[name="password"][type="password"]')
                ->seeElement('input[name="radio"][type="radio"]')
                ->seeElement('input[name="range"][type="range"]')
                ->seeElement('button[name="reset"][type="reset"]')// uses button component
                ->seeElement('input[name="search"][type="search"]')
                ->seeElement('button[name="submit"][type="submit"]')// uses button component
                ->seeElement('input[name="tel"][type="tel"]')
                ->seeElement('input[name="text"][type="text"]')
                ->seeElement('input[name="time"][type="time"]')
                ->seeElement('input[name="url"][type="url"]')
                ->seeElement('input[name="week"][type="week"]');
        });
});

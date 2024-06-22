<?php

use Illuminate\Http\Request;

it('shows slot when no options attribute provided', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-1', function() {
            $this->seeElement('option[value="a"]')
                ->seeElement('option[value="b"]')
                ->seeElement('option[value="c"]');
        });
});

it('can render a placeholder', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-2', function() {
            $this->seeElement('option[value=""][selected="selected"]')
                ->seeElement('option[value="a"]')
                ->seeElement('option[value="b"]');
        });
});

it('always has an id attribute', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-1', function() {
            $this->seeElement('select[name="select"][id]');
        });

});

it('does not render label when select is hidden', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-3', function() {
            $this->dontSeeElement('label[for="hidden-select"]')
                ->seeElement('label[for="non-hidden-select"]');
        });

});

it('honors use_wrapper_classes when set to true', function () {
    Config::set('form-components.use_wrapper_classes', true);

    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-4', function() {
            $this->seeElement('div.mx-3.my-3.ms-3.mt-3.me-3.mb-3 select[name="select"].form-control-lg.some-other-class');

        });
});

it('honors use_wrapper_classes when set to false', function () {
    Config::set('form-components.use_wrapper_classes', false);

    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-4', function() {
            $this->seeElement('select[name="select"].form-control-lg.some-other-class.mx-3.my-3.ms-3.mt-3.me-3.mb-3');
        });

    Config::set('form-components.use_wrapper_classes', true);

});

it('selects a boolean value using bind', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-5', function() {
            $this->seeElement('option[value="1"]')
                ->seeElement('option[value="0"][selected="selected"]');
        });

});

it('sets a default value', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-default', function() {
            $this->seeElement('option[value="c"]:selected');
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

it('shows a validation error', function () {
    $this->registerTestRoute('bootstrap-select', function (Request $request) {
        $request->validate([
            'select' => 'required|in:0,1',
        ]);
    });

    $this->visit('/bootstrap-select')
        ->within('#form-select-without-keys', function() {
            $this->select('2', 'select')
                ->press('Send')
                ->within('#form-select-without-keys', function() {
                    $this->seeElement('option[value="0"]:not(:selected)')
                        ->seeElement('option[value="1"]:not(:selected)')
                        ->seeElement('option[value="2"]:selected');
                });
        });

});

it('does not have help text when no @slot("help") or "help-text" attribute', function () {
    $this->registerTestRoute('bootstrap-select');

    $this->visit('/bootstrap-select')
        ->within('#form-4', function() {
            $this->dontSeeElement('div[id="select-help-text"]');
        });
});

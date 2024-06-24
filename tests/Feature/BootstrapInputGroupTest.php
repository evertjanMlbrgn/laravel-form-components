<?php

// NOTE cannot put the test in 1 file, somehow seeElementCount doesn't work correctly within "within"
it('adds custom input classes', function () {
    $this->registerTestRoute('bootstrap-input-group-1');

    $this->visit('/bootstrap-input-group-1')
        ->within('#input-group-1', function() {
            return $this->seeElement('.form-control-color', ['value' => '#000000'])
                ->seeElementCount('.form-switch', 1)
                ->seeElement('.form-range', ['type' => 'range']);
        });

});

// NOTE cannot put the test in 1 file, somehow seeElementCount doesn't work correctly within "within"
it('groups elements with input-group', function () {
    $this->registerTestRoute('bootstrap-input-group-2');

    $this->visit('/bootstrap-input-group-2')
        ->within('#input-group-2', function () {
        return $this->seeElementCount('.form-control', 2)
        ->seeElementCount('.input-group-text', 1)
        ->seeInElement('.input-group-text', '@');
    });
});

it('does not have help text when no @slot("help") or "help-text" attribute', function () {
    $this->registerTestRoute('bootstrap-input-group-1');

    $this->visit('/bootstrap-input-group-1')
        ->within('#input-group-1-form', function() {
            $this->dontSeeElement('div.form-text');
        });
});

it('does have help text when "help-text" attribute present', function () {
    $this->registerTestRoute('bootstrap-input-group-2');

    $this->visit('/bootstrap-input-group-2')
        ->within('#input-group-2-form', function() {
            $this->seeElement('div.form-text')
                ->seeInElement('div.form-text', 'help text');
        });
});

it('does have help text when @slot("help") attribute present', function () {
    $this->registerTestRoute('bootstrap-input-group-3');

    $this->visit('/bootstrap-input-group-3')
        ->within('#input-group-3-form', function() {
            $this->seeElement('div.form-text')
            ->seeInElement('div.form-text', 'slot help text');
        });
});

it('hides input group when hidden attribute present', function () {
    $this->registerTestRoute('bootstrap-input-group-4');

    $this->visit('/bootstrap-input-group-4')
        ->within('#input-group-4-form', function() {
            $this->seeElement('div.d-none > div.input-group');
        });
});



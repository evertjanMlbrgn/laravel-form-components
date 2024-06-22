<?php

use Illuminate\Http\Request;

it('can have no target bound to the form', function () {
    $this->registerTestRoute('translation');

    $this->visit('/translation')
        ->seeElement('input[name="input[nl]"][value=""]')
        ->seeElement('input[name="input[en]"][value=""]');
});

it('can bind a target to the form', function () {
    $this->registerTestRoute('translation-with-bind');

    $this->visit('/translation-with-bind')
        ->seeElement('input[name="input[nl]"][value="hallo"]')
        ->seeElement('input[name="input[en]"][value="hello"]');
});

it('can override the bind with a different target', function () {
    $this->registerTestRoute('translation-with-bind');

    $this->visit('/translation-with-bind')
        ->seeElement('input[name="output[nl]"][value="vaarwel"]')
        ->seeElement('input[name="output[en]"][value="goodbye"]');
});

it('shows the validation errors and old values correctly', function () {
    $this->registerTestRoute('translation-with-bind', function (Request $request) {
        $request->validate([
            'input.*' => 'min:5',
        ]);
    });

    $this->visit('/translation-with-bind')
        ->type('hoi', 'input[nl]')
        ->type('hey', 'input[en]')
        ->press('Send')
        ->seeElement('input[name="input[nl]"][value="hoi"]')
        ->seeElement('input[name="input[en]"][value="hey"]')
        ->seeText(static::isLaravel10() ? 'The input.nl field must be at least 5 characters' : 'The input.nl must be at least 5 characters')
        ->seeText(static::isLaravel10() ? 'The input.en field must be at least 5 characters' : 'The input.en must be at least 5 characters');
});

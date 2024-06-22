<?php

use Illuminate\Http\Request;

it('posts all selected options', function () {
    $this->registerTestRoute('multiple-select-keys', function (Request $request) {
        $request->validate([
            'select' => 'required|string',
        ]);
    });

    $this->visit('/multiple-select-keys?both=yes')
        ->seeElement('option[value="be"]:selected')
        ->seeElement('option[value="nl"]:selected')
        ->press('Send')
        ->seeElement('option[value="be"]:selected')
        ->seeElement('option[value="nl"]:selected')
        ->seeText(static::isLaravel10() ? 'The select field must be a string.' : 'The select must be a string.');
});

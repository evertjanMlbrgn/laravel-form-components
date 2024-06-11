<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);
use Illuminate\Http\Request;

it('makes the values numeric', function () {
    $this->registerTestRoute('select-without-keys', function (Request $request) {
        $request->validate([
            'select' => 'required|in:a,b',
        ]);
    });

    $this->visit('/select-without-keys')
        ->seeInElement('option[value="0"]', 'a')
        ->seeInElement('option[value="1"]', 'b')
        ->seeInElement('option[value="2"]', 'c');
});

it('shows a validation error', function () {
    $this->registerTestRoute('select-without-keys', function (Request $request) {
        $request->validate([
            'select' => 'required|in:0,1',
        ]);
    });

    $this->visit('/select-without-keys')
        ->select('2', 'select')
        ->press('Submit')
        ->seeElement('option[value="0"]:not(:selected)')
        ->seeElement('option[value="1"]:not(:selected)')
        ->seeElement('option[value="2"]:selected');
});

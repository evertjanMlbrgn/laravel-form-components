<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);
beforeEach(function () {
    if (config('form-components.framework') !== 'bootstrap-5') {
        $this->markTestSkipped('Other framework configured');
    }
});

it('can group elements', function () {
    $this->registerTestRoute('bootstrap-input-group');

    $this->visit('/bootstrap-input-group')
        ->within('.input-group', function () {
            return $this->seeElementCount('.form-control', 2)
                ->seeElementCount('.input-group-text', 1)
                ->seeInElement('.input-group-text', '@');
        });
});

it('can float labels', function () {
    $this->registerTestRoute('bootstrap-floating-label');

    $this->visit('/bootstrap-floating-label')
        ->seeElementCount('label', 2)
        ->seeInElement('label', 'Your Name')
        ->seeElement('#name1', ['placeholder' => ' '])
        ->seeElement('#name2', ['placeholder' => 'John Doe']);
});

it('can add custom input classes', function () {
    $this->registerTestRoute('bootstrap-custom-input');

    $this->visit('/bootstrap-custom-input')
        ->seeElement('.form-control-color', ['value' => '#000000'])
        ->seeElementCount('.form-switch', 1) // fails
        ->seeElement('.form-range', ['type' => 'range']);
});

it('does show required asterisk when field required', function () {
    $this->registerTestRoute('bootstrap-required');

    $this->visit('/bootstrap-required')
        ->seeElement('div.input-required label.required')
        ->seeElement('div.input-not-required label');
//        ->seeElementCount('.form-switch', 1) // fails
//        ->seeElement('.form-range', ['type' => 'range']);
});


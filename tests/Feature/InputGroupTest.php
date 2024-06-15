<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);
beforeEach(function () {
    if (config('form-components.framework') !== 'bootstrap-5') {
        $this->markTestSkipped('Other framework configured');
    }
});

it('adds custom input classes', function () {
    $this->registerTestRoute('bootstrap-input-group-1');

    $this->visit('/bootstrap-input-group-1')
        ->within('#input-group-1', function() {
            return $this->seeElement('.form-control-color', ['value' => '#000000'])
                ->seeElementCount('.form-switch', 1) // fails
                ->seeElement('.form-range', ['type' => 'range']);
        });

});

it('groups elements with input-group', function () {
    $this->registerTestRoute('bootstrap-input-group-2');

    $this->visit('/bootstrap-input-group-2')
        ->within('#input-group-2', function () {
        return $this->seeElementCount('.form-control', 2)
        ->seeElementCount('.input-group-text', 1)
        ->seeInElement('.input-group-text', '@');
    });
});


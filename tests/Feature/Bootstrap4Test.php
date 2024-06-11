<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);
beforeEach(function () {
    if (config('form-components.framework') !== 'bootstrap-4') {
        $this->markTestSkipped('Other framework configured');
    }
});

it('can append to an input', function () {
    $this->registerTestRoute('bootstrap-append');

    $this->visit('/bootstrap-append')
        ->seeInElement('.input-group-text', '.protone.media');
});

it('can prepend to an input', function () {
    $this->registerTestRoute('bootstrap-prepend');

    $this->visit('/bootstrap-prepend')
        ->seeInElement('.input-group-text', 'info@');
});

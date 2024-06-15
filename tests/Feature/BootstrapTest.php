<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);
beforeEach(function () {
    if (! in_array(config('form-components.framework'), ['bootstrap-4', 'bootstrap-5'])) {
        $this->markTestSkipped('Other framework configured');
    }
});

it('adds help text', function () {
    $this->registerTestRoute('bootstrap-help');

    $this->visit('/bootstrap-help')
        ->seeInElement('.form-text', 'Your username must be 8-20 characters long.');
});

it('sets the id on the label or generates one', function () {
    $this->registerTestRoute('bootstrap-label-for');

    $page = $this->visit('/bootstrap-label-for')
        ->seeElement('textarea[id="text_b"]')
        ->seeElement('label[for="text_b"]');

    $inputId = $page->crawler()->filter('input[type="text"]')->attr('id');

    expect($inputId)->toStartWith("auto_id_");

    $page
        ->seeElement('input[id="' . $inputId . '"]')
        ->seeElement('label[for="' . $inputId . '"]');
});

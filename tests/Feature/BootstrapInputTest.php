<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);

it('sets type to "text" when no type provided to input', function () {
    $this->registerTestRoute('bootstrap-inputs');

    $this->visit('/bootstrap-inputs')
        ->within('#form-1', function() {
            return $this->seeElement('input[name="input-text-1"][type="text"]');
        });
});

it('honors type attribute', function () {
    $this->registerTestRoute('bootstrap-inputs');

    $this->visit('/bootstrap-inputs')
        ->within('#form-2', function() {
            return $this->seeElement('input[name="button"][type="button"]')
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
                ->seeElement('input[name="reset"][type="reset"]')
                ->seeElement('input[name="search"][type="search"]')
                ->seeElement('input[name="submit"][type="submit"]')
                ->seeElement('input[name="tel"][type="tel"]')
                ->seeElement('input[name="text"][type="text"]')
                ->seeElement('input[name="time"][type="time"]')
                ->seeElement('input[name="url"][type="url"]')
                ->seeElement('input[name="week"][type="week"]');
        });
});

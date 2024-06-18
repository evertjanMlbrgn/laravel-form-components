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
            return $this->seeElement('button[name="button"][type="button"]')// uses button component
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
                ->seeElement('button[name="reset"][type="reset"]')// uses button component
                ->seeElement('input[name="search"][type="search"]')
                ->seeElement('button[name="submit"][type="submit"]')// uses button component
                ->seeElement('input[name="tel"][type="tel"]')
                ->seeElement('input[name="text"][type="text"]')
                ->seeElement('input[name="time"][type="time"]')
                ->seeElement('input[name="url"][type="url"]')
                ->seeElement('input[name="week"][type="week"]');
        });
});

it('honors extra attributes', function () {
    $this->registerTestRoute('bootstrap-inputs');

    $this->visit('/bootstrap-inputs')
        ->within('#form-3', function() {
            return $this->seeElement('button[name="button"][id="button"][disabled][value="test value"]:not([required]):not([readonly])')// uses button component
                ->seeElement('input[name="checkbox"][type="checkbox"][id="checkbox"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="color"][type="color"][id="color"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="date"][type="date"][id="date"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="datetime-local"][type="datetime-local"][id="datetime-local"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="email"][type="email"][id="email"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="file"][type="file"][id="file"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="hidden"][type="hidden"][id="hidden"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="image"][type="image"][id="image"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="month"][type="month"][id="month"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="number"][type="number"][id="number"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="password"][type="password"][id="password"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="radio"][type="radio"][id="radio"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="range"][type="range"][id="range"][required][readonly][disabled][value="test value"]')
                ->seeElement('button[name="reset"][type="reset"][id="reset"][disabled][value="test value"]:not([required]):not([readonly])')// uses button component
                ->seeElement('input[name="search"][type="search"][id="search"][required][readonly][disabled][value="test value"]')
                ->seeElement('button[name="submit"][type="submit"][id="submit"][disabled][value="test value"]:not([required]):not([readonly])')// uses button component
                ->seeElement('input[name="tel"][type="tel"][id="tel"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="text"][type="text"][id="text"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="time"][type="time"][id="time"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="url"][type="url"][id="url"][required][readonly][disabled][value="test value"]')
                ->seeElement('input[name="week"][type="week"][id="week"][required][readonly][disabled][value="test value"]');
        });
});

it('honors extra classes', function () {
    $this->registerTestRoute('bootstrap-inputs');

    $this->visit('/bootstrap-inputs')
        ->within('#form-4', function() {
            return $this->seeElement('button[name="button"].extra-1.extra-2')// uses button component
                ->seeElement('button[name="button"].extra-1.extra-2')// uses button component
                ->seeElement('input[name="checkbox"].extra-1.extra-2')
                ->seeElement('input[name="color"].extra-1.extra-2')
                ->seeElement('input[name="date"].extra-1.extra-2')
                ->seeElement('input[name="datetime-local"].extra-1.extra-2')
                ->seeElement('input[name="email"].extra-1.extra-2')
                ->seeElement('input[name="file"].extra-1.extra-2')
                ->seeElement('input[name="hidden"].extra-1.extra-2')
                ->seeElement('input[name="image"].extra-1.extra-2')
                ->seeElement('input[name="month"].extra-1.extra-2')
                ->seeElement('input[name="number"].extra-1.extra-2')
                ->seeElement('input[name="password"].extra-1.extra-2')
                ->seeElement('input[name="radio"].extra-1.extra-2')
                ->seeElement('input[name="range"].extra-1.extra-2')
                ->seeElement('button[name="reset"].extra-1.extra-2')// uses button component
                ->seeElement('button[name="reset"].extra-1.extra-2')// uses button component
                ->seeElement('input[name="search"].extra-1.extra-2')
                ->seeElement('button[name="submit"].extra-1.extra-2')// uses button component
                ->seeElement('button[name="submit"].extra-1.extra-2')// uses button component
                ->seeElement('input[name="tel"].extra-1.extra-2')
                ->seeElement('input[name="text"].extra-1.extra-2')
                ->seeElement('input[name="time"].extra-1.extra-2')
                ->seeElement('input[name="url"].extra-1.extra-2')
                ->seeElement('input[name="week"].extra-1.extra-2');
        });
});

it('always has an id attribute', function () {
    $this->registerTestRoute('bootstrap-inputs');

    $this->visit('/bootstrap-inputs')
        ->within('#form-4', function() {
            return $this->seeElement('button[name="button"][id]')// uses button component
            ->seeElement('button[name="button"][id]')// uses button component
            ->seeElement('input[name="checkbox"][id]')
                ->seeElement('input[name="color"][id]')
                ->seeElement('input[name="date"][id]')
                ->seeElement('input[name="datetime-local"][id]')
                ->seeElement('input[name="email"][id]')
                ->seeElement('input[name="file"][id]')
                ->seeElement('input[name="hidden"][id]')
                ->seeElement('input[name="image"][id]')
                ->seeElement('input[name="month"][id]')
                ->seeElement('input[name="number"][id]')
                ->seeElement('input[name="password"][id]')
                ->seeElement('input[name="radio"][id]')
                ->seeElement('input[name="range"][id]')
                ->seeElement('button[name="reset"][id]')// uses button component
                ->seeElement('button[name="reset"][id]')// uses button component
                ->seeElement('input[name="search"][id]')
                ->seeElement('button[name="submit"][id]')// uses button component
                ->seeElement('button[name="submit"][id]')// uses button component
                ->seeElement('input[name="tel"][id]')
                ->seeElement('input[name="text"][id]')
                ->seeElement('input[name="time"][id]')
                ->seeElement('input[name="url"][id]')
                ->seeElement('input[name="week"][id]');
        });
});

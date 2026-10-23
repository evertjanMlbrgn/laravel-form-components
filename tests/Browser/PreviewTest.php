<?php

use Mlbrgn\LaravelFormComponents\Tests\BrowserTestCase;
use function Pest\Laravel\get;

uses(BrowserTestCase::class);

it('loads the preview page', function () {
    $this->visit('/form-components-preview')
        ->assertSee('Form Components Preview')
        ->assertSee('Overview');
});

it('initializes TinyMCE', function () {
    $this->visit('/form-components-preview')
        ->waitFor('.tox-tinymce', 5);
})->skip('Requires Playwright to be installed in CI');

it('triggers client-side validation', function () {
    $this->visit('/form-components-preview')
        ->press('Submit form')
        ->waitFor('.invalid-feedback', 5)
        ->assertSee('Please provide a valid city.');
})->skip('Requires Playwright to be installed in CI');

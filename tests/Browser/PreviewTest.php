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
        ->assertPresent('.tox-tinymce');
});

it('triggers client-side validation', function () {
    $this->visit('/form-components-preview')
        ->press('Submit form')
        ->assertSee('Please provide a valid city.');
});

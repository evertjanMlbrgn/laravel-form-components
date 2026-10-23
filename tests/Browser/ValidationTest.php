<?php

use Mlbrgn\LaravelFormComponents\Tests\BrowserTestCase;

it('shows server-side validation errors', function () {
    $this->visit('/form-components-preview')
        ->press('Register')
        ->assertSee('The reg email field is required.')
        ->assertSee('The reg password field is required.');
});

it('triggers client-side validation for Bootstrap 5 example', function () {
    $this->visit('/form-components-preview')
        ->press('Submit form') // This hits the first "Submit form" button on the page, which is the client-side one
        ->assertSee('Please provide a valid city.')
        ->assertSee('Please select a valid state.')
        ->assertSee('You must agree before submitting.');
});

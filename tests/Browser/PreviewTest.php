<?php

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

it('can submit the real world registration form', function () {
    $this->visit('/form-components-preview')
        ->type('reg_email', 'test@example.com')
        ->type('reg_password', 'password123')
        ->type('reg_city', 'Amsterdam')
        ->select('reg_state', 'ny')
        ->type('reg_zip', '12345')
        ->check('regCheck')
        ->press('Register')
        ->assertSee('Form Submitted Successfully!')
        ->assertSee('test@example.com');
});

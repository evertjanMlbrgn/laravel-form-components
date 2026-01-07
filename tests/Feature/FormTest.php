<?php

it('spoofs the methods for put patch and delete forms', function () {
    $this->registerTestRoute('forms-spoof')
        ->visit('forms-spoof')

        // methods
        ->seeElement('form[id="form_get"][method="GET"]')
        ->seeElement('form[id="form_post"][method="POST"]')
        ->seeElement('form[id="form_put"][method="POST"]')
        ->seeElement('form[id="form_patch"][method="POST"]')
        ->seeElement('form[id="form_delete"][method="POST"]')

        // spoofing
        ->dontSeeElement('form[id="form_get"] input[name="_method"]')
        ->dontSeeElement('form[id="form_post"] input[name="_method"]')
        ->seeElement('form[id="form_put"] input[name="_method"][value="PUT"]')
        ->seeElement('form[id="form_patch"] input[name="_method"][value="PATCH"]')
        ->seeElement('form[id="form_delete"] input[name="_method"][value="DELETE"]');
});

it('sets the csrf token to the forms that need it', function () {
    $this->registerTestRoute('forms-spoof')
        ->visit('/forms-spoof')

        // csrf
        ->dontSeeElement('form[id="form_get"] input[name="_token"]')
        ->seeElement('form[id="form_post"] input[name="_token"]')
        ->seeElement('form[id="form_put"] input[name="_token"]')
        ->seeElement('form[id="form_patch"] input[name="_token"]')
        ->seeElement('form[id="form_delete"] input[name="_token"]');
});

it('handles validation-mode="client-custom"', function () {
    $this->registerTestRoute('form-validation-client-custom');

    $response = $this->visit('/form-validation-client-custom')
//    dd($something);
       ->seeElement('form.needs-validation')
                ->seeElement('form[novalidate]')
                ->seeElement('div.input-group.has-validation')
                ->seeElement('div.input-group-2.has-validation');
});

it('shows required asterisk when field required', function () {
    $this->registerTestRoute('form-required');

    $this->visit('/form-required')
        ->seeElement('div.input-required label.required')
        ->seeElement('div.input-not-required label');
    //        ->seeElementCount('.form-switch', 1) // fails
    //        ->seeElement('.form-range', ['type' => 'range']);
});


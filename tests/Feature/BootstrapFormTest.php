<?php

it('spoofs the methods for put patch and delete forms', function () {
    $this->registerTestRoute('bootstrap-form')
        ->visit('bootstrap-form')

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
    $this->registerTestRoute('bootstrap-form')
        ->visit('/bootstrap-form')

        // csrf
        ->dontSeeElement('form[id="form_get"] input[name="_token"]')
        ->seeElement('form[id="form_post"] input[name="_token"]')
        ->seeElement('form[id="form_put"] input[name="_token"]')
        ->seeElement('form[id="form_patch"] input[name="_token"]')
        ->seeElement('form[id="form_delete"] input[name="_token"]');
});

it('handles validation-mode="custom"', function () {
    $this->registerTestRoute('bootstrap-form');

    $this->visit('/bootstrap-form')
        ->within('#form_custom_validation', function() {
            $this->seeElement('form.needs-validation')
                ->seeElement('form[novalidate]')
                ->seeElement('div.input-group.has-validation')
                ->seeElement('div.input-group-2.has-validation');
        });
});

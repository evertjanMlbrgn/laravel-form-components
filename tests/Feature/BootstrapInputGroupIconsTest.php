<?php

it('can render icons', function () {
    $this->registerTestRoute('bootstrap-input-group-icons');

    $this->visit('/bootstrap-input-group-icons')
        ->within('#form-input-group-icons', function () {
            $this->seeElement('div.input-group span.input-group-text.input-group-icon.input-group-icon-font i.bi-alarm')
                ->seeElement('div.input-group span.input-group-text.input-group-icon.input-group-icon-img img[alt=""]')
                ->seeElement('div.input-group span.input-group-text.input-group-icon.input-group-icon-svg svg')
                ->seeElement('div.input-group span.input-group-text.input-group-icon.input-group-icon-sprite svg use');
        });
});

it('sets extra classes', function () {
    $this->registerTestRoute('bootstrap-input-group-icons');

    $this->visit('/bootstrap-input-group-icons')
        ->within('#form-input-group-icons-extra-classes', function () {
            $this->seeElement('div.mb-3 div.input-group.extra-1.extra-2 span.input-group-text.input-group-icon.input-group-icon-font');
        });
});

it('supports icon-position attribute', function () {
    $this->registerTestRoute('bootstrap-input-group-icons');

    $this->visit('/bootstrap-input-group-icons')
        ->within('#form-input-group-icons-icon-position', function () {
            $this->seeElement('div div.input-group input.form-control + span.input-group-text.input-group-icon.input-group-icon-font i.bi-alarm')
                ->seeElement('div div.input-group input.form-control + span.input-group-text.input-group-icon.input-group-icon-img img[alt=""]')
                ->seeElement('div div.input-group input.form-control + span.input-group-text.input-group-icon.input-group-icon-svg svg')
                ->seeElement('div div.input-group input.form-control + span.input-group-text.input-group-icon.input-group-icon-sprite svg use');
        });
});

it('supports for attribute', function () {
    $this->registerTestRoute('bootstrap-input-group-icons');

    $this->visit('/bootstrap-input-group-icons')
        ->within('#form-input-group-icons-for', function () {
            $this->seeElement('div div.input-group input.form-control[id="input-1"] + label.input-group-text.input-group-icon.input-group-icon-font[for="input-1"] i.bi-alarm')
                ->seeElement('div div.input-group input.form-control[id="input-2"] + label.input-group-text.input-group-icon.input-group-icon-img[for="input-2"] img[alt=""]')
                ->seeElement('div div.input-group input.form-control[id="input-3"] + label.input-group-text.input-group-icon.input-group-icon-svg[for="input-3"] svg')
                ->seeElement('div div.input-group input.form-control[id="input-4"] + label.input-group-text.input-group-icon.input-group-icon-sprite[for="input-4"] svg use');
        });
});

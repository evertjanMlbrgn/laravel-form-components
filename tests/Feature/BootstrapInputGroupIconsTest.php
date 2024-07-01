<?php

it('can render icons', function() {
    $this->registerTestRoute('bootstrap-input-group-icons');

    $this->visit('/bootstrap-input-group-icons')
        ->within('#form-input-group-icons', function() {
            $this->seeElement('div.input-group label.input-group-text.input-group-icon i.bi-alarm')
            ->seeElement('div.input-group label.input-group-text.input-group-icon img[alt=""]')
            ->seeElement('div.input-group label.input-group-text.input-group-icon svg')
            ->seeElement('div.input-group label.input-group-text.input-group-icon svg use');
        });
});

it('sets extra classes', function() {
    $this->registerTestRoute('bootstrap-input-group-icons');

    $this->visit('/bootstrap-input-group-icons')
        ->within('#form-input-group-icons-extra-classes', function() {
            $this->seeElement('div.mb-3 div.input-group.extra-1.extra-2 label.input-group-text.input-group-icon');
        });
});

it('supports icon-position attribute', function() {
    $this->registerTestRoute('bootstrap-input-group-icons');

    $this->visit('/bootstrap-input-group-icons')
        ->within('#form-input-group-icons-icon-position', function() {
            $this->seeElement('div div.input-group input.form-control + label.input-group-text.input-group-icon i.bi-alarm')
            ->seeElement('div div.input-group input.form-control + label.input-group-text.input-group-icon img[alt=""]')
            ->seeElement('div div.input-group input.form-control + label.input-group-text.input-group-icon svg')
            ->seeElement('div div.input-group input.form-control + label.input-group-text.input-group-icon svg use');
        });
});

it('supports for attribute', function() {
    $this->registerTestRoute('bootstrap-input-group-icons');

    $this->visit('/bootstrap-input-group-icons')
        ->within('#form-input-group-icons-for', function() {
            $this->seeElement('div div.input-group input.form-control[id="test-input"] + label.input-group-text.input-group-icon[for="test-input"] i.bi-alarm');
        });
});

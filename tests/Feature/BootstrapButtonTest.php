<?php

it('lets buttons default to correct type', function () {
    $this->registerTestRoute('bootstrap-button');
    $this->visit('/bootstrap-button')
        ->within('#form-default-to-correct-type', function () {
            $this->seeElement('button[id="button"][type="button"].btn')
                ->seeElement('button[id="button-submit"][type="submit"].btn')
                ->seeElement('button[id="button-reset"][type="reset"].btn')
                ->seeElement('button[id="button-2"][type="button"].btn')
                ->seeElement('button[id="button-submit-2"][type="submit"].btn');
        });
});

it('sets classes', function () {
    $this->registerTestRoute('bootstrap-button');
    $this->visit('/bootstrap-button')
        ->within('#form-classes', function () {
            $this->seeElement('button[id="button"].btn.btn-my-button:not(.btn-primary)')
                ->seeElement('button[id="button-submit"][type="submit"].btn.btn-something:not(.btn-primary)')
                ->seeElement('button[id="button-reset"][type="reset"].btn.btn-something-else:not(.btn-primary)');
        });
});

it('sets extra classes', function () {
    $this->registerTestRoute('bootstrap-button');
    $this->visit('/bootstrap-button')
        ->within('#form-extra-classes', function () {
            $this->seeElement('button[id="button"].btn.btn-sm')
                ->seeElement('button[id="button-submit"][type="submit"].btn.btn-lg')
                ->seeElement('button[id="button-reset"][type="reset"].btn.btn-extra');
        });
});

it('sets extra attributes', function () {
    $this->registerTestRoute('bootstrap-button');

    $this->visit('/bootstrap-button')
        ->within('#form-extra-attributes', function () {
            $this->seeElement('button[id="button"][autofocus][disabled]')
                ->seeElement('button[id="button-submit"][formtarget="test"][value="submit value"]')
                ->seeElement('button[id="button-reset"][formnovalidate][formaction="test"]');
        });
});

it('can set label as slot', function () {
    $this->registerTestRoute('bootstrap-button');

    $this->visit('/bootstrap-button')
        ->within('#form-label-as-slot', function () {
            $this->seeInElement('button[id="button"]', 'Button 5 label')
                ->seeInElement('button[id="button-submit"]', 'Button submit 5 label')
                ->seeInElement('button[id="button-reset"]', 'Button reset 5 label');
        });
});

it('can set label as label attribute and label attribute rules over slot', function () {
    $this->registerTestRoute('bootstrap-button');

    $this->visit('/bootstrap-button')
        ->within('#form-label-as-attribute', function () {
            $this->seeInElement('button[id="button"]', 'overruled')
                ->seeInElement('button[id="button-submit"]', 'overruled')
                ->seeInElement('button[id="button-reset"]', 'overruled');
        });
});

it('does not let type of submit button be overridden', function () {
    $this->registerTestRoute('bootstrap-button');

    $this->visit('/bootstrap-button')
        ->within('#form-no-type-override', function () {
            $this->seeElement('button[id="button-submit"][type="submit"]');
        });
});

it('supports help text using attribute', function () {
    $this->registerTestRoute('bootstrap-button');
    $this->visit('bootstrap-button')
        ->within('#form-help-text-using-attribute', function () {
            $this->seeElement('button[id="button"] + div.form-text')
                ->seeInElement('button[id="button"] + div.form-text', 'help text using attribute')
                ->seeElement('button[id="button-submit"] + div.form-text')
                ->seeInElement('button[id="button-submit"] + div.form-text', 'help text using attribute')
                ->seeElement('button[id="button-reset"] + div.form-text')
                ->seeInElement('button[id="button-reset"] + div.form-text', 'help text using attribute');
        });
});

it('supports help text using slot', function () {
    $this->registerTestRoute('bootstrap-button');
    $this->visit('bootstrap-button')
        ->within('#form-help-text-using-slot', function () {
            $this->seeElement('button[id="button"] + div.form-text')
                ->seeInElement('button[id="button"] + div.form-text', 'help text using slot')
                ->seeElement('button[id="button-submit"] + div.form-text')
                ->seeInElement('button[id="button-submit"] + div.form-text', 'help text using slot')
                ->seeElement('button[id="button-reset"] + div.form-text')
                ->seeInElement('button[id="button-reset"] + div.form-text', 'help text using slot');
        });
});

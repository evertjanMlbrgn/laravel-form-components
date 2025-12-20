<?php /** @noinspection ALL */
/** @noinspection SpellCheckingInspection */

it('lets buttons default to correct type', function () {
    $this->registerTestRoute('button-no-type');
    $this->visit('/button-no-type')
        ->seeElement('button[id="button"][type="button"].btn')
        ->seeElement('button[id="button-submit"][type="submit"].btn')
        ->seeElement('button[id="button-reset"][type="reset"].btn')
        ->seeElement('button[id="button-2"][type="button"].btn')
        ->seeElement('button[id="button-submit-2"][type="submit"].btn');
});

it('sets classes', function () {
    $this->registerTestRoute('button-classes');
    $this->visit('/button-classes')
        ->seeElement('button[id="button"].btn.btn-my-button:not(.btn-primary)')
        ->seeElement('button[id="button-submit"][type="submit"].btn.btn-something:not(.btn-primary)')
        ->seeElement('button[id="button-reset"][type="reset"].btn.btn-something-else:not(.btn-primary)');

});

it('sets extra classes', function () {
    $this->registerTestRoute('button-extra-classes');
    $this->visit('/button-extra-classes')
        ->seeElement('button[id="button"].btn.btn-sm')
        ->seeElement('button[id="button-submit"][type="submit"].btn.btn-lg')
        ->seeElement('button[id="button-reset"][type="reset"].btn.btn-extra');
});

it('sets extra attributes', function () {
    $this->registerTestRoute('button-extra-attributes');

    $this->visit('/button-extra-attributes')
        ->seeElement('button[id="button"][autofocus][disabled]')
        ->seeElement('button[id="button-submit"][formtarget="test"][value="submit value"]')
        ->seeElement('button[id="button-reset"][formnovalidate][formaction="test"]');
});

it('can set label as slot', function () {
    $this->registerTestRoute('button-label-as-slot');

    $this->visit('/button-label-as-slot')
        ->seeInElement('button[id="button"]', 'Button 5 label')
        ->seeInElement('button[id="button-submit"]', 'Button submit 5 label')
        ->seeInElement('button[id="button-reset"]', 'Button reset 5 label');
});

it('can set label as label attribute and label attribute rules over slot', function () {
    $this->registerTestRoute('button-label-as-attribute');

    $this->visit('/button-label-as-attribute')
        ->seeInElement('button[id="button"]', 'overruled')
        ->seeInElement('button[id="button-submit"]', 'overruled')
        ->seeInElement('button[id="button-reset"]', 'overruled');
});

it('does not let type of submit button be overridden', function () {
    $this->registerTestRoute('button-submit-no-type-override');

    $this->visit('/button-submit-no-type-override')
        ->seeElement('button[id="button-submit"][type="submit"]');
});

it('supports help text using attribute', function () {
    $this->registerTestRoute('button-help-text-attribute');
    $this->visit('button-help-text-attribute')
        ->seeElement('button[id="button"] + div.form-text')
        ->seeInElement('button[id="button"] + div.form-text', 'help text using attribute')
        ->seeElement('button[id="button-submit"] + div.form-text')
        ->seeInElement('button[id="button-submit"] + div.form-text', 'help text using attribute')
        ->seeElement('button[id="button-reset"] + div.form-text')
        ->seeInElement('button[id="button-reset"] + div.form-text', 'help text using attribute');
});

it('supports help text using slot', function () {
    $this->registerTestRoute('button-help-text-slot');
    $this->visit('button-help-text-slot')
        ->seeElement('button[id="button"] + div.form-text')
        ->seeInElement('button[id="button"] + div.form-text', 'help text using slot')
        ->seeElement('button[id="button-submit"] + div.form-text')
        ->seeInElement('button[id="button-submit"] + div.form-text', 'help text using slot')
        ->seeElement('button[id="button-reset"] + div.form-text')
        ->seeInElement('button[id="button-reset"] + div.form-text', 'help text using slot');
});

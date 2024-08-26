<?php

it('adds help text', function () {
    $this->registerTestRoute('bootstrap-help');

    $this->visit('/bootstrap-help')
        ->within('#form-help-text', function () {
            $this->seeInElement('.form-text', 'Your username must be 8-20 characters long.');
        });
});

// tests if setting validation-mode="client-custom" adds class needs-validation to form and attribute no-validate
// also tests if input-groups get the class has-validation (needed to fix rounded borders on input-groups with
// validation
it('adds aria-describedby to control with help text', function () {
    $this->registerTestRoute('bootstrap-help');

    $this->visit('/bootstrap-help')
        ->within('#form-aria-describedby', function () {
            $this->seeElement('input#input[aria-describedby="input-help-text"]')
                ->seeElement('input#input ~ div[id="input-help-text"]')

                ->seeElement('select#select[aria-describedby="select-help-text"]')
                ->seeElement('input#input ~ div[id="select-help-text"]')

                ->seeElement('textarea#textarea[aria-describedby="textarea-help-text"]')
                ->seeElement('input#input ~ div[id="textarea-help-text"]')

                ->seeElement('input#checkbox[aria-describedby="checkbox-help-text"]')
                ->seeElement('input#checkbox ~ div[id="checkbox-help-text"]')

                ->seeElement('input#radio[aria-describedby="radio-help-text"]')
                ->seeElement('input#radio ~ div[id="radio-help-text"]')

                ->seeElement('div.input-group[id="input-group"][aria-describedby="input-group-help-text"]')
                ->seeElement('div.input-group[id="input-group"] ~ div[id="input-group-help-text"]')

                ->seeElement('div.form-group[id="form-group"][aria-describedby="form-group-help-text"]')
                ->seeElement('div.form-group[id="form-group"] > div[id="form-group-help-text"].text-danger');
        });
});

it('adds extra classes to help text', function () {
    $this->registerTestRoute('bootstrap-help');

    $this->visit('/bootstrap-help')
        ->within('#form-help-text-extra-classes', function () {
            $this->seeElement('input#input[aria-describedby="input-help-text"]:not([class-help-text])')
                ->seeElement('input#input ~ div[id="input-help-text"].text-danger')

                ->seeElement('select#select[aria-describedby="select-help-text"]')
                ->seeElement('input#input ~ div[id="select-help-text"].text-something')

                ->seeElement('textarea#textarea[aria-describedby="textarea-help-text"]')
                ->seeElement('input#input ~ div[id="textarea-help-text"].text-primary')

                ->seeElement('input#checkbox[aria-describedby="checkbox-help-text"]')
                ->seeElement('input#checkbox ~ div[id="checkbox-help-text"].text-info')

                ->seeElement('input#radio[aria-describedby="radio-help-text"]')
                ->seeElement('input#radio ~ div[id="radio-help-text"].text-warning')

                ->seeElement('div.input-group[id="input-group"]')
                ->seeElement('div.input-group[id="input-group"] ~ div[id="input-group-help-text"].text-danger')

                ->seeElement('div.form-group[id="form-group"]')
                ->seeElement('div.form-group[id="form-group"] > div[id="form-group-help-text"].text-danger');
        });

});

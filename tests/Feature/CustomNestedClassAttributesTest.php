<?php

// class-label
//      can be set on all control components with a label except for button (text inside button is label)
// class-horizontal-cols-label
//      can be set on controls that support horizontal
// class-horizontal-cols-control
//      can be set on controls that support horizontal
// class-toggle-button
//      can be set on radio and checkbox components
// class-inline-wrapper
//      can be set on group component (must also have attribute inline)

it('accepts "class-horizontal-cols-label", "class-horizontal-cols-control" and "class-label" on components with horizontal attribute', function() {
    $this->registerTestRoute('custom-nested-class-attributes');

    $this->visit('/custom-nested-class-attributes')
        ->within('#form-set-cols-using-attributes', function() {
            $this->seeElement('div.col-10 input[id="email"]')
                ->seeElement('div.row label.col-2.test-class[for="email"]')
                ->seeElement('div.col-9 input[id="password"]')
                ->seeElement('div.row label.col-3.test-class[for="password"]')
                ->seeElement('div.col-8 select[id="select"]')
                ->seeElement('div.row label.col-4.test-class[for="select"]')
                ->seeElement('div.col-7 textarea[id="textarea"]')
                ->seeElement('div.row label.col-5.test-class[for="textarea"]')
                ->seeElement('div.col-6 textarea[id="html-editor"]')
                ->seeElement('div.row label.col-6.test-class[for="html-editor"]');
        });

});

// Button doesn't have label outside element, text inside button is label
it('accepts "class-label" on control components', function() {
    $this->registerTestRoute('custom-nested-class-attributes');

    $this->visit('/custom-nested-class-attributes')
        ->within('#form-class-label-attribute', function() {
            $this
                ->seeElement('label[for="email"].test-class:not(.col-4) ~ input[id="email"]')
                ->seeElement('label[for="password"].test-class:not(.col-4) ~ input[id="password"]')
                ->seeElement('label[for="select"].test-class:not(.col-4) ~ select[id="select"]')
                ->seeElement('label[for="textarea"].test-class:not(.col-4) ~ textarea[id="textarea"]')
                ->seeElement('label[for="html-editor"].test-class:not(.col-4) ~ textarea[id="html-editor"]')
                ->seeElement('input[id="checkbox-using-input"] ~ label[for="checkbox-using-input"].test-class')
                ->seeElement('input[id="checkbox-using-component"] ~ label[for="checkbox-using-component"].test-class')
                ->seeElement('input[id="radio-using-input"] ~ label[for="radio-using-input"].test-class')
                ->seeElement('input[id="radio-using-component"] ~ label[for="radio-using-component"].test-class');
        });

});

it('accepts "class-toggle-button" on checkboxes and radios"', function() {
    $this->registerTestRoute('custom-nested-class-attributes');

    $this->visit('/custom-nested-class-attributes')
        ->within('#form-class-toggle-button', function() {
            $this->seeElement('input[id="checkbox-using-input"].btn-check ~ label[for="checkbox-using-input"].test-class.btn-first')
                ->seeElement('input[id="checkbox-using-component"].btn-check ~ label[for="checkbox-using-component"].test-class.btn-second')
                ->seeElement('input[id="radio-using-input"].btn-check ~ label[for="radio-using-input"].test-class.btn-third')
                ->seeElement('input[id="radio-using-component"].btn-check ~ label[for="radio-using-component"].test-class.btn-fourth');
        });
});

// Also tested in BootstrapGroupTest.php
it('accepts "class-inline-wrapper" on group"', function() {
    $this->registerTestRoute('custom-nested-class-attributes')
        ->visit('custom-nested-class-attributes')
        ->within('#form-group-inline-classes', function() {
            $this->seeElement('div.form-group div.inline-space.gap-3 input[name="email"]')
                ->seeElement('div.form-group div.inline-space.gap-3 input[name="password"]')
                ->dontSeeElement('div.form-group div.inline-space.gap-3[class-inline-wrapper] input[name="input"]');
        });
});

<?php
it('accepts "class-label", "class-control" and "class-button" on controls"', function() {
    $this->registerTestRoute('custom-nested-class-attributes');

    $this->visit('/custom-nested-class-attributes')
        ->seeElement('div.col-10 input[id="input"]')
        ->seeElement('label[for="input"].col-2')
        ->seeElement('div.col-9 input[id="password"]')
        ->seeElement('label[for="password"].col-3')
        ->seeElement('button.btn-secondary')
        ->seeElement('input[type="checkbox"] + label.btn-outline-secondary')
        ->seeElement('input[type="radio"] + label.btn-outline-success');

//    $inputId = $page->crawler()->filter('input[type="text"]')->attr('id');
//
//    expect($inputId)->toStartWith("auto_id_");
//
//    $page
//        ->seeElement('input[id="' . $inputId . '"]')
//        ->seeElement('label[for="' . $inputId . '"]');
});

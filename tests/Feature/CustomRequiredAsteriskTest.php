<?php

// TODO move to other file
it('shows required asterisk when field required', function () {
    $this->registerTestRoute('bootstrap-required');

    $this->visit('/bootstrap-required')
        ->seeElement('div.input-required label.required')
        ->seeElement('div.input-not-required label');
    //        ->seeElementCount('.form-switch', 1) // fails
    //        ->seeElement('.form-range', ['type' => 'range']);
});

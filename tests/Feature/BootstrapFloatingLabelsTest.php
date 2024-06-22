<?php

it('floats labels', function () {
    $this->registerTestRoute('bootstrap-floating-label');

    $this->visit('/bootstrap-floating-label')
    ->seeElementCount('label', 8)
    ->seeElementCount('div.form-floating', 6)
    ->seeInElement('label[for="input-1"]', 'Input 1')
    ->seeInElement('label[for="input-2"]', 'Input 2')
    ->seeInElement('label[for="select-1"]', 'Select 1')
    ->seeInElement('label[for="select-2"]', 'Select 2')
    ->seeInElement('label[for="textarea-1"]', 'Textarea 1')
    ->seeInElement('label[for="textarea-2"]', 'Textarea 2')
    ->seeElement('#input-1', ['placeholder' => ' '])
    ->seeElement('#select-1', ['placeholder' => ' '])
    ->seeElement('#textarea-1', ['placeholder' => ' '])
    ->seeElement('#input-2', ['placeholder' => 'John Doe'])
    ->seeElement('#select-2', ['placeholder' => 'Jane Doe'])
    ->seeElement('#textarea-2', ['placeholder' => 'Jane John']);
});

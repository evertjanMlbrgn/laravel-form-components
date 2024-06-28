<?php

it('sets correct value', function () {
    $this->registerTestRoute('custom-value-precedence');

    $this->visit('/custom-value-precedence')
        ->within('#form-value-precedence', function() {
            $this->seeElement('input[name="input-1"][value="value 1 by default"]')
            ->seeElement('input[name="input-2"][value="value 2 by value attribute"]')
            ->seeElement('input[name="input-3"][value="value 3 by bind directive"]')
            ->seeElement('input[name="input-4"][value="value 4 by bind attribute"]')
            ->seeElement('input[name="input-5"][value="value 5 by old value"]')

            ->seeInElement('textarea[name="textarea-1"]', 'value 1 by default')
            ->seeInElement('textarea[name="textarea-2"]', 'value 2 by value attribute')
            ->seeInElement('textarea[name="textarea-3"]', 'value 3 by bind directive')
            ->seeInElement('textarea[name="textarea-4"]', 'value 4 by bind attribute')
            ->seeInElement('textarea[name="textarea-5"]', 'value 5 by old value')

            ->seeInElement('textarea[name="html-editor-1"]', 'value 1 by default')
            ->seeInElement('textarea[name="html-editor-2"]', 'value 2 by value attribute')
            ->seeInElement('textarea[name="html-editor-3"]', 'value 3 by bind directive')
            ->seeInElement('textarea[name="html-editor-4"]', 'value 4 by bind attribute')
            ->seeInElement('textarea[name="html-editor-5"]', 'value 5 by old value');
        });
});

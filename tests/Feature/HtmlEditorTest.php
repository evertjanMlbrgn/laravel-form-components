<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);

it('check the right element as default', function () {
    $this->registerTestRoute('html-editor');

    $this->visit('/html-editor')
        ->assertResponseOk()
        ->seeElement('textarea[name="html-editor-1"][required].form-control.html-editor')
        ->seeElement('textarea[name="html-editor-2"].form-control.html-editor')
        ->seeText('html-content-1')
        ->seeText('html-content-2');
});

<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);

it('renders html-editor', function () {
    $this->registerTestRoute('html-editor');

    $this->visit('/html-editor')
        ->assertResponseOk()
//        ->seeElement('textarea[name="html-editor-1"][something][id="auto_id_html-editor-1"].form-control.html-editor')
        ->seeElement('textarea[name="html-editor-1"][required][id="auto_id_html-editor-1"].form-control.html-editor')
        ->seeElement('textarea[name="html-editor-2"][id="html-editor-2"].form-control.html-editor')
        ->seeElement('label[for="auto_id_html-editor-1"].form-label.required')
        ->seeElement('label[for="html-editor-2"].form-label')
        ->seeText('html-content-1')
        ->seeText('html-content-2');
});


// already tested for
//it('always has an id attribute', function () {
//    $this->registerTestRoute('html-editor');
//
//    $this->visit('/html-editor')
//        ->assertResponseOk()
////        ->seeElement('textarea[name="html-editor-1"][something][id="auto_id_html-editor-1"].form-control.html-editor')
//        ->seeElement('textarea[name="html-editor-1"][id]')
//        ->seeElement('textarea[name="html-editor-2"][id]');
//});

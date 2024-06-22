<?php

it('renders html-editor', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-1', function() {
            $this->seeElement('textarea[name="html-editor-1"]');
        });
});

it('sets classes on textarea', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('custom-html-editor')
        ->within('#form-2', function() {
            $this->seeElement('textarea[name="html-editor-1"].form-control.html-editor');
        });
});

it('sets extra classes on textarea', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('custom-html-editor')
        ->within('#form-3', function() {
            $this->seeElement('textarea[name="html-editor-1"].extra-class.extra-class-2');
        });
});

it('sets extra attributes on textarea', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('custom-html-editor')
        ->within('#form-4', function() {
            $this->seeElement('textarea[name="html-editor-1"][required][disabled][something][readonly]');
        });
});

it('does not render label when html-editor is hidden', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-5', function() {
           $this->dontSeeElement('label[for="hidden-html-editor"]')
               ->seeElement('label[for="non-hidden-html-editor"]');
        });
});

it('can bind data', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-6', function() {
            $this->seeInElement('textarea[id="bound-html-editor"]', 'html-editor-bound-value');
        });
})->todo();

it('always has an id attribute and label refers to it', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-7', function() {
            $randomId = $this->crawler()->filter('textarea.html-editor-3')->attr('id');

            $this->seeElement('textarea[id="id-using-id"]')
            ->seeElement('textarea[id="auto_id_id-using-name"]')
            ->seeElement('textarea.html-editor-3[id="' . $randomId . '"]')
            ->seeElement('label[for="id-using-id"].form-label.required')
            ->seeElement('label[for="auto_id_id-using-name"].form-label')
            ->seeElement('label[for="' . $randomId . '"].form-label');
        });
});

it('can set value as slot', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-8', function() {
            $this->seeInElement('textarea[id="content-using-slot"]', 'Sample content');
        });
});

it('sets a default value', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-default', function() {
            $this->seeInElement('textarea[name="textarea"]', 'b');
        });
});

it('does not have help text when no @slot("help") or "help-text" attribute', function () {
    $this->registerTestRoute('custom-html-editor');

    $this->visit('/custom-html-editor')
        ->within('#form-8', function() {
            $this->dontSeeElement('div[id="content-using-slot-help-text"]');
        });
});


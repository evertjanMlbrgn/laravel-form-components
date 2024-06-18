<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);

it('renders html-editor', function () {
    $this->registerTestRoute('html-editor');

    $this->visit('/html-editor')
        ->within('#form-1', function() {
            $this->seeElement('textarea[name="html-editor-1"]');
        });
});

it('sets classes on textarea', function () {
    $this->registerTestRoute('html-editor');

    $this->visit('html-editor')
        ->within('#form-2', function() {
            $this->seeElement('textarea[name="html-editor-1"].form-control.html-editor');
        });
});

it('sets extra classes on textarea', function () {
    $this->registerTestRoute('html-editor');

    $this->visit('html-editor')
        ->within('#form-3', function() {
            $this->seeElement('textarea[name="html-editor-1"].extra-class.extra-class-2');
        });
});

it('sets extra attributes on textarea', function () {
    $this->registerTestRoute('html-editor');

    $this->visit('html-editor')
        ->within('#form-4', function() {
            $this->seeElement('textarea[name="html-editor-1"][required][disabled][something][readonly]');
        });
});

it('does not render label when html-editor is hidden', function () {
    $this->registerTestRoute('html-editor');

    $this->visit('/html-editor')
        ->within('#form-5', function() {
           $this->dontSeeElement('label[for="hidden-html-editor"]')
               ->seeElement('label[for="non-hidden-html-editor"]');
        });
});

it('can bind data', function () {
    $this->registerTestRoute('html-editor');

    $this->visit('/html-editor')
        ->within('#form-6', function() {
            $this->seeInElement('textarea[id="bound-html-editor"]', 'html-editor-bound-value');
        });
})->todo();

it('always has an id attribute and label refers to it', function () {
    $this->registerTestRoute('html-editor');

    $this->visit('/html-editor')
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
    $this->registerTestRoute('html-editor');

    $this->visit('/html-editor')
        ->within('#form-8', function() {
            $this->seeInElement('textarea[id="content-using-slot"]', 'Sample content');
        });
});


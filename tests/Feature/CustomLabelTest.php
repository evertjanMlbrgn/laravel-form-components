<?php

uses(\Mlbrgn\LaravelFormComponents\Tests\TestCase::class);

it('Sets label without required attribute and with correct label class', function () {

    $this->registerTestRoute('custom-label');

    $this->visit('/custom-label')
        ->within('#form-1', function() {
            return $this->dontSeeElement('label[for="button"]')// uses button component, has no label
                ->seeElement('label[for="checkbox"].form-check-label.required:not([required]):not(.form-label)')
                ->seeElement('label[for="color"].form-label.required:not([required])')
                ->seeElement('label[for="date"].form-label.required:not([required])')
                ->seeElement('label[for="datetime-local"].form-label.required:not([required])')
                ->seeElement('label[for="email"].form-label.required:not([required])')
                ->seeElement('label[for="file"].form-label.required:not([required])')
                ->seeElement('label[for="hidden"].form-label.required:not([required])')
                ->seeElement('label[for="image"].form-label.required:not([required])')
                ->seeElement('label[for="month"].form-label.required:not([required])')
                ->seeElement('label[for="number"].form-label.required:not([required])')
                ->seeElement('label[for="password"].form-label.required:not([required])')
                ->seeElement('label[for="radio"].form-check-label.required:not([required]):not(.form-label)')
                ->seeElement('label[for="range"].form-label.required:not([required])')
                ->dontSeeElement('label[for="reset"]')// uses button component, has no label
                ->seeElement('label[for="search"].form-label.required:not([required])')
                ->dontSeeElement('label[for="submit"]')// uses button component, has no label
                ->seeElement('label[for="tel"].form-label.required:not([required])')
                ->seeElement('label[for="text"].form-label.required:not([required])')
                ->seeElement('label[for="time"].form-label.required:not([required])')
                ->seeElement('label[for="url"].form-label.required:not([required])')
                ->seeElement('label[for="week"].form-label.required:not([required])')

                ->seeElement('label[for="select"].form-label.required:not([required])')
                ->seeElement('label[for="checkbox-2"].form-check-label.required:not([required]):not(.form-label)')
                ->seeElement('label[for="radio-2"].form-check-label.required:not([required]):not(.form-label)')
                ->seeElement('label[for="textarea"].form-label.required:not([required])')
                ->seeElement('label[for="html-editor"].form-label.required:not([required])');

        });
})->todo();

it('uses correct id for label', function () {

    $this->registerTestRoute('custom-label');

    $this->visit('/custom-label')
        ->within('#form-2', function() {
            $page = $this;
        $colorId = $page->crawler()->filter('input[type="color"]')->attr('id');
        $dateId = $page->crawler()->filter('input[type="date"]')->attr('id');
        $datetimeLocalId = $page->crawler()->filter('input[type="datetime-local"]')->attr('id');
        $emailId = $page->crawler()->filter('input[type="email"]')->attr('id');
        $fileId = $page->crawler()->filter('input[type="file"]')->attr('id');
        $hiddenId = $page->crawler()->filter('input[type="hidden"]')->attr('id');
        $imageId = $page->crawler()->filter('input[type="image"]')->attr('id');
        $monthId = $page->crawler()->filter('input[type="month"]')->attr('id');
        $numberId = $page->crawler()->filter('input[type="number"]')->attr('id');
        $passwordId = $page->crawler()->filter('input[type="password"]')->attr('id');
        $rangeId = $page->crawler()->filter('input[type="range"]')->attr('id');
        $searchId = $page->crawler()->filter('input[type="search"]')->attr('id');
        $telId = $page->crawler()->filter('input[type="tel"]')->attr('id');
        $textId = $page->crawler()->filter('input[type="text"]')->attr('id');
        $timeId = $page->crawler()->filter('input[type="time"]')->attr('id');
        $urlId = $page->crawler()->filter('input[type="url"]')->attr('id');
        $weekId = $page->crawler()->filter('input[type="week"]')->attr('id');

        $selectId = $page->crawler()->filter('select')->attr('id');
        $checkboxId = $page->crawler()->filter('input[type="checkbox"]')->attr('id');
        $radioId = $page->crawler()->filter('input[type="radio"]')->attr('id');
        $textareaId = $page->crawler()->filter('textarea[disabled]')->attr('id');
        $htmlEditorId = $page->crawler()->filter('textarea.html-editor')->attr('id');

        echo('colorId ' . $colorId);
            $page->seeElement('label[for="' . $colorId . '"]')
            ->seeElement('input[type="color"][id="' . $colorId . '"]')
            ->seeElement('label[for="' . $dateId . '"]')
            ->seeElement('input[type="date"][id="' . $dateId . '"]')
//            ->seeElement('label[for="datetime-local"][id="' . $datetimeLocalId . '"]')
//            ->seeElement('input[type="datetime-local"][id="' . $datetimeLocalId . '"]')

            ->seeElement('label[for="' . $emailId . '"]')
            ->seeElement('input[type="email"][id="' . $emailId . '"]')

            ->seeElement('label[for="' . $fileId . '"]')
            ->seeElement('input[type="file"][id="' . $fileId . '"]')

//            ->seeElement('label[for="' . $hiddenId . '"]')
//            ->seeElement('input[type="hidden"][id="' . $hiddenId . '"]')

            ->seeElement('label[for="' . $imageId . '"]')
            ->seeElement('input[type="image"][id="' . $imageId . '"]')

            ->seeElement('label[for="' . $monthId . '"]')
            ->seeElement('input[type="month"][id="' . $monthId . '"]')

            ->seeElement('label[for="' . $numberId . '"]')
            ->seeElement('input[type="number"][id="' . $numberId . '"]')

            ->seeElement('label[for="' . $passwordId . '"]')
            ->seeElement('input[type="password"][id="' . $passwordId . '"]')

            ->seeElement('label[for="' . $rangeId . '"]')
            ->seeElement('input[type="range"][id="' . $rangeId . '"]')

            ->seeElement('label[for="' . $searchId . '"]')
            ->seeElement('input[type="search"][id="' . $searchId . '"]')

            ->seeElement('label[for="' . $telId . '"]')
            ->seeElement('input[type="tel"][id="' . $telId . '"]')

            ->seeElement('label[for="' . $textId . '"]')
            ->seeElement('input[type="text"][id="' . $textId . '"]')

            ->seeElement('label[for="' . $timeId . '"]')
            ->seeElement('input[type="time"][id="' . $timeId . '"]')

            ->seeElement('label[for="' . $urlId . '"]')
            ->seeElement('input[type="url"][id="' . $urlId . '"]')

            ->seeElement('label[for="' . $weekId . '"]')
            ->seeElement('input[type="week"][id="' . $weekId . '"]')

            ->seeElement('label[for="' . $selectId . '"]')
            ->seeElement('select[id="' . $selectId . '"]')

            ->seeElement('label[for="' . $checkboxId . '"]')
            ->seeElement('input[type="checkbox"][id="' . $checkboxId . '"]')

            ->seeElement('label[for="' . $radioId . '"]')
            ->seeElement('input[type="radio"][id="' . $radioId . '"]')

            ->seeElement('label[for="' . $textareaId . '"]')
            ->seeElement('textarea[disabled][id="' . $textareaId . '"]')

            ->seeElement('label[for="' . $htmlEditorId . '"]')
            ->seeElement('textarea[readonly][id="' . $htmlEditorId . '"]');
//
//            ->seeElement('label[type="textarea"].form-label.required:not([required])')
//            ->seeElement('label[type="html-editor"].form-label.required:not([required])');
    });



});

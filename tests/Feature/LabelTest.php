<?php /** @noinspection Annotator */

it('sets the id on the label or generates one', function () {
    $this->registerTestRoute('label-for');

    $page = $this->visit('/label-for');
    $pageCrawler = $page->crawler();

    $page->seeElement('textarea[id="text_b"]')
        ->seeElement('label[for="text_b"]');

    $inputId = $pageCrawler->filter('input[type="text"]')->attr('id');

    expect($inputId)->toStartWith('auto_id_');

    $page->seeElement('input[id="'.$inputId.'"]')
        ->seeElement('label[for="'.$inputId.'"]');

});

// NOTE: range can't be required
it('Sets label for required control and adds label class "required"', function () {

    $this->registerTestRoute('label-required-controls');

    $this->visit('/label-required-controls')
        ->dontSeeElement('label[for="button"]')// uses button component, label is inside button
        ->seeElement('label[for="checkbox"].form-check-label.required:not([required]):not(.form-label)')
        ->seeElement('label[for="color"].form-label.required:not([required])')
        ->seeElement('label[for="date"].form-label.required:not([required])')
        ->seeElement('label[for="datetime-local"].form-label.required:not([required])')
        ->seeElement('label[for="email"].form-label.required:not([required])')
        ->seeElement('label[for="file"].form-label.required:not([required])')
        ->dontSeeElement('label[for="hidden"].form-label.required:not([required])')
        ->seeElement('label[for="image"].form-label.required:not([required])')
        ->seeElement('label[for="month"].form-label.required:not([required])')
        ->seeElement('label[for="number"].form-label.required:not([required])')
        ->seeElement('label[for="password"].form-label.required:not([required])')
        ->seeElement('label[for="radio"].form-check-label.required:not([required]):not(.form-label)')
        ->seeElement('label[for="range"].form-label:not([required])')
        ->dontSeeElement('label[for="reset"]')// uses button component, label is inside button
        ->seeElement('label[for="search"].form-label.required:not([required])')
        ->dontSeeElement('label[for="submit"]')// uses button component, label is inside button
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

it('sets correct "for" attribute on label', function () {

    $this->registerTestRoute('label-no-id');

    $page = $this->visit('/label-no-id');
    $pageCrawler = $page->crawler()->filter('#label-no-id');


    $colorId = $pageCrawler->filter('input[type="color"]')->attr('id');
    $dateId = $pageCrawler->filter('input[type="date"]')->attr('id');
    $datetimeLocalId = $pageCrawler->filter('input[type="datetime-local"]')->attr('id');
    $emailId = $pageCrawler->filter('input[type="email"]')->attr('id');
    $fileId = $pageCrawler->filter('input[type="file"]')->attr('id');
    $imageId = $pageCrawler->filter('input[type="image"]')->attr('id');
    $monthId = $pageCrawler->filter('input[type="month"]')->attr('id');
    $numberId = $pageCrawler->filter('input[type="number"]')->attr('id');
    $passwordId = $pageCrawler->filter('input[type="password"]')->attr('id');
    $rangeId = $pageCrawler->filter('input[type="range"]')->attr('id');
    $searchId = $pageCrawler->filter('input[type="search"]')->attr('id');
    $telId = $pageCrawler->filter('input[type="tel"]')->attr('id');
    $textId = $pageCrawler->filter('input[type="text"]')->attr('id');
    $timeId = $pageCrawler->filter('input[type="time"]')->attr('id');
    $urlId = $pageCrawler->filter('input[type="url"]')->attr('id');
    $weekId = $pageCrawler->filter('input[type="week"]')->attr('id');

    $selectId = $pageCrawler->filter('select')->attr('id');
    $checkboxId = $pageCrawler->filter('input[type="checkbox"]')->attr('id');
    $radioId = $pageCrawler->filter('input[type="radio"]')->attr('id');
    $textareaId = $pageCrawler->filter('textarea[disabled]')->attr('id');
    $htmlEditorId = $pageCrawler->filter('textarea.html-editor')->attr('id');

    $page->seeElement('label[for="'.$colorId.'"]')
        ->seeElement('input[type="color"][id="'.$colorId.'"]')
        ->seeElement('label[for="'.$dateId.'"]')
        ->seeElement('input[type="date"][id="'.$dateId.'"]')
        ->seeElement('label[for="'.$datetimeLocalId.'"]')
        ->seeElement('input[type="datetime-local"][id="'.$datetimeLocalId.'"]')
        ->seeElement('label[for="'.$emailId.'"]')
        ->seeElement('input[type="email"][id="'.$emailId.'"]')
        ->seeElement('label[for="'.$fileId.'"]')
        ->seeElement('input[type="file"][id="'.$fileId.'"]')
        ->seeElement('label[for="'.$imageId.'"]')
        ->seeElement('input[type="image"][id="'.$imageId.'"]')
        ->seeElement('label[for="'.$monthId.'"]')
        ->seeElement('input[type="month"][id="'.$monthId.'"]')
        ->seeElement('label[for="'.$numberId.'"]')
        ->seeElement('input[type="number"][id="'.$numberId.'"]')
        ->seeElement('label[for="'.$passwordId.'"]')
        ->seeElement('input[type="password"][id="'.$passwordId.'"]')
        ->seeElement('label[for="'.$rangeId.'"]')
        ->seeElement('input[type="range"][id="'.$rangeId.'"]')
        ->seeElement('label[for="'.$searchId.'"]')
        ->seeElement('input[type="search"][id="'.$searchId.'"]')
        ->seeElement('label[for="'.$telId.'"]')
        ->seeElement('input[type="tel"][id="'.$telId.'"]')
        ->seeElement('label[for="'.$textId.'"]')
        ->seeElement('input[type="text"][id="'.$textId.'"]')
        ->seeElement('label[for="'.$timeId.'"]')
        ->seeElement('input[type="time"][id="'.$timeId.'"]')
        ->seeElement('label[for="'.$urlId.'"]')
        ->seeElement('input[type="url"][id="'.$urlId.'"]')
        ->seeElement('label[for="'.$weekId.'"]')
        ->seeElement('input[type="week"][id="'.$weekId.'"]')

//            non inputs
        ->seeElement('label[for="'.$selectId.'"]')
        ->seeElement('select[id="'.$selectId.'"]')
        ->seeElement('label[for="'.$checkboxId.'"]')
        ->seeElement('input[type="checkbox"][id="'.$checkboxId.'"]')
        ->seeElement('label[for="'.$radioId.'"]')
        ->seeElement('input[type="radio"][id="'.$radioId.'"]')
        ->seeElement('label[for="'.$textareaId.'"]')
        ->seeElement('textarea[disabled][id="'.$textareaId.'"]')
        ->seeElement('label[for="'.$htmlEditorId.'"]')
        ->seeElement('textarea[readonly][id="'.$htmlEditorId.'"]');

});

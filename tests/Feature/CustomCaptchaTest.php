<?php

it('renders captcha', function () {
    $this->registerTestRoute('custom-captcha');

    $this->visit('/custom-captcha')
        ->within('#form-captcha-1', function () {
            $this->seeElement('div.g-recaptcha[data-sitekey][data-badge="inline"][data-size="invisible"][data-callback]')
                ->seeElement('button[type="submit"]')
                ->seeInElement('button[type="submit"]', 'CaPtChA');
        });
});

it('can add classes to captcha submit button', function () {
    $this->registerTestRoute('custom-captcha');

    $this->visit('/custom-captcha')
        ->within('#form-captcha-2', function () {
            $this->seeElement('div.g-recaptcha[data-sitekey][data-badge="inline"][data-size="invisible"][data-callback]')
                ->seeElement('div.g-recaptcha + button.btn-primary')
                ->seeElement('button[type="submit"]')
                ->seeInElement('button[type="submit"]', 'CaPtChA');
        });
});

<?php

it('renders captcha', function () {
    $this->registerTestRoute('custom-captcha');

    $this->visit('/custom-captcha')
        ->seeElement('div.g-recaptcha[data-sitekey][data-badge="inline"][data-size="invisible"][data-callback]')
        ->seeElement('button[type="submit"]')
        ->seeInElement('button[type="submit"]', 'CaPtChA');
});

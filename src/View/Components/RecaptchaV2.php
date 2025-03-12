<?php

namespace Mlbrgn\LaravelFormComponents\View\Components;

use Mlbrgn\LaravelFormComponents\View\FormBaseComponent;

class RecaptchaV2 extends FormBaseComponent {

    public function __construct(
        public string $formId = '',
        public string $classButton = 'btn-primary',
        public string $label = 'Submit',
    ) {

    }
}

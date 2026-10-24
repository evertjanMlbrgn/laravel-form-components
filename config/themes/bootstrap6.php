<?php

$bootstrap5 = require __DIR__.'/bootstrap5.php';

return array_replace($bootstrap5, [
    /** CSS Classes */
    'form_label_horizontal' => 'col-form-label',
    'form_select' => 'form-control',
    'form_check' => 'form-field',
    'form_check_input' => 'check',
    'form_radio_input' => 'radio',
    'form_check_label' => '',
    'form_check_switch' => 'switch',
    'submit' => 'btn-solid theme-primary',
    'button' => 'btn-solid',
    'button_toggle' => 'btn-solid',
    'wrapper_horizontal_label' => 'sm:col-2 col-form-label',
    'wrapper_horizontal_control' => 'sm:col-10',
    'group' => 'form-field',
    'wrapper_class_prefixes' => [
        'm-', 'ms-', 'mt-', 'me-', 'mb-', 'mx-', 'my-',
        'p-', 'ps-', 'pt-', 'pe-', 'pb-', 'px-', 'py-',
        'sm:m-', 'sm:ms-', 'sm:mt-', 'sm:me-', 'sm:mb-', 'sm:mx-', 'sm:my-',
        'md:m-', 'md:ms-', 'md:mt-', 'md:me-', 'md:mb-', 'md:mx-', 'md:my-',
        'lg:m-', 'lg:ms-', 'lg:mt-', 'lg:me-', 'lg:mb-', 'lg:mx-', 'lg:my-',
        'xl:m-', 'xl:ms-', 'xl:mt-', 'xl:me-', 'xl:mb-', 'xl:mx-', 'xl:my-',
        '2xl:m-', '2xl:ms-', '2xl:mt-', '2xl:me-', '2xl:mb-', '2xl:mx-', '2xl:my-',
        'sm:p-', 'sm:ps-', 'sm:pt-', 'sm:pe-', 'sm:pb-', 'sm:px-', 'sm:py-',
        'md:p-', 'md:ps-', 'md:pt-', 'md:pe-', 'md:pb-', 'md:px-', 'md:py-',
        'lg:p-', 'lg:ps-', 'lg:pt-', 'lg:pe-', 'lg:pb-', 'lg:px-', 'lg:py-',
        'xl:p-', 'xl:ps-', 'xl:pt-', 'xl:pe-', 'xl:pb-', 'xl:px-', 'xl:py-',
        '2xl:p-', '2xl:ps-', '2xl:pt-', '2xl:pe-', '2xl:pb-', '2xl:px-', '2xl:py-',
        'sm:col-', 'md:col-', 'lg:col-', 'xl:col-', '2xl:col-', 'col-',
    ],

    /** Preview UI theme keys */
    'preview_sidebar_column' => 'lg:col-2 d-none lg:d-block',
    'preview_content_column' => 'lg:col-10',
    'badge_error' => 'badge theme-danger',
]);

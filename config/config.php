<?php

use Mlbrgn\LaravelFormComponents\Components;

return [
    'prefix' => '',

    /** bootstrap-5 */
    'framework' => 'bootstrap-5',

    'use_eloquent_date_casting' => false,

    /** bool | string */
    'default_wire' => false,

    'components' => [
        'form' => [
            'view'  => 'form-components::{framework}.form',
            'class' => Components\Form::class,
        ],

        'form-checkbox' => [
            'view'  => 'form-components::{framework}.checkbox',
            'class' => Components\Checkbox::class,
        ],

        'form-errors' => [
            'view'  => 'form-components::{framework}.errors',
            'class' => Components\Errors::class,
        ],

        'form-group' => [
            'view'  => 'form-components::{framework}.group',
            'class' => Components\Group::class,
        ],

        'form-input' => [
            'view'  => 'form-components::{framework}.input',
            'class' => Components\Input::class,
        ],

        'html-editor' => [
            'view'  => 'form-components::{framework}.html-editor',
            'class' => Components\HtmlEditor::class,
        ],

        'inline' => [
            'view'  => 'form-components::{framework}.inline',
            'class' => Components\Inline::class,
        ],

        'captcha' => [
            'view'  => 'form-components::{framework}.captcha',
            'class' => Components\Captcha::class,
        ],

        'form-input-group' => [
            'view'  => 'form-components::{framework}.input-group',
            'class' => Components\InputGroup::class,
        ],

        'form-input-group-text' => [
            'view'  => 'form-components::{framework}.input-group-text',
            'class' => Components\InputGroupText::class,
        ],

        'form-label' => [
            'view'  => 'form-components::{framework}.label',
            'class' => Components\Label::class,
        ],

        'form-radio' => [
            'view'  => 'form-components::{framework}.radio',
            'class' => Components\Radio::class,
        ],

        'form-range' => [
            'view'  => 'form-components::{framework}.range',
            'class' => Components\Range::class,
        ],

        'form-select' => [
            'view'  => 'form-components::{framework}.select',
            'class' => Components\Select::class,
        ],

        'form-submit' => [
            'view'  => 'form-components::{framework}.submit',
            'class' => Components\Submit::class,
        ],

        'form-textarea' => [
            'view'  => 'form-components::{framework}.textarea',
            'class' => Components\Textarea::class,
        ],
    ],
];

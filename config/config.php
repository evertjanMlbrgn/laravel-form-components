<?php

//use Mlbrgn\LaravelFormComponents\Components;

return [
    //    'prefix' => '',

    /** which frontend framework to use, only bootstrap 5 is supported (for now) */
    'framework' => 'bootstrap-5',

    /** the component view_namespace is used when accessing views from within this package e.g.
     * when view_namespace is set to 'my-namespace', then you can call the view with "my-namespace::component-name"
     * **/
    'view_namespace' => 'form-components',// TODO rename to component_views_namespace?

    /** the prefix used before the component name
     * when prefix === 'something' then the component can be used as <x-something-component-name>
     */
    'tag_prefix' => 'form',

    /**
     * TODO doc
     **/
    'use_eloquent_date_casting' => false,

    /**
     * TODO how to load custom content css?
     * Path to custom content css for the TinyMCE editor, this css file can be used to style the content within the editor,
     * e.g. all headings should be read or the font-family of the content should be Arial.
     **/
    'tinymce_content_css_path' => ''

    //    'components' => [
    //        'form' => [
    //            'view'  => 'form-components::{framework}.form',
    //            'class' => \Mlbrgn\LaravelFormComponents\View\Components\Form::class,
    //        ],
    //
    //        'form-checkbox' => [
    //            'view'  => 'form-components::{framework}.checkbox',
    //            'class' => \Mlbrgn\LaravelFormComponents\View\Components\Checkbox::class,
    //        ],
    //
    //        'form-errors' => [
    //            'view'  => 'form-components::{framework}.errors',
    //            'class' => \Mlbrgn\LaravelFormComponents\View\Components\Errors::class,
    //        ],
    //
    //        'form-group' => [
    //            'view'  => 'form-components::{framework}.group',
    //            'class' => \Mlbrgn\LaravelFormComponents\View\Components\Group::class,
    //        ],
    //
    //        'form-input' => [
    //            'view'  => 'form-components::{framework}.input',
    //            'class' => \Mlbrgn\LaravelFormComponents\View\Components\Input::class,
    //        ],
    //
    //        'html-editor' => [
    //            'view'  => 'form-components::{framework}.html-editor',
    //            'class' => \Mlbrgn\LaravelFormComponents\View\Components\HtmlEditor::class,
    //        ],
    //
    //        'inline' => [
    //            'view'  => 'form-components::{framework}.inline',
    //            'class' => \Mlbrgn\LaravelFormComponents\View\Components\FormInline::class,
    //        ],
    //
    //        'captcha' => [
    //            'view'  => 'form-components::{framework}.captcha',
    //            'class' => \Mlbrgn\LaravelFormComponents\View\Components\Captcha::class,
    //        ],
    //
    //        'form-input-group' => [
    //            'view'  => 'form-components::{framework}.input-group',
    //            'class' => \Mlbrgn\LaravelFormComponents\View\Components\InputGroup::class,
    //        ],
    //
    //        'form-input-group-text' => [
    //            'view'  => 'form-components::{framework}.input-group-text',
    //            'class' => \Mlbrgn\LaravelFormComponents\View\Components\InputGroupText::class,
    //        ],
    //
    //        'form-label' => [
    //            'view'  => 'form-components::{framework}.label',
    //            'class' => \Mlbrgn\LaravelFormComponents\View\Components\Label::class,
    //        ],
    //
    //        'form-radio' => [
    //            'view'  => 'form-components::{framework}.radio',
    //            'class' => \Mlbrgn\LaravelFormComponents\View\Components\Radio::class,
    //        ],
    //
    //        'form-range' => [
    //            'view'  => 'form-components::{framework}.range',
    //            'class' => \Mlbrgn\LaravelFormComponents\View\Components\Range::class,
    //        ],
    //
    //        'form-select' => [
    //            'view'  => 'form-components::{framework}.select',
    //            'class' => \Mlbrgn\LaravelFormComponents\View\Components\Select::class,
    //        ],
    //
    //        'form-submit' => [
    //            'view'  => 'form-components::{framework}.submit',
    //            'class' => \Mlbrgn\LaravelFormComponents\View\Components\Submit::class,
    //        ],
    //
    //        'form-textarea' => [
    //            'view'  => 'form-components::{framework}.textarea',
    //            'class' => \Mlbrgn\LaravelFormComponents\View\Components\Textarea::class,
    //        ],
    //    ],
];

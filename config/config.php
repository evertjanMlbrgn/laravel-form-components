<?php

/**
 * Bootstrap 5 theme definition. It is also the base for the provisional bootstrap-6 theme below.
 */
$bootstrap5 = [
    /** CSS Classes */
    'form_label' => 'form-label',
    'form_label_horizontal' => 'col-form-label',
    'form_label_horizontal_sm' => 'col-form-label-sm',
    'form_label_horizontal_lg' => 'col-form-label-lg',
    'form_control' => 'form-control',
    'form_control_lg' => 'form-control-lg',
    'form_control_sm' => 'form-control-sm',
    'form_control_color' => 'form-control-color',
    'form_select' => 'form-select',
    'form_textarea' => 'form-control',
    'form_check' => 'form-check',
    'form_check_switch' => 'form-switch',
    'form_switch_input' => 'form-check-input',
    'form_check_inline' => 'form-check-inline',
    'form_check_input' => 'form-check-input',
    'form_radio_input' => 'form-check-input',
    'form_check_label' => 'form-check-label',
    'button_check' => 'btn-check',
    'button' => 'btn',
    'button_toggle' => 'btn',
    'form_range' => 'form-range',
    'form_text' => 'form-text',
    'invalid_feedback' => 'invalid-feedback',
    'valid_feedback' => 'valid-feedback',
    'invalid_tooltip' => 'invalid-tooltip',
    'valid_tooltip' => 'valid-tooltip',
    'invalid_class' => 'is-invalid',
    'valid_class' => 'is-valid',
    'wrapper_horizontal' => 'row',
    'wrapper_horizontal_label' => 'col-sm-2 col-form-label',
    'wrapper_horizontal_control' => 'col-sm-10',
    'wrapper_floating' => 'form-floating',
    'submit' => 'btn btn-primary',
    'input_group' => 'input-group',
    'input_group_text' => 'input-group-text',
    'input_group_has_validation' => 'has-validation',
    'group' => 'form-group',
    'field' => 'mb-3',
    'group_inline_wrapper' => 'd-flex flex-row flex-wrap inline-space',
    'hidden' => 'd-none',
    'input_wrapper' => '',
    'wrapper_class_prefixes' => ['m-', 'ms-', 'mt-', 'me-', 'mb-', 'mx-', 'my-'],

    /** Structural flags */
    'use_group_wrapper' => false,
    'use_input_wrapper' => false,

    /** Preview UI theme keys */
    'preview_body' => 'bg-light',
    'preview_container' => 'container-fluid py-3 px-4',
    'preview_row' => 'row',
    'preview_sidebar_column' => 'col-lg-2 d-none d-lg-block',
    'preview_content_column' => 'col-lg-10',
    'preview_sidebar_list' => 'list-group',
    'preview_sidebar_item' => 'list-group-item list-group-item-action',
    'preview_sidebar_item_active' => 'active',
    'preview_section' => 'mb-5',
    'preview_page_title' => 'h1 mb-4 border-bottom pb-2',
    'preview_section_title' => 'h2 mt-5 mb-3',
    'preview_section_description' => 'lead mb-4',
    'preview_example' => 'card mb-4 shadow-sm',
    'preview_example_body' => 'card-body',
    'preview_example_title' => 'card-title h5',
    'preview_example_code' => 'bg-light p-3 border-top mt-3',
    'badge_error' => 'badge bg-danger',
];

return [

    /** which frontend framework to use, defaults to plain */
    'framework' => env('FORM_COMPONENTS_FRAMEWORK', 'plain'),

    //    /**
    //     * The view namespace used when loading Blade views **from within this package**.
    //     *
    //     * Example:
    //     *   If 'view_namespace' is set to 'my-namespace', you can reference views like:
    //     *     @include('my-namespace::component-name')
    //     *     or
    //     *     <x-my-namespace::component-name />
    //     *
    //     * This is purely for organising your package's internal views and does not affect
    //     * the tag names used by Blade components.
    //     */
    //    'view_namespace' => env('FORM_COMPONENTS_VIEW_NAMESPACE', 'mlbrgn-form-components'),

    //    /**
    //     * The component namespace used when registering Blade components **from this package**.
    //     *
    //     * Example:
    //     *   If 'component_namespace' is set to 'my-components', you can reference a component in a view like:
    //     *     <x-my-components::input />
    //     *
    //     * This is separate from the tag prefix and is primarily for namespacing components internally
    //     * or for advanced use cases where you want a different namespace than the default 'form'.
    //     */
    //    'component_namespace' => env('FORM_COMPONENTS_COMPONENT_NAMESPACE', 'form-components'),

    /**
     * The prefix used before component tags when used in Blade views by the **end user**.
     *
     * Example:
     *   If 'tag_prefix' is set to 'form', a component like Input::class will be used as:
     *     <x-form-input />
     *
     * Changing this allows developers to customize the prefix globally without editing each component.
     */
    'tag_prefix' => env('FORM_COMPONENTS_TAG_PREFIX', 'form'),

    //    /** the component view_namespace is used when accessing views from within this package e.g.
    //     * when view_namespace is set to 'my-namespace', then you can call the view with "my-namespace::component-name"
    //     * **/
    //    'view_namespace' => env('FORM_COMPONENTS_VIEW_NAMESPACE', 'form-components'),
    //
    //    /** the component view_namespace is used when accessing views from within this package e.g.
    //     * when view_namespace is set to 'my-namespace', then you can call the view with "my-namespace::component-name"
    //     * **/
    //    'component_namespace' => env('FORM_COMPONENTS_COMPONENT_NAMESPACE', 'form-components'),
    //
    //    /** the prefix used before the component name
    //     * when prefix === 'something' then the component can be used as <x-something-component-name>
    //     */
    //    'tag_prefix' => env('FORM_COMPONENTS_TAG_PREFIX', 'form'),

    /**
     * If you use Eloquents Date Casting feature, you can use the date attributes in your forms by setting the
     * use_eloquent_date_casting configuration key to true
     **/
    'use_eloquent_date_casting' => env('FORM_COMPONENTS_USE_ELOQUENT_DATE_CASTING', false),

    /**
     * If you use Eloquents Date Casting feature, you can use the date attributes in your forms by setting the
     * use_eloquent_date_casting configuration key to true
     * Allowed values: "camel" or "snake"
     **/
    'relationship_convert_field_name_to_camelcase_for_relationships' => env('FORM_COMPONENTS_CONVERT_FIELD_NAME_TO_CAMELCASE_FOR_RELATIONSHIPS',
        true),

    /**
     * use disabled option as placeholder in select
     **/
    'use_class_instead_of_disabled_in_select_placeholder' => env('FORM_COMPONENTS_USE_CLASS_INSTEAD_OF_DISABLED_IN_SELECT_PLACEHOLDER',
        true),

    /**
     * TODO how to load custom content css?
     * Path to custom content css for the TinyMCE editor, this css file can be used to style the content within the editor,
     * e.g. all headings should be read or the font-family of the content should be Arial.
     **/
    'tinymce_content_css_path' => env('FORM_COMPONENTS_TINYMCE_CONTENT_CSS_PATH', ''),

    /**
     * Extracts certain utility classes and puts them on the control wrapper instead of the control itself
     * now extracts the m*-* utility classes, because they make more sense on the wrapper than on the control
     */
    'use_wrapper_classes' => env('FORM_COMPONENTS_USE_WRAPPER_CLASSES', true),

    /**
     * Modifies label class from form-label to input-group-text when label is inside an input-group when set to true
     */
    'modify_label_class' => env('FORM_COMPONENTS_MODIFY_LABEL_CLASS', true),

    /**
     * Detects "is-valid" or "is-invalid" class in "group" component to be able to set classes in "group" component.
     * Needed to let "group" validation work
     */
    'detect_validation_classes_in_group' => env('FORM_COMPONENTS_DETECT_VALIDATION_CLASSES_IN_GROUP', true),

    /**
     * Default form validation mode (server, client_default or client_custom)
     */
    'default-form-validation-mode' => env('FORM_COMPONENTS_DEFAULT_VALIDATION_MODE', 'server'),

    'recaptcha' => [
        'site-key' => env('RECAPTCHA_SITE_KEY'),
        'secret-key' => env('RECAPTCHA_SECRET_KEY'),
        'version' => 'v2',
        'language' => env('RECAPTCHA_LANGUAGE', 'en-GB'),
        'size' => env('RECAPTCHA_SIZE', 'compact'), // compact, normal or invisible
        'theme' => env('RECAPTCHA_THEME', 'light'), // light or dark
        'tabindex' => env('RECAPTCHA_TABINDEX', 0), // tabindex
    ],

    'html_editor_tinymce_global_config' => [
        'height' => 400,
        'min_height' => 300,
        'skin_url' => 'default',
        'body_class' => 'form-control html-content p-3 rounded-0 border-0 shadow-none',
        'autoresize_bottom_margin' => 0,
        'menubar' => false,
        'branding' => false,
        'promotion' => false,
        'highlight_on_focus' => true,
        'plugins' => 'autoresize autosave code emoticons link lists image table quickbars',
        'content_css' => '/vendor/mlbrgn/laravel-form-components/css/tinymce-content.css',
        'toolbar' => 'restoredraft code | blocks | bold italic underline strikethrough | alignment lists outdent indent | table image link emoticons | styleselect',
        'link_default_target' => '_blank',
        'document_base_url' => '/',
        'language' => 'nl',
        'language_url' => '/vendor/mlbrgn/laravel-form-components/js/vendor/tinyMCE/langs/nl.js',
        'convert_urls' => false,
        'license_key' => 'gpl',
        'automatic_uploads' => false,
        'images_upload_handler' => null,
        'image_list' => null,
        'file_picker_callback' => 'mfcDefaultFilePickerCallback',
        'image_uploadtab' => true,   // <-- required
        'image_caption' => false, // support for caption using figure element wrapper when inserting
        'image_advtab' => true, // shows advanced tab in image dialog
        'object_resizing' => true,
        'image_class_list' => [
            ['title' => 'None', 'value' => ''],
            ['title' => 'Tiny', 'value' => 'mce-img-tiny'],
            ['title' => 'Small', 'value' => 'mce-img-small'],
            ['title' => 'Medium', 'value' => 'mce-img-medium'],
            ['title' => 'Large', 'value' => 'mce-img-large'],
            ['title' => 'Max-width', 'value' => 'mce-img-max-width'],
        ], // optional, for custom classes
        'toolbar_mode' => 'floating', // makes toolbars float over selected elements
        'contextmenu' => 'link image inserttable | cell row column deletetable',
        'quickbars_selection_toolbar' => 'bold italic | styleselect | link | image',
        'quickbars_insert_toolbar' => 'image table', // toolbar when inserting content

        // Add predefined image style formats
        'style_formats' => [
            [
                'title' => 'Image Left',
                'selector' => 'img',
                'styles' => [
                    'float' => 'left',
                    'margin' => '0 1rem',
                ],
            ],
            [
                'title' => 'Image Right',
                'selector' => 'img',
                'styles' => [
                    'float' => 'right',
                    'margin' => '0 1rem',
                ],
            ],
            [
                'title' => 'Image Center',
                'selector' => 'img',
                'styles' => [
                    'display' => 'block',
                    'margin' => '0 auto',
                ],
            ],
        ],

        'extra_scripts' => [],
        //        'automatic_uploads' => false,
    ],

    'checkbox' => [
        /**
         * Automatically add a hidden input with value=0
         * so unchecked checkboxes submit a value.
         *
         * Can be overridden per component.
         */
        'default_to_zero' => false,
    ],

    /**
     * CSP nonce callback
     * example: 'csp_nonce' => fn () => app()->bound('csp-nonce') ? app('csp-nonce') : null,
     */
    'csp_nonce' => fn () => null,

    /**
     * Theme definitions for different frameworks.
     */
    'themes' => [
        'plain' => [
            /** CSS Classes */
            'form_label' => 'mfc-label',
            'form_label_horizontal' => 'mfc-label-horizontal',
            'form_label_horizontal_sm' => 'mfc-label-horizontal-sm',
            'form_label_horizontal_lg' => 'mfc-label-horizontal-lg',
            'form_control' => 'mfc-input',
            'form_control_lg' => 'mfc-input-lg',
            'form_control_sm' => 'mfc-input-sm',
            'form_control_color' => 'mfc-input-color',
            'form_select' => 'mfc-select',
            'form_textarea' => 'mfc-textarea',
            'form_check' => 'mfc-check',
            'form_check_switch' => 'mfc-switch-wrapper',
            'form_switch_input' => 'mfc-switch',
            'form_check_inline' => 'mfc-check-inline',
            'form_check_input' => 'mfc-check-input',
            'form_radio_input' => 'mfc-radio-input',
            'form_check_label' => 'mfc-check-label',
            'button_check' => 'mfc-btn-check',
            'button' => 'mfc-btn',
            'button_toggle' => 'mfc-btn-toggle',
            'form_range' => 'mfc-range',
            'form_text' => 'mfc-help-text',
            'invalid_feedback' => 'mfc-error',
            'valid_feedback' => 'mfc-valid-feedback',
            'invalid_tooltip' => 'mfc-error-tooltip',
            'valid_tooltip' => 'mfc-valid-tooltip',
            'invalid_class' => 'mfc-invalid',
            'valid_class' => 'mfc-valid',
            'wrapper_horizontal' => 'mfc-horizontal-wrapper',
            'wrapper_horizontal_label' => 'mfc-horizontal-label',
            'wrapper_horizontal_control' => 'mfc-horizontal-control',
            'wrapper_floating' => 'mfc-floating-wrapper',
            'submit' => 'mfc-submit',
            'input_group' => 'mfc-input-group',
            'input_group_text' => 'mfc-input-group-text',
            'group' => 'mfc-field',
            'group_inline_wrapper' => 'mfc-inline-wrapper',
            'hidden' => 'mfc-hidden',
            'input_wrapper' => 'mfc-control',
            'wrapper_class_prefixes' => ['m-', 'ms-', 'mt-', 'me-', 'mb-', 'mx-', 'my-'],

            /** Structural flags */
            'use_group_wrapper' => true,
            'use_input_wrapper' => false,

            /** Preview UI theme keys */
            'preview_body' => 'mfc-preview-body',
            'preview_container' => 'mfc-preview-container',
            'preview_row' => 'mfc-preview-row',
            'preview_sidebar_column' => 'mfc-preview-sidebar-column',
            'preview_content_column' => 'mfc-preview-content-column',
            'preview_sidebar_list' => 'mfc-preview-sidebar-list',
            'preview_sidebar_item' => 'mfc-preview-sidebar-item',
            'preview_sidebar_item_active' => 'mfc-active',
            'preview_section' => 'mfc-preview-section',
            'preview_page_title' => 'mfc-preview-page-title',
            'preview_section_title' => 'mfc-preview-section-title',
            'preview_section_description' => 'mfc-preview-section-description',
            'preview_example' => 'mfc-preview-example',
            'preview_example_body' => 'mfc-preview-example-body',
            'preview_example_title' => 'mfc-preview-example-title',
            'preview_example_code' => 'mfc-preview-example-code',
            'input_group_has_validation' => 'mfc-has-validation',
            'badge_error' => 'mfc-badge-error',
        ],

        'bootstrap-5' => $bootstrap5,

        'bootstrap-6' => array_replace($bootstrap5, [
            /**
             * Bootstrap 6 specific overrides go here, e.g. 'form_check_switch' => '...'.
             * PROVISIONAL: Bootstrap 6 is unreleased, so every key currently inherits the Bootstrap 5 value.
             * Keys added to $bootstrap5 later are inherited automatically and never fall back to plain.
             */
        ]),

        'tailwind' => [
            /** CSS Classes */
            'form_label' => 'block text-sm font-medium text-gray-700',
            'form_label_horizontal' => 'block text-sm font-medium text-gray-700',
            'form_label_horizontal_sm' => 'block text-xs font-medium text-gray-700',
            'form_label_horizontal_lg' => 'block text-base font-medium text-gray-700',
            'form_control' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm',
            'form_control_lg' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-lg',
            'form_control_sm' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-xs',
            'form_control_color' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm h-10',
            'form_select' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm',
            'form_textarea' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm',
            'form_check' => 'flex items-center',
            'form_check_switch' => '',
            'form_switch_input' => 'appearance-none w-9 h-5 rounded-full border-0 bg-gray-300 checked:bg-indigo-600 checked:bg-none relative transition-colors duration-200 cursor-pointer before:absolute before:w-4 before:h-4 before:rounded-full before:bg-white before:top-0.5 before:left-0.5 checked:before:translate-x-4 before:transition-transform before:duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-indigo-600',
            'form_check_inline' => 'flex items-center inline-flex',
            'form_check_input' => 'h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500',
            'form_radio_input' => 'h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500',
            'form_check_label' => 'ml-2 block text-sm text-gray-900',
            'button_check' => 'sr-only peer',
            'button' => 'inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500',
            'button_toggle' => 'inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 peer-checked:bg-indigo-600 peer-checked:text-white peer-checked:border-transparent cursor-pointer',
            'form_range' => 'w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700',
            'form_text' => 'mt-2 text-sm text-gray-500',
            'invalid_feedback' => 'mt-2 text-sm text-red-600',
            'valid_feedback' => 'mt-2 text-sm text-green-600',
            'invalid_tooltip' => 'absolute z-10 p-2 text-sm text-white bg-red-600 rounded-md',
            'valid_tooltip' => 'absolute z-10 p-2 text-sm text-white bg-green-600 rounded-md',
            'invalid_class' => 'border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500',
            'valid_class' => 'border-green-300 text-green-900 placeholder-green-300 focus:border-green-500 focus:ring-green-500',
            'wrapper_horizontal' => 'grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6',
            'wrapper_horizontal_label' => 'sm:col-span-2',
            'wrapper_horizontal_control' => 'sm:col-span-4',
            'wrapper_floating' => 'relative',
            'submit' => 'inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500',
            'input_group' => 'mt-1 flex rounded-md shadow-sm',
            'input_group_text' => 'inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm',
            'input_group_has_validation' => '',
            'group' => 'mb-4',
            'group_inline_wrapper' => 'flex flex-row flex-wrap gap-4',
            'hidden' => 'hidden',
            'input_wrapper' => '',
            'wrapper_class_prefixes' => ['m-', 'ms-', 'mt-', 'me-', 'mb-', 'mx-', 'my-'],

            /** Structural flags */
            'use_group_wrapper' => true,
            'use_input_wrapper' => false,

            /** Preview UI theme keys */
            'preview_body' => 'bg-gray-50',
            'preview_container' => 'max-w-7xl mx-auto py-6 sm:px-6 lg:px-8',
            'preview_row' => 'flex flex-wrap -mx-4',
            'preview_sidebar_column' => 'hidden lg:block lg:w-1/4 px-4',
            'preview_content_column' => 'w-full lg:w-3/4 px-4',
            'preview_sidebar_list' => 'space-y-1',
            'preview_sidebar_item' => 'text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md',
            'preview_sidebar_item_active' => 'bg-gray-100 text-gray-900',
            'preview_section' => 'mb-12',
            'preview_page_title' => 'text-3xl font-bold leading-tight text-gray-900 mb-8 border-b pb-4',
            'preview_section_title' => 'text-2xl font-bold text-gray-900 mt-10 mb-4',
            'preview_section_description' => 'text-lg text-gray-500 mb-6',
            'preview_example' => 'bg-white overflow-hidden shadow rounded-lg mb-6',
            'preview_example_body' => 'px-4 py-5 sm:p-6',
            'preview_example_title' => 'text-lg leading-6 font-medium text-gray-900 mb-4',
            'preview_example_code' => 'bg-gray-800 p-4 rounded-b-lg mt-4 text-gray-300 overflow-x-auto',
            'badge_error' => 'mt-2 text-sm text-red-600 font-bold',
        ],

        'daisyui' => [
            /** CSS Classes - Supports DaisyUI v4 */
            'form_label' => 'label-text',
            'form_label_horizontal' => 'label-text',
            'form_label_horizontal_sm' => 'label-text text-xs',
            'form_label_horizontal_lg' => 'label-text text-lg',
            'form_control' => 'input input-bordered w-full',
            'form_control_lg' => 'input input-bordered input-lg w-full',
            'form_control_sm' => 'input input-bordered input-sm w-full',
            'form_control_color' => 'input input-bordered w-full h-10 p-1',
            'form_select' => 'select select-bordered w-full',
            'form_textarea' => 'textarea textarea-bordered w-full',
            'form_check' => 'form-control',
            'form_check_switch' => '',
            'form_switch_input' => 'toggle',
            'form_check_inline' => 'form-control inline-flex',
            'form_check_input' => 'checkbox',
            'form_radio_input' => 'radio',
            'form_check_label' => 'label cursor-pointer justify-start gap-2',
            'button_check' => 'sr-only peer',
            'button' => 'btn',
            'button_toggle' => 'btn peer-checked:btn-primary cursor-pointer',
            'form_range' => 'range',
            'form_text' => 'label-text-alt mt-1',
            'invalid_feedback' => 'text-error text-sm mt-1',
            'valid_feedback' => 'text-success text-sm mt-1',
            'invalid_tooltip' => 'tooltip tooltip-open tooltip-error',
            'valid_tooltip' => 'tooltip tooltip-open tooltip-success',
            'invalid_class' => 'input-error',
            'form_check_invalid_class' => 'checkbox-error',
            'form_radio_invalid_class' => 'radio-error',
            'form_select_invalid_class' => 'select-error',
            'form_textarea_invalid_class' => 'textarea-error',
            'form_switch_invalid_class' => 'toggle-error',
            'valid_class' => 'input-success',
            'wrapper_horizontal' => 'flex flex-col sm:flex-row gap-4',
            'wrapper_horizontal_label' => 'sm:w-1/3',
            'wrapper_horizontal_control' => 'sm:w-2/3',
            'wrapper_floating' => '',
            'submit' => 'btn btn-primary',
            'input_group' => 'join',
            'input_group_text' => 'join-item btn btn-disabled no-animation',
            'input_group_has_validation' => '',
            'group' => 'form-control w-full mb-4',
            'group_inline_wrapper' => 'flex flex-row flex-wrap gap-4',
            'hidden' => 'hidden',
            'input_wrapper' => '',
            'wrapper_class_prefixes' => ['m-', 'ms-', 'mt-', 'me-', 'mb-', 'mx-', 'my-'],

            /** Structural flags */
            'use_group_wrapper' => true,
            'use_input_wrapper' => false,

            /** Preview UI theme keys */
            'preview_body' => 'bg-base-200 min-h-screen',
            'preview_container' => 'container mx-auto p-4 lg:p-10',
            'preview_row' => 'flex flex-col lg:flex-row gap-8',
            'preview_sidebar_column' => 'w-full lg:w-64',
            'preview_content_column' => 'flex-1',
            'preview_sidebar_list' => 'menu bg-base-100 w-full rounded-box shadow-sm',
            'preview_sidebar_item' => '',
            'preview_sidebar_item_active' => 'active',
            'preview_section' => 'mb-12',
            'preview_page_title' => 'text-4xl font-bold mb-8 border-b border-base-300 pb-4',
            'preview_section_title' => 'text-2xl font-bold mt-10 mb-4',
            'preview_section_description' => 'text-base-content/70 mb-6',
            'preview_example' => 'card bg-base-100 shadow-xl mb-6',
            'preview_example_body' => 'card-body',
            'preview_example_title' => 'card-title mb-4',
            'preview_example_code' => 'mockup-code mt-4',
            'badge_error' => 'badge badge-error',
        ],
    ],

    /*
     |--------------------------------------------------------------------------
     | DEVELOPER ONLY
     |--------------------------------------------------------------------------
     |
     | Only used by the developer
     */
    'mfc_using_local_package' => env('MFC_USING_LOCAL_PACKAGE', false),

    /*
      |--------------------------------------------------------------------------
      | Deprecated features
      |--------------------------------------------------------------------------
      |
      | Only used by the developer
      */
    'mfc_deprecated_dot_syntax' => false,
];

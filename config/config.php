<?php

return [

    /** which frontend framework to use, only bootstrap 5 is supported (for now) */
    'framework' => env('FORM_COMPONENTS_FRAMEWORK', 'bootstrap-5'),

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
        'content_css' => 'vendor/mlbrgn/laravel-form-components/css/tiny-mce-content.css',
        'toolbar' => 'restoredraft code | blocks | bold italic underline strikethrough | alignment lists outdent indent | table image link emoticons | styleselect',
        'link_default_target' => '_blank',
        'document_base_url' => '/',
        'language' => 'nl',
        'convert_urls' => false,
        'license_key' => 'gpl',
        'automatic_uploads' => false,
        'images_upload_handler' => null,
        'image_list' => null,
        'file_picker_callback' => 'mfcDefaultFilePickerCallback',
        'image_uploadtab' => true,   // <-- required
        'image_caption' => false,// support for caption using figure element wrapper when inserting
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

        'extra_scripts' => []
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

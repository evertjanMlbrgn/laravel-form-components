<?php

return [

    /** which frontend framework to use, only bootstrap 5 is supported (for now) */
    'framework' => env('FORM_COMPONENTS_FRAMEWORK', 'bootstrap-5'),

    /** the component view_namespace is used when accessing views from within this package e.g.
     * when view_namespace is set to 'my-namespace', then you can call the view with "my-namespace::component-name"
     * **/
    'view_namespace' => env('FORM_COMPONENTS_VIEW_NAMESPACE', 'form-components'),

    /** the prefix used before the component name
     * when prefix === 'something' then the component can be used as <x-something-component-name>
     */
    'tag_prefix' => env('FORM_COMPONENTS_TAG_PREFIX', 'form'),

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
    'relationship_convert_field_name_to_camelcase_for_relationships' => env('FORM_COMPONENTS_CONVERT_FIELD_NAME_TO_CAMELCASE_FOR_RELATIONSHIPS', true),

    /**
     * use disabled option as placeholder in select
     **/
    'use_class_instead_of_disabled_in_select_placeholder' => env('FORM_COMPONENTS_USE_CLASS_INSTEAD_OF_DISABLED_IN_SELECT_PLACEHOLDER', true),


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

];

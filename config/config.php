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
     * If you use Eloquent's Date Casting feature, you can use the date attributes in your forms by setting the
     * use_eloquent_date_casting configuration key to true
     **/
    'use_eloquent_date_casting' => env('FORM_COMPONENTS_USE_ELOQUENT_DATE_CASTING', false),

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
    'use_wrapper_classes' => env('FORM_COMPONENTS_USE_WRAPPER_CLASSES', true)

];

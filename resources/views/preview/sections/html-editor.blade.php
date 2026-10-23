<x-form::preview.components.section id="form-html-editor" title="HTML Editor">
    <x-form::preview.components.example title="Basic HTML Editor">
        <x-form-html-editor name="content_basic" label="Biography" id="editor-basic">
                <p>Hello World!</p>
            </x-form-html-editor>
        <x-slot:code>
            @verbatim
<x-form-html-editor name="content_basic" label="Biography" id="editor-basic">
    <p>Hello World!</p>
</x-form-html-editor>
            @endverbatim
        </x-slot:code>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Horizontal HTML Editor">
        <x-form-html-editor name="content_horizontal" label="Horizontal Biography" horizontal id="editor-horizontal">
                <p>Hello Horizontal World!</p>
            </x-form-html-editor>
        <x-slot:code>
            @verbatim
<x-form-html-editor name="content_horizontal" label="Horizontal Biography" horizontal id="editor-horizontal">
    <p>Hello Horizontal World!</p>
</x-form-html-editor>
            @endverbatim
        </x-slot:code>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Floating Label HTML Editor">
        <x-form-html-editor name="content_floating" label="Floating Biography" floating id="editor-floating">
                <p>Hello Floating World!</p>
            </x-form-html-editor>
        <x-slot:code>
            @verbatim
<x-form-html-editor name="content_floating" label="Floating Biography" floating id="editor-floating">
    <p>Hello Floating World!</p>
</x-form-html-editor>
            @endverbatim
        </x-slot:code>
    </x-form::preview.components.example>

    <x-form::preview.components.example title="Custom Configuration">
        <x-form-html-editor
                name="content_custom"
                label="Custom Editor"
                id="editor-custom"
                :tinymce-config="['height' => 500, 'menubar' => false]"
            >
                <p>This editor has a custom height of 500px and no menubar.</p>
            </x-form-html-editor>
        <x-slot:code>
            @verbatim
<x-form-html-editor
    name="content_custom"
    label="Custom Editor"
    id="editor-custom"
    :tinymce-config="['height' => 500, 'menubar' => false]"
>
    <p>This editor has a custom height of 500px and no menubar.</p>
</x-form-html-editor>
            @endverbatim
        </x-slot:code>
    </x-form::preview.components.example>
</x-form::preview.components.section>

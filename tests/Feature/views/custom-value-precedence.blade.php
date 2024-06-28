@php
    $bind1 = [
        'input-3' => 'value 3 by bind directive',
        'input-4' => 'value 4 by bind directive',
        'input-5' => 'value 5 by bind directive',
        'textarea-3' => 'value 3 by bind directive',
        'textarea-4' => 'value 4 by bind directive',
        'textarea-5' => 'value 5 by bind directive',
        'html-editor-3' => 'value 3 by bind directive',
        'html-editor-4' => 'value 4 by bind directive',
        'html-editor-5' => 'value 5 by bind directive',
        ];

      $bind2 = [
        'input-3' => 'value 3 by bind attribute',
        'input-4' => 'value 4 by bind attribute',
        'input-5' => 'value 5 by bind attribute',
        'textarea-3' => 'value 3 by bind attribute',
        'textarea-4' => 'value 4 by bind attribute',
        'textarea-5' => 'value 5 by bind attribute',
        'html-editor-3' => 'value 3 by bind attribute',
        'html-editor-4' => 'value 4 by bind attribute',
        'html-editor-5' => 'value 5 by bind attribute',
       ];

    session()->flash('_old_input', [
       'input-5' => 'value 5 by old value',
       'textarea-5' => 'value 5 by old value',
       'html-editor-5' => 'value 5 by old value',
   ]);
@endphp

<x-form-form id="form-value-precedence">
    @bind($bind1)
    <x-form-input name="input-1" default="value 1 by default"></x-form-input>
    <x-form-input name="input-2" default="value 2 by default" value="value 2 by value attribute"></x-form-input>
    <x-form-input name="input-3" default="value 3 by default" value="value 3 by value attribute"></x-form-input>
    <x-form-input name="input-4" default="value 4 by default" :bind="$bind2" value="value 4 by value attribute"></x-form-input>
    <x-form-input name="input-5" default="value 5 by default" value="value 5 by value attribute"></x-form-input>

    <x-form-textarea name="textarea-1" default="value 1 by default"></x-form-textarea>
    <x-form-textarea name="textarea-2" default="value 2 by default" value="value 2 by value attribute"></x-form-textarea>
    <x-form-textarea name="textarea-3" default="value 3 by default" value="value 3 by value attribute"></x-form-textarea>
    <x-form-textarea name="textarea-4" default="value 4 by default" :bind="$bind2" value="value 4 by value attribute"></x-form-textarea>
    <x-form-textarea name="textarea-5" default="value 5 by default" value="value 5 by value attribute"></x-form-textarea>

    <x-form-html-editor name="html-editor-1" default="value 1 by default"></x-form-html-editor>
    <x-form-html-editor name="html-editor-2" default="value 2 by default" value="value 2 by value attribute"></x-form-html-editor>
    <x-form-html-editor name="html-editor-3" default="value 3 by default" value="value 3 by value attribute"></x-form-html-editor>
    <x-form-html-editor name="html-editor-4" default="value 4 by default" :bind="$bind2" value="value 4 by value attribute"></x-form-html-editor>
    <x-form-html-editor name="html-editor-5" default="value 5 by default" value="value 5 by value attribute"></x-form-html-editor>
    @endbind
</x-form-form>

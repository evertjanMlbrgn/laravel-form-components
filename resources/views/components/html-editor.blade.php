@if(!$hidden)

    {{-- Wrapper for floating, hidden or horizontal controls, classes go on the wrapper, other attributes on control itself --}}
    @if($floating || $hidden || $horizontal)
    <div
        {{ $attributes->onlyWrapperClasses()->class([
            'row' => $horizontal,
            'form-floating' => $floating,
            'd-none' => $hidden
       ]) }}
    >
    @endif

    {{-- label before control --}}
    @if(!$attributes->has('label-end') && (!$floating || $horizontal))
        <x-mlbrgn-form-label
            :parentClasses="$attributes->get('class')"
            :required="$attributes->has('required')"
            @class([
                $attributes->get('class-label', ''),
                'col-4' => $horizontal && empty($attributes->get('class-horizontal-cols-label', '')),
                $attributes->get('class-horizontal-cols-label', '')
             ])
            :for="$id">
            {{ $label }}
        </x-mlbrgn-form-label>
    @endif

    {{-- horizontal control wrapper --}}
    @if($horizontal)
        <div
            @class([
                 'col-8' => empty($attributes->get('class-horizontal-cols-control', '')),
                 $attributes->get('class-horizontal-cols-control', '') => !empty($attributes->get('class-horizontal-cols-control', ''))
             ])
        >
    @endif

@endif
        {{-- Textarea element --}}
        <textarea
            @if(!$floating && !$horizontal)
                {{ $attributes->class([
                    'form-control',
                    'html-editor',
                    'is-invalid' => $hasError($name)
                ])->whereDoesntStartWith('class-')->except(['label-end', 'id']) }}
            @else
                {{ $attributes->exceptWrapperClasses()->class([
                    'form-control',
                    'html-editor',
                    'is-invalid' => $hasError($name)
                ])->whereDoesntStartWith('class-')->except(['label-end', 'id']) }}
            @endif
            @if($name)
                name="{{ $name }}"
            @endif
            id="{{ $id }}"

            {{-- Placeholder is required as of writing --}}
            @if($floating && !$attributes->get('placeholder'))
                placeholder="&nbsp;"
            @endif
            @if(isset($help) && !$hidden)
                aria-describedby="{{ $id }}-help-text"
            @endif
            @if(!empty($extraFormData))
                data-extra-form-data="{{ json_encode($extraFormData) }}"
            @endif
            data-tinymce-config='{{ $tinymceConfigJson }}'
        >{{ $value ?? $slot }}</textarea>
        {{-- important there should be no space between > and < otherwise placeholder won't show !!!  --}}

        {{-- TinyMCE.js puts temporary media paths here --}}
        <div class="content-media">
            @foreach (old('content_media', []) as $media)
                <input {{-- type="hidden" --}} name="content_media[]" value="{{ $media }}">
            @endforeach
        </div>
@if(!$hidden)

    {{-- client side feedback messages --}}
    @if($showErrors)
        @if(!empty($validFeedback))
            <div
                @class([
                    'valid-feedback' => !$tooltipFeedback,
                    'valid-tooltip' => $tooltipFeedback,
                ])>
                {{ $validFeedback }}
            </div>
        @endif

        @if(!empty($invalidFeedback))
            <div @class([
            'invalid-feedback' => !$tooltipFeedback,
            'invalid-tooltip' => $tooltipFeedback,
        ])>
                {{ $invalidFeedback }}
            </div>
        @endif
    @endif

    {{-- label after control --}}
    @if($attributes->has('label-end') || ($floating && !$horizontal))
        <x-mlbrgn-form-label
            :parentClasses="$attributes->get('class')"
            :required="$attributes->has('required')"
            @class([
               $attributes->get('class-label', '')
           ])
            :for="$id">
            {{ $label }}
        </x-mlbrgn-form-label>
    @endif

    {{-- server side feedback messages --}}
    @if($shouldShowError($name))
        <x-mlbrgn-form-errors :name="$name" />
    @endif

    {{-- Help text --}}
    @if(isset($help))
        <x-mlbrgn-form-text
            :id="$id"
            @class([
                $attributes->get('class-help-text', '') => $attributes->has('class-help-text')
            ])
        >{{ $help }}</x-mlbrgn-form-text>
    @endif

    @if(!empty($helpText) && !isset($help))
        <x-mlbrgn-form-text
            :id="$id"
            @class([
                $attributes->get('class-help-text', '') => $attributes->has('class-help-text')
            ])
        >{{ $helpText }}</x-mlbrgn-form-text>
    @endif

    {{-- close horizontal control wrapper --}}
    @if($horizontal)
        </div>
    @endif

    {{-- Close wrapper for floating, hidden or horizontal controls --}}
    @if($floating || $hidden || $horizontal)
        </div>
    @endif
@endif

@once
    <script>
        // document.addEventListener('DOMContentLoaded', () => {
            window.mlbHtmlEditorTinymceConfig ??= {};
            window.mlbHtmlEditorTinymceConfig = @json(config('form-components.html_editor_tinymce_global_config'));
            console.log('window.mlbHtmlEditorTinymceConfig', window.mlbHtmlEditorTinymceConfig)
        // })
    </script>
    <script src="{{ mlbrgnAsset('js/mlbrgn-html-editor.js') }}"></script>
    <link rel="stylesheet" href="{{ mlbrgnAsset('css/mlbrgn-form-components.css') }}">
@endonce

@stack('mfc-html-editor-assets')

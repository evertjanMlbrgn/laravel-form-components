@if(!$hidden)

    {{-- Wrapper for floating or horizontal controls, classes go on the wrapper, other attributes on control itself --}}
    <x-mlbrgn-form-components::layout.form-group :name="$name" :horizontal="$horizontal" :floating="$floating" :showErrors="$showErrors" :attributes="$attributes">

    {{-- label before control --}}
    @if(!$attributes->has('label-end') && (!$floating || $horizontal))
        <x-mlbrgn-form-components::label
            :parentClasses="$attributes->get('class')"
            :required="$attributes->has('required')"
            @class([
                $attributes->get('class-label', ''),
                theme_class('wrapper_horizontal_label') => $horizontal && empty($attributes->get('class-horizontal-cols-label', '')),
                $attributes->get('class-horizontal-cols-label', '')
             ])
            :for="$id">
            {{ $label }}
        </x-mlbrgn-form-components::label>
    @endif

    {{-- horizontal control wrapper --}}
    <x-mlbrgn-form-components::layout.form-input-wrapper :horizontal="$horizontal" :attributes="$attributes">
@endif
        {{-- Textarea element --}}
        <textarea
            {{ $attributes->exceptWrapperClasses()->class([
                theme_class('form_control'),
                'html-editor',
                theme_class('invalid_class') => $hasError($name)
            ])->whereDoesntStartWith('class-')->except(['label-end', 'id'])
            ->merge(['data-mlbrgn-html-editor' => (!$floating && !$horizontal)]) }}
            @if($name)
                name="{{ $name }}"
            @endif
            id="{{ $id }}"

            {{-- Placeholder is required as of writing --}}
            @if($floating && !$attributes->get('placeholder'))
                placeholder="&nbsp;"
            @endif
            @if((isset($help) || !empty($helpText) || $hasError($name)) && !$hidden)
                aria-describedby="{{ trim(((isset($help) || !empty($helpText)) ? $id . '-help-text ' : '') . ($hasError($name) ? $id . '-error' : '')) }}"
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
                    theme_class('valid_feedback') => !$tooltipFeedback,
                    theme_class('valid_tooltip') => $tooltipFeedback,
                ])>
                {{ $validFeedback }}
            </div>
        @endif

        @if(!empty($invalidFeedback))
            <div @class([
            theme_class('invalid_feedback') => !$tooltipFeedback,
            theme_class('invalid_tooltip') => $tooltipFeedback,
        ])>
                {{ $invalidFeedback }}
            </div>
        @endif
    @endif

    {{-- label after control --}}
    @if($attributes->has('label-end') || ($floating && !$horizontal))
        <x-mlbrgn-form-components::label
            :parentClasses="$attributes->get('class')"
            :required="$attributes->has('required')"
            @class([
               $attributes->get('class-label', '')
           ])
            :for="$id">
            {{ $label }}
        </x-mlbrgn-form-components::label>
    @endif

    {{-- server side feedback messages --}}
    @if($shouldShowError($name))
        <x-mlbrgn-form-components::errors :name="$name" :id="$id . '-error'" />
    @endif

    {{-- Help text --}}
    @if(isset($help))
        <x-mlbrgn-form-components::text
            :id="$id"
            @class([
                $attributes->get('class-help-text', '') => $attributes->has('class-help-text')
            ])
        >{{ $help }}</x-mlbrgn-form-components::text>
    @endif

    @if(!empty($helpText) && !isset($help))
        <x-mlbrgn-form-components::text
            :id="$id"
            @class([
                $attributes->get('class-help-text', '') => $attributes->has('class-help-text')
            ])
        >{{ $helpText }}</x-mlbrgn-form-components::text>
    @endif

    {{-- close horizontal control wrapper --}}
    </x-mlbrgn-form-components::layout.form-input-wrapper>

    {{-- Close wrapper for floating or horizontal controls --}}
    </x-mlbrgn-form-components::layout.form-group>
@endif

{{-- Automatically include assets once per page --}}
{{--@php--}}
{{--    $nonce = mlbrgn_csp_nonce();--}}
{{--@endphp--}}
@once
    <x-mlbrgn-form-components::assets :asset-config="$assetConfig()" />
@endonce

{{-- Inline TinyMCE config --}}
{{--<script--}}
{{--    @isset($nonce) nonce="{{ $nonce }}" @endisset--}}
{{-->--}}
{{--    window.mlbHtmlEditorTinymceConfig ??= {};--}}
{{--    window.mlbHtmlEditorTinymceConfig = @json($tinymceConfig());--}}
{{--    console.log('window.mlbHtmlEditorTinymceConfig', window.mlbHtmlEditorTinymceConfig);--}}
{{--</script>--}}

@stack('mfc-html-editor-assets')

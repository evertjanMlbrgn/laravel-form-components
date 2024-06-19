{{-- cache id, new on generated each time $getId() is called if no name or id attribute --}}
<?php
    $id = $getId();
?>

@if($floating || $hidden || $horizontal)
    <div
        {{ $attributes->class([
            'row' => $horizontal,
            'form-floating' => $floating,
            'd-none' => $hidden
       ])->filter(fn (string $value, string $key) => $key === 'class') }}
    >
        @endif

        @if(!$hidden && (!$floating || $horizontal))
            <x-mlbrgn-form-label
                :parentClasses="$attributes->get('class')"
                :required="$attributes->has('required')"
                @class([
                    'col-4' => empty($classLabel),
                    $classLabel
                 ])
                :for="$id">
                {{ $label }}
            </x-mlbrgn-form-label>
        @endif

        @if($horizontal)
            <div
                @class([
                     'col-8' => empty($classControl),
                     $classControl => !empty($classControl)
                 ])
            >
        @endif
                <textarea
                    @if(!$floating && !$horizontal)
                        {{ $attributes->class([
                            'form-control',
                            'html-editor',
                            'is-invalid' => $hasError($name)
                        ]) }}
                    @else
                        {{ $attributes->filter(fn (string $value, string $key) => $key !== 'class') }}
                        @class([
                            'form-control',
                            'html-editor',
                            'is-invalid' => $hasError($name)
                        ])
                    @endif
                    name="{{ $name }}"
                    id="{{ $id }}"
{{--                    @if($required) required @endif--}}

                    {{-- Placeholder is required as of writing --}}
                    @if($floating && !$attributes->get('placeholder'))
                        placeholder="&nbsp;"
                    @endif
                >{{ $slot }}</textarea>
                {{-- important there should be no space between > and < otherwise placeholder won't show !!!  --}}

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
                @if($horizontal)
            </div>
        @endif

        @if(!$hidden && ($floating && !$horizontal))
            <x-mlbrgn-form-label
                :parentClasses="$attributes->get('class')"
                :required="$attributes->has('required')"
                @class([
                   $classLabel
               ])
                :for="$id">
                {{ $label }}
            </x-mlbrgn-form-label>
        @endif

        @if($shouldShowError($name))
            <x-mlbrgn-form-errors :name="$name" />
        @endif

        @if(isset($help))
            <x-mlbrgn-form-text :id="$id">{{ $help }}</x-mlbrgn-form-text>
        @endif

        @if(isset($helpText) && !isset($help))
            <x-mlbrgn-form-text :id="$id">{{ $helpText }}</x-mlbrgn-form-text>
        @endif

        @if($floating || $hidden || $horizontal)
            </div>
        @endif

@once
    <script src="{{ package_asset('html-editor.js') }}"></script>
@endonce

{{-- TODO don't know if hidden is needed, why does input need it? --}}
{{--@props([--}}
{{--    'multiple' => false--}}
{{--])--}}

{{-- cache id, new on generated each time $getId() is called if no name or id attribute --}}
<?php
    $id = $getId();
?>

@if($floating || $horizontal)
    <div @class([
    'row' => $horizontal,
    'form-floating' => $floating
    ])>
@endif

        @if(!$floating || $horizontal)
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
                <select
                    {{ $attributes->class([
                        'form-select',
                        'is-invalid' => $hasError($name)
                    ]) }}
                    name="{{ $name }}"
                    id="{{ $id }}"
                    @if($multiple) multiple @endif
                    @if($floating && empty($placeholder))
                        placeholder="&nbsp;"
                    @else
                        placeholder="{{ $placeholder }}"
                    @endif
                    @if(isset($help))
                        aria-describedby="{{ $id }}-help-text"
                    @endif
                    >

        @if($horizontal)
            </div>
        @endif

                    @if($placeholder)
                        <option value="" disabled @if($nothingSelected()) selected="selected" @endif>
                            {{ $placeholder }}
                        </option>
                    @endif

                    @forelse($options as $key => $option)
                        <option value="{{ $key }}" @if($isSelected($key)) selected="selected" @endif>
                            {{ $option }}
                        </option>
                    @empty
                        {{ $slot }}
                    @endforelse
                </select>

            @if($floating && !$horizontal)
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

            @if(!empty($validFeedback))
                <div @class([
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

            @if(isset($help))
                <x-mlbrgn-form-text :id="$id">{{ $help }}</x-mlbrgn-form-text>
            @endif

            @if($shouldShowError($name))
                <x-mlbrgn-form-errors :name="$name" />
            @endif


@if($floating || $horizontal)
    </div>
@endif

{{-- TODO don't know if hidden is needed, why does input need it? --}}
{{--@props([--}}
{{--    'multiple' => false--}}
{{--])--}}

{{-- cache id, new on generated each time $getId() is called if no name or id attribute --}}
<?php
    $id = $getId();
?>

@if($floating || $horizontal)
    <div
        {{ $attributes->class([
          'row' => $horizontal,
          'form-floating' => $floating
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
                <select
                    @if(!$floating && !$horizontal)
                        {{ $attributes->class([
                            'form-select',
                            'is-invalid' => $hasError($name)
                        ]) }}
                    @else
                        {{ $attributes->filter(fn (string $value, string $key) => $key !== 'class') }}
                        @class([
                            'form-select',
                            'is-invalid' => $hasError($name)
                        ])
                    @endif
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
                    @if($hidden)
                        hidden
                    @endif
                    >

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

            @if(isset($help))
                <x-mlbrgn-form-text :id="$id">{{ $help }}</x-mlbrgn-form-text>
            @endif

            @if($shouldShowError($name))
                <x-mlbrgn-form-errors :name="$name" />
            @endif


@if($floating || $horizontal)
    </div>
@endif

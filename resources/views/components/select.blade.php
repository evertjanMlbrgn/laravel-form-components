{{--<x-form-control-wrapper :id="$getId()">--}}
{{-- TODO don't know if hidden is needed, why does input need it? --}}
@if($floating || $horizontal)
    <div @class([
    'row' => $horizontal,
    'form-floating' => $floating
    ])>
@endif

        @if(!$floating || $horizontal)
            <x-form-label
                :parentClasses="$attributes->get('class')"
                @class([
                   'col-4' => empty($classLabel),
                   $classLabel
                ])
                :for="$getId()">
                {{ $label }}
            </x-form-label>
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
                    id="{{ $getId() }}"
                    @if($multiple) multiple @endif
                    @if($placeholder) placeholder="{{ $placeholder }}"@endif
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
                <x-form-label
                    :parentClasses="$attributes->get('class')"
                    @class([
                        $classLabel
                    ])
                    :for="$getId()">
                    {{ $label }}
                </x-form-label>
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

            {{ $help ?? null }}

            @if($shouldShowError($name))
                <x-form-errors :name="$name" />
            @endif


@if($floating || $horizontal)
    </div>
@endif

{{--</x-form-control-wrapper>--}}

@if(!$hidden)

    {{-- Wrapper for floating or horizontal controls, classes go on the wrapper, other attributes on control itself --}}
    @if($floating || $horizontal)
        <div
            {{ $attributes->onlyWrapperClasses()->class([
              'row' => $horizontal,
              'form-floating' => $floating
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
                {{-- Select element --}}
                {{-- NOTE: select element does not support value attribute --}}
                <select
                    @if(!$floating && !$horizontal)
                        {{ $attributes->class([
                            'form-select',
                            'is-invalid' => $hasError($name)
                        ])->whereDoesntStartWith('class-')->except(['placeholder', 'label-end', 'id']) }}
                    @else
                        {{ $attributes->exceptWrapperClasses()->class([
                       'form-select',
                       'is-invalid' => $hasError($name)
                   ])->whereDoesntStartWith('class-')->except(['placeholder', 'label-end', 'id']) }}
                    @endif
                    @if($name)
                        name="{{ $name }}"
                    @endif
                    id="{{ $id }}"
                    @if($multiple) multiple @endif
                    {{-- select cannot have a placeholder attribute--}}
                    @if(isset($help) && !$hidden)
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

@if(!$hidden)

        {{-- client side feedback messages --}}
        @if($showErrors)

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
                <x-mlbrgn-form-text :id="$id">{{ $help }}</x-mlbrgn-form-text>
            @endif

            @if(!empty($helpText) && !isset($help))
                <x-mlbrgn-form-text :id="$id">{{ $helpText }}</x-mlbrgn-form-text>
            @endif

        {{-- close horizontal control wrapper --}}
        @if($horizontal)
            </div>
        @endif

    {{-- Close wrapper for floating or horizontal controls --}}
    @if($floating || $horizontal)
        </div>
    @endif

@endif


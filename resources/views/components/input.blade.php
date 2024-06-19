{{-- Only add a wrapper element when floating label, hidden or horizontal control --}}
{{-- Label position should always be before control, except when floating, ignore floating when horizontal control --}}

{{-- If checkbox or radio use dedicated components --}}
@if($type === 'button')
    @include('form-components::button', ['classButton' => 'btn-primary', 'slot' => $attributes->get('value')])
@elseif($type === 'checkbox')
    @include('form-components::checkbox', ['toggle' => false, 'checked' => $attributes->has('checked'), 'classButton' => '', 'labelButton' => ''])
@elseif($type === "radio")
    @include('form-components::radio', ['toggle' => false, 'checked' => $attributes->has('checked'), 'classButton' => '', 'labelButton' => ''])
@elseif($type === 'reset')
    @include('form-components::button', ['type' => 'reset', 'classButton' => 'btn-primary', 'slot' => $attributes->get('value')])
@elseif($type === 'submit')
    @include('form-components::button', ['type' => 'submit', 'classButton' => 'btn-primary', 'slot' => $attributes->get('value')])
@else

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

        @if(!$hidden && $type !== 'hidden' && (!$floating || $horizontal))
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
                <input
                    @if(!$floating && !$horizontal)
                        {{ $attributes->class([
                        'form-control' => $type !== 'range',
                        'form-range' => $type === 'range',
                        'form-control-color' => ($type === 'color'),
                        'is-invalid' => ($hasError($name)),
                        ]) }}
                    @else
                        {{ $attributes->filter(fn (string $value, string $key) => $key !== 'class') }}
                        @class([
                            'form-control' => $type !== 'range',
                            'form-range' => $type === 'range',
                            'form-control-color' => ($type === 'color'),
                            'is-invalid' => ($hasError($name)),
                        ])
                    @endif
                    type="{{ $type }}"
                    value="{{ $value ?? ($type === 'color' ? '#000000' : '') }}"
                    name="{{ $name }}"
                    id="{{ $id }}"
                    @if ($hidden)
                        hidden
                    @endif
                    @if(isset($help))
                    aria-describedby="{{ $id }}-help-text"
                    @endif
                    {{-- floating labels won't work without placeholder, yet they never display placeholder either --}}
                    @if($floating && !$attributes->has('placeholder')) placeholder="&nbsp;"@endif
                >

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

        @if(!$hidden && $type !== 'hidden' && ($floating && !$horizontal))
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

        @if($horizontal)
            </div>
        @endif

    @if($floating || $horizontal)
        </div>
    @endif
@endif

{{-- Only add a wrapper element when floating label, hidden or horizontal control --}}
{{-- Label position should always be before control, except when floating, ignore floating when horizontal control --}}

{{-- If checkbox or radio use dedicated components --}}
@if($type === 'button')
    @include('form-components::button')
@elseif($type === 'checkbox')
    @include('form-components::checkbox', ['toggle' => false, 'checked' => $attributes->has('checked'), 'classButton' => '', 'labelButton' => ''])
{{--@elseif($type === 'image')--}}
{{--    TODO do something with image buttons--}}
@elseif($type === "radio")
    @include('form-components::radio', ['toggle' => false, 'checked' => $attributes->has('checked'), 'classButton' => '', 'labelButton' => ''])
@elseif($type === 'reset')
    @include('form-components::button', ['type' => 'reset'])
@elseif($type === 'submit')
    @include('form-components::button', ['type' => 'submit'])
@else

    {{-- cache id, new on generated each time $getId() is called if no name or id attribute --}}
    <?php
        $id = $getId();
    ?>

    @if($floating || $hidden || $horizontal)
        <div @class([
        'row' => $horizontal,
        'form-floating' => $floating,
        'd-none' => $hidden
        ])  >
    @endif

        @if(!$floating || $horizontal)
            <x-form-label
                :parentClasses="$attributes->get('class')"
                :required="$attributes->has('required')"
                @class([
                   'col-4' => empty($classLabel),
                   $classLabel
                ])

                :for="$id">
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
                <input
                    {{ $attributes->class([
                    'form-control' => $type !== 'range',
                    'form-range' => $type === 'range',
                    'form-control-color' => ($type === 'color'),
                    'is-invalid' => ($hasError($name))
                    ]) }}
                    type="{{ $type }}"
                    value="{{ $value ?? ($type === 'color' ? '#000000' : '') }}"
                    name="{{ $name }}"
                    id="{{ $id }}"
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

        @if($horizontal)
                </div>
        @endif

        @if($floating && !$horizontal)
            <x-form-label
                :parentClasses="$attributes->get('class')"
                :required="$attributes->has('required')"
                @class([
                   $classLabel
               ])
                :for="$id">
                {{ $label }}
            </x-form-label>
        @endif

        @if(isset($help))
            <x-form-text :id="$id">{{ $help }}</x-form-text>
        @endif

        @if($shouldShowError($name))
            <x-form-errors :name="$name" />
        @endif

    @if($floating || $hidden || $horizontal)
        </div>
    @endif
@endif

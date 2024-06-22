{{-- If checkbox or radio use dedicated components --}}

    {{-- Handle different input types --}}
    @if(in_array($type, ['button', 'reset', 'submit']))
        @include('form-components::button', [
            'type' => $type,
            'classButton' => 'btn-primary',
            'slot' => $attributes->get('value')
        ])
    @elseif(in_array($type, ['checkbox', 'radio']))
        @include('form-components::' . $type, [
            'toggle' => false,
            'checked' => $attributes->has('checked'),
            'classButton' => '',
            'labelButton' => ''
        ])
    @else

    {{-- Cache ID to avoid generating multiple times --}}
    <?php $id = $getId(); ?>

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
    @if(!$hidden && $type !== 'hidden')
        @if(!$attributes->has('label-end') && (!$floating || $horizontal))
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
    @endif

{{-- horizontal control wrapper --}}
@if($horizontal)
    <div
        @class([
            'col-8' => empty($classControl),
            $classControl => !empty($classControl)
        ])
    >
@endif
        {{-- Input element --}}
        <input
            @if(!$floating && !$horizontal)
                {{ $attributes->class([
                    'form-control' => $type !== 'range',
                    'form-range' => $type === 'range',
                    'form-control-color' => ($type === 'color'),
                    'is-invalid' => ($hasError($name)),
                ]) }}
            @else
                {{ $attributes->exceptWrapperClasses()->class([
                    'form-control' => $type !== 'range',
                    'form-range' => $type === 'range',
                    'form-control-color' => ($type === 'color'),
                    'is-invalid' => ($hasError($name)),
                ]) }}
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

        {{-- Feedback messages --}}
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

{{-- label after control --}}
    @if(!$hidden && $type !== 'hidden')
        @if($attributes->has('label-end') || ($floating && !$horizontal))
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
@endif

{{-- Error message --}}
@if($shouldShowError($name))
    <x-mlbrgn-form-errors :name="$name" />
@endif

{{-- Help text --}}
@isset($help)
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

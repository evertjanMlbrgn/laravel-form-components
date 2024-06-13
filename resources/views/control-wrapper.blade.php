@aware([
    'name',
    'help',
    'hidden',
    'floating',
    'label',
    'required',
    'horizontal',
    'shouldShowError',
    'labelClasses',
    'controlClasses'
])
@props([
'id'
])

{{-- NOTE: A form control can either be horizontal or vertical. --}}
{{-- Vertical means label is above control --}}
{{-- horizontal means label is next to control, horizontal controls cannot have floating labels as far as i know --}}

@if($horizontal)
    <div {{ $attributes->class(['row', 'form-control-wrapper', 'form-floating' => $floating, 'd-none' => $hidden]) }}>
        <x-form-label :parentClasses="$attributes->get('parentClasses')" :class="(isset($labelClasses) ? $labelClasses->attributes->get('class') : 'col-4')" :for="$id">{{ $label }}</x-form-label>
        <div class="{{ isset($controlClasses) ? $controlClasses->attributes->get('class') : 'col-8' }}">

            {{ $slot }}

            {!! $help ?? null !!}

            @if($shouldShowError($name))
                <x-form-errors :name="$name" />
            @endif
        </div>
    </div>
@else
    <div {{ $attributes->class(['form-control-wrapper', 'form-floating' => $floating, 'd-none' => $hidden]) }}>
        @if(!$floating)
            <x-form-label :parentClasses="$attributes->get('parentClasses')" :class="(isset($labelClasses) ? $labelClasses->attributes->get('class') : '')" :for="$id">{{ $label }}</x-form-label>
        @endif

        {{ $slot }}

        @if($floating)
            <x-form-label :parentClasses="$attributes->get('parentClasses')" :class="(isset($labelClasses) ? $labelClasses->attributes->get('class') : '')" :for="$id">{{ $label }}</x-form-label>
        @endif

        {!! $help ?? null !!}

        @if($shouldShowError($name))
            <x-form-errors :name="$name" />
        @endif

    </div>
@endif

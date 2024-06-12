@aware([
    'name',
    'help',
    'hidden',
    'floating',
    'label',
    'required',
    'horizontal',
    'shouldShowError'
])
@props([
'id'
])

<div {{ $attributes->class(['form-control-wrapper', 'form-floating' => $floating, 'd-none' => $hidden]) }}>
    @if(!$floating)
        <x-form-label :for="$id">{{ $label }}</x-form-label>
    @endif
    {{ $slot }}

    @if($floating)
            <x-form-label :for="$id">{{ $label }}</x-form-label>
    @endif

    {!! $help ?? null !!}

    @if($shouldShowError($name))
        <x-form-errors :name="$name" />
    @endif

</div>

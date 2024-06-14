@props(
    ['id' =>'no id']
)
<div {{ $attributes->class('form-text') }}
    @if(isset($id))
        id="{{ $id }}-help-text"
    @endif
>
    {{ $slot }}
</div>

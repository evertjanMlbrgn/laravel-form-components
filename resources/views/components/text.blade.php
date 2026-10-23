@props(
    ['id' =>'no-id']
)
<div {{ $attributes->class(theme_class('form_text')) }}
    @if(isset($id))
        id="{{ $id }}-help-text"
    @endif
>{{ $slot }}</div>
{{-- NOTE: No spaces between start and end tag --}}

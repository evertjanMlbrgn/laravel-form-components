<input
    {{ $attributes->exceptWrapperClasses()->class([
       theme_class('form_radio_input', theme_class('form_check_input')),
       theme_class('form_radio_invalid_class', theme_class('invalid_class')) => $hasError($name),
   ])->whereDoesntStartWith('class-')->except(['inline', 'id']) }}
    type="radio"
    value="{{ $value ?? '' }}"
    @if($name) name="{{ $name }}" @endif
    id="{{ $id }}"
    @if($checked) checked="checked" @endif
    @if((isset($help) || !empty($helpText) || $hasError($name)))
        aria-describedby="{{ trim(((isset($help) || !empty($helpText)) ? $id . '-help-text ' : '') . ($hasError($name) ? $id . '-error' : '')) }}"
    @endif
>

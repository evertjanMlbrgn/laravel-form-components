<input
    {{ $attributes->exceptWrapperClasses()->class([
       theme_class('form_check_input') => !$attributes->get('switch'),
       theme_class('form_switch_input', theme_class('form_check_input')) => $attributes->get('switch'),
       theme_class('form_check_invalid_class', theme_class('invalid_class')) => $hasError($name) && !$attributes->get('switch'),
       theme_class('form_switch_invalid_class', theme_class('invalid_class')) => $hasError($name) && $attributes->get('switch'),
   ])->whereDoesntStartWith('class-')->except(['inline', 'switch', 'id', 'default-to-zero']) }}
    type="checkbox"
    value="{{ $value }}"
    @if($name) name="{{ $name }}" @endif
    id="{{ $id }}"
    @if($checked || old($name)) checked="checked" @endif
    @if((isset($help) || !empty($helpText) || $hasError($name)))
        aria-describedby="{{ trim(((isset($help) || !empty($helpText)) ? $id . '-help-text ' : '') . ($hasError($name) ? $id . '-error' : '')) }}"
    @endif
>

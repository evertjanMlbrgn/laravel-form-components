@props([
    "required" => false
])
@if($label)
    <label {!! $attributes->merge(['class' => 'form-label' . $required ? 'required' : '']) !!}>{{ $label }}</label>
@endif

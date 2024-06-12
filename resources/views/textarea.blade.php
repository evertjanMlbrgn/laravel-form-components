<x-form-control-wrapper :id="$getId()">
    <textarea
    {{  $attributes->class([
    'form-control',
    'is-invalid' => $hasError($name)
    ]) }}
    name="{{ $name }}"
    id="{{ $getId() }}">{!! $value !!}</textarea>
    {{-- important there should be no space between > and < otherwise placeholder won't show !!!  --}}

</x-form-control-wrapper>



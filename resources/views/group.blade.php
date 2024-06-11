<x-form-control-wrapper {{ $attributes->class([
                        'form-group',
        'is-invalid' => $hasError($name)
    ]) }} :id="$getId()">
        <x-form-label :label="$label" :required="$attributes->has('required')" />

        <div class="@if($inline) d-flex flex-row flex-wrap gap-3 @endif">
            {!! $slot !!}
        </div>

        @if($shouldShowError($name))
            <x-form-errors :name="$name" class="d-block" />
        @endif

</x-form-control-wrapper>

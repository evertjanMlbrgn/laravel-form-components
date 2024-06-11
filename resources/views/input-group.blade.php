<div class="mb-3">
    <x-form-label :label="$label" :required="$attributes->has('required')"></x-form-label>

    <div {!! $attributes->merge(['class' => 'input-group'  . ($hasError($name) ? ' is-invalid' : '')]) !!}>
        {!! $slot !!}
    </div>

    {!! $help ?? null !!}

    @if($shouldShowError($name))
        <x-form-errors :name="$name" />
    @endif
</div>

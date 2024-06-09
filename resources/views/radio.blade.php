<div class="form-check @if(null !== $attributes->get('inline')) form-check-inline @endif">
    <input
        {!! $attributes->merge(['class' => 'form-check-input' . ($hasError($name) ? ' is-invalid' : '')]) !!}

        type="radio"

        value="{{ $value }}"

        name="{{ $name }}"

        @if($label && !$attributes->get('id'))
            id="{{ $id() }}"
        @endif

        @if($checked)
            checked="checked"
        @endif
    />

    <x-form-label :label="$label" :for="$attributes->get('id') ?: $id()" class="form-check-label" :required="$attributes->has('required')"/>

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>

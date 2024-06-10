<div class="form-group" {!! $attributes->merge(['class' => ($hasError($name) ? 'is-invalid' : '')]) !!}>
    <x-form-label :label="$label" :required="$attributes->has('required')" />

    <div class="@if($inline) d-flex flex-row flex-wrap gap-3 @endif">
        {!! $slot !!}
    </div>

    {!! $help ?? null !!}

    @if($hasErrorAndShow($name))
        <x-form-errors :name="$name" class="d-block" />
    @endif
</div>

<div {{ $attributes->class(['input-group']) }}>
    @if (isset($slot1) && $slot1 != null)
        {{ $slot1 }}
    @endif
    @if (isset($slot2) && $slot2 != null)
        {{ $slot2 }}
    @endif
    @if (isset($slot3) && $slot3 != null)
        {{ $slot3 }}
    @endif
    @if (isset($slot4) && $slot4 != null)
        {{ $slot4 }}
    @endif
    @if (isset($slot5) && $slot5 != null)
        {{ $slot5 }}
    @endif
    {{ $slot }}
</div>

{{--<div class="mb-3">--}}
{{--    <x-form-label :label="$label" :required="$attributes->has('required')"></x-form-label>--}}

{{--    <div {{ $attributes->merge(['class' => 'input-group'  . ($hasError($name) ? ' is-invalid' : '')]) }}>--}}
{{--        {{ $slot }}--}}
{{--    </div>--}}

{{--    {{ $help ?? null }}--}}

{{--    @if($shouldShowError($name))--}}
{{--        <x-form-errors :name="$name" />--}}
{{--    @endif--}}
{{--</div>--}}

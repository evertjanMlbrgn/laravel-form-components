<x-form-control-wrapper :id="$getId()">

    <select
        {{ $attributes->class([
            'form-select', 'is-invalid' => $hasError($name)
        ]) }}
        name="{{ $name }}"
        id="{{ $getId() }}"

        @if($multiple)
            multiple
        @endif

        @if($placeholder)
            placeholder="{{ $placeholder }}"
        @endif
    >

        @if($placeholder)
            <option value="" disabled @if($nothingSelected()) selected="selected" @endif>
                {{ $placeholder }}
            </option>
        @endif

        @forelse($options as $key => $option)
            <option value="{{ $key }}" @if($isSelected($key)) selected="selected" @endif>
                {{ $option }}
            </option>
        @empty
            {!! $slot !!}
        @endforelse
    </select>

    @if($shouldShowError($name))
        <x-form-errors :name="$name" />
    @endif
</x-form-control-wrapper>

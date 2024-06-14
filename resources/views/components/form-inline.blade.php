{{-- TODO where is this used in our projects? Not something of bootstrap 5 --}}
<form
    action="{{ $action }}"
    method="{{ $spoofMethod ? 'POST' : $method }}"
    {{ $attributes->class([
    'form-inline', 'row'
    ]) }}>

    @unless(in_array($method, ['HEAD', 'GET', 'OPTIONS']))
        @csrf
    @endunless

    @if($spoofMethod)
        @method($method)
    @endif

    {{ $slot }}

    <button type="submit"
            class="btn btn-{{ $buttonType }} btn-tooltip"
            data-toggle="tooltip"
            data-placement="right"
            title="{{ $tooltip }}"
    >
        {{ $label }}
    </button>
</form>

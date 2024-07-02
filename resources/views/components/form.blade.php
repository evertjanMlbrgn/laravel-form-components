{{-- validation modes:
    1. server -> set "novalidate" attribute and don't set "needs-validation" class
    2. client-default client side browser validation -> don't set "novalidate" attribute and set "needs-validation" class
    3. client-custom client side validation -> set "novalidate" attribute and set "needs-validation" class
--}}
Validation Mode {{ $validationMode }}
<form
    method="{{ $spoofMethod ? 'POST' : $method }}"
    {{ $attributes->class([
        'needs-validation' => $hasError() || $validationMode === 'client-default' || $validationMode === 'client-custom'
    ]) }}
    {{ $validationMode !== 'client-default' ? 'novalidate' : '' }}
    >

    @unless(in_array($method, ['HEAD', 'GET', 'OPTIONS']))
        @csrf
    @endunless

    @if($spoofMethod)
        @method($method)
    @endif

    {{ $slot }}
</form>

@if($validationMode === 'client-default' || $validationMode === 'client-custom')
    @once
        <script src="{{ package_asset('form-validation.js') }}"></script>
    @endonce
@endif


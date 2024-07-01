{{-- validation modes:
    1. server side -> set "novalidate" attribute and don't set "needs-validation" class
    2. default client side browser validation -> don't set "novalidate" attribute and set "needs-validation" class
    3. custom client side validation -> set "novalidate" attribute and set "needs-validation" class
--}}
Validation Mode {{ $validationMode }}
<form
    method="{{ $spoofMethod ? 'POST' : $method }}"
    {{ $attributes->class([
        'needs-validation' => $hasError() || $validationMode === 'default' || $validationMode === 'custom'
    ]) }}
    {{ $validationMode !== 'default' ? 'novalidate' : '' }}
    >

    @unless(in_array($method, ['HEAD', 'GET', 'OPTIONS']))
        @csrf
    @endunless

    @if($spoofMethod)
        @method($method)
    @endif

    {{ $slot }}
</form>

@if($validationMode === 'default' || $validationMode === 'custom')
    @once
        <script src="{{ package_asset('form-validation.js') }}"></script>
    @endonce
@endif


{{-- validation modes:
    1. server -> set "novalidate" attribute and don't set "needs-validation" class
    2. client-default client side browser validation -> don't set "novalidate" attribute and set "needs-validation" class
    3. client-custom client side validation -> set "novalidate" attribute and set "needs-validation" class
--}}
<form
    method="{{ $spoofMethod ? 'POST' : $method }}"
{{--    {{ $attributes->class([--}}
{{--        'needs-validation' => $hasError() || $validationMode === 'client-default' || $validationMode === 'client-custom'--}}
{{--    ]) }}--}}
    {{ $attributes
       ->class([
           'needs-validation' => $hasError() || $validationMode === 'client-default' || $validationMode === 'client-custom',
       ])
       ->merge([
           'novalidate' => ($validationMode === 'client-custom' || $validationMode === 'server') ? true : null,
           'data-mlbrgn-validation' => ($validationMode === 'client-default' || $validationMode === 'client-custom') ? true : null,
       ])
   }}
    {{ ($validationMode === 'client-custom' || $validationMode === 'server') ? 'novalidate' : '' }}
    >

    @unless(in_array($method, ['HEAD', 'GET', 'OPTIONS']))
        @csrf
    @endunless

    @if($spoofMethod)
        @method($method)
    @endif

    {{ $slot }}
</form>

<x-mlbrgn-form-components::assets :config="$assetFeatures()" />

@if($validationMode === 'client-default' || $validationMode === 'client-custom')
    {{-- old way --}}
    @once
        <script src="{{ package_asset('form-validation.js') }}"></script>
    @endonce
    {{--new way--}}
    @once
        <x-mlbrgn-form-components::assets :config="$assetFeatures()" />
    @endonce
@endif

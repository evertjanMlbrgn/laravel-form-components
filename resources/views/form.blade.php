<form
    method="{{ $spoofMethod ? 'POST' : $method }}"
    {{ $attributes->class([
        'needs-validation' => $hasError()
    ]) }}
    >

    @unless(in_array($method, ['HEAD', 'GET', 'OPTIONS']))
        @csrf
    @endunless

    @if($spoofMethod)
        @method($method)
    @endif

    {{ $slot }}
</form>

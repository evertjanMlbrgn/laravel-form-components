<form action="{{ $action }}" method="post" class="form-inline">
    @csrf
    @unless(Str::lower($method) === 'post')
        @method($method)
    @endunless

    <button type="submit"
            class="btn btn-{{ $buttonType }} btn-tooltip"
            data-toggle="tooltip"
            data-placement="right"
            title="{{ $tooltip }}">
        {{ $label }}
    </button>
</form>

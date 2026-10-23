@error($name, $bag)
    <div {{ $attributes->merge(['class' => theme_class('invalid_feedback'), 'id' => $id]) }}>
        {{ $message }}
    </div>
@enderror

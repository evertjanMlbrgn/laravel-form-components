@error($name, $bag)
    <div {{ $attributes->merge(['class' => 'invalid-feedback']) }}>
        {{ $message }}
    </div>
@enderror
{{--@once--}}
{{--    <x-form-components::assets :config="$assetFeatures()" />--}}
{{--@endonce--}}

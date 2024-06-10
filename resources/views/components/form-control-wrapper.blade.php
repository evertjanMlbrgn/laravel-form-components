@props([
    'floating' => false,
    'hidden' => false,
    'horizontal' => false
])
<div {{ $attributes->class(['form-control-wrapper', 'floating' => $floating, 'd-none' => $hidden]) }}>
    {{ $slot }}
</div>

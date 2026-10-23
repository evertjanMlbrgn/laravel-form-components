@props(['id', 'title', 'description' => null])
<section id="{{ $id }}" class="{{ theme_class('preview_section') }}">
    <h2 class="{{ theme_class('preview_section_title') }}">{{ $title }}</h2>
    @if($description)
        <p class="{{ theme_class('preview_section_description') }}">{!! $description !!}</p>
    @endif
    {{ $slot }}
</section>

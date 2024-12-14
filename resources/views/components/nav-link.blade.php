@props(['active', 'href'])

<a href="{{ $href }}" class="{{ ($active ?? false) ? 'navbar-active' : 'navbar'}}">
    {{ $slot }}
</a>

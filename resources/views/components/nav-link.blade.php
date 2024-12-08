@props(['active' => false, 'navbar' => false])
<a {{ $attributes }}
    class="{{ $active ? 'underline underline-offset-8 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} px-3 py-2 rounded-md mx-3 {{ $navbar ? 'text-base' : 'text-sm' }}"
    aria-current="{{ $active ? 'page' : '' }}">{{ $slot }}</a>

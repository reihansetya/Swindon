<?php
$data = [
    [
        'img' => 'https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp',
        'title' => 'Biography',
    ],
    [
        'img' => 'https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp',
        'title' => 'Albums',
    ],
    [
        'img' => 'https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp',
        'title' => 'Singles',
    ],
    [
        'img' => 'https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp',
        'title' => 'Footage',
        'href' => '/footage',
    ],
];
?>
<x-layout class="px-6">
    <x-slot:title>
        Home
    </x-slot:title>

    <div class="grid md:grid-cols-3 gap-4 justify-items-center py-5">
        @foreach ($data as $d)
            <a href="{{ $d['href'] ?? '#' }}" class="card bg-base-100 image-full w-96 shadow-xl rounded-md group">
                <figure>
                    <img src="{{ $d['img'] }}" alt="Shoes"
                        class="w-full h-auto relative z-0 rounded-lg transition-all duration-300 group-hover:scale-110" />
                </figure>
                <div class="card-body justify-center">
                    <div class="relative">
                        <span class="card-title text-white justify-center card-actions">{{ $d['title'] }}</span>
                        <span class="transition-all h-0.5 bg-indigo-600 scale-x-0 group-hover:scale-x-100"></span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</x-layout>

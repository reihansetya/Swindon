<?php
$data = [
    [
        'img' => 'images/footage-3.jpg',
        'title' => 'Biography',
        'href' => '/biography',
    ],
    [
        'img' => 'discography.jpg',
        'title' => 'Discography',
        'href' => '/discography',
    ],
    [
        'img' => 'images/footage-2.jpg',
        'title' => 'Footage',
        'href' => '/footage',
    ],
];
?>
<x-layout class="md:px-12 px-6">
    <x-slot:title>
        Home
    </x-slot:title>

    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-4 justify-items-center py-5">
        @foreach ($data as $d)
            <a href="{{ $d['href'] ?? '#' }}" class="card image-full w-full h-96 shadow-xl rounded-md group hover:bg-white">
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

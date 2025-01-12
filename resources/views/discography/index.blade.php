<?php
$data = [
    [
        'img' => 'images/footage-3.jpg',
        'title' => 'Biography',
    ],
    [
        'img' => 'images/album1.png',
        'title' => 'Albums',
    ],
    [
        'img' => 'images/footage-1.jpg',
        'title' => 'Singles',
    ],
    [
        'img' => 'images/album1.png',
        'title' => 'Footage',
        'href' => '/footage',
    ],
    [
        'img' => 'images/album1.png',
        'title' => 'Footage',
        'href' => '/footage',
    ],
]; ?>

<x-layout>
    <x-slot:title>
        Discography
    </x-slot:title>
    <section id="discography" class="md:px-6 px-8">
        <div class="">
            <div class="filters flex justify-center space-x-4 mb-6">
                <a href="{{ route('discography.index', ['type' => 'all']) }}"
                    class="btn border-2 border-white {{ $type === 'all' ? 'btn-active' : '' }}">ALL</a>
                <a href="{{ route('discography.index', ['type' => 'albums']) }}"
                    class="btn border-2 border-white {{ $type === 'albums' ? 'btn-active' : '' }}">Albums</a>
                <a href="{{ route('discography.index', ['type' => 'singles']) }}"
                    class="btn border-2 border-white {{ $type === 'singles' ? 'btn-active' : '' }}">Singles</a>
            </div>
        </div>





        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mx-auto">
            @foreach ($items as $d)
                <a href="{{ $d->category->name == 'Album' ? route('album.show', $d->slug) : route('single.show', $d->slug) }}"
                    class="card mx-auto w-fit card-compact bg-base-100 ">
                    <figure class=" md:h-auto lg:max-w-[22rem] overflow-hidden">
                        <img class="border-2" src="{{ $data[2]['img'] }}" alt="Shoes" />
                    </figure>
                    <div class="py-5">
                        <h2 class="card-title">{{ $d['title'] }}</h2>
                        <p>{{ $d->category->name }}</p>
                        <p>2024 </p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

</x-layout>

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
            {{-- @foreach ($items as $d)
                <a href="{{ $d->category->name == 'Album' ? route('album.show', $d->slug) : route('single.show', $d->slug) }}"
                    class="card mx-auto w-fit card-compact bg-base-100 ">
                    <figure class=" md:h-auto lg:max-w-[22rem] overflow-hidden">
                        <img class="border-2" src="{{ $data[2]['img'] }}" alt="Shoes" />
                    </figure>
                    <div class="py-5">
                        <h2 class="card-title">{{ $d['title'] }}</h2>
                        <p>{{ $d->category->name }}</p>
                        <p>{{ $d['release_date'] ?? '2xxx' }} </p>
                    </div>
                </a>
            @endforeach --}}

            @forelse ($items as $d)
                {{-- Ini adalah tampilan untuk setiap item (album atau single) --}}
                <a href="{{ $d->category->name == 'Album' ? route('album.show', $d->slug) : route('single.show', $d->slug) }}"
                    class="card mx-auto w-fit card-compact bg-base-100 ">
                    <figure class=" md:h-auto lg:max-w-[22rem] overflow-hidden">
                        {{-- Mengambil gambar secara dinamis dari item, bukan hardcode --}}
                        <img class="border-2" src="{{ $data[2]['img'] }}" alt="Shoes" />

                    </figure>
                    <div class="py-5">
                        <h2 class="card-title">{{ $d->title }}</h2>
                        <p>{{ $d->category->name }}</p>
                        <p>{{ $d['release_date'] ?? '2xxx' }} </p>
                    </div>
                </a>
            @empty
                {{-- Bagian ini hanya akan tampil jika variabel $items kosong --}}
                @if ($type === 'albums')
                    <div class="col-span-full text-center py-16">
                        <h2 class="text-3xl font-bold">ALBUMS COMING SOON</h2>
                        <p class="text-gray-400 mt-2">Stay tuned for our upcoming albums!</p>
                    </div>
                @else
                    <div class="col-span-full text-center py-16">
                        <p class="text-gray-400">No releases found.</p>
                    </div>
                @endif
            @endforelse
        </div>
    </section>

</x-layout>

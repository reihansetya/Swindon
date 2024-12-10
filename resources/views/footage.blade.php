<?php
$images = [
    [
        'id' => 1,
        'image_path' => 'footage-1.jpg',
    ],
    [
        'id' => 2,
        'image_path' => 'footage-2.jpg',
    ],
    [
        'id' => 3,
        'image_path' => 'footage-3.jpg',
    ],
    [
        'id' => 4,
        'image_path' => 'footage-4.jpg',
    ],
    [
        'id' => 5,
        'image_path' => 'footage-5.jpg',
    ],
    [
        'id' => 6,
        'image_path' => 'footage-6.jpg',
    ],
];
?>

<x-layout class="px-6">
    <x-slot:title>
        Footage
    </x-slot:title>
    @foreach ($images as $image)
        <!-- Modal -->
        <dialog id="modal_{{ $image['id'] }}" class="modal bg-[rgba(52,52,52,0.5)]">
            <div class="modal-box p-0 max-h-screen md:max-w-md max-w-96">
                <form method="dialog">
                    <button class="btn bg-black btn-sm btn-circle btn-ghost absolute right-2 top-2 z-10">✕</button>
                </form>
                <img class="w-full h-auto object-cover" src="{{ asset('images/' . $image['image_path']) }}" />
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
    @endforeach

    <!-- Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach (collect($images)->chunk(2) as $group)
            <div class="grid gap-4">
                @foreach ($group as $image)
                    <div class="cursor-pointer"
                        onclick="document.getElementById('modal_{{ $image['id'] }}').showModal()">
                        <img class="h-auto max-w-full rounded-lg hover:opacity-80 transition-all" src="{{ asset('images/' . $image['image_path']) }}">
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</x-layout>

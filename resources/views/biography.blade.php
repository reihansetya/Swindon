<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>
    {{-- <div  class="diff aspect-[16/9]">
        <div class="diff-item-1">
            <img alt="daisy" src="{{ asset('images/footage-1.jpg') }}" />
        </div>
        <div class="diff-item-2">
            <img alt="daisy" src="{{ asset('images/footage-2.jpg') }}" />
        </div>
        <div class="diff-resizer"></div>
    </div> --}}

    <div class="diff md:aspect-[21/9] aspect-[3/3]">
        <div class="diff-item-1">
            <img alt="daisy" class="object-cover object-fit-cover" src="{{ asset('images/footage-3.jpg') }}" />

        </div>
        <div class="diff-item-2">
            <div class="bg-base-100 grid place-content-center md:text-9xl text-7xl font-black text-white">SWINDON</div>
        </div>
        <div class="diff-resizer"></div>
    </div>
</x-layout>

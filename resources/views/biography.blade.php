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

    {{-- <div class="hero min-h-screen -mt-12" style="background-image: url({{ asset('images/story.jpg') }});">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-neutral-content text-center">
            <div class="max-w-md">
                <img src="{{ asset('logo-swindon.png') }}" alt="logo-swindon">
                <h3 class="mt-10 text-2xl font-bold">The Story</h3>
            </div>
        </div>
    </div> --}}

    <section class="hero min-h-screen grayscale  bg-center bg-no-repeat bg-blend-multiply -mt-12 bg-cover"
        style="background-image: url({{ asset('images/story.jpg') }})">
        <div class="absolute inset-0 bg-[linear-gradient(218deg,_rgba(18,17,17,0.5)_0%,_rgba(79,76,76,0.5)_100%)]">
        </div>
        <div class="hero-content text-neutral-content text-center">
            <div class="max-w-md">
                <img src="{{ asset('logo-swindon.png') }}" alt="logo-swindon">
                <h3 class="mt-10 text-2xl font-bold">The Story</h3>
            </div>
        </div>
    </section>

    <div class="py-20">
        <h1>Biography</h1>
    </div>

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

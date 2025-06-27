<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>

    <section class="hero min-h-screen grayscale  bg-center bg-no-repeat bg-blend-multiply -mt-12 bg-cover"
        style="background-image: url({{ asset('header-bio.jpg') }})">
        <div class="absolute inset-0 bg-[linear-gradient(218deg,_rgba(18,17,17,0.5)_0%,_rgba(79,76,76,0.5)_100%)]">
        </div>
        <div class="hero-content text-neutral-content text-center">
            <div class="max-w-md">
                <img src="{{ asset('logo-swindon.png') }}" alt="logo-swindon">
                <h3 class="mt-10 text-2xl font-bold">The Story</h3>
            </div>
        </div>
    </section>

    <div class="hero bg-base-200 min-h-screen">
        <div class="flex flex-col lg:flex-row-reverse justify-start">
            <img src="{{ asset('images/footage-1.jpg') }}" alt="" class="max-w-sm rounded-lg shadow-2xl" />
            <div class="max-w-xl">
                <h3 class="py-6">
                    Swindon adalah sebuah band beranggotakan lima orang yang menghadirkan suara khas britpop dengan
                    sentuhan modern. Dipimpin oleh Riyan sebagai frontman, band ini mengusung gaya dan atmosfer musik
                    yang terinspirasi dari Oasis, The Verve, dan Blur, namun dengan karakter yang unik dan autentik.
                </h3>
            </div>
        </div>
    </div>

    {{-- <div class="diff md:aspect-[21/9] aspect-[3/3]">
        <div class="diff-item-1">
            <img alt="daisy" class="object-cover object-fit-cover" src="{{ asset('images/footage-3.jpg') }}" />

        </div>
        <div class="diff-item-2">
            <div class="bg-base-100 grid place-content-center md:text-9xl text-7xl font-black text-white">SWINDON</div>
        </div>
        <div class="diff-resizer"></div>
    </div> --}}
</x-layout>

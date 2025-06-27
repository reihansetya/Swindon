<x-layout class="md:px-6 px-8">
    <x-slot:title>
        Album
    </x-slot:title>
    <section class="mt-5">
        <h1 class="text-3xl pb-10 font-bold">{{ $single->title }}</h1>
        <div class="flex md:flex-row flex-col justify-between">
            <div class="md:w-col-5">
                <img class="object-cover w-full" src="{{ asset('images/album1.png') }}" alt="">
                <div class="mt-5">
                    @if ($single->youtube_embed != null)
                        <iframe class="w-full h-72" src="{{ $single->youtube_embed }}">
                    @endif
                    </iframe>

                </div>

            </div>
            <div class="md:w-col-6 items-end flex flex-col">
                <div class="self-start">
                    <p class="mb-5">Listed in: <a class="underline"
                            href="{{ route('discography.index', ['type' => 'singles']) }}">Singles</a></p>
                    <p class="mb-3">{{ $single->description }}</p>
                    <h4 class="mb-3">Produced by: {{ $single->produced_by }}</h4>
                    <h4 class="mb-3">Recorded at: {{ $single->recorded_at }} </h4>
                    <h5 class="mb-10">Released: {{ $release }} </h5>

                </div>

                <div class="collapse collapse-arrow bg-base-200">
                    <input type="checkbox" class="peer" />
                    <div class="collapse-title text-xl font-medium peer-checked:bg-base-300 ">
                        Lyric
                    </div>
                    <div class="collapse-content peer-checked:block hidden transition-all duration-300">
                        {{-- <p class="pt-5 text-justify">{{ $lyricsWithSingle->lyrics->lyrics_text }}</p> --}}
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum ea quibusdam blanditiis. Libero
                        nulla tenetur consectetur, odit aspernatur quod soluta aliquid impedit velit tempore
                        voluptatibus est quo sequi, cumque asperiores.

                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum ea quibusdam blanditiis. Libero
                        nulla tenetur consectetur, odit aspernatur quod soluta aliquid impedit velit tempore
                        voluptatibus est quo sequi, cumque asperiores.

                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum ea quibusdam blanditiis. Libero
                        nulla tenetur consectetur, odit aspernatur quod soluta aliquid impedit velit tempore
                        voluptatibus est quo sequi, cumque asperiores.

                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum ea quibusdam blanditiis. Libero
                        nulla tenetur consectetur, odit aspernatur quod soluta aliquid impedit velit tempore
                        voluptatibus est quo sequi, cumque asperiores.

                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum ea quibusdam blanditiis. Libero
                        nulla tenetur consectetur, odit aspernatur quod soluta aliquid impedit velit tempore
                        voluptatibus est quo sequi, cumque asperiores.
                    </div>
                </div>

            </div>
        </div>


    </section>

</x-layout>

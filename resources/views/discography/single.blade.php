<x-layout class="md:px-6 px-8">
    <x-slot:title>
        Album
    </x-slot:title>
    <section class="mt-5">
        <h1 class="text-3xl pb-10 font-bold">{{ $single->title }}</h1>
        <div class="flex md:flex-row flex-col justify-between">
            <div class="md:w-col-5">
                @if($single->images && Storage::disk('public')->exists($single->images->image_path))
                    <img class="object-cover w-full" src="{{ Storage::url($single->images->image_path) }}" alt="{{ $single->title }}">
                @else
                    <img class="object-cover w-full" src="{{ asset('images/album1.png') }}" alt="{{ $single->title }}">
                @endif
                @if ($single->spotify_url != null)
                    <div class="mt-8">
                        <a href="{{ $single->spotify_url }}" target="_blank"
                           class="inline-flex items-center gap-3 px-6 py-3 border-2 border-white hover:bg-white hover:text-black transition-all duration-300">
                            <i class="fab fa-spotify text-2xl"></i>
                            <span class="font-semibold text-lg">Spotify</span>
                        </a>
                    </div>
                @endif
                <div class="mt-5">
                    @if ($single->youtube_embed != null)
                        <iframe class="w-full h-72" src="{{ $single->youtube_embed }}">
                    @endif
                    </iframe>

                </div>

            </div>
            <div class="md:w-col-6 items-end flex flex-col">
                <div class="self-start w-full">
                    <p class="mb-5">Listed in: <a class="underline"
                            href="{{ route('discography.index', ['type' => 'singles']) }}">Singles</a></p>

                    @if ($single->albums)
                        <p class="mb-5">From Album: <a class="underline"
                                href="{{ route('album.show', $single->albums->slug) }}">{{ $single->albums->title }}</a>
                        </p>
                    @endif

                    <p class="mb-3">{{ $single->description }}</p>
                    <h4 class="mb-3">Produced by: {{ $single->produced_by }}</h4>
                    <h4 class="mb-3">Recorded at: {{ $single->recorded_at }} </h4>
                    <h5 class="mb-10">Released: {{ $release }} </h5>

                </div>

                @if (isset($lyricsWithSingle) && $lyricsWithSingle->lyrics)
                    <div class="collapse collapse-arrow bg-base-200 w-full">
                        <input type="checkbox" class="peer" />
                        <div class="collapse-title text-xl font-medium peer-checked:bg-base-300 ">
                            Lyric
                        </div>
                        <div class="collapse-content peer-checked:block hidden transition-all duration-300">
                            <p class="pt-5 text-justify leading-relaxed whitespace-pre-line">
                                {{ $lyricsWithSingle->lyrics->lyrics_text }}
                            </p>
                        </div>
                    </div>
                @endif

            </div>
        </div>


    </section>

</x-layout>

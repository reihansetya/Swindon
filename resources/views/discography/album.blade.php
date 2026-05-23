<x-layout class="md:px-6 px-8">
    <x-slot:title>
        Album
    </x-slot:title>
    <section class="mt-5">
        {{-- <div class="m-5">
        </div> --}}
        <h1 class="text-3xl pb-2 font-bold">{{ $album->title }}</h1>
        <div class="flex md:flex-row flex-col justify-between">
            <div class="md:w-col-5">
                @if($album->images && Storage::disk('public')->exists($album->images->image_path))
                    <img class="object-cover w-full" src="{{ Storage::url($album->images->image_path) }}" alt="{{ $album->title }}">
                @else
                    <img class="object-cover w-full" src="{{ asset('images/album1.png') }}" alt="{{ $album->title }}">
                @endif
                @if ($album->spotify_url != null)
                    <div class="mt-8">
                        <a href="{{ $album->spotify_url }}" target="_blank"
                           class="inline-flex items-center gap-3 px-6 py-3 border-2 border-white hover:bg-white hover:text-black transition-all duration-300">
                            <i class="fab fa-spotify text-2xl"></i>
                            <span class="font-semibold text-lg">Spotify</span>
                        </a>
                    </div>
                @endif
            </div>
            <div class="md:w-col-6 items-end flex flex-col justify-between">
                <div class="self-start">
                    <p class="mb-5">Listed in: <a class="underline"
                            href="{{ route('discography.index', ['type' => 'albums']) }}">Albums</a></p>
                    <div class="my-3">
                        <h3 class="mb-3">List Singles:</h3>
                        @foreach ($albumWithSingle as $singles)
                            {{-- <div class="flex">
                                <a class="" href="{{ route('single.show', $singles->slug) }}">{{ $singles->title }}</a>
                            </div> --}}
                            <ul class="timeline timeline-vertical">
                                <li>
                                    <div class="timeline-middle">
                                        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="h-5 w-5">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                                clip-rule="evenodd" />
                                        </svg> --}}
                                        {{-- <img src="{{ asset('logo-url.png') }}" class="w-5" alt="">
                                         --}}
                                        <i class="fa-solid fa-play"></i>
                                    </div>
                                    <a href="{{ route('single.show', $singles->slug) }}"
                                        class="timeline-end timeline-box ml-3 my-2">{{ $singles->title }}</a>
                                    <hr />
                                </li>
                            </ul>
                        @endforeach
                    </div>
                    <h4 class="my-3">Produced by: {{ $album->produced_by }}</h4>
                    <h4 class="mb-3">Recorded at: {{ $album->recorded_at }} </h4>
                    <h5 class="mb-10">Released: {{ $release }} </h5>
                    <p>{{ $album->description }}</p>

                </div>



            </div>
        </div>


    </section>

</x-layout>

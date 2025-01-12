<x-layout class="md:px-6 px-8">
    <x-slot:title>
        Album
    </x-slot:title>
    <section class="mt-5">
        <h1 class="text-3xl pb-10 font-bold">{{ $album->title }}</h1>
        <div class="flex md:flex-row flex-col justify-between">
            <div class="md:w-col-5">
                <img class="object-cover w-full" src="{{ asset('images/album1.png') }}" alt="">
            </div>
            <div class="md:w-col-6 items-end flex flex-col justify-between">
                <div class="self-start">
                    <p class="mb-5">Listed in: <a class="underline"
                            href="{{ route('discography.index', ['type' => 'albums']) }}">Albums</a></p>
                    <div class="my-3">
                        <h3>List Singles:</h3>
                        @foreach ($albumWithSingle->singles as $singles)
                            <h4>{{ $singles->title }}</h4>
                        @endforeach
                    </div>
                    <h4 class="my-3">Produced by: {{ $album->produced_by }}</h4>
                    <h4 class="mb-3">Recorded at: {{ $album->recorded_at }} </h4>
                    <h5 class="mb-10">Released: {{ $release }} </h5>
                    <p>{{ $album->description }}</p>

                </div>

                <div class="collapse collapse-arrow bg-base-200 mt-5">
                    <input type="checkbox" class="peer" />
                    <div class="collapse-title text-xl font-medium peer-checked:bg-base-300 ">
                        Lyric
                    </div>
                    <div class="collapse-content peer-checked:block hidden transition-all duration-300">
                        <p class="pt-5 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil
                            earum ducimus est blanditiis
                            at repellendus tempore laborum, rerum doloribus enim iste natus aperiam iusto! Eos,
                            veritatis fuga? Enim, laudantium molestias.</p>
                    </div>
                </div>

            </div>
        </div>


    </section>

</x-layout>

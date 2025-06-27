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
                <img class="w-full h-auto object-cover" src="{{ asset('storage/' . $image['image_path']) }}" />
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
                    @if ($image['type'] == 'general')
                        <div class="cursor-pointer"
                            onclick="document.getElementById('modal_{{ $image['id'] }}').showModal()">
                            <img class="h-auto max-w-full rounded-lg hover:opacity-80 transition-all"
                                src="{{ asset('storage/' . $image['image_path']) }}">
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</x-layout>

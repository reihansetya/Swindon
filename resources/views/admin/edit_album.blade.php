<x-layout>
    <div class="max-w-3xl mx-auto py-10 px-6">
        <header class="mb-8 border-b border-gray-700 pb-4">
            <h1 class="text-3xl font-bold uppercase tracking-tighter">Update Album</h1>
            <p class="text-sm text-gray-500">Detail untuk rilisan album "{{ $album->title }}"</p>
        </header>

        {{-- Form wajib menggunakan enctype untuk upload file --}}
        <form action="{{ route('admin.albums.update', $album->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Album
                            Title</span></label>
                    <input type="text" name="title" value="{{ old('title', $album->title) }}"
                        class="input input-bordered rounded-none w-full" required>
                </div>

                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Release
                            Date</span></label>
                    <input type="date" name="release_date" value="{{ old('release_date', $album->release_date) }}"
                        class="input input-bordered rounded-none w-full" required>
                </div>

                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Produced
                            By</span></label>
                    <input type="text" name="produced_by" value="{{ old('produced_by', $album->produced_by) }}"
                        class="input input-bordered rounded-none w-full">
                </div>

                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Recorded
                            At</span></label>
                    <input type="text" name="recorded_at" value="{{ old('recorded_at', $album->recorded_at) }}"
                        class="input input-bordered rounded-none w-full">
                </div>

                <div class="form-control w-full md:col-span-2">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Spotify
                            URL</span></label>
                    <input type="url" name="spotify_url" value="{{ old('spotify_url', $album->spotify_url) }}"
                        class="input input-bordered rounded-none w-full"
                        placeholder="https://open.spotify.com/album/...">
                </div>
            </div>

            <div class="form-control w-full">
                <label class="label"><span class="label-text uppercase font-bold text-xs">Cover Image</span></label>
                <div class="flex items-center gap-4">
                    @if ($album->images && $album->images->image_path)
                        <img src="{{ asset('storage/' . $album->images->image_path) }}"
                            class="w-20 h-20 object-cover border border-gray-800 grayscale">
                    @endif
                    <input type="file" name="image" class="file-input file-input-bordered rounded-none w-full">
                </div>
            </div>

            <div class="form-control w-full">
                <label class="label"><span class="label-text uppercase font-bold text-xs">Description</span></label>
                <textarea name="description" rows="5" class="textarea textarea-bordered rounded-none w-full">{{ old('description', $album->description) }}</textarea>
            </div>

            <div class="flex items-center gap-4 pt-6 border-t border-gray-800">
                <button type="submit" class="btn btn-primary rounded-none px-12 text-white">Update</button>
                <a href="{{ route('admin.dashboard') }}"
                    class="btn btn-ghost rounded-none px-12 border border-gray-700">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>

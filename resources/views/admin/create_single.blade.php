<x-layout>
    <x-slot:title>Create Single</x-slot:title>

    <div class="max-w-3xl mx-auto py-10 px-6">
        <header class="mb-8 border-b border-gray-700 pb-4">
            <h1 class="text-3xl font-bold uppercase tracking-tighter">Create New Single</h1>
        </header>

        {{-- Flash Message & Errors --}}
        @if (session('success'))
            <div class="alert alert-success mb-6 rounded-none font-semibold">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error mb-6 rounded-none font-semibold">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.singles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Title</span></label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="input input-bordered rounded-none w-full" required>
                </div>

                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Albums</span></label>
                    <select name="album" class="select select-bordered rounded-none w-full">
                        <option value="">-- Select Albums --</option>
                        @foreach ($albums as $album)
                            <option value="{{ $album->id }}" {{ old('album') == $album->id ? 'selected' : '' }}>
                                {{ $album->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Release
                            Date</span></label>
                    <input type="date" name="release_date" value="{{ old('release_date') }}"
                        class="input input-bordered rounded-none w-full">
                </div>

                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Spotify
                            URL</span></label>
                    <input type="url" name="spotify_url" value="{{ old('spotify_url') }}"
                        class="input input-bordered rounded-none w-full">
                </div>
            </div>

            <div class="form-control w-full">
                <label class="label"><span class="label-text uppercase font-bold text-xs">Cover Image</span></label>
                <input type="file" name="image" class="file-input file-input-bordered rounded-none w-full"
                    required>
            </div>

            <div class="form-control w-full">
                <label class="label"><span class="label-text uppercase font-bold text-xs">Description</span></label>
                <textarea name="description" rows="4" class="textarea textarea-bordered rounded-none w-full">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Produced
                            By</span></label>
                    <input type="text" name="produced_by" value="{{ old('produced_by') }}"
                        class="input input-bordered rounded-none w-full">
                </div>
                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Recorded
                            At</span></label>
                    <input type="text" name="recorded_at" value="{{ old('recorded_at') }}"
                        class="input input-bordered rounded-none w-full">
                </div>
            </div>

            <div class="flex items-center gap-4 pt-6 border-t border-gray-800">
                <button type="submit" class="btn btn-primary rounded-none px-12 text-white">Create Single</button>
                <a href="{{ route('admin.dashboard') }}"
                    class="btn btn-ghost rounded-none px-12 border border-gray-700">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>

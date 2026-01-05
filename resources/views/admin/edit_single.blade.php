<x-layout>
    <div class="max-w-3xl mx-auto py-10 px-6">
        <header class="mb-8 border-b border-gray-700 pb-4">
            <h1 class="text-3xl font-bold uppercase tracking-tighter">Update Single</h1>
            <p class="text-sm text-gray-500">Detail untuk rilisan single "{{ $single->title }}"</p>
        </header>

        @if ($errors->any())
            <div class="alert alert-error mb-6 rounded-none font-semibold">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.singles.update', $single->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Judul</span></label>
                    <input type="text" name="title" value="{{ old('title', $single->title) }}"
                        class="input input-bordered rounded-none w-full" required>
                </div>

                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Genre</span></label>
                    <input type="text" name="genre" value="{{ old('genre', $single->genre) }}"
                        class="input input-bordered rounded-none w-full">
                </div>

                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Album</span></label>
                    <select name="album_id" class="select select-bordered rounded-none w-full">
                        <option value="">-- Tanpa Album --</option>
                        @foreach ($albums as $album)
                            <option value="{{ $album->id }}" {{ $single->album_id == $album->id ? 'selected' : '' }}>
                                {{ $album->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Kategori</span></label>
                    <select name="category_id" class="select select-bordered rounded-none w-full" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $single->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Tanggal
                            Rilis</span></label>
                    <input type="date" name="release_date" value="{{ old('release_date', $single->release_date) }}"
                        class="input input-bordered rounded-none w-full">
                </div>

                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">YouTube Embed
                            Code</span></label>
                    <input type="text" name="youtube_embed"
                        value="{{ old('youtube_embed', $single->youtube_embed) }}"
                        class="input input-bordered rounded-none w-full" placeholder="Contoh: dQw4w9WgXcQ">
                </div>
            </div>

            <div class="form-control w-full">
                <label class="label"><span class="label-text uppercase font-bold text-xs">Cover Image</span></label>
                <div class="flex items-center gap-4">
                    @if ($single->images && $single->images->image_path)
                        <img src="{{ asset('storage/' . $single->images->image_path) }}"
                            class="w-20 h-20 object-cover border border-gray-800 grayscale">
                    @endif
                    <input type="file" name="image" class="file-input file-input-bordered rounded-none w-full">
                </div>
            </div>

            <div class="form-control w-full">
                <label class="label"><span class="label-text uppercase font-bold text-xs">Deskripsi</span></label>
                <textarea name="description" rows="4" class="textarea textarea-bordered rounded-none w-full">{{ old('description', $single->description) }}</textarea>
            </div>

            <div class="flex items-center gap-4 pt-6 border-t border-gray-800">
                <button type="submit" class="btn btn-primary rounded-none px-12 text-white">Update</button>
                <a href="{{ route('admin.dashboard') }}"
                    class="btn btn-ghost rounded-none px-12 border border-gray-700">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>

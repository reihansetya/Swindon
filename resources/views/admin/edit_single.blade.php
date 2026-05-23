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
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Spotify URL</span></label>
                    <input type="url" name="spotify_url" value="{{ old('spotify_url', $single->spotify_url) }}"
                        class="input input-bordered rounded-none w-full" placeholder="https://open.spotify.com/track/...">
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
                <label class="label"><span class="label-text uppercase font-bold text-xs">Gambar Cover</span></label>
                @if ($single->images)
                    <div class="mb-2">
                        <img src="{{ Storage::url($single->images->image_path) }}"
                            alt="Current cover"
                            class="w-32 h-32 object-cover rounded border border-gray-800">
                    </div>
                @endif
                <input type="file" name="image"
                    accept="image/jpeg,image/png,image/jpg,image/svg+xml"
                    class="file-input file-input-bordered w-full">
                @error('image')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control w-full">
                <label class="label"><span class="label-text uppercase font-bold text-xs">Deskripsi</span></label>
                <textarea name="description" rows="4" class="textarea textarea-bordered rounded-none w-full">{{ old('description', $single->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Produced By</span></label>
                    <input type="text" name="produced_by" value="{{ old('produced_by', $single->produced_by) }}"
                        class="input input-bordered rounded-none w-full" placeholder="Nama produser">
                </div>

                <div class="form-control w-full">
                    <label class="label"><span class="label-text uppercase font-bold text-xs">Recorded At</span></label>
                    <input type="text" name="recorded_at" value="{{ old('recorded_at', $single->recorded_at) }}"
                        class="input input-bordered rounded-none w-full" placeholder="Nama studio">
                </div>
            </div>

            <div class="form-control w-full p-4 bg-base-200 border border-gray-800">
                <label class="label pb-0"><span class="label-text uppercase font-bold text-xs">Manajemen
                        Lirik</span></label>
                <p class="text-xs text-gray-500 mb-3">Kelola lirik untuk lagu ini secara interaktif.</p>
                <div>
                    @if ($single->lyrics)
                        <a href="{{ route('admin.lyrics.edit', $single->lyrics->id) }}"
                            class="btn btn-sm btn-outline btn-primary rounded-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                            Edit Lirik Lagu Ini
                        </a>
                    @else
                        <a href="{{ route('admin.lyrics.create') }}?single_id={{ $single->id }}"
                            class="btn btn-sm btn-outline btn-secondary rounded-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Tambahkan Lirik Baru
                        </a>
                    @endif
                </div>
            </div>

            <div class="flex items-center gap-4 pt-6 border-t border-gray-800">
                <button type="submit" class="btn btn-primary rounded-none px-12 text-white">Update</button>
                <a href="{{ route('admin.dashboard') }}"
                    class="btn btn-ghost rounded-none px-12 border border-gray-700">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>

<x-layout class="md:px-6 px-4 py-10">
    <x-slot:title>Admin Dashboard</x-slot:title>

    <div class="max-w-7xl mx-auto space-y-12">
        <header class="border-b border-gray-700 pb-4">
            <h1 class="text-3xl font-bold tracking-tighter uppercase">Dashboard</h1>
            <p class="text-sm text-gray-500">Manage Content Swindon</p>
        </header>

        <section class="space-y-4">
            <div class="flex justify-between items-end">
                <h2 class="text-xl font-bold uppercase tracking-widest">Albums</h2>
                <a href="{{ route('admin.albums.create') }}" class="btn btn-sm btn-outline rounded-none">Add New Album</a>
            </div>

            <div class="overflow-x-auto border border-gray-800">
                <table class="table w-full rounded-none">
                    <thead class="bg-base-200 text-xs uppercase tracking-wider">
                        <tr>
                            <th class="rounded-none">Title</th>
                            <th>Release Date</th>
                            <th>Produced By</th>
                            <th>Image</th>
                            <th class="text-right rounded-none">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @foreach ($albumWithImage as $album)
                            <tr class="hover:bg-base-200/50 border-b border-gray-800 last:border-0">
                                <td class="font-bold">{{ $album->title }}</td>
                                <td>{{ \Carbon\Carbon::parse($album->release_date)->format('d M Y') }}</td>
                                <td>{{ $album->produced_by ?? '-' }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . ($album->images->image_path ?? '')) }}"
                                        class="w-16 h-16 object-cover border border-gray-700 grayscale hover:grayscale-0 transition-all">
                                </td>
                                <td class="text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.albums.edit', $album->id) }}"
                                            class="btn btn-xs btn-primary rounded-none px-4">Edit</a>
                                        <form action="{{ route('admin.albums.destroy', $album->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus album ini?')">
                                            @csrf @method('DELETE')
                                            <button
                                                class="btn btn-xs btn-error rounded-none px-4 text-white">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <section class="space-y-4">
            <div class="flex justify-between items-end">
                <h2 class="text-xl font-bold uppercase tracking-widest">Singles</h2>
                <a href="{{ route('admin.singles.create') }}" class="btn btn-sm btn-outline rounded-none">Add New
                    Single</a>
            </div>

            <div class="overflow-x-auto border border-gray-800">
                <table class="table w-full rounded-none">
                    <thead class="bg-base-200 text-xs uppercase tracking-wider">
                        <tr>
                            <th class="rounded-none">No</th>
                            <th>Title</th>
                            <th>Album</th>
                            <th>Spotify</th>
                            <th>Image</th>
                            <th class="text-right rounded-none">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @foreach ($singleWithImage as $single)
                            <tr class="hover:bg-base-200/50 border-b border-gray-800 last:border-0">
                                <td>{{ $loop->iteration }}</td>
                                <td class="font-bold">{{ $single->title }}</td>
                                <td class="italic text-gray-500">{{ $single->albums->title ?? 'No album' }}</td>
                                <td><a href="{{ $single->spotify_url ?? '#' }}"
                                        target={{ $single->spotify_url ? '_blank' : '_self' }}
                                        class="link text-xs">Link</a>
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . ($single->images->image_path ?? '')) }}"
                                        class="w-16 h-16 object-cover border border-gray-700 grayscale hover:grayscale-0 transition-all">
                                </td>
                                <td class="text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.singles.edit', $single->id) }}"
                                            class="btn btn-xs btn-primary rounded-none px-4">Edit</a>
                                        <form action="{{ route('admin.singles.destroy', $single->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus single ini?')">
                                            @csrf @method('DELETE')
                                            <button
                                                class="btn btn-xs btn-error rounded-none px-4 text-white">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-layout>

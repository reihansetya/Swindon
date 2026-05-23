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
                                    @if($album->images)
                                        <img src="{{ asset('storage/' . $album->images->image_path) }}"
                                            class="w-16 h-16 object-cover border border-gray-700 grayscale hover:grayscale-0 transition-all">
                                    @else
                                        <div class="w-16 h-16 border border-gray-700 flex items-center justify-center text-gray-500 text-xs">No img</div>
                                    @endif
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
                                    @if($single->images)
                                        <img src="{{ asset('storage/' . $single->images->image_path) }}"
                                            class="w-16 h-16 object-cover border border-gray-700 grayscale hover:grayscale-0 transition-all">
                                    @else
                                        <div class="w-16 h-16 border border-gray-700 flex items-center justify-center text-gray-500 text-xs">No img</div>
                                    @endif
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

        {{-- LYRICS SECTION --}}
        <section class="space-y-4">
            <div class="flex justify-between items-end">
                <h2 class="text-xl font-bold uppercase tracking-widest">Lyrics</h2>
                <a href="{{ route('admin.lyrics.create') }}" class="btn btn-sm btn-outline rounded-none">Add New
                    Lyric</a>
            </div>

            <div class="overflow-x-auto border border-gray-800">
                <table class="table w-full rounded-none">
                    <thead class="bg-base-200 text-xs uppercase tracking-wider">
                        <tr>
                            <th class="rounded-none">No</th>
                            <th>Lagu (Single Track)</th>
                            <th>Pratinjau Lirik</th>
                            <th class="text-right rounded-none">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @forelse ($lyricsList as $lyric)
                            <tr class="hover:bg-base-200/50 border-b border-gray-800 last:border-0">
                                <td>{{ $loop->iteration }}</td>
                                <td class="font-bold">{{ $lyric->single->title ?? 'Tidak diketahui' }}</td>
                                <td class="text-gray-400 italic">{{ Str::limit($lyric->lyrics_text, 60, '...') }}</td>
                                <td class="text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.lyrics.edit', $lyric->id) }}"
                                            class="btn btn-xs btn-primary rounded-none px-4">Edit</a>
                                        <form action="{{ route('admin.lyrics.destroy', $lyric->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus lirik ini?')">
                                            @csrf @method('DELETE')
                                            <button
                                                class="btn btn-xs btn-error rounded-none px-4 text-white">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500 italic">Belum ada lirik yang
                                    ditambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        {{-- FOOTAGE IMAGES SECTION --}}
        <section class="space-y-4" id="footage-section">
            <div class="flex justify-between items-end">
                <h2 class="text-xl font-bold uppercase tracking-widest">Footage Images</h2>
                <a href="{{ route('admin.pictures.insert') }}" class="btn btn-sm btn-outline rounded-none">Add New Image</a>
            </div>

            <div class="overflow-x-auto border border-gray-800" id="footage-table-container">
                <table class="table w-full rounded-none">
                    <thead class="bg-base-200 text-xs uppercase tracking-wider">
                        <tr>
                            <th class="rounded-none">No</th>
                            <th>Image Preview</th>
                            <th>Path</th>
                            <th>Type</th>
                            <th>Uploaded</th>
                            <th class="text-right rounded-none">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @forelse ($footageImages as $image)
                            <tr class="hover:bg-base-200/50 border-b border-gray-800 last:border-0">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $image->image_path) }}"
                                        class="w-20 h-20 object-cover border border-gray-700 grayscale hover:grayscale-0 transition-all cursor-pointer"
                                        onclick="document.getElementById('modal_{{ $image->id }}').showModal()">
                                </td>
                                <td class="text-xs text-gray-400 font-mono">{{ Str::limit($image->image_path, 40) }}</td>
                                <td><span class="badge badge-sm badge-outline rounded-none">{{ $image->type }}</span></td>
                                <td class="text-xs text-gray-500">{{ $image->created_at->format('d M Y') }}</td>
                                <td class="text-right">
                                    <div class="flex justify-end gap-2">
                                        <button onclick="document.getElementById('modal_{{ $image->id }}').showModal()"
                                            class="btn btn-xs btn-ghost rounded-none px-4">View</button>
                                        <form action="{{ route('admin.pictures.destroy', $image->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus gambar ini?')">
                                            @csrf @method('DELETE')
                                            <button
                                                class="btn btn-xs btn-error rounded-none px-4 text-white">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            {{-- Modal for full image view --}}
                            <dialog id="modal_{{ $image->id }}" class="modal">
                                <div class="modal-box max-w-4xl p-0">
                                    <form method="dialog">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 z-10 bg-black/50 text-white hover:bg-black">✕</button>
                                    </form>
                                    <img src="{{ asset('storage/' . $image->image_path) }}" class="w-full h-auto">
                                    <div class="p-4 bg-base-200">
                                        <p class="text-xs text-gray-500">{{ $image->image_path }}</p>
                                        <p class="text-xs text-gray-500 mt-1">Uploaded: {{ $image->created_at->format('d M Y, H:i') }}</p>
                                    </div>
                                </div>
                                <form method="dialog" class="modal-backdrop">
                                    <button>close</button>
                                </form>
                            </dialog>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-gray-500 italic">Belum ada gambar footage yang
                                    ditambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($footageImages->hasPages())
                <div class="flex justify-center items-center gap-1 mt-6" id="footage-pagination">
                    {{-- Back Button --}}
                    @if ($footageImages->onFirstPage())
                        <button disabled class="px-3 py-1.5 text-sm border border-gray-700 rounded bg-base-200 text-gray-600 cursor-not-allowed">
                            <i class="fas fa-chevron-left mr-1 text-xs"></i>Back
                        </button>
                    @else
                        <a href="{{ $footageImages->previousPageUrl() }}"
                           class="px-3 py-1.5 text-sm border border-gray-700 rounded bg-base-100 hover:bg-base-200 transition-colors footage-page-link"
                           data-page="{{ $footageImages->currentPage() - 1 }}">
                            <i class="fas fa-chevron-left mr-1 text-xs"></i>Back
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    @foreach(range(1, $footageImages->lastPage()) as $page)
                        @if ($page == $footageImages->currentPage())
                            <button class="w-8 h-8 text-sm rounded bg-black text-white font-bold border-2 border-white">
                                {{ $page }}
                            </button>
                        @else
                            <a href="{{ $footageImages->url($page) }}"
                               class="w-8 h-8 text-sm rounded bg-base-100 hover:bg-base-200 border border-gray-700 flex items-center justify-center transition-colors footage-page-link"
                               data-page="{{ $page }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    {{-- Next Button --}}
                    @if ($footageImages->hasMorePages())
                        <a href="{{ $footageImages->nextPageUrl() }}"
                           class="px-3 py-1.5 text-sm border border-gray-700 rounded bg-base-100 hover:bg-base-200 transition-colors footage-page-link"
                           data-page="{{ $footageImages->currentPage() + 1 }}">
                            Next<i class="fas fa-chevron-right ml-1 text-xs"></i>
                        </a>
                    @else
                        <button disabled class="px-3 py-1.5 text-sm border border-gray-700 rounded bg-base-200 text-gray-600 cursor-not-allowed">
                            Next<i class="fas fa-chevron-right ml-1 text-xs"></i>
                        </button>
                    @endif
                </div>
            @endif
        </section>
    </div>

    {{-- AJAX Pagination Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle pagination clicks
            document.addEventListener('click', function(e) {
                const link = e.target.closest('.footage-page-link');
                if (!link) return;

                e.preventDefault();
                const url = link.href;
                const page = link.dataset.page;

                // Show loading state
                const container = document.getElementById('footage-table-container');
                container.style.opacity = '0.5';

                // Fetch new page
                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    // Parse the response
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');

                    // Extract the footage section
                    const newSection = doc.querySelector('#footage-section');
                    const currentSection = document.querySelector('#footage-section');

                    if (newSection && currentSection) {
                        // Replace content
                        currentSection.innerHTML = newSection.innerHTML;

                        // Scroll to footage section smoothly
                        currentSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }

                    // Restore opacity
                    container.style.opacity = '1';
                })
                .catch(error => {
                    console.error('Error loading page:', error);
                    container.style.opacity = '1';
                    // Fallback to normal navigation
                    window.location.href = url;
                });
            });
        });
    </script>
</x-layout>

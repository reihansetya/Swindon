<x-layout>
    <x-slot:title>
        Create Album
    </x-slot:title>

    <div class="max-w-2xl mx-auto bg-white shadow-lg p-8 my-10 rounded-lg">
        <h1 class="text-2xl text-center font-bold mb-4">Create New Album</h1>

        <!-- Flash Message untuk error atau sukses -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Input Album -->
        <form action="{{ route('admin.albums.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" required
                    class="w-full mt-1 p-2 border rounded focus:ring focus:ring-blue-200">
            </div>

            {{-- <div class="mb-4">
                <label for="category" class="block font-medium text-gray-700">Category</label>
                <select name="category" id="category" required
                    class="w-full mt-1 p-2 border rounded focus:ring focus:ring-blue-200">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="mb-4">
                <label for="release_date" class="block font-medium text-gray-700">Release Date</label>
                <input type="date" name="release_date" id="release_date"
                    class="w-full mt-1 p-2 border rounded focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-4">
                <label for="image" class="block font-medium text-gray-700">Image</label>
                <input type="file" name="image" class="w-full mt-1 p-2 border rounded" single accept="image/*">
            </div>

            <div class="mb-4">
                <label for="spotify_url" class="block font-medium text-gray-700">Spotify URL</label>
                <input type="url" name="spotify_url" id="spotify_url"
                    class="w-full mt-1 p-2 border rounded focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-4">
                <label for="description" class="block font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full mt-1 p-2 border rounded focus:ring focus:ring-blue-200"></textarea>
            </div>

            <div class="mb-4">
                <label for="produced_by" class="block font-medium text-gray-700">Produced By</label>
                <input type="text" name="produced_by" id="produced_by"
                    class="w-full mt-1 p-2 border rounded focus:ring focus:ring-blue-200">
            </div>

            <div class="mb-4">
                <label for="recorded_at" class="block font-medium text-gray-700">Recorded At</label>
                <input type="text" name="recorded_at" id="recorded_at"
                    class="w-full mt-1 p-2 border rounded focus:ring focus:ring-blue-200">
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:ring focus:ring-blue-200">
                Create Album
            </button>
        </form>
    </div>
</x-layout>

<x-layout>
    <x-slot:title>
        Insert Picture
    </x-slot:title>

    <div class="max-w-2xl mx-auto bg-white shadow-lg p-8 my-10 rounded-lg">
        <h1 class="text-2xl text-center font-bold mb-4">Insert Picture</h1>

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
        <form action="{{ route('admin.pictures.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- <div class="mb-4">
                <label for="category" class="block font-medium text-gray-700">Category</label>
                <select name="category" id="category" required
                    class="w-full mt-1 p-2 border rounded focus:ring focus:ring-blue-200">
                    <option value="">-- Select Category --</option>

                </select>
            </div> --}}

            <!-- Dropdown Album -->
            {{-- <div class="mb-4" id="album_select" style="display: none;">
                <label for="album_id" class="block font-medium text-gray-700">Select Album</label>
                <select name="album_id" id="album_id"
                    class="w-full mt-1 p-2 border rounded focus:ring focus:ring-blue-200">
                    <option value="">-- Select Album --</option>
                    @foreach ($albums as $album)
                        <option value="{{ $album->id }}">{{ $album->title }}</option>
                    @endforeach
                </select>
            </div> --}}

            <!-- Dropdown Single -->
            {{-- <div class="mb-4" id="single_select" style="display: none;">
                <label for="single_id" class="block font-medium text-gray-700">Select Single</label>
                <select name="single_id" id="single_id"
                    class="w-full mt-1 p-2 border rounded focus:ring focus:ring-blue-200">
                    <option value="">-- Select Single --</option>
                    @foreach ($singles as $single)
                        <option value="{{ $single->id }}">{{ $single->title }}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="mb-4">
                <label for="image" class="block font-medium text-gray-700">Image</label>
                <input type="file" name="image[]" class="w-full mt-1 p-2 border rounded" multiple accept="image/*">
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:ring focus:ring-blue-200">
                Insert Picture
            </button>
        </form>
    </div>
</x-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const category = document.getElementById('category');
        const albumSelect = document.getElementById('album_select');
        const singleSelect = document.getElementById('single_select');

        category.addEventListener('change', function() {
            console.log('masuk change');
            console.log(this.value);
            if (this.value === 'Album') {
                console.log('masuk album');
                albumSelect.style.display = 'block';
                singleSelect.style.display = 'none';
            } else if (this.value === 'Single') {
                singleSelect.style.display = 'block';
                albumSelect.style.display = 'none';
            } else {
                albumSelect.style.display = 'none';
                singleSelect.style.display = 'none';
            }
        });
    });
</script>

<x-layout class="md:px-6 px-8 py-5">
    <x-slot:title>
        Dashboard
    </x-slot:title>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <h1>Albums</h1>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Color
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($albumWithImage as $album)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $album->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $album->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $album->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $album->title }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . ($album->images->image_path ?? '')) }}" alt="Gambar"
                                class="w-32 h-32 object-cover rounded">
                        </td>
                        <td class="px-6 py-4">
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <h1>Singles</h1>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Color
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($singleWithImage as $single)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $single->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $single->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $single->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $single->title }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . ($single->images->image_path ?? '')) }}" alt="Gambar"
                                class="w-32 h-32 object-cover rounded">
                        </td>
                        <td class="px-6 py-4">
                            <a href="#"
                                class="font-medium me-3 text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>

    {{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <h1>Picture</h1>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Album
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Single
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($singles as $single)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $single->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $single->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $single->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $single->title }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="#"
                                class="font-medium me-3 text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div> --}}


</x-layout>

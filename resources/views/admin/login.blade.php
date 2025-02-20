<x-layout class="md:px-6 px-8">
    <x-slot:title>
        Admin
    </x-slot:title>
    <div class="flex justify-center items-center min-h-screen text-white">
        <div class="w-full max-w-md bg-base-content rounded-lg shadow-lg p-6">
            <img class="" src="{{ asset('logo-swindon.png') }}" alt="logo-swindon">
            <h2 class="text-2xl font-bold  my-6  text-center">Login Page</h2>

            @if ($errors->any())
                <div class="mb-4 text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="mb-4 text-green-500">
                    {{ session('success') }}
                </div>
            @endif

            <form action={{ route('login') }} method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full text-black border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <div class="mb-6">
                    <label for="password" class="block">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full text-black border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <button type="submit"
                    class="w-full bg-primary text-white rounded-lg py-2 hover:bg-primary-content transition duration-300">
                    Login
                </button>
            </form>
        </div>
    </div>
</x-layout>

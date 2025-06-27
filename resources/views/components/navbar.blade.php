@props(['home' => request()->is('/')])
@props(['biography' => request()->is('biography')])
@props(['admin' => request()->is('admin') || request()->is('admin/*')])

<section class="text-center relative z-10 {{ $admin ? 'hidden' : 'block' }}">
    <div class="{{ $home ? 'hidden' : 'block' }} py-3">
        {{-- <h1 class="text-3xl font-bold text-[#FFC700]">oasismynet</h1> --}}
        <x-nav-link href="/" :navbar="true" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href="/biography" :navbar="true" :active="request()->is('biography')">Biography</x-nav-link>
        <x-nav-link href="/discography" :navbar="true" :active="request()->is('discography')">Discography</x-nav-link>
        <x-nav-link href="/footage" :navbar="true" :active="request()->is('footage')">Footage</x-nav-link>
    </div>
    <a href="#" class="md:w-[50%] w-[80%] inline-block {{ $biography ? 'hidden' : 'block' }}">
        <img class="" src="{{ asset('logo-swindon.png') }}" alt="logo-swindon">
    </a>
</section>

<div class="navbar bg-neutral {{ $admin ? '' : 'hidden' }} {{ request()->is('admin') ? 'hidden' : '' }}">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 text-white rounded-box z-[1] mt-3 w-52 p-2 shadow">
                <li><a href={{ route('admin.albums.create') }}>Create Album</a></li>
                <li><a href="{{ route('admin.singles.create') }}">Create Single</a></li>
                <li><a href="{{ route('admin.pictures.insert') }}">Insert Picture</a></li>
            </ul>
        </div>
        <a href="/admin/dashboard">
            <img class="w-20" src="{{ asset('logo-swindon.png') }}" alt="logo-swindon">
        </a>
    </div>
    <div class="navbar-center text-white hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a href={{ route('admin.albums.create') }}>Create Album</a></li>
            <li><a href="{{ route('admin.singles.create') }}">Create Single</a></li>
            <li><a href="{{ route('admin.pictures.insert') }}">Insert Picture</a></li>

        </ul>
    </div>
    <div class="navbar-end">
        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit"
                class="bg-red-500 text-white rounded-lg py-2 px-4 hover:bg-red-600 transition duration-300">
                Logout
            </button>
        </form>
    </div>
</div>

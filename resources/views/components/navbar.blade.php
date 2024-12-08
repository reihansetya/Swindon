@props(['home' => request()->is('/')])
<section class="text-center">
    <div class="{{ $home ? 'hidden' : 'block' }} py-3">
        {{-- <h1 class="text-3xl font-bold text-[#FFC700]">oasismynet</h1> --}}
        <x-nav-link href="/" :navbar="true" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href="/footage" :navbar="true" :active="request()->is('footage')">Footage</x-nav-link>
    </div>
    <a href="#" class="md:w-[50%] w-[80%] inline-block">
        <img class="" src="{{ asset('logo-swindon.png') }}" alt="logo-swindon">
    </a>
</section>

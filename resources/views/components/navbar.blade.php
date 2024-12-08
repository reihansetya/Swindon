@props(['home' => request()->is('/')])
<section class="text-center">
    <div class="{{ $home ? 'hidden' : 'block' }}">
        <h1 class="text-3xl font-bold text-[#FFC700]">oasismynet</h1>
    </div>
    <a href="#" class="md:w-[50%] w-[80%] inline-block">
        <img class="" src="{{ asset('logo-swindon.png') }}" alt="logo-swindon">
    </a>
</section>

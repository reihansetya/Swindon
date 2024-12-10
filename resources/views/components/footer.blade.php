{{-- Footer jumbotron --}}
<section class="bg-center bg-no-repeat bg-gray-700 bg-blend-multiply mt-5"
    style="background-image: url({{ asset('footer-img.png') }})">
    <div class="px-4 md:py-20 py-10 mx-auto max-w-screen-xl text-center ">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-2xl lg:text-3xl">
            ALL AROUND THE WORLD YOU'VE GOTTA SPREAD THE WORD
        </h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">oasismynet is the new
            home for Oasis fans across the world to get access to exclusive content, giveaways and updates
            tailored to you. Sign up today and let the journey begin!
        </p>
    </div>
</section>
{{-- end footer jumbotron --}}
<footer class="container md:mx-auto pt-5">

    {{-- sosmed --}}
    <div class="flex justify-center">
        <div class="mr-5 text-xl">
            <h1>Find me At: </h1>
        </div>
        <div class="flex gap-5">
            <span class="hover:opacity-65">
                <a href="#" class="fa-brands fa-youtube"></a>
            </span>
            <span class="hover:opacity-65">
                <a href="#" class="fa-brands fa-spotify"></a>
            </span>
            <span class="hover:opacity-65">
                <a href="#" class="fa-brands fa-twitter"></a>
            </span>
            <span class="hover:opacity-65">
                <a href="#" class="fa-brands fa-instagram"></a>
            </span>
            <span class="hover:opacity-65">
                <a href="#" class="fa-brands fa-facebook-f"></a>
            </span>
        </div>
    </div>
    {{-- end sosmed --}}

    {{-- footbar --}}
    <div class="navbar py-5 justify-center bg-base-100">
        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href="/footage" :active="request()->is('footage')">Footage</x-nav-link>
        <x-nav-link href="/biography" :active="request()->is('biography')">Biography</x-nav-link>
        {{-- <x-nav-link href="/blog" :active="request()->is('blog')">Blog</x-nav-link>
        <x-nav-link href="/albums" :active="request()->is('albums')">Album</x-nav-link>
        <x-nav-link href="/tracks" :active="request()->is('tracks')">Tracks</x-nav-link>
        <x-nav-link href="/galleries" :active="request()->is('galleries')">Galleries</x-nav-link> --}}
    </div>
    {{-- end footbar --}}

    {{-- copyright --}}
    <div class="flex justify-center py-5">
        <div class="text-center">
            <p class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
                © 2025
                SWINDON. All Rights Reserved.
            </p>
        </div>
    </div>
    {{-- end copyright --}}
</footer>

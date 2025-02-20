@props(['admin' => request()->is('admin') || request()->is('admin/*')])
{{-- Footer jumbotron --}}
<section class="bg-center bg-no-repeat bg-base-100   mt-[5rem] bg-cover {{ $admin ? 'hidden' : 'block' }}"
    style="background-image: url({{ asset('images/footer-section.jpg') }})">

    <div class="container px-4 md:py-20 py-10 mx-auto max-w-screen-xl text-center">
        <h1 class="mb-4 text-xl font-extrabold tracking-tight leading-none text-white md:text-3xl text-footer uppercase">
            United Through Music and Passion.
        </h1>
        <p class="mb-8 text-lg font-normal text-gray-300 text-sm md:text-xl drop-shadow-2xl text-footer text-2xl">Follow
            Us on
        </p>
        <div class="flex justify-center">
            <div class="flex gap-5">
                <div class="bg-[#474646] px-2 py-1 rounded-full">
                    <span class="hover:opacity-65">
                        <a href="http://Youtube.com/@swindontube" target="_blank" class="fa-brands fa-youtube"></a>
                    </span>
                </div>
                <div class="bg-[#474646] px-2 py-1 rounded-full">
                    <span class="hover:opacity-65">
                        <a href="https://open.spotify.com/artist/2G94k41THYXoXLI7IL3fvE?si=oNb8c3-5T6SJ0YlrHpAULw"
                            target="_blank" class="fa-brands fa-spotify"></a>
                    </span>
                </div>
                <div class="bg-[#474646] px-2 py-1 rounded-full">
                    <span class="hover:opacity-65">
                        <a href="http://X.com/swindonhq" target="_blank" class="fa-brands fa-twitter"></a>
                    </span>
                </div>
                <div class="bg-[#474646] px-2 py-1 rounded-full">
                    <span class="hover:opacity-65">
                        <a href="http://Instagram.com/swindongram" target="_blank" class="fa-brands fa-instagram"></a>
                    </span>
                </div>
                <div class="bg-[#474646] px-2 py-1 rounded-full">
                    <span class="hover:opacity-65">
                        <a href="http://Tiktok.com/@swindonmusic" target="_blank" class="fa-brands fa-tiktok"></a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- end footer jumbotron --}}
<footer class="bg-black md:mx-auto pt-10 {{ $admin ? 'hidden' : 'block' }}">

    {{-- sosmed --}}
    {{-- <div class="flex justify-center">
        <div class="flex gap-5">
            <div class="bg-[#6A6A6A] px-2 py-1 rounded-full">
                <span class="hover:opacity-65">
                    <a href="http://Youtube.com/@swindontube" target="_blank" class="fa-brands fa-youtube"></a>
                </span>
            </div>
            <div class="bg-[#6A6A6A] px-2 py-1 rounded-full">
                <span class="hover:opacity-65">
                    <a href="https://open.spotify.com/artist/2G94k41THYXoXLI7IL3fvE?si=oNb8c3-5T6SJ0YlrHpAULw"
                        target="_blank" class="fa-brands fa-spotify"></a>
                </span>
            </div>
            <div class="bg-[#6A6A6A] px-2 py-1 rounded-full">
                <span class="hover:opacity-65">
                    <a href="http://X.com/swindonhq" target="_blank" class="fa-brands fa-twitter"></a>
                </span>
            </div>
            <div class="bg-[#6A6A6A] px-2 py-1 rounded-full">
                <span class="hover:opacity-65">
                    <a href="http://Instagram.com/swindongram" target="_blank" class="fa-brands fa-instagram"></a>
                </span>
            </div>
            <div class="bg-[#6A6A6A] px-2 py-1 rounded-full">
                <span class="hover:opacity-65">
                    <a href="http://Tiktok.com/@swindonmusic" target="_blank" class="fa-brands fa-tiktok"></a>
                </span>
            </div>
        </div>
    </div> --}}
    {{-- end sosmed --}}

    {{-- footbar --}}
    <div class="footer flex rounded-full w-fit mx-auto bg-base-100 p-2 mt-10 justify-center">
        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href="/biography" :active="request()->is('biography')">Biography</x-nav-link>
        <x-nav-link href="/discography" :active="request()->is('discography')">Discography</x-nav-link>
        <x-nav-link href="/footage" :active="request()->is('footage')">Footage</x-nav-link>
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

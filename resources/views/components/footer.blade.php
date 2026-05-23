@props(['admin' => request()->is('admin') || request()->is('admin/*')])
{{-- Footer hero section --}}
<section class="bg-center bg-no-repeat bg-base-100 mt-[5rem] bg-cover {{ $admin ? 'hidden' : 'block' }}"
    style="background-image: url({{ asset('images/footer-section.jpg') }})">

    <div class="px-6 py-16 md:py-24 mx-auto max-w-screen-xl text-center">
        <h1 class="mb-4 text-2xl md:text-4xl font-extrabold tracking-tight leading-tight text-white uppercase drop-shadow-lg">
            United Through Music and Passion.
        </h1>
        <p class="mb-8 text-sm md:text-lg text-gray-200 drop-shadow-lg">
            Follow Us on
        </p>
        <div class="flex justify-center">
            <div class="flex gap-4 md:gap-5">
                <a href="http://Youtube.com/@swindontube" target="_blank"
                   class="bg-[#474646] w-9 h-9 md:w-10 md:h-10 flex items-center justify-center rounded-full hover:opacity-65 transition-opacity">
                    <i class="fa-brands fa-youtube text-white text-sm md:text-base"></i>
                </a>
                <a href="https://open.spotify.com/artist/2G94k41THYXoXLI7IL3fvE?si=oNb8c3-5T6SJ0YlrHpAULw" target="_blank"
                   class="bg-[#474646] w-9 h-9 md:w-10 md:h-10 flex items-center justify-center rounded-full hover:opacity-65 transition-opacity">
                    <i class="fa-brands fa-spotify text-white text-sm md:text-base"></i>
                </a>
                <a href="http://X.com/swindonhq" target="_blank"
                   class="bg-[#474646] w-9 h-9 md:w-10 md:h-10 flex items-center justify-center rounded-full hover:opacity-65 transition-opacity">
                    <i class="fa-brands fa-twitter text-white text-sm md:text-base"></i>
                </a>
                <a href="http://Instagram.com/swindongram" target="_blank"
                   class="bg-[#474646] w-9 h-9 md:w-10 md:h-10 flex items-center justify-center rounded-full hover:opacity-65 transition-opacity">
                    <i class="fa-brands fa-instagram text-white text-sm md:text-base"></i>
                </a>
                <a href="http://Tiktok.com/@swindonmusic" target="_blank"
                   class="bg-[#474646] w-9 h-9 md:w-10 md:h-10 flex items-center justify-center rounded-full hover:opacity-65 transition-opacity">
                    <i class="fa-brands fa-tiktok text-white text-sm md:text-base"></i>
                </a>
            </div>
        </div>
    </div>
</section>
{{-- end footer hero --}}

<footer class="bg-black pt-8 pb-6 {{ $admin ? 'hidden' : 'block' }}">
    {{-- Logo --}}
    <div class="flex justify-center mb-6">
        <a href="/">
            <img src="{{ asset('logo-swindon.png') }}" alt="Swindon" class="w-24 md:w-32">
        </a>
    </div>

    {{-- Navigation links --}}
    <nav class="flex flex-wrap justify-center gap-x-6 gap-y-2 px-4 mb-6">
        <a href="/" class="text-white text-sm hover:text-gray-400 transition-colors">Home</a>
        <a href="/biography" class="text-white text-sm hover:text-gray-400 transition-colors">Biography</a>
        <a href="/discography" class="text-white text-sm hover:text-gray-400 transition-colors">Discography</a>
        <a href="/footage" class="text-white text-sm hover:text-gray-400 transition-colors">Footage</a>
    </nav>

    {{-- Divider --}}
    <div class="border-t border-gray-800 mx-6 md:mx-auto md:max-w-screen-md"></div>

    {{-- Copyright --}}
    <div class="text-center pt-5">
        <p class="text-xs text-gray-500">
            &copy; 2025 SWINDON. All Rights Reserved.
        </p>
    </div>
</footer>

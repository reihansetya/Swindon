<x-layout>
    <x-slot:title>
        Biography
    </x-slot:title>

    {{-- Hero Section --}}
    <section class="hero min-h-screen grayscale bg-center bg-no-repeat bg-blend-multiply -mt-12 bg-cover relative overflow-hidden"
        style="background-image: url({{ asset('header-bio.jpg') }})">
        <div class="absolute inset-0 bg-black/30"></div>
        <div class="hero-content text-neutral-content text-center relative z-10 items-start pt-20 md:pt-32">
            <div class="max-w-xs md:max-w-md">
                <img src="{{ asset('logo-swindon.png') }}" alt="logo-swindon" class="w-48 md:w-full mx-auto">
                <h3 class="mt-6 md:mt-10 text-lg md:text-2xl font-bold tracking-wider uppercase">
                    The Story
                </h3>
            </div>
        </div>
    </section>

    {{-- Story Content --}}
    <div class="bg-base-200">

        {{-- Section 1: The Beginning --}}
        <section class="max-w-6xl mx-auto px-6 py-12 md:py-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16 items-center">
                <div class="space-y-4 md:space-y-6">
                    <p class="text-base md:text-xl leading-relaxed">
                        Swindon adalah sebuah band beranggotakan lima orang yang menghadirkan suara khas britpop dengan
                        sentuhan modern. Dipimpin oleh Riyan sebagai frontman, band ini mengusung gaya dan atmosfer musik
                        yang terinspirasi dari Oasis, The Verve, dan Blur.
                    </p>
                    <p class="text-sm md:text-base text-base-content/70 leading-relaxed">
                        Terbentuk dari kecintaan bersama terhadap era keemasan britpop, Swindon menggabungkan melodi
                        yang catchy dengan lirik yang introspektif, menciptakan pengalaman musik yang nostalgik namun
                        tetap relevan dengan generasi saat ini.
                    </p>
                </div>
                <div>
                    <img src="{{ asset('images/album1.png') }}" alt="Swindon Band"
                         class="w-full grayscale hover:grayscale-0 transition-all duration-500">
                </div>
            </div>
        </section>

        {{-- Highlight Quote --}}
        <section class="bg-black py-12 md:py-20 px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-xl md:text-4xl lg:text-5xl font-extrabold text-white uppercase leading-tight tracking-tight">
                    "Kami ingin membuat musik yang bisa dirasakan semua orang — tanpa batas, tanpa aturan."
                </h2>
            </div>
        </section>

        {{-- Section 2: The Sound --}}
        <section class="max-w-6xl mx-auto px-6 py-12 md:py-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16 items-center">
                <div class="order-2 md:order-1">
                    <img src="{{ asset('images/footage-1.jpg') }}" alt="Swindon Live"
                         class="w-full grayscale hover:grayscale-0 transition-all duration-500">
                </div>
                <div class="order-1 md:order-2 space-y-4 md:space-y-6">
                    <p class="text-base md:text-xl leading-relaxed">
                        Dengan riff gitar yang tajam dan vokal yang penuh attitude, Swindon membawa energi panggung
                        yang raw dan tidak terbendung. Setiap lagu ditulis dengan tujuan yang jelas — untuk dirasakan,
                        bukan hanya didengar.
                    </p>
                    <p class="text-sm md:text-base text-base-content/70 leading-relaxed">
                        Album debut mereka "Morning Glory" menjadi bukti bahwa britpop masih hidup dan relevan.
                        Dengan 10 track yang penuh energi dan melodi catchy, album ini langsung menarik perhatian
                        para pecinta musik rock di seluruh Indonesia.
                    </p>
                </div>
            </div>
        </section>

        {{-- Full Width Image --}}
        <section class="w-full">
            <img src="{{ asset('images/footer-section.jpg') }}" alt="Swindon Concert"
                 class="w-full h-48 md:h-96 object-cover grayscale">
        </section>

        {{-- Section 3: The Journey --}}
        <section class="max-w-6xl mx-auto px-6 py-12 md:py-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16 items-center">
                <div class="space-y-4 md:space-y-6">
                    <p class="text-base md:text-xl leading-relaxed">
                        Dari panggung kecil di Jakarta hingga festival musik nasional, perjalanan Swindon adalah
                        bukti bahwa passion dan dedikasi bisa membawa sebuah band ke tempat yang tidak pernah
                        mereka bayangkan sebelumnya.
                    </p>
                    <p class="text-sm md:text-base text-base-content/70 leading-relaxed">
                        EP kedua mereka "Echoes of Yesterday" menunjukkan sisi yang lebih matang dan introspektif.
                        Menggali tema nostalgia, kehilangan, dan harapan dengan aransemen yang lebih kompleks —
                        membuktikan bahwa Swindon bukan band satu album.
                    </p>
                </div>
                <div>
                    <img src="{{ asset('images/album1.png') }}" alt="Swindon Studio"
                         class="w-full grayscale hover:grayscale-0 transition-all duration-500">
                </div>
            </div>
        </section>

        {{-- Highlight Quote 2 --}}
        <section class="bg-black py-12 md:py-20 px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-xl md:text-4xl lg:text-5xl font-extrabold text-white uppercase leading-tight tracking-tight">
                    Musik yang akan hidup lebih lama dari kita semua.
                </h2>
            </div>
        </section>

        {{-- Section 4: The Future --}}
        <section class="max-w-6xl mx-auto px-6 py-12 md:py-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16 items-center">
                <div class="order-2 md:order-1">
                    <img src="{{ asset('images/footage-1.jpg') }}" alt="Swindon Future"
                         class="w-full grayscale hover:grayscale-0 transition-all duration-500">
                </div>
                <div class="order-1 md:order-2 space-y-4 md:space-y-6">
                    <p class="text-base md:text-xl leading-relaxed">
                        Swindon terus bergerak maju. Dengan materi baru yang sedang dikerjakan dan rencana tur
                        yang semakin ambisius, band ini tidak menunjukkan tanda-tanda melambat.
                    </p>
                    <p class="text-sm md:text-base text-base-content/70 leading-relaxed">
                        Karena pada akhirnya, Swindon bukan hanya tentang musik — ini tentang koneksi, tentang
                        generasi yang menemukan suara mereka, dan tentang mimpi yang tidak pernah mati.
                    </p>
                    <p class="text-lg md:text-2xl font-bold uppercase mt-6">
                        The story continues.
                    </p>
                </div>
            </div>
        </section>

        {{-- Listen Section --}}
        <section class="bg-black py-12 md:py-20 px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h3 class="text-lg md:text-2xl font-bold text-white uppercase tracking-widest mb-6 md:mb-8">
                    Listen to Swindon
                </h3>
                <div class="flex flex-wrap justify-center gap-3 md:gap-4">
                    <a href="https://open.spotify.com/artist/2G94k41THYXoXLI7IL3fvE" target="_blank"
                       class="inline-flex items-center gap-2 px-5 py-2.5 md:px-6 md:py-3 border-2 border-white text-white hover:bg-white hover:text-black transition-all duration-300 text-sm md:text-base">
                        <i class="fab fa-spotify text-lg md:text-xl"></i>
                        <span class="font-semibold">Spotify</span>
                    </a>
                    <a href="http://Youtube.com/@swindontube" target="_blank"
                       class="inline-flex items-center gap-2 px-5 py-2.5 md:px-6 md:py-3 border-2 border-white text-white hover:bg-white hover:text-black transition-all duration-300 text-sm md:text-base">
                        <i class="fab fa-youtube text-lg md:text-xl"></i>
                        <span class="font-semibold">YouTube</span>
                    </a>
                </div>
            </div>
        </section>

    </div>
</x-layout>

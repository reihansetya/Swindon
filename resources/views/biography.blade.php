<x-layout>
    <x-slot:title>
        Biography
    </x-slot:title>

    <!-- Hero Section with Parallax -->
    <section class="hero min-h-screen grayscale bg-center bg-no-repeat bg-blend-multiply -mt-12 bg-cover parallax-container relative overflow-hidden"
        style="background-image: url({{ 'header-bio.jpg' }})">
        <div class="absolute inset-0 bg-[linear-gradient(218deg,_rgba(18,17,17,0.5)_0%,_rgba(79,76,76,0.5)_100%)] parallax-bg" data-speed="0.5">
        </div>
        <div class="hero-content text-neutral-content text-center relative z-10">
            <div class="max-w-md" data-aos="fade-up" data-aos-duration="1200">
                <img src="{{ 'logo-swindon.png' }}" alt="logo-swindon" class="animate-fade-in">
                <h3 class="mt-10 text-2xl font-bold tracking-wider uppercase" data-aos="fade-up" data-aos-delay="300">
                    The Story
                </h3>
            </div>
        </div>
    </section>

    <!-- Origin Story Section with Scroll Animations -->
    <div class="hero bg-base-200 min-h-screen">
        <div class="flex flex-col lg:flex-row-reverse justify-center items-center gap-8 px-6 py-12 max-w-7xl">
            <div class="lg:w-1/2" data-aos="fade-left" data-aos-duration="1000">
                <img src="{{ 'images/footage-1.jpg' }}" alt="Swindon Band"
                    class="w-full rounded-lg shadow-2xl grayscale hover:grayscale-0 transition-smooth" />
            </div>
            <div class="lg:w-1/2 space-y-6" data-aos="fade-right" data-aos-duration="1000">
                <h2 class="text-4xl font-bold tracking-tight uppercase border-l-4 border-white pl-4"
                    data-aos="fade-up" data-aos-delay="200">
                    The Beginning
                </h2>
                <div class="space-y-4 text-lg leading-relaxed">
                    <p data-aos="fade-up" data-aos-delay="300">
                        Swindon adalah sebuah band beranggotakan lima orang yang menghadirkan suara khas britpop dengan
                        sentuhan modern. Dipimpin oleh Riyan sebagai frontman, band ini mengusung gaya dan atmosfer musik
                        yang terinspirasi dari Oasis, The Verve, dan Blur, namun dengan karakter yang unik dan autentik.
                    </p>
                    <p class="text-base-content/80" data-aos="fade-up" data-aos-delay="400">
                        Terbentuk dari kecintaan bersama terhadap era keemasan britpop, Swindon menggabungkan melodi
                        yang catchy dengan lirik yang introspektif, menciptakan pengalaman musik yang nostalgik namun
                        tetap relevan dengan generasi saat ini.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>

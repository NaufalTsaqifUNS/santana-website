<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head } from "@inertiajs/vue3";

// Set layout
defineOptions({
    layout: MainLayout,
});
</script>

<template>
    <Head title="Hubungi Kami - Santana Rental Mobil Solo" />

    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Hero Section -->
        <section
            class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white py-20 md:py-28 overflow-hidden"
        >
            <!-- Animated background elements -->
            <div class="absolute inset-0 opacity-10">
                <div
                    class="absolute w-2 h-2 bg-red-500 rounded-full animate-pulse"
                    style="top: 20%; left: 10%"
                ></div>
                <div
                    class="absolute w-2 h-2 bg-red-500 rounded-full animate-pulse"
                    style="top: 40%; right: 10%; animation-delay: 0.5s"
                ></div>
                <div
                    class="absolute w-2 h-2 bg-red-500 rounded-full animate-pulse"
                    style="top: 70%; left: 15%; animation-delay: 1s"
                ></div>
                <div
                    class="absolute w-2 h-2 bg-red-500 rounded-full animate-pulse"
                    style="top: 85%; right: 15%; animation-delay: 1.5s"
                ></div>
            </div>

            <div
                class="container mx-auto px-6 md:px-12 lg:px-16 xl:px-20 relative z-10"
            >
                <div class="max-w-4xl mx-auto text-center">
                    <!-- Badge -->
                    <div
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-red-500/20 backdrop-blur-sm border border-red-500/30 rounded-full mb-6 animate-fade-in"
                    >
                        <svg
                            class="w-4 h-4 text-red-400"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"
                            />
                            <path
                                d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"
                            />
                        </svg>
                        <span class="text-white text-sm font-medium"
                            >Kami Siap Membantu Anda</span
                        >
                    </div>

                    <h1
                        class="text-4xl sm:text-5xl md:text-6xl font-bold mb-6 leading-tight"
                    >
                        Hubungi
                        <span class="relative inline-block">
                            <span class="text-red-500">Kami</span>
                            <svg
                                class="absolute -bottom-2 left-0 w-full"
                                height="8"
                                viewBox="0 0 200 12"
                                fill="none"
                            >
                                <path
                                    d="M2 10C60 2 140 2 198 10"
                                    stroke="#EF4444"
                                    stroke-width="3"
                                    stroke-linecap="round"
                                />
                            </svg>
                        </span>
                    </h1>
                    <p
                        class="text-lg md:text-xl text-gray-300 leading-relaxed max-w-2xl mx-auto"
                    >
                        Punya pertanyaan tentang layanan rental mobil kami? Tim
                        kami siap membantu Anda dengan senang hati.
                    </p>
                </div>
            </div>
        </section>

        <!-- Contact Content -->
        <section class="py-16 md:py-24">
            <div class="container mx-auto px-6 md:px-12 lg:px-16 xl:px-20">
                <!-- Contact Cards -->
                <div class="max-w-6xl mx-auto mb-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <!-- Email Card -->
                        <div
                            class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-8 border border-gray-100 hover:border-red-200 hover:-translate-y-1"
                        >
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-5 shadow-lg shadow-red-500/30"
                            >
                                <svg
                                    class="w-7 h-7 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                    />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">
                                Email
                            </h3>
                            <a
                                href="mailto:santanarental@gmail.com"
                                class="text-gray-600 hover:text-red-500 transition-colors duration-200 break-all"
                                >santanarental@gmail.com</a
                            >
                        </div>

                        <!-- Phone Card -->
                        <div
                            class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-8 border border-gray-100 hover:border-red-200 hover:-translate-y-1"
                        >
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-5 shadow-lg shadow-red-500/30"
                            >
                                <svg
                                    class="w-7 h-7 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                    />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">
                                Telepon
                            </h3>
                            <a
                                href="tel:+6281226300063"
                                class="text-gray-600 hover:text-red-500 transition-colors duration-200"
                                >+62 812-2630-0063</a
                            >
                        </div>
                    </div>
                </div>

                <!-- Social Media & Chat -->
                <div class="max-w-6xl mx-auto mb-16">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Social Media Section -->
                        <div
                            class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100"
                        >
                            <div class="flex items-center gap-3 mb-6">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center shadow-lg shadow-red-500/30"
                                >
                                    <svg
                                        class="w-6 h-6 text-white"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
                                        />
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900">
                                    Ikuti Kami
                                </h3>
                            </div>
                            <p class="text-gray-600 mb-6">
                                Dapatkan update terbaru tentang promo dan
                                layanan kami
                            </p>

                            <div class="space-y-4">
                                <!-- Instagram -->
                                <a
                                    href="https://www.instagram.com/santana.cars_sewamobil.solo?igsh=b3RmZGRsd2ZsMnhr"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="flex items-center justify-between p-4 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 rounded-xl transition-all duration-300 group shadow-md hover:shadow-lg"
                                >
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center"
                                        >
                                            <svg
                                                class="w-6 h-6 text-white"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"
                                                />
                                            </svg>
                                        </div>
                                        <div class="text-left">
                                            <h4
                                                class="text-white font-bold text-lg"
                                            >
                                                Instagram
                                            </h4>
                                            <p class="text-white/80 text-sm">
                                                @santana.cars_sewamobil.solo
                                            </p>
                                        </div>
                                    </div>
                                    <svg
                                        class="w-6 h-6 text-white transform group-hover:translate-x-1 transition-transform"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5l7 7-7 7"
                                        />
                                    </svg>
                                </a>

                                <!-- TikTok -->
                                <a
                                    href="https://www.tiktok.com/@arissantanacarsso?_r=1&_t=ZS-93CD7yaUR6Y"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-900 to-black hover:from-black hover:to-gray-800 rounded-xl transition-all duration-300 group shadow-md hover:shadow-lg"
                                >
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center"
                                        >
                                            <svg
                                                class="w-6 h-6 text-white"
                                                fill="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"
                                                />
                                            </svg>
                                        </div>
                                        <div class="text-left">
                                            <h4
                                                class="text-white font-bold text-lg"
                                            >
                                                TikTok
                                            </h4>
                                            <p class="text-white/80 text-sm">
                                                @arissantanacarsso
                                            </p>
                                        </div>
                                    </div>
                                    <svg
                                        class="w-6 h-6 text-white transform group-hover:translate-x-1 transition-transform"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5l7 7-7 7"
                                        />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- WhatsApp Section -->
                        <div
                            class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100"
                        >
                            <div
                                class="flex items-center justify-center flex-col text-center h-full"
                            >
                                <div
                                    class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 shadow-xl shadow-green-500/30"
                                >
                                    <svg
                                        class="w-10 h-10 text-white"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"
                                        />
                                    </svg>
                                </div>
                                <h4
                                    class="text-2xl font-bold text-gray-900 mb-3"
                                >
                                    Chat Via WhatsApp
                                </h4>
                                <p class="text-gray-600 mb-6 max-w-sm">
                                    Hubungi kami langsung melalui WhatsApp untuk
                                    respon yang lebih cepat
                                </p>
                                <a
                                    href="https://wa.me/6281226300063?text=Halo%20Santana%20Rental,%20saya%20ingin%20bertanya%20tentang%20layanan%20rental%20mobil"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="inline-flex items-center gap-3 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:shadow-green-500/50 hover:scale-105"
                                >
                                    <svg
                                        class="w-6 h-6"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"
                                        />
                                    </svg>
                                    <span>Chat Sekarang</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Location Section -->
                <div class="max-w-6xl mx-auto">
                    <div
                        class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100"
                    >
                        <div
                            class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 p-8"
                        >
                            <h2
                                class="text-3xl font-bold text-white text-center mb-3"
                            >
                                Temukan Lokasi Kami
                            </h2>
                            <p class="text-gray-300 text-center text-lg">
                                Kunjungi salah satu cabang kami untuk layanan
                                yang lebih personal
                            </p>
                        </div>

                        <!-- Main Branch with Map -->
                        <div
                            class="p-8 bg-gradient-to-br from-gray-50 to-white"
                        >
                            <!-- Surabaya Main Branch -->
                            <div class="mb-8">
                                <div class="flex items-center gap-3 mb-4">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center shadow-lg shadow-red-500/30"
                                    >
                                        <svg
                                            class="w-6 h-6 text-white"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3
                                            class="text-2xl font-bold text-gray-900"
                                        >
                                            Surabaya
                                        </h3>
                                        <span
                                            class="inline-block px-3 py-1 bg-red-100 text-red-600 text-xs font-semibold rounded-full"
                                            >Kantor Pusat</span
                                        >
                                    </div>
                                </div>
                                <p
                                    class="text-gray-600 mb-4 text-lg leading-relaxed"
                                >
                                    📍 Sewa Mobil Surabaya Santana, Bella
                                    Exclusive Tower, Pakuwon City, Surabaya,
                                    Jawa Timur 60112
                                </p>

                                <!-- Google Maps -->
                                <div
                                    class="w-full h-96 lg:h-[450px] rounded-xl overflow-hidden shadow-lg mb-4"
                                >
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2857537485835!2d112.8039661!3d-7.2802682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbeb937de84f%3A0xa371ed608b08ddc4!2sSewa%20Mobil%20Surabaya%20Santana!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid"
                                        class="w-full h-full border-0"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                    ></iframe>
                                </div>

                                <!-- View on Maps Button -->
                                <div class="text-center">
                                    <a
                                        href="https://www.google.com/maps/place/Sewa+Mobil+Surabaya+Santana/@-7.2802682,112.8061548,840m/data=!3m2!1e3!4b1!4m6!3m5!1s0x2dd7fbeb937de84f:0xa371ed608b08ddc4!8m2!3d-7.2802682!4d112.8061548!16s%2Fg%2F11myly6fpr?entry=ttu&g_ep=EgoyMDI2MDEwNy4wIKXMDSoASAFQAw%3D%3D"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="inline-flex items-center gap-3 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-bold py-3 px-8 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:shadow-red-500/50 hover:scale-105"
                                    >
                                        <svg
                                            class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                            />
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                            />
                                        </svg>
                                        <span>Lihat di Google Maps</span>
                                        <svg
                                            class="w-4 h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                                            />
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <!-- Other Branches List -->
                            <div class="mt-10 pt-8 border-t-2 border-gray-200">
                                <h3
                                    class="text-2xl font-bold text-gray-900 mb-6 text-center"
                                >
                                    Cabang Lainnya
                                </h3>

                                <div
                                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"
                                >
                                    <!-- Jakarta -->
                                    <div
                                        class="bg-white border-2 border-gray-200 rounded-xl p-5 hover:border-red-300 hover:shadow-md transition-all duration-300"
                                    >
                                        <div class="flex items-start gap-3">
                                            <div
                                                class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center flex-shrink-0 shadow-md"
                                            >
                                                <svg
                                                    class="w-5 h-5 text-white"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                                    />
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                                    />
                                                </svg>
                                            </div>
                                            <div>
                                                <h4
                                                    class="font-bold text-gray-900 mb-1"
                                                >
                                                    Jakarta
                                                </h4>
                                                <p
                                                    class="text-sm text-gray-600 leading-relaxed"
                                                >
                                                    Teluk Pucung RT 06 RW 02,
                                                    Teluk Pucung, Bekasi Utara,
                                                    Kota Bekasi, Jawa Barat
                                                    17121
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Bandung -->
                                    <div
                                        class="bg-white border-2 border-gray-200 rounded-xl p-5 hover:border-red-300 hover:shadow-md transition-all duration-300"
                                    >
                                        <div class="flex items-start gap-3">
                                            <div
                                                class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center flex-shrink-0 shadow-md"
                                            >
                                                <svg
                                                    class="w-5 h-5 text-white"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                                    />
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                                    />
                                                </svg>
                                            </div>
                                            <div>
                                                <h4
                                                    class="font-bold text-gray-900 mb-1"
                                                >
                                                    Bandung
                                                </h4>
                                                <p
                                                    class="text-sm text-gray-600 leading-relaxed"
                                                >
                                                    Jalan Kudus Nomor 8 RT 05 RW
                                                    012, Antapani Kidul,
                                                    Antapani, Kota Bandung, Jawa
                                                    Barat 40291
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Semarang -->
                                    <div
                                        class="bg-white border-2 border-gray-200 rounded-xl p-5 hover:border-red-300 hover:shadow-md transition-all duration-300"
                                    >
                                        <div class="flex items-start gap-3">
                                            <div
                                                class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center flex-shrink-0 shadow-md"
                                            >
                                                <svg
                                                    class="w-5 h-5 text-white"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                                    />
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                                    />
                                                </svg>
                                            </div>
                                            <div>
                                                <h4
                                                    class="font-bold text-gray-900 mb-1"
                                                >
                                                    Semarang
                                                </h4>
                                                <p
                                                    class="text-sm text-gray-600 leading-relaxed"
                                                >
                                                    Jalan Setia Budi Nomor 9A,
                                                    Sumurboto, Kec. Banyumanik,
                                                    Kota Semarang, Jawa Tengah
                                                    50269
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Yogyakarta -->
                                    <div
                                        class="bg-white border-2 border-gray-200 rounded-xl p-5 hover:border-red-300 hover:shadow-md transition-all duration-300"
                                    >
                                        <div class="flex items-start gap-3">
                                            <div
                                                class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center flex-shrink-0 shadow-md"
                                            >
                                                <svg
                                                    class="w-5 h-5 text-white"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                                    />
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                                    />
                                                </svg>
                                            </div>
                                            <div>
                                                <h4
                                                    class="font-bold text-gray-900 mb-1"
                                                >
                                                    Yogyakarta
                                                </h4>
                                                <p
                                                    class="text-sm text-gray-600 leading-relaxed"
                                                >
                                                    Jalan Abimanyu, Ngebel,
                                                    Taman Tirto, Kec. Kasihan,
                                                    Kab. Bantul, Daerah Istimewa
                                                    Yogyakarta 55184
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Batam -->
                                    <div
                                        class="bg-white border-2 border-gray-200 rounded-xl p-5 hover:border-red-300 hover:shadow-md transition-all duration-300"
                                    >
                                        <div class="flex items-start gap-3">
                                            <div
                                                class="w-10 h-10 bg-gradient-to-br from-pink-500 to-pink-600 rounded-lg flex items-center justify-center flex-shrink-0 shadow-md"
                                            >
                                                <svg
                                                    class="w-5 h-5 text-white"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                                    />
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                                    />
                                                </svg>
                                            </div>
                                            <div>
                                                <h4
                                                    class="font-bold text-gray-900 mb-1"
                                                >
                                                    Batam
                                                </h4>
                                                <p
                                                    class="text-sm text-gray-600 leading-relaxed"
                                                >
                                                    Jalan Gajah Mada, Tiban
                                                    Nomor 7, Batam, Kepulauan
                                                    Riau 29431
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Balikpapan -->
                                    <div
                                        class="bg-white border-2 border-gray-200 rounded-xl p-5 hover:border-red-300 hover:shadow-md transition-all duration-300"
                                    >
                                        <div class="flex items-start gap-3">
                                            <div
                                                class="w-10 h-10 bg-gradient-to-br from-teal-500 to-teal-600 rounded-lg flex items-center justify-center flex-shrink-0 shadow-md"
                                            >
                                                <svg
                                                    class="w-5 h-5 text-white"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                                    />
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                                    />
                                                </svg>
                                            </div>
                                            <div>
                                                <h4
                                                    class="font-bold text-gray-900 mb-1"
                                                >
                                                    Balikpapan
                                                </h4>
                                                <p
                                                    class="text-sm text-gray-600 leading-relaxed"
                                                >
                                                    CF. Afdeling, Rimba Berlian
                                                    RT 10 RW 0, Semerangkai,
                                                    Kec. Kapuas, Kab. Sanggau,
                                                    Kalimantan Barat 78564
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<style scoped>
.animate-fade-in {
    animation: fadeIn 0.8s ease-in;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

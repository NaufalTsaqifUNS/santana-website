<script setup>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head } from "@inertiajs/vue3";

defineOptions({
    layout: MainLayout,
});
</script>

<template>
    <Head title="Hubungi Kami - Santana Rental Mobil Solo" />

    <div class="min-h-screen bg-gray-50">
        <!-- Hero -->
        <section
            class="relative overflow-hidden bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white"
        >
            <!-- Decorative dots -->
            <div class="absolute inset-0 opacity-10 pointer-events-none">
                <div
                    class="absolute w-2 h-2 bg-red-500 rounded-full animate-pulse"
                    style="top: 20%; left: 10%"
                />
                <div
                    class="absolute w-2 h-2 bg-red-500 rounded-full animate-pulse"
                    style="top: 40%; right: 10%; animation-delay: 0.5s"
                />
                <div
                    class="absolute w-2 h-2 bg-red-500 rounded-full animate-pulse"
                    style="top: 70%; left: 15%; animation-delay: 1s"
                />
                <div
                    class="absolute w-2 h-2 bg-red-500 rounded-full animate-pulse"
                    style="top: 85%; right: 15%; animation-delay: 1.5s"
                />
            </div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="py-14 sm:py-18 md:py-22 lg:py-24">
                    <div class="mx-auto max-w-3xl text-center">
                        <div
                            class="inline-flex items-center gap-2 rounded-full border border-red-500/30 bg-red-500/20 px-4 py-2 backdrop-blur-sm mb-6 animate-fade-in"
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
                            <span class="text-sm font-medium text-white">
                                We're Here to Help
                            </span>
                        </div>

                        <h1
                            class="font-bold leading-tight text-3xl sm:text-4xl md:text-5xl lg:text-6xl"
                        >
                            Get In
                            <span class="relative inline-block">
                                <span class="text-red-500">Touch</span>
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
                            class="mt-5 text-base sm:text-lg md:text-xl text-gray-300 leading-relaxed"
                        >
                            Punya pertanyaan tentang layanan rental mobil kami?
                            Kami siap membantu Anda. Hubungi kami melalui salah
                            satu saluran di bawah ini.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Content -->
        <section class="py-12 sm:py-16 md:py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <!-- Contact cards -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                    <!-- Phone -->
                    <div
                        class="group rounded-2xl bg-white p-6 shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
                    >
                        <div
                            class="mb-4 flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-red-500 to-red-600 transition-transform duration-300 group-hover:scale-110"
                        >
                            <svg
                                class="h-7 w-7 text-white"
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

                        <h3 class="text-lg font-bold text-gray-900">Phone</h3>
                        <p class="mt-2 text-gray-600">
                            <a
                                href="tel:+6281234567890"
                                class="font-medium hover:text-red-600 transition-colors"
                            >
                                +62 812-3456-7890
                            </a>
                        </p>
                    </div>

                    <!-- Email -->
                    <div
                        class="group rounded-2xl bg-white p-6 shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
                    >
                        <div
                            class="mb-4 flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-red-500 to-red-600 transition-transform duration-300 group-hover:scale-110"
                        >
                            <svg
                                class="h-7 w-7 text-white"
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

                        <h3 class="text-lg font-bold text-gray-900">Email</h3>
                        <p class="mt-2 text-gray-600">
                            <a
                                href="mailto:info@santanacarrental.com"
                                class="font-medium break-words hover:text-red-600 transition-colors"
                            >
                                info@santanacarrental.com
                            </a>
                        </p>
                    </div>

                    <!-- Address -->
                    <div
                        class="group rounded-2xl bg-white p-6 shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
                    >
                        <div
                            class="mb-4 flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-red-500 to-red-600 transition-transform duration-300 group-hover:scale-110"
                        >
                            <svg
                                class="h-7 w-7 text-white"
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

                        <h3 class="text-lg font-bold text-gray-900">Address</h3>
                        <p class="mt-2 text-gray-600 leading-relaxed">
                            Sewa Mobil Surabaya Santana<br />
                            Bella Exclusive Tower, Mulyorejo<br />
                            Pakuwon City, Surabaya<br />
                            Jawa Timur 60112
                        </p>
                    </div>
                </div>

                <!-- Social + Quick -->
                <div
                    class="mt-10 sm:mt-14 grid grid-cols-1 gap-8 lg:grid-cols-2"
                >
                    <!-- Follow -->
                    <div class="rounded-2xl bg-white shadow-lg p-6 sm:p-8">
                        <div class="text-center">
                            <div
                                class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-gradient-to-br from-red-500 to-red-600"
                            >
                                <svg
                                    class="h-8 w-8 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"
                                    />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">
                                Follow Us
                            </h3>
                            <p class="mt-2 text-sm text-gray-600">
                                Stay connected with us on social media for
                                latest updates and offers.
                            </p>
                        </div>

                        <div class="mt-6 space-y-4">
                            <!-- Facebook -->
                            <a
                                href="https://facebook.com"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="group flex items-center gap-4 rounded-2xl p-4 transition-all duration-300 hover:scale-[1.02] hover:shadow-lg bg-gradient-to-r from-blue-50 to-blue-100 hover:from-blue-600 hover:to-blue-700"
                            >
                                <div
                                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 transition-colors group-hover:bg-white"
                                >
                                    <svg
                                        class="h-6 w-6 text-white transition-colors group-hover:text-blue-600"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
                                        />
                                    </svg>
                                </div>

                                <div class="min-w-0 flex-1">
                                    <h4
                                        class="font-semibold text-blue-900 transition-colors group-hover:text-white"
                                    >
                                        Facebook
                                    </h4>
                                    <p
                                        class="text-sm text-blue-700 transition-colors group-hover:text-blue-100"
                                    >
                                        Follow us on Facebook
                                    </p>
                                </div>

                                <svg
                                    class="h-5 w-5 text-blue-600 transition-colors group-hover:text-white"
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

                            <!-- Instagram -->
                            <a
                                href="https://instagram.com"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="group flex items-center gap-4 rounded-2xl p-4 transition-all duration-300 hover:scale-[1.02] hover:shadow-lg bg-gradient-to-r from-pink-50 to-orange-50 hover:from-purple-600 hover:via-pink-600 hover:to-orange-500"
                            >
                                <div
                                    class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-purple-600 via-pink-600 to-orange-500 transition-colors group-hover:bg-white"
                                >
                                    <svg
                                        class="h-6 w-6 text-white transition-colors group-hover:text-pink-600"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"
                                        />
                                    </svg>
                                </div>

                                <div class="min-w-0 flex-1">
                                    <h4
                                        class="font-semibold text-pink-900 transition-colors group-hover:text-white"
                                    >
                                        Instagram
                                    </h4>
                                    <p
                                        class="text-sm text-pink-700 transition-colors group-hover:text-pink-100"
                                    >
                                        Follow us on Instagram
                                    </p>
                                </div>

                                <svg
                                    class="h-5 w-5 text-pink-600 transition-colors group-hover:text-white"
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

                    <!-- Quick Assistance Card -->
                    <div
                        class="bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg p-6 sm:p-8 text-white flex items-center justify-center"
                    >
                        <div class="text-center max-w-sm">
                            <div
                                class="inline-flex items-center justify-center w-16 h-16 bg-white/20 backdrop-blur-sm rounded-full mb-4"
                            >
                                <svg
                                    class="w-8 h-8 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                            <h4 class="text-2xl font-bold mb-2">
                                Need Quick Assistance?
                            </h4>
                            <p class="text-red-100 text-sm mb-6">
                                Our team is ready to help you with any questions
                                about our car rental services.
                            </p>
                            <a
                                href="https://wa.me/6281234567890"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 bg-white text-red-600 font-semibold px-6 py-3 rounded-lg hover:bg-red-50 transition-all duration-300 hover:scale-105 shadow-lg"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"
                                    />
                                </svg>
                                <span>Chat on WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div
                    class="mt-10 sm:mt-14 overflow-hidden rounded-2xl bg-white shadow-lg"
                >
                    <div
                        class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 p-6"
                    >
                        <h2
                            class="text-center text-2xl sm:text-3xl font-bold text-white"
                        >
                            Find Us on Map
                        </h2>
                        <p class="mt-2 text-center text-sm text-gray-300">
                            Visit our office for personalized service
                        </p>
                    </div>

                    <div class="w-full h-[320px] sm:h-[380px] lg:h-[520px]">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2842842842843!2d112.80393931476953!3d-7.280268292731234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa371ed608b08ddc4!2sSewa%20Mobil%20Surabaya%20Santana!5e0!3m2!1sid!2sid!4v1737534100000!5m2!1sid!2sid"
                            class="h-full w-full border-0"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                        />
                    </div>

                    <div class="border-t bg-gray-50 p-6 text-center">
                        <a
                            href="https://www.google.com/maps/place/Sewa+Mobil+Surabaya+Santana/data=!4m2!3m1!1s0x0:0xa371ed608b08ddc4"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-red-500 to-red-600 px-6 py-3 font-semibold text-white shadow-lg transition-all duration-300 hover:from-red-600 hover:to-red-700 hover:shadow-xl hover:shadow-red-500/40 hover:scale-[1.02]"
                        >
                            <svg
                                class="h-5 w-5"
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
                            <span>Visit Location</span>
                            <svg
                                class="h-4 w-4"
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
            </div>
        </section>
    </div>
</template>

<style scoped>
.animate-fade-in {
    animation: fadeIn 0.6s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<template>
    <header
        class="bg-white shadow-sm fixed top-0 left-0 right-0 z-50 transition-transform duration-300"
        :class="{ '-translate-y-full': !showHeader }"
    >
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo Section -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <!-- Logo Image -->
                        <img
                            src="/images/santana-logo.png"
                            alt="Santana Logo"
                            class="h-12 w-auto"
                        />
                    </div>
                </div>

                <!-- Navigation Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <Link
                            href="/"
                            class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200"
                            :class="{
                                'text-red-600 border-b-2 border-red-600':
                                    activeMenu === 'home',
                            }"
                        >
                            Home
                        </Link>
                        <Link
                            href="/list-rental"
                            class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200"
                            :class="{
                                'text-red-600 border-b-2 border-red-600':
                                    activeMenu === 'daftar-rental',
                            }"
                        >
                            Daftar Rental
                        </Link>
                        <Link
                            href="/riwayat-perjalanan"
                            class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200"
                            :class="{
                                'text-red-600 border-b-2 border-red-600':
                                    activeMenu === 'riwayat-perjalanan',
                            }"
                        >
                            Riwayat Perjalanan
                        </Link>
                        <Link
                            href="/artikel"
                            class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200"
                            :class="{
                                'text-red-600 border-b-2 border-red-600':
                                    activeMenu === 'artikel',
                            }"
                        >
                            Artikel
                        </Link>

                        <Link
                            href="/Contact"
                            class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200"
                            :class="{
                                'text-red-600 border-b-2 border-red-600':
                                    activeMenu === 'contact',
                            }"
                        >
                            Contact
                        </Link>
                    </div>
                </div>

                <!-- Call Us Button -->
                <div class="hidden md:block">
                    <a
                        :href="whatsappLink"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-full text-sm font-medium transition-colors duration-200 shadow-md hover:shadow-lg inline-flex items-center gap-2"
                    >
                        <svg
                            class="w-5 h-5"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"
                            />
                        </svg>
                        Call Us
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button
                        @click="toggleMobileMenu"
                        class="text-gray-700 hover:text-red-600 inline-flex items-center justify-center p-2 rounded-md transition-colors duration-200"
                    >
                        <svg
                            class="h-6 w-6"
                            stroke="currentColor"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                v-if="!mobileMenuOpen"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                            <path
                                v-else
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div v-if="mobileMenuOpen" class="md:hidden">
                <div
                    class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t border-gray-200"
                >
                    <Link
                        href="/"
                        class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium transition-colors duration-200"
                        :class="{
                            'text-red-600 bg-red-50': activeMenu === 'home',
                        }"
                        @click="mobileMenuOpen = false"
                    >
                        Home
                    </Link>
                    <Link
                        href="/list-rental"
                        class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium transition-colors duration-200"
                        :class="{
                            'text-red-600 bg-red-50':
                                activeMenu === 'daftar-rental',
                        }"
                        @click="mobileMenuOpen = false"
                    >
                        Daftar Rental
                    </Link>
                    <Link
                        href="/riwayat-perjalanan"
                        class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium transition-colors duration-200"
                        :class="{
                            'text-red-600 bg-red-50':
                                activeMenu === 'riwayat-perjalanan',
                        }"
                        @click="mobileMenuOpen = false"
                    >
                        Riwayat Perjalanan
                    </Link>
                    <Link
                        href="/artikel"
                        class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium transition-colors duration-200"
                        :class="{
                            'text-red-600 bg-red-50': activeMenu === 'artikel',
                        }"
                        @click="mobileMenuOpen = false"
                    >
                        Artikel
                    </Link>
                    <Link
                        href="/tentang-kami"
                        class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium transition-colors duration-200"
                        :class="{
                            'text-red-600 bg-red-50':
                                activeMenu === 'tentang-kami',
                        }"
                        @click="mobileMenuOpen = false"
                    >
                        Tentang Kami
                    </Link>
                    <Link
                        href="/contact"
                        class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium transition-colors duration-200"
                        :class="{
                            'text-red-600 bg-red-50': activeMenu === 'contact',
                        }"
                        @click="mobileMenuOpen = false"
                    >
                        Contact
                    </Link>
                    <a
                        :href="whatsappLink"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="w-full text-center bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md text-base font-medium transition-colors duration-200 mt-4 inline-flex items-center justify-center gap-2"
                        @click="mobileMenuOpen = false"
                    >
                        <svg
                            class="w-5 h-5"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"
                            />
                        </svg>
                        Call Us
                    </a>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

export default {
    name: "SantanaNavbar",
    components: {
        Link,
    },
    setup() {
        const page = usePage();

        // Computed property untuk menentukan active menu berdasarkan URL
        const activeMenu = computed(() => {
            const url = page.url;
            if (url === "/" || url === "/home") return "home";
            if (url.includes("/list-rental")) return "daftar-rental";
            if (url.includes("/riwayat-perjalanan"))
                return "riwayat-perjalanan";
            if (url.includes("/artikel")) return "artikel";
            if (url.includes("/Contact") || url.includes("/contact"))
                return "contact";
            return "home";
        });

        return { activeMenu };
    },
    data() {
        return {
            mobileMenuOpen: false,
            showHeader: true,
            lastScrollPosition: 0,
            scrollThreshold: 100,
            // WhatsApp configuration
            whatsappNumber: "6281226300063", // Format: country code + number (tanpa +, -, atau spasi)
        };
    },
    computed: {
        whatsappLink() {
            return `https://wa.me/${this.whatsappNumber}`;
        },
    },
    methods: {
        toggleMobileMenu() {
            this.mobileMenuOpen = !this.mobileMenuOpen;
        },
        handleScroll() {
            const currentScrollPosition =
                window.pageYOffset || document.documentElement.scrollTop;

            // Jangan hide header jika di posisi paling atas
            if (currentScrollPosition < 0) {
                return;
            }

            // Jika di posisi paling atas, selalu tampilkan header
            if (currentScrollPosition < 10) {
                this.showHeader = true;
                this.lastScrollPosition = currentScrollPosition;
                return;
            }

            // Hide header saat scroll ke bawah, show saat scroll ke atas
            if (
                Math.abs(currentScrollPosition - this.lastScrollPosition) <
                this.scrollThreshold
            ) {
                return;
            }

            this.showHeader = currentScrollPosition < this.lastScrollPosition;
            this.lastScrollPosition = currentScrollPosition;
        },
    },
    mounted() {
        // Add scroll event listener
        window.addEventListener("scroll", this.handleScroll);
    },
    beforeUnmount() {
        // Remove scroll event listener
        window.removeEventListener("scroll", this.handleScroll);
    },
};
</script>

<style scoped>
/* Smooth transition for header hide/show */
header {
    transition: transform 0.3s ease-in-out;
}
</style>

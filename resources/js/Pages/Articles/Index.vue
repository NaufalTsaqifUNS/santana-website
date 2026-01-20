<template>
    <MainLayout>
        <!-- Hero Section -->
        <section
            class="relative bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white py-12 sm:py-16 md:py-20 lg:py-24"
        >
            <div class="absolute inset-0 bg-black/20"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Badge -->
                <div class="mb-3 sm:mb-4">
                    <span
                        class="inline-flex items-center px-3 py-1 sm:px-4 sm:py-1.5 rounded-full text-xs font-semibold bg-red-500/20 text-red-400 border border-red-500/30"
                    >
                        📰 Artikel & Berita
                    </span>
                </div>

                <!-- Title -->
                <h1
                    class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold mb-3 sm:mb-4 leading-tight"
                >
                    Informasi & Tips Rental Mobil
                </h1>

                <!-- Subtitle -->
                <p
                    class="text-base sm:text-lg md:text-xl text-gray-300 max-w-2xl"
                >
                    Temukan artikel menarik, tips perjalanan, dan informasi
                    seputar rental mobil
                </p>
            </div>
        </section>

        <!-- Filter & Articles Section -->
        <section class="py-12 md:py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Filter Buttons -->
                <div
                    class="flex flex-wrap gap-3 mb-8 justify-center md:justify-start"
                >
                    <button
                        @click="filterType = 'all'"
                        :class="[
                            'px-6 py-2.5 rounded-full font-medium transition-all duration-300',
                            filterType === 'all'
                                ? 'bg-red-600 text-white shadow-lg scale-105'
                                : 'bg-white text-gray-700 hover:bg-gray-100 shadow',
                        ]"
                    >
                        Semua Artikel
                    </button>
                    <button
                        @click="filterType = 'umum'"
                        :class="[
                            'px-6 py-2.5 rounded-full font-medium transition-all duration-300',
                            filterType === 'umum'
                                ? 'bg-red-600 text-white shadow-lg scale-105'
                                : 'bg-white text-gray-700 hover:bg-gray-100 shadow',
                        ]"
                    >
                        Umum
                    </button>
                    <button
                        @click="filterType = 'traveling'"
                        :class="[
                            'px-6 py-2.5 rounded-full font-medium transition-all duration-300',
                            filterType === 'traveling'
                                ? 'bg-red-600 text-white shadow-lg scale-105'
                                : 'bg-white text-gray-700 hover:bg-gray-100 shadow',
                        ]"
                    >
                        Traveling
                    </button>
                    <button
                        @click="filterType = 'rental'"
                        :class="[
                            'px-6 py-2.5 rounded-full font-medium transition-all duration-300',
                            filterType === 'rental'
                                ? 'bg-red-600 text-white shadow-lg scale-105'
                                : 'bg-white text-gray-700 hover:bg-gray-100 shadow',
                        ]"
                    >
                        Rental
                    </button>
                </div>
                <!-- Articles Grid -->
                <div
                    v-if="filteredArticles.length > 0"
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8 mb-8 sm:mb-10 md:mb-12"
                >
                    <Link
                        v-for="article in filteredArticles"
                        :key="article.id"
                        :href="`/artikel/${article.slug}`"
                        class="group"
                    >
                        <div
                            class="bg-white rounded-xl sm:rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 h-full flex flex-col"
                        >
                            <!-- Image -->
                            <div
                                class="relative h-48 sm:h-52 md:h-56 overflow-hidden"
                            >
                                <img
                                    :src="
                                        article.image_url ||
                                        '/images/placeholder-article.jpg'
                                    "
                                    :alt="article.title"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                />
                                <div
                                    class="absolute top-3 right-3 sm:top-4 sm:right-4"
                                >
                                    <span
                                        :class="[
                                            'px-2 py-0.5 sm:px-3 sm:py-1 rounded-full text-xs font-semibold backdrop-blur-sm',
                                            getBadgeClass(article.type),
                                        ]"
                                    >
                                        {{ formatTypeName(article.type) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-4 sm:p-5 md:p-6 flex-1 flex flex-col">
                                <!-- Date & Read Time -->
                                <div
                                    class="flex items-center gap-3 sm:gap-4 text-gray-500 text-xs sm:text-sm mb-2 sm:mb-3"
                                >
                                    <div class="flex items-center gap-1">
                                        <svg
                                            class="w-3.5 h-3.5 sm:w-4 sm:h-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                            />
                                        </svg>
                                        <span>{{
                                            formatDate(
                                                article.published_at ||
                                                    article.created_at,
                                            )
                                        }}</span>
                                    </div>
                                </div>

                                <!-- Title -->
                                <h3
                                    class="text-base sm:text-lg md:text-xl font-bold text-gray-900 mb-2 sm:mb-3 line-clamp-2 group-hover:text-red-600 transition-colors"
                                >
                                    {{ article.title }}
                                </h3>

                                <!-- Excerpt -->
                                <p
                                    class="text-gray-600 text-xs sm:text-sm line-clamp-3 flex-1 mb-3 sm:mb-4"
                                >
                                    {{ getPreview(article.content) }}
                                </p>

                                <!-- Read More -->
                                <div
                                    class="flex items-center gap-2 text-red-600 font-semibold text-xs sm:text-sm group-hover:gap-3 transition-all"
                                >
                                    <span>Baca Selengkapnya</span>
                                    <svg
                                        class="w-4 h-4 sm:w-5 sm:h-5 group-hover:translate-x-1 transition-transform"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </Link>
                </div>

                <!-- Empty State -->
                <div
                    v-else
                    class="text-center py-12 sm:py-16 bg-white rounded-xl sm:rounded-2xl shadow-lg"
                >
                    <svg
                        class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 mx-auto text-gray-300 mb-3 sm:mb-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                        />
                    </svg>
                    <h3
                        class="text-lg sm:text-xl font-semibold text-gray-900 mb-2"
                    >
                        Tidak ada artikel
                    </h3>
                    <p class="text-sm sm:text-base text-gray-600">
                        Belum ada artikel untuk kategori ini
                    </p>
                </div>

                <!-- Pagination -->
                <div
                    v-if="articles.links && articles.links.length > 3"
                    class="flex justify-center px-2"
                >
                    <nav
                        class="flex items-center gap-1.5 sm:gap-2 flex-wrap justify-center"
                    >
                        <component
                            v-for="(link, index) in articles.links"
                            :key="index"
                            :is="link.url ? Link : 'span'"
                            :href="link.url"
                            :class="[
                                'px-3 py-1.5 sm:px-4 sm:py-2 rounded-lg text-sm sm:text-base font-medium transition-all duration-300',
                                link.active
                                    ? 'bg-red-600 text-white shadow-lg'
                                    : link.url
                                      ? 'bg-white text-gray-700 hover:bg-gray-100'
                                      : 'bg-gray-100 text-gray-400 cursor-not-allowed',
                            ]"
                            v-html="link.label"
                        ></component>
                    </nav>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section
            class="py-16 bg-gradient-to-r from-gray-900 to-gray-800 text-white"
        >
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    Siap Memulai Perjalanan Anda?
                </h2>
                <p class="text-lg text- gray-300 mb-8 max-w-2xl mx-auto">
                    Hubungi kami sekarang untuk mendapatkan penawaran terbaik
                    dan konsultasi gratis
                </p>
                <div class="flex flex-wrap gap-4 justify-center">
                    <Link
                        href="/list-rental"
                        class="px-8 py-4 bg-red-600 hover:bg-red-700 text-white rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 inline-flex items-center gap-2"
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
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"
                            />
                        </svg>
                        Lihat Daftar Rental
                    </Link>
                    <a
                        href="https://wa.me/6281226300063"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="px-8 py-4 bg-white hover:bg-gray-100 text-gray-900 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 inline-flex items-center gap-2"
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
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </section>
    </MainLayout>
</template>

<script setup>
import { ref, computed } from "vue";
import { Link } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";

const props = defineProps({
    articles: {
        type: Object,
        required: true,
    },
});

// Filter state
const filterType = ref("all");

// Computed filtered articles
const filteredArticles = computed(() => {
    if (filterType.value === "all") {
        return props.articles.data || [];
    }
    return (props.articles.data || []).filter(
        (article) => article.type === filterType.value,
    );
});

// Format tanggal
const formatDate = (dateString) => {
    if (!dateString) return "";
    const options = { year: "numeric", month: "long", day: "numeric" };
    return new Date(dateString).toLocaleDateString("id-ID", options);
};

// Get preview text (strip HTML, preserve basic formatting)
const getPreview = (content) => {
    if (!content) return "";
    const tmp = document.createElement("DIV");
    tmp.innerHTML = content;
    const text = tmp.textContent || tmp.innerText || "";
    // Preserve line breaks and basic structure
    const cleaned = text
        .replace(/\r\n/g, "\n")
        .replace(/\n{3,}/g, "\n\n")
        .trim();
    return cleaned.length > 200 ? cleaned.substring(0, 200) + "..." : cleaned;
};

// Get badge class based on type
const getBadgeClass = (type) => {
    const badges = {
        umum: "bg-blue-500/90 text-white border border-blue-400/30",
        traveling: "bg-green-500/90 text-white border border-green-400/30",
        rental: "bg-red-500/90 text-white border border-red-400/30",
    };
    return badges[type] || badges.umum;
};

// Format type name for display (capitalize first letter)
const formatTypeName = (type) => {
    if (!type) return "Umum";
    return type.charAt(0).toUpperCase() + type.slice(1);
};
</script>

<style scoped>
/* Line clamp utility */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-4 {
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Smooth transitions */
* {
    transition-property: all;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}
</style>

<script setup>
import { ref } from "vue";
import MainLayout from "@/Layouts/MainLayout.vue";

const props = defineProps({
    riwayat: Object,
});

const formatDate = (dateString) => {
    return new Date(dateString).toLocaleDateString("id-ID", {
        day: "numeric",
        month: "long",
        year: "numeric",
    });
};

const getImageUrl = (path) => {
    return `/storage/${path}`;
};
</script>

<template>
    <MainLayout>
        <div class="min-h-screen bg-gray-50">
            <!-- Hero Section -->
            <section
                class="relative bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-16 sm:py-20 md:py-24 overflow-hidden"
            >
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div
                        class="absolute w-1 h-1 md:w-2 md:h-2 bg-white rounded-full animate-pulse"
                        style="top: 20%; left: 10%"
                    ></div>
                    <div
                        class="absolute w-1 h-1 md:w-2 md:h-2 bg-white rounded-full animate-pulse"
                        style="top: 40%; right: 10%; animation-delay: 0.5s"
                    ></div>
                    <div
                        class="absolute w-1 h-1 md:w-2 md:h-2 bg-white rounded-full animate-pulse"
                        style="bottom: 30%; left: 20%; animation-delay: 1s"
                    ></div>
                    <div
                        class="absolute w-1 h-1 md:w-2 md:h-2 bg-white rounded-full animate-pulse"
                        style="bottom: 20%; right: 30%; animation-delay: 1.5s"
                    ></div>
                </div>

                <div
                    class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center"
                >
                    <!-- Badge -->
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 bg-red-500/10 backdrop-blur-md border border-red-500/20 rounded-full mb-6"
                    >
                        <svg
                            class="w-4 h-4 text-red-500"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                            />
                        </svg>
                        <span class="text-white text-sm font-medium"
                            >Perjalanan Terbaik</span
                        >
                    </div>

                    <!-- Title -->
                    <h1
                        class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 sm:mb-6"
                    >
                        Riwayat
                        <span class="relative inline-block">
                            <span class="text-red-500">Perjalanan</span>
                            <svg
                                class="absolute -bottom-1 sm:-bottom-2 left-0 w-full"
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

                    <!-- Subtitle -->
                    <p
                        class="text-base sm:text-lg md:text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed"
                    >
                        Lihat dokumentasi perjalanan pelanggan kami yang telah
                        mempercayai Santana Cars untuk menemani momen berharga
                        mereka
                    </p>
                </div>
            </section>

            <!-- Riwayat Perjalanan Grid -->
            <section class="py-12 sm:py-16 md:py-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Empty State -->
                    <div
                        v-if="!riwayat.data || riwayat.data.length === 0"
                        class="text-center py-16"
                    >
                        <svg
                            class="mx-auto h-16 w-16 text-gray-400 mb-4"
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
                        <p class="text-gray-500 text-lg">
                            Belum ada riwayat perjalanan
                        </p>
                    </div>

                    <!-- Riwayat Grid -->
                    <div
                        v-else
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8"
                    >
                        <div
                            v-for="item in riwayat.data"
                            :key="item.id"
                            class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2"
                        >
                            <!-- Image Container -->
                            <div class="relative h-56 sm:h-64 overflow-hidden">
                                <img
                                    :src="getImageUrl(item.fotoPerjalanan)"
                                    :alt="item.namaLokasi"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                                />

                                <!-- Gradient Overlay -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"
                                ></div>

                                <!-- Date Badge -->
                                <div
                                    class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-full"
                                >
                                    <div class="flex items-center gap-1.5">
                                        <svg
                                            class="w-4 h-4 text-red-500"
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
                                        <span
                                            class="text-xs font-medium text-gray-700"
                                        >
                                            {{
                                                formatDate(
                                                    item.tanggal_perjalanan,
                                                )
                                            }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Location Badge -->
                                <div class="absolute bottom-4 left-4 right-4">
                                    <div
                                        class="flex items-start gap-2 text-white"
                                    >
                                        <svg
                                            class="w-5 h-5 flex-shrink-0 mt-0.5"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                        <h3
                                            class="text-lg sm:text-xl font-bold leading-tight"
                                        >
                                            {{ item.namaLokasi }}
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Content -->
                            <div class="p-5 sm:p-6">
                                <!-- Car Info -->
                                <div
                                    class="flex items-center gap-3 mb-4 pb-4 border-b border-gray-100"
                                >
                                    <div
                                        class="flex-shrink-0 w-10 h-10 bg-red-50 rounded-full flex items-center justify-center"
                                    >
                                        <svg
                                            class="w-5 h-5 text-red-500"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                        >
                                            <path
                                                d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"
                                            />
                                            <path
                                                d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"
                                            />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm text-gray-500 mb-0.5">
                                            Kendaraan
                                        </p>
                                        <p
                                            class="text-base font-semibold text-gray-900 truncate"
                                        >
                                            {{ item.namaMobil }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div
                                    v-if="item.deskripsi_perjalanan"
                                    class="mb-4"
                                >
                                    <p
                                        class="text-sm text-gray-600 leading-relaxed line-clamp-3"
                                    >
                                        {{ item.deskripsi_perjalanan }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div
                        v-if="
                            riwayat.data &&
                            riwayat.data.length > 0 &&
                            riwayat.links.length > 3
                        "
                        class="mt-12 flex justify-center"
                    >
                        <div class="flex items-center gap-2">
                            <a
                                v-for="link in riwayat.links"
                                :key="link.label"
                                :href="link.url || '#'"
                                :class="[
                                    'px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200',
                                    link.active
                                        ? 'bg-red-500 text-white shadow-lg shadow-red-500/30'
                                        : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-200',
                                    !link.url
                                        ? 'opacity-50 cursor-not-allowed'
                                        : 'hover:shadow-md',
                                ]"
                                v-html="link.label"
                            />
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section
                class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-16 sm:py-20"
            >
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2
                        class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-4"
                    >
                        Ingin Perjalanan Anda Selanjutnya?
                    </h2>
                    <p
                        class="text-base sm:text-lg text-gray-300 mb-8 max-w-2xl mx-auto"
                    >
                        Bergabunglah dengan ribuan pelanggan yang telah
                        mempercayai Santana Cars untuk perjalanan mereka
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a
                            href="/list-rental"
                            class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-full transition-all duration-300 shadow-lg shadow-red-500/30 hover:shadow-xl hover:shadow-red-500/50 hover:scale-105"
                        >
                            <svg
                                class="w-5 h-5"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"
                                />
                                <path
                                    d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"
                                />
                            </svg>
                            Lihat Daftar Rental
                        </a>
                        <a
                            href="#"
                            class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white hover:bg-gray-50 text-gray-900 font-semibold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105"
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
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                />
                            </svg>
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </MainLayout>
</template>

<style scoped>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

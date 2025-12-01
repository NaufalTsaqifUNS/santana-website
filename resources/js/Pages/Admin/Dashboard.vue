<template>
    <Head title="Dashboard Admin - Santana Rental Mobil Solo" />

    <AdminLayout>
        <div class="min-h-screen bg-gray-50">
            <!-- Header -->
            <div class="bg-white border-b border-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    <div
                        class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4"
                    >
                        <div>
                            <h1
                                class="text-2xl sm:text-3xl font-bold text-gray-900"
                            >
                                Dashboard
                            </h1>
                            <p class="text-sm text-gray-500 mt-1">
                                Selamat datang kembali, kelola sistem rental
                                Anda
                            </p>
                        </div>
                        <div
                            class="flex items-center gap-2 text-sm text-gray-600"
                        >
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
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                />
                            </svg>
                            <span class="font-medium">
                                {{
                                    new Date().toLocaleDateString("id-ID", {
                                        day: "numeric",
                                        month: "long",
                                        year: "numeric",
                                    })
                                }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Stats Grid -->
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-8"
                >
                    <!-- Total Mobil -->
                    <div
                        class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow"
                    >
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-red-50 rounded-lg">
                                <svg
                                    class="w-6 h-6 text-red-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                                    />
                                </svg>
                            </div>
                            <span
                                class="text-xs font-semibold text-gray-500 uppercase"
                                >Total</span
                            >
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-gray-900 mb-1">
                                {{ stats.totalMobil }}
                            </p>
                            <p class="text-sm text-gray-500">Total Mobil</p>
                        </div>
                    </div>

                    <!-- Mobil Tersedia -->
                    <div
                        class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow"
                    >
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-green-50 rounded-lg">
                                <svg
                                    class="w-6 h-6 text-green-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                    />
                                </svg>
                            </div>
                            <span
                                class="text-xs font-semibold text-green-600 uppercase"
                                >Available</span
                            >
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-gray-900 mb-1">
                                {{ stats.mobilTersedia }}
                            </p>
                            <p class="text-sm text-gray-500">Mobil Tersedia</p>
                        </div>
                    </div>

                    <!-- Total Perjalanan -->
                    <div
                        class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow sm:col-span-2 lg:col-span-1"
                    >
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-blue-50 rounded-lg">
                                <svg
                                    class="w-6 h-6 text-blue-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"
                                    />
                                </svg>
                            </div>
                            <span
                                class="text-xs font-semibold text-gray-500 uppercase"
                                >History</span
                            >
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-gray-900 mb-1">
                                {{ stats.totalPerjalanan }}
                            </p>
                            <p class="text-sm text-gray-500">
                                Total Perjalanan
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Content Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
                    <!-- Mobil Terbaru - 2 columns -->
                    <div class="lg:col-span-2">
                        <div
                            class="bg-white rounded-xl border border-gray-200 overflow-hidden"
                        >
                            <!-- Header -->
                            <div class="px-6 py-4 border-b border-gray-200">
                                <div class="flex items-center justify-between">
                                    <h2
                                        class="text-lg font-semibold text-gray-900"
                                    >
                                        Mobil Terbaru
                                    </h2>
                                    <span
                                        class="text-xs font-medium text-gray-500"
                                        >{{ mobilTerbaru.length }} mobil</span
                                    >
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <div
                                    v-if="mobilTerbaru.length > 0"
                                    class="space-y-4"
                                >
                                    <div
                                        v-for="mobil in mobilTerbaru"
                                        :key="mobil.id"
                                        class="flex items-center gap-4 p-4 rounded-lg border border-gray-200 hover:border-red-300 hover:bg-gray-50 transition-all"
                                    >
                                        <!-- Image -->
                                        <div
                                            class="flex-shrink-0 w-20 h-20 sm:w-24 sm:h-24 rounded-lg overflow-hidden bg-gray-100"
                                        >
                                            <img
                                                :src="`/storage/${mobil.fotoMobil}`"
                                                :alt="mobil.namaMobil"
                                                class="w-full h-full object-cover"
                                            />
                                        </div>

                                        <!-- Info -->
                                        <div class="flex-1 min-w-0">
                                            <div
                                                class="flex items-start justify-between gap-2 mb-2"
                                            >
                                                <h3
                                                    class="font-semibold text-gray-900 truncate"
                                                >
                                                    {{ mobil.namaMobil }}
                                                </h3>
                                                <span
                                                    class="flex-shrink-0 text-xs font-medium px-2 py-1 bg-red-50 text-red-600 rounded-full"
                                                >
                                                    {{ mobil.jenisMobil }}
                                                </span>
                                            </div>
                                            <p
                                                class="text-sm text-gray-500 mb-2"
                                            >
                                                {{ mobil.seat }} Seats •
                                                {{ mobil.jenisBahanBakar }}
                                            </p>
                                            <p
                                                class="text-lg font-bold text-red-600"
                                            >
                                                Rp
                                                {{
                                                    Number(
                                                        mobil.hargaMobil,
                                                    ).toLocaleString("id-ID")
                                                }}<span
                                                    class="text-sm text-gray-500 font-normal"
                                                    >/hari</span
                                                >
                                            </p>
                                        </div>

                                        <!-- Status Badge -->
                                        <div class="flex-shrink-0">
                                            <span
                                                v-if="mobil.status"
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-green-50 text-green-700 text-xs font-medium rounded-full"
                                            >
                                                <span
                                                    class="w-1.5 h-1.5 bg-green-500 rounded-full"
                                                ></span>
                                                Tersedia
                                            </span>
                                            <span
                                                v-else
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gray-100 text-gray-600 text-xs font-medium rounded-full"
                                            >
                                                <span
                                                    class="w-1.5 h-1.5 bg-gray-400 rounded-full"
                                                ></span>
                                                Tidak Tersedia
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Empty State -->
                                <div v-else class="text-center py-12">
                                    <div
                                        class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4"
                                    >
                                        <svg
                                            class="w-8 h-8 text-gray-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                                            />
                                        </svg>
                                    </div>
                                    <p
                                        class="text-sm text-gray-500 font-medium"
                                    >
                                        Belum ada data mobil
                                    </p>
                                    <p class="text-xs text-gray-400 mt-1">
                                        Tambahkan mobil baru untuk memulai
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Perjalanan Terbaru - 1 column -->
                    <div class="lg:col-span-1">
                        <div
                            class="bg-white rounded-xl border border-gray-200 overflow-hidden"
                        >
                            <!-- Header -->
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h2 class="text-lg font-semibold text-gray-900">
                                    Perjalanan Terbaru
                                </h2>
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <div
                                    v-if="perjalananTerbaru.length > 0"
                                    class="space-y-4 max-h-[600px] overflow-y-auto custom-scrollbar"
                                >
                                    <div
                                        v-for="perjalanan in perjalananTerbaru"
                                        :key="perjalanan.id"
                                        class="pb-4 border-b border-gray-100 last:border-b-0 last:pb-0"
                                    >
                                        <div class="flex items-start gap-3">
                                            <!-- Icon -->
                                            <div
                                                class="flex-shrink-0 w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center"
                                            >
                                                <svg
                                                    class="w-5 h-5 text-red-600"
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

                                            <!-- Info -->
                                            <div class="flex-1 min-w-0">
                                                <h3
                                                    class="font-semibold text-gray-900 text-sm mb-1"
                                                >
                                                    {{ perjalanan.namaMobil }}
                                                </h3>
                                                <p
                                                    class="text-sm text-gray-600 mb-2 flex items-center gap-1"
                                                >
                                                    <svg
                                                        class="w-4 h-4 text-gray-400"
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
                                                    <span class="truncate">{{
                                                        perjalanan.namaLokasi
                                                    }}</span>
                                                </p>
                                                <p
                                                    class="text-xs text-gray-500 line-clamp-2 mb-2"
                                                >
                                                    {{
                                                        perjalanan.deskripsi_perjalanan
                                                    }}
                                                </p>
                                                <p
                                                    class="text-xs text-gray-400"
                                                >
                                                    {{
                                                        formatDate(
                                                            perjalanan.tanggal_perjalanan,
                                                        )
                                                    }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Empty State -->
                                <div v-else class="text-center py-12">
                                    <div
                                        class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4"
                                    >
                                        <svg
                                            class="w-8 h-8 text-gray-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"
                                            />
                                        </svg>
                                    </div>
                                    <p
                                        class="text-sm text-gray-500 font-medium"
                                    >
                                        Belum ada data perjalanan
                                    </p>
                                    <p class="text-xs text-gray-400 mt-1">
                                        Riwayat perjalanan akan muncul di sini
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div
                    class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"
                >
                    <Link
                        :href="route('daftar-rental.index')"
                        class="flex items-center gap-4 p-4 bg-white rounded-xl border border-gray-200 hover:border-red-300 hover:shadow-md transition-all group"
                    >
                        <div
                            class="p-3 bg-red-50 rounded-lg group-hover:bg-red-100 transition-colors"
                        >
                            <svg
                                class="w-6 h-6 text-red-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                                />
                            </svg>
                        </div>
                        <div>
                            <p
                                class="font-semibold text-gray-900 group-hover:text-red-600 transition-colors"
                            >
                                Kelola Mobil
                            </p>
                            <p class="text-sm text-gray-500">
                                Tambah & edit mobil
                            </p>
                        </div>
                    </Link>

                    <Link
                        :href="route('riwayat-perjalanan.index')"
                        class="flex items-center gap-4 p-4 bg-white rounded-xl border border-gray-200 hover:border-red-300 hover:shadow-md transition-all group"
                    >
                        <div
                            class="p-3 bg-blue-50 rounded-lg group-hover:bg-blue-100 transition-colors"
                        >
                            <svg
                                class="w-6 h-6 text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"
                                />
                            </svg>
                        </div>
                        <div>
                            <p
                                class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors"
                            >
                                Kelola Perjalanan
                            </p>
                            <p class="text-sm text-gray-500">
                                Tambah & edit riwayat
                            </p>
                        </div>
                    </Link>

                    <Link
                        :href="route('home')"
                        class="flex items-center gap-4 p-4 bg-white rounded-xl border border-gray-200 hover:border-red-300 hover:shadow-md transition-all group sm:col-span-2 lg:col-span-1"
                    >
                        <div
                            class="p-3 bg-green-50 rounded-lg group-hover:bg-green-100 transition-colors"
                        >
                            <svg
                                class="w-6 h-6 text-green-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                />
                            </svg>
                        </div>
                        <div>
                            <p
                                class="font-semibold text-gray-900 group-hover:text-green-600 transition-colors"
                            >
                                Lihat Website
                            </p>
                            <p class="text-sm text-gray-500">Tampilan public</p>
                        </div>
                    </Link>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    stats: Object,
    mobilTerbaru: Array,
    perjalananTerbaru: Array,
});

const formatDate = (dateString) => {
    return new Date(dateString).toLocaleDateString("id-ID", {
        day: "numeric",
        month: "short",
        year: "numeric",
    });
};
</script>

<style scoped>
.custom-scrollbar::-webkit-scrollbar {
    width: 6px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #d1d5db;
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #9ca3af;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

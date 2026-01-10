<template>
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
                                Riwayat Perjalanan
                            </h1>
                            <p class="text-sm text-gray-500 mt-1">
                                Kelola dokumentasi perjalanan rental Anda
                            </p>
                        </div>
                        <Link
                            :href="route('riwayat-perjalanan.create')"
                            class="inline-flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors"
                        >
                            <svg
                                class="w-4 h-4 mr-2"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 4v16m8-8H4"
                                ></path>
                            </svg>
                            Tambah Perjalanan
                        </Link>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Success Message -->
                <transition
                    enter-active-class="transition ease-out duration-300"
                    enter-from-class="opacity-0 transform translate-y-2"
                    enter-to-class="opacity-100 transform translate-y-0"
                    leave-active-class="transition ease-in duration-200"
                    leave-from-class="opacity-100"
                    leave-to-class="opacity-0"
                >
                    <div
                        v-if="flash.success"
                        class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4 flex items-center"
                    >
                        <svg
                            class="w-5 h-5 text-green-600 mr-3 flex-shrink-0"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <p class="text-sm text-green-800 font-medium">
                            {{ flash.success }}
                        </p>
                    </div>
                </transition>

                <!-- Stats Grid -->
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8"
                >
                    <!-- Total Perjalanan -->
                    <div
                        class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow"
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
                                    ></path>
                                </svg>
                            </div>
                            <span
                                class="text-xs font-semibold text-gray-500 uppercase"
                                >Total</span
                            >
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-gray-900 mb-1">
                                {{ riwayat.total }}
                            </p>
                            <p class="text-sm text-gray-500">
                                Total Perjalanan
                            </p>
                        </div>
                    </div>

                    <!-- Halaman -->
                    <div
                        class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow"
                    >
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-purple-50 rounded-lg">
                                <svg
                                    class="w-6 h-6 text-purple-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                                    ></path>
                                </svg>
                            </div>
                            <span
                                class="text-xs font-semibold text-gray-500 uppercase"
                                >Page</span
                            >
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-gray-900 mb-1">
                                {{ riwayat.current_page }}
                            </p>
                            <p class="text-sm text-gray-500">Halaman</p>
                        </div>
                    </div>

                    <!-- Data Per Halaman -->
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
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                    ></path>
                                </svg>
                            </div>
                            <span
                                class="text-xs font-semibold text-green-600 uppercase"
                                >Per Page</span
                            >
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-gray-900 mb-1">
                                {{ riwayat.per_page }}
                            </p>
                            <p class="text-sm text-gray-500">
                                Data Per Halaman
                            </p>
                        </div>
                    </div>

                    <!-- Total Halaman -->
                    <div
                        class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-md transition-shadow"
                    >
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-orange-50 rounded-lg">
                                <svg
                                    class="w-6 h-6 text-orange-600"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                                    ></path>
                                </svg>
                            </div>
                            <span
                                class="text-xs font-semibold text-gray-500 uppercase"
                                >Pages</span
                            >
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-gray-900 mb-1">
                                {{ riwayat.last_page }}
                            </p>
                            <p class="text-sm text-gray-500">Total Halaman</p>
                        </div>
                    </div>
                </div>

                <!-- Table Card -->
                <div
                    class="bg-white rounded-xl border border-gray-200 overflow-hidden"
                >
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                    >
                                        Perjalanan
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                    >
                                        Mobil
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                    >
                                        Lokasi
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                    >
                                        Tanggal
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                    >
                                        Deskripsi
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                    >
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr
                                    v-for="perjalanan in riwayat.data"
                                    :key="perjalanan.id"
                                    class="hover:bg-gray-50 transition-colors"
                                >
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <img
                                                :src="`/storage/${perjalanan.fotoPerjalanan}`"
                                                :alt="perjalanan.namaLokasi"
                                                class="h-12 w-12 rounded-lg object-cover mr-3"
                                            />
                                            <div>
                                                <div
                                                    class="text-sm font-semibold text-gray-900"
                                                >
                                                    {{ perjalanan.namaLokasi }}
                                                </div>
                                                <div
                                                    class="text-xs text-gray-500"
                                                >
                                                    ID: {{ perjalanan.id }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="flex items-center text-sm text-gray-900"
                                        >
                                            <svg
                                                class="w-4 h-4 text-red-500 mr-2"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
                                                ></path>
                                            </svg>
                                            <span class="font-medium">{{
                                                perjalanan.namaMobil
                                            }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="flex items-center text-sm text-gray-700"
                                        >
                                            <svg
                                                class="w-4 h-4 text-gray-400 mr-1.5"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                                ></path>
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                                ></path>
                                            </svg>
                                            <span>{{
                                                perjalanan.namaLokasi
                                            }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{
                                                formatDate(
                                                    perjalanan.tanggal_perjalanan,
                                                )
                                            }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div
                                            class="text-sm text-gray-700 max-w-xs truncate"
                                            :title="
                                                perjalanan.deskripsi_perjalanan
                                            "
                                        >
                                            {{
                                                perjalanan.deskripsi_perjalanan
                                            }}
                                        </div>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-center"
                                    >
                                        <div
                                            class="flex items-center justify-center space-x-2"
                                        >
                                            <Link
                                                :href="
                                                    route(
                                                        'riwayat-perjalanan.edit',
                                                        perjalanan.id,
                                                    )
                                                "
                                                class="inline-flex items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg transition-colors"
                                            >
                                                <svg
                                                    class="w-3.5 h-3.5 mr-1"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                                    ></path>
                                                </svg>
                                                Edit
                                            </Link>

                                            <button
                                                @click="
                                                    deletePerjalanan(perjalanan)
                                                "
                                                class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-medium rounded-lg transition-colors"
                                            >
                                                <svg
                                                    class="w-3.5 h-3.5 mr-1"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                    ></path>
                                                </svg>
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Empty State -->
                                <tr v-if="riwayat.data.length === 0">
                                    <td
                                        colspan="6"
                                        class="px-6 py-12 text-center"
                                    >
                                        <div
                                            class="flex flex-col items-center justify-center"
                                        >
                                            <svg
                                                class="w-16 h-16 text-gray-300 mb-4"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"
                                                ></path>
                                            </svg>
                                            <h3
                                                class="text-lg font-semibold text-gray-900 mb-2"
                                            >
                                                Belum Ada Data
                                            </h3>
                                            <p
                                                class="text-sm text-gray-500 mb-4"
                                            >
                                                Tidak ada riwayat perjalanan
                                                yang tersedia
                                            </p>
                                            <Link
                                                :href="
                                                    route(
                                                        'riwayat-perjalanan.create',
                                                    )
                                                "
                                                class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors"
                                            >
                                                <svg
                                                    class="w-4 h-4 mr-2"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 4v16m8-8H4"
                                                    ></path>
                                                </svg>
                                                Tambah Perjalanan Pertama
                                            </Link>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                        <div
                            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4"
                        >
                            <div class="text-sm text-gray-600">
                                Menampilkan
                                <span class="font-semibold text-gray-900">{{
                                    riwayat.from || 0
                                }}</span>
                                hingga
                                <span class="font-semibold text-gray-900">{{
                                    riwayat.to || 0
                                }}</span>
                                dari
                                <span class="font-semibold text-gray-900">{{
                                    riwayat.total
                                }}</span>
                                hasil
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <Link
                                    v-for="link in riwayat.links"
                                    :key="link.label"
                                    :href="link.url || '#'"
                                    :class="[
                                        'inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg transition-colors',
                                        link.active
                                            ? 'bg-red-600 text-white'
                                            : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-300',
                                        !link.url
                                            ? 'opacity-50 cursor-not-allowed'
                                            : '',
                                    ]"
                                    :disabled="!link.url"
                                    v-html="link.label"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, router, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    riwayat: Object,
});

const page = usePage();
const flash = computed(() => page.props.flash);

const formatDate = (dateString) => {
    return new Date(dateString).toLocaleDateString("id-ID", {
        day: "numeric",
        month: "long",
        year: "numeric",
    });
};

const deletePerjalanan = (perjalanan) => {
    if (
        confirm(
            `Apakah Anda yakin ingin menghapus riwayat perjalanan ${perjalanan.namaLokasi}?`,
        )
    ) {
        router.delete(route("riwayat-perjalanan.destroy", perjalanan.id));
    }
};
</script>

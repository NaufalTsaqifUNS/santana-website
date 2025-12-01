<template>
    <AdminLayout>
        <div
            class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-100 to-gray-50"
        >
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Header Section -->
                <div class="mb-8">
                    <div
                        class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4"
                    >
                        <div>
                            <h1
                                class="text-3xl md:text-4xl font-bold text-gray-900 mb-2"
                            >
                                Daftar Rental Mobil
                            </h1>
                            <p class="text-gray-600">
                                Kelola semua kendaraan rental Anda dengan mudah
                            </p>
                        </div>
                        <Link
                            :href="route('daftar-rental.create')"
                            class="group relative inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl hover:shadow-red-500/50 transform hover:scale-105 transition-all duration-300 overflow-hidden"
                        >
                            <span
                                class="absolute inset-0 bg-gradient-to-r from-red-600 to-red-700 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"
                            ></span>
                            <svg
                                class="w-5 h-5 mr-2 relative z-10"
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
                            <span class="relative z-10">Tambah Mobil</span>
                        </Link>
                    </div>
                </div>

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
                        class="mb-6 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 rounded-lg shadow-md p-4 flex items-center"
                    >
                        <svg
                            class="w-6 h-6 text-green-500 mr-3 flex-shrink-0"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <p class="text-green-800 font-medium">
                            {{ flash.success }}
                        </p>
                    </div>
                </transition>

                <!-- Stats Cards -->
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8"
                >
                    <div
                        class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100"
                    >
                        <div class="flex items-center justify-between">
                            <div>
                                <p
                                    class="text-gray-500 text-sm font-medium mb-1"
                                >
                                    Total Mobil
                                </p>
                                <p class="text-3xl font-bold text-gray-900">
                                    {{ mobil.total }}
                                </p>
                            </div>
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-lg"
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
                                    ></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100"
                    >
                        <div class="flex items-center justify-between">
                            <div>
                                <p
                                    class="text-gray-500 text-sm font-medium mb-1"
                                >
                                    Tersedia
                                </p>
                                <p class="text-3xl font-bold text-green-600">
                                    {{
                                        mobil.data.filter((m) => m.status)
                                            .length
                                    }}
                                </p>
                            </div>
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center shadow-lg"
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
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100"
                    >
                        <div class="flex items-center justify-between">
                            <div>
                                <p
                                    class="text-gray-500 text-sm font-medium mb-1"
                                >
                                    Tidak Tersedia
                                </p>
                                <p class="text-3xl font-bold text-red-600">
                                    {{
                                        mobil.data.filter((m) => !m.status)
                                            .length
                                    }}
                                </p>
                            </div>
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center shadow-lg"
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
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100"
                    >
                        <div class="flex items-center justify-between">
                            <div>
                                <p
                                    class="text-gray-500 text-sm font-medium mb-1"
                                >
                                    Halaman
                                </p>
                                <p class="text-3xl font-bold text-purple-600">
                                    {{ mobil.current_page }}
                                </p>
                            </div>
                            <div
                                class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg"
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
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                                    ></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Section -->
                <div
                    class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100"
                >
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead
                                class="bg-gradient-to-r from-gray-50 to-gray-100"
                            >
                                <tr>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider"
                                    >
                                        Gambar
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider"
                                    >
                                        Nama Mobil
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider"
                                    >
                                        Jenis
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider"
                                    >
                                        Harga
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider"
                                    >
                                        Seat
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider"
                                    >
                                        Bahan Bakar
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider"
                                    >
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider"
                                    >
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                <tr
                                    v-for="(item, index) in mobil.data"
                                    :key="item.id"
                                    class="hover:bg-gray-50 transition-colors duration-200"
                                >
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="relative group">
                                            <img
                                                :src="`/storage/${item.fotoMobil}`"
                                                :alt="item.namaMobil"
                                                class="h-16 w-16 object-cover rounded-lg shadow-md group-hover:shadow-xl transition-all duration-300 transform group-hover:scale-110"
                                            />
                                            <div
                                                class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 rounded-lg transition-all duration-300"
                                            ></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div
                                            class="text-sm font-semibold text-gray-900"
                                        >
                                            {{ item.namaMobil }}
                                        </div>
                                        <div
                                            class="text-sm text-gray-500 truncate max-w-xs"
                                        >
                                            {{ item.deskripsiMobil }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800 shadow-sm"
                                        >
                                            {{ item.jenisMobil }}
                                        </span>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900"
                                    >
                                        <span
                                            class="bg-gradient-to-r from-green-50 to-emerald-50 px-3 py-1 rounded-lg border border-green-200"
                                        >
                                            Rp
                                            {{
                                                Number(
                                                    item.hargaMobil,
                                                ).toLocaleString("id-ID")
                                            }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="flex items-center text-sm text-gray-900"
                                        >
                                            <svg
                                                class="w-4 h-4 text-gray-500 mr-1"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                                ></path>
                                            </svg>
                                            <span class="font-medium"
                                                >{{ item.seat }} seat</span
                                            >
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="flex items-center text-sm text-gray-900"
                                        >
                                            <svg
                                                class="w-4 h-4 text-gray-500 mr-1"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M13 10V3L4 14h7v7l9-11h-7z"
                                                ></path>
                                            </svg>
                                            <span class="font-medium">{{
                                                item.jenisBahanBakar
                                            }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            :class="[
                                                'px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full shadow-sm',
                                                item.status
                                                    ? 'bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border border-green-200'
                                                    : 'bg-gradient-to-r from-red-100 to-red-200 text-red-800 border border-red-200',
                                            ]"
                                        >
                                            <svg
                                                class="w-4 h-4 mr-1"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                            >
                                                <path
                                                    v-if="item.status"
                                                    fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd"
                                                />
                                                <path
                                                    v-else
                                                    fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                            {{
                                                item.status
                                                    ? "Tersedia"
                                                    : "Tidak Tersedia"
                                            }}
                                        </span>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium"
                                    >
                                        <div
                                            class="flex items-center space-x-2"
                                        >
                                            <Link
                                                :href="
                                                    route(
                                                        'daftar-rental.edit',
                                                        item.id,
                                                    )
                                                "
                                                class="group inline-flex items-center px-3 py-2 bg-gradient-to-r from-indigo-500 to-indigo-600 text-white rounded-lg hover:from-indigo-600 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg"
                                            >
                                                <svg
                                                    class="w-4 h-4 mr-1"
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
                                                @click="deleteMobil(item)"
                                                class="group inline-flex items-center px-3 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg"
                                            >
                                                <svg
                                                    class="w-4 h-4 mr-1"
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
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div
                        class="bg-gradient-to-r from-gray-50 to-gray-100 px-4 py-4 border-t border-gray-200 sm:px-6"
                    >
                        <div
                            class="flex flex-col sm:flex-row justify-between items-center gap-4"
                        >
                            <div class="text-sm text-gray-700 font-medium">
                                Menampilkan
                                <span class="font-bold text-gray-900">{{
                                    mobil.from
                                }}</span>
                                hingga
                                <span class="font-bold text-gray-900">{{
                                    mobil.to
                                }}</span>
                                dari
                                <span class="font-bold text-gray-900">{{
                                    mobil.total
                                }}</span>
                                hasil
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <Link
                                    v-for="link in mobil.links"
                                    :key="link.label"
                                    :href="link.url || '#'"
                                    :class="[
                                        'px-4 py-2 rounded-lg text-sm font-medium transition-all duration-300 transform hover:scale-105',
                                        link.active
                                            ? 'bg-gradient-to-r from-red-500 to-red-600 text-white shadow-lg shadow-red-500/50'
                                            : 'bg-white text-gray-700 hover:bg-gray-100 shadow-md border border-gray-200',
                                        !link.url
                                            ? 'opacity-50 cursor-not-allowed hover:scale-100'
                                            : 'hover:shadow-lg',
                                    ]"
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
    mobil: Object,
});

const page = usePage();
const flash = computed(() => page.props.flash);

const deleteMobil = (mobil) => {
    if (confirm(`Apakah Anda yakin ingin menghapus ${mobil.namaMobil}?`)) {
        router.delete(route("daftar-rental.destroy", mobil.id));
    }
};
</script>

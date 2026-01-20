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
                                Daftar Rental Mobil
                            </h1>
                            <p class="text-sm text-gray-500 mt-1">
                                Kelola semua kendaraan rental Anda
                            </p>
                        </div>
                        <Link
                            :href="route('daftar-rental.create')"
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
                            Tambah Mobil
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
                                        Mobil
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                    >
                                        Harga/12 Jam
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                    >
                                        Jenis
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                    >
                                        Kursi
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                    >
                                        Bahan Bakar
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                    >
                                        Status
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
                                    v-for="m in mobil.data"
                                    :key="m.id"
                                    class="hover:bg-gray-50 transition-colors"
                                >
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <img
                                                :src="`/storage/${m.fotoMobil}`"
                                                :alt="m.namaMobil"
                                                class="h-12 w-12 rounded-lg object-cover mr-3"
                                            />
                                            <div>
                                                <div
                                                    class="text-sm font-semibold text-gray-900"
                                                >
                                                    {{ m.namaMobil }}
                                                </div>
                                                <div
                                                    class="text-xs text-gray-500"
                                                >
                                                    ID: {{ m.id }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="text-sm font-semibold text-gray-900"
                                        >
                                            Rp
                                            {{
                                                Number(
                                                    m.hargaMobil,
                                                ).toLocaleString("id-ID")
                                            }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            per 12 jam
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200"
                                        >
                                            {{ m.jenisMobil }}
                                        </span>
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
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                                                ></path>
                                            </svg>
                                            <span>{{ m.seat }} kursi</span>
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
                                                    d="M13 10V3L4 14h7v7l9-11h-7z"
                                                ></path>
                                            </svg>
                                            <span>{{ m.jenisBahanBakar }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            :class="[
                                                'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold',
                                                m.status
                                                    ? 'bg-green-50 text-green-700 border border-green-200'
                                                    : 'bg-red-50 text-red-700 border border-red-200',
                                            ]"
                                        >
                                            <svg
                                                class="w-3 h-3 mr-1"
                                                :class="
                                                    m.status
                                                        ? 'text-green-500'
                                                        : 'text-red-500'
                                                "
                                                fill="currentColor"
                                                viewBox="0 0 8 8"
                                            >
                                                <circle cx="4" cy="4" r="3" />
                                            </svg>
                                            {{
                                                m.status
                                                    ? "Tersedia"
                                                    : "Tidak Tersedia"
                                            }}
                                        </span>
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
                                                        'daftar-rental.edit',
                                                        m.id,
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
                                                @click="deleteMobil(m)"
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
                                <tr v-if="mobil.data.length === 0">
                                    <td
                                        colspan="7"
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
                                                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"
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
                                                Tidak ada mobil yang tersedia
                                            </p>
                                            <Link
                                                :href="
                                                    route(
                                                        'daftar-rental.create',
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
                                                Tambah Mobil Pertama
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
                                    mobil.from || 0
                                }}</span>
                                hingga
                                <span class="font-semibold text-gray-900">{{
                                    mobil.to || 0
                                }}</span>
                                dari
                                <span class="font-semibold text-gray-900">{{
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
    mobil: Object,
});

const page = usePage();
const flash = computed(() => page.props.flash);

const deleteMobil = (mobil) => {
    if (
        confirm(
            `Apakah Anda yakin ingin menghapus ${mobil.namaMobil} dari daftar?`,
        )
    ) {
        router.delete(route("daftar-rental.destroy", mobil.id));
    }
};
</script>

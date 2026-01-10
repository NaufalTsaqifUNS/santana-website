<template>
    <AdminLayout>
        <div class="min-h-screen bg-gray-50">
            <!-- Header -->
            <div class="bg-white border-b border-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    <Link
                        :href="route('riwayat-perjalanan.index')"
                        class="inline-flex items-center text-sm text-gray-600 hover:text-gray-900 mb-4 transition-colors"
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
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"
                            ></path>
                        </svg>
                        Kembali ke Daftar
                    </Link>
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center"
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
                                    d="M12 4v16m8-8H4"
                                ></path>
                            </svg>
                        </div>
                        <div>
                            <h1
                                class="text-2xl sm:text-3xl font-bold text-gray-900"
                            >
                                Tambah Riwayat Perjalanan
                            </h1>
                            <p class="text-sm text-gray-500 mt-1">
                                Dokumentasikan perjalanan rental Anda
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Form Card -->
                <div
                    class="bg-white rounded-xl border border-gray-200 overflow-hidden"
                >
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">
                            Formulir Data Perjalanan
                        </h2>
                        <p class="text-sm text-gray-500 mt-1">
                            Isi semua informasi dengan lengkap
                        </p>
                    </div>

                    <form @submit.prevent="submit" class="p-6">
                        <div class="space-y-6">
                            <!-- Pilih Mobil -->
                            <div>
                                <label
                                    class="flex items-center text-sm font-semibold text-gray-700 mb-2"
                                >
                                    <svg
                                        class="w-4 h-4 mr-2 text-red-500"
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
                                    Pilih Mobil
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <select
                                    v-model="form.mobil_id"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    required
                                >
                                    <option value="">
                                        Pilih mobil yang digunakan
                                    </option>
                                    <option
                                        v-for="m in mobil"
                                        :key="m.id"
                                        :value="m.id"
                                    >
                                        {{ m.namaMobil }} - {{ m.jenisMobil }}
                                    </option>
                                </select>
                                <div
                                    v-if="errors.mobil_id"
                                    class="mt-2 flex items-center text-red-600 text-sm"
                                >
                                    <svg
                                        class="w-4 h-4 mr-1"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    {{ errors.mobil_id }}
                                </div>
                            </div>

                            <!-- Nama Lokasi -->
                            <div>
                                <label
                                    class="flex items-center text-sm font-semibold text-gray-700 mb-2"
                                >
                                    <svg
                                        class="w-4 h-4 mr-2 text-red-500"
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
                                    Nama Lokasi
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input
                                    v-model="form.namaLokasi"
                                    type="text"
                                    placeholder="Contoh: Candi Borobudur, Yogyakarta"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    required
                                />
                                <div
                                    v-if="errors.namaLokasi"
                                    class="mt-2 flex items-center text-red-600 text-sm"
                                >
                                    <svg
                                        class="w-4 h-4 mr-1"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    {{ errors.namaLokasi }}
                                </div>
                            </div>

                            <!-- Tanggal Perjalanan -->
                            <div>
                                <label
                                    class="flex items-center text-sm font-semibold text-gray-700 mb-2"
                                >
                                    <svg
                                        class="w-4 h-4 mr-2 text-red-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        ></path>
                                    </svg>
                                    Tanggal Perjalanan
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input
                                    v-model="form.tanggal_perjalanan"
                                    type="date"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    required
                                />
                                <div
                                    v-if="errors.tanggal_perjalanan"
                                    class="mt-2 flex items-center text-red-600 text-sm"
                                >
                                    <svg
                                        class="w-4 h-4 mr-1"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    {{ errors.tanggal_perjalanan }}
                                </div>
                            </div>

                            <!-- Foto Perjalanan -->
                            <div>
                                <label
                                    class="flex items-center text-sm font-semibold text-gray-700 mb-2"
                                >
                                    <svg
                                        class="w-4 h-4 mr-2 text-red-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        ></path>
                                    </svg>
                                    Foto Perjalanan
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <div
                                    class="relative border-2 border-dashed border-gray-300 rounded-lg p-6 hover:border-red-400 transition-colors bg-gray-50"
                                >
                                    <input
                                        type="file"
                                        @change="handleFileUpload"
                                        accept="image/*"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                        required
                                    />
                                    <!-- Preview Image -->
                                    <div
                                        v-if="imagePreview"
                                        class="text-center"
                                    >
                                        <div class="relative inline-block">
                                            <img
                                                :src="imagePreview"
                                                alt="Preview"
                                                class="max-h-48 rounded-lg shadow-md"
                                            />
                                            <button
                                                type="button"
                                                @click.stop="
                                                    imagePreview = null;
                                                    form.fotoPerjalanan = null;
                                                "
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 transition-colors z-20"
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
                                                        d="M6 18L18 6M6 6l12 12"
                                                    ></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <p class="mt-2 text-sm text-gray-600">
                                            Klik untuk mengubah gambar
                                        </p>
                                    </div>
                                    <!-- Upload Prompt -->
                                    <div v-else class="text-center">
                                        <svg
                                            class="mx-auto h-12 w-12 text-gray-400"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                            ></path>
                                        </svg>
                                        <p class="mt-2 text-sm text-gray-600">
                                            <span
                                                class="font-semibold text-red-500"
                                                >Klik untuk upload</span
                                            >
                                            atau drag and drop
                                        </p>
                                        <p class="text-xs text-gray-500 mt-1">
                                            PNG, JPG, WEBP hingga 10MB
                                        </p>
                                    </div>
                                </div>
                                <div
                                    v-if="errors.fotoPerjalanan"
                                    class="mt-2 flex items-center text-red-600 text-sm"
                                >
                                    <svg
                                        class="w-4 h-4 mr-1"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    {{ errors.fotoPerjalanan }}
                                </div>
                            </div>

                            <!-- Deskripsi Perjalanan -->
                            <div>
                                <label
                                    class="flex items-center text-sm font-semibold text-gray-700 mb-2"
                                >
                                    <svg
                                        class="w-4 h-4 mr-2 text-gray-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h7"
                                        ></path>
                                    </svg>
                                    Deskripsi Perjalanan
                                    <span class="text-gray-400 ml-1"
                                        >(Opsional)</span
                                    >
                                </label>
                                <textarea
                                    v-model="form.deskripsi_perjalanan"
                                    rows="4"
                                    placeholder="Ceritakan pengalaman perjalanan dengan mobil rental kami..."
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all resize-none"
                                ></textarea>
                                <div
                                    v-if="errors.deskripsi_perjalanan"
                                    class="mt-2 flex items-center text-red-600 text-sm"
                                >
                                    <svg
                                        class="w-4 h-4 mr-1"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                    {{ errors.deskripsi_perjalanan }}
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div
                            class="mt-8 pt-6 border-t border-gray-200 flex flex-col sm:flex-row gap-3 justify-end"
                        >
                            <Link
                                :href="route('riwayat-perjalanan.index')"
                                class="inline-flex items-center justify-center px-5 py-2.5 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 font-medium transition-colors"
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
                                        d="M6 18L18 6M6 6l12 12"
                                    ></path>
                                </svg>
                                Batal
                            </Link>
                            <button
                                type="submit"
                                :disabled="processing"
                                class="inline-flex items-center justify-center px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                <svg
                                    v-if="!processing"
                                    class="w-4 h-4 mr-2"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 13l4 4L19 7"
                                    ></path>
                                </svg>
                                <svg
                                    v-else
                                    class="animate-spin w-4 h-4 mr-2"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <circle
                                        class="opacity-25"
                                        cx="12"
                                        cy="12"
                                        r="10"
                                        stroke="currentColor"
                                        stroke-width="4"
                                    ></circle>
                                    <path
                                        class="opacity-75"
                                        fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                    ></path>
                                </svg>
                                <span v-if="processing">Menyimpan...</span>
                                <span v-else>Simpan Perjalanan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import { reactive, ref } from "vue";

const props = defineProps({
    mobil: Array,
    errors: Object,
});

const processing = ref(false);
const imagePreview = ref(null);

const form = reactive({
    mobil_id: "",
    namaLokasi: "",
    fotoPerjalanan: null,
    deskripsi_perjalanan: "",
    tanggal_perjalanan: "",
});

const handleFileUpload = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.fotoPerjalanan = file;
        // Buat preview URL dari file yang dipilih
        imagePreview.value = URL.createObjectURL(file);
    }
};

const submit = () => {
    processing.value = true;

    const formData = new FormData();
    Object.keys(form).forEach((key) => {
        if (form[key] !== null && form[key] !== "") {
            formData.append(key, form[key]);
        }
    });

    router.post(route("riwayat-perjalanan.store"), formData, {
        onSuccess: () => {
            processing.value = false;
        },
        onError: () => {
            processing.value = false;
        },
        preserveScroll: true,
    });
};
</script>

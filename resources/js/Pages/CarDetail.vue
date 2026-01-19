<script setup>
import { ref, computed } from "vue";
import { Link, Head } from "@inertiajs/vue3";
import MainLayout from "@/Layouts/MainLayout.vue";

// Set layout
defineOptions({
    layout: MainLayout,
});

// Props dari backend
const props = defineProps({
    car: {
        type: Object,
        required: true,
    },
});

// Reactive state
const selectedImage = ref(0);

// WhatsApp Configuration
const whatsappNumber = "6281391574929";

// Generate WhatsApp link with template message
const getWhatsAppLink = () => {
    const message = `Halo Santana Cars,

Saya tertarik untuk menyewa kendaraan berikut:

📋 *Detail Kendaraan:*
• Nama: ${props.car.name}
• Kategori: ${props.car.category}
• Kapasitas: ${props.car.seats} Seats
• Bahan Bakar: ${props.car.fuel}
• Harga: Rp ${Number(props.car.pricePerDay).toLocaleString("id-ID")}/hari

Mohon informasi lebih lanjut mengenai:
- Ketersediaan unit
- Syarat dan ketentuan rental
- Proses pemesanan

Terima kasih.`;

    const encodedMessage = encodeURIComponent(message);
    return `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
};

// Handle rent now button click
const handleRentNow = () => {
    window.open(getWhatsAppLink(), "_blank");
};

// Images array (bisa diperluas untuk multiple images)
const images = computed(() => {
    return props.car.images && props.car.images.length > 0
        ? props.car.images
        : [props.car.imageUrl];
});

// Select image
const selectImage = (index) => {
    selectedImage.value = index;
};

// Specifications list
const specifications = computed(() => [
    {
        icon: "M4 4h12l1 5H3l1-5zm-1 7h14v6H3v-6z",
        label: "Jenis",
        value: props.car.category,
    },
    {
        icon: "M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z",
        label: "Kapasitas",
        value: `${props.car.seats} Penumpang`,
    },
    {
        icon: "M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z",
        label: "Bahan Bakar",
        value: props.car.fuel,
    },
    {
        icon: "M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z",
        label: "Transmisi",
        value: props.car.transmission || "Automatic/Manual",
    },
]);
</script>

<template>
    <Head :title="`${car.name} - Santana Rental Mobil Solo`" />

    <div class="min-h-screen bg-gray-50 py-4 sm:py-6 md:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav
                class="flex mb-4 sm:mb-6 overflow-x-auto"
                aria-label="Breadcrumb"
            >
                <ol
                    class="inline-flex items-center space-x-1 md:space-x-3 flex-wrap"
                >
                    <li class="inline-flex items-center">
                        <Link
                            :href="route('home')"
                            class="inline-flex items-center text-xs sm:text-sm font-medium text-gray-700 hover:text-red-600"
                        >
                            <svg
                                class="w-3 h-3 sm:w-4 sm:h-4 mr-1 sm:mr-2"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
                                />
                            </svg>
                            Home
                        </Link>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg
                                class="w-4 h-4 sm:w-6 sm:h-6 text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <Link
                                :href="route('rentals.index')"
                                class="ml-1 text-xs sm:text-sm font-medium text-gray-700 hover:text-red-600 md:ml-2"
                            >
                                Daftar Rental
                            </Link>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg
                                class="w-4 h-4 sm:w-6 sm:h-6 text-gray-400"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <span
                                class="ml-1 text-xs sm:text-sm font-medium text-gray-500 md:ml-2 line-clamp-1"
                            >
                                {{ car.name }}
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Main Content -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div
                    class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8 p-4 sm:p-6 md:p-8"
                >
                    <!-- Left Column - Images -->
                    <div class="space-y-3 sm:space-y-4">
                        <!-- Main Image -->
                        <div
                            class="aspect-[4/3] rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center"
                        >
                            <img
                                :src="images[selectedImage]"
                                :alt="`Foto ${car.name}`"
                                class="w-full h-full object-contain"
                            />
                        </div>

                        <!-- Thumbnail Images -->
                        <div
                            v-if="images.length > 1"
                            class="grid grid-cols-3 sm:grid-cols-4 gap-2 sm:gap-3"
                        >
                            <button
                                v-for="(image, index) in images"
                                :key="index"
                                @click="selectImage(index)"
                                class="aspect-[4/3] rounded-lg overflow-hidden border-2 transition-all duration-200"
                                :class="
                                    selectedImage === index
                                        ? 'border-red-500 ring-2 ring-red-200'
                                        : 'border-gray-200 hover:border-gray-300'
                                "
                            >
                                <img
                                    :src="image"
                                    :alt="`Thumbnail ${index + 1}`"
                                    class="w-full h-full object-contain bg-white"
                                />
                            </button>
                        </div>
                    </div>

                    <!-- Right Column - Details -->
                    <div class="space-y-4 sm:space-y-6">
                        <!-- Header -->
                        <div>
                            <span
                                class="inline-block px-3 py-1 bg-red-100 text-red-600 text-xs sm:text-sm font-semibold rounded-full mb-2 sm:mb-3"
                            >
                                {{ car.category }}
                            </span>
                            <h1
                                class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-2 leading-tight"
                            >
                                {{ car.name }}
                            </h1>
                            <div class="flex items-end gap-2 flex-wrap">
                                <span
                                    class="text-2xl sm:text-3xl font-bold text-red-600"
                                >
                                    Rp
                                    {{
                                        Number(car.pricePerDay).toLocaleString(
                                            "id-ID",
                                        )
                                    }}
                                </span>
                                <span
                                    class="text-sm sm:text-base text-gray-500 font-medium mb-0.5 sm:mb-1"
                                >
                                    / Hari
                                </span>
                            </div>
                        </div>

                        <!-- Specifications -->
                        <div
                            class="border-t border-b border-gray-200 py-4 sm:py-6"
                        >
                            <h2
                                class="text-base sm:text-lg font-semibold text-gray-900 mb-3 sm:mb-4"
                            >
                                Spesifikasi
                            </h2>
                            <div
                                class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4"
                            >
                                <div
                                    v-for="spec in specifications"
                                    :key="spec.label"
                                    class="flex items-start space-x-3"
                                >
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
                                                :d="spec.icon"
                                            />
                                        </svg>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p
                                            class="text-xs sm:text-sm text-gray-500"
                                        >
                                            {{ spec.label }}
                                        </p>
                                        <p
                                            class="text-sm sm:text-base font-semibold text-gray-900 break-words"
                                        >
                                            {{ spec.value }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Driver Standards -->
                        <div class="border-t border-gray-200 pt-4 sm:pt-6">
                            <h2
                                class="text-base sm:text-lg font-semibold text-gray-900 mb-3 sm:mb-4"
                            >
                                Standar Driver Kami
                            </h2>
                            <div
                                class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4"
                            >
                                <!-- Driver Bersih -->
                                <div
                                    class="flex items-start space-x-3 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-4 border border-blue-200"
                                >
                                    <div
                                        class="flex-shrink-0 w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center"
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
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h3
                                            class="text-sm sm:text-base font-bold text-blue-900 mb-1"
                                        >
                                            Driver Bersih & Rapi
                                        </h3>
                                        <p
                                            class="text-xs sm:text-sm text-blue-700 leading-relaxed"
                                        >
                                            Driver kami selalu berpenampilan
                                            bersih dan rapi untuk kenyamanan
                                            perjalanan Anda
                                        </p>
                                    </div>
                                </div>

                                <!-- Driver Wangi -->
                                <div
                                    class="flex items-start space-x-3 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-4 border border-purple-200"
                                >
                                    <div
                                        class="flex-shrink-0 w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center"
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
                                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h3
                                            class="text-sm sm:text-base font-bold text-purple-900 mb-1"
                                        >
                                            Wangi & Segar
                                        </h3>
                                        <p
                                            class="text-xs sm:text-sm text-purple-700 leading-relaxed"
                                        >
                                            Mobil dan driver dipastikan dalam
                                            kondisi wangi dan segar untuk
                                            pengalaman berkendara yang
                                            menyenangkan
                                        </p>
                                    </div>
                                </div>

                                <!-- Driver Profesional -->
                                <div
                                    class="flex items-start space-x-3 bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-4 border border-green-200"
                                >
                                    <div
                                        class="flex-shrink-0 w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center"
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
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                                            />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h3
                                            class="text-sm sm:text-base font-bold text-green-900 mb-1"
                                        >
                                            Sopan & Profesional
                                        </h3>
                                        <p
                                            class="text-xs sm:text-sm text-green-700 leading-relaxed"
                                        >
                                            Driver terlatih dengan attitude baik
                                            dan pelayanan profesional
                                        </p>
                                    </div>
                                </div>

                                <!-- Driver Berpengalaman -->
                                <div
                                    class="flex items-start space-x-3 bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-4 border border-orange-200"
                                >
                                    <div
                                        class="flex-shrink-0 w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center"
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
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                                            />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h3
                                            class="text-sm sm:text-base font-bold text-orange-900 mb-1"
                                        >
                                            Berpengalaman
                                        </h3>
                                        <p
                                            class="text-xs sm:text-sm text-orange-700 leading-relaxed"
                                        >
                                            Driver berpengalaman dan menguasai
                                            rute untuk perjalanan yang aman dan
                                            nyaman
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div
                            v-if="car.description"
                            class="border-t border-gray-200 pt-4 sm:pt-6"
                        >
                            <h2
                                class="text-base sm:text-lg font-semibold text-gray-900 mb-2 sm:mb-3"
                            >
                                Deskripsi
                            </h2>
                            <p
                                class="text-sm sm:text-base text-gray-600 leading-relaxed"
                            >
                                {{ car.description }}
                            </p>
                        </div>

                        <!-- Security Notice -->
                        <div
                            class="bg-red-50 border border-red-200 rounded-lg p-3 sm:p-4"
                        >
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg
                                        class="h-5 w-5 text-red-600"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3
                                        class="text-xs sm:text-sm font-medium text-red-800"
                                    >
                                        Keamanan & Verifikasi
                                    </h3>
                                    <p
                                        class="mt-1 text-xs sm:text-sm text-red-700"
                                    >
                                        Kendaraan dan pengemudi sudah di
                                        verifikasi serta mengikuti protokol
                                        kesehatan untuk keberhasilan unit dan
                                        sewa dengan baik.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Buttons -->
                        <div class="space-y-3 pt-2 sm:pt-4">
                            <button
                                @click="handleRentNow"
                                class="w-full bg-red-600 hover:bg-red-700 text-white py-3 sm:py-4 px-4 sm:px-6 rounded-lg text-base sm:text-lg font-semibold transition-colors duration-200 flex items-center justify-center gap-2 sm:gap-3 shadow-lg hover:shadow-xl"
                            >
                                <svg
                                    class="w-5 h-5 sm:w-6 sm:h-6"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"
                                    />
                                </svg>
                                <span class="truncate">Hubungi Kami</span>
                            </button>

                            <Link
                                :href="route('rentals.index')"
                                class="w-full border-2 border-gray-300 hover:border-gray-400 text-gray-700 hover:text-gray-900 py-2.5 sm:py-3 px-4 sm:px-6 rounded-lg text-sm sm:text-base font-semibold transition-colors duration-200 flex items-center justify-center gap-2"
                            >
                                <svg
                                    class="w-4 h-4 sm:w-5 sm:h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18"
                                    />
                                </svg>
                                Back
                            </Link>
                        </div>

                        <!-- Additional Info -->
                        <div
                            class="text-xs sm:text-sm text-gray-500 pt-3 sm:pt-4 border-t"
                        >
                            <p>
                                Ingin menggunakan unit ini? Chat dengan cara
                                menghubungi kami lewat WhatsApp untuk informasi
                                lebih lanjut tentang ketersediaan, syarat
                                rental, dan proses pemesanan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Custom animations */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.bg-white {
    animation: fadeIn 0.5s ease-out;
}

/* Text truncate for breadcrumb on mobile */
.line-clamp-1 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
    line-clamp: 1;
    max-width: 150px;
}

@media (min-width: 640px) {
    .line-clamp-1 {
        max-width: 200px;
    }
}

@media (min-width: 768px) {
    .line-clamp-1 {
        max-width: none;
    }
}

/* Smooth scrolling for breadcrumb on mobile */
nav {
    scrollbar-width: none;
    -ms-overflow-style: none;
}

nav::-webkit-scrollbar {
    display: none;
}
</style>

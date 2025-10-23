<!-- components/CarCard.vue -->
<script setup>
const props = defineProps({
    id: Number,
    imageUrl: String,
    name: String,
    pricePerDay: Number,
    category: String,
    seats: Number,
    fuel: String,
    description: String,
});

// WhatsApp Configuration
const whatsappNumber = "6281391574929"; // Nomor WhatsApp Santana Cars

// Generate WhatsApp link with template message
const getWhatsAppLink = () => {
    const message = `Halo Santana Cars,

Saya tertarik untuk menyewa kendaraan berikut:

📋 *Detail Kendaraan:*
• Nama: ${props.name}
• Kategori: ${props.category}
• Kapasitas: ${props.seats} Seats
• Bahan Bakar: ${props.fuel}
• Harga: Rp ${Number(props.pricePerDay).toLocaleString("id-ID")}/hari

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
</script>

<template>
    <div
        class="bg-white rounded-lg shadow-lg hover:shadow-red-200 transition-transform duration-300 hover:-translate-y-1 flex flex-col"
    >
        <!-- Car Image -->
        <div class="w-full aspect-[16/9] relative rounded-t-lg overflow-hidden">
            <img
                :src="imageUrl"
                :alt="`Foto ${name}`"
                class="absolute inset-0 w-full h-full object-cover"
            />
        </div>

        <!-- Card Body -->
        <div class="flex-1 flex flex-col px-5 py-4 space-y-2">
            <!-- Price -->
            <p class="text-red-500 font-semibold">
                Rp. {{ Number(pricePerDay).toLocaleString("id-ID") }}
                <span class="text-gray-500 font-normal">/ Day</span>
            </p>

            <!-- Car Name -->
            <h3 class="font-bold text-gray-800 text-lg">{{ name }}</h3>

            <!-- Specs -->
            <div
                class="flex flex-wrap text-gray-600 text-sm gap-x-2 gap-y-1 pt-1"
            >
                <span class="flex items-center gap-1">
                    <svg
                        class="w-4 h-4"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path d="M4 4h12l1 5H3l1-5zm-1 7h14v6H3v-6z" />
                    </svg>
                    {{ category }}
                </span>

                <span class="border-l border-gray-400 pl-2"
                    >{{ seats }} Seats</span
                >
                <span class="border-l border-gray-400 pl-2">{{ fuel }}</span>
            </div>
        </div>

        <!-- CTA Buttons -->
        <div
            class="flex justify-between px-5 py-4 border-t border-gray-200 space-x-3"
        >
            <button
                @click="handleRentNow"
                class="flex-1 bg-red-500 hover:bg-red-600 text-white py-2 rounded-md text-sm font-medium transition-colors duration-200 flex items-center justify-center gap-2"
            >
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"
                    />
                </svg>
                Rent Now
            </button>
            <button
                class="flex-1 border border-red-500 text-red-500 hover:bg-red-50 py-2 rounded-md text-sm font-medium transition-colors duration-200"
            >
                View More
            </button>
        </div>
    </div>
</template>

<style scoped>
/* Tambahan animasi halus pada hover */
</style>

<!-- components/CarCard.vue -->
<script setup>
defineProps({
  imageUrl: String,
  name: String,
  pricePerDay: Number,
  category: String,
  seats: Number,
  fuel: String,
})
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
        Rp. {{ pricePerDay.toLocaleString('id-ID') }}
        <span class="text-gray-500 font-normal">/ Day</span>
      </p>

      <!-- Car Name -->
      <h3 class="font-bold text-gray-800 text-lg">{{ name }}</h3>

      <!-- Specs -->
      <div class="flex flex-wrap text-gray-600 text-sm gap-x-2 gap-y-1 pt-1">
        <span class="flex items-center gap-1">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M4 4h12l1 5H3l1-5zm-1 7h14v6H3v-6z"
            />
          </svg>
          {{ category }}
        </span>

        <span class="border-l border-gray-400 pl-2">{{ seats }} Seats</span>
        <span class="border-l border-gray-400 pl-2">{{ fuel }}</span>
      </div>
    </div>

    <!-- CTA Buttons -->
    <div
      class="flex justify-between px-5 py-4 border-t border-gray-200 space-x-3"
    >
      <button
        class="flex-1 bg-red-500 hover:bg-red-600 text-white py-2 rounded-md text-sm font-medium"
      >
        Rent Now
      </button>
      <button
        class="flex-1 border border-red-500 text-red-500 hover:bg-red-50 py-2 rounded-md text-sm font-medium"
      >
        View More
      </button>
    </div>
  </div>
</template>

<style scoped>
/* Tambahan animasi halus pada hover */
</style>

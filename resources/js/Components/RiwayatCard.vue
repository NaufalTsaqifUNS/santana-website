<script setup>
defineProps({
  imageUrl: {
    type: String,
    required: true
  },
  title: {
    type: String,
    default: 'TES'
  },
  isFeatured: {
    type: Boolean,
    default: false
  },
  index: {
    type: Number,
    default: 0
  }
})
</script>

<template>
  <!-- Featured Large Card (First Item) -->
  <div v-if="isFeatured" 
       class="sm:col-span-2 lg:row-span-2 group relative overflow-hidden 
              rounded-3xl shadow-2xl hover:shadow-red-500/20 
              transition-all duration-500 hover:scale-[1.02]">
    <div class="relative aspect-[4/3] sm:aspect-[2/1] lg:aspect-[1/1]">
      <img 
        :src="imageUrl" 
        :alt="title"
        class="w-full h-full object-cover transition-transform duration-700 
               group-hover:scale-110"
      />
      <!-- Gradient Overlay -->
      <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
      
      <!-- Content -->
      <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8">
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-red-500 
                    rounded-full mb-4 text-white text-sm font-medium">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
          </svg>
          Featured Trip
        </div>
        <h3 class="text-2xl sm:text-3xl font-bold text-white mb-2">
          {{ title }}
        </h3>
        <p class="text-gray-200 text-sm sm:text-base">
          Perjalanan yang tak terlupakan bersama Santana Cars
        </p>
      </div>

      <!-- Hover Effect -->
      <div class="absolute inset-0 bg-red-500/0 group-hover:bg-red-500/10 
                 transition-colors duration-300 pointer-events-none"></div>
    </div>
  </div>

  <!-- Regular Gallery Items -->
  <div v-else
       class="group relative overflow-hidden rounded-2xl shadow-lg 
              hover:shadow-red-500/20 transition-all duration-500 
              hover:scale-105 cursor-pointer"
       :class="{
         'lg:row-span-1': index % 3 === 0,
         'lg:row-span-2': index % 3 === 1,
         'lg:row-span-1': index % 3 === 2
       }">
    <div class="relative aspect-square lg:aspect-auto lg:h-full">
      <img 
        :src="imageUrl" 
        :alt="title"
        class="w-full h-full object-cover transition-transform duration-700 
               group-hover:scale-110"
      />
      
      <!-- Gradient Overlay -->
      <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent 
                 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
      
      <!-- Content (Shows on Hover) -->
      <div class="absolute bottom-0 left-0 right-0 p-4 transform translate-y-full 
                 group-hover:translate-y-0 transition-transform duration-300">
        <h4 class="text-white font-semibold text-sm sm:text-base mb-1">
          {{ title }}
        </h4>
        <div class="flex items-center gap-2 text-gray-200 text-xs">
          <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
          </svg>
          <span>Santana Journey</span>
        </div>
      </div>

      <!-- Hover Border Effect -->
      <div class="absolute inset-0 border-2 border-red-500/0 group-hover:border-red-500/50 
                 rounded-2xl transition-colors duration-300 pointer-events-none"></div>
    </div>
  </div>
</template>
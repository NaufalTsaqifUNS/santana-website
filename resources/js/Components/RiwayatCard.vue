<script setup>
defineProps({
  imageUrl: {
    type: String,
    required: true
  },
  title: {
    type: String,
    default: 'TES'
  }
})
</script>

<template>
  <div class="group relative overflow-hidden rounded-2xl shadow-lg 
              hover:shadow-2xl transition-all duration-300 
              hover:-translate-y-2 cursor-pointer">
    <!-- Image Container -->
    <div class="relative aspect-[4/3] overflow-hidden">
      <img 
        :src="imageUrl" 
        :alt="title"
        class="w-full h-full object-cover transition-transform duration-500 
               group-hover:scale-110"
      />
      
      <!-- Overlay Gradient -->
      <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent 
                  opacity-60 group-hover:opacity-80 transition-opacity duration-300"></div>
      
      <!-- Title Badge -->
      <div class="absolute bottom-4 left-4">
        <span class="inline-block px-4 py-2 bg-white/90 backdrop-blur-sm 
                     rounded-lg text-gray-900 font-semibold text-sm
                     group-hover:bg-red-500 group-hover:text-white 
                     transition-all duration-300">
          {{ title }}
        </span>
      </div>
      
      <!-- Hover Icon -->
      <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2
                  opacity-0 group-hover:opacity-100 transition-all duration-300
                  transform scale-50 group-hover:scale-100">
        <div class="bg-white/90 backdrop-blur-sm rounded-full p-4">
          <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
          </svg>
        </div>
      </div>
    </div>
  </div>
</template>
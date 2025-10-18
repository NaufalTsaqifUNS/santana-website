<script setup>
defineProps({
  imageUrl: {
    type: String,
    required: true
  },
  title: {
    type: String,
    required: true
  },
  carName: {
    type: String,
    default: ''
  },
  date: {
    type: String,
    default: ''
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

const formatDate = (dateString) => {
  if (!dateString) return ''
  const date = new Date(dateString)
  return date.toLocaleDateString('id-ID', { 
    day: 'numeric', 
    month: 'short', 
    year: 'numeric' 
  })
}
</script>

<template>
  <!-- Featured Large Card (First Item) -->
  <div v-if="isFeatured" 
       class="sm:col-span-2 lg:row-span-2 group relative overflow-hidden 
              rounded-2xl shadow-lg hover:shadow-2xl 
              transition-all duration-500 hover:scale-[1.02]
              bg-white">
    <div class="relative aspect-[4/3] sm:aspect-[2/1] lg:aspect-[4/5]">
      <!-- Image -->
      <img 
        :src="imageUrl" 
        :alt="title"
        class="w-full h-full object-cover transition-transform duration-700 
               group-hover:scale-110"
      />
      
      <!-- Gradient Overlay -->
      <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
      
      <!-- Featured Badge -->
      <div class="absolute top-4 left-4 inline-flex items-center gap-2 
                  px-3 py-1.5 bg-red-500 rounded-full text-white text-xs font-semibold
                  shadow-lg backdrop-blur-sm">
        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
        </svg>
        Featured
      </div>
      
      <!-- Content -->
      <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8">
        <!-- Location -->
        <div class="flex items-center gap-2 text-red-400 text-sm font-medium mb-3">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
          </svg>
          <span>{{ title }}</span>
        </div>
        
        <!-- Car Name -->
        <h3 class="text-2xl sm:text-3xl font-bold text-white mb-3 leading-tight">
          {{ carName }}
        </h3>

        <!-- Date -->
        <div v-if="date" class="flex items-center gap-2 text-gray-300 text-sm">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
          <span>{{ formatDate(date) }}</span>
        </div>
      </div>

      <!-- Hover Border Effect -->
      <div class="absolute inset-0 border-2 border-red-500/0 group-hover:border-red-500/50 
                  rounded-2xl transition-colors duration-300 pointer-events-none"></div>
    </div>
  </div>

  <!-- Regular Gallery Items -->
  <div v-else
       class="group relative overflow-hidden rounded-2xl shadow-md 
              hover:shadow-xl transition-all duration-500 
              hover:scale-105 cursor-pointer bg-white"
       :class="{
         'lg:row-span-1': index % 3 === 0,
         'lg:row-span-2': index % 3 === 1,
         'lg:row-span-1': index % 3 === 2
       }">
    <div class="relative aspect-square lg:aspect-auto lg:h-full">
      <!-- Image -->
      <img 
        :src="imageUrl" 
        :alt="title"
        class="w-full h-full object-cover transition-transform duration-700 
               group-hover:scale-110"
      />
      
      <!-- Gradient Overlay -->
      <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent 
                  opacity-80 group-hover:opacity-100 transition-opacity duration-300"></div>
      
      <!-- Content -->
      <div class="absolute bottom-0 left-0 right-0 p-4 transform 
                  transition-transform duration-300">
        <!-- Location -->
        <div class="flex items-center gap-1.5 text-red-400 text-xs font-medium mb-2">
          <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
          </svg>
          <span class="line-clamp-1">{{ title }}</span>
        </div>
        
        <!-- Car Name -->
        <h4 class="text-white font-bold text-sm sm:text-base mb-2 line-clamp-2 
                   leading-tight">
          {{ carName }}
        </h4>

        <!-- Date -->
        <div v-if="date" class="flex items-center gap-1.5 text-gray-300 text-xs
                              opacity-0 group-hover:opacity-100 transition-opacity duration-300">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
          <span>{{ formatDate(date) }}</span>
        </div>
      </div>

      <!-- Hover Border Effect -->
      <div class="absolute inset-0 border-2 border-red-500/0 group-hover:border-red-500/60 
                  rounded-2xl transition-colors duration-300 pointer-events-none"></div>
    </div>
  </div>
</template>

<style scoped>
.line-clamp-1 {
  display: -webkit-box;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
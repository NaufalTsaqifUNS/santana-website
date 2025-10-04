<template>
  <div class="group relative bg-gradient-to-br from-white to-gray-50 
              rounded-2xl sm:rounded-3xl p-5 sm:p-6 md:p-8 
              shadow-xl hover:shadow-2xl
              transition-all duration-500 hover:-translate-y-2
              border border-gray-100 hover:border-red-200
              min-w-0 flex-shrink-0
              h-full flex flex-col
              overflow-hidden">
    
    <!-- Decorative Background Pattern -->
    <div class="absolute top-0 right-0 w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 
                opacity-5 group-hover:opacity-10 transition-opacity duration-500">
      <svg viewBox="0 0 100 100" class="text-red-500 fill-current">
        <circle cx="50" cy="50" r="40"/>
      </svg>
    </div>

    <!-- Hover Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-red-500/0 to-red-600/0 
                group-hover:from-red-500/5 group-hover:to-red-600/5 
                transition-all duration-500 rounded-2xl sm:rounded-3xl"></div>

    <!-- Content Container -->
    <div class="relative z-10 flex flex-col h-full">
      <!-- Quote Icon with Animation -->
      <div class="mb-3 sm:mb-4 md:mb-6">
        <div class="inline-flex items-center justify-center 
                    w-10 h-10 sm:w-12 sm:h-12 md:w-14 md:h-14 
                    bg-red-50 group-hover:bg-red-100 
                    rounded-xl sm:rounded-2xl 
                    transition-all duration-500 
                    group-hover:rotate-6 group-hover:scale-110
                    shadow-sm group-hover:shadow-md">
          <svg class="w-5 h-5 sm:w-6 sm:h-6 md:w-7 md:h-7 text-red-500 
                      group-hover:text-red-600 transition-colors" 
               fill="currentColor" viewBox="0 0 24 24">
            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
          </svg>
        </div>
      </div>

      <!-- Stars Rating with Animation -->
      <div class="flex items-center gap-1 mb-3 sm:mb-4 md:mb-5">
        <span v-for="(star, index) in rating" 
              :key="star" 
              class="text-yellow-400 transform transition-all duration-300 
                     hover:scale-125 hover:rotate-12"
              :style="{ transitionDelay: `${index * 50}ms` }">
          <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 md:w-5 md:h-5 fill-current drop-shadow-sm" 
               viewBox="0 0 20 20">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
          </svg>
        </span>
        
        <!-- Rating Text -->
        <span class="ml-1.5 sm:ml-2 text-xs sm:text-sm font-semibold text-gray-500 
                     group-hover:text-red-500 transition-colors">
          {{ rating }}.0
        </span>
      </div>

      <!-- Comment Section with Better Typography - FIXED HEIGHT -->
      <div class="flex-1 mb-4 sm:mb-5 md:mb-6 overflow-hidden">
        <div class="relative h-full flex items-start">
          <p class="text-gray-700 leading-relaxed 
                    text-xs sm:text-sm md:text-base
                    line-clamp-5 sm:line-clamp-6 md:line-clamp-7
                    group-hover:text-gray-900 transition-colors duration-300
                    font-medium">
            "{{ comment }}"
          </p>
        </div>
      </div>

      <!-- User Info Section - Enhanced - FIXED AT BOTTOM -->
      <div class="mt-auto pt-3 sm:pt-4 md:pt-6 border-t border-gray-100 
                  group-hover:border-red-100 transition-colors duration-300">
        <div class="flex items-center gap-2.5 sm:gap-3 md:gap-4">
          <!-- Avatar with Enhanced Styling -->
          <div class="relative flex-shrink-0 group/avatar">
            <!-- Animated Ring -->
            <div class="absolute inset-0 rounded-full 
                        bg-gradient-to-r from-red-400 to-red-600 
                        opacity-0 group-hover:opacity-100 
                        animate-pulse blur-sm
                        transition-opacity duration-500"></div>
            
            <!-- Avatar Image -->
            <div class="relative">
              <img 
                :src="avatar" 
                :alt="name"
                class="w-10 h-10 sm:w-12 sm:h-12 md:w-16 md:h-16 
                       rounded-full object-cover 
                       ring-3 sm:ring-4 ring-white group-hover:ring-red-50
                       shadow-md group-hover:shadow-xl
                       transition-all duration-300
                       group-hover:scale-105"
                loading="lazy"
              />
              
              <!-- Online Status Badge -->
              <div class="absolute bottom-0 right-0 
                          w-2.5 h-2.5 sm:w-3 sm:h-3 md:w-4 md:h-4 
                          bg-green-500 
                          border-2 border-white 
                          rounded-full
                          shadow-sm
                          animate-pulse"></div>
            </div>
          </div>
          
          <!-- User Details -->
          <div class="min-w-0 flex-1">
            <h4 class="font-bold text-gray-900 
                       text-xs sm:text-sm md:text-base lg:text-lg
                       truncate mb-0.5 sm:mb-1
                       group-hover:text-red-600 
                       transition-colors duration-300">
              {{ name }}
            </h4>
            
            <div class="flex items-center gap-1 sm:gap-1.5 text-gray-500">
              <!-- Location Icon -->
              <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3 md:w-4 md:h-4 flex-shrink-0 
                          text-red-400 group-hover:text-red-500
                          transition-colors" 
                   fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
              </svg>
              
              <p class="text-xs sm:text-sm truncate 
                        group-hover:text-gray-700 
                        transition-colors duration-300">
                {{ location }}
              </p>
            </div>
          </div>

          <!-- Verified Badge (Optional) -->
          <div class="hidden sm:flex flex-shrink-0 opacity-0 group-hover:opacity-100 
                      transition-opacity duration-300">
            <div class="bg-blue-50 p-1 sm:p-1.5 md:p-2 rounded-full">
              <svg class="w-3 h-3 sm:w-4 sm:h-4 md:w-5 md:h-5 text-blue-500" 
                   fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Corner Decorations -->
    <div class="absolute top-3 right-3 sm:top-4 sm:right-4 w-1.5 h-1.5 sm:w-2 sm:h-2 bg-red-400 rounded-full 
                opacity-0 group-hover:opacity-100 transition-opacity duration-500 
                animate-ping"></div>
    <div class="absolute bottom-3 left-3 sm:bottom-4 sm:left-4 w-1.5 h-1.5 sm:w-2 sm:h-2 bg-red-400 rounded-full 
                opacity-0 group-hover:opacity-100 transition-opacity duration-500 
                animate-ping" style="animation-delay: 0.5s;"></div>
  </div>
</template>

<script setup>
defineProps({
  name: {
    type: String,
    required: true
  },
  location: {
    type: String,
    required: true
  },
  avatar: {
    type: String,
    required: true
  },
  rating: {
    type: Number,
    required: true,
    validator: (value) => value >= 1 && value <= 5
  },
  comment: {
    type: String,
    required: true
  }
})
</script>

<style scoped>
/* Line clamp utilities with responsive breakpoints */
.line-clamp-5 {
  display: -webkit-box;
  -webkit-line-clamp: 5;
  line-clamp: 5;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.line-clamp-6 {
  display: -webkit-box;
  -webkit-line-clamp: 6;
  line-clamp: 6;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.line-clamp-7 {
  display: -webkit-box;
  -webkit-line-clamp: 7;
  line-clamp: 7;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* Responsive line clamp */
@media (min-width: 640px) {
  .sm\:line-clamp-6 {
    -webkit-line-clamp: 6;
    line-clamp: 6;
  }
}

@media (min-width: 768px) {
  .md\:line-clamp-7 {
    -webkit-line-clamp: 7;
    line-clamp: 7;
  }
}

/* Smooth animations */
@keyframes pulse {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: 0.5;
  }
}

@keyframes ping {
  75%, 100% {
    transform: scale(2);
    opacity: 0;
  }
}

.animate-pulse {
  animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

.animate-ping {
  animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
}

/* Ensure smooth transitions */
* {
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Mobile optimizations */
@media (max-width: 640px) {
  .group:hover {
    transform: translateY(-4px) !important;
  }
}

/* Tablet optimizations */
@media (min-width: 641px) and (max-width: 1024px) {
  .group:hover {
    transform: translateY(-6px) !important;
  }
}

/* Desktop optimizations */
@media (min-width: 1025px) {
  .group:hover {
    transform: translateY(-8px) !important;
  }
}
</style>
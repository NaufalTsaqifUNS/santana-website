<script setup>
import { ref } from 'vue'
import MainLayout from '@/Layouts/MainLayout.vue'

</script>

<template>
  <MainLayout>
    <!-- Hero Section - Full Screen -->
    <section class="relative h-screen w-full overflow-hidden">
      <!-- Background Image -->
      <div class="absolute inset-0">
        <img 
          src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?q=80&w=1283&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
          alt="Rent Your Dream Cars" 
          class="w-full h-full object-cover object-center"
        />
        <!-- Overlay for better text readability -->
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
      </div>
      
      <!-- Content -->
      <div class="relative z-10 h-full flex items-center">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
          <div class="max-w-3xl">
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-4 drop-shadow-lg">
              Rent Your 
              <span class="relative inline-block">
                <span class="text-red-500">Dream Cars</span>
                <svg class="absolute -bottom-1 sm:-bottom-2 left-0 w-full" height="12" viewBox="0 0 100 12" fill="none" preserveAspectRatio="none">
                  <path d="M2 10C30 2 70 2 98 10" stroke="#EF4444" stroke-width="3" stroke-linecap="round"/>
                </svg>
              </span>
            </h1>
            <p class="text-lg sm:text-xl md:text-2xl text-white mb-8 drop-shadow-md">
              Find the perfect vehicle for your next adventure
            </p>
          </div>
        </div>
      </div>

      <!-- Scroll Down Indicator -->
      <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
      </div>
    </section>

    <!-- Content Area -->
    <div id="cars" class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
      <!-- Your rental list content here -->
    </div>
  </MainLayout>
</template>

<style scoped>
/* Additional styles if needed */
</style>

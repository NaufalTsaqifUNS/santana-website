<script setup>
import { Link } from '@inertiajs/vue3'
import { ref, onMounted } from 'vue'

const isLoaded = ref(false)

onMounted(() => {
  setTimeout(() => {
    isLoaded.value = true
  }, 100)
})
</script>

<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black flex items-center justify-center px-4 overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 opacity-10">
      <div class="absolute top-0 left-0 w-96 h-96 bg-red-500 rounded-full filter blur-3xl animate-pulse"></div>
      <div class="absolute bottom-0 right-0 w-96 h-96 bg-red-600 rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
      <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-red-400 rounded-full filter blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <!-- Floating Geometric Shapes -->
    <div class="absolute inset-0 opacity-5">
      <div class="absolute top-20 right-20 w-8 h-8 border-2 border-red-400 rotate-45 animate-spin-slow"></div>
      <div class="absolute bottom-32 left-16 w-6 h-6 bg-red-500 rounded-full animate-bounce" style="animation-delay: 0.5s;"></div>
      <div class="absolute top-1/3 right-1/4 w-4 h-4 bg-red-600 rotate-45 animate-pulse"></div>
      <div class="absolute bottom-20 right-1/3 w-10 h-10 border border-red-300 rounded-full animate-bounce" style="animation-delay: 1.5s;"></div>
    </div>

    <!-- Content Container -->
    <div 
      class="relative z-10 max-w-4xl mx-auto text-center transition-all duration-1000"
      :class="isLoaded ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
    >
      <!-- 404 Number with Animation -->
      <div class="relative mb-8">
        <h1 class="text-[150px] sm:text-[200px] md:text-[250px] lg:text-[300px] font-black text-transparent bg-clip-text bg-gradient-to-r from-red-400 via-red-500 to-red-600 leading-none select-none animate-pulse">
          404
        </h1>
        
        <!-- Decorative Lines -->
        <div class="absolute top-1/2 left-0 w-full h-1 bg-gradient-to-r from-transparent via-red-500 to-transparent transform -translate-y-1/2 opacity-30"></div>
        
        <!-- Floating Icons -->
        <svg class="absolute top-10 left-10 w-12 h-12 text-red-400 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
        </svg>
        
        <svg class="absolute top-16 right-16 w-10 h-10 text-red-500 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
      </div>

      <!-- Error Badge -->
      <div class="inline-flex items-center gap-2 px-6 py-3 bg-red-500/20 backdrop-blur-sm border border-red-500/30 rounded-full mb-8 animate-fade-in">
        <svg class="w-6 h-6 text-red-400" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
        </svg>
        <span class="text-white text-lg font-semibold">Halaman Tidak Ditemukan</span>
      </div>

      <!-- Main Message -->
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-6 leading-tight animate-slide-up">
        Oops! Sepertinya Anda
        <br class="hidden sm:block"/>
        <span class="text-red-500">Tersesat</span>
      </h2>

      <!-- Description -->
      <p class="text-lg sm:text-xl text-gray-300 mb-12 max-w-2xl mx-auto leading-relaxed animate-fade-in" style="animation-delay: 0.2s;">
        Halaman yang Anda cari tidak ditemukan atau mungkin telah dipindahkan. 
        Jangan khawatir, mari kembali ke halaman utama!
      </p>

      <!-- Action Buttons -->
      <div class="flex flex-col sm:flex-row gap-4 justify-center items-center animate-fade-in" style="animation-delay: 0.4s;">
        <!-- Back to Home Button -->
        <Link
          href="/"
          class="group relative inline-flex items-center gap-3 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-8 py-4 rounded-full font-semibold text-lg shadow-2xl hover:shadow-red-500/50 transition-all duration-300 hover:scale-105 overflow-hidden"
        >
          <span class="absolute inset-0 bg-white/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
          <svg class="relative z-10 w-6 h-6 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
          </svg>
          <span class="relative z-10">Kembali ke Beranda</span>
        </Link>

        <!-- Browse Cars Button -->
        <Link
          href="/list-rental"
          class="group relative inline-flex items-center gap-3 bg-white/10 backdrop-blur-sm border-2 border-white/20 hover:border-red-500 text-white px-8 py-4 rounded-full font-semibold text-lg shadow-lg hover:shadow-red-500/30 transition-all duration-300 hover:scale-105"
        >
          <svg class="w-6 h-6 text-red-400 group-hover:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"/>
          </svg>
          <span>Lihat Daftar Mobil</span>
        </Link>
      </div>

      <!-- Help Text -->
      <div class="mt-16 pt-8 border-t border-white/10 animate-fade-in" style="animation-delay: 0.6s;">
        <p class="text-gray-400 text-sm mb-4">Butuh bantuan?</p>
        <div class="flex flex-wrap gap-6 justify-center items-center text-sm">
          <Link href="/" class="flex items-center gap-2 text-gray-300 hover:text-red-400 transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span>Beranda</span>
          </Link>
          
          <Link href="/list-rental" class="flex items-center gap-2 text-gray-300 hover:text-red-400 transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
            <span>Daftar Rental</span>
          </Link>
          
          <Link href="/riwayat-rental" class="flex items-center gap-2 text-gray-300 hover:text-red-400 transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>Riwayat Rental</span>
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
@keyframes slide-up {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fade-in {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

@keyframes spin-slow {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

.animate-slide-up {
  animation: slide-up 0.8s ease-out forwards;
}

.animate-fade-in {
  animation: fade-in 0.8s ease-out forwards;
}

.animate-spin-slow {
  animation: spin-slow 8s linear infinite;
}

/* Smooth transitions */
* {
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}
</style>
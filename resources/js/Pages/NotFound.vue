<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-900 to-gray-800 flex items-center justify-center px-4 py-12">
    <div class="max-w-2xl w-full text-center">
      <!-- 404 Number -->
      <div class="mb-8">
        <h1 class="text-8xl sm:text-9xl md:text-[180px] font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-red-600 leading-none">
          404
        </h1>
      </div>

      <!-- Icon -->
      <div class="mb-6 flex justify-center">
        <div class="w-20 h-20 sm:w-24 sm:h-24 bg-red-500/20 rounded-full flex items-center justify-center">
          <svg class="w-10 h-10 sm:w-12 sm:h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
      </div>

      <!-- Title -->
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white mb-4">
        Halaman Tidak Ditemukan
      </h2>

      <!-- Description -->
      <p class="text-base sm:text-lg text-gray-400 mb-10 px-4">
        Maaf, halaman yang Anda cari tidak tersedia atau telah dipindahkan.
      </p>

      <!-- Buttons -->
      <div class="flex flex-col sm:flex-row gap-4 justify-center items-center px-4">
        <Link
          href="/"
          class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white px-8 py-3.5 rounded-lg font-semibold transition-all duration-200 hover:scale-105 shadow-lg hover:shadow-red-500/50"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
          </svg>
          <span>Kembali ke Beranda</span>
        </Link>

        <Link
          href="/list-rental"
          class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 border border-white/20 text-white px-8 py-3.5 rounded-lg font-semibold transition-all duration-200"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
          </svg>
          <span>Lihat Daftar Mobil</span>
        </Link>
      </div>

      <!-- Quick Links -->
      <div class="mt-12 pt-8 border-t border-white/10">
        <p class="text-sm text-gray-500 mb-4">Link Cepat</p>
        <div class="flex flex-wrap gap-4 sm:gap-6 justify-center text-sm">
          <Link 
            href="/" 
            class="text-gray-400 hover:text-red-400 transition-colors"
          >
            Beranda
          </Link>
          <Link 
            href="/list-rental" 
            class="text-gray-400 hover:text-red-400 transition-colors"
          >
            Daftar Rental
          </Link>
          <Link 
            href="/riwayat-rental" 
            class="text-gray-400 hover:text-red-400 transition-colors"
          >
            Riwayat Rental
          </Link>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Optional: Add smooth transitions */
* {
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}
</style>
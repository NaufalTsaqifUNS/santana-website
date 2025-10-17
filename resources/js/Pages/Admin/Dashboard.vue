<template>
  <AdminLayout>
    <div class="container mx-auto px-4 py-8">
      <h1 class="text-3xl font-bold text-gray-800 mb-8">Dashboard Admin</h1>
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
          <div class="flex items-center">
            <div class="p-3 bg-blue-100 rounded-lg">
              <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
              </svg>
            </div>
            <div class="ml-4">
              <p class="text-sm font-medium text-gray-600">Total Mobil</p>
              <p class="text-2xl font-semibold text-gray-900">{{ stats.totalMobil }}</p>
            </div>
          </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
          <div class="flex items-center">
            <div class="p-3 bg-green-100 rounded-lg">
              <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
              </svg>
            </div>
            <div class="ml-4">
              <p class="text-sm font-medium text-gray-600">Total Perjalanan</p>
              <p class="text-2xl font-semibold text-gray-900">{{ stats.totalPerjalanan }}</p>
            </div>
          </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
          <div class="flex items-center">
            <div class="p-3 bg-purple-100 rounded-lg">
              <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <div class="ml-4">
              <p class="text-sm font-medium text-gray-600">Mobil Tersedia</p>
              <p class="text-2xl font-semibold text-gray-900">{{ stats.mobilTersedia }}</p>
            </div>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h2 class="text-xl font-semibold text-gray-800 mb-4">Mobil Terbaru</h2>
          <div class="space-y-4">
            <div v-for="mobil in mobilTerbaru" :key="mobil.id" class="flex items-center space-x-4 p-3 border rounded-lg">
              <img :src="`/storage/${mobil.fotoMobil}`" :alt="mobil.namaMobil" class="w-16 h-12 object-cover rounded">
              <div class="flex-1">
                <p class="font-medium text-gray-900">{{ mobil.namaMobil }}</p>
                <p class="text-sm text-gray-600">Rp {{ Number(mobil.hargaMobil).toLocaleString('id-ID') }}</p>
              </div>
              <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                {{ mobil.jenisMobil }}
              </span>
            </div>
          </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
          <h2 class="text-xl font-semibold text-gray-800 mb-4">Perjalanan Terbaru</h2>
          <div class="space-y-4">
            <div v-for="perjalanan in perjalananTerbaru" :key="perjalanan.id" class="p-3 border rounded-lg">
              <div class="flex justify-between items-start mb-2">
                <p class="font-medium text-gray-900">{{ perjalanan.namaMobil }}</p>
                <span class="text-sm text-gray-500">{{ formatDate(perjalanan.tanggal_perjalanan) }}</span>
              </div>
              <p class="text-sm text-gray-600">{{ perjalanan.namaLokasi }}</p>
              <p class="text-sm text-gray-500 mt-1">{{ perjalanan.deskripsi_perjalanan }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link } from '@inertiajs/vue3'

defineProps({
  stats: Object,
  mobilTerbaru: Array,
  perjalananTerbaru: Array
})

const formatDate = (dateString) => {
  return new Date(dateString).toLocaleDateString('id-ID', {
    day: 'numeric',
    month: 'long',
    year: 'numeric'
  })
}
</script>
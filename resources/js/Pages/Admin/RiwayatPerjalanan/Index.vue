<template>
  <AdminLayout>
    <div class="container mx-auto px-4 py-8">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Riwayat Perjalanan</h1>
        <Link 
          :href="route('riwayat-perjalanan.create')" 
          class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-200 flex items-center"
        >
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
          </svg>
          Tambah Perjalanan
        </Link>
      </div>

      <!-- Success Message -->
      <div v-if="flash.success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ flash.success }}
      </div>

      <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mobil</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="perjalanan in riwayat.data" :key="perjalanan.id">
                <td class="px-6 py-4 whitespace-nowrap">
                  <img 
                    :src="`/storage/${perjalanan.fotoPerjalanan}`" 
                    :alt="perjalanan.namaLokasi"
                    class="h-12 w-12 object-cover rounded"
                  >
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-medium text-gray-900">{{ perjalanan.namaMobil }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">{{ perjalanan.namaLokasi }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                  {{ formatDate(perjalanan.tanggal_perjalanan) }}
                </td>
                <td class="px-6 py-4">
                  <div class="text-sm text-gray-900 max-w-xs truncate">{{ perjalanan.deskripsi_perjalanan }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex space-x-2">
                    <Link 
                      :href="route('riwayat-perjalanan.edit', perjalanan.id)"
                      class="text-indigo-600 hover:text-indigo-900 transition duration-200"
                    >
                      Edit
                    </Link>
                    <button 
                      @click="deletePerjalanan(perjalanan)"
                      class="text-red-600 hover:text-red-900 transition duration-200"
                    >
                      Hapus
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        
        <!-- Pagination -->
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
          <div class="flex justify-between items-center">
            <div class="text-sm text-gray-700">
              Menampilkan {{ riwayat.from }} hingga {{ riwayat.to }} dari {{ riwayat.total }} hasil
            </div>
            <div class="flex space-x-2">
              <Link 
                v-for="link in riwayat.links"
                :key="link.label"
                :href="link.url || '#'"
                :class="[
                  'px-3 py-1 rounded-md text-sm font-medium',
                  link.active ? 'bg-blue-500 text-white' : 'text-gray-500 hover:text-gray-700',
                  !link.url ? 'opacity-50 cursor-not-allowed' : ''
                ]"
                v-html="link.label"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link, router, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
  riwayat: Object
})

const page = usePage()
const flash = computed(() => page.props.flash)

const formatDate = (dateString) => {
  return new Date(dateString).toLocaleDateString('id-ID', {
    day: 'numeric',
    month: 'long',
    year: 'numeric'
  })
}

const deletePerjalanan = (perjalanan) => {
  if (confirm(`Apakah Anda yakin ingin menghapus riwayat perjalanan ${perjalanan.namaLokasi}?`)) {
    router.delete(route('riwayat-perjalanan.destroy', perjalanan.id))
  }
}
</script>
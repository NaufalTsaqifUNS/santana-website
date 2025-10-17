<template>
  <AdminLayout>
    <div class="container mx-auto px-4 py-8">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Daftar Rental Mobil</h1>
        <Link 
          :href="route('daftar-rental.create')" 
          class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-200 flex items-center"
        >
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
          </svg>
          Tambah Mobil
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
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Mobil</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Seat</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bahan Bakar</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="mobil in mobil.data" :key="mobil.id">
                <td class="px-6 py-4 whitespace-nowrap">
                  <img 
                    :src="`/storage/${mobil.fotoMobil}`" 
                    :alt="mobil.namaMobil"
                    class="h-12 w-12 object-cover rounded"
                  >
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-medium text-gray-900">{{ mobil.namaMobil }}</div>
                  <div class="text-sm text-gray-500 truncate max-w-xs">{{ mobil.deskripsiMobil }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                    {{ mobil.jenisMobil }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                  Rp {{ Number(mobil.hargaMobil).toLocaleString('id-ID') }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                  {{ mobil.seat }} seat
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                  {{ mobil.jenisBahanBakar }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span :class="[
                    'px-2 inline-flex text-xs leading-5 font-semibold rounded-full',
                    mobil.status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'
                  ]">
                    {{ mobil.status ? 'Tersedia' : 'Tidak Tersedia' }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <div class="flex space-x-2">
                    <Link 
                      :href="route('daftar-rental.edit', mobil.id)"
                      class="text-indigo-600 hover:text-indigo-900 transition duration-200"
                    >
                      Edit
                    </Link>
                    <button 
                      @click="deleteMobil(mobil)"
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
              Menampilkan {{ mobil.from }} hingga {{ mobil.to }} dari {{ mobil.total }} hasil
            </div>
            <div class="flex space-x-2">
              <Link 
                v-for="link in mobil.links"
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
  mobil: Object
})

const page = usePage()
const flash = computed(() => page.props.flash)

const deleteMobil = (mobil) => {
  if (confirm(`Apakah Anda yakin ingin menghapus ${mobil.namaMobil}?`)) {
    router.delete(route('daftar-rental.destroy', mobil.id))
  }
}
</script>
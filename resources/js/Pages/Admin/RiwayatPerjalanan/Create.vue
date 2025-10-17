<template>
  <AdminLayout>
    <div class="container mx-auto px-4 py-8">
      <div class="max-w-4xl mx-auto">
        <div class="flex items-center mb-6">
          <Link 
            :href="route('riwayat-perjalanan.index')"
            class="text-blue-500 hover:text-blue-700 mr-4"
          >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
          </Link>
          <h1 class="text-3xl font-bold text-gray-800">Tambah Riwayat Perjalanan</h1>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
          <form @submit.prevent="submit">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Pilih Mobil -->
              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Mobil</label>
                <select
                  v-model="form.mobil_id"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required
                >
                  <option value="">Pilih Mobil</option>
                  <option v-for="mobil in mobil" :key="mobil.id" :value="mobil.id">
                    {{ mobil.namaMobil }} - {{ mobil.jenisMobil }}
                  </option>
                </select>
                <div v-if="errors.mobil_id" class="text-red-500 text-sm mt-1">{{ errors.mobil_id }}</div>
              </div>

              <!-- Nama Lokasi -->
              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lokasi</label>
                <input
                  v-model="form.namaLokasi"
                  type="text"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required
                >
                <div v-if="errors.namaLokasi" class="text-red-500 text-sm mt-1">{{ errors.namaLokasi }}</div>
              </div>

              <!-- Foto Perjalanan -->
              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Foto Perjalanan</label>
                <input
                  type="file"
                  @change="handleFileUpload"
                  accept="image/*"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required
                >
                <div v-if="errors.fotoPerjalanan" class="text-red-500 text-sm mt-1">{{ errors.fotoPerjalanan }}</div>
              </div>

              <!-- Tanggal Perjalanan -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Perjalanan</label>
                <input
                  v-model="form.tanggal_perjalanan"
                  type="date"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required
                >
                <div v-if="errors.tanggal_perjalanan" class="text-red-500 text-sm mt-1">{{ errors.tanggal_perjalanan }}</div>
              </div>

              <!-- Deskripsi Perjalanan -->
              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Perjalanan</label>
                <textarea
                  v-model="form.deskripsi_perjalanan"
                  rows="3"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="Deskripsikan perjalanan yang dilakukan..."
                ></textarea>
                <div v-if="errors.deskripsi_perjalanan" class="text-red-500 text-sm mt-1">{{ errors.deskripsi_perjalanan }}</div>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6 flex justify-end space-x-3">
              <Link
                :href="route('riwayat-perjalanan.index')"
                class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition duration-200"
              >
                Batal
              </Link>
              <button
                type="submit"
                :disabled="processing"
                class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 disabled:opacity-50"
              >
                <span v-if="processing">Menyimpan...</span>
                <span v-else>Simpan Perjalanan</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link, router } from '@inertiajs/vue3'
import { reactive, ref } from 'vue'

const props = defineProps({
  mobil: Array,
  errors: Object
})

const processing = ref(false)

const form = reactive({
  mobil_id: '',
  namaLokasi: '',
  fotoPerjalanan: null,
  deskripsi_perjalanan: '',
  tanggal_perjalanan: ''
})

const handleFileUpload = (event) => {
  form.fotoPerjalanan = event.target.files[0]
}

const submit = () => {
  processing.value = true

  const formData = new FormData()
  Object.keys(form).forEach(key => {
    if (form[key] !== null) {
      formData.append(key, form[key])
    }
  })

  router.post(route('riwayat-perjalanan.store'), formData, {
    onSuccess: () => {
      processing.value = false
    },
    onError: () => {
      processing.value = false
    },
    preserveScroll: true
  })
}
</script>
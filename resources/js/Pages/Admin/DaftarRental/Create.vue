<template>
  <AdminLayout>
    <div class="container mx-auto px-4 py-8">
      <div class="max-w-4xl mx-auto">
        <div class="flex items-center mb-6">
          <Link 
            :href="route('daftar-rental.index')"
            class="text-blue-500 hover:text-blue-700 mr-4"
          >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
          </Link>
          <h1 class="text-3xl font-bold text-gray-800">Tambah Mobil Baru</h1>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
          <form @submit.prevent="submit">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Nama Mobil -->
              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Mobil</label>
                <input
                  v-model="form.namaMobil"
                  type="text"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required
                >
                <div v-if="errors.namaMobil" class="text-red-500 text-sm mt-1">{{ errors.namaMobil }}</div>
              </div>

              <!-- Foto Mobil -->
              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Foto Mobil</label>
                <input
                  type="file"
                  @change="handleFileUpload"
                  accept="image/*"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required
                >
                <div v-if="errors.fotoMobil" class="text-red-500 text-sm mt-1">{{ errors.fotoMobil }}</div>
              </div>

              <!-- Deskripsi -->
              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Mobil</label>
                <textarea
                  v-model="form.deskripsiMobil"
                  rows="3"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required
                ></textarea>
                <div v-if="errors.deskripsiMobil" class="text-red-500 text-sm mt-1">{{ errors.deskripsiMobil }}</div>
              </div>

              <!-- Harga -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Harga Mobil (Rp)</label>
                <input
                  v-model="form.hargaMobil"
                  type="number"
                  min="0"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required
                >
                <div v-if="errors.hargaMobil" class="text-red-500 text-sm mt-1">{{ errors.hargaMobil }}</div>
              </div>

              <!-- Jenis Mobil -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Mobil</label>
                <select
                  v-model="form.jenisMobil"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required
                >
                  <option value="">Pilih Jenis Mobil</option>
                  <option value="MPV">MPV</option>
                  <option value="Luxury MPV">Luxury MPV</option>
                  <option value="SUV">SUV</option>
                  <option value="Van">Van</option>
                  <option value="Sedan">Sedan</option>
                  <option value="Minibus">Minibus</option>
                  <option value="Bus">Bus</option>
                </select>
                <div v-if="errors.jenisMobil" class="text-red-500 text-sm mt-1">{{ errors.jenisMobil }}</div>
              </div>

              <!-- Seat -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Seat</label>
                <input
                  v-model="form.seat"
                  type="number"
                  min="1"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required
                >
                <div v-if="errors.seat" class="text-red-500 text-sm mt-1">{{ errors.seat }}</div>
              </div>

              <!-- Bahan Bakar -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Bahan Bakar</label>
                <select
                  v-model="form.jenisBahanBakar"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required
                >
                  <option value="">Pilih Bahan Bakar</option>
                  <option value="Bensin">Bensin</option>
                  <option value="Diesel">Diesel</option>
                  <option value="Listrik">Listrik</option>
                  <option value="Hybrid">Hybrid</option>
                </select>
                <div v-if="errors.jenisBahanBakar" class="text-red-500 text-sm mt-1">{{ errors.jenisBahanBakar }}</div>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6 flex justify-end space-x-3">
              <Link
                :href="route('daftar-rental.index')"
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
                <span v-else>Simpan Mobil</span>
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

const processing = ref(false)
const errors = ref({})

const form = reactive({
  namaMobil: '',
  fotoMobil: null,
  deskripsiMobil: '',
  hargaMobil: '',
  jenisMobil: '',
  seat: '',
  jenisBahanBakar: ''
})

const handleFileUpload = (event) => {
  form.fotoMobil = event.target.files[0]
}

const submit = () => {
  processing.value = true
  errors.value = {}

  const formData = new FormData()
  Object.keys(form).forEach(key => {
    if (form[key] !== null) {
      formData.append(key, form[key])
    }
  })

  router.post(route('daftar-rental.store'), formData, {
    onSuccess: () => {
      processing.value = false
    },
    onError: (err) => {
      errors.value = err
      processing.value = false
    },
    preserveScroll: true
  })
}
</script>
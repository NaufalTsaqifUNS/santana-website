<template>
  <AdminLayout>
    <div class="container mx-auto px-4 py-8">
      <div class="max-w-4xl mx-auto">
        <div class="flex items-center mb-6">
          <Link 
            :href="route('daftar-rental.index')"
            class="text-blue-500 hover:text-blue-700 mr-4 flex items-center"
          >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span class="ml-2">Kembali</span>
          </Link>
          <h1 class="text-3xl font-bold text-gray-800">Edit Mobil: {{ mobil.namaMobil }}</h1>
        </div>

        <!-- Success Message -->
        <div v-if="flash.success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
          {{ flash.success }}
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
          <form @submit.prevent="submit" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Nama Mobil -->
              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Mobil *</label>
                <input
                  v-model="form.namaMobil"
                  type="text"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                >
                <div v-if="errors.namaMobil" class="text-red-500 text-sm mt-1">{{ errors.namaMobil }}</div>
              </div>

              <!-- Current Photo -->
              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Foto Saat Ini</label>
                <div class="flex items-center space-x-4">
                  <img 
                    :src="`/storage/${mobil.fotoMobil}`" 
                    :alt="mobil.namaMobil"
                    class="h-32 w-auto object-cover rounded-lg border shadow-sm"
                  >
                  <div class="text-sm text-gray-600">
                    <p>Foto saat ini</p>
                    <p class="text-xs text-gray-500">Ukuran: 400x300 px</p>
                  </div>
                </div>
              </div>

              <!-- New Photo -->
              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Ganti Foto Mobil</label>
                <input
                  type="file"
                  @change="handleFileUpload"
                  accept="image/*"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                >
                <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF. Maksimal 2MB</p>
                <div v-if="errors.fotoMobil" class="text-red-500 text-sm mt-1">{{ errors.fotoMobil }}</div>
              </div>

              <!-- Deskripsi -->
              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Mobil *</label>
                <textarea
                  v-model="form.deskripsiMobil"
                  rows="4"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                ></textarea>
                <div v-if="errors.deskripsiMobil" class="text-red-500 text-sm mt-1">{{ errors.deskripsiMobil }}</div>
              </div>

              <!-- Harga -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Harga Mobil (Rp) *</label>
                <input
                  v-model="form.hargaMobil"
                  type="number"
                  min="0"
                  step="1000"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                >
                <div v-if="errors.hargaMobil" class="text-red-500 text-sm mt-1">{{ errors.hargaMobil }}</div>
              </div>

              <!-- Jenis Mobil -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Mobil *</label>
                <select
                  v-model="form.jenisMobil"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                >
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
                <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Seat *</label>
                <input
                  v-model="form.seat"
                  type="number"
                  min="1"
                  max="50"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                >
                <div v-if="errors.seat" class="text-red-500 text-sm mt-1">{{ errors.seat }}</div>
              </div>

              <!-- Bahan Bakar -->
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Bahan Bakar *</label>
                <select
                  v-model="form.jenisBahanBakar"
                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  required
                >
                  <option value="Bensin">Bensin</option>
                  <option value="Solar">Solar</option>
                  <option value="Listrik">Listrik</option>
                  <option value="Hybrid">Hybrid</option>
                </select>
                <div v-if="errors.jenisBahanBakar" class="text-red-500 text-sm mt-1">{{ errors.jenisBahanBakar }}</div>
              </div>

              <!-- Status -->
              <div class="md:col-span-2">
                <label class="flex items-center">
                  <input
                    v-model="form.status"
                    type="checkbox"
                    class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                  >
                  <span class="ml-2 text-sm text-gray-700">Mobil Tersedia</span>
                </label>
                <div v-if="errors.status" class="text-red-500 text-sm mt-1">{{ errors.status }}</div>
              </div>
            </div>

            <!-- Error Messages -->
            <div v-if="Object.keys(errors).length > 0" class="bg-red-50 border border-red-200 rounded-md p-4">
              <h3 class="text-sm font-medium text-red-800">Terjadi kesalahan:</h3>
              <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                <li v-for="error in Object.values(errors)" :key="error">{{ error }}</li>
              </ul>
            </div>

            <!-- Submit Button -->
            <div class="mt-8 flex justify-end space-x-3 border-t pt-6">
              <Link
                :href="route('daftar-rental.index')"
                class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition duration-200 font-medium"
              >
                Batal
              </Link>
              <button
                type="submit"
                :disabled="processing"
                :class="[
                  'px-6 py-2 bg-blue-500 text-white rounded-md font-medium transition duration-200',
                  processing ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2'
                ]"
              >
                <span v-if="processing" class="flex items-center">
                  <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                  Menyimpan...
                </span>
                <span v-else>
                  Update Mobil
                </span>
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
import { Link, router, usePage } from '@inertiajs/vue3'
import { reactive, ref, computed } from 'vue'

const props = defineProps({
  mobil: Object,
  errors: Object
})

const processing = ref(false)
const page = usePage()
const flash = computed(() => page.props.flash)

// Inisialisasi form dengan data mobil
const form = reactive({
  namaMobil: props.mobil.namaMobil || '',
  fotoMobil: null,
  deskripsiMobil: props.mobil.deskripsiMobil || '',
  hargaMobil: props.mobil.hargaMobil || '',
  jenisMobil: props.mobil.jenisMobil || 'MPV',
  seat: props.mobil.seat || '',
  jenisBahanBakar: props.mobil.jenisBahanBakar || 'Bensin',
  status: props.mobil.status ?? true,
  _method: 'PUT' // Important for Laravel to recognize as PUT request
})

const handleFileUpload = (event) => {
  const file = event.target.files[0]
  if (file) {
    form.fotoMobil = file
  }
}

const submit = async () => {
  processing.value = true

  try {
    // Create FormData for file upload
    const formData = new FormData()
    
    // Append all form fields
    Object.keys(form).forEach(key => {
      if (form[key] !== null && form[key] !== undefined) {
        // Handle boolean values
        if (key === 'status') {
          formData.append(key, form[key] ? '1' : '0')
        } else {
          formData.append(key, form[key])
        }
      }
    })

    // Make the request
    await router.post(route('daftar-rental.update', props.mobil.id), formData, {
      forceFormData: true,
      preserveScroll: true,
      onSuccess: () => {
        processing.value = false
      },
      onError: (errors) => {
        processing.value = false
        console.error('Update error:', errors)
      }
    })
  } catch (error) {
    processing.value = false
    console.error('Submit error:', error)
  }
}
</script>
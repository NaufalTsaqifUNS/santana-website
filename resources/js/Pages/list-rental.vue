<script setup>
import { ref, computed, watch } from 'vue'
import { router } from '@inertiajs/vue3'
import MainLayout from '@/Layouts/MainLayout.vue'
import CarCard from '@/Components/CarCard.vue'

// Props dari backend
const props = defineProps({
  cars: {
    type: Array,
    required: true,
    default: () => []
  },
  filters: {
    type: Object,
    default: () => ({
      search: null,
      category: null
    })
  }
})

// Reactive data untuk rental list
const searchQuery = ref(props.filters.search || '')
const activeCategory = ref(props.filters.category || 'All')
const isDropdownOpen = ref(false)

// Computed categories dari data backend
const categories = computed(() => {
  const categoryCounts = props.cars.reduce((acc, car) => {
    acc[car.category] = (acc[car.category] || 0) + 1
    return acc
  }, {})

  const categoryList = Object.entries(categoryCounts).map(([label, count]) => ({
    label,
    count
  }))

  categoryList.sort((a, b) => a.label.localeCompare(b.label))

  return [
    { label: 'All', count: props.cars.length },
    ...categoryList
  ]
})

// Methods
const searchRentalCars = () => {
  router.get(route('rentals.index'), {
    search: searchQuery.value || null,
    category: activeCategory.value !== 'All' ? activeCategory.value : null
  }, {
    preserveState: true,
    preserveScroll: true
  })
}

const selectCategory = (category) => {
  activeCategory.value = category
  isDropdownOpen.value = false
  
  router.get(route('rentals.index'), {
    search: searchQuery.value || null,
    category: category !== 'All' ? category : null
  }, {
    preserveState: true,
    preserveScroll: true
  })
}

const activeCategoryData = computed(() => {
  return categories.value.find(cat => cat.label === activeCategory.value)
})

const resetFilter = () => {
  activeCategory.value = 'All'
  searchQuery.value = ''
  router.get(route('rentals.index'), {}, {
    preserveState: true,
    preserveScroll: true
  })
}

// Watch untuk sinkronisasi dengan URL
watch(() => props.filters, (newFilters) => {
  searchQuery.value = newFilters.search || ''
  activeCategory.value = newFilters.category || 'All'
}, { deep: true })
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

    <!-- Rental List Section -->
    <section id="cars" class="bg-gray-50 py-12 sm:py-16 md:py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        <!-- Header -->
        <div class="text-center space-y-4">
          <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900">
            Daftar <span class="text-red-500">Rental Santana</span>
          </h2>
          <p class="text-gray-600 text-base sm:text-lg max-w-2xl mx-auto">
            Temukan mobil impian Anda dengan harga terbaik
          </p>
        </div>

        <!-- Search & Filter Bar -->
        <div class="flex flex-col sm:flex-row gap-4">
          <!-- Search Input -->
          <div class="flex-1 relative">
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Cari mobil..."
              class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
              @keyup.enter="searchRentalCars"
            />
            <svg
              class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
              />
            </svg>
          </div>

          <!-- Category Dropdown -->
          <div class="relative sm:w-64">
            <button
              @click="isDropdownOpen = !isDropdownOpen"
              class="w-full flex items-center justify-between px-4 py-3 bg-white border border-gray-300 rounded-lg hover:border-red-500 transition-all"
            >
              <span class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
                <span class="font-medium text-gray-700">
                  {{ activeCategory }}
                  <span class="text-gray-500 text-sm ml-1">({{ activeCategoryData?.count || 0 }})</span>
                </span>
              </span>
              <svg
                class="w-5 h-5 text-gray-400 transition-transform"
                :class="{ 'rotate-180': isDropdownOpen }"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </button>

            <!-- Dropdown Menu -->
            <div
              v-show="isDropdownOpen"
              class="absolute z-50 w-full mt-2 bg-white border border-gray-200 rounded-lg shadow-lg max-h-64 overflow-y-auto"
            >
              <button
                v-for="category in categories"
                :key="category.label"
                @click="selectCategory(category.label)"
                class="w-full flex items-center justify-between px-4 py-3 hover:bg-red-50 transition-colors"
                :class="{
                  'bg-red-50 text-red-600 font-medium': activeCategory === category.label,
                  'text-gray-700': activeCategory !== category.label
                }"
              >
                <span>{{ category.label }}</span>
                <span
                  class="text-sm px-2 py-1 rounded-full"
                  :class="{
                    'bg-red-100 text-red-600': activeCategory === category.label,
                    'bg-gray-100 text-gray-600': activeCategory !== category.label
                  }"
                >
                  {{ category.count }}
                </span>
              </button>
            </div>
          </div>
        </div>

        <!-- Results Count -->
        <div class="flex items-center justify-between text-sm text-gray-600">
          <p>
            Menampilkan <span class="font-semibold text-gray-900">{{ cars.length }}</span> mobil
          </p>
          <button
            v-if="activeCategory !== 'All' || searchQuery"
            @click="resetFilter"
            class="text-red-500 hover:text-red-600 font-medium flex items-center gap-1"
          >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            Reset Filter
          </button>
        </div>

        <!-- Grid Cars -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <CarCard
            v-for="car in cars"
            :key="car.id"
            v-bind="car"
          />
        </div>

        <!-- Empty State -->
        <div v-if="cars.length === 0" class="text-center py-12">
          <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <p class="text-gray-500 text-lg font-medium">Tidak ada mobil yang ditemukan</p>
          <p class="text-gray-400 text-sm mt-2">Coba ubah kata kunci pencarian atau kategori</p>
        </div>
      </div>
    </section>
  </MainLayout>
</template>

<style scoped>
/* Custom scrollbar for dropdown */
.max-h-64::-webkit-scrollbar {
  width: 6px;
}

.max-h-64::-webkit-scrollbar-track {
  background: #f1f1f1;
}

.max-h-64::-webkit-scrollbar-thumb {
  background: #d1d5db;
  border-radius: 3px;
}

.max-h-64::-webkit-scrollbar-thumb:hover {
  background: #9ca3af;
}

/* Smooth transitions */
* {
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}
</style>

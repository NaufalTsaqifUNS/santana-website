<script setup>
import { ref, computed } from 'vue'
import MainLayout from "@/Layouts/MainLayout.vue"
import CarCard from '@/Components/CarCard.vue'
import RiwayatCard from '@/Components/RiwayatCard.vue'

// Set layout
defineOptions({
  layout: MainLayout,
})

// Reactive data untuk hero section
const heroSearchQuery = ref('')

// Reactive data untuk rental list
const searchQuery = ref('')
const activeCategory = ref('All')
const isDropdownOpen = ref(false)

const cars = ref([
  {
    id: 1,
    name: 'Toyota Avanza',
    pricePerDay: 1000000,
    category: 'MPV',
    seats: 5,
    fuel: 'Bensin',
    imageUrl: 'images/avanza.png',
  },
  {
    id: 2,
    name: 'Toyota Alphard',
    pricePerDay: 400000,
    category: 'MPV',
    seats: 7,
    fuel: 'Solar',
    imageUrl: 'images/alphard.png',
  },
  {
    id: 3,
    name: 'Toyota Fortuner',
    pricePerDay: 600000,
    category: 'SUV',
    seats: 5,
    fuel: 'Bensin',
    imageUrl: 'images/fortuner.png',
  },
  {
    id: 4,
    name: 'Toyota Xpander',
    pricePerDay: 750000,
    category: 'SUV',
    seats: 5,
    fuel: 'Solar',
    imageUrl: 'images/xpander.png',
  },
  {
    id: 5,
    name: 'Mercedes-Benz V-Class',
    pricePerDay: 1500000,
    category: 'Luxury MPV',
    seats: 7,
    fuel: 'Bensin',
    imageUrl: 'images/vclass.png',
  },
  {
    id: 6,
    name: 'Toyota Hiace',
    pricePerDay: 800000,
    category: 'Van',
    seats: 14,
    fuel: 'Solar',
    imageUrl: 'https://images.unsplash.com/photo-1527786356703-4b100091cd2c?auto=format&fit=crop&w=800&q=80',
  },
])

// Computed categories - Automatically generated from cars data
const categories = computed(() => {
  // Count cars by category
  const categoryCounts = cars.value.reduce((acc, car) => {
    acc[car.category] = (acc[car.category] || 0) + 1
    return acc
  }, {})

  // Create categories array with counts
  const categoryList = Object.entries(categoryCounts).map(([label, count]) => ({
    label,
    count
  }))

  // Sort alphabetically
  categoryList.sort((a, b) => a.label.localeCompare(b.label))

  // Add "All" category at the beginning
  return [
    { label: 'All', count: cars.value.length },
    ...categoryList
  ]
})

// Methods
const searchHeroCars = () => {
  // Sinkronkan pencarian hero dengan rental list
  searchQuery.value = heroSearchQuery.value
  // Scroll ke section rental list
  const rentalSection = document.getElementById('rental-list-section')
  if (rentalSection) {
    rentalSection.scrollIntoView({ behavior: 'smooth' })
  }
}

const scrollToRentalSection = () => {
  const rentalSection = document.getElementById('rental-list-section')
  if (rentalSection) {
    rentalSection.scrollIntoView({ behavior: 'smooth' })
  }
}

const searchRentalCars = () => {
  console.log('Searching rental cars:', searchQuery.value)
  // Add your search logic here
}

const loadMore = () => {
  // Contoh penambahan data dummy
  const newCars = Array.from({ length: 3 }).map((_, i) => ({
    ...cars.value[i % cars.value.length],
    id: cars.value.length + i + 1,
  }))
  cars.value = [...cars.value, ...newCars]
}

const selectCategory = (category) => {
  activeCategory.value = category
  isDropdownOpen.value = false
}

const activeCategoryData = computed(() => {
  return categories.value.find(cat => cat.label === activeCategory.value)
})

// Computed list sesuai kategori + pencarian
const filteredCars = computed(() => {
  return cars.value.filter((car) => {
    const matchCategory =
      activeCategory.value === 'All' || car.category === activeCategory.value
    const matchSearch = car.name
      .toLowerCase()
      .includes(searchQuery.value.toLowerCase())
    return matchCategory && matchSearch
  })
})

// Data untuk Riwayat Perjalanan
const riwayatImages = ref([
  {
    id: 1,
    imageUrl: 'https://images.unsplash.com/photo-1468818438311-4bab781ab9b8?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    title: 'Trip di Gunung Bromo'
  },
  {
    id: 2,
    imageUrl: 'https://plus.unsplash.com/premium_photo-1663047448187-778e10adadf5?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    title: 'Trip di Ladang Bunga Tulip'
  },
  {
    id: 3,
    imageUrl: 'https://images.unsplash.com/photo-1468818438311-4bab781ab9b8?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    title: 'Trip di Pantai Kuta'
  },
  {
    id: 4,
    imageUrl: 'https://images.unsplash.com/photo-1468818438311-4bab781ab9b8?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    title: 'Trip di Ubud'
  },
  {
    id: 5,
    imageUrl: 'https://images.unsplash.com/photo-1468818438311-4bab781ab9b8?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    title: 'Trip di Nusa Penida'
  },
  {
    id: 6,
    imageUrl: 'https://images.unsplash.com/photo-1468818438311-4bab781ab9b8?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    title: 'Trip di Gili Trawangan'
  },
  {
    id: 7,
    imageUrl: 'https://images.unsplash.com/photo-1468818438311-4bab781ab9b8?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    title: 'Trip di Raja Ampat'
  },
  {
    id: 8,
    imageUrl: 'https://images.unsplash.com/photo-1468818438311-4bab781ab9b8?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    title: 'Trip di Labuan Bajo'
  }
])

const visibleRiwayatCount = ref(8)

const visibleRiwayat = computed(() => {
  return riwayatImages.value.slice(0, visibleRiwayatCount.value)
})

const loadMoreRiwayat = () => {
  visibleRiwayatCount.value += 4
}
</script>

<template>
  <div class="min-h-screen bg-gray-50">
    <!-- HERO SECTION - Enhanced & Responsive Background -->
    <section class="relative min-h-[100svh] overflow-hidden">
      <!-- Background - Responsive (No Cropping) -->
      <div class="absolute inset-0 z-0">
        <!-- Background Image with Responsive Positioning -->
        <div 
          class="absolute inset-0 bg-center bg-no-repeat
                 bg-cover sm:bg-cover md:bg-cover
                 transition-all duration-300"
          style="background-image: url(/images/herosection-image.jpg);
                 background-position: center center;"
        ></div>
        
        <!-- Gradient Overlay - Responsive -->
        <div class="absolute inset-0 bg-gradient-to-b sm:bg-gradient-to-r 
                    from-black/80 via-black/60 to-black/40 
                    sm:from-black/70 sm:via-black/50 sm:to-transparent"></div>
        
        <!-- Animated Dots Pattern -->
        <div class="absolute inset-0 opacity-10">
          <div class="absolute w-1 h-1 md:w-2 md:h-2 bg-white rounded-full animate-pulse" 
               style="top: 20%; left: 10%;"></div>
          <div class="absolute w-1 h-1 md:w-2 md:h-2 bg-white rounded-full animate-pulse" 
               style="top: 40%; right: 10%; animation-delay: 0.5s;"></div>
          <div class="absolute w-1 h-1 md:w-2 md:h-2 bg-white rounded-full animate-pulse" 
               style="top: 70%; left: 15%; animation-delay: 1s;"></div>
          <div class="absolute w-1 h-1 md:w-2 md:h-2 bg-white rounded-full animate-pulse" 
               style="top: 85%; right: 15%; animation-delay: 1.5s;"></div>
        </div>
      </div>
      
      <!-- Content -->
      <div class="relative z-10 flex items-center min-h-[100svh] px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto w-full py-12 sm:py-16 md:py-20">
          <div class="max-w-3xl">
            <!-- Subtitle Badge -->
            <div class="inline-flex items-center gap-2 px-3 py-1.5 sm:px-4 sm:py-2 
                        bg-red-500/20 backdrop-blur-sm border border-red-500/30 
                        rounded-full mb-4 sm:mb-6 animate-fade-in">
              <svg class="w-3 h-3 sm:w-4 sm:h-4 text-red-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
              </svg>
              <span class="text-white text-xs sm:text-sm font-medium">#1 Rental Mobil di Solo</span>
            </div>

            <!-- Main Title -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl 
                       font-bold text-white leading-tight mb-4 sm:mb-6 animate-slide-up">
              Discover Your 
              <br class="hidden sm:block"/>
              Perfect 
              <span class="relative inline-block">
                <span class="text-red-500">Rent</span>
                <svg class="absolute -bottom-1 sm:-bottom-2 left-0 w-full" height="8" viewBox="0 0 200 12" fill="none">
                  <path d="M2 10C60 2 140 2 198 10" stroke="#EF4444" stroke-width="3" stroke-linecap="round"/>
                </svg>
              </span>
            </h1>
            
            <!-- Subtitle -->
            <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-200 
                      mb-6 sm:mb-8 animate-fade-in" style="animation-delay: 0.2s;">
              Santana Cars – <span class="text-white font-semibold">Mudah Disewa, Nyaman Digunakan.</span>
            </p>
            
            <!-- Feature Badges -->
            <div class="flex flex-wrap gap-2 sm:gap-3 mb-6 sm:mb-10 animate-fade-in" 
                 style="animation-delay: 0.4s;">
              <span v-for="badge in ['Best Experience', 'Best Quality', 'Best Travel']" 
                    :key="badge"
                    class="group relative px-3 py-2 sm:px-4 md:px-6 sm:py-2 md:py-3 
                           bg-white/10 backdrop-blur-md border border-white/20 rounded-full 
                           text-white font-medium text-xs sm:text-sm 
                           transition-all duration-300 hover:bg-red-500 hover:border-red-500 
                           hover:scale-105 hover:shadow-lg hover:shadow-red-500/50">
                <span class="flex items-center gap-1.5 sm:gap-2">
                  <svg class="w-3 h-3 sm:w-4 sm:h-4 text-red-400 group-hover:text-white 
                              transition-colors flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span class="whitespace-nowrap">{{ badge }}</span>
                </span>
              </span>
            </div>
            
            <!-- Search Bar - Responsive & Shortened -->
            <div class="max-w-md sm:max-w-lg animate-fade-in" style="animation-delay: 0.6s;">
              <div class="relative flex items-center gap-1.5 sm:gap-2 bg-white 
                          rounded-full shadow-2xl p-1.5 sm:p-2 
                          transition-all duration-300 hover:shadow-red-500/20">
                <!-- Search Icon - Hidden on mobile inside input -->
                <div class="absolute left-4 sm:left-5 pointer-events-none hidden sm:block">
                  <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                  </svg>
                </div>
                
                <!-- Input -->
                <input 
                  v-model="heroSearchQuery"
                  type="text" 
                  placeholder="Cari mobil..."
                  @keypress.enter="searchHeroCars"
                  class="flex-1 pl-4 pr-2 sm:pl-12 sm:pr-3 py-2.5 sm:py-3 
                         text-gray-700 text-sm sm:text-base 
                         focus:outline-none focus:ring-0 border-0 bg-transparent 
                         placeholder-gray-400 rounded-full"
                />
                
                <!-- Search Button -->
                <button 
                  @click="searchHeroCars"
                  class="group relative bg-gradient-to-r from-red-500 to-red-600 
                         hover:from-red-600 hover:to-red-700 text-white 
                         p-2.5 sm:p-3 rounded-full 
                         transition-all duration-300 hover:shadow-lg hover:shadow-red-500/50 
                         hover:scale-110 flex items-center justify-center flex-shrink-0"
                  aria-label="Search"
                >
                  <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Scroll Indicator - Hidden on mobile -->
      <button
        @click="scrollToRentalSection"
        class="hidden sm:flex absolute bottom-6 md:bottom-10 left-1/2 
               -translate-x-1/2 z-20 animate-bounce
               items-center justify-center w-12 h-12 rounded-full
               bg-white/10 backdrop-blur-sm border border-white/20
               hover:bg-white/20 hover:border-white/40 hover:scale-110
               transition-all duration-300 cursor-pointer
               focus:outline-none focus:ring-2 focus:ring-white/50"
        aria-label="Scroll to rental section"
      >
        <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
      </button>
    </section>

    <!-- SECTION TITLE -->
    <section class="bg-white py-12 sm:py-16 md:py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold 
                   text-gray-900 mb-4 sm:mb-6 leading-tight">
          Pilihan Kendaraan Sesuai 
          <span class="text-red-500">Kebutuhan Anda</span>
        </h2>
        
        <p class="text-base sm:text-lg md:text-xl text-gray-600 
                  max-w-3xl mx-auto leading-relaxed">
          Kami menyediakan berbagai pilihan mobil berkualitas yang telah dipercaya oleh ribuan pelanggan untuk memaksimalkan kenyamanan perjalanan Anda.
        </p>
      </div>
    </section>

    <!-- RENTAL LIST SECTION -->
    <section id="rental-list-section" class="bg-gray-50 py-12 sm:py-16 md:py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        <!-- Heading -->
        <div class="text-center space-y-2">
          <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-800">
            Daftar Rental Santana
          </h2>
          <div class="w-16 h-1 mx-auto bg-red-500 rounded-full"></div>
        </div>

        <!-- Search Bar - Same Style as Hero (Responsive) -->
        <div class="max-w-2xl mx-auto">
          <div class="relative flex items-center gap-1.5 sm:gap-2 bg-white 
                      rounded-full shadow-lg p-1.5 sm:p-2 
                      transition-all duration-300 hover:shadow-red-500/20">
            <!-- Search Icon - Hidden on mobile inside input -->
            <div class="absolute left-4 sm:left-6 pointer-events-none hidden sm:block">
              <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
              </svg>
            </div>
            
            <!-- Input -->
            <input
              v-model="searchQuery"
              type="text"
              placeholder="Cari mobil..."
              @keypress.enter="searchRentalCars"
              class="flex-1 pl-4 pr-2 sm:pl-14 sm:pr-4 py-3 sm:py-4 
                     text-gray-700 text-sm sm:text-base md:text-lg 
                     focus:outline-none focus:ring-0 border-0 bg-transparent 
                     placeholder-gray-400 rounded-full"
            />
            
            <!-- Search Button - Icon Only -->
            <button 
              @click="searchRentalCars"
              class="group relative bg-gradient-to-r from-red-500 to-red-600 
                     hover:from-red-600 hover:to-red-700 text-white 
                     p-3 sm:p-4 rounded-full 
                     transition-all duration-300 hover:shadow-lg hover:shadow-red-500/50 
                     hover:scale-110 flex items-center justify-center flex-shrink-0"
              aria-label="Search"
            >
              <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
              </svg>
            </button>
          </div>
        </div>

        <!-- Category Tabs/Dropdown -->
        <!-- Mobile Dropdown (< 640px) -->
        <div class="sm:hidden relative">
          <button
            @click="isDropdownOpen = !isDropdownOpen"
            class="w-full px-4 py-3 bg-white rounded-lg border border-gray-200 
                   flex items-center justify-between text-sm font-medium text-gray-700
                   hover:bg-gray-50 transition-colors duration-200"
          >
            <span class="flex items-center gap-2">
              <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
              </svg>
              {{ activeCategoryData.label }} ({{ activeCategoryData.count }})
            </span>
            <svg 
              class="w-5 h-5 text-gray-400 transition-transform duration-200"
              :class="{ 'rotate-180': isDropdownOpen }"
              fill="none" 
              stroke="currentColor" 
              viewBox="0 0 24 24"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>

          <!-- Dropdown Menu -->
          <transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="opacity-0 translate-y-1"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition ease-in duration-150"
            leave-from-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 translate-y-1"
          >
            <div 
              v-show="isDropdownOpen"
              class="absolute z-10 w-full mt-2 bg-white rounded-lg shadow-lg border border-gray-200 
                     max-h-64 overflow-y-auto"
            >
              <button
                v-for="cat in categories"
                :key="cat.label"
                @click="selectCategory(cat.label)"
                :class=" [
                  'w-full px-4 py-3 text-left text-sm transition-colors duration-200',
                  'hover:bg-gray-50 flex items-center justify-between',
                  activeCategory === cat.label 
                    ? 'bg-red-50 text-red-600 font-medium' 
                    : 'text-gray-700'
                ]"
              >
                <span>{{ cat.label }}</span>
                <span 
                  :class=" [
                    'px-2 py-1 rounded-full text-xs',
                    activeCategory === cat.label
                      ? 'bg-red-100 text-red-600'
                      : 'bg-gray-100 text-gray-600'
                  ]"
                >
                  {{ cat.count }}
                </span>
              </button>
            </div>
          </transition>
        </div>

        <!-- Desktop Tabs (>= 640px) -->
        <div class="hidden sm:flex flex-wrap gap-3 justify-start overflow-x-auto pb-2">
          <button
            v-for="cat in categories"
            :key="cat.label"
            @click="activeCategory = cat.label"
            :class=" [
              'px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap border transition-all duration-300',
              activeCategory === cat.label
                ? 'bg-red-500 text-white border-red-500 shadow-md'
                : 'bg-gray-100 text-gray-600 hover:bg-red-50 border-gray-200 hover:border-red-200',
            ]"
          >
            {{ cat.label }} ({{ cat.count }})
          </button>
        </div>

        <!-- Grid Cars -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <CarCard
            v-for="car in filteredCars"
            :key="car.id"
            v-bind="car"
          />
        </div>

        <!-- Empty State -->
        <div v-if="filteredCars.length === 0" class="text-center py-12">
          <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <p class="text-gray-500 text-lg">Tidak ada mobil yang ditemukan</p>
          <p class="text-gray-400 text-sm mt-2">Coba ubah kata kunci pencarian atau kategori</p>
        </div>

        <!-- Load More -->
        <div v-if="filteredCars.length > 0" class="text-center pt-4">
          <button
            @click="loadMore"
            class="bg-red-500 text-white px-8 py-3 rounded-full font-medium shadow-md transition-opacity duration-300 hover:opacity-90 cursor-pointer"
          >
            Load More
          </button>
        </div>
      </div>
    </section>

    <!-- WHY CHOOSE US SECTION -->
    <section class="bg-gray-100 py-12 sm:py-16 md:py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12 sm:mb-16">
          <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-gray-800 mb-4">
            Santana
            <br />
            <span class="text-gray-700">AutoCars</span>
          </h2>
          <p class="text-base sm:text-lg md:text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed mt-6">
            Kami hadir untuk melayani kebutuhan sewa mobil dan wisata dengan armada terawat,
            <br class="hidden sm:block" />
            harga bersahabat, serta pelayanan ramah dan profesional.
          </p>
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
          <!-- Left Side - Title -->
          <div class="lg:col-span-4 text-center lg:text-left">
            <h3 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-gray-700 leading-tight">
              Kenapa
              <br />
              Harus
              <br />
              Kami ?
            </h3>
          </div>

          <!-- Right Side - Features Grid -->
          <div class="lg:col-span-8 grid grid-cols-1 gap-4">
            <!-- Best Services Card -->
            <div class="group bg-gray-900 rounded-2xl p-4 sm:p-6 text-white 
                        hover:bg-red-500 transition-all duration-300 
                        hover:shadow-2xl hover:shadow-red-500/30 hover:-translate-y-1">
              <div class="flex items-center gap-4 sm:gap-6">
                <!-- Icon Image -->
                <div class="bg-white/10 p-3 rounded-full group-hover:bg-white/20 transition-colors duration-300 
                            flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 flex-shrink-0">
                  <img 
                    src="/svg/best-service.svg" 
                    alt="Best Services Icon" 
                    class="w-8 h-8 sm:w-10 sm:h-10 object-contain filter brightness-0 invert"
                  />
                </div>
                
                <!-- Content -->
                <div class="flex-1 text-left">
                  <h4 class="text-lg sm:text-xl font-bold mb-2">Best Services</h4>
                  <p class="text-xs sm:text-sm text-gray-300 group-hover:text-white leading-relaxed">
                    Layanan cepat, ramah, dan tersedia 24/7 untuk mendukung setiap perjalanan Anda.
                  </p>
                </div>
              </div>
            </div>

            <!-- Best Experience Card -->
            <div class="group bg-gray-900 rounded-2xl p-4 sm:p-6 text-white 
                        hover:bg-red-500 transition-all duration-300 
                        hover:shadow-2xl hover:shadow-red-500/30 hover:-translate-y-1">
              <div class="flex items-center gap-4 sm:gap-6">
                <!-- Icon Image -->
                <div class="bg-white/10 p-3 rounded-full group-hover:bg-white/20 transition-colors duration-300 
                            flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 flex-shrink-0">
                  <img 
                    src="/svg/best-experience.svg" 
                    alt="Best Experience Icon" 
                    class="w-8 h-8 sm:w-10 sm:h-10 object-contain filter brightness-0 invert"
                  />
                </div>
                
                <!-- Content -->
                <div class="flex-1 text-left">
                  <h4 class="text-lg sm:text-xl font-bold mb-2">Best Experience</h4>
                  <p class="text-xs sm:text-sm text-gray-300 group-hover:text-white leading-relaxed">
                    Pengalaman terbaik untuk perjalanan anda
                  </p>
                </div>
              </div>
            </div>

            <!-- Best Quality Card -->
            <div class="group bg-gray-900 rounded-2xl p-4 sm:p-6 text-white 
                        hover:bg-red-500 transition-all duration-300 
                        hover:shadow-2xl hover:shadow-red-500/30 hover:-translate-y-1">
              <div class="flex items-center gap-4 sm:gap-6">
                <!-- Icon Image -->
                <div class="bg-white/10 p-3 rounded-full group-hover:bg-white/20 transition-colors duration-300 
                            flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 flex-shrink-0">
                  <img 
                    src="/svg/best-quality.svg" 
                    alt="Best Quality Icon" 
                    class="w-8 h-8 sm:w-10 sm:h-10 object-contain filter brightness-0 invert"
                  />
                </div>
                
                <!-- Content -->
                <div class="flex-1 text-left">
                  <h4 class="text-lg sm:text-xl font-bold mb-2">Best Quality</h4>
                  <p class="text-xs sm:text-sm text-gray-300 group-hover:text-white leading-relaxed">
                    Armada terawat, bersih, dan selalu siap menemani perjalanan Anda dengan aman.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- RIWAYAT PERJALANAN SECTION -->
    <section class="bg-white py-12 sm:py-16 md:py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12 sm:mb-16">
          <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            Riwayat Perjalanan
          </h2>
          <div class="w-20 h-1 mx-auto bg-red-500 rounded-full"></div>
          <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto mt-6 leading-relaxed">
            Lihat momen-momen perjalanan pelanggan kami yang telah mempercayai Santana Cars
          </p>
        </div>

        <!-- Grid Gallery -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
          <RiwayatCard
            v-for="item in visibleRiwayat"
            :key="item.id"
            :image-url="item.imageUrl"
            :title="item.title"
          />
        </div>

        <!-- Load More Button -->
        <div 
          v-if="visibleRiwayatCount < riwayatImages.length" 
          class="text-center mt-8 sm:mt-12"
        >
          <button
            @click="loadMoreRiwayat"
            class="inline-flex items-center gap-2 bg-red-500 hover:bg-red-600 
                   text-white px-8 py-3 rounded-full font-medium 
                   shadow-lg hover:shadow-xl transition-all duration-300 
                   hover:scale-105"
          >
            <span>Load More</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
        </div>
      </div>
    </section>
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
    transform: translateY(0);
  }
}

.animate-slide-up {
  animation: slide-up 0.8s ease-out forwards;
}

.animate-fade-in {
  animation: fade-in 0.8s ease-out forwards;
}

/* Smooth transitions */
* {
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Responsive Background Adjustments */
@media (max-width: 640px) {
  section > div:first-child > div:first-child {
    background-position: center 30% !important;
    background-size: cover !important;
  }
}

@media (min-width: 641px) and (max-width: 1024px) {
  section > div:first-child > div:first-child {
    background-position: center center !important;
  }
}

@media (min-width: 1025px) {
  section > div:first-child > div:first-child {
    background-position: center center !important;
    background-size: cover !important;
  }
}

/* Custom scrollbar */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
  background: #ef4444;
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: #dc2626;
}

/* Prevent horizontal scroll on mobile */
body {
  overflow-x: hidden;
}

/* Close dropdown when clicking outside */
@media (max-width: 639px) {
  .relative {
    -webkit-tap-highlight-color: transparent;
  }
}

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
</style>

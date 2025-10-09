<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue'
import { Link } from '@inertiajs/vue3'
import MainLayout from "@/Layouts/MainLayout.vue"
import CarCard from '@/Components/CarCard.vue'
import RiwayatCard from '@/Components/RiwayatCard.vue'
import TestimonialCard from '@/Components/TestimonialCard.vue'

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
  },
  {
    id: 9,
    imageUrl: 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=2070&auto=format&fit=crop',
    title: 'Trip di Danau Toba'
  },
  {
    id: 10,
    imageUrl: 'https://images.unsplash.com/photo-1501594907352-04cda38ebc29?q=80&w=2032&auto=format&fit=crop',
    title: 'Trip di Pulau Komodo'
  },
  {
    id: 11,
    imageUrl: 'https://images.unsplash.com/photo-1523906630133-f6934a1ab2b9?q=80&w=2070&auto=format&fit=crop',
    title: 'Trip di Tanjung Lesung'
  },
  {
    id: 12,
    imageUrl: 'https://images.unsplash.com/photo-1505228395891-9a51e7e86bf6?q=80&w=2033&auto=format&fit=crop',
    title: 'Trip di Lombok'
  }
])

const visibleRiwayatCount = ref(4) // Ubah dari 8 menjadi 4

const visibleRiwayat = computed(() => {
  return riwayatImages.value.slice(0, visibleRiwayatCount.value)
})

// Data untuk Testimonials
const testimonials = ref([
  {
    id: 1,
    name: 'Melinda Lenny',
    location: 'Medan',
    avatar: 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face',
    rating: 3,
    comment: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Neque nam suscipit amet nec eget fermentum, elementum purus aliquet. Porttitor elementum a felis, tempus erat orci.',
  },
  {
    id: 2,
    name: 'Jacob Stevan',
    location: 'Bandung',
    avatar: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face',
    rating: 5,
    comment: 'Pelayanan sangat memuaskan dan mobil selalu dalam kondisi prima. Tim Santana Cars sangat profesional dan responsif terhadap kebutuhan customer.',
  },
  {
    id: 3,
    name: 'Sarah Johnson',
    location: 'Jakarta',
    avatar: 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face',
    rating: 5,
    comment: 'Booking mudah, harga transparan, dan kualitas kendaraan sangat baik. Recommended banget untuk yang butuh rental mobil berkualitas!',
  },
  {
    id: 4,
    name: 'Michael Chen',
    location: 'Surabaya',
    avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face',
    rating: 5,
    comment: 'Sudah beberapa kali sewa di Santana Cars dan selalu puas. Customer service 24/7 membantu banget, terutama saat perjalanan jauh.',
  },
  {
    id: 5,
    name: 'Roben Musstar',
    location: 'Bali',
    avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&h=150&fit=crop&crop=face',
    rating: 5,
    comment: 'Pengalaman terbaik rental mobil di Bali. Mobil bersih, terawat, dan driver sangat ramah. Pasti akan sewa lagi di masa depan.',
  },
  {
    id: 6,
    name: 'Diana Putri',
    location: 'Yogyakarta',
    avatar: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&h=150&fit=crop&crop=face',
    rating: 5,
    comment: 'Pelayanan cepat dan efisien. Proses booking online sangat mudah dan tidak ribet. Kualitas mobil sesuai dengan ekspektasi, bahkan lebih baik.',
  }
])

// Testimonials Slider
const testimonialSlider = ref(null)
const currentSlide = ref(0)
const isAutoPlay = ref(true)
const slideWidth = ref(0)
let autoPlayInterval = null
const windowWidth = ref(typeof window !== 'undefined' ? window.innerWidth : 0)

// Drag/Swipe functionality
const isDragging = ref(false)
const startX = ref(0)
const currentX = ref(0)
const dragOffset = ref(0)
const startSlide = ref(0)
const dragThreshold = 50 // Minimum drag distance to trigger slide change

// Infinite scroll
const isTransitioning = ref(true)
const clonedTestimonials = computed(() => {
  // Clone testimonials for infinite effect
  return [...testimonials.value, ...testimonials.value, ...testimonials.value]
})

const slidesToShow = computed(() => {
  if (windowWidth.value >= 1280) return 3 // xl screens
  if (windowWidth.value >= 768) return 2   // md screens and up
  return 1 // sm screens
})

const maxSlide = computed(() => {
  if (!testimonials.value.length) return 0
  return testimonials.value.length - 1
})

const nextSlide = () => {
  currentSlide.value++
  isTransitioning.value = true
  
  // Reset to start when reaching the end of first set
  if (currentSlide.value >= testimonials.value.length) {
    setTimeout(() => {
      isTransitioning.value = false
      currentSlide.value = 0
      // Force reflow
      if (testimonialSlider.value) {
        testimonialSlider.value.offsetHeight
      }
      setTimeout(() => {
        isTransitioning.value = true
      }, 50)
    }, 500) // Match transition duration
  }
}

const prevSlide = () => {
  if (currentSlide.value > 0) {
    currentSlide.value--
    isTransitioning.value = true
  } else {
    // Jump to end
    isTransitioning.value = false
    currentSlide.value = testimonials.value.length - 1
    setTimeout(() => {
      isTransitioning.value = true
    }, 50)
  }
}

const goToSlide = (index) => {
  currentSlide.value = index
  isTransitioning.value = true
  stopAutoPlay()
  startAutoPlay()
}

const startAutoPlay = () => {
  stopAutoPlay()
  if (isAutoPlay.value) {
    autoPlayInterval = setInterval(() => {
      nextSlide()
    }, 3000) // Auto-scroll every 3 seconds
  }
}

const stopAutoPlay = () => {
  if (autoPlayInterval) {
    clearInterval(autoPlayInterval)
    autoPlayInterval = null
  }
}

// Mouse drag handlers
const handleMouseDown = (e) => {
  isDragging.value = true
  startX.value = e.pageX
  currentX.value = e.pageX
  dragOffset.value = 0
  stopAutoPlay()
  
  if (testimonialSlider.value) {
    testimonialSlider.value.style.cursor = 'grabbing'
  }
  
  e.preventDefault()
}

const handleMouseMove = (e) => {
  if (!isDragging.value) return
  
  e.preventDefault()
  currentX.value = e.pageX
  const diff = startX.value - currentX.value
  dragOffset.value = diff
}

const handleMouseUp = (e) => {
  if (!isDragging.value) return
  
  const diff = startX.value - currentX.value
  
  // Check if drag distance exceeds threshold
  if (Math.abs(diff) > dragThreshold) {
    if (diff > 0) {
      nextSlide()
    } else {
      prevSlide()
    }
  }
  
  isDragging.value = false
  dragOffset.value = 0
  
  if (testimonialSlider.value) {
    testimonialSlider.value.style.cursor = 'grab'
  }
  
  startAutoPlay()
}

const handleMouseLeave = () => {
  if (isDragging.value) {
    handleMouseUp()
  }
}

// Touch handlers for mobile/tablet
const handleTouchStart = (e) => {
  isDragging.value = true
  startX.value = e.touches[0].pageX
  currentX.value = e.touches[0].pageX
  dragOffset.value = 0
  stopAutoPlay()
}

const handleTouchMove = (e) => {
  if (!isDragging.value) return
  
  currentX.value = e.touches[0].pageX
  const diff = startX.value - currentX.value
  dragOffset.value = diff
  
  // Prevent page scroll while swiping horizontally
  if (Math.abs(diff) > 10) {
    e.preventDefault()
  }
}

const handleTouchEnd = () => {
  if (!isDragging.value) return
  
  const diff = startX.value - currentX.value
  
  // Check if swipe distance exceeds threshold
  if (Math.abs(diff) > dragThreshold) {
    if (diff > 0) {
      nextSlide()
    } else {
      prevSlide()
    }
  }
  
  isDragging.value = false
  dragOffset.value = 0
  startAutoPlay()
}

const updateDimensions = () => {
  if (typeof window !== 'undefined') {
    windowWidth.value = window.innerWidth
  }
  if (testimonialSlider.value) {
    const container = testimonialSlider.value
    const containerWidth = container.offsetWidth
    const gap = windowWidth.value >= 768 ? 32 : windowWidth.value >= 640 ? 24 : 16
    const totalGapWidth = gap * (slidesToShow.value - 1)
    slideWidth.value = (containerWidth - totalGapWidth) / slidesToShow.value
  }
}

onMounted(() => {
  updateDimensions()
  startAutoPlay()
  window.addEventListener('resize', updateDimensions)
})

onUnmounted(() => {
  stopAutoPlay()
  window.removeEventListener('resize', updateDimensions)
})
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

        <!-- Link to List Rental Page -->
        <div v-if="filteredCars.length > 0" class="text-center pt-4">
          <Link
            href="/list-rental"
            class="inline-flex items-center gap-2 bg-red-500 text-white px-8 py-3 rounded-full font-medium shadow-md transition-all duration-300 hover:bg-red-600 hover:shadow-lg hover:scale-105"
          >
            <span>Read More</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </Link>
        </div>
      </div>
    </section>

    <!-- WHY CHOOSE US SECTION - REDESIGNED -->
    <section class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-black py-16 sm:py-20 md:py-28 overflow-hidden">
      <!-- Animated Background Elements -->
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-red-500 rounded-full filter blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-red-600 rounded-full filter blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
      </div>

      <!-- Decorative Lines -->
      <div class="absolute inset-0 opacity-5">
        <div class="absolute top-1/4 left-0 w-full h-px bg-gradient-to-r from-transparent via-white to-transparent"></div>
        <div class="absolute top-2/4 left-0 w-full h-px bg-gradient-to-r from-transparent via-white to-transparent"></div>
        <div class="absolute top-3/4 left-0 w-full h-px bg-gradient-to-r from-transparent via-white to-transparent"></div>
      </div>

      <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-12 sm:mb-16 md:mb-20">
          <!-- Badge -->
          <div class="inline-flex items-center gap-2 px-4 py-2 bg-red-500/20 
                      border border-red-500/30 rounded-full mb-6 backdrop-blur-sm">
            <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
            </svg>
            <span class="text-white text-sm font-medium">Dipercaya oleh 1000+ Pelanggan</span>
          </div>

          <!-- Main Title -->
          <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
            Kenapa Harus
            <span class="relative inline-block">
              <span class="text-red-500">Santana Cars</span>
              <svg class="absolute -bottom-2 left-0 w-full" height="8" viewBox="0 0 200 12" fill="none">
                <path d="M2 10C60 2 140 2 198 10" stroke="#EF4444" stroke-width="3" stroke-linecap="round"/>
              </svg>
            </span>
            ?
          </h2>

          <p class="text-base sm:text-lg md:text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
            Kami menghadirkan solusi terbaik untuk setiap perjalanan Anda dengan 
            <span class="text-white font-semibold">armada premium</span> dan 
            <span class="text-white font-semibold">pelayanan profesional</span>
          </p>
        </div>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
          <!-- Card 1: Best Services -->
          <div class="group relative bg-white/5 backdrop-blur-sm border border-white/10 
                      rounded-2xl p-8 hover:bg-gradient-to-br hover:from-red-500 hover:to-red-600 
                      transition-all duration-500 hover:scale-105 hover:shadow-2xl 
                      hover:shadow-red-500/50 cursor-pointer overflow-hidden">
            <!-- Hover Effect Background -->
            <div class="absolute inset-0 bg-gradient-to-br from-red-500/0 to-red-600/0 
                        group-hover:from-red-500/20 group-hover:to-red-600/20 
                        transition-all duration-500"></div>
            
            <!-- Content -->
            <div class="relative z-10">
              <!-- Icon Container -->
              <div class="mb-6 relative">
                <div class="inline-flex items-center justify-center w-20 h-20 
                            bg-red-500/20 group-hover:bg-white/20 rounded-2xl 
                            transition-all duration-500 group-hover:rotate-6 
                            group-hover:scale-110">
                  <img 
                    src="/svg/best-service.svg" 
                    alt="Best Services" 
                    class="w-10 h-10 filter brightness-0 invert"
                  />
                </div>
                <!-- Decorative Circle -->
                <div class="absolute -top-2 -right-2 w-4 h-4 bg-red-400 rounded-full 
                            opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              </div>

              <!-- Title -->
              <h3 class="text-2xl font-bold text-white mb-4 group-hover:translate-x-1 
                         transition-transform duration-300">
                Pelayanan Terbaik
              </h3>

              <!-- Description -->
              <p class="text-gray-300 group-hover:text-white leading-relaxed mb-6 
                        transition-colors duration-300">
                Layanan 24/7 dengan tim profesional siap membantu setiap kebutuhan perjalanan Anda kapan saja
              </p>

              <!-- Features List -->
              <ul class="space-y-3">
                <li class="flex items-center gap-3 text-sm text-gray-400 group-hover:text-white 
                           transition-colors duration-300">
                  <svg class="w-5 h-5 text-red-400 group-hover:text-white flex-shrink-0" 
                       fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span>Respon Cepat & Ramah</span>
                </li>
                <li class="flex items-center gap-3 text-sm text-gray-400 group-hover:text-white 
                           transition-colors duration-300">
                  <svg class="w-5 h-5 text-red-400 group-hover:text-white flex-shrink-0" 
                       fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span>Customer Service 24/7</span>
                </li>
                <li class="flex items-center gap-3 text-sm text-gray-400 group-hover:text-white 
                           transition-colors duration-300">
                  <svg class="w-5 h-5 text-red-400 group-hover:text-white flex-shrink-0" 
                       fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span>Proses Booking Mudah</span>
                </li>
              </ul>
            </div>
          </div>

          <!-- Card 2: Best Quality -->
          <div class="group relative bg-white/5 backdrop-blur-sm border border-white/10 
                      rounded-2xl p-8 hover:bg-gradient-to-br hover:from-red-500 hover:to-red-600 
                      transition-all duration-500 hover:scale-105 hover:shadow-2xl 
                      hover:shadow-red-500/50 cursor-pointer overflow-hidden">
            <!-- Hover Effect Background -->
            <div class="absolute inset-0 bg-gradient-to-br from-red-500/0 to-red-600/0 
                        group-hover:from-red-500/20 group-hover:to-red-600/20 
                        transition-all duration-500"></div>
            
            <!-- Content -->
            <div class="relative z-10">
              <!-- Icon Container -->
              <div class="mb-6 relative">
                <div class="inline-flex items-center justify-center w-20 h-20 
                            bg-red-500/20 group-hover:bg-white/20 rounded-2xl 
                            transition-all duration-500 group-hover:rotate-6 
                            group-hover:scale-110">
                  <img 
                    src="/svg/best-quality.svg" 
                    alt="Best Quality" 
                    class="w-10 h-10 filter brightness-0 invert"
                  />
                </div>
                <!-- Decorative Circle -->
                <div class="absolute -top-2 -right-2 w-4 h-4 bg-red-400 rounded-full 
                            opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              </div>

              <!-- Title -->
              <h3 class="text-2xl font-bold text-white mb-4 group-hover:translate-x-1 
                         transition-transform duration-300">
                Kualitas Premium
              </h3>

              <!-- Description -->
              <p class="text-gray-300 group-hover:text-white leading-relaxed mb-6 
                        transition-colors duration-300">
                Armada terawat dengan standar kualitas tinggi, bersih, dan selalu dalam kondisi prima
              </p>

              <!-- Features List -->
              <ul class="space-y-3">
                <li class="flex items-center gap-3 text-sm text-gray-400 group-hover:text-white 
                           transition-colors duration-300">
                  <svg class="w-5 h-5 text-red-400 group-hover:text-white flex-shrink-0" 
                       fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span>Armada Terawat & Bersih</span>
                </li>
                <li class="flex items-center gap-3 text-sm text-gray-400 group-hover:text-white 
                           transition-colors duration-300">
                  <svg class="w-5 h-5 text-red-400 group-hover:text-white flex-shrink-0" 
                       fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span>Perawatan Berkala</span>
                </li>
                <li class="flex items-center gap-3 text-sm text-gray-400 group-hover:text-white 
                           transition-colors duration-300">
                  <svg class="w-5 h-5 text-red-400 group-hover:text-white flex-shrink-0" 
                       fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span>Kendaraan Terbaru</span>
                </li>
              </ul>
            </div>
          </div>

          <!-- Card 3: Best Experience -->
          <div class="group relative bg-white/5 backdrop-blur-sm border border-white/10 
                      rounded-2xl p-8 hover:bg-gradient-to-br hover:from-red-500 hover:to-red-600 
                      transition-all duration-500 hover:scale-105 hover:shadow-2xl 
                      hover:shadow-red-500/50 cursor-pointer overflow-hidden md:col-span-2 lg:col-span-1">
            <!-- Hover Effect Background -->
            <div class="absolute inset-0 bg-gradient-to-br from-red-500/0 to-red-600/0 
                        group-hover:from-red-500/20 group-hover:to-red-600/20 
                        transition-all duration-500"></div>
            
            <!-- Content -->
            <div class="relative z-10">
              <!-- Icon Container -->
              <div class="mb-6 relative">
                <div class="inline-flex items-center justify-center w-20 h-20 
                            bg-red-500/20 group-hover:bg-white/20 rounded-2xl 
                            transition-all duration-500 group-hover:rotate-6 
                            group-hover:scale-110">
                  <img 
                    src="/svg/best-experience.svg" 
                    alt="Best Experience" 
                    class="w-10 h-10 filter brightness-0 invert"
                  />
                </div>
                <!-- Decorative Circle -->
                <div class="absolute -top-2 -right-2 w-4 h-4 bg-red-400 rounded-full 
                            opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              </div>

              <!-- Title -->
              <h3 class="text-2xl font-bold text-white mb-4 group-hover:translate-x-1 
                         transition-transform duration-300">
                Pengalaman Terbaik
              </h3>

              <!-- Description -->
              <p class="text-gray-300 group-hover:text-white leading-relaxed mb-6 
                        transition-colors duration-300">
                Pengalaman terbaik untuk perjalanan anda 
              </p>

              <!-- Features List -->
              <ul class="space-y-3">
                <li class="flex items-center gap-3 text-sm text-gray-400 group-hover:text-white 
                           transition-colors duration-300">
                  <svg class="w-5 h-5 text-red-400 group-hover:text-white flex-shrink-0" 
                       fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span>Nyaman</span>
                </li>
                <li class="flex items-center gap-3 text-sm text-gray-400 group-hover:text-white 
                           transition-colors duration-300">
                  <svg class="w-5 h-5 text-red-400 group-hover:text-white flex-shrink-0" 
                       fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span>Harga Transparan</span>
                </li>
                <li class="flex items-center gap-3 text-sm text-gray-400 group-hover:text-white 
                           transition-colors duration-300">
                  <svg class="w-5 h-5 text-red-400 group-hover:text-white flex-shrink-0" 
                       fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                  </svg>
                  <span>Flexible & Reliable</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- RIWAYAT RENTAL SECTION -->
    <section class="relative bg-gradient-to-br from-gray-100 via-white to-gray-50 py-16 sm:py-20 md:py-28 overflow-hidden">
      <!-- Decorative Background Elements -->
      <div class="absolute inset-0 opacity-5">
        <div class="absolute top-10 left-10 w-72 h-72 bg-red-500 rounded-full filter blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-red-600 rounded-full filter blur-3xl"></div>
        <div class="absolute top-1/2 left-1/3 w-64 h-64 bg-red-400 rounded-full filter blur-3xl"></div>
      </div>

      <!-- Floating Geometric Shapes -->
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 right-20 w-8 h-8 border-2 border-red-400 rotate-45 animate-pulse"></div>
        <div class="absolute bottom-32 left-16 w-6 h-6 bg-red-500 rounded-full animate-bounce" style="animation-delay: 0.5s;"></div>
        <div class="absolute top-1/3 right-1/4 w-4 h-4 bg-red-600 rotate-45 animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-20 right-1/3 w-10 h-10 border border-red-300 rounded-full animate-bounce" style="animation-delay: 1.5s;"></div>
      </div>

      <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Enhanced Header -->
        <div class="text-center mb-16 sm:mb-20">
          <!-- Badge -->
          <div class="inline-flex items-center gap-2 px-4 py-2 bg-red-50 
                      border border-red-200 rounded-full mb-6 shadow-sm">
            <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
              <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"/>
              <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"/>
            </svg>
            <span class="text-red-600 text-sm font-semibold">Galeri Perjalanan</span>
          </div>

          <!-- Main Title with Animation -->
          <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 mb-6 leading-tight">
            <span class="block">Riwayat</span>
            <span class="relative inline-block">
              <span class="text-red-500">Rental</span>
              <svg class="absolute -bottom-2 sm:-bottom-4 left-0 w-full" height="12" viewBox="0 0 300 16" fill="none">
                <path d="M3 13C90 3 210 3 297 13" stroke="#EF4444" stroke-width="4" stroke-linecap="round"/>
              </svg>
            </span>
          </h2>

          <!-- Enhanced Description -->
          <div class="max-w-4xl mx-auto">
            <p class="text-lg sm:text-xl md:text-2xl text-gray-600 mb-6 leading-relaxed">
              Saksikan momen-momen indah perjalanan pelanggan kami yang telah 
              <span class="text-gray-900 font-semibold">mempercayai Santana Cars</span> 
              untuk menghadirkan pengalaman tak terlupakan
            </p>
          </div>
        </div>

        <!-- Enhanced Gallery with Masonry Layout -->
        <div class="relative">
          <!-- Gallery Grid with Different Sizes -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            <!-- Featured Card and Regular Cards -->
            <RiwayatCard
              v-for="(item, index) in visibleRiwayat"
              :key="item.id"
              :image-url="item.imageUrl"
              :title="item.title"
              :is-featured="index === 0"
              :index="index - 1"
            />
          </div>

          <!-- Decorative Elements -->
          <div class="absolute -top-4 -left-4 w-8 h-8 border-l-4 border-t-4 border-red-500 opacity-30"></div>
          <div class="absolute -bottom-4 -right-4 w-8 h-8 border-r-4 border-b-4 border-red-500 opacity-30"></div>
        </div>

        <!-- Enhanced Link to Riwayat Rental Page -->
        <div v-if="riwayatImages.length > visibleRiwayatCount" 
             class="text-center mt-16 sm:mt-20">
          <!-- Link Button -->
          <Link
            href="/riwayat-rental"
            class="group relative inline-flex items-center gap-3 
                   bg-gradient-to-r from-red-500 to-red-600 
                   hover:from-red-600 hover:to-red-700 
                   text-white px-10 py-4 rounded-full font-semibold text-lg
                   shadow-2xl hover:shadow-red-500/50 
                   transition-all duration-300 hover:scale-105
                   before:absolute before:inset-0 before:rounded-full 
                   before:bg-white/20 before:opacity-0 
                   hover:before:opacity-100 before:transition-opacity before:duration-300"
          >
            <span class="relative z-10">Read More</span>
            <svg class="relative z-10 w-6 h-6 group-hover:translate-x-1 transition-transform duration-300" 
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M19 9l-7 7-7-7"/>
            </svg>
          </Link>
        </div>
      </div>
    </section>

    <!-- TESTIMONIALS SECTION - What They Say? -->
    <section class="relative bg-white py-16 sm:py-20 md:py-28 overflow-hidden">
      <!-- Background Decorations -->
      <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 left-10 w-72 h-72 bg-red-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
        <div class="absolute top-40 right-10 w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>
      </div>

      <!-- Floating Elements -->
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-red-500 rounded-full animate-ping"></div>
        <div class="absolute top-3/4 right-1/4 w-2 h-2 bg-red-500 rounded-full animate-ping" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 right-1/3 w-2 h-2 bg-red-500 rounded-full animate-ping" style="animation-delay: 2s;"></div>
      </div>

      <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12 sm:mb-16 space-y-4 animate-fade-in">
          <div class="inline-flex items-center justify-center space-x-2 bg-red-50 px-4 py-2 rounded-full mb-4">
            <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
            </svg>
            <span class="text-red-600 font-semibold text-sm">Testimonials</span>
          </div>
          
          <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900">
            What <span class="text-red-500">They Say?</span>
          </h2>
          
          <p class="text-base sm:text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
            Dengarkan pengalaman nyata dari pelanggan kami yang telah mempercayai layanan rental mobil terbaik
          </p>
        </div>

        <!-- Testimonials Slider with Infinite Loop -->
        <div class="relative mb-12">
          <!-- Slider Container -->
          <div 
            class="overflow-hidden select-none py-4 sm:py-6 md:py-8 touch-pan-y" 
            ref="testimonialSlider"
            @mousedown="handleMouseDown"
            @mousemove="handleMouseMove"
            @mouseup="handleMouseUp"
            @mouseleave="handleMouseLeave"
            @touchstart.passive="handleTouchStart"
            @touchmove="handleTouchMove"
            @touchend="handleTouchEnd"
            @mouseenter="stopAutoPlay"
            style="cursor: grab; user-select: none; -webkit-user-select: none; -webkit-touch-callout: none;"
          >
            <div 
              class="flex gap-4 sm:gap-6 md:gap-8"
              :style="{ 
                transform: `translateX(-${(currentSlide * slideWidth) + (currentSlide * (windowWidth >= 768 ? 32 : windowWidth >= 640 ? 24 : 16)) - dragOffset}px)`,
                transition: isDragging ? 'none' : isTransitioning ? 'transform 0.5s ease-in-out' : 'none',
                willChange: 'transform'
              }"
            >
              <div 
                v-for="(testimonial, index) in clonedTestimonials"
                :key="`testimonial-${testimonial.id}-${index}`"
                class="flex-shrink-0"
                :style="{ width: `${slideWidth}px` }"
              >
                <TestimonialCard
                  :name="testimonial.name"
                  :location="testimonial.location"
                  :avatar="testimonial.avatar"
                  :rating="testimonial.rating"
                  :comment="testimonial.comment"
                />
              </div>
            </div>
          </div>

          <!-- Navigation Arrows (Optional) -->
          <button
            @click="prevSlide"
            class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 
                   z-20 items-center justify-center w-12 h-12 rounded-full
                   bg-white shadow-lg border border-gray-200
                   hover:bg-red-500 hover:text-white hover:border-red-500
                   transition-all duration-300 hover:scale-110
                   focus:outline-none focus:ring-2 focus:ring-red-500"
            aria-label="Previous slide"
          >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
          </button>

          <button
            @click="nextSlide"
            class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 
                   z-20 items-center justify-center w-12 h-12 rounded-full
                   bg-white shadow-lg border border-gray-200
                   hover:bg-red-500 hover:text-white hover:border-red-500
                   transition-all duration-300 hover:scale-110
                   focus:outline-none focus:ring-2 focus:ring-red-500"
            aria-label="Next slide"
          >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </button>
        </div>

        <!-- Slider Indicators -->
        <div class="flex justify-center items-center gap-2 sm:gap-3 mb-8">
          <button
            v-for="index in testimonials.length"
            :key="index"
            @click="goToSlide(index - 1)"
            :class=" [
              'transition-all duration-300 rounded-full cursor-pointer',
              (currentSlide % testimonials.length) === (index - 1)
                ? 'bg-red-500 w-6 sm:w-8 md:w-10 h-2 sm:h-2.5 md:h-3'
                : 'bg-gray-300 hover:bg-red-300 w-2 sm:w-2.5 md:w-3 h-2 sm:h-2.5 md:h-3'
            ]"
            :aria-label="`Go to slide ${index}`"
          ></button>
        </div>

        <!-- Instructions -->
        <div class="flex flex-col sm:flex-row justify-center items-center gap-3 sm:gap-6 text-gray-400 text-sm">
          <!-- Mobile Swipe Instruction -->
          <div class="flex md:hidden items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
            </svg>
            <span>Swipe untuk navigasi</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
            </svg>
          </div>
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

/* Animation keyframes */
@keyframes blob {
  0%, 100% {
    transform: translate(0px, 0px) scale(1);
  }
  33% {
    transform: translate(30px, -50px) scale(1.1);
  }
  66% {
    transform: translate(-20px, 20px) scale(0.9);
  }
}

.animate-slide-up {
  animation: slide-up 0.8s ease-out forwards;
}

.animate-fade-in {
  animation: fade-in 0.8s ease-out forwards;
}

.animate-blob {
  animation: blob 7s infinite;
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

::-webkitscrollbar-thumb {
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

.animation-delay-2000 {
  animation-delay: 2s;
}

.animation-delay-4000 {
  animation-delay: 4s;
}

/* Ensure testimonial cards are fully visible */
@media (max-width: 640px) {
  /* Mobile: Add extra space for shadow and hover effects */
  section:has(.testimonials-slider) {
    padding-left: 0.5rem;
    padding-right: 0.5rem;
  }
}

@media (min-width: 641px) and (max-width: 1024px) {
  /* Tablet: More space for better visibility */
  section:has(.testimonials-slider) {
    padding-left: 1rem;
    padding-right: 1rem;
  }
}

@media (min-width: 1025px) {
  /* Desktop: Maximum space for optimal display */
  section:has(.testimonials-slider) {
    padding-left: 2rem;
    padding-right: 2rem;
  }
}

/* Prevent card shadows from being cut off */
.overflow-visible {
  overflow: visible !important;
}

/* Prevent text selection while dragging */
.select-none {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-touch-callout: none;
}

/* Smooth cursor transition */
[style*="cursor: grab"] {
  cursor: grab !important;
}

[style*="cursor: grabbing"] {
  cursor: grabbing !important;
}

/* Disable pointer events on cards while dragging */
.select-none:active * {
  pointer-events: none;
}

/* Ensure smooth infinite scroll */
.select-none {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-touch-callout: none;
}

/* Enhanced pulse animation for indicator */
@keyframes pulse {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: 0.5;
  }
}

@keyframes ping {
  75%, 100% {
    transform: scale(2);
    opacity: 0;
  }
}

.animate-pulse {
  animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

.animate-ping {
  animation: ping 1s cubic-bezier(0, 0, 0.2, 1) infinite;
}

/* Improve touch handling */
.touch-pan-y {
  touch-action: pan-y;
}

/* Prevent text selection and touch callout */
.select-none {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-touch-callout: none;
  -webkit-tap-highlight-color: transparent;
}

/* Hardware acceleration for smooth animations */
[style*="will-change"] {
  will-change: transform;
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
}
</style>

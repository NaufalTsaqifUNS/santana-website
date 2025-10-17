<template>
  <header 
    class="bg-white shadow-sm fixed top-0 left-0 right-0 z-50 transition-transform duration-300"
    :class="{ '-translate-y-full': !showHeader }"
  >
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <!-- Logo Section -->
        <div class="flex items-center">
          <div class="flex-shrink-0 flex items-center">
            <!-- Logo Image -->
            <img 
              src="/images/santana-logo.png"
              alt="Santana Logo" 
              class="h-12 w-auto"
            />
          </div>
        </div>

        <!-- Navigation Menu -->
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-8">
            <Link
              href="/"
              class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200"
              :class="{ 'text-red-600 border-b-2 border-red-600': activeMenu === 'home' }"
            >
              Home
            </Link>
            <Link
              href="/list-rental"
              class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200"
              :class="{ 'text-red-600 border-b-2 border-red-600': activeMenu === 'daftar-rental' }"
            >
              Daftar Rental
            </Link>
            <Link
              href="/riwayat-perjalanan"
              class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200"
              :class="{ 'text-red-600 border-b-2 border-red-600': activeMenu === 'riwayat-perjalanan' }"
            >
              Riwayat Perjalanan
            </Link>
            <Link
              href="/tentang-kami"
              class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200"
              :class="{ 'text-red-600 border-b-2 border-red-600': activeMenu === 'tentang-kami' }"
            >
              Tentang Kami
            </Link>
            <Link
              href="/contact"
              class="text-gray-700 hover:text-red-600 px-3 py-2 text-sm font-medium transition-colors duration-200"
              :class="{ 'text-red-600 border-b-2 border-red-600': activeMenu === 'contact' }"
            >
              Contact
            </Link>
          </div>
        </div>

        <!-- Call Us Button -->
        <div class="hidden md:block">
          <button
            class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-full text-sm font-medium transition-colors duration-200 shadow-md hover:shadow-lg"
            @click="callUs"
          >
            Call Us
          </button>
        </div>

        <!-- Mobile menu button -->
        <div class="md:hidden">
          <button
            @click="toggleMobileMenu"
            class="text-gray-700 hover:text-red-600 inline-flex items-center justify-center p-2 rounded-md transition-colors duration-200"
          >
            <svg
              class="h-6 w-6"
              stroke="currentColor"
              fill="none"
              viewBox="0 0 24 24"
            >
              <path
                v-if="!mobileMenuOpen"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              />
              <path
                v-else
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>
          </button>
        </div>
      </div>

      <!-- Mobile Menu -->
      <div v-if="mobileMenuOpen" class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t border-gray-200">
          <Link
            href="/"
            class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium transition-colors duration-200"
            :class="{ 'text-red-600 bg-red-50': activeMenu === 'home' }"
            @click="mobileMenuOpen = false"
          >
            Home
          </Link>
          <Link
            href="/list-rental"
            class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium transition-colors duration-200"
            :class="{ 'text-red-600 bg-red-50': activeMenu === 'daftar-rental' }"
            @click="mobileMenuOpen = false"
          >
            Daftar Rental
          </Link>
          <Link
            href="/riwayat-perjalanan"
            class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium transition-colors duration-200"
            :class="{ 'text-red-600 bg-red-50': activeMenu === 'riwayat-perjalanan' }"
            @click="mobileMenuOpen = false"
          >
            Riwayat Perjalanan
          </Link>
          <Link
            href="/tentang-kami"
            class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium transition-colors duration-200"
            :class="{ 'text-red-600 bg-red-50': activeMenu === 'tentang-kami' }"
            @click="mobileMenuOpen = false"
          >
            Tentang Kami
          </Link>
          <Link
            href="/contact"
            class="text-gray-700 hover:text-red-600 block px-3 py-2 text-base font-medium transition-colors duration-200"
            :class="{ 'text-red-600 bg-red-50': activeMenu === 'contact' }"
            @click="mobileMenuOpen = false"
          >
            Contact
          </Link>
          <button
            class="w-full text-left bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md text-base font-medium transition-colors duration-200 mt-4"
            @click="callUs"
          >
            Call Us
          </button>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

export default {
  name: 'SantanaNavbar',
  components: {
    Link
  },
  setup() {
    const page = usePage()
    
    // Computed property untuk menentukan active menu berdasarkan URL
    const activeMenu = computed(() => {
      const url = page.url
      if (url === '/' || url === '/home') return 'home'
      if (url.includes('/list-rental')) return 'daftar-rental'
      if (url.includes('/riwayat-perjalanan')) return 'riwayat-perjalanan'
      if (url.includes('/tentang-kami')) return 'tentang-kami'
      if (url.includes('/contact')) return 'contact'
      return 'home'
    })
    
    return { activeMenu }
  },
  data() {
    return {
      mobileMenuOpen: false,
      showHeader: true,
      lastScrollPosition: 0,
      scrollThreshold: 100
    }
  },
  methods: {
    toggleMobileMenu() {
      this.mobileMenuOpen = !this.mobileMenuOpen;
    },
    callUs() {
      // Add your phone call logic here
      window.open('tel:+62812345678', '_self');
      console.log('Call Us clicked');
    },
    handleScroll() {
      const currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop;
      
      // Jangan hide header jika di posisi paling atas
      if (currentScrollPosition < 0) {
        return;
      }
      
      // Jika di posisi paling atas, selalu tampilkan header
      if (currentScrollPosition < 10) {
        this.showHeader = true;
        this.lastScrollPosition = currentScrollPosition;
        return;
      }
      
      // Hide header saat scroll ke bawah, show saat scroll ke atas
      if (Math.abs(currentScrollPosition - this.lastScrollPosition) < this.scrollThreshold) {
        return;
      }
      
      this.showHeader = currentScrollPosition < this.lastScrollPosition;
      this.lastScrollPosition = currentScrollPosition;
    }
  },
  mounted() {
    // Add scroll event listener
    window.addEventListener('scroll', this.handleScroll);
  },
  beforeUnmount() {
    // Remove scroll event listener
    window.removeEventListener('scroll', this.handleScroll);
  }
}
</script>

<style scoped>
/* Smooth transition for header hide/show */
header {
  transition: transform 0.3s ease-in-out;
}
</style>
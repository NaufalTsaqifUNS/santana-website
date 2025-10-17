<template>
  <div class="min-h-screen bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
      <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16">
          <div class="flex items-center">
            <div class="text-xl font-bold text-gray-800">Rental Mobil Admin</div>
          </div>
          <div class="flex items-center space-x-4">
            <Link 
              :href="route('admin.dashboard')"
              class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-200"
            >
              Dashboard
            </Link>
            <Link 
              :href="route('daftar-rental.index')"
              class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-200"
            >
              Daftar Mobil
            </Link>
            <Link 
              :href="route('riwayat-perjalanan.index')"
              class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-200"
            >
              Riwayat Perjalanan
            </Link>
            <form @submit.prevent="logout">
              <button 
                type="submit"
                class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium transition duration-200"
              >
                Logout
              </button>
            </form>
          </div>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <main>
      <slot />
    </main>
  </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'

const logout = () => {
  router.post(route('logout'))
}
</script>